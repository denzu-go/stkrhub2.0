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

$query = mysqli_query($conn, "SELECT MIN(marketplace_price) as min_price, MAX(marketplace_price) as max_price FROM published_built_games ");
$row = mysqli_fetch_array($query);
$min = (int) 0;
$max = (int) $row["max_price"] + 1;

$minRating = (int) 0;
$maxRating = (int) 5;

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
    <title>Market Place</title>

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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link href="product/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="product/assets/css/style.css">
    <link rel="stylesheet" href="product/assets/css/jquery-ui.css">




    <style>
        <?php include 'css/body.css';


        ?>.header_area {
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

        .card-flush {
            background: linear-gradient(to top, #49265d 0%, #272a4e 20%);
            color: aliceblue;

        }

        .h2 {

            color: aliceblue;

        }

        .min-h-400px {
            background: linear-gradient(to top, #49265d 0%, #272a4e 20%);
            color: aliceblue;
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
    $header_marketplace = 'active';
    include 'html/page_header.php';
    ?>


    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <br><br><br><br>

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <div id="kt_header" class="header align-items-stretch">
                    <div class="container-xxl d-flex align-items-center">

                        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">

                            <img alt="Logo" src="img/icon.png" class="logo-default h-25px">

                        </div>

                        <div class="d-flex w-100 align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                                </svg>
                            </span>
                            <input id="searchKeyword" type="text" class="form-control form-control-solid ps-14" placeholder="Search Product">
                        </div>

                    </div>
                </div>

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="product d-flex flex-column-fluid" id="kt_product">
                        <div id="kt_content_container" class="container-xxl">

                            <div class="d-flex flex-column flex-xl-row">
                                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-1">
                                    <div class="card fs-6 text-gray-700 fw-bold card-flush ">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Filters</h2>
                                            </div>
                                            <div class="card-toolbar d-block d-lg-none drop-inactive">
                                                <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-body filter-card p-0">
                                            <div class="separator"></div>
                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Price</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <div class="price-slider">
                                                        <input autocomplete="off" type="hidden" id="minimum_price" value="<?php echo $min; ?>" />
                                                        <input autocomplete="off" type="hidden" id="maximum_price" value="<?php echo $max; ?>" />
                                                        <p id="price_text">₱ <?php echo $min; ?> - ₱ <?php echo $max; ?></p>
                                                        <div id="price_range"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator "></div>
                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Rating</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <div class="price-slider">
                                                        <input autocomplete="off" type="hidden" id="minimum_rating" value="<?php echo $minRating; ?>" />
                                                        <input autocomplete="off" type="hidden" id="maximum_rating" value="<?php echo $maxRating; ?>" />
                                                        <p id="rating_text"><i class="fa-solid fa-star"></i>&nbsp;<?php echo $minRating; ?> - <i class="fa-solid fa-star"></i>&nbsp;<?php echo $maxRating; ?></p>
                                                        <div id="rating_range"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator "></div>

                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Game Categories</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM categories ORDER BY category_name ASC ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div class="mb-2 form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input" data-filter="brand" type="checkbox" value="' . $row["category_name"] . '" id="brand' . $row["category_name"] . '" />
                                                            <label class="form-check-label" for="brand' . $row["category_name"] . '" style ="padding-left:20px;">
                                                            ' . $row["category_name"] . '
                                                            </label>
                                                        </div>';
                                                    }
                                                    ?>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="flex-lg-row-fluid ms-lg-1">
                                    <div id="productsContainer" class="row g-1">

                                    </div>
                                    <div id="pagination">


                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <script src="product/assets/js/jquery.js"></script>
    <script src="product/assets/js/jquery-ui.js"></script>
    <script src="product/assets/js/script.js"></script>









    <!-- start footer Area -->
    <footer>
        <?php
        include 'html/page_footer.php';
        ?>
    </footer>
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
                window.location.href = "marketplace_item_page.php?published_game_id=" + published_game_id;
            });



        });
    </script>
</body>

</html>