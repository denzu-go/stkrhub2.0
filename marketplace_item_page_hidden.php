<?php
session_start();

include 'connection.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}



$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
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

        /* overflow */
        .review_list {
            max-height: 500px;
            overflow: scroll;
        }

        .col-3-2 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 120px;
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

    <section class="product_description_area" style="background: none;">
        <div class="container">
            <br><br><br><br><br><br><br>
            <div class="container d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-eye-slash text-center" style="font-size: 44px;"></i>
            </div>

            <div class="container d-flex align-items-center justify-content-center">
                <h5 class="text-center">This Published Game is hidden</h5>
            </div>
        </div>
    </section>


    <?php
    include 'html/page_footer.php';
    ?>





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

    <!-- showmore.js -->
    <script src="jquery.show-more.js"></script>


    <script>
        $(document).ready(function() {

            var user_id = <?php echo $user_id ?>;
            <?php include 'js/essential.php'; ?>
            

        });
    </script>





</body>

</html>