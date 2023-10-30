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

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isotope.js Search and Filter</title>


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

    <!-- Include jQuery and Isotope.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/css/isotope.min.css">


    <style>
        <?php include 'css/body.css' ?>
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <?php
            if ($game_id == 0) {
                echo '';
            } else {
                echo '
                    <h5>Game Id: ' . $game_id . '</h5>
                    <h5>Game Name: ' . $name . '</h5>
                    <h5>Game Description: ' . $description . '</h5>
                    ';
            }
            ?>


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="true">All</a>
                </li>
                <?php
                $sql = "SELECT * 
        FROM component_category";
                $query = $conn->query($sql);

                while ($row = $query->fetch_assoc()) {
                    $category = $row["category"];

                    echo '<li class="nav-item">
            <a class="nav-link" id="pills-' . $row['component_category_id'] . '-tab" data-toggle="pill" href="#pills-' . $row['component_category_id'] . '" role="tab" aria-controls="pills-' . $row['component_category_id'] . '" aria-selected="false">' . $category . '</a>
          </li>';
                }
                ?>


            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                    <?php
                    $sql = "SELECT *
                   FROM game_components
                   LEFT JOIN component_category ON game_components.category COLLATE utf8mb4_unicode_ci = component_category.category COLLATE utf8mb4_unicode_ci";


                    $query = $conn->query($sql);

                    while ($row = $query->fetch_assoc()) {
                        $component_id = $row["component_id"];
                        $component_name = $row["component_name"];
                        $description = $row["description"];
                        $price = $row["price"];
                        $has_colors = $row["has_colors"];
                        $is_upload_only = $row["is_upload_only"];
                        $size = $row["size"];

                        $sqlA = "SELECT * FROM component_assets WHERE component_id = $component_id";
                        $queryA = $conn->query($sqlA);
                        while ($rowA = $queryA->fetch_assoc()) {
                            $asset_id = $rowA["asset_id"];
                            $asset_path = $rowA["asset_path"];
                            $is_thumbnail = $rowA["is_thumbnail"];
                        }

                        echo '
                            <a href="game_component_details.php?game_id=' . $game_id . '&component_id=' . $component_id . '">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="' . $asset_path . '" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $component_name . '</h5>
                                        <p class="card-text">' . $description . '</p>
                                    </div>
                                </div>
                            </a>';
                    }
                    ?>
                </div>

                <?php
$sql = "SELECT * FROM component_category";
$query = $conn->query($sql);

while ($row = $query->fetch_assoc()) {
    $category = $row["category"];

    echo '<div class="tab-pane fade" id="pills-' . $row['component_category_id'] . '" role="tabpanel" aria-labelledby="pills-' . $row['component_category_id'] . '-tab">';

    $category_id = $row['component_category_id']; // Store the category ID for the inner loop

    $sql = "SELECT *
    FROM game_components
    LEFT JOIN component_category ON game_components.category COLLATE utf8mb4_unicode_ci = component_category.category COLLATE utf8mb4_unicode_ci
    WHERE component_category.component_category_id = $category_id";

    $queryInner = $conn->query($sql); // Use a different variable for the inner query

    while ($rowInner = $queryInner->fetch_assoc()) {
        $component_id = $rowInner["component_id"];
        $component_name = $rowInner["component_name"];
        $description = $rowInner["description"];
        $price = $rowInner["price"];
        $has_colors = $rowInner["has_colors"];
        $is_upload_only = $rowInner["is_upload_only"];
        $size = $rowInner["size"];

        $sqlA = "SELECT * FROM component_assets WHERE component_id = $component_id";
        $queryA = $conn->query($sqlA);

        while ($rowA = $queryA->fetch_assoc()) {
            $asset_id = $rowA["asset_id"];
            $asset_path = $rowA["asset_path"];
            $is_thumbnail = $rowA["is_thumbnail"];
        }

        echo '
        <a href="game_component_details.php?game_id=' . $game_id . '&component_id=' . $component_id . '">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="' . $asset_path . '" alt="Card image cap">
                <div class="card-body">
                    <h5 class "card-title">' . $component_name . '</h5>
                    <p class="card-text">' . $description . '</p>
                </div>
            </div>
        </a>';
    }

    echo '</div>'; // Close the tab-pane div for the outer loop
}
?>








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