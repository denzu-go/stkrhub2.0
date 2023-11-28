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
    <title>STKR Admin - Reported Comments </title>
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
<style>
    td {
        width: 200px;
    }
</style>

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
                            <h4>Repoted Comments</h4>
                            <p class="mb-0">Review, Approve and Delete Reported Comments</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="reportComments" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Game Title</th>
                                            <th>Username</th>
                                            <th>Comment</th>
                                            <th>images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer">






            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
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

            <?php include 'html/count_orders.php'; ?>


            $('#reportComments').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No comments have been reported yet"
                },

                searching: true,
                info: false,
                paging: true,
                lengthChange: false,
                ordering: false,
                pageLength: 27,

                "ajax": {
                    "url": "admin_json_report_comment.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title",
                        width: '10%',
                        className: 'dt-center'
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "comment"
                    },
                    {
                        "data": "image"
                    },
                    {
                        "data": "actions",
                        width: '10%',
                        className: 'dt-center'
                    },


                ]
            });


            $('body').on('click', '.showThumbnailBtn', function() {
                // Extract the data-id and data-name attributes from the button
                var imageId = $(this).data('id');
                var imageName = $(this).data('name');

                // Generate the HTML for the image
                var imageHTML = '<div><img src="../' + imageId + '" alt="Image" style="width:300px;height:300px;"><p>Image ' + imageName + '</p></div>';

                // Use SweetAlert to display the image with its name
                Swal.fire({
                    title: 'Comment Image Preview',
                    html: imageHTML,
                    confirmButtonText: 'Close'
                });
            });

            $('#reportComments').on('click', '.delete-comment', function() {
                var CommentID = $(this).data('comment-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this Comment?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    confirmButtonClass: 'btn btn-danger', // Add this line to assign the red color
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "delete_comment.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                CommentID: CommentID,
                            },
                            success: function(response) {
                                // Reload the DataTable
                                $('#reportComments').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });
            });

            $('#reportComments').on('click', '.approve-comment', function() {
                var CommentID = $(this).data('comment-id');

                Swal.fire({
                    title: "Confirm Approve",
                    text: "Are you sure you want to approve this Comment?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Approve",
                    confirmButtonClass: 'btn btn-success', // Add this line to assign the red color
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "approve_comment.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                CommentID: CommentID,
                            },
                            success: function(response) {
                                // Reload the DataTable
                                $('#reportComments').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });
            });




        });
    </script>



</body>

</html>