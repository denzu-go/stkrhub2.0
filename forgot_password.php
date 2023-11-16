<?php
session_start();
$token = '';

if (isset($_GET["token"])) {
    $token = $_GET["token"];
} else {
    header("location:email_forgot_password.php");
   
}

$change = '';

if (isset($_SESSION['change'])) {
    $change = $_SESSION['change'];
}

$credentials = '';

if (isset($_SESSION['credentials'])) {
    $credentials = $_SESSION['credentials'];
}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
        <?php
        include 'css/body.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'connection.php';
    include 'html/page_header.php';


    ?>

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to STKR HUBS?</h4>
                            <p>Click the "Create an Account" Button to sign up and browse our games and products!</p>
                            <a class="primary-btn" href="registration_page.php">Create an Account</a>
                        </div>
                    </div>
                </div>

                


                <?php
                if ($change == 'true') {
                    unset($_SESSION['change']);
                  
                    echo '<div class="col-lg-6" id="forgotPassForm" style="display:block;">
                    <div class="login_form_inner">
                        <h3>Password has been Successfully Changed</h3>

                        <div class="col-md-12 form-group">
                               
                                <a href="login_page.php">Go back to Log In</a>
                            </div>

                    </div>
                </div>';
                

                } else {

                    echo '<div class="col-lg-6" id="forgotPassForm" style="display:block;">
                    <div class="login_form_inner">
                        <h3>Enter New Password</h3>';

                        
                        if ($credentials == 'false') {
                            echo '<p style="color:red;"> Password does not match </p>';
                            unset($_SESSION['credentials']);
                        }
                        

                        echo '<form class="row login_form" action="process_forgot_password.php" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="token" value="' . $token . '">
                        <div class="col-md-12 form-group">
                            <input required type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Password\'">
                        </div>
                    
                        <div class="col-md-12 form-group">
                            <input required type="password" class="form-control" id="conpassword" name="conpassword" placeholder="Confirm Password" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Confirm Password\'">
                        </div>
                    
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Confirm</button>
                            <a href="login_page.php">Remember Password?</a>
                        </div>
                    </form>';
                 }
                    
                ?>



            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

    <?php
    include 'html/page_footer.php';
    ?>


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>





</html>