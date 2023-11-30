<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: login_page.php");
    exit;
}

$built_game_id = $_GET['built_game_id'];

// Retrieve the markup percentage from the database
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$query = "SELECT built_game_id, name, description, game_id, creator_id, price, is_published, is_purchased FROM built_games WHERE built_game_id = '$built_game_id'";
$result = mysqli_query($conn, $query);

// Fetch category data from the categories table
$query_categories = "SELECT category_id, category_name FROM categories";
$result_categories = mysqli_query($conn, $query_categories);

// Check if there are categories available
if (mysqli_num_rows($result_categories) > 0) {
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}

if (mysqli_num_rows($result) > 0) {
    $gameInfo = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

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
    <title>Edit Publish Game</title>
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

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/body.css' ?><?php include 'css/header.css'; ?>#infoTable .odd {
            background-color: transparent;
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

        .sticky-wrapper {
            top: 0px !important;
        }

        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        .form-control::placeholder {
            font-size: 14px;
            /* Adjust the font size as needed */
        }



        /* edit button */
        .edit-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        /* delete button */
        .delete-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .delete-component {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .approve-game {
            background-color: #1f2243 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        .cancel-ticket {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        label {
            color: white;
        }


        /* datatables */
        table.dataTable.stripe tbody tr.even,
        table.dataTable.display tbody tr.even {
            background-color: #15172e;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #1f2243;
        }

        .odd {
            margin: 20px;
        }

        #userTable {
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

        input[type="search"] {
            color: white;
        }

        .approve-game[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }

        .dataTables_length {
            display: none;
            /* Hide the length dropdown */
        }


        /* form required */




        /* filepond */
        .filepond--item {
            width: 16rem;
            min-height: 9rem;
            max-height: 9rem;
            overflow: hidden;
        }

        /* use a hand cursor intead of arrow for the action buttons */
        .filepond--file-action-button {
            cursor: pointer;
        }

        /* the text color of the drop label*/
        .filepond--drop-label {
            color: #555;
        }

        /* underline color for "Browse" button */
        .filepond--label-action {
            text-decoration-color: #aaa;
        }

        /* the background color of the filepond drop area */
        .filepond--panel-root {
            background-color: #eee;
        }

        /* the border radius of the drop area */
        .filepond--panel-root {
            border-radius: 0.5em;
        }

        /* the border radius of the file item */
        .filepond--item-panel {
            border-radius: 0.5em;
        }

        /* the background color of the file and file panel (used when dropping an image) */
        .filepond--item-panel {
            background-color: #555;
        }

        /* the background color of the drop circle */
        .filepond--drip-blob {
            background-color: #999;
        }

        /* the background color of the black action buttons */
        .filepond--file-action-button {
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* the icon color of the black action buttons */
        .filepond--file-action-button {
            color: white;
        }

        /* the color of the focus ring */
        .filepond--file-action-button:hover,
        .filepond--file-action-button:focus {
            box-shadow: 0 0 0 0.125em rgba(255, 255, 255, 0.9);
        }

        /* the text color of the file status and info labels */
        .filepond--file {
            color: white;
        }

        /* error state color */
        [data-filepond-item-state*='error'] .filepond--item-panel,
        [data-filepond-item-state*='invalid'] .filepond--item-panel {
            background-color: red;
        }

        [data-filepond-item-state='processing-complete'] .filepond--item-panel {
            background-color: green;
        }

        /* bordered drop area */
        .filepond--panel-root {
            background-color: transparent;
            border: 2px solid #2c3340;
        }

        .input_color {
            background-color: #222f3e;
            color: #ffffff;
            border: none;
        }

        li.option {
            color: #777777;
        }

        p {
            color: floralwhite;
            opacity: 50%;
        }
    </style>
</head>

<body style="
background-image: url('img/Backgrounds/bg2.png');
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;">
    <?php include 'html/page_header.php'; ?>

    <!-- Back to top button -->
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Start Sample Area -->
    <section class="sample-text-area">

        <div class="container" style="background: none;">

            <h1><a href="create_game_page.php#section5" class="fa-solid fa-arrow-left" style="color: #26d3e0; cursor:pointer;"></a> Game Dashboard</h1>

            <hr>

            <div class="container ">

                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col d-flex align-items-center">
                        <table id="infoTable" class="display" style="width: 100%;"></table>
                        <tbody>
                        </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <div class="container" style="display:flex; flex-direction:column; gap: 20px;">
                            <?php
                            $sqlTutorials = "SELECT * FROM tutorials WHERE designation = 'publish_game' LIMIT 1";
                            $result = $conn->query($sqlTutorials);

                            while ($fetchedTutorials = $result->fetch_assoc()) {
                                $tutorial_id = $fetchedTutorials['tutorial_id'];
                                $tutorial_title = $fetchedTutorials['tutorial_title'];
                                $tutorial_description = $fetchedTutorials['tutorial_description'];
                                $tutorial_link = $fetchedTutorials['tutorial_link'];;
                                $is_primary = $fetchedTutorials['is_primary'];
                                $time_added = $fetchedTutorials['time_added'];

                                echo '
                            <div class="row s_product_inner">
                                <div class="col-lg-8">
                                    <div class="iframe-container">
                                        <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-lg-4 offset-lg-1" style="margin-left: 0px; margin-top: 0px;">
                                    <div class="s_product_text" style="margin-top: 20px;line-height: 10px;">
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
                            </div>
                            ';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="container">

            <!-- <table id="builtGameTable" class="display">
                <thead>
                    <tr>
                        <th>Component Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table> -->
        </div>

        <hr>

        <div class="container">


            <form id="uploadForm">

                <input type="hidden" id="built_game_id" name="built_game_id" value="<?php echo $built_game_id; ?>">

                <input type="hidden" id="creator_id" name="creator_id" value="<?php echo $gameInfo['creator_id']; ?>">


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
                                <option class="form-control" value="" disabled selected>Player Age Range</option>
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
                            <label class="form-label" for="form8Example4">Mimimum Playtime</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline">

                            <input type="number" id="max_playtime" name="max_playtime" class="form-control input_color" required />
                            <label class="form-label" for="form8Example4">Maximum Playtime</label>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col">
                        <!-- short description -->
                        <div class="form-outline">
                            <label class="form-label" for="form8Example1">Summary</label>
                            <textarea class="form-control input_color"  id="short_description" name="short_description" required></textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col">
                        <!-- long description -->
                        <div class="form-outline">
                            <label class="form-label" for="form8Example1">Game Mechanics</label>
                            <textarea class="form-control input_color" id="long_description" name="long_description" required>&nbsp;</textarea>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-4">
                        <!-- Logo input -->
                        <div class="form-outline">
                            <label class="form-label" for="form8Example1">Thumbnail</label>
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
                            <input type="file" class="filepond input_color" name="game_images[]" accept="image/*, video/*" multiple required>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row" id="partitions">

                    <div class="col">
                        <!-- markup input -->
                        <div class="form-outline">
                            <label class="form-label" for="form8Example1">Desired Markup</label>
                            <p> note: Desired Profit for published game</p>
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
                            <label class="form-label" for="form8Example1">Manufacturer's Profit</label>
                            <p> note: Stkr Labs Shared Profit</p>
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
                            <label class="form-label" for="form8Example1">Your profit</label>
                            <p> note: Creators Shared Profit</p>
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
                            <label class="form-label" for="form8Example1">Marketplace Price</label>
                            <p> note: Production cost + Desired Markup</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&#8369;</span>
                                </div>
                                <input type="number" id="marketplacePriceInput" name="marketplace_price" class="form-control input_color" disabled style="background-color: #222F3E; border: none;" />
                            </div>
                        </div>
                    </div>
                </div>


                <input class="primary-btn" type="submit" value="Submit">
            </form>

        </div>

    </section>
    <!-- End Sample Area -->


    <!-- new jquery version -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->
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

    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/rpa89s3fugo121yri1pvn1d4pp53s29njc2y5x6asbbn1t39/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


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

            $('#infoTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_info_table_built_game.php",
                    data: {
                        built_game_id: <?php echo $built_game_id; ?>,
                        user_id: <?php echo $user_id; ?>
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });


            // Handle form submission using AJAX
            $('#uploadForm').submit(function(event) {
                event.preventDefault();

                var formData = new FormData();

                formData.append('built_game_id', $("#built_game_id").val());
                formData.append('creator_id', $("#creator_id").val());

                formData.append('game_name', $("#game_name").val());
                formData.append('edition', $("#edition").val());
                formData.append('category', $("#category").val());
                formData.append('age', $("#age").val());

                formData.append('min_players', $("#min_players").val());
                formData.append('max_players', $("#max_players").val());
                formData.append('min_playtime', $("#min_playtime").val());
                formData.append('max_playtime', $("#max_playtime").val());

                var short_description = $("#short_description").val();
                var long_description = tinymce.get('long_description').getContent();

                var fileInput = $("#logo");
                var logo = fileInput.prop("files")[0];

                var gameImagesInput = $("input[name='game_images[]']");
                var gameImages = gameImagesInput.prop("files");

                formData.append('short_description', short_description);
                formData.append('long_description', long_description);
                formData.append("logo", logo);

                for (var i = 0; i < gameImages.length; i++) {
                    formData.append("game_images[]", gameImages[i]);
                }

                formData.append('desired_markup', $("#desired_markup").val());
                formData.append('manufacturerProfitInput', $("#manufacturerProfitInput").val());
                formData.append('creatorProfitInput', $("#creatorProfitInput").val());
                formData.append('marketplacePriceInput', $("#marketplacePriceInput").val());

                // Perform an AJAX request
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
                            type: 'POST',
                            url: 'process_publish_built_game.php',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log(response);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                }).then(function() {
                                    window.location.href = 'create_game_page.php#section5';
                                });
                            },
                        });
                    }
                });

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