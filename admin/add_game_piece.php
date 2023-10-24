<?php
session_start();
include 'connection.php';

$category;

if (isset($_GET['category'])) {

    $category = $_GET['category'];
}

$_SESSION['category'] = $category;

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
                            <h4><?php echo $category ?></h4>
                            <p class="mb-0">Fill the Details</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="gameComponent" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
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
                <!-- row -->



                <!-- <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-intro-title">Add Game Component</h4>

                                <form id="myForm" enctype="multipart/form-data" method="post">
                                    <label for="name">Name:</label><br>
                                    <input type="text" id="name" name="name" required><br><br>

                                    <label for="description">Description:</label><br>
                                    <textarea id="description" name="description" rows="4" cols="20" required></textarea><br><br>

                                    <label for="price">Price:</label><br>
                                    <input type="number" id="price" name="price" min="0" placeholder="0" required><br><br>

                                    <label for="color">Has color:</label><br>
                                    <select name="color" id="color">
                                        <option value=""> Select Option</option>
                                        <option value="1"> yes </option>
                                        <option value="0"> no </option>
                                    </select><br><br>

                                    <div id="colorInput" style="display: none;">

                                        <label for="color_number">No. of Colors</label><br>
                                        <input type="number" id="color_number" name="color_number" min="0" placeholder="0"><br><br>

                                    </div>

                                    <div id="colorFields" style="display: none;">



                                    </div>


                                    <label for="size">Size:</label><br>
                                    <input type="text" id="size" name="size" required><br><br>



                                    <label for="No_template">No. Template</label><br>
                                    <input type="number" id="No_template" name="No_template" min="0" placeholder="0"><br><br>

                                    <div id="TemplateFields" style="display: block;"> </div>

                                    <label for="No_thumbnail">No. Thumbnail</label><br>
                                    <input type="number" id="No_thumbnail" name="No_thumbnail" min="0" placeholder="0"><br><br>

                                    <div id="thumbnailFields" style="display: block;"> </div>


                                        <input type="submit" value="Submit">
                                </form>

                            </div>
                        </div>
                    </div>-->




                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="gamePieceTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Component Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>colors</th>
                                            <th>template</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <div class="row mb-3">
                                    <div class="col-sm-3 d-grid">
                                        <a class="btn btn-outline-primary" href="add_game_component.php?category=<?php echo $category; ?>" role="button">Add Component</a>
                                    </div>
                                </div>
                            </div>

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

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {


            $(document).ready(function() {

                $('#gameComponent').DataTable({
                    searching: true,
                    info: false,
                    paging: true,
                    ordering: true,

                    "ajax": {
                        "url": "admin_json_game_component.php",
                        data: {},
                        "dataSrc": ""
                    },
                    "columns": [{
                        "data": "title"
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


                $('#gamePieceTable').DataTable({
                    searching: true,
                    info: false,
                    paging: true,
                    ordering: true,
                    ajax: {
                        url: "admin_json_gamepiece_table.php",
                        data: {}, // You can add additional data parameters if needed
                        dataSrc: ""
                    },
                    columns: [{
                            data: "name"
                        },
                        {
                            data: "description"
                        },
                        {
                            data: "price"
                        },
                        {
                            data: "size"
                        },
                        {
                            data: "colors"
                        },
                        {
                            data: "templates"
                        },
                        {
                            data: "actions"
                        }
                    ]
                });
            });





            





        });

    </script>



</body>

</html>