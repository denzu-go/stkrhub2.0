<?php
session_start();
include 'connection.php';

$published_game_id = $_GET['published_game_id'];

// CURRENTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
$sqlGetCurrentPublishRequest = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
$queryGetCurrentPublishRequest = $conn->query($sqlGetCurrentPublishRequest);
while ($fetchedCurrentPublishRequest = $queryGetCurrentPublishRequest->fetch_assoc()) {

    $current_game_name = $fetchedCurrentPublishRequest['game_name'];
    $current_edition = $fetchedCurrentPublishRequest['edition'];
    $current_category_name = $fetchedCurrentPublishRequest['category'];
    $current_age_id = $fetchedCurrentPublishRequest['age_id'];

    $current_min_players = $fetchedCurrentPublishRequest['min_players'];
    $current_max_players = $fetchedCurrentPublishRequest['max_players'];
    $current_min_playtime = $fetchedCurrentPublishRequest['min_playtime'];
    $current_max_playtime = $fetchedCurrentPublishRequest['max_playtime'];

    $current_short_description = $fetchedCurrentPublishRequest['short_description'];
    $current_long_description = $fetchedCurrentPublishRequest['long_description'];

    $current_logo_path = $fetchedCurrentPublishRequest['logo_path'];

    $current_desired_markup = $fetchedCurrentPublishRequest['desired_markup'];
    $current_manufacturer_profit = $fetchedCurrentPublishRequest['manufacturer_profit'];
    $current_creator_profit = $fetchedCurrentPublishRequest['creator_profit'];
    $current_marketplace_price = $fetchedCurrentPublishRequest['marketplace_price'];
}

// age
$sqlGetCurrentAge = "SELECT * FROM age WHERE age_id = $current_age_id";
$queryGetCurrentAge = $conn->query($sqlGetCurrentAge);
while ($fetchedCurrentAge = $queryGetCurrentAge->fetch_assoc()) {
    $current_age_value = $fetchedCurrentAge['age_value'];
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
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

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
        <?php include 'css/body.css'; ?>.swiper-slide {
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
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }
    </style>
</head>

<body>

    <?php include 'html/page_header.php'; ?>

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">

            <div class="row py-5">
                
            </div>

            <div class="row">
                <h4 class="mx-auto">Edit Details Request</h4>
            </div>
            <hr>

            <div class="row">
                <!-- -- -->
                <div class="col-6">
                    <div class="container">
                        <div class="row">
                            <h6 class="">Final Publishing Game Name: </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_game_name ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Edition: </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_edition ?></h6>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Category: </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_category_name ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Age: </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_age_value ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Number of Players (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_min_players ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Number of Players (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_max_players ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Play Time (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_min_playtime ?> minutes</h6>
                        </div>
                        <div class="row">
                            <h6 class="">Play Time (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $current_max_playtime ?> minutes</h6>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Short Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                            <div class="container m-0 p-0"><?php echo $current_short_description ?></div>
                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Long Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                            <div class="container m-0" style="background-color: #222f3e;"><?php echo $current_long_description ?></div>

                        </div>

                        <hr>

                        <div class="row">
                            <h6 class="">Cost: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($current_marketplace_price - $current_desired_markup, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Desired Markup: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($current_desired_markup, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Manufacturer's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($current_manufacturer_profit, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Creator's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($current_creator_profit, 2) ?></h6>
                        </div>
                        <div class="row">
                            <h6 class="">Marketplace Price: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($current_marketplace_price, 2) ?></h6>
                        </div>


                    </div>

                </div>

                <div class="col-6">
                    <div class="container">
                        <div class="row">
                            <h6 class="">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                            <div class="image-banner-container">';
                                <img class="image-banner" src="<?php echo $current_logo_path ?>" alt="">
                            </div>
                        </div>

                        <hr>

                        <!-- Swiper -->
                        <h6 class="">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                        <div class="swiper-container">

                            <div class="swiper mySwiper2_current" style="margin-bottom: 10px;">
                                <div class="swiper-wrapper">

                                    <?php
                                    $sqlBig = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
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
                                    $sqlSmall = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
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

                        <hr>
                    </div>
                </div>

            </div>

            <div class="row d-flex justify-content-end">
                <button id="cancelButton" data-published-game-id="<?php echo $published_game_id; ?>">Cancel Update
                    Request
                </button>
            </div>

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


            $('#cancelButton').click(function() {
                // Get the built_game_id from the button's data attribute
                var published_game_id = $(this).data('published-game-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Are you sure to cancel the request of this built game id = ' + published_game_id + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, cancel it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, send an AJAX request to process_cancel_details_request.php
                        $.ajax({
                            url: 'process_cancel_update_published_request.php',
                            type: 'POST',
                            data: {
                                published_game_id: published_game_id
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
                                    window.location.href = 'create_game_page.php#section7';
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