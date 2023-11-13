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

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- filepond css -->
    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.css" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

                <!-- CURRENT -->
                <div class="col posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 mt-25">

                                    <!-- content -->
                                    <div class="content">


                                        <h4>Current Details:</h4>

                                        <h6>
                                            Published Game Name: <?php echo $game_name ?>
                                        </h6>

                                        <h6>
                                            category: <?php echo $category ?>
                                        </h6>

                                        <h6>
                                            edition: <?php echo $edition ?>
                                        </h6>

                                        <h6>
                                            age: <?php echo $age_value ?>
                                        </h6>

                                        <h6>
                                            short_description: <?php echo $short_description ?>
                                        </h6>

                                        <h6>
                                            long_description: <?php echo $long_description ?>
                                        </h6>

                                        <h6>
                                            website: <?php echo $website ?>
                                        </h6>

                                        <h6>
                                            logo_path: <?php echo $logo_path ?>
                                        </h6>

                                        <h6>
                                            min_players: <?php echo $min_players ?>
                                        </h6>

                                        <h6>
                                            max_players: <?php echo $max_players ?>
                                        </h6>

                                        <h6>
                                            min_playtime: <?php echo $min_playtime ?>
                                        </h6>

                                        <h6>
                                            max_playtime: <?php echo $max_playtime ?>
                                        </h6>


                                        <h6>
                                            desired_markup: <?php echo $desired_markup ?>
                                        </h6>

                                        <h6>
                                            manufacturer_profit: <?php echo $manufacturer_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $creator_profit ?>
                                        </h6>

                                        <h6>
                                            creator_profit: <?php echo $creator_profit ?>
                                        </h6>

                                        <h6>
                                            marketplace_price: <?php echo $marketplace_price ?>
                                        </h6>

                                        <?php
                                        $imageQuery = "SELECT * FROM published_multiple_files WHERE published_built_game_id = '$published_game_id'";
                                        $imageResult = mysqli_query($conn, $imageQuery);

                                        echo '<h2>Game Images</h2>';
                                        while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                                            $imagePath = $imageRow['file_path'];
                                            echo '<img src="' . $imagePath . '" alt="Game Image">';
                                        }
                                        ?>




                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>



                <!-- NEW FORM -->
                <div class="col posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-lg-12 mt-25">



                                    <!-- <form method="post" action="process_publish_built_game.php"
                                        enctype="multipart/form-data"> -->
                                    <form id="uploadForm" enctype="multipart/form-data">

                                        <input type="hidden" name="published_game_id" value="<?php echo $published_game_id; ?>">

                                        <input type="hidden" name="built_game_id" value="<?php echo $built_game_id; ?>">
                                        <input type="hidden" name="creator_id" value="<?php echo $user_id; ?>">


                                        <label for="game_name">Final Publishing Game Name:</label><br>
                                        <input type="text" id="game_name" name="game_name"><br>

                                        <label for="category">Category:</label><br>
                                        <select id="category" name="category" required>
                                            <option value="" disabled selected>Select a category</option>
                                            <?php
                                            // Loop through the categories and populate the dropdown
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                                            }
                                            ?>
                                        </select><br>

                                        <label for="edition">Edition:</label><br>
                                        <input type="text" id="edition" name="edition"><br>

                                        <!-- number of players -->
                                        <label for="min_players">Number of Players (Minimum):</label><br>
                                        <input type="number" id="min_players" name="min_players" required><br>

                                        <label for="max_players">Number of Players (Maximum):</label><br>
                                        <input type="number" id="max_players" name="max_players" required><br>

                                        <!-- play time -->
                                        <label for="min_playtime">Play Time (Minimum):</label><br>
                                        <input type="number" id="min_playtime" name="min_playtime" required><br>

                                        <label for="max_playtime">Play Time (Maximum):</label><br>
                                        <input type="number" id="max_playtime" name="max_playtime" required><br>

                                        <!-- Age dropdown -->
                                        <label for="age">Age:</label><br>
                                        <select id="age" name="age">
                                            <?php
                                            // Retrieve age values from the Age table and populate the dropdown
                                            $ageQuery = "SELECT * FROM age";
                                            $ageResult = mysqli_query($conn, $ageQuery);

                                            while ($ageRow = mysqli_fetch_assoc($ageResult)) {
                                                echo '<option value="' . $ageRow['age_id'] . '">' . $ageRow['age_value'] . '</option>';
                                            }
                                            ?>
                                        </select><br>

                                        <!-- others -->
                                        <label for="short_description">Short Description:</label><br>
                                        <textarea id="short_description" name="short_description" required></textarea><br>

                                        <label for="long_description">Long Description:</label><br>
                                        <textarea id="long_description" name="long_description" required></textarea><br>

                                        <label for="website">Website:</label><br>
                                        <input type="url" id="website" name="website"><br>

                                        <label for="logo">Logo:</label><br>
                                        <input type="file" class="filepond" name="logo" accept="image/*" required>


                                        <label for="game_images">Game Images:</label><br>
                                        <input type="file" class="filepond" name="game_images[]" multiple required>



                                        <div id="partitions">
                                            <p>Percentage: <span id="cost">
                                                    <?php echo $markup_percentage . '%'; ?>
                                                </span></p>

                                            <label for="desired_markup">Desired Markup:</label>
                                            <input type="number" name="desired_markup" id="desired_markup" required>

                                            <!-- Hidden input fields to store calculated values -->
                                            <label for="manufacturer_profit">STKR:</label>
                                            <input type="number" id="manufacturerProfitInput" name="manufacturer_profit" readonly>

                                            <label for="creator_profit">Creator:</label>
                                            <input type="number" id="creatorProfitInput" name="creator_profit" readonly>

                                            <label for="marketplace_price">Marketplace Price:</label>
                                            <input type="number" id="marketplacePriceInput" name="marketplace_price" readonly>
                                        </div>


                                        <br>

                                        <button type="submit" name="update">Publish Game</button>

                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->

    <!-- filepond -->
    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.js"></script>

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


            // mahalaga toh
            <?php include 'js/essential.php'; ?>

            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                Swal.fire({
                    title: '',
                    text: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'process_update_publish_built_game.php',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log(response);

                                // Display a SweetAlert success notification
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                }).then(function() {
                                    window.location.href = 'create_game_page.php#section7';
                                });
                            },
                        });
                    }
                });

            });



            // Initialize FilePond with the specified settings
            const inputElement = document.querySelector('input[name="logo"]');
            const pond = FilePond.create(inputElement, {
                allowMultiple: false, // Each input handles a single file
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
                required: true
            });

            // Initialize FilePond for the game images input
            const imageInput = document.querySelector('input[name="game_images[]"]');
            const imagePond = FilePond.create(imageInput, {
                allowMultiple: true, // Allow multiple files to be uploaded
                allowReplace: true,
                allowRemove: true,
                allowBrowse: true,
                storeAsFile: true,
                required: true,
                maxFiles: 10,
            });





            // Get the initial cost from PHP variable
            var cost = <?php echo $gameInfo['price']; ?>;
            var markupPercentage = <?php echo $markup_percentage; ?>; // Get the markup percentage

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