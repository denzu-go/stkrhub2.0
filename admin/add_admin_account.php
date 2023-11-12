<?php
session_start();
include 'connection.php';
$is_super;

if (isset($_GET['is_super'])) {
    $is_super = $_GET['is_super'];
}


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
                            <?php
                            if ($is_super == 1) {
                                echo ' <h4>Add Super Admin Account</h4> ';
                            } else {
                                echo ' <h4>Add Admin Account</h4> ';
                            }

                            ?>

                            <p class="mb-0">Fill Up Details</p>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                


                                <div class="container my-5">
                                    <form method="post" id="myForm" enctype="multipart/form-data">

                                        <input type="hidden" name="super" value="<?php echo $is_super; ?>">

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="username">Username:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="email">Email Address:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="password">Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="conpassword">Confirm Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="conpassword" name="conpassword">
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-3 d-grid">
                                                <a class="btn btn-outline-primary" href="admin_account_management.php" role="button">Cancel</a>
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
        // Form submission using AJAX
        $("#myForm").submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this); // Create a FormData object

            // Send an AJAX POST request
            $.ajax({
                type: "POST",
                url: "admin_process_add_admin_account.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Parse the JSON response
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                        console.error("Error parsing JSON response:", e);
                        return;
                    }

                    // Check the status in the response
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                        }).then(function() {
                            // Redirect to admin_account_management.php on success
                            window.location.href = "admin_account_management.php";
                        });

                        // Reload DataTables if needed
                        $('#adminTable').DataTable().ajax.reload();
                        $('#superTable').DataTable().ajax.reload();
                        $("#myForm")[0].reset();
                    } else {
                        // Display the error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(error) {
                    // Display a generic error message for AJAX errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error in submitting data: ' + error.responseText,
                    });
                }
            });
        });
    });



    
    </script>



</body>

</html>