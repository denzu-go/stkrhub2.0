<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login_page.php");
    exit;
}

$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
}

$built_game_id = $_GET['built_game_id'];


// PENDINGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$sqlGetPendingPublishRequest = "SELECT * FROM pending_published_built_games WHERE built_game_id = $built_game_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedPendingPublishRequest = $queryGetPendingPublishRequest->fetch_assoc()) {
    $pending_published_built_game_id = $fetchedPendingPublishRequest['pending_published_built_game_id'];

    $pending_game_name = $fetchedPendingPublishRequest['game_name'];
    $pending_edition = $fetchedPendingPublishRequest['edition'];
    $pending_category = $fetchedPendingPublishRequest['category'];
    $pending_age_id = $fetchedPendingPublishRequest['age_id'];

    $pending_min_players = $fetchedPendingPublishRequest['min_players'];
    $pending_max_players = $fetchedPendingPublishRequest['max_players'];
    $pending_min_playtime = $fetchedPendingPublishRequest['min_playtime'];
    $pending_max_playtime = $fetchedPendingPublishRequest['max_playtime'];

    $pending_short_description = $fetchedPendingPublishRequest['short_description'];
    $pending_long_description = $fetchedPendingPublishRequest['long_description'];

    $pending_logo_path = $fetchedPendingPublishRequest['logo_path'];

    $pending_desired_markup = $fetchedPendingPublishRequest['desired_markup'];
    $pending_manufacturer_profit = $fetchedPendingPublishRequest['manufacturer_profit'];
    $pending_creator_profit = $fetchedPendingPublishRequest['creator_profit'];
    $pending_marketplace_price = $fetchedPendingPublishRequest['marketplace_price'];
}

// category
$sqlGetCategory = "SELECT * FROM categories WHERE category_id = $pending_category";
$queryGetCategory = $conn->query($sqlGetCategory);
while ($fetchedCategory = $queryGetCategory->fetch_assoc()) {
    $pending_category_name = $fetchedCategory['category_name'];
}

// age
$sqlGetAge = "SELECT * FROM age WHERE age_id = $pending_age_id";
$queryGetAge = $conn->query($sqlGetAge);
while ($fetchedAge = $queryGetAge->fetch_assoc()) {
    $pending_age_value = $fetchedAge['age_value'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Navigation with Hidden Sections</title>
    <!--CSS================================== -->
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

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- filepond css -->
    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.css" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

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

        .swiper-slide {
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-banner-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-banner {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }



        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .image-carousel-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-carousel {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .image-slide-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-slide {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }


        /* cancel button */
        #cancelButton {
            background-color: #dc3545 !important;
            border: none;
            cursor: pointer;
            border-radius: 14px;

            color: #fff;
        }
    </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php include 'html/page_header.php'; ?>
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap" style="background: none;">
        <div class="container" >

            <a href="javascript:history.back()" style="cursor:pointer;"><i class="fa-solid fa-arrow-left"></i> Back</a>

            <div class="row">
                <h4 class="mx-auto">Current Details Pending Request</h4>
            </div>
            <hr>

            <div class="row">
        <br>
                <!-- -- -->
                <div class="col-6">
                    <div class="container">

                        <div class="row">
                            <h6 class="">Final Publishing Game Name: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_game_name ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Edition: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_edition ?></h6>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Category: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_category_name ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Age: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_age_value ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Number of Players (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_min_players ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Number of Players (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_max_players ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Play Time (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_min_playtime ?> minutes</h6>
                        </div>
                        <div class="row">
                            <h6 class="">Play Time (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_max_playtime ?> minutes</h6>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Short Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                            <div class="container m-0 p-0"><?php echo $pending_short_description ?></div>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Long Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                            <div class="container m-0" style="background-color: #222f3e;"><?php echo $pending_long_description ?></div>

                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Cost: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_marketplace_price - $pending_desired_markup, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Desired Markup: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_desired_markup, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Manufacturer's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_manufacturer_profit, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Creator's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_creator_profit, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Marketplace Price: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_marketplace_price, 2) ?></h6>
                        </div>

                        <hr>


                    </div>

                </div>

                <div class="col-6">
                    <div class="row">
                        <h6 class="">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                        <div class="image-banner-container">
                            <img class="image-banner" src="<?php echo $pending_logo_path ?>" alt="">
                        </div>
                    </div>

                    <hr>

                    <!-- Swiper -->
                    <h6 class="">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                    <div class="swiper-container">

                        <div class="swiper mySwiper2_current" style="margin-bottom: 10px;">
                            <div class="swiper-wrapper">

                                <?php
                                $sqlBig = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                $resultBig = $conn->query($sqlBig);

                                while ($fetchedBig = $resultBig->fetch_assoc()) {
                                    $file_path = $fetchedBig['file_path'];

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    $file_extension = strtolower($extension);

                                    // Check if the file extension is "mp4"
                                    if ($file_extension === "mp4") {
                                        echo '
                                                <div class="swiper-slide">
                                                    <div class="image-carousel-container">
                                                        <video class="image-carousel" controls>
                                                            <source src="' . $file_path . '" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            ';
                                    } else {
                                        echo '
                                                <div class="swiper-slide">
                                                    <div class="image-carousel-container">
                                                        <img class="image-carousel" src="' . $file_path . '" />
                                                    </div>
                                                </div>
                                            ';
                                    }
                                }
                                ?>

                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <div thumbsSlider="" class="swiper mySwiper_current">
                            <div class="swiper-wrapper">

                                <?php
                                $sqlSmall = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                $resultSmall = $conn->query($sqlSmall);

                                while ($fetchedSmall = $resultSmall->fetch_assoc()) {

                                    $file_path = $fetchedSmall['file_path'];

                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    $file_extension = strtolower($extension);

                                    // Check if the file extension is "mp4"
                                    if ($file_extension === "mp4") {
                                        echo '
                                                <div class="swiper-slide">
                                                    <div class="image-slide-container">
                                                        <video class="image-slide">
                                                            <source src="' . $file_path . '">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            ';
                                    } else {
                                        echo '
                                            <div class="swiper-slide">
                                                <div class="image-slide-container">
                                                    <img class="image-slide" src="' . $file_path . '" />
                                                </div>
                                            </div>

                                        ';
                                    }
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <hr>

            <div class="row d-flex justify-content-end">
                <button id="cancelButton" data-built-game-id="<?php echo $built_game_id; ?>">Cancel Details
                    Request
                </button>
            </div>

            <hr>

        </div>
    </section>
    <!--================Blog Area =================-->


    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->

    <!-- filepond -->
    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- new jquery version -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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

    <script>
        $(document).ready(function() {

            var user_id = <?php echo $user_id ?>;
            $("#cartCount").DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_cart_count.php",
                    data: {
                        user_id: user_id,
                    },
                    dataSrc: "",
                },
                columns: [{
                    data: "cart_count",
                }],
            });

            //Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }


            // CURRENT
            var swiper_current = new Swiper(".mySwiper_current", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2_current = new Swiper(".mySwiper2_current", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper_current,
                },
            });

            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });


            $('#cancelButton').click(function() {
                // Get the built_game_id from the button's data attribute
                var built_game_id = $(this).data('built-game-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: '',
                    text: 'Are you sure to cancel your request?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, cancel it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, send an AJAX request to process_cancel_details_request.php
                        $.ajax({
                            url: 'process_cancel_details_request.php',
                            type: 'POST',
                            data: {
                                built_game_id: built_game_id
                            },
                            success: function(response) {
                                // Display a SweetAlert to inform success
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request has been canceled.',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    // After the user clicks "OK" in the SweetAlert, redirect
                                    window.location.href = 'create_game_page.php#section5';
                                });
                            },
                            error: function() {
                                // Handle the error if the AJAX request fails
                                Swal.fire('Error', 'Failed to cancel the request.', 'error');
                            }
                        });
                    } else {
                        // User canceled, do nothing or provide feedback if needed
                        Swal.fire('Cancelled', 'Your request is still active.', 'info');
                    }
                });
            });

        });
    </script>


</body>

</html>