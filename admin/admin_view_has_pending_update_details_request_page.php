<?php
session_start();
include("connection.php");
// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

$pending_update_published_built_games_id = $_GET['pending_update_published_built_games_id'];
$creator_id = $_GET['creator_id'];

// PENDINGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$sqlGetPendingPublishRequest = "SELECT * FROM pending_update_published_built_games WHERE pending_update_published_built_games_id = $pending_update_published_built_games_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedPendingPublishRequest = $queryGetPendingPublishRequest->fetch_assoc()) {
    $pending_update_published_built_games_id = $fetchedPendingPublishRequest['pending_update_published_built_games_id'];
    $published_built_game_id = $fetchedPendingPublishRequest['published_built_game_id'];

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



// CURRENTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
$sqlGetCurrentPublishRequest = "SELECT * FROM published_built_games WHERE published_game_id = $published_built_game_id";
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Pending Updates </title>
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

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <div class="container">
                            <div class="col-sm">
                                <button class="btn" id="approveUpdate" data-published_built_game_id="<?php echo $published_built_game_id; ?>" data-creator_id="<?php echo $creator_id; ?>" style="background-color: #63d19e; color: white;">Approve Publish
                                    Request</button>
                                <button class="btn" id="denyUpdate" data-published_built_game_id="<?php echo $published_built_game_id; ?>" data-creator_id="<?php echo $creator_id; ?>" style="background-color: #dc3545; color: white;">Deny Publish Request</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">

                                    <!-- -- -->
                                    <div class="col-6" style="border-right: 2px solid #e7e7e7;">
                                        <div class="row">
                                            <h4 class="mx-auto">Current Details</h4>
                                        </div>

                                        <hr>

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
                                                <h6 class="">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                                                <div class="image-banner-container">';
                                                    <img class="image-banner" src="../<?php echo $current_logo_path ?>" alt="">';
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Swiper -->
                                            <h6 class="">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                            <div class="swiper-container">

                                                <div class="swiper mySwiper2_current" style="margin-bottom: 10px;">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        $sqlBig = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_built_game_id";
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
                                                                                <source src="../' . $file_path . '" type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-carousel-container">
                                                                            <img class="image-carousel" src="../' . $file_path . '" />
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
                                                        $sqlSmall = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_built_game_id";
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
                                                                                <source src="../' . $file_path . '">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-slide-container">
                                                                            <img class="image-slide" src="../' . $file_path . '" />
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




                                    <!-- -- -->
                                    <div class="col-6">
                                        <div class="row">
                                            <h4 class="mx-auto">Update Details Request</h4>
                                        </div>

                                        <hr>

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
                                                <h6 class="">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                                                <div class="image-banner-container">';
                                                    <img class="image-banner" src="../<?php echo $pending_logo_path ?>" alt="">';
                                                </div>
                                            </div>

                                            <hr>

                                            <!-- Swiper -->
                                            <h6 class="">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                            <div class="swiper-container">

                                                <div class="swiper mySwiper2" style="margin-bottom: 10px;">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        $sqlBig = "SELECT * FROM pending_update_published_multiple_files WHERE pending_update_published_built_game_id = $pending_update_published_built_games_id";
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
                                                                                <source src="../' . $file_path . '" type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-carousel-container">
                                                                            <img class="image-carousel" src="../' . $file_path . '" />
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

                                                <div thumbsSlider="" class="swiper mySwiper">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        $sqlSmall = "SELECT * FROM pending_update_published_multiple_files WHERE pending_update_published_built_game_id = $pending_update_published_built_games_id";
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
                                                                                <source src="../' . $file_path . '">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-slide-container">
                                                                            <img class="image-slide" src="../' . $file_path . '" />
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



    <!-- modals -->
    <div class="modal fade" id="changeAddress">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deny Publish Details Request</h5>
                </div>
                <form id="denyForm" enctype="multipart/form-data">
                    <div class="modal-body form-group">

                        <label for="reason" style="color: #777777;">Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" required></textarea>

                        <label for="fileupload" style="color: #777777;">File Upload:</label>
                        <input class="form-control" type="file" id="fileupload" name="fileupload"><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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



            $('#approveUpdate').on('click', function() {
                var gameId = $(this).data('published_built_game_id');
                var creator_id = $(this).data('creator_id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to approve this game?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, approve it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'admin_process_approve_update_details.php',
                            data: {
                                user_id: creator_id,
                                game_id: gameId,
                            },
                            success: function(response) {
                                Swal.fire('Approved!', 'The game has been approved.', 'success').then(function() {
                                    window.location.href = 'edit_published_game_requests.php';
                                });


                            },
                            error: function(error) {
                                Swal.fire('Error', 'An error occurred while approving the game.', 'error');
                                // You can handle the error details if needed
                                console.log(error);
                                window.location.href = 'edit_published_game_requests.php';

                            }
                        });
                    }
                });
            });







            $('#denyUpdate').on('click', function() {
                var gameId = $(this).data('published_built_game_id');
                var creator_id = $(this).data('creator_id');

                $("#changeAddress").modal("show");

                // You can also set hidden input fields to pass the gameId and creatorId to the PHP script
                $('#denyForm').append('<input type="hidden" id="game_id" value="' + gameId + '">');
                $('#denyForm').append('<input type="hidden" id="creator_id" value="' + creator_id + '">');
            });


            $("#denyForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData();
                formData.append('reason', $('#reason').val());
                formData.append('fileupload', $('#fileupload')[0].files[0]);

                formData.append('game_id', $('#game_id').val());
                formData.append('creator_id', $('#creator_id').val());

                // Make an AJAX request to submit the form data
                $.ajax({
                    url: 'admin_process_deny_update_details.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log("Form submitted successfully.");
                        $("#changeAddress").modal('hide');
                        Swal.fire({
                            title: 'Success!',
                            text: 'Form submitted successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'edit_published_game_requests.php';
                            }
                        });
                    },
                    error: function(error) {
                        console.error("Error submitting the form: " + error);
                    }
                });
            });



        });
    </script>



</body>

</html>