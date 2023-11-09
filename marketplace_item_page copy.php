<?php
session_start();

include 'connection.php';
if (isset($_GET['published_game_id'])) {
    $published_game_id = $_GET['published_game_id'];
}
$sql = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
$query = $conn->query($sql);
while ($fetched = $query->fetch_assoc()) {
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $game_name = $fetched['game_name'];
    $category = $fetched['category'];
    $edition = $fetched['edition'];
    $published_date = $fetched['published_date'];
    $creator_id = $fetched['creator_id'];
    $age_id = $fetched['age_id'];
    $short_description = $fetched['short_description'];
    $long_description = $fetched['long_description'];
    $website = $fetched['website'];
    $logo_path = $fetched['logo_path'];
    $min_players = $fetched['min_players'];
    $max_players = $fetched['max_players'];
    $min_playtime = $fetched['min_playtime'];
    $max_playtime = $fetched['max_playtime'];
    $marketplace_price = $fetched['marketplace_price'];
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


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css?<?php echo time(); ?>" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- iziToast -->
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">

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

    <!-- Demo styles -->
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

        /* star */
        .cross {
            padding: 10px;
            color: #d6312d;
            cursor: pointer;
            font-size: 23px;
        }

        .cross i {
            margin-top: -5px;
            cursor: pointer;
        }

        .rating {
            display: inline-flex;
            margin-top: -10px;
            flex-direction: row-reverse;
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 28px;
            font-size: 27px;
            color: #fbd600;
            cursor: pointer;
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        /* design baba */
        .product_description_area .nav.nav-tabs {
            background: none !important;
            text-align: center;
            display: block;
            border: none;
        }

        .product_description_area .nav.nav-tabs li a {
            /* padding: 0px; */
            border: none;
            line-height: 38px;
            background: #15172e;
            border: none;
            padding: 0px 30px;
            color: #ffffff;
            font-size: 13px;
        }

        .product_description_area .tab-content {
            border-left: none;
            border-right: none;
            border-bottom: none;
            padding: none;
        }

        /* datatables */
        table.dataTable.stripe tbody tr.even,
        table.dataTable.display tbody tr.even {
            background-color: #1f2243;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #272a4e;
        }

        table.dataTable {
            box-shadow: 0 0 10px #000000;
        }

        tr .odd {
            padding: 10rem;
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

        /* buttons */
        .edit-comment {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        .delete-comment {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        /* toast */
        .iziToast>.iziToast-body .iziToast-icon.ico-success {
            filter: brightness(0) invert(1);
        }

        .iziToast>.iziToast-close {
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>


    <!-- <section class="banner-area organic-breadcrumb">

    </section> -->



    <form method="post" action="process_add_published_game_page_to_cart.php">
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">

                    <div class="col-lg-9" style="margin-right: 20px;">
                        <div class="s_Product_carousel">


                            <div class="swiper-container">

                                <div class="swiper mySwiper2" style="margin-bottom: 10px;">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $sqlBig = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
                                        $resultBig = $conn->query($sqlBig);

                                        while ($fetchedBig = $resultBig->fetch_assoc()) {
                                            $published_file_id = $fetchedBig['published_file_id'];
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

                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">

                                        <?php
                                        $sqlSmall = "SELECT * FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
                                        $resultSmall = $conn->query($sqlSmall);

                                        while ($fetchedSmall = $resultSmall->fetch_assoc()) {
                                            $published_file_id = $fetchedSmall['published_file_id'];
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

                                        <!-- duplicate -->
                                        <!-- <div class="swiper-slide">
                                            <div class="image-slide-container">
                                                <video class="image-slide">
                                                    <source src="img/stock_video.mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div> -->

                                        <!-- <div class="swiper-slide">
                                            <div class="image-slide-container">
                                                <img class="image-slide" src="img/16x9.jpg" />
                                            </div>
                                        </div> -->

                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="col-lg offset-lg">
                        <div class="s_product_text">
                            <h3>
                                <?php echo $game_name; ?>
                            </h3>

                            <h2>
                                &#8369 <?php echo $marketplace_price; ?>
                            </h2>
                            <ul class="list">
                                <li><a class="active" href="#"><span>Category</span> : <?php echo $category; ?> </a></li>
                                <!-- <li><a href="#"><span>Availibility</span> : In Stock</a></li> -->
                            </ul>



                            <div class="product_count">
                                <label for="qty">Quantity:</label>
                                <input type="number" name="quantity" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">


                                <input type="hidden" name="published_game_id" value="<?php echo $published_game_id; ?>"><br>
                                <input type="hidden" name="marketplace_price" value="<?php echo $marketplace_price; ?>"><br>
                            </div>

                            <div class="card_area d-flex align-items-center">

                                <button id="ajax-link" class="primary-btn" type="submit" data-published-game-id="<?php echo $published_game_id; ?>">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </form>



    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <strong>Short Description:</strong>
                    <p>
                        <?php echo $short_description; ?>
                    </p>

                    <strong>Long Description:</strong>
                    <p><?php echo $long_description; ?></p>
                </div>
                <br>
                <hr>

                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">

                        <!-- <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Width</h5>
                                    </td>
                                    <td>
                                        <h5>128mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Height</h5>
                                    </td>
                                    <td>
                                        <h5>508mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Depth</h5>
                                    </td>
                                    <td>
                                        <h5>85mm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Weight</h5>
                                    </td>
                                    <td>
                                        <h5>52gm</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Quality checking</h5>
                                    </td>
                                    <td>
                                        <h5>yes</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Freshness Duration</h5>
                                    </td>
                                    <td>
                                        <h5>03days</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>When packeting</h5>
                                    </td>
                                    <td>
                                        <h5>Without touch of hand</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Each Box contains</h5>
                                    </td>
                                    <td>
                                        <h5>60pcs</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                        <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                            <table id="componentTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Game Components</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- User data will be displayed here -->
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

                <br><br>
                <hr>

                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">

                        <div class="col-lg">
                            <div class="row">
                                <div class="col-5">

                                    <div class="row total_rate">
                                        <div class="col">
                                            <div class="box_total" style="
                                                /* <!-- glass morph--> */
                                                background: rgba(39, 42, 78, 0.57);
                                                border-radius: 15px 15px 15px 15px;
                                                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                                backdrop-filter: blur(5.7px);
                                                -webkit-backdrop-filter: blur(5.7px);
                                            ">

                                                <?php
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
                                                ?>

                                                <h5>Overall</h5>
                                                <h4><?php echo $roundedRating ?></h4>
                                                <h6>
                                                    <?php
                                                    if ($ratingCount === 0) {
                                                        echo "No Ratings Yet";
                                                    } else {
                                                        echo '(' . $ratingCount . ')';
                                                    }
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="rating_list">
                                                <h3>Based on <?php echo $ratingCount ?> Review/s</h3>
                                                <ul class="list">
                                                    <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count5 ?></a></li>
                                                    <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count4 ?></a></li>
                                                    <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count3 ?></a></li>
                                                    <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count2 ?></a></li>
                                                    <li><a href="#">1 Star <i class="fa fa-star"></i> <?php echo $count1 ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="">
                                        <?php
                                        $avatar = "SELECT * FROM users WHERE user_id = $user_id";
                                        $result = $conn->query($avatar);
                                        while ($fetchedAvatar = $result->fetch_assoc()) {
                                            $avatar = $fetchedAvatar['avatar'];
                                            $username = $fetchedAvatar['username'];

                                            $firstLetter = strtoupper(substr($username, 0, 1));
                                        }
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
                                                
                                                    <p style="font-family: sans-serif; color: white; font-weight: bold; font-size:17px; padding-top: 0px;">' . $firstLetter . '</p>
                                    
                                                </div>
                                            ';
                                        }


                                        $sqlCheckThere = "SELECT * FROM orders WHERE user_id = $user_id AND published_game_id = $published_game_id AND is_pending != 1";
                                        $resultCheck = mysqli_query($conn, $sqlCheckThere);
                                        if (mysqli_num_rows($resultCheck) > 0) {
                                            $sqlCheckRating = "SELECT * FROM ratings WHERE user_id = $user_id AND published_game_id = $published_game_id";
                                            $resultRating = $conn->query($sqlCheckRating);
                                            while ($fetchedRatingResult = $resultRating->fetch_assoc()) {
                                                $rating_id = $fetchedRatingResult['rating_id'];
                                                $rating = $fetchedRatingResult['rating'];
                                                $comment = $fetchedRatingResult['comment'];
                                                $date_time = $fetchedRatingResult['date_time'];

                                                // Convert the date_time string to a DateTime object
                                                $dateTimeObj = new DateTime($date_time);

                                                // Format the DateTime object as per the desired format
                                                $formattedDate = $dateTimeObj->format('M. d, Y h:ia');
                                            }

                                            if (mysqli_num_rows($resultRating) > 0) {
                                                echo '
                                                <div class="review_item" style="
                                                padding: 20px;    
                                                background: rgba(39, 42, 78, 0.27);
                                                border-radius: 15px 15px 15px 15px;
                                                box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
                                                backdrop-filter: blur(5.7px);
                                                -webkit-backdrop-filter: blur(5.7px);">

                                                    <div class="media d-flex justify-content-between">
                                                        <div class="d-flex">
                                                        
                                                            ' . $avatar_value . '
                                                        </div>
                                                        
                                                        <div class="media-body" style="line-height:0px;">
                                                            <h4>' . $username . '</h4>
                                                            <i class="fa fa-star"></i>
                                                        </div>

                                                        <div class="">
                                                            ' . $formattedDate . '
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <p>
                                                            ' . $comment . '
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-end">
                                                        <button class="edit-comment" data-toggle="modal" data-target="#exampleModal" data-rating_id="' . $rating_id . '" data-rating="' . $rating . '" data-comment="' . $comment . '">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit Comment
                                                        </button>

                                                        <button class="delete-comment" data-rating_id="' . $rating_id . '">
                                                            <i class="fa-solid fa-trash"></i> Delete Comment
                                                        </button>
                                                    </div>

                                                </div>
                                                ';
                                            } else {
                                                echo '
                                                <div class="review_item" style="
                                                padding: 20px;    
                                                background: rgba(39, 42, 78, 0.27);
                                                border-radius: 15px 15px 15px 15px;
                                                box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
                                                backdrop-filter: blur(5.7px);
                                                -webkit-backdrop-filter: blur(5.7px);">

                                                    <form id="comment-form">
                                                        <div class="align-items-center">
                                                            <div class="row">
                                                                <div class="col media d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        ' . $avatar_value . '
                                                                    </div>
                                                                    
                                                                    <div class="media-body" style="line-height:0px;">
                                                                        <h4>$username</h4>
                                                                    </div>
                                                                </div>

                                                                <div class="col rating d-flex align-items-center">
                                                                    <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                                                                    <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                                                                    <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                                                                    <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                                                                    <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="user_id" id="user_id" value="' . $user_id . '">
                                                        <input type="hidden" name="published_game_id" id="published_game_id" value="' . $published_game_id . '">

                                                        <div class="">
                                                            <p>
                                                                <textarea class="form-control" name="comment" placeholder="What is your view?" rows="2" required></textarea>
                                                            </p>
                                                        </div>
                                                        <hr class="m-0 p-1">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary" style="border: none; background: linear-gradient(144deg, #26d3e0, #b660e8);">Submit</button>
                                                        </div>
                                                    </form>

                                                </div>
                                                ';
                                            }
                                        } else {

                                            echo '
                                                <div class="review_item" style="
                                                padding: 20px;    
                                                background: rgba(39, 42, 78, 0.27);
                                                border-radius: 15px 15px 15px 15px;
                                                box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
                                                backdrop-filter: blur(5.7px);
                                                -webkit-backdrop-filter: blur(5.7px);">

                                                    <form id="comment-form">
                                                        <div class="align-items-center">
                                                            <div class="row">
                                                                <div class="col media d-flex justify-content-between">
                                                                    <div class="d-flex">
                                                                        ' . $avatar_value . '
                                                                    </div>
                                                                    
                                                                    <div class="media-body" style="line-height:0px;">
                                                                        <h4>$username</h4>
                                                                    </div>
                                                                </div>

                                                                <div class="col rating d-flex align-items-center">
                                                                    <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                                                                    <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                                                                    <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                                                                    <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                                                                    <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="user_id" id="user_id" value="' . $user_id . '">
                                                        <input type="hidden" name="published_game_id" id="published_game_id" value="' . $published_game_id . '">

                                                        <div class="">
                                                            <p>
                                                                <textarea class="form-control" name="comment" placeholder="What is your view?" rows="2" required></textarea>
                                                            </p>
                                                        </div>
                                                        <hr class="m-0 p-1">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary" style="border: none; background: linear-gradient(144deg, #26d3e0, #b660e8); cursor: not-allowed;" disabled 
                                                            data-toggle="tooltip" title="Please Purchase First to Comment">
                                                            Submit</button>
                                                        </div>
                                                    </form>

                                                </div>
                                                ';
                                        }
                                        ?>

                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="review_list">

                                <?php
                                $sqlReview = "SELECT * FROM ratings WHERE published_game_id = $published_game_id ORDER BY date_time DESC";
                                $resultReview = $conn->query($sqlReview);
                                while ($fetchedReview = $resultReview->fetch_assoc()) {
                                    $rating_id = $fetchedReview['rating_id'];
                                    $rating = $fetchedReview['rating'];
                                    $comment = $fetchedReview['comment'];
                                    $user_id = $fetchedReview['user_id'];
                                    $date_time = $fetchedReview['date_time'];

                                    // Convert the date_time string to a DateTime object
                                    $dateTimeObj = new DateTime($date_time);

                                    // Format the DateTime object as per the desired format
                                    $formattedDate = $dateTimeObj->format('M. d, Y h:ia');

                                    $avatar = "SELECT * FROM users WHERE user_id = $user_id";
                                    $result = $conn->query($avatar);
                                    while ($fetchedAvatar = $result->fetch_assoc()) {
                                        $avatar = $fetchedAvatar['avatar'];
                                        $username = $fetchedAvatar['username'];

                                        $firstLetter = strtoupper(substr($username, 0, 1));
                                    }

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
                                            
                                                <p style="font-family: sans-serif; color: white; font-weight: bold; font-size:17px; padding-top: 0px;">' . $firstLetter . '</p>
    
                                            </div>
                                        ';
                                    }


                                    echo '
                                        <div class="review_item" style="
                                            padding: 20px;    

                                            background: rgba(39, 42, 78, 0.27);
                                            border-radius: 15px 15px 15px 15px;
                                            box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
                                            backdrop-filter: blur(5.7px);
                                            -webkit-backdrop-filter: blur(5.7px);
                                        ">
                                            <div class="media d-flex justify-content-between">
                                                <div class="d-flex">
                                                    ' . $avatar_value . '
                                                </div>
                                                <div class="media-body" style="line-height:0px;">
                                                    <h4>' . $username . '</h4>';

                                    for ($i = 0; $i < $rating; $i++) {
                                        echo '<i class="fa fa-star"></i>';
                                    }

                                    echo '
                                                </div>

                                                <div class="">
                                                    ' . $formattedDate . '
                                                </div>
                                            </div>

                                            <p>
                                                ' . $comment . '
                                            </p>

                                        </div>
                                    ';
                                }
                                ?>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="yourFormId">
                        <input type="hidden" name="rating_id" id="rating_id" value="">
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                        </div>
                        <textarea class="form-control" name="comment" placeholder="What is your view?" rows="2" required></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitForm" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>





    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



    <!-- Toastr -->
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.3/dist/toastr.min.js"></script>


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
    <!-- <script src="js/main.js"></script> -->

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

    <!-- iziToast -->
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>


    <script>
        $(document).ready(function() {

            $(document).on("click", "#ajax-link", function(event) {
                event.preventDefault();
                var user_id = <?php echo $user_id ?>;
                var published_game_id = $(this).data("published-game-id");
                var quantity = $("input[name='quantity']").val();

                $.ajax({
                    url: "process_add_published_game_to_cart_quantity.php",
                    type: "POST",
                    data: {
                        published_game_id: published_game_id,
                        quantity: quantity,
                    },
                    success: function(data) {
                        iziToast.success({
                            color: '#15172e',
                            progressBarColor: 'linear-gradient(144deg, #26d3e0, #b660e8)rgb(0, 255, 184)',
                            title: 'OK',
                            message: 'Successfully inserted record!',
                            titleColor: '#fff',
                            messageColor: '#fff',
                            timeout: 90000,
                            overlayColor: 'rgba(0, 0, 0, 0.7)',
                        });


                        $(".cart-count").html(data);
                        $("#cartCount").DataTable().ajax.reload();
                    },
                });
            });



            $('.edit-comment').click(function() {
                var rating_id = $(this).data('rating_id');

                $('#rating_id').val(rating_id);
            });

            $('#submitForm').click(function() {
                // Check if the form is valid, including required fields
                if ($('#yourFormId')[0].checkValidity()) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to edit your comment?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Create a FormData object to serialize the form
                            var formData = new FormData($('#yourFormId')[0]);

                            // Use AJAX to submit the form data
                            $.ajax({
                                type: 'POST',
                                url: 'process_edit_comment.php',
                                data: formData,
                                processData: false, // Prevent jQuery from processing the data
                                contentType: false, // Set content type to false
                                success: function(response) {
                                    // Handle success response from the server
                                    Swal.fire('Success', 'Your comment has been edited.', 'success').then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                    // Handle any errors or display an error SweetAlert
                                    Swal.fire('Error', 'An error occurred while editing your comment.', 'error');
                                }
                            });
                        }
                    });
                } else {
                    // Form is not valid, show an error message
                    Swal.fire('Error', 'Please fill in all required fields.', 'error');
                }
            });


            $('.delete-comment').click(function() {
                var rating_id = $(this).data('rating_id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to delete your comment. This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed the deletion
                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_comment.php',
                            data: {
                                rating_id: rating_id
                            },
                            success: function(response) {
                                // Handle success response from the server
                                Swal.fire('Success', 'Your comment has been edited.', 'success').then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        // Reload the page
                                        location.reload();
                                    }
                                });
                            },
                            error: function(error) {
                                // Handle any errors or display an error SweetAlert
                                Swal.fire('Error', 'An error occurred while deleting your comment.', 'error');
                            }
                        });
                    }
                });
            });


            $(document).on('submit', '#comment-form', function(e) {
                e.preventDefault(); // Prevent the form from submitting immediately

                // Check if all required fields are valid
                if ($('#comment-form')[0].checkValidity()) {
                    // Use SweetAlert for confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to add your comment?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // User confirmed, proceed to form submission
                            var formData = new FormData(this); // Create a FormData object from the form

                            $.ajax({
                                type: 'POST',
                                url: 'process_add_comment.php',
                                data: formData,
                                processData: false, // Prevent jQuery from processing the data
                                contentType: false, // Set content type to false
                                success: function(response) {
                                    Swal.fire('Success', 'Your comment has been edited.', 'success').then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                    // Handle any errors or display an error SweetAlert
                                    Swal.fire('Error', 'An error occurred while adding your comment.', 'error');
                                }
                            });
                        }
                    });
                } else {
                    // Form is invalid, show a message or handle it as needed
                    Swal.fire('Invalid Form', 'Please fill out all required fields.', 'error');
                }
            });














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


            var built_game_id = <?php echo $built_game_id; ?>;

            $('#componentTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                "ajax": {
                    "url": "json_game_components_item.php",
                    data: {
                        built_game_id: built_game_id,
                    },
                    "dataSrc": ""
                },
                "paging": false,
                "info": false,
                "searching": false,

                "columns": [{
                        "data": "component_name",
                        "orderable": false
                    },
                    {
                        "data": "component_category",
                        "orderable": false
                    },
                    {
                        "data": "quantity",
                        "orderable": false
                    },
                    {
                        "data": "size",
                        "orderable": false
                    },
                ]
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

        });
    </script>





</body>

</html>