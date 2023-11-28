<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = 0;
}

$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/icon.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>STKR HUB</title>

    <!--CSS================================= -->
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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">




    <style>
        <?php include 'css/body.css'; ?>.header_area {
            position: relative;
        }

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




        .image-mini-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }



        .iframe-container {
            overflow: hidden;
            width: 100%;


            position: relative;
            padding-top: 45.25%;
            /* 9/16 aspect ratio (16:9) */
        }

        .iframe {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
        }




        @import url(https://fonts.googleapis.com/css?family=Raleway);

        .content {
            position: relative;
        }

        .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s
        }

        .content:hover .content-overlay {
            opacity: 1
        }

        img {
            box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
            border-radius: 0px
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1
        }

        .content-details h3 {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase
        }

        .content-details p {
            color: #fff;
            font-size: 0.8em
        }

        .fadeIn-bottom {
            top: 70%
        }


        .features-inner {
            box-shadow: none !important;
            padding: 40px 0;
        }


        /* card */
        .product_card {

            background-image: linear-gradient(to bottom, transparent 60%, #272a4e 100%);
            border-radius: 10px;
            display: flex;
            padding: 1.7px;
            transition: background-image 0.3s, transform 0.3s ease;
            cursor: pointer;
        }

        .product_card:hover {
            background-image: linear-gradient(to bottom, transparent 60%, #b660e8 100%);
            transform: scale(1.03);
        }

        .product_card .card {
            background: linear-gradient(to top, #272a4e 0%, #272a4e 25%);
            border-radius: 10px;
            width: 100%;
        }

        .product_card .card:hover {
            background: linear-gradient(to top, #49265d 0%, #272a4e 20%);
        }

        <?php include 'css/header.css'; ?>
    </style>


</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php
    $header_home = 'active'; 
    include 'html/page_header.php';
    ?>


    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Swiper -->
    <div class="swiper-outer">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $sql = "SELECT * FROM index_banner";
                $result = $conn->query($sql);

                while ($fetched_banner = $result->fetch_assoc()) {

                    if ($fetched_banner["is_showcased"] == 1) {
                        $banner = $fetched_banner['image_path'];

                        echo '<div class="swiper-slide">';

                        echo '<div class="image-banner-container">';
                        echo '<img class="image-banner" src="' . $banner . '" alt="">';
                        echo '</div>';

                        echo '</div>';
                    }
                }
                ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- start features Area -->
    <section class="features-area" style="background: none;">
        <div class="container scroll_reveal">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="" style="filter: brightness(5);">
                        </div>
                        <h6>Fast Delivery</h6>
                        <p>Fast Shipping on selected Areas</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="" style="filter: brightness(5);">
                        </div>
                        <h6>Refund Policy</h6>
                        <p>Feel free to cancel your order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon5.png" alt="" style="filter: brightness(5);">
                        </div>
                        <h6>Quality Games</h6>
                        <p>Games were filtered</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon4.png" alt="" style="filter: brightness(5);">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Purchase using Paypal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->



    <!-- Start category Area -->
    <section class="pb-5" style="background: none;">

        <div class="container" style="display:flex; flex-direction:column; gap: 20px;">



            <?php
            $sqlTutorials = "SELECT * FROM tutorials WHERE is_primary = 1";
            $result = $conn->query($sqlTutorials);

            while ($fetchedTutorials = $result->fetch_assoc()) {
                $tutorial_id = $fetchedTutorials['tutorial_id'];
                $tutorial_title = $fetchedTutorials['tutorial_title'];
                $tutorial_description = $fetchedTutorials['tutorial_description'];
                $tutorial_link = $fetchedTutorials['tutorial_link'];;
                $is_primary = $fetchedTutorials['is_primary'];
                $time_added = $fetchedTutorials['time_added'];

                echo '
                    <div class="row s_product_inner scroll_reveal">
                        <div class="col-lg-8">
                            <div class="iframe-container">
                            <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 offset-lg-1" style="margin-left: 0px; margin-top: 0px;">
                            <div class="s_product_text" style="margin-top: 20px;">
                                <h3>' . $tutorial_title . '</h3>

                                <p>
                                    ' . $tutorial_description . '
                                </p>
                            </div>
                        </div>
                    </div>
                    ';
            }
            ?>

        </div>
    </section>
    <!-- End category Area -->



    <!-- start product Area -->
    <section class="" style="background: none;">
        <br>
        <hr>

        <!-- latest games -->
        <div class="single-product-slider">
            <div class="container">

                <div class="row">

                    <div class="container mx-auto mt-4 justify-content-around">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <div class="section-title">
                                    <h1 class="scroll_reveal">Latest Games</h1>
                                    <span class="scroll_reveal">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                        dolore
                                        magna aliqua.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around">

                            <?php
                            $sql = "SELECT * FROM published_built_games WHERE is_hidden = 0 ORDER BY published_date DESC LIMIT 9";

                            $result = $conn->query($sql);

                            while ($fetched = $result->fetch_assoc()) {
                                $published_game_id = $fetched['published_game_id'];
                                $game_name = $fetched['game_name'];
                                $category = $fetched['category'];
                                $edition = $fetched['edition'];
                                $published_date = $fetched['published_date'];
                                $formatted_date = date("M. d, Y", strtotime($published_date));
                                $creator_id = $fetched['creator_id'];
                                $age_id = $fetched['age_id'];
                                $short_description = $fetched['short_description'];
                                $long_description = $fetched['long_description'];
                                $category = $fetched['category'];
                                $website = $fetched['website'];
                                $logo_path = $fetched['logo_path'];
                                $min_players = $fetched['min_players'];
                                $max_players = $fetched['max_players'];
                                $min_playtime = $fetched['min_playtime'];
                                $max_playtime = $fetched['max_playtime'];
                                $marketplace_price = $fetched['marketplace_price'];

                                // avatar users
                                $getAvatarUser = "SELECT * FROM users WHERE user_id = $creator_id";
                                $sqlGetAvatarUser = $conn->query($getAvatarUser);
                                while ($fetchedAvatarUser = $sqlGetAvatarUser->fetch_assoc()) {
                                    $avatar = $fetchedAvatarUser['avatar'];
                                    $username = $fetchedAvatarUser['username'];
                                    $firstLetter = strtoupper(substr($username, 0, 1));

                                    if (!is_null($avatar)) {
                                        $avatar_value = '
                                            <div style="position: relative; display: inline-block; width: 40px; height: 40px; border-radius: 50%; background-color: #333;">
                                                <img src="' . $avatar . '" alt="" style="
                                                        position: absolute;
                                                        top: 0;
                                                        left: 0;
                                
                                                        height: 100%;
                                                        width: 100%;
                                                        object-fit: cover;
                                                        border-radius: 50%;
                                                ">
                                
                                            </div>
                                            ';
                                    } else {
                                        $avatar_value = '
                                                <div style="position: relative; display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 50%;
                                                background: rgb(38,211,224);
                                                background: linear-gradient(90deg, rgba(38,211,224,1) 0%, rgba(182,96,232,1) 100%);">
                                                
                                                    <span style="font-family: sans-serif; color: white; font-weight: bold; font-size:17px; padding-top: 0px;">' . $firstLetter . '</span>
                                    
                                                </div>
                                            ';
                                    }
                                }



                                // rating
                                $rating = "SELECT rating FROM ratings WHERE published_game_id = $published_game_id";
                                $sqlGetRating = $conn->query($rating);
                                $ratingsArray = [];
                                while ($fetchedRating = $sqlGetRating->fetch_assoc()) {
                                    $ratingsArray[] = $fetchedRating['rating'];
                                }


                                $ratingCounts = array(
                                    '5' => 0,
                                    '4' => 0,
                                    '3' => 0,
                                    '2' => 0,
                                    '1' => 0
                                );

                                foreach ($ratingsArray as $ratingValue) {
                                    if (array_key_exists($ratingValue, $ratingCounts)) {
                                        $ratingCounts[$ratingValue]++;
                                    }
                                }

                                // Now you have the count of each rating value
                                $count5 = $ratingCounts['5'];
                                $count4 = $ratingCounts['4'];
                                $count3 = $ratingCounts['3'];
                                $count2 = $ratingCounts['2'];
                                $count1 = $ratingCounts['1'];


                                $ratingSum = array_sum($ratingsArray);
                                $ratingCount = count($ratingsArray);
                                $averageRating = ($ratingCount > 0) ? ($ratingSum / $ratingCount) : 0;

                                // Round to one decimal place
                                $roundedRating = round($averageRating, 1);

                                // Round to the nearest half
                                $roundedRating = round($roundedRating * 2) / 2;

                                if (isset($_SESSION['user_id'])) {
                                    $a_cart = '
                                            <a href="#" id="ajax-link" data-published-game-id="' . $published_game_id . '" class="social-info">
                                        ';
                                } else {
                                    $a_cart = '
                                            <a href="login_page.php" class="social-info">
                                        ';
                                }

                                include 'html/latest_games.php';
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end product Area -->




    <!-- start footer Area -->
    <?php include 'html/page_footer.php';?>
    <!-- End footer Area -->



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>




    <script src="js/vendor/jquery-2.2.4.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- scroll reveal js -->
    <script src="https://unpkg.com/scrollreveal"></script>




    <!-- Initialize Swiper -->
    <script>
        $(document).ready(function() {

            // mahalaga toh
            <?php include 'js/essential.php'; ?>

            var swiper = new Swiper(".mySwiper", {
                // spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });


            $(".product_card").click(function() {
                var published_game_id = $(this).data("published_game_id");

                windows.location.href = "marketplace_item_page.php?id=" + published_game_id;
            });


        });
    </script>
</body>

</html>