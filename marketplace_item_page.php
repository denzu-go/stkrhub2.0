<?php
session_start();

include 'connection.php';
if (isset($_GET['id'])) {
    $published_game_id = $_GET['id'];
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
            font-size: 35px;
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

                            <input type="hidden" name="" id="">

                            <div class="card_area d-flex align-items-center">

                                <button class="primary-btn" type="submit">Add to Cart</button>
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <strong>Short Description:</strong>
                    <p>
                        <?php echo $short_description; ?>
                    </p>

                    <strong>Long Description:</strong>
                    <p><?php echo $long_description; ?></p>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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

                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">


                        <div class="col-lg">

                            <div class="row total_rate">
                                <div class="col-3">
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
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on <?php echo $ratingCount ?> Review/s</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count5 ?></a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count4 ?></a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count3 ?></a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count2 ?></a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php echo $count1 ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="review_list">

                                <?php
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
                                    }

                                    $stars_rating_ordered_existing = '
                                    <div>' . $rating . '/5 &nbsp;</div>';
                                    for ($i = 1; $i <= $rating; $i++) {
                                        $stars_rating_ordered_existing .= '<div><i class="fa fa-star"></i></div>';
                                    }
                                    '
                                    ';

                                    $stars_rating_ordered_no_existing_and_not_purchased = '
                                        <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4" required><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3" required><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2" required><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1" required><label for="1">☆</label>
                                    ';

                                    $comment_area_ordered_existing = '
                                    <textarea class="form-control" name="comment" placeholder="What is your view?" rows="3" value="" disabled></textarea>
                                    ';

                                    $comment_area_ordered_no_existing_and_not_purchased = '
                                    <textarea class="form-control" name="comment" placeholder="What is your view?" rows="3" required></textarea>
                                    ';

                                    $actions_ordered_existing = '
                                    <button class="btn" type="button">Edit</button>
                                    ';

                                    $actions_ordered_no_existing = '
                                    <button class="btn" type="submit">Confirm</button>
                                    ';

                                    $actions_not_purchased = '
                                    <button class="btn" type="submit" style="cursor: not-allowed;" data-toggle="tooltip" title="Buy it first" disabled>Confirm</button>
                                    ';


                                    if (mysqli_num_rows($resultRating) > 0) {
                                        $stars_rating = $stars_rating_ordered_existing;
                                        $comment_area = $comment_area_ordered_existing;
                                        $actions = $actions_ordered_existing;
                                    } else {
                                        $stars_rating = $stars_rating_ordered_no_existing_and_not_purchased;
                                        $comment_area = $comment_area_ordered_no_existing_and_not_purchased;
                                        $actions = $actions_ordered_no_existing;
                                    }
                                } else {
                                    $stars_rating = $stars_rating_ordered_no_existing_and_not_purchased;
                                    $comment_area = $comment_area_ordered_no_existing_and_not_purchased;
                                    $actions = $actions_not_purchased;
                                }
                                ?>

                                <form method="post" action="process_rating.php">

                                    <div class="review_item" style="
                                        padding: 20px;    

                                        background: rgba(39, 42, 78, 0.27);
                                        border-radius: 15px 15px 15px 15px;
                                        box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
                                        backdrop-filter: blur(5.7px);
                                        -webkit-backdrop-filter: blur(5.7px);
                                        ">

                                        <h4>Leave a Review</h4>

                                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                        <input type="hidden" name="published_game_id" value="<?php echo $published_game_id; ?>">

                                        <div class="rating">
                                            <div class="d-flex align-items-end"><?php echo $stars_rating ?></div>
                                        </div>

                                        <div class="comment-area">
                                            <?php echo $comment_area ?>
                                        </div>

                                        <div class="actions">
                                            <?php echo $actions ?>
                                        </div>
                                    </div>
                                </form>
                                <hr>


                                <?php
                                $sqlReview = "SELECT * FROM ratings WHERE published_game_id = $published_game_id";
                                $resultReview = $conn->query($sqlReview);
                                while ($fetchedReview = $resultReview->fetch_assoc()) {
                                    $rating_id = $fetchedReview['rating_id'];
                                    $rating = $fetchedReview['rating'];
                                    $comment = $fetchedReview['comment'];
                                    $user_id = $fetchedReview['user_id'];
                                    $date_time = $fetchedReview['date_time'];

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
                                                    '.$avatar_value.'
                                                </div>
                                                <div class="media-body" style="line-height:0px;">
                                                    <h4>' . $username . '</h4>';

                                    for ($i = 0; $i < $rating; $i++) {
                                        echo '<i class="fa fa-star"></i>';
                                    }

                                    echo '
                                                </div>

                                                <div class="">
                                                    '.$date_time.'
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



    <script>
        $(document).ready(function() {
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#componentTable').DataTable({
                responsive: true,
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