<?php
session_start();
include 'connection.php';

$help_category;

if (isset($_GET['category'])) {
    $help_category = $_GET['category'];
}

$sql = "SELECT * FROM faq where faq_category = '$help_category'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$faq = $result->fetch_assoc();

$_SESSION['help_category'] = $help_category;
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
                            <h4>Contents of HELP: <?php echo $faq['faq_category']; ?></h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="categoryContent" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>CoverPhoto</th>
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

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                            <?php
                            if ($faq['faq_type'] == 1) {


                                echo '
                                        <table id="helpContentTable" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Tutorial Link</th>
                                                <th>Showcased</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <div class="row mb-3">
                                    <div class="col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" href="add_help_content.php?category='.$help_category.'" role="button">Add Content</a>
                                    </div>
                                </div>
                                ';
                            } else {
                                echo '<table id="helpContentTable2" class="display" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="row mb-3">
                                    <div class="col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" href="add_help.php?category='.$help_category.'" role="button">Add Content</a>
                                    </div>
                                </div>
                            ';
                            }
                            ?>

                               

                                
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- row -->





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


            $('#helpContentTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_help.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "link"
                    },
                    {
                        "data": "showcased",
                        "render": function(data, type, row) {
                            return data;
                        }
                    },
                    {
                        "data": "actions",
                        width: '10%',
                        className: 'dt-center'
                    },


                ]
            });

            $('#helpContentTable2').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_help.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title"
                    },
                    {
                        "data": "description"
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

            $('#categoryContent').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_help_category.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title"
                    },
                    {
                        "data": "description"
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


            $(document).ready(function() {
                // Event handler for the "Show Image" button
                $('body').on('click', '[id^="showImage_"]', function() {
                    // Extract the image path from the button's ID
                    var imagePath = $(this).data('id');

                    // Generate the HTML for the image
                    var imageHTML = '<img src="' + imagePath + '" alt="Image" style = "width:300px;height:300px;">';

                    // Use SweetAlert to display the image
                    Swal.fire({
                        title: 'Image Preview',
                        html: imageHTML,
                        confirmButtonText: 'Close'
                    });
                });
            });



        });
    </script>



</body>

</html>