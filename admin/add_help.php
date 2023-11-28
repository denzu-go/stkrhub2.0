<?php
session_start();
include 'connection.php';

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

$category;

if (isset($_GET['category'])) {

    $category = $_GET['category'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> STKR Admin - Add <?php echo htmlspecialchars($category); ?> </title>
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
                            <h4>Add <?php echo htmlspecialchars($category); ?> Content</h4>
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

                                        <input type="hidden" name="category" value="<?php echo $category; ?>">

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="title"> <?php echo htmlspecialchars($category); ?> Title:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="desciption"><?php echo htmlspecialchars($category); ?> Description:</label>
                                            <div class="col-sm-6">
                                                <textarea id="description" name="description" rows="30" cols="80"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3 color-row">
                                            <label class="col-sm-3 col-form-label"> New Photo:</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" name="photo" accept="image/*" id="coverPhoto">
                                                <a href="#" class="remove-coverPhoto" data-cover-id="coverPhoto" style="color: red;">Remove</a>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-3 d-grid">
                                                <a class="btn btn-outline-primary" href="admin_help.php?category=<?php echo $category; ?>" role="button">Cancel</a>
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





        <?php include 'html/admin_footer.php'; ?>



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

            $("#myForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to add this new help content',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    // If the user clicks "Yes," proceed with the AJAX request
                    if (result.isConfirmed) {
                        // Send an AJAX POST request
                        $.ajax({
                            type: "POST",
                            url: "admin_process_add_help.php",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.startsWith("Error")) {
                                    // Display an error message using SweetAlert
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: response,
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data inserted successfully!',
                                    }).then(function() {
                                        // Redirect to add_game_piece.php with the category parameter
                                        var category = "<?php echo $category; ?>";
                                        window.location.href = "admin_help.php?category=" + category;
                                    });

                                    $('#gamePieceTable').DataTable().ajax.reload();
                                    $("#myForm")[0].reset();
                                }
                            },
                            error: function(error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Error in submitting data: ' + error.responseText,
                                });
                            }
                        });
                    }
                });

            });

        });
    </script>



</body>

</html>