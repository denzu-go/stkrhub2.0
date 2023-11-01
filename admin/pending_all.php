<?php
session_start();
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Pending Orders</h4>
                            <p class="mb-0">Once order is accepted, STKR Players could not cancel it anymore.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <?php
                                $sqlCheckInProduction = "SELECT COUNT(*) AS count FROM orders";
                                $resultCheckInProduction = $conn->query($sqlCheckInProduction);

                                if ($resultCheckInProduction) {
                                    $row = $resultCheckInProduction->fetch_assoc();
                                    $count = $row['count'];

                                    if ($count > 0) {
                                        echo '
                                                <table id="allOrders" class="hover" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>User ID</th>
                                                            <th>Status</th>
                                                            <th>Order Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                ';
                                    } else {
                                        echo 'No orders.';
                                    }
                                } else {
                                    echo 'Error checking for orders in production.';
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <?php
        $zip = new ZipArchive();

        if ($zip->open('newest.zip', ZipArchive::CREATE) === TRUE) {

            $zip->addFile('../uploads/sample/sample2.txt', 'sample2.txt');
            $zip->close();
            // echo 'ZIP archive created successfully!';
        } else {
            // echo 'Failed to create ZIP archive.';
        }

        echo '<a href="newest.zip" download>Download newest ZIP Archive</a>';
        ?>


        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
    </div>



    <!-- MODALS -->
    <!-- order list modal -->
    <div class="modal fade" id="order_table" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table id="orderListTable" class="hover" style="width: 100%;">
                        <tbody>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>










    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {


            $('#allOrders').DataTable({
                "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                }],

                language: {
                    search: "Search",
                },

                searching: true,
                info: false,
                paging: true,
                lengthChange: false,
                ordering: false,


                "ajax": {
                    "url": "admin_json_pending_orders.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "unique_order_group_id"
                    },
                    {
                        "data": "creator"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "actions"
                    },
                ]
            });





            $('#allOrders').on('click', '#proceed_order', function() {
                var unique_order_group_id = $(this).data('unique_order_group_id');

                Swal.fire({
                    title: 'Proceed Orders',
                    text: 'Are you sure you want to proceed these items?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Proceed Orders',
                    cancelButtonText: 'Close',
                }).then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: 'admin_process_proceed_orders.php',
                            data: {
                                unique_order_group_id: unique_order_group_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#allOrders').DataTable().ajax.reload();
                                    Swal.fire('Success', response.message, 'success');
                                } else {
                                    $('#allOrders').DataTable().ajax.reload();
                                    $('#cartCount').DataTable().ajax.reload();
                                    Swal.fire('Error', response.message, 'error');
                                }
                            },
                            error: function() {
                                $('#allOrders').DataTable().ajax.reload();
                                Swal.fire('Error', 'Failed to delete the game', 'error');
                            }
                        });
                    }
                });
            });


            $('#allOrders').on('click', '#view_order', function() {
                var unique_order_group_id = $(this).data('unique_order_group_id');

                $('#orderListTable').DataTable({
                    language: {
                        search: "Search",
                    },
                    destroy: true,
                    autoWidth: true,
                    searching: false,
                    info: false,
                    paging: false,
                    lengthChange: false,
                    ordering: false,

                    "ajax": {
                        "url": "admin_json_order_list_table.php",
                        data: {
                            unique_order_group_id: unique_order_group_id
                        },
                        "dataSrc": ""
                    },
                    "columns": [{
                        "data": "item"
                    }]
                });

                $('#order_table').modal('show');
            });










        });
    </script>



</body>

</html>