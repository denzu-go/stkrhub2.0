<?php

include 'connection.php';

session_start();
if (isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
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
        <?php include 'css/body.css';
        ?>
    </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php
    include 'connection.php';
    include 'html/page_header.php';
    ?>

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Registration Form</h3>

                        <?php

                        if ($credentials == 'false') {
                            echo '<p style="color:red;">Username or Email is already Taken</p>';
                            unset($_SESSION['credentials']);
                        }

                        ?>


                        <form class="row login_form" action="process_registration.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>


                            <div class="row d-flex justify-content-center" style="margin-left:10px; margin-bottom:30px;">
                                <label>
                                    <input id="registration_checkbox" name="registration_checkbox" type="checkbox" />

                                </label>
                                &nbsp; I agree to these &nbsp;<a role="button" id="termsAndCondi" style="color:aquamarine; cursor:pointer;">Terms of Service</a> &nbsp; &
                                &nbsp;<a role="button" id="privacy" style="color:aquamarine; cursor:pointer;">Privacy Policy</a>
                            </div>



                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn" id="register-button">Register</button>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Already Have an Account?</h4>
                            <p>Click the "Log In" button to purchase and publish our Tabletops games and more!</p>
                            <a class="primary-btn" href="login_page.php">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

    <!--================Modal Area =================-->
    <div class="modal fade" id="termsAndConditions">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:cadetblue;" id="exampleModalLongTitle">Terms of Service</h5>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                    <?php
                    $help_sql = "SELECT *
                 FROM help
                 WHERE help_title LIKE 'terms of service'";

                    $help_query = $conn->query($help_sql);
                    $help_row = $help_query->fetch_assoc();

                    if ($help_row) {
                        $formatted_description = nl2br(htmlspecialchars($help_row['help_description']));
                        echo $formatted_description;
                    } else {
                        echo "No description available for 'terms and conditions'.";
                    }
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="policy">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:cadetblue;" id="exampleModalLongTitle">Privacy Policy</h5>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                    <?php
                    $help_sql = "SELECT *
                 FROM help
                 WHERE help_title LIKE 'privacy policy'";

                    $help_query = $conn->query($help_sql);
                    $help_row = $help_query->fetch_assoc();

                    if ($help_row) {
                        $formatted_description = nl2br(htmlspecialchars($help_row['help_description']));
                        echo $formatted_description;
                    } else {
                        echo "No description available for 'Privacy Policy'.";
                    }
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <?php
    include 'html/page_footer.php';
    ?>


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
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


    <script>
        $(document).ready(function() {

            $('#termsAndCondi').click(function() {
                $("#termsAndConditions").modal("show");
            });

            $('#privacy').click(function() {
                $("#policy").modal("show");
            });

        });

        $(window).on('load', function() {


            $('#register-button').prop('disabled', true);
            $('#register-button').css({

                'opacity': '0.2'
            });

            $('#registration_checkbox').change(function() {
                if ($('#registration_checkbox').prop('checked')) {
                    $('#register-button').prop('disabled', false);
                    $('#register-button').css({

                        'opacity': '1'
                    });

                } else if (!$('#registrationt_checkbox').prop('checked')) {
                    $('#register-button').prop('disabled', true);
                    $('#register-button').css({

                        'opacity': '0.2'
                    });
                }
            });


        })
    </script>
</body>

</html>