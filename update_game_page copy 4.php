<?php
session_start();
include 'connection.php';

if (isset($_GET['published_game_id'])) {
    $published_game_id = $_GET['published_game_id'];
} else {
    echo "Published Game ID not found in the URL.";
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

// Fetch category data from the categories table
$query_categories = "SELECT category_id, category_name FROM categories";
$result_categories = mysqli_query($conn, $query_categories);
// Check if there are categories available
if (mysqli_num_rows($result_categories) > 0) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}


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
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        <?php include 'css/body.css'; ?><?php include 'css/header.css'; ?>

        /* header */
        .sticky-wrapper {
            top: 0px !important;
        }

        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* header end */


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


        /* form */
        .input_color {
            background-color: #222f3e;
            color: #ffffff;
            border: none;
        }

        li.option {
            color: #777777;
        }
    </style>
</head>

<body>

    <?php include 'html/page_header.php'; ?>


    <!-- Back to top button -->
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">

            <div class="row py-5">
                <a href="javascript:history.back()" style=" cursor:pointer;"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>

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
                                <img class="image-banner" src="<?php echo $current_logo_path ?>" alt="">';
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
                        <h4 class="mx-auto">Edit</h4>
                    </div>

                    <hr>

                    <form id="uploadForm">

                        <input type="hidden" id="published_game_id" name="published_game_id" value="<?php echo $published_game_id; ?>">

                        <input type="hidden" id="creator_id" name="creator_id" value="<?php echo $user_id; ?>">


                        <div class="row ">
                            <div class="col">
                                <!-- Name input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example1">Final Publishing Game Name</label>
                                    <input type="text" id="game_name" name="game_name" class="form-control input_color" required />
                                </div>
                            </div>
                            <div class="col">
                                <!-- Email input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example2">Edition</label>
                                    <input type="text" id="edition" name="edition" class="form-control input_color" required />
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <!-- Name input -->
                                <div class="form-outline">
                                    <select class="input_color" id="category" name="category" required>
                                        <option class="form-control" value="" disabled selected>Select a category</option>
                                        <?php
                                        // Loop through the categories and populate the dropdown
                                        foreach ($categories as $category) {
                                            echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <!-- Name input -->
                                <div class="form-outline">
                                    <select class="input_color" id="age" name="age" required>
                                        <option class="form-control" value="" disabled selected>Select a Age</option>
                                        <?php
                                        // Retrieve age values from the Age table and populate the dropdown
                                        $ageQuery = "SELECT * FROM age";
                                        $ageResult = mysqli_query($conn, $ageQuery);

                                        while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                                            echo '<option value="' . $ageRow['age_id'] . '">' . $ageRow['age_value'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">

                                    <input type="number" id="min_players" name="min_players" class="form-control input_color" required />
                                    <label class="form-label" for="form8Example4">Number of Players (Minimum)</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">

                                    <input type="number" id="max_players" name="max_players" class="form-control input_color" required />
                                    <label class="form-label" for="form8Example4">Number of Players (Maximum)</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">

                                    <input type="number" id="min_playtime" name="min_playtime" class="form-control input_color" required />
                                    <label class="form-label" for="form8Example4">Play Time (Minimum)</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline">

                                    <input type="number" id="max_playtime" name="max_playtime" class="form-control input_color" required />
                                    <label class="form-label" for="form8Example4">Play Time (Maximum)</label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <!-- short description -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example1">Short Description</label>
                                    <textarea class="form-control input_color" id="short_description" name="short_description" required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <!-- long description -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example1">Long Description</label>
                                    <textarea class="form-control input_color" id="long_description" name="long_description" required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-4">
                                <!-- Logo input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example1">Logo</label>
                                    <input type="file" class="filepond input_color" id="logo" name="logo" accept="image/*" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <!-- Images input -->
                                <div class="form-outline">
                                    <label class="form-label" for="form8Example1">Game Images</label>
                                    <input type="file" class="filepond input_color" name="game_images[]" multiple required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row" id="partitions">

                            <div class="col">
                                <!-- markup input -->
                                <div class="form-outline">
                                    <label class="form-label small" for="form8Example1">Desired Markup</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input type="number" class="form-control input_color" id="desired_markup" name="desired_markup" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <!-- manufacturer input -->
                                <div class="form-outline">
                                    <label class="form-label small" for="form8Example1">Manufacturer's Profit</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input type="number" id="manufacturerProfitInput" name="manufacturer_profit" class="form-control input_color" disabled style="background-color: #222F3E; border: none;" />
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <!-- crator profit input -->
                                <div class="form-outline">
                                    <label class="form-label small" for="form8Example1">Your profit</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input type="number" id="creatorProfitInput" name="creator_profit" class="form-control input_color" disabled style="background-color: #222F3E; border: none;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <!-- marketplace input -->
                                <div class="form-outline">
                                    <label class="form-label small" for="form8Example1">Marketplace Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input type="number" id="marketplacePriceInput" name="marketplace_price" class="form-control input_color" disabled style="background-color: #222F3E; border: none;" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit">Submit</button>
                    </form>


                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
































    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->

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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/rpa89s3fugo121yri1pvn1d4pp53s29njc2y5x6asbbn1t39/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        $(document).ready(function() {

            tinymce.init({
                selector: '#long_description',
                branding: false,
                icons: 'material',
                menubar: false,
                plugins: 'table advlist lists image media anchor link autoresize alignleft aligncenter alignright', // Add alignment plugins
                toolbar: 'a11ycheck | blocks bold forecolor backcolor | alignleft aligncenter alignright | bullist numlist | link anchor | table | code',
                a11y_advanced_options: true,
                a11ychecker_html_version: 'html5',
                a11ychecker_level: 'aaa',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
                skin: 'oxide-dark',
                content_css: 'dark',
            });





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



            $('#uploadForm').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                Swal.fire({
                    title: '',
                    text: 'Are you sure to edit the Published Game details?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user clicks "Yes," perform the AJAX submission here
                        $.ajax({
                            url: 'your_ajax_endpoint.php', // Replace with your actual AJAX endpoint
                            type: 'POST', // Adjust the method if needed
                            data: $('#uploadForm').serialize(), // Serialize form data
                            success: function(response) {
                                // Handle the success response
                                Swal.fire('Success!', 'Published Game details edited.', 'success');
                            },
                            error: function(error) {
                                // Handle the error response
                                Swal.fire('Error!', 'An error occurred.', 'error');
                            }
                        });
                    }
                });
            });





            // Get the initial cost from PHP variable
            var cost = <?php echo $current_marketplace_price - $current_desired_markup; ?>;

            var markupPercentage = <?php echo $markup_percentage; ?>;

            // Set up event listener for desired markup change
            $('#desired_markup').on('input', function() {
                var desiredMarkup = parseFloat($(this).val()); // Parse the input value as a float

                // STKR Hub
                var manufacturerProfit = desiredMarkup * (markupPercentage / 100);
                $('#manufacturerProfit').text(manufacturerProfit.toFixed(2));

                // Creator
                var creatorProfit = desiredMarkup * ((100 - markupPercentage) / 100);
                $('#creatorProfit').text(creatorProfit.toFixed(2));

                // Marketplace Price
                var marketplacePrice = desiredMarkup + cost;
                $('#marketplacePrice').text(marketplacePrice.toFixed(2));

                // Update the hidden input fields with calculated values
                $('#manufacturerProfitInput').val(manufacturerProfit.toFixed(2));
                $('#creatorProfitInput').val(creatorProfit.toFixed(2));
                $('#marketplacePriceInput').val(marketplacePrice.toFixed(2));
            });



        });
    </script>
</body>

</html>