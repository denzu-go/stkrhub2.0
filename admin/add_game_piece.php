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
                                            <th>Upload Only</th>
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

                                <table id="gamePieceTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Component Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Size</th>
                                            <th>Colors</th>
                                            <th>Templates</th>
                                            <th>Thumbnails</th>
                                            <th>Available</th>
                                            <th> Actions </th>
                                              
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




            $('#gameComponent').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,

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
                        "data": "upload",
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
                        data: "thumbnails"
                    },
                    {
                        data: "available"
                    },
                    {
                        data: "actions"
                    }

                ]
            });



            $('body').on('click', '.showTemplateBtn', function() {
                // Extract the data-id and data-name attributes from the button
                var imageId = $(this).data('id');
                var imageName = $(this).data('name');

                // Generate the HTML for the image
                var imageHTML = '<div><img src="../' + imageId + '" alt="Image" style="width:300px;height:300px;"><p>' + imageName + '</p></div>';

                // Use SweetAlert to display the image with its name
                Swal.fire({
                    title: 'Image Preview',
                    html: imageHTML,
                    confirmButtonText: 'Close'
                });
            });

            $('body').on('click', '.showThumbnailBtn', function() {
                // Extract the data-id and data-name attributes from the button
                var imageId = $(this).data('id');
                var imageName = $(this).data('name');

                // Generate the HTML for the image
                var imageHTML = '<div><img src="../' + imageId + '" alt="Image" style="width:300px;height:300px;"><p>Thumbnail ' + imageName + '</p><a class="btn btn-outline-primary" data-id = "' + imageId + '"role="button" id="thumbnailButton">Make Thumbnail</a></div>';

                // Use SweetAlert to display the image with its name
                Swal.fire({
                    title: 'Image Preview',
                    html: imageHTML,
                    confirmButtonText: 'Close'
                });
            });


            $('body').on('click', '#thumbnailButton', function(e) {
                // Prevent the default behavior of the link
                e.preventDefault();

                // Get the data-id attribute value
                var imageId = $(this).data("id");
                console.log('Make Thumbnail clicked for image ID: ' + imageId);

                // Display a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This image will be the thumbnail for this component',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, make thumbnail!'
                }).then((result) => {
                    // If the user clicks "Yes," proceed with the AJAX request
                    if (result.isConfirmed) {
                        // Make the AJAX request using the fetched imageId
                        $.ajax({
                            type: "GET",
                            url: "admin_process_thumbnail.php?id=" + imageId, // Use 'id' instead of 'imageId'
                            success: function(response) {
                                // Handle the success response
                                console.log("Thumbnail request successful", response);
                            },
                            error: function(xhr, status, error) {
                                // Handle errors
                                console.error("Error making thumbnail request", error);
                            }
                        });
                    }
                });
            });



            $('#gamePieceTable').on('click', '.delete-component', function() {
                var ComponentID = $(this).data('component-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this Game Component?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    confirmButtonClass: 'btn btn-danger', // Add this line to assign the red color
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "delete_game_component.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                ComponentID: ComponentID,
                            },
                            success: function(response) {
                                // Reload the DataTable
                                $('#gamePieceTable').DataTable().ajax.reload();
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