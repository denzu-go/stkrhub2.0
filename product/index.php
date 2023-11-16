<?php

include "database.php";
$query = mysqli_query($conn, "SELECT MIN(product_price) as min_price, MAX(product_price) as max_price FROM product ");
$row = mysqli_fetch_array($query);
$min = (int) $row["min_price"];
$max = (int) $row["max_price"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jamsrworld.com</title>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">

</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" cz-shortcut-listen="true">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <div id="kt_header" class="header align-items-stretch">
                    <div class="container-xxl d-flex align-items-center">

                        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
                            <a href="http://localhost/jamsrworld">
                                <img alt="Logo" src="http://localhost/jamsrworld/assets/images/web/logo.png" class="logo-default h-25px">
                            </a>
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
                                                    <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278" ></path>
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
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278" ></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <div class="price-slider">
                                                        <input autocomplete="off" type="hidden" id="minimum_price" value="<?php echo $min; ?>" />
                                                        <input autocomplete="off" type="hidden" id="maximum_price" value="<?php echo $max; ?>" />
                                                        <p id="price_text">₹<?php echo $min; ?> - ₹<?php echo $max; ?></p>
                                                        <div id="price_range"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator "></div>
                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Brand</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278" ></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT DISTINCT(product_brand) FROM product ORDER BY product_brand ASC ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div class="mb-2 form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input" data-filter="brand" type="checkbox" value="' . $row["product_brand"] . '" id="brand' . $row["product_brand"] . '" />
                                                            <label class="form-check-label" for="brand' . $row["product_brand"] . '">
                                                                ' . $row["product_brand"] . '
                                                            </label>
                                                        </div>';
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <div class="separator "></div>
                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Storage</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278" ></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT DISTINCT(product_storage) FROM product ORDER BY product_storage ASC ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div class="mb-2 form-check form-check-custom form-check-solid me-10">
                                                    <input class="form-check-input" type="checkbox"  data-filter="storage"  value="' . $row["product_storage"] . '" id="storage' . $row["product_storage"] . '" />
                                                    <label class="form-check-label" for="storage' . $row["product_storage"] . '">
                                                        ' . $row["product_storage"] . ' GB
                                                    </label>
                                                </div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="separator "></div>
                                            <div class="card card-flush ">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h4>Ram</h4>
                                                    </div>
                                                    <div class="card-toolbar drop-active">
                                                        <svg width="12" height="12" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#5e6278" ></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="pt-0 card-body">
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT DISTINCT(product_ram) FROM product ORDER BY product_ram ASC ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<div class="mb-2 form-check form-check-custom form-check-solid me-10">
                                                    <input class="form-check-input" type="checkbox"  data-filter="ram" value="' . $row["product_ram"] . '" id="ram' . $row["product_ram"] . '" />
                                                    <label class="form-check-label" for="ram' . $row["product_ram"] . '">
                                                        ' . $row["product_ram"] . ' GB
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


                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2022 ©</span>
                            <a href="http://localhost/jamsrworld" class="text-gray-800 text-hover-primary">Jamsrworld</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>