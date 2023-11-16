<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  $user_id = 0;
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

  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="jquery-ui-1.10.2.custom.min.css" media="screen" rel="stylesheet" type="text/css">

  <script src="jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
  <script src="filter.js" type="text/javascript"></script>
  <script src="pagination.js?<?php echo time(); ?>" type="text/javascript"></script>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

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
    <?php
    include 'css/body.css';
    ?>@import url(https://fonts.googleapis.com/css?family=Raleway);


    .header_area {
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
  </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

  <?php
  $header_home = 'active';
  include 'html/page_header.php';
  ?>
  <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
  </button>



  



  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-4 col-md-5">
        <div class="sidebar-categories">

          <div>
            <h4 class='col-md-6'>

              <!-- (<span id="total_movies">0</span>) -->
            </h4>
          </div>

          <div>
            <label class="sr-only" for="searchbox">Search</label>
            <input type="text" class="form-control" id="searchbox" placeholder="Search &hellip;" autocomplete="off">
            <span class="glyphicon glyphicon-search search-icon"></span>
          </div>

          <div class="well">
            <fieldset id="stars_criteria">
              <legend>Price</legend>
              <span id="stars_range_label" class="slider-label">0 - 2500</span>
              <div id="stars_slider" class="slider">
              </div>
              <input type="hidden" id="stars_filter" value="0-2500">
            </fieldset>
          </div>

          <div class="well">
            <fieldset id="rating_criteria">
              <legend>Rating</legend> <span id="rating_range_label" class="slider-label">0 - 5</span>
              <div id="rating_slider" class="slider">
              </div>
              <input type="hidden" id="rating_filter" value="0-5">
            </fieldset>
          </div>

          <div class="well">
            <fieldset id="runtime_criteria">
              <legend>Runtime</legend> <span id="runtime_range_label" class="slider-label">50 mins - 250 mins</span>
              <div id="runtime_slider" class="slider">
              </div>
              <input type="hidden" id="runtime_filter" value="50-250">
            </fieldset>
          </div>

          <div class="well">
            <fieldset id="genre_criteria">
              <legend>Genre</legend>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="All" id="all_genre">
                  <span>All</span>
                </label>
              </div>

              <?php
              include "connection.php";

              $sql = "SELECT category_name FROM categories";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $category_name = $row['category_name'];
                  echo '<div class="checkbox">';
                  echo '<label>';
                  echo '<input type="checkbox" value="' . htmlspecialchars($category_name) . '">';
                  echo '<span>' . htmlspecialchars($category_name) . '</span>';
                  echo '</label>';
                  echo '</div>';
                }
              }
              ?>
            </fieldset>
          </div>

        </div>
      </div>

      <div class="col-xl-9 col-lg-8 col-md-7">
        <!-- Start Filter Bar -->
        <div class="filter-bar d-flex flex-wrap align-items-center">
          <div class="pagination">
            <div id="pagination"></div>
            <span id="per_page" class="content"></span>
          </div>
        </div>
        <!-- End Filter Bar -->



        <!-- Start Best Seller -->
        <section class="lattest-product-area pb-40 category-list">
          <div class="row" id="movies">
          
            

          </div>
        </section>
        <!-- End Best Seller -->

      </div>

    </div>
  </div>


  <div>



  </div>
  <!-- /.container -->


  <!-- <script id="movie-template" type="text/html"> -->
  <?php
  include 'html/marketplace_item.php';
  ?>

<footer>
        <?php
        include 'html/page_footer.php';
        ?>
    </footer>

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






  <script id="genre_template" type="text/html">
    <div class="checkbox">
      <label>
        <input type="checkbox">
      </label>
    </div>

    
  </script>

  <script>

$(".product_card").click(function() {
                var published_game_id = $(this).data("published_game_id");

                windows.location.href = "marketplace_item_page.php?id=" + published_game_id;
            });
  </script>

</body>

</html>