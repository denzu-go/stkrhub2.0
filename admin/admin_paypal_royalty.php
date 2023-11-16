<?php
session_start();
include 'connection.php';

$confirm = '';

if (isset($_SESSION['confirm'])) {
    $confirm = $_SESSION['confirm'];
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
                            <h4>Paypal account & Royalty percentage</h4>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>





                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="container my-5">


                                    <?php
                                    $sql = "SELECT classification, constant_id, text FROM constants WHERE text IS NOT NULL";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $paypal = $result->fetch_assoc();

                                    if ($confirm == '1') {
                                        echo '<p style="color:green; text-align:center;"> Account has been changed Successfully </p> ';
                                        unset($_SESSION['confirm']);
                                    }
                                    ?>

                                    <div class="row mb-3">

                                        <label class="col-sm-3 col-form-label"> <?php echo $paypal['classification']; ?> :</label>
                                        <p> <?php echo $paypal['text']; ?></p>
                                    </div>

                                    <form method="post" id="changeAccount" enctype="multipart/form-data">
                                        <div class="row mb-3 changeAccount" style="display : none;">

                                            <input type="hidden" name="id" value="<?php echo $paypal['constant_id'] ?>">
                                            <label class="col-sm-3 col-form-label">New Paypal Account:</label>

                                            <input type="input" name="account" value="" style="width:500px;">

                                            <div class="row mb-3">
                                                <div class="offset-sm-3 col-sm-3 d-grid">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <div class="col-sm-3 d-grid">
                                                    <button type="button" class="btn btn-outline-primary" id="cancelEditPaypal">Cancel</button>

                                                </div>
                                            </div>


                                        </div>


                                    </form>

                                    <div class="row mb-3" style="margin-left:300px;">
                                        <button id="editPaypal" class="btn btn-primary">Change Account</button>
                                    </div>












                                </div>

                            </div>
                        </div>
                    </div>

                </div>



                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="container my-5">

                                    <?php
                                    $sql1 = "SELECT * from markup_percentage";

                                    $stmt1 = $conn->prepare($sql1);
                                    $stmt1->execute();
                                    $result1 = $stmt1->get_result();
                                    $markup = $result1->fetch_assoc();

                                    if ($confirm == '2') {
                                        echo '<p style="color:green; text-align:center;"> Royalty Percent has been changed Successfully </p> ';
                                        unset($_SESSION['confirm']);
                                    }
                                    ?>

                                    <div class="row mb-3">

                                        <label class="col-sm-3 col-form-label"> Royalty Percentage :</label>
                                        <p> <?php echo $markup['percentage']; ?> %</p>
                                    </div>

                                    <form method="post" id="changeMarkup" enctype="multipart/form-data">
                                        <div class="row mb-3 changeMarkup" style="display : none;">

                                            <input type="hidden" name="id" value="<?php echo $markup['id'] ?>">
                                            <label class="col-sm-3 col-form-label">New Royalty Percentage:</label>

                                            <input type="number" name="percentage" min="0" style="width:100px;">

                                            <div class="row mb-3">
                                                <div class="offset-sm-3 col-sm-3 d-grid">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <div class="col-sm-3 d-grid">
                                                    <button type="button" class="btn btn-outline-primary" id="cancelEditMarkup">Cancel</button>

                                                </div>
                                            </div>


                                        </div>


                                    </form>

                                    <div class="row mb-3" style="margin-left:300px;">
                                        <button id="editMarkup" class="btn btn-primary">Change Royalty</button>
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

            $("#changeAccount").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                // Send an AJAX POST request
                $.ajax({
                    type: "POST",
                    url: "admin_process_change_paypal.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data inserted successfully!',
                        }).then(function() {
                            // Redirect to add_game_piece.php with the category parameter

                            window.location.href = "admin_paypal_royalty.php"
                        });


                        $("#changeAccount")[0].reset();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error in submitting data: ' + error.responseText,
                        });
                    }
                });

            });


            $("#changeMarkup").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                // Send an AJAX POST request
                $.ajax({
                    type: "POST",
                    url: "admin_process_change_Royalty.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data inserted successfully!',
                        }).then(function() {
                            // Redirect to add_game_piece.php with the category parameter

                            window.location.href = "admin_paypal_royalty.php"
                        });


                        $("#changeMarkup")[0].reset();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error in submitting data: ' + error.responseText,
                        });
                    }
                });

            });





            var editPaypalButton = document.getElementById('editPaypal');
            var changeAccountDiv = document.querySelector('.changeAccount');
            var cancelEditPaypalButton = document.getElementById('cancelEditPaypal');

            // Add a click event listener to the "Change Account" button
            editPaypalButton.addEventListener('click', function() {
                // Hide the "Change Account" button
                editPaypalButton.style.display = 'none';
                // Show the "changeAccount" div
                changeAccountDiv.style.display = 'block';
            });

            // Add a click event listener to the "Cancel" button
            cancelEditPaypalButton.addEventListener('click', function() {
                // Hide the "changeAccount" div
                changeAccountDiv.style.display = 'none';
                // Show the "Change Account" button
                editPaypalButton.style.display = 'block';
            });



            var editRoyaltyButton = document.getElementById('editMarkup');
            var changeRoyaltyDiv = document.querySelector('.changeMarkup');
            var cancelEditRoyaltyButton = document.getElementById('cancelEditMarkup');

            // Add a click event listener to the "Change Account" button
            editRoyaltyButton.addEventListener('click', function() {
                // Hide the "Change Account" button
                editRoyaltyButton.style.display = 'none';
                // Show the "changeAccount" div
                changeRoyaltyDiv.style.display = 'block';
            });

            // Add a click event listener to the "Cancel" button
            cancelEditRoyaltyButton.addEventListener('click', function() {
                // Hide the "changeAccount" div
                changeRoyaltyDiv.style.display = 'none';
                // Show the "Change Account" button
                editRoyaltyButton.style.display = 'block';
            });



        });
    </script>



</body>

</html>