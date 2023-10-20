<!-- new -->
<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- CSS ================================ -->
    <link rel="stylesheet" href="css/linearicons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/font-awesome.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/themify-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/owl.carousel.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nice-select.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nouislider.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/ion.rangeSlider.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/magnific-popup.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">

    <style>
        <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>

        /* start header */
        .sticky-wrapper {
            top: 0px !important;
        }


        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* end */

        #infoTable tbody tr {
            background-color: transparent !important;
        }

        .image-mini-container {
            overflow: hidden;
            width: 100%;
            position: relative;
            padding-top: 80%;
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 100%);
        }

        .custom-shadow {
            box-shadow: 0 0 10px #000000;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 0px;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }

        .even,
        .odd {
            background-color: transparent !important;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            /* border-collapse: separate; */
            border-spacing: -20px;
        }

        table.dataTable,
        table.dataTable thead,
        table.dataTable tbody,
        table.dataTable tr,
        table.dataTable td,
        table.dataTable th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #272a4e;
        }

        .nav-link {
            color: #fff;
        }


        /* sidebar */
        #sidebar {
            height: 100%;
            background: transparent;
            color: #fff;
        }

        #sidebar a,
        #sidebar a:hover,
        #sidebar a:focus {
            color: inherit;
        }

        #sidebar ul li a {
            padding: 10px;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: yellow;
        }
    </style>
</head>

<body>

    <?php include 'html/page_header.php'; ?>
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <section class="sample-text-area">
        <div class="container">

            <!-- profile pic and wallet -->
            <table id="pinakaProfile" class="display" style="width: 100%;">
                <tbody>
                </tbody>
            </table>

            <div class="wrapper d-flex align-items-stretch row">

                <!-- profile sidebar -->
                <?php include 'html/profile_sidebar.php'; ?>

                <div id="content" class="col">

                    <!-- header bar -->
                    <?php include 'html/profile_orders_header_bar.php'; ?>

                    <!-- content -->
                    <div class="container">
                        <?php
                        $sqlCheckInProduction = "SELECT COUNT(*) AS count FROM orders";
                        $resultCheckInProduction = $conn->query($sqlCheckInProduction);

                        if ($resultCheckInProduction) {
                            $row = $resultCheckInProduction->fetch_assoc();
                            $count = $row['count'];

                            if ($count > 0) {
                                echo '
                                <table id="allOrders" class="hover" style="width: 100%;">
                                    <tbody>
                                    </tbody>
                                </table>
                                ';
                            } else {
                                echo 'None.';
                            }
                        } else {
                            echo 'Error checking for orders in production.';
                        }
                        ?>
                    </div>

                </div>

            </div>

        </div>
    </section>




    <!-- modals -->
    <div class="modal fade" id="cancelReason">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reason</h5>
                </div>
                <form id="cancelForm" enctype="multipart/form-data">
                    <div class="modal-body">

                        <?php
                        $cancellationReasons = array();

                        // Query to retrieve cancellation reasons from the database
                        $sqlSelectReasons = "SELECT cancel_order_reason_id, reason_text FROM cancel_order_reasons";
                        $queryReasons = $conn->query($sqlSelectReasons);

                        if ($queryReasons) {
                            // Fetch reasons and store them in the array
                            while ($row = $queryReasons->fetch_assoc()) {
                                $cancellationReasons[] = $row;
                            }
                        }

                        foreach ($cancellationReasons as $reason) {
                            $cancel_order_reason_id = $reason['cancel_order_reason_id'];
                            $reason_text = $reason['reason_text'];
                            echo '<input type="radio" id="' . $cancel_order_reason_id . '" name="cancel_order_reason_id" value="' . $cancel_order_reason_id . '" required>' . $reason_text . '<br>';
                        }

                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Filepond JavaScript -->
    <script src="https://unpkg.com/filepond@4.23.1/dist/filepond.min.js"></script>

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>


    <script>
        $(document).ready(function() {

            <?php include 'js/essential.php'; ?>


            var monkeyList = new List('test-list', {
                valueNames: ['name'],
                page: 7,
                pagination: true
            });


            var options = {
                valueNames: ['name', 'born']
            };

            var userList = new List('game_components_table', options);

            var user_id = <?php echo $user_id; ?>;

            $('#allOrders').DataTable({
                language: {
                    search: "",
                },

                searching: true,
                info: false,
                paging: true,
                lengthChange: false,
                ordering: false,


                "ajax": {
                    "url": "json_is_pending_orders.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });



            $('#allOrders').on('click', '#cancel_orders', function() {
                var unique_order_group_id = $(this).data('unique_order_group_id');
                var user_id = <?php echo $user_id; ?>;

                // Clear previous values
                $('#unique_order_group_id').remove();
                $('#user_id').remove();
                $("input[name='cancel_order_reason_id']").prop("checked", false);

                $("#cancelReason").modal("show");

                // Append new values
                $('#cancelForm').append('<input type="hidden" id="unique_order_group_id" value="' + unique_order_group_id + '">');
                $('#cancelForm').append('<input type="hidden" id="user_id" value="' + user_id + '">');
            });


            $("#cancelForm").submit(function(e) {
                e.preventDefault();

                // Use SweetAlert for confirmation
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to submit the form?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var selectedReasonId = $("input[name='cancel_order_reason_id']:checked").val();

                        var formData = new FormData();
                        formData.append('cancel_order_reason_id', selectedReasonId);
                        formData.append('unique_order_group_id', $('#unique_order_group_id').val());
                        formData.append('user_id', $('#user_id').val());

                        $.ajax({
                            url: 'process_cancel_order_with_reason.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $("#cancelReason").modal("hide");
                                    $('#allOrders').DataTable().ajax.reload();
                                    Swal.fire('Success', response.message, 'success');
                                } else {
                                    $("#cancelReason").modal("hide");
                                    $('#allOrders').DataTable().ajax.reload();
                                    Swal.fire('Error', response.message, 'error');

                                }
                            },
                            error: function() {
                                $("#cancelReason").modal("hide");
                                $('#allOrders').DataTable().ajax.reload();
                                Swal.fire('Error', 'Failed to build the game', 'error');
                            }
                        });

                    }
                });
            });




        });
    </script>





</body>

</html>