<?php
session_start();
include 'connection.php';

$tutID;

if (isset($_GET['id'])) {

    $tutID = $_GET['id'];
}

$tut_sql = "SELECT *
            FROM tutorials
            LEFT JOIN faq ON tutorials.faq_id = faq.faq_id
            WHERE tutorial_id = $tutID";

$tut_query = $conn->query($tut_sql);
$tut_row = $tut_query->fetch_assoc();



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
                        <h4>Edit <?php echo htmlspecialchars($tut_row['tutorial_title']); ?> Content</h4>
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

                                        <input type="hidden" name="id" value="<?php echo $tutID; ?>">
                                        <input type="hidden" name="faq_id" value="<?php echo $tut_row['faq_id']; ?>">

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="title">Tutorial Title:</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $tut_row['tutorial_title']; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="title">Tutorial Description:</label>
                                            <div class="col-sm-6">
                                            <textarea name="description" rows="4" cols="50"> <?php echo $tut_row['tutorial_description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="link">Tutorial Youtube Link:</label>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" id="link" name="link" value="<?php echo $tut_row['tutorial_link']; ?>">
                                            </div>
                                        </div>

                                       

                                        <div class="row mb-3">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-3 d-grid">
                                                <a class="btn btn-outline-primary" href="admin_help.php?category=<?php echo $tut_row['faq_category']; ?>" role="button">Cancel</a>
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
           

            $("#myForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                // Send an AJAX POST request
                $.ajax({
                    type: "POST",
                    url: "admin_process_edit_help_content.php",
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
                            var category = "<?php echo $tut_row['faq_category']; ?>";
                            window.location.href = "admin_help.php?category=" + category;
                        });

                        $('#gamePieceTable').DataTable().ajax.reload();
                        $("#myForm")[0].reset();
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

        });
    </script>



</body>

</html>
