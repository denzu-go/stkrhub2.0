<?php
include 'connection.php';

$pending_update_published_built_games_id = $_GET['pending_update_published_built_games_id'];

// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$sqlGetPendingPublishRequest = "SELECT * FROM pending_update_published_built_games WHERE pending_update_published_built_games_id = $pending_update_published_built_games_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedPendingPublishRequest = $queryGetPendingPublishRequest->fetch_assoc()) {
    $pending_update_published_built_games_id = $fetchedPendingPublishRequest['pending_update_published_built_games_id'];
    $published_built_game_id = $fetchedPendingPublishRequest['published_built_game_id'];
    $built_game_id = $fetchedPendingPublishRequest['built_game_id'];

    $game_name = $fetchedPendingPublishRequest['game_name'];
    $edition = $fetchedPendingPublishRequest['edition'];
    $category = $fetchedPendingPublishRequest['category'];
    $age_id = $fetchedPendingPublishRequest['age_id'];

    $min_players = $fetchedPendingPublishRequest['min_players'];
    $max_players = $fetchedPendingPublishRequest['max_players'];
    $min_playtime = $fetchedPendingPublishRequest['min_playtime'];
    $max_playtime = $fetchedPendingPublishRequest['max_playtime'];

    $short_description = $fetchedPendingPublishRequest['short_description'];
    $long_description = $fetchedPendingPublishRequest['long_description'];

    $logo_path = $fetchedPendingPublishRequest['logo_path'];

    $desired_markup = $fetchedPendingPublishRequest['desired_markup'];
    $manufacturer_profit = $fetchedPendingPublishRequest['manufacturer_profit'];
    $creator_profit = $fetchedPendingPublishRequest['creator_profit'];
    $marketplace_price = $fetchedPendingPublishRequest['marketplace_price'];
}

// category
$sqlGetCategory = "SELECT * FROM categories WHERE category_id = $category";
$queryGetCategory = $conn->query($sqlGetCategory);
while ($fetchedCategory = $queryGetCategory->fetch_assoc()) {
    $category_name = $fetchedCategory['category_name'];
}

// age
$sqlGetAge = "SELECT * FROM age WHERE age_id = $age_id";
$queryGetAge = $conn->query($sqlGetAge);
while ($fetchedAge = $queryGetAge->fetch_assoc()) {
    $age_value = $fetchedAge['age_value'];
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

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
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
                            <h4>Games Approval Requests</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <!-- current details -->
                                        <div class="col-6" style="border-right: 2px solid #e7e7e7;">
                                            <div class="row">
                                                <h4 class="mx-auto">Current Details</h4>
                                            </div>

                                            <hr>

                                            <div class="container">
                                                <div class="row">
                                                    <h6 class="h6">Final Publishing Game Name: </h6> &nbsp; <h6 style="color: #777777"><?php echo $game_name ?></h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Edition: </h6> &nbsp; <h6 style="color: #777777"><?php echo $edition ?></h6>
                                                </div>

                                                <hr>

                                                <div class="row">
                                                    <h6 class="h6">Category: </h6> &nbsp; <h6 style="color: #777777"><?php echo $category_name ?></h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Age: </h6> &nbsp; <h6 style="color: #777777"><?php echo $age_value ?></h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Number of Players (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $min_players ?></h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Number of Players (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $max_players ?></h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Play Time (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $min_playtime ?> minutes</h6>
                                                </div>
                                                <div class="row">
                                                    <h6 class="h6">Play Time (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $max_playtime ?> minutes</h6>
                                                </div>

                                                <hr>

                                                <div class="row">
                                                    <h6 class="h6">Short Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                                    <div class="container m-0 p-0"><?php echo $short_description ?></div>
                                                </div>

                                                <hr>

                                                <div class="row">
                                                    <h6 class="h6">Long Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                                    <div class="container m-0 p-0" style="background-color: #222f3e;"><?php echo $long_description ?></div>

                                                </div>

                                                <hr>

                                                <div class="row">
                                                    <h6 class="h6">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                                                    <div class="image-banner-container">';
                                                        <img class="image-banner" src="../<?php echo $logo_path ?>" alt="">';
                                                    </div>';

                                                </div>';
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="h6">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                                <!-- Swiper -->z
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="h6">Cost: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($marketplace_price - $desired_markup, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="h6">Desired Markup: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($desired_markup, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="h6">Manufacturer's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($manufacturer_profit, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="h6">Creator's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($creator_profit, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="h6">Marketplace Price: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($marketplace_price, 2) ?></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- edit request details -->
                                    <div class="col-6">
                                        <div class="row">
                                            <h4 class="mx-auto">Edit Request Details</h4>
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






    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {

            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });



        });
    </script>



</body>

</html>