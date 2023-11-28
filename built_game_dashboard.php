<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['built_game_id'])) {
    $built_game_id = $_GET['built_game_id'];
}


$sqlGetGameDetails = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
$queryGetGameDetails = $conn->query($sqlGetGameDetails);
while ($fetchedGetGameDetails = $queryGetGameDetails->fetch_assoc()) {
    $game_id = $fetchedGetGameDetails['game_id'];
    $name = $fetchedGetGameDetails['name'];
    $description = $fetchedGetGameDetails['description'];
    $build_date = $fetchedGetGameDetails['build_date'];
    $is_pending =     $fetchedGetGameDetails['is_pending'];
    $is_canceled = $fetchedGetGameDetails['is_canceled'];
    $is_approved = $fetchedGetGameDetails['is_approved'];
    $is_purchased = $fetchedGetGameDetails['is_purchased'];
    $is_published = $fetchedGetGameDetails['is_published'];
    $price = $fetchedGetGameDetails['price'];

    if ($is_pending == 1) {
        $status_value = 'PENDING';
    } elseif ($is_canceled == 1) {
        $status_value = 'CANCELED';
    } elseif ($is_approved == 1) {
        $status_value = 'APPROVED';
    } elseif ($is_purchased == 1) {
        $status_value = 'PURCHASED';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } else {
        $status_value = '';
    }

    $status = $status_value;
}

$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>Built Game Dashboard</title>
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
        <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>

        /* start header */
        .sticky-wrapper {
            top: 0px !important;
        }


        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* end */

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

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">
    <?php include 'html/page_header.php'; ?>

    <!-- Start Sample Area -->
    <section class="sample-text-area" style="background: none;">

        <div class="container">
            <div class="d-flex justify-content-start">
                <a href="javascript:history.back()" style="cursor:pointer;"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>

            <h5>Game Name: <?php echo $name ?></h5>
            <h5>Description: <?php echo $description ?></h5>
            <h5>Approved Date: <?php echo $build_date ?></h5>
            <h5>Cost: <?php echo $price ?></h5>
            <h5>Status: <?php echo $status ?></h5>
        </div>


        <div class="container">
            <!-- DataTables Game Components -->
            <table id="builtGameTable" class="display">
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
            </table>
            <!-- /DataTables Game Components -->

        </div>

    </section>
    <!-- End Sample Area -->




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




    <script>
        $(document).ready(function() {

            var user_id = <?php echo $user_id; ?>;
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#builtGameTable').DataTable({
                language: {
                    search: "",
                },

                searching: true,
                info: false,
                paging: false,
                ordering: false,


                "ajax": {
                    "url": "json_built_game_dashboard.php",
                    data: {
                        user_id: user_id,
                        built_game_id: built_game_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "component_name"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "quantity"
                    },
                    {
                        "data": "individual_price"
                    },
                    {
                        "data": "info"
                    },
                ]
            });

            // search bar
            var searchInput = $('div.dataTables_filter input');

            searchInput.attr('placeholder', 'Search here');
            searchInput.addClass('form-control');
            searchInput.css('width', '100%');



            
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


        });
    </script>

</body>

</html>