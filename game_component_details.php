<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}


if (isset($_GET['game_id']) && isset($_GET['component_id'])) {
    $game_id = $_GET['game_id'];
    $component_id = $_GET['component_id'];
} elseif (isset($_GET['component_id']) && !isset($_GET['game_id'])) {
    $game_id = 0;
    $component_id = $_GET['component_id'];
}


$sqlGetGameDetails = "SELECT * FROM games WHERE game_id = $game_id";
$queryGetGameDetails = $conn->query($sqlGetGameDetails);
while ($fetchedGetGameDetails = $queryGetGameDetails->fetch_assoc()) {
    $name = $fetchedGetGameDetails['name'];
    $description = $fetchedGetGameDetails['description'];
    $created_at = $fetchedGetGameDetails['created_at'];
    $user_id =     $fetchedGetGameDetails['user_id'];
    $is_built = $fetchedGetGameDetails['is_built'];
}

$sqlGetComponentDetails = "SELECT *
FROM game_components
LEFT JOIN component_category ON game_components.category COLLATE utf8mb4_unicode_ci = component_category.category COLLATE utf8mb4_unicode_ci WHERE component_id = $component_id";
$queryGetComponentDetails = $conn->query($sqlGetComponentDetails);
while ($fetchedComponentDetails = $queryGetComponentDetails->fetch_assoc()) {
    $component_name = $fetchedComponentDetails['component_name'];
    $component_description = $fetchedComponentDetails['description'];
    $component_price = $fetchedComponentDetails['price'];
    $component_category = $fetchedComponentDetails['category'];
    $component_assets = $fetchedComponentDetails['assets'];
    $component_has_colors = $fetchedComponentDetails['has_colors'];
    $is_upload_only = $fetchedComponentDetails['is_upload_only'];
    $component_size = $fetchedComponentDetails['size'];
}


$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Game Component Details</title>


    <!-- CSS ================================ -->
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

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



    <style>
        <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>

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
            padding-top: 100%;

        }

        .image-banner {
            position: absolute;
            top: 0;
            left: 0;

            height: 100%;
            width: 100%;
            object-fit: cover;
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

    <!-- Start Sample Area -->
    <section class="sample-text-area" style="background: none;">
        <div class="container">

            <h6 class="btn p-0 m-0" id="backButton" style="color: #26d3e0;"><i class="fa-solid fa-arrow-left"></i> Back</h6>

            <div class="row">
                <?php
                if ($game_id == 0) {
                    echo '
                        
                    ';
                } elseif ($game_id !== 0) {
                    echo '
                        <div class="container">
                        Adding to
                            <h6>Game Name: ' . $name . '</h6>
                        </div>
                    ';
                }
                ?>
            </div>

            <hr>

            <div class="row mt-3"></div>

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="swiper-container" style="width: 100%;">
                                <!-- Swiper -->
                                <div class="swiper-outer">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            <?php
                                            $sql = "SELECT * FROM component_assets WHERE component_id = $component_id";
                                            $result = $conn->query($sql);

                                            while ($fetched_banner = $result->fetch_assoc()) {
                                                $asset_id = $fetched_banner['asset_id'];
                                                $asset_path = $fetched_banner['asset_path'];
                                                $is_thumbnail = $fetched_banner['is_thumbnail'];

                                                echo '<div class="swiper-slide">';

                                                echo '<div class="image-banner-container">';
                                                echo '<img class="image-banner" src="' . $asset_path . '" alt="">';
                                                echo '</div>';

                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex align-items-center">
                            <div class="row">
                                <div class="col">
                                    <span class="row" style="color: #777777">Component Name:</span>
                                    <span class="row" style="color: #e7e7e7"><?php echo $component_name ?></span>

                                    <span class="row" style="color: #777777">Component Category:</span>
                                    <span class="row" style="color: #e7e7e7"> <?php echo $component_category ?></span>

                                    <span class="row" style="color: #777777">Component Price:</span>
                                    <span class="row" style="color: #e7e7e7"> &#8369;<?php echo $component_price ?></span>

                                    <span class="row" style="color: #777777">Component Size:</span>
                                    <span class="row" style="color: #e7e7e7"> <?php echo $component_size ?></span>
                                </div>

                                <div class="col">
                                    <div class="container">
                                        <span class="row" style="color: #777777">Description:</span>
                                        <span class="row" style="color: #e7e7e7"> <?php echo $component_description ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">

                    <?php
                    if ($component_has_colors == 0) {
                        echo '
                        <div class="card" style="background-color: #272a4e !important">
                        <h5 class="card-header">Add With Design</h5>
                        <div class="card-body">
                            <p class="card-text">Customize your design using one of the templates below, download the selected template, add your design to it, and then upload the modified file.</p>
                            <h6 class="" >Downloadable Templates:</h6>
                        ';


                        $query_templates = "SELECT * FROM component_templates WHERE component_id = '$component_id'";
                        $result_templates = $conn->query($query_templates);
                        while ($fetched_templates = $result_templates->fetch_assoc()) {
                            $template_id = $fetched_templates['template_id'];
                            $template_name = $fetched_templates['template_name'];
                            $template_file_path = $fetched_templates['template_file_path'];

                            echo '
                                <li class="">
                                    <a href="' . $template_file_path . '" download>' . $template_name . '</a>
                                </li>
                            ';
                        }
                        echo '
                            
                        </div>

                        <div class="card-footer">
                            <div class="mb-3">
                                <form method="post" action="process_upload_custom_design.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="game_id" value="' . $game_id . '">
                                        <input type="hidden" name="component_id" value="' . $component_id . '">


                                        <div class="row">

                                        <div class="col">
                                        <!-- Input to upload custom design file -->
                                        <label for="custom_design_file">Upload Custom Design:</label><br>
                                        <input class="form-control-file" type="file" id="custom_design_file" name="custom_design_file" required>
                                        </div>

                                        <div class="col">
                                        <!-- Input for quantity -->
                                        <label for="quantity">Quantity:</label>
                                        <input class="form-control" type="number" id="quantity" name="quantity" value="1" min="1" required style="width: 100px;">
                                        </div>

                                        </div>
                                        
                                    </div>
                                    <!-- Button to submit the form -->
                                    <input class="btn" type="submit" name="upload_design" value="Upload Design" style="background: linear-gradient(144deg, #26d3e0, #b660e8); color: #e7e7e7; border:none;">
                                </form>
                            </div>

                        </div>

                    </div>
                    ';
                    } elseif ($component_has_colors !== 0) {
                        echo '
                        <div class="card" style="background-color: #272a4e !important">
                        <h5 class="card-header">Add Component with Color</h5>
                        

                            <div class="card-footer">
                                <div class="mb-3">
                                    <form method="post" action="process_add_component_with_colors.php">
                                        <div class="form-group">
                                            <input type="hidden" name="game_id" value="' . $game_id . '">
                                            <input type="hidden" name="component_id" value="' . $component_id . '">

                                            <div class="row">
                                            <div class="col">
                                            <!-- Add a quantity input for color-selected component -->
                                            <label for="quantity">Quantity:</label>
                                            <input class="form-control" type="number" name="quantity" value="1" min="1" required style="width: 100px;">
                                            </div>

                                            <div class="col">
                                            <label for="selected_color">Select Color:</label><br>
                                            <select class="form-control form-control-sm" id="selected_color" name="selected_color">';
                        $query_colors = "SELECT * FROM component_colors WHERE component_id = $component_id";
                        $result_colors = mysqli_query($conn, $query_colors);
                        while ($color = mysqli_fetch_assoc($result_colors)) {
                            echo '<option value="' . $color['color_id'] . '">' . $color['color_name'] . '</option>';
                        }
                        echo '
                                            </select>
                                            </div>
                                            </div>

                                        </div>
                            
                                        <input class="btn" type="submit" name="add_with_colors" value="Add Component" style="background: linear-gradient(144deg, #26d3e0, #b660e8); color: #e7e7e7; border:none;">
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>


                </div>
                <div class="col">

                    <?php
                    if ($component_has_colors == 0 && $is_upload_only == 0) {
                        echo '
                    
                        <div class="card" style="background-color: #272a4e !important">
                            <h5 class="card-header">Add Without Design</h5>
                            <div class="card-body">
                                <p class="card-text">Add this game component without adding any design; you will only receive a plain game component.</p>
                            </div>

                            <div class="card-footer">
                                <div class="mb-3">
                                    <form method="post" action="process_direct_add_component.php">
                                        <div class="form-group">
                                            <input type="hidden" name="game_id" value="' . $game_id . '">
                                            <input type="hidden" name="component_id" value="' . $component_id . '">

                                            <!-- Quantity input -->
                                            <label for="quantity">Quantity:</label>
                                            <input class="form-control" type="number" id="quantity" name="quantity" value="1" min="1" style="width: 100px;">
                                        </div>

                                        <input class="btn" type="submit" name="direct_add" value="Add Directly without Design" style="background: linear-gradient(144deg, #26d3e0, #b660e8); color: #e7e7e7; border:none;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                    } elseif ($component_has_colors !== 0) {
                        echo '

                    ';
                    }
                    ?>


                </div>
            </div>

            <br><br>
            <hr>
            <!-- youtube embeded tutorial -->
            <div class="container p-0 m-0">
                <?php
                $sqlTutorials = "SELECT * FROM tutorials WHERE designation = 'add_component'";
                $result = $conn->query($sqlTutorials);

                while ($fetchedTutorials = $result->fetch_assoc()) {
                    $tutorial_id = $fetchedTutorials['tutorial_id'];
                    $tutorial_title = $fetchedTutorials['tutorial_title'];
                    $tutorial_description = $fetchedTutorials['tutorial_description'];
                    $tutorial_link = $fetchedTutorials['tutorial_link'];;
                    $is_primary = $fetchedTutorials['is_primary'];
                    $time_added = $fetchedTutorials['time_added'];

                    echo '
                    <div class="row" style="width: 700px;">
                        <div class="col">
                            <div class="iframe-container">
                                <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="col">
                            <h6>' . $tutorial_title . '</h6>
                            <div style="
                                width: 100%;
                                display: -webkit-box;
                                -webkit-line-clamp: 7;
                                -webkit-box-orient:vertical;
                                overflow: hidden;
                                ">
                                <span class="small">
                                    ' . $tutorial_description . '
                                </span>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>

        </div>
    </section>
    <!-- End Sample Area -->


    <!-- start footer Area -->
    <?php include 'html/page_footer.php';?>
    <!-- End footer Area -->

















    <script src="js/vendor/jquery-2.2.4.min.js"></script>
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

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>



    <script>
        $(document).ready(function() {


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


            $('#backButton').click(function() {
                window.history.back();
            });

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



            $("#mySelect").change(function() {
                var selectedValue = $(this).val();
                var game_id = <?php echo $game_id; ?>;

                $.ajax({
                    type: "POST",
                    url: "process_navigate_size.php",
                    data: {
                        value: selectedValue,
                        game_id: game_id
                    },
                    success: function(response) {
                        console.log("AJAX request successful!");

                        // Construct the URL for the redirection
                        var redirectURL = "game_component_details.php?game_id=" + game_id + "&component_id=" + selectedValue;

                        // Redirect to the constructed URL
                        window.location.href = redirectURL;
                    },
                });
            });



        });
    </script>

</body>

</html>