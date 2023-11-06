<?php
session_start();
include 'connection.php';


if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
} else {
    $game_id = 0;
}

$sqlGetGameInfo = "SELECT * FROM games WHERE game_id = $game_id";
$queryGetGameInfo = $conn->query($sqlGetGameInfo);

while ($fetchedGetGameInfo = $queryGetGameInfo->fetch_assoc()) {
    $name = $fetchedGetGameInfo['name'];
    $description = $fetchedGetGameInfo['description'];
    $created_at = $fetchedGetGameInfo['created_at'];
    $is_built = $fetchedGetGameInfo['is_built'];
}

if (isset($_GET['category'])) {
    $selected_category = $_GET['category'];
} else {
    $selected_category = '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icon.png">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>My Games</title>


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
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/body.css'; ?>.multi-step-bar {
            overflow: hidden;
            counter-reset: step;
            width: 75%;
            margin: 15px auto 30px;
        }

        li.step {
            text-align: center;
            list-style-type: none;
            color: blue;
            text-transform: CAPITALIZE;

            position: relative;
            font-weight: 600;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        .section-step {
            padding: 20px;
            margin: 0px;
            display: none;
        }

        .section-step:target {
            display: block;
        }


        <?php include 'css/header.css'; ?>

        /* header */
        .sticky-wrapper {
            top: 0px !important;
        }

        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* header end */

        .form-control::placeholder {
            font-size: 14px;
            /* Adjust the font size as needed */
        }


        /* btn add */
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border-radius: calc(45px/2);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background: linear-gradient(144deg, #26d3e0, #b660e8);
        }

        /* plus sign */
        .sign {
            width: 100%;
            font-size: 1.7em;
            color: white;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* text */
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-weight: 500;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .Btn:hover {
            width: 125px;
            transition-duration: .3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 15px;
        }

        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 15px;
        }

        /* button click effect*/
        .Btn:active {
            transform: translate(2px, 2px);
        }

        /* edit button */
        .edit-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        /* hide */
        #hideButton {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #e7e7e7;
        }

        /* unhide */
        #unhideButton {
            background-color: #b660e8 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #e7e7e7;
        }

        /* editButton */
        #editButton {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        /* edit button */
        .edit-built_game {
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

        .delete-built_game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        /* approve game button */
        .approve-game {
            background-color: #15172e !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        /* approve game button */
        .add-to-cart-approved {
            background-color: #15172e !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        /* view-reason */
        .view-reason {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        .add-to-cart-approved[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }

        .approve-game[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }

        .cancel-ticket {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }


        /* datatables */
        table.dataTable.stripe tbody tr.even,
        table.dataTable.display tbody tr.even {
            background: rgb(39, 42, 78);
            background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(31, 34, 67, 0.7) 100%);
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background: rgb(39, 42, 78);
            background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(21, 23, 46, 0.7) 100%);
        }

        table#cartCount.stripe tbody tr.odd,
        table#cartCount.display tbody tr.odd {
            background: transparent;
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
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>

    <!-- Start Sample Area -->
    <section class="sample-text-area">

        <!-- taas -->
        <div class="container">

            <?php
            if ($game_id == 0) {
                echo '';
            } else {
                echo '
                Adding to
                    <h6>Game Name: ' . $name . '</h6>
                    ';
            }
            ?>
            <?php include 'html/all_components_header.php' ?>
        </div>

        <div class="container">
            <div class="row">

                <div class="container mx-auto mt-4 justify-content-around">
                    <div class="row d-flex justify-content-around">
                        <?php
                        if ($selected_category == '') {
                            $sql = "SELECT * FROM game_components";
                        } else {
                            $sql = "SELECT * FROM game_components WHERE category = '$selected_category'";
                        }
                        $sql;
                        $queryInner = $conn->query($sql);
                        while ($rowInner = $queryInner->fetch_assoc()) {
                            $component_id = $rowInner["component_id"];
                            $component_name = $rowInner["component_name"];
                            $description = $rowInner["description"];
                            $price = $rowInner["price"];
                            $has_colors = $rowInner["has_colors"];
                            $size = $rowInner["size"];

                            $sqlA = "SELECT * FROM component_assets WHERE component_id = $component_id";
                            $queryA = $conn->query($sqlA);

                            while ($rowA = $queryA->fetch_assoc()) {
                                $asset_id = $rowA["asset_id"];
                                $asset_path = $rowA["asset_path"];
                                $is_thumbnail = $rowA["is_thumbnail"];
                            }

                            echo '
                            <a class="mb-4" href="game_component_details.php?game_id=' . $game_id . '&component_id=' . $component_id . '" style="width: 20rem;">
                                <div class="card" style="background-color: #272a4e !important;">
                                    <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 10px; position: relative; padding-top: 100%;">
                                        <img class="card-img-top image-mini" src="' . $asset_path . '" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
                                    </div>

                                    <div class="card-body pt-0 pb-0 pl-4 pr-4">
                                        <div class="row">
                                            <h5 class="d-inline-block text-truncate" style="max-width: 540px;" data-toggle="tooltip" title="' . $component_name . '">
                                                ' . $component_name . '
                                            </h5>
                                        </div>

                                        <div class="row">
                                            <span class="d-inline-block text-truncate" style="max-width: 540px;" data-toggle="tooltip" title="' . $price . '">
                                                &#8369;' . $price . '
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="d-inline-block text-truncate" style="max-width: 540px;" data-toggle="tooltip" title="' . $description . '">
                                                ' . $description . '
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                            ';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- End Sample Area -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

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





    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>

    </script>

</body>

</html>