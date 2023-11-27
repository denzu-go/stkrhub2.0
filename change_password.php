<?php
session_start();
$user_id;
include 'connection.php';
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
$sqlUserDetails = "SELECT * FROM users WHERE user_id = $user_id";
$resultUserDetails = $conn->query($sqlUserDetails);
while ($fetchedUserDetails = $resultUserDetails->fetch_assoc()) {

    $username = $fetchedUserDetails['username'];
    $firstname = $fetchedUserDetails['firstname'];
    $lastname = $fetchedUserDetails['lastname'];
    $phone_number = $fetchedUserDetails['phone_number'];
    $email = $fetchedUserDetails['email'];
    $avatar = $fetchedUserDetails['avatar'];
}

$credentials = '';
if (isset($_SESSION['credentials'])) {
    $credentials = $_SESSION['credentials'];
}

include 'html/get_bg.php';
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- CSS ================================ -->
    <link rel="stylesheet" href="css/linearicons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/font-awesome.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/themify-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/owl.carousel.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nice-select.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nouislider.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/ion.rangeSlider.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/magnific-popup.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">


    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">


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

        /* sidebar active */
        #sidebar .active {
            background-color: #272a4e;
            border-radius: 14px;
        }
    </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php

    include 'html/page_header.php';

    $my_profile = '';
    $my_addresses = '';
    $my_purchase = '';
    $stkr_wallet = '';
    $change_password = 'active';

    ?>

    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <section class="sample-text-area" style="background: none;">
        <div class="container">

            <div class="wrapper d-flex align-items-stretch row">

                <!-- profile sidebar -->
                <?php include 'html/profile_sidebar.php'; ?>

                <div id="content" class="col">

                    <!-- content -->
                    <div class="container">
                        <div class="container">
                            <div class="main-body">

                                <div class="row gutters-sm">

                                    <div class="col-md-4 mb-3">

                                        <div class="col-md-8">
                                            <div class="card mb-3" style="background: rgba(39, 42, 78, 0.57);
                                        border-radius: 7px 7px 7px 7px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                        backdrop-filter: blur(5.7px);
                                        -webkit-backdrop-filter: blur(5.7px);
                                        width:500px;
                                        margin-left:150px;">
                                                <div class="card-body">

                                                    <?php

                                                    if ($credentials == '1') {
                                                        echo '<p style"color:red;> Wrong Old Password </p>';
                                                        unset($_SESSION['credentials']);
                                                    } else if ($credentials == '2') {
                                                        echo '<p style"color:red;> New Passwords does not Match </p>';
                                                        unset($_SESSION['credentials']);
                                                    } else if ($credentials == '3') {
                                                        echo '<p style"color:green;> Password has been changed Succesfully</p>';
                                                        unset($_SESSION['credentials']);
                                                    }

                                                    ?>
                                                    <form id="changePassword" method="post" action="process_change_profile.php">
                                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                                                        <div class="form-group">
                                                            <label for="oldPassword">Old Password:</label>
                                                            <input type="password" class="form-control" id="old" name="old" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="newPassword">New Password:</label>
                                                            <input type="password" class="form-control" id="new" name="new" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="conPassword">Confirm Password:</label>
                                                            <input type="password" class="form-control" id="con" name="con" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
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
    </section>

    <!-- start footer Area -->
    <?php include 'html/page_footer.php'; ?>
    <!-- End footer Area -->






    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Filepond JavaScript -->
    <script src="https://unpkg.com/filepond@4.23.1/dist/filepond.min.js"></script>

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>



    <script>
        /*    $(document).ready(function() {
            // JavaScript
           

            $("#changePassword").submit(function(e) {
    e.preventDefault(); // Prevent the default form submission
    var formData = new FormData(this); // Create a FormData object

    // Send an AJAX POST request
    $.ajax({
        type: "POST",
        url: "process_change_profile.php", // Point to the same page
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Handle the response if needed
            // If you want to display a success message, you can do so here

            // Reset the form if needed
            $("#changePassword")[0].reset();
        },
        error: function(error) {
            // Handle errors if needed
            // You can display an error message or take appropriate actions here
        }
    });
});


        }); */
    </script>

</body>

</html>