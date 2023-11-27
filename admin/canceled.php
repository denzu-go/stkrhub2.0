<?php
session_start();
include("connection.php");
// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Canceled Orders </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css?<?php echo time(); ?>" rel="stylesheet">


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

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/orders_count.css'; ?>
    </style>

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
                            <h4>Canceled Orders</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
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
                                        
                                        include 'html/admin_table_allOrders.php';
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

        <?php include 'html/admin_footer.php'; ?>



    </div>



    <!-- MODALS -->
    <!-- order list modal -->
    <?php
    include 'html/modal_order_list.php';
    include 'html/modal_cancelation_details.php';
    ?>











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


            var passed_status = 'is_canceled';

            <?php include 'html/count_orders.php'; ?>

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
                pageLength: 15,


                "ajax": {
                    "url": "admin_json_global_orders.php",
                    data: {
                        passed_status: passed_status
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "number"
                    },
                    {
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
                            unique_order_group_id: unique_order_group_id,
                            passed_status: passed_status,
                        },
                        "dataSrc": ""
                    },
                    "columns": [{
                        "data": "item"
                    }]
                });

                $('#order_table').modal('show');
            });





            $('#allOrders').on('click', '#view_cancelation_details', function() {
                var unique_order_group_id = $(this).data('unique_order_group_id');

                $('#cancelationDetailsTable').DataTable({
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
                        "url": "admin_json_cancelation_details.php",
                        data: {
                            unique_order_group_id: unique_order_group_id,
                            passed_status: passed_status,
                        },
                        "dataSrc": ""
                    },
                    "columns": [{
                        "data": "item"
                    }]
                });

                $('#modal_cancelation_details').modal('show');
            });



        });
    </script>



</body>

</html>