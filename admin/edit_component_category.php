<?php
session_start();
include 'connection.php';

$component_id;

if (isset($_GET['id'])) {

    $component_id = $_GET['id'];
}

$sql = "SELECT * FROM component_category WHERE component_category_id = $component_id";
$query = $conn->query($sql);
$component_row = $query->fetch_assoc();


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

    <link rel="stylesheet" href="">


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
                            <h4>Edit <?php echo $component_row['category'] ?></h4>
                            <p class="mb-0">Edit Details</p>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="container my-5">
                                    <form method="post" id="myForm" enctype="multipart/form-data" action="admin_process_edit_component_category.php">
                                        <input type="hidden" name="id" value="<?php echo $component_id; ?>">
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="category">Category Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="category" name="category" value="<?php echo $component_row['category']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label">Uploaded Image:</label>
                                            <div class="col-sm-6">
                                                <a href="<?php echo $row['component_image_path']; ?>" download style="color: blue;">Cover Photo</a>
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label">New Cover Photo:</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" name="coverPhoto" accept="image/*" id="coverPhoto">
                                                <a href="#" class="remove-coverPhoto" data-cover-id="coverPhoto" style="color: red;">Remove</a>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="upload">Upload Only:</label>
                                            <div class="col-sm-6">
                                                <select name="uplpad" id="upload">
                                                    <?php 

                                                    if ($component_row['is_upload_only'] == 1) {
                                                        echo '<option value="1"> yes </option>
                                                        <option value="0"> no </option>';
                                                    } else {
                                                        echo '<option value="0"> no </option>
                                                        <option value="1"> yes </option>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select><br><br>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-3 d-grid">
                                                <a class="btn btn-outline-primary" href="add_game_piece.php?category=<?php echo $component_row['category']; ?>" role="button">Cancel</a>
                                            </div>
                                        </div>
                                    </form>

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
            // JavaScript
            $(document).ready(function() {
                $(".remove-coverPhoto").click(function(e) {
                    e.preventDefault();
                    var coverId = $(this).data('cover-id');
                    var fileInput = $("#" + coverId);

                    // Clear the file input field
                    fileInput.val('');
                });
            });

           




        });
    </script>



</body>

</html>