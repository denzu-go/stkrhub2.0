<?php
session_start();
include 'connection.php';

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
    <link rel="shortcut icon" href="img/icon.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>STKR HUB</title>

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

    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">

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




    <style>
        <?php include 'css/body.css'; ?>.header_area {
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



        button:hover {
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            -webkit-box-shadow: 5px 0px 18px 0px rgba(105, 105, 105, 0.8);
            -moz-box-shadow: 5px 0px 18px 0px rgba(105, 105, 105, 0.8);
            box-shadow: 5px 0px 18px 0px rgba(105, 105, 105, 0.8);
        }



        /* start header */
        .sticky-wrapper {
            top: 0px !important;
        }


        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* end */

        #infoTable tbody tr {
            background-color: transparent !important;
        }

        .image-mini-container {
            overflow: hidden;
            width: 100%;
            position: relative;
            padding-top: 100%;
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            /* -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 100%); */
        }

        .custom-shadow {
            box-shadow: 0 0 10px #000000;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 0px;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }

        .even,
        .odd {
            background-color: transparent !important;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            /* border-collapse: separate; */
            border-spacing: -20px;
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


        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #272a4e;
        }

        .nav-link {
            color: #fff;
        }

        /* sidebar */
        #sidebar {
            height: 100%;
            background: transparent;
            color: #fff;
        }

        #sidebar a,
        #sidebar a:hover,
        #sidebar a:focus {
            color: inherit;
        }

        #sidebar ul li a {
            padding: 7px 14px;
            display: block;
            color: #e7e7e7;
            font-size: small;
        }

        #sidebar ul li a:hover {
            color: #e7e7e7;
            background: #272a4e;
            border-radius: 14px;
        }

        /* buttons */
        .edit-btn-avatar {
            background-color: transparent !important;
            border: none;
            cursor: pointer;
            color: #90ee90;
        }

        /* sidebar active */
        #sidebar .active {
            background-color: #272a4e;
            border-radius: 14px;
        }

        /* Regular state */
        .sidebar-item {
            cursor: pointer;
            padding: 7px 14px;
            display: block;
            color: #e7e7e7;
            font-size: 20px;
            /* Your regular styles for sidebar items */
        }

        /* Hover state */
        .sidebar-item:hover {
            color: #e7e7e7;
            background: #272a4e;
            border-radius: 14px;
        }

        /* Active state (when clicked) */
        .sidebar-item.active {
            background-color: #272a4e;
            border-radius: 14px;
        }

        .col-2-2{
            -ms-flex: 0 0 30%;
    flex: 0 0 30%;
    max-width: 30%;
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
    include 'connection.php';


    $header_help = 'active';
    include 'html/page_header.php';
    ?>

    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <br><br><br><br><br><br>

    <!-- Start Help category -->
    <section class="pb-5" style="background: none;">
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <?php
                            if (isset($_GET['category'])) {

                                echo '
                                    <div style="position: absolute; left:-270px; margin-bottom:100px">
                                    <button id= "back" class="click-btn btn btn-default"><i class="fa fa-long-arrow-left"
                                            aria-hidden="true"></i></button>
                                    </div>
                                ';
                            }
                            ?>
                            <h1 class="scroll_reveal">Here are a few Help to enhance your experience</h1>
                            <p class="scroll_reveal">

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="container mx-auto mt-4 justify-content-around">
                        <div class="row d-flex justify-content-around">

                            <?php

                            if (isset($_GET['category'])) {
                                $category = $_GET['category'];

                                $sql = "SELECT *
                                FROM faq
                                WHERE faq_category = ?";

                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("s", $category);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();

                                if ($row['faq_type'] == 1) {

                                    $id = $row['faq_id'];


                                    $sql = "SELECT *
                                FROM tutorials
                                WHERE faq_id = ?";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    while ($fetchedTutorials = $result->fetch_assoc()) {
                                        $tutorial_id = $fetchedTutorials['tutorial_id'];
                                        $tutorial_title = $fetchedTutorials['tutorial_title'];
                                        $tutorial_description = $fetchedTutorials['tutorial_description'];
                                        $tutorial_link = $fetchedTutorials['tutorial_link'];;
                                        $is_primary = $fetchedTutorials['is_primary'];
                                        $time_added = $fetchedTutorials['time_added'];

                                        echo '
                                    
                                    <div class="container" style="display:flex; flex-direction:column; gap: 20px;">
                                    <div class="row s_product_inner scroll_reveal">
                                        <div class="col-lg-8">
                                            <div class="iframe-container">
                                            <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                
                                            </div>
                                        </div>
                
                                        <div class="col-lg-4 offset-lg-1" style="margin-left: 0px; margin-top: 0px;">
                                            <div class="s_product_text" style="margin-top: 20px;">
                                                <h3>' . $tutorial_title . '</h3>
                
                                                <p>
                                                    ' . $tutorial_description . '
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    </div>
                                    ';
                                    }
                                } else {

                                    $id = $row['faq_id'];


                                    $sql = "SELECT *
                                            FROM help
                                            LEFT JOIN faq ON help.faq_id = faq.faq_id
                                            WHERE faq.faq_id = ?";


                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $number = 0;






                                    echo '
                                        
                                       
                                            <div class="container">
                                            
                                               <div class="wrapper d-flex align-items-stretch row">

                                                    <nav id="sidebar" class="active col-2-2" >
                                                        <ul class="list-unstyled components m-1">';
                                    while ($help = $result->fetch_assoc()) {
                                        echo '<li class="sidebar-item" data-help-id="' . $help['help_id'] . '" 
                                                style = " cursor:pointer;" >' . $help['help_title'] . '</li>';
                                    }
                                    echo '  </ul>
                                                     </nav>';



                                    echo '<div id="content" class="col">

                                                        <!-- content -->
                                                        <div class="container">
                                                            <div class="container">
                                                                <div class="main-body">
                                                                    
                                                                       
                                                                            <div class="card" style="background: rgba(39, 42, 78, 0.57);
                                                                            border-radius: 7px 7px 7px 7px;
                                                                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                                                            backdrop-filter: blur(5.7px);
                                                                            -webkit-backdrop-filter: blur(5.7px);">
                                                                                <table id="help_description" class="display" style="width: 100%;">
                                                                                    <tbody>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>';
                                    echo '</div>';
                                }
                            } else {


                                $sql = "SELECT * FROM faq";
                                $result = $conn->query($sql);

                                while ($faq_row = $result->fetch_assoc()) {
                                    echo '
                
                                        <div class="product_card m-3 scroll_reveal" id="published_game" data-faq_id= "' . $faq_row['faq_category'] . '" style="width: 20rem;">
                                            <div class="card" style="border: none;">
                                        
                                                <div class="container p-0" style="margin-bottom: 4rem;">

                                                    <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 10px; position: relative; padding-top: 45.25%;">

                                                        <img class="card-img-top image-mini" src="' . $faq_row['faq_image_path'] . '" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
                                                    
                                                    </div>

                                                </div>
                                            
                                                
                                            
                                                <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
                                                    <div class="row" style="width: 100%;">
                                                        <div class="col-1">
                                                            <div >
                                                            
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col" style="margin-left: 30px;">
                                                            <div class="row">
                                                                <h5 class="d-inline-block text-truncate" style="max-width: 240px; text-align: center;" data-toggle="tooltip">
                                                                ' . $faq_row['faq_category'] . '
                                                                </h5>
                                                            </div>

                                                            <div class="row">
                                                                <h5 class="d-inline-block text-truncate"  data-toggle="tooltip">
                                                                    ' . $faq_row['faq_description'] . '
                                                                </h5>
                                                            </div>
                                                            

                                                            <div class="row">
                                                                <h6 class="d-inline-block small text-muted text-truncate" style="max-width: 240px;" data-toggle="tooltip">
                                                                    
                                                                </h6>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    
                                    ';
                                }
                            }

                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Help category Area -->



    <!-- start product Area -->
    <section class="" style="background: none;">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="container mx-auto mt-4 justify-content-around">
                        <div class="row d-flex justify-content-around">




                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end product Area -->


    <!-- start footer Area -->
    <?php

    include 'html/page_footer.php';
    ?>
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



            $(".product_card").click(function() {
                var faq_category = $(this).data("faq_id");
                window.location.href = "help.php?category=" + faq_category;
            });

            document.getElementById("back").addEventListener("click", function() {
                window.location.href = "help.php";
            });



            // Your click event handler for sidebar items
            $('.sidebar-item').click(function() {
                var helpId = $(this).data('help-id'); // Get the help ID from the clicked element

                // Perform an action with the help ID
                console.log('Clicked Help ID:', helpId);

                // Assuming you want to trigger DataTable initialization here
                initializeDataTable(helpId);

                // Remove 'active' class from all sidebar items
                $('.sidebar-item').removeClass('active');

                // Add 'active' class to the clicked sidebar item
                $(this).addClass('active');
            });



            // Function to initialize or reinitialize DataTable
            function initializeDataTable(helpId) {
                // Check if DataTable is already initialized
                if ($.fn.DataTable.isDataTable('#help_description')) {
                    // If DataTable is already initialized, destroy it before reinitializing
                    $('#help_description').DataTable().destroy();
                }

                // Initialize DataTable
                $('#help_description').DataTable({
                    "dom": '<"compact"lfrtip>',
                    searching: false,
                    info: false,
                    paging: false,
                    ordering: false,
                    "ajax": {
                        "url": "json_help_content.php",
                        data: {
                            help_id: helpId // Pass the clicked helpId to your PHP handling the data
                        },
                        "dataSrc": ""
                    },
                    "columns": [{
                        "data": "item"
                    }]
                });
            }









        });
    </script>
</body>

</html>