<?php
session_start();
include 'connection.php';

$admin_id;

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}

$sqladminDetails = "SELECT * FROM admins WHERE admin_id = $admin_id";
$resultadminDetails = $conn->query($sqladminDetails);
$admin = $resultadminDetails->fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Edit Admin</title>
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/bootstrap.min.css">

    <!-- Bootstrap JS (optional) -->
    <script src="path/to/bootstrap.bundle.min.js"></script>









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
            padding-top: 100%;
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            /* -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 100%); */
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
            padding: 7px 14px;
            display: block;
            color: #e7e7e7;
            font-size: small;
        }

        #sidebar ul li a:hover {
            color: #e7e7e7;
            background: #272a4e;
            border-radius: 14px;
        }

        /* buttons */
        .edit-btn-avatar {
            background-color: transparent !important;
            border: none;
            cursor: pointer;
            color: #90ee90;
        }
    </style>

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
                            <h4><?php echo $admin['username'] ?></h4>
                            <p class="mb-0">Profile Details</p>
                        </div>
                    </div>
                </div>

                <section class="sample-text-area" style="background: none;">
                    <div class="container">

                        <div class="wrapper d-flex align-items-stretch row">

                            <!-- profile sidebar -->
                            <div id="content" class="col">

                                <!-- content -->
                                <div class="container">
                                    <div class="container">
                                        <div class="main-body">

                                            <div class="row gutters-sm">

                                                <div class="col-md-4 mb-3">

                                                    <div class="card" style="background: rgba(39, 42, 78, 0.57);
                                                            border-radius: 7px 7px 7px 7px;
                                                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                                            backdrop-filter: blur(5.7px);
                                                            -webkit-backdrop-filter: blur(5.7px);">
                                                        <table id="profilePicture" class="display" style="width: 100%;">
                                                            <tbody>
                                                                <div class="row pl-4 pr-4" style="display: flex; flex-direction: row; justify-content: center; align-items:center;">
                                                                    <div class="image-mini-container">
                                                                        
                                                                        <img src="<?php echo $admin['avatar'] ?>" alt="Admin" class="image-mini" style="padding:10px;border-radius:25px;">
                                                                    </div>

                                                                    <hr>

                                                                    <div class="col-sm-3 d-grid">
                                                                        <button type="button" id="upload" data-id = "<?php echo $admin_id; ?>"class="btn btn-outline-primary" style="color:lightgreen;border:none">Edit</a>
                                                                    </div>
                                                                </div>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="card mb-3">
                                                        <div class="card-body">

                                                            <div class="profile_details" style="display:block;">
                                                                <table id="profileDetails" class="display" style="width: 100%;">
                                                                    <tbody>

                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Username</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                <?php echo $admin['username'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <hr>


                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <h6 class="mb-0">Email</h6>
                                                                            </div>
                                                                            <div class="col-sm-9 text-secondary">
                                                                                <?php echo $admin['email']; ?>
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                        <div class="row">
                                                                            <div class="col-sm-3 d-grid">
                                                                                <button type="button" id="edit" class="btn btn-outline-primary">Edit</a>
                                                                            </div>
                                                                            <div class="col-sm-3 d-grid">
                                                                                <button type="button" id="changepass" class="btn btn-outline-primary" style="width:150px;">Change Password</a>
                                                                            </div>
                                                                        </div>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="change_details" style="display:none;">
                                                                <form id="editProfileForm" method="post">
                                                                    <input type="hidden" name="admin_id" id="admin_id_input" value="<?php echo $admin_id; ?>">
                                                                    <div class="form-group">
                                                                        <label for="username">Userame:</label>
                                                                        <input type="text" class="form-control" id="username" name="username" required value="<?php echo $admin['username']; ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="email">Email:</label>
                                                                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $admin['email']; ?>">
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-3 d-grid">
                                                                            <button type="submit" class="btn btn-outline-primary">Submit</a>
                                                                        </div>
                                                                        <div class="col-sm-3 d-grid">
                                                                            <button type="button" class="btn btn-outline-primary" style="color:red;border-color:red">Cancel</a>
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                            </div>

                                                            <div class="change_password" style="display:none;">
                                                                <form id="editPasswordForm" method="post">
                                                                    <input type="hidden" name="admin_id" id="admin_id_input" value="<?php echo $admin_id; ?>">
                                                                
                                                                    <div class="form-group">
                                                                        <label for="username">New Password:</label>
                                                                        <input type="password" class="form-control" id="new" name="new" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username"> Confirm Password:</label>
                                                                        <input type="password" class="form-control" id="con" name="con" required>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-3 d-grid">
                                                                            <button type="submit" class="btn btn-outline-primary">Submit</a>
                                                                        </div>

                                                                        <div class="col-sm-3 d-grid">
                                                                            <button type="button" class="btn btn-outline-primary" style="color:red;border-color:red">Cancel </a>
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
                                </div>

                            </div>

                        </div>

                    </div>
                </section>

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


    <!-- Add this script inside your HTML file -->
    <script>
        // Wait for the document to be ready
        $(document).ready(function() {

            // When the "Edit" button is clicked
            $('#edit').on('click', function() {
                // Hide profile_details, show change_details
                $('.profile_details').hide();
                $('.change_details').show();
            });

            // When the "Change Password" button is clicked
            $('#changepass').on('click', function() {
                // Hide profile_details, show change_password
                $('.profile_details').hide();
                $('.change_password').show();
            });

            // When the "Cancel" button inside change_details is clicked
            $('.change_details .btn-outline-primary').on('click', function() {
                // Show profile_details, hide change_details
                $('.profile_details').show();
                $('.change_details').hide();
            });

            // When the "Cancel" button inside change_password is clicked
            $('.change_password .btn-outline-primary').on('click', function() {
                // Show profile_details, hide change_password
                $('.profile_details').show();
                $('.change_password').hide();
            });





            $("#editPasswordForm").submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this); // Create a FormData object

            // Send an AJAX POST request
            $.ajax({
                type: "POST",
                url: "admin_process_edit_change_password.php",
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
                            window.location.href = "admin_profile.php";
                        });

                        // Reload DataTables if needed
                        
                    } else {
                        // Display the error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        }).then(function() {
                            // Redirect to admin_account_management.php on success
                            $("#editPasswordForm")[0].reset();
                        });
                    }
                },
                error: function(error) {
                    // Display a generic error message for AJAX errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error in submitting data: ' + error.responseText,
                    }).then(function() {
                            // Redirect to admin_account_management.php on success
                            $("#editPasswordForm")[0].reset();
                        });
                }
            });
        });


        $("#editProfileForm").submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this); // Create a FormData object

            // Send an AJAX POST request
            $.ajax({
                type: "POST",
                url: "admin_process_edit_profile.php",
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
                            window.location.href = "admin_profile.php";
                        });

                        // Reload DataTables if needed
                        
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






       // Assuming this script is included after jQuery and SweetAlert libraries

// Assuming this script is included after jQuery and SweetAlert libraries

$('body').on('click', '#upload', function() {
    // Extract the admin_id from the button's data-id attribute
    var admin_id = $(this).data('id');

    // Create a SweetAlert form for image upload
    Swal.fire({
        title: 'Upload Image',
        html: '<input type="file" id="imageUploadInput" accept="image/*">',
        showCancelButton: true,
        confirmButtonText: 'Upload',
        preConfirm: () => {
            const fileInput = document.getElementById('imageUploadInput');
            const file = fileInput.files[0];

            if (!file) {
                Swal.showValidationMessage('Please select an image to upload.');
            } else {
                // You can use FormData to send the file and admin_id to the server
                const formData = new FormData();
                formData.append('file', file);
                formData.append('admin_id', admin_id);

                // You can use AJAX or fetch to send the file and admin_id to the server
                // Example using fetch:
                fetch('admin_process_avatar.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Image uploaded successfully!', '', 'success');
                            setTimeout(() => {
                                location.reload(); // Reload the page
                            }, 2000); // Delay for 2 seconds (adjust as needed)
                        } else {
                            Swal.fire('Error uploading image', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire('Error uploading image', 'An error occurred.', 'error');
                    });
            }
        },
    });
});

});



    </script>




</body>

</html> 