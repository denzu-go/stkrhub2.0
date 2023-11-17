<?php
include 'connection.php';

$built_game_id = $_GET['built_game_id'];
$creator_id = $_GET['creator_id'];

// PENDINGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
$query_markup = "SELECT percentage FROM markup_percentage";
$result_markup = mysqli_query($conn, $query_markup);
$markup_percentage = mysqli_fetch_assoc($result_markup)['percentage'];

$sqlGetPendingPublishRequest = "SELECT * FROM pending_published_built_games WHERE built_game_id = $built_game_id";
$queryGetPendingPublishRequest = $conn->query($sqlGetPendingPublishRequest);
while ($fetchedPendingPublishRequest = $queryGetPendingPublishRequest->fetch_assoc()) {
    $pending_published_built_game_id = $fetchedPendingPublishRequest['pending_published_built_game_id'];

    $pending_game_name = $fetchedPendingPublishRequest['game_name'];
    $pending_edition = $fetchedPendingPublishRequest['edition'];
    $pending_category = $fetchedPendingPublishRequest['category'];
    $pending_age_id = $fetchedPendingPublishRequest['age_id'];

    $pending_min_players = $fetchedPendingPublishRequest['min_players'];
    $pending_max_players = $fetchedPendingPublishRequest['max_players'];
    $pending_min_playtime = $fetchedPendingPublishRequest['min_playtime'];
    $pending_max_playtime = $fetchedPendingPublishRequest['max_playtime'];

    $pending_short_description = $fetchedPendingPublishRequest['short_description'];
    $pending_long_description = $fetchedPendingPublishRequest['long_description'];

    $pending_logo_path = $fetchedPendingPublishRequest['logo_path'];

    $pending_desired_markup = $fetchedPendingPublishRequest['desired_markup'];
    $pending_manufacturer_profit = $fetchedPendingPublishRequest['manufacturer_profit'];
    $pending_creator_profit = $fetchedPendingPublishRequest['creator_profit'];
    $pending_marketplace_price = $fetchedPendingPublishRequest['marketplace_price'];
}

// category
$sqlGetCategory = "SELECT * FROM categories WHERE category_id = $pending_category";
$queryGetCategory = $conn->query($sqlGetCategory);
while ($fetchedCategory = $queryGetCategory->fetch_assoc()) {
    $pending_category_name = $fetchedCategory['category_name'];
}

// age
$sqlGetAge = "SELECT * FROM age WHERE age_id = $pending_age_id";
$queryGetAge = $conn->query($sqlGetAge);
while ($fetchedAge = $queryGetAge->fetch_assoc()) {
    $pending_age_value = $fetchedAge['age_value'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Pending Details</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
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
    </style>
</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Games Approval Requests</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
                        </div>
                        <div class="container">
                            <div class="col-sm">
                                <button class="btn" id="approvePublish" data-built-game-id="<?php echo $built_game_id; ?>" data-creator_id="<?php echo $creator_id; ?>" style="background-color: #63d19e; color: white;">Approve Publish
                                    Request</button>

                                <button class="btn" id="cancelPublish" data-built-game-id="<?php echo $built_game_id; ?>" data-creator_id="<?php echo $creator_id; ?>" style="background-color: #dc3545; color: white;">Deny Publish
                                    Request</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">


                                    <!-- -- -->
                                    <div class="col-6" style="border-right: 2px solid #e7e7e7;">
                                        <div class="row">
                                            <h4 class="mx-auto">Pending Publish Details</h4>
                                        </div>

                                        <hr>

                                        <div class="container">
                                            <div class="row">
                                                <h6 class="">Final Publishing Game Name: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_game_name ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Edition: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_edition ?></h6>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="">Category: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_category_name ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Age: </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_age_value ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Number of Players (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_min_players ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Number of Players (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_max_players ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Play Time (minimum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_min_playtime ?> minutes</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Play Time (maximum): </h6> &nbsp; <h6 style="color: #777777"><?php echo $pending_max_playtime ?> minutes</h6>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="">Short Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                                <div class="container m-0 p-0"><?php echo $pending_short_description ?></div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="">Long Description: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                                <div class="container m-0" style="background-color: #222f3e;"><?php echo $pending_long_description ?></div>

                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="">Logo: </h6> &nbsp; <h6 style="color: #777777"></h6>

                                                <div class="image-banner-container">';
                                                    <img class="image-banner" src="../<?php echo $pending_logo_path ?>" alt="">';
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h6 class="">Cost: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_marketplace_price - $pending_desired_markup, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Desired Markup: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_desired_markup, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Manufacturer's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_manufacturer_profit, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Creator's Profit: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_creator_profit, 2) ?></h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="">Marketplace Price: </h6> &nbsp; <h6 style="color: #777777">&#8369;<?php echo number_format($pending_marketplace_price, 2) ?></h6>
                                            </div>


                                        </div>

                                    </div>

                                    <!-- -- -->
                                    <div class="col-6" style="border-right: 2px solid #e7e7e7;">

                                        <div class="container">
                                            <!-- Swiper -->
                                            <h6 class="">Game Images: </h6> &nbsp; <h6 style="color: #777777"></h6>
                                            <div class="swiper-container">

                                                <div class="swiper mySwiper2" style="margin-bottom: 10px;">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        $sqlBig = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                                        $resultBig = $conn->query($sqlBig);

                                                        while ($fetchedBig = $resultBig->fetch_assoc()) {
                                                            $file_path = $fetchedBig['file_path'];

                                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                            $file_extension = strtolower($extension);

                                                            // Check if the file extension is "mp4"
                                                            if ($file_extension === "mp4") {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-carousel-container">
                                                                            <video class="image-carousel" controls>
                                                                                <source src="../' . $file_path . '" type="video/mp4">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-carousel-container">
                                                                            <img class="image-carousel" src="../' . $file_path . '" />
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            }
                                                        }
                                                        ?>

                                                    </div>

                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>

                                                <div thumbsSlider="" class="swiper mySwiper">
                                                    <div class="swiper-wrapper">

                                                        <?php
                                                        $sqlSmall = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
                                                        $resultSmall = $conn->query($sqlSmall);

                                                        while ($fetchedSmall = $resultSmall->fetch_assoc()) {

                                                            $file_path = $fetchedSmall['file_path'];

                                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                            $file_extension = strtolower($extension);

                                                            // Check if the file extension is "mp4"
                                                            if ($file_extension === "mp4") {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-slide-container">
                                                                            <video class="image-slide">
                                                                                <source src="../' . $file_path . '">
                                                                                Your browser does not support the video tag.
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                ';
                                                            } else {
                                                                echo '
                                                                    <div class="swiper-slide">
                                                                        <div class="image-slide-container">
                                                                            <img class="image-slide" src="../' . $file_path . '" />
                                                                        </div>
                                                                    </div>
                    
                                                                ';
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                </div>

                                            </div>

                                            <hr>

                                            <!-- <h4>Components Included</h4> -->

                                            <!-- DataTables Game Components -->
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
                                            <!-- /DataTables Game Components -->

                                        </div>

                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php include 'html/admin_footer.php'; ?>
    </div>


    <!-- modals -->
    <div class="modal fade" id="changeAddress">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                </div>
                <form id="denyForm" enctype="multipart/form-data">
                    <div class="modal-body form-group">

                        <label for="reason" style="color: #777777;">Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" required></textarea>

                        <label for="fileupload" style="color: #777777;">File Upload:</label>
                        <input class="form-control" type="file" id="fileupload" name="fileupload"><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>























    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {

            var creator_id = <?php echo $creator_id; ?>;
            var built_game_id = <?php echo $built_game_id; ?>;

            $('#builtGameTable').DataTable({
                "ajax": {
                    "url": "admin_json_built_game_dashboard.php",
                    data: {
                        creator_id: creator_id,
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





            $('#approvePublish').click(function() {

                var built_game_id = $(this).data('built-game-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Are you sure to Approve this?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, send an AJAX request to process_cancel_details_request.php
                        $.ajax({
                            url: 'admin_process_approve_publish_request.php',
                            type: 'POST',
                            data: {
                                built_game_id: built_game_id
                            },
                            success: function(response) {
                                // Display a SweetAlert to inform success
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your request has been Published.',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    window.location.href = 'pending_details_request.php';
                                });
                            },
                            error: function() {
                                Swal.fire('Error', 'Failed to cancel the request.', 'error');
                            }
                        });
                    } else {
                        // User canceled, do nothing or provide feedback if needed
                        Swal.fire('Cancelled', 'Your request is still active.', 'info');
                    }
                });
            });














            $('#cancelPublish').on('click', function() {
                var gameId = $(this).data('built-game-id');
                var creator_id = $(this).data('creator_id');

                $("#changeAddress").modal("show");

                // You can also set hidden input fields to pass the gameId and creatorId to the PHP script
                $('#denyForm').append('<input type="hidden" id="game_id" value="' + gameId + '">');
                $('#denyForm').append('<input type="hidden" id="creator_id" value="' + creator_id + '">');
            });


            $("#denyForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData();
                formData.append('reason', $('#reason').val());
                formData.append('fileupload', $('#fileupload')[0].files[0]);

                formData.append('game_id', $('#game_id').val());
                formData.append('creator_id', $('#creator_id').val());

                // Make an AJAX request to submit the form data
                $.ajax({
                    url: 'admin_process_deny_publish_request.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle the success response here
                        console.log("Form submitted successfully.");
                        $("#changeAddress").modal('hide');
                    },
                    error: function(error) {
                        // Handle any errors here
                        console.error("Error submitting the form: " + error);
                        // You can display an error message or take any other appropriate action
                    }
                });
            });








            // Attach a click event handler to the button by its id
            $('#cancelPublisah').on('click', function() {
                const builtGameId = $(this).data('built-game-id');

                // Create a SweetAlert pop-up with an input field for reasons and a file upload field
                Swal.fire({
                    title: 'Deny Publish Details Request',
                    html: '<textarea type="text" id="denyReason" class="swal2-input" placeholder="Enter reasons for denial" required></textarea>' +
                        '<input type="file" id="fileUpload" class="swal2-input" accept=".pdf,.jpg,.jpeg,.png">',
                    showCancelButton: true,
                    confirmButtonText: 'Deny',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        // Handle the input (reason and file) here, e.g., send them to the server
                        const denyReason = $('#denyReason').val();
                        const file = $('#fileUpload').prop('files')[0];

                        // Check if the input field is empty
                        if (!denyReason) {
                            Swal.showValidationMessage('Reason is required');
                            return false; // Prevent the SweetAlert from closing
                        }

                        // Create a FormData object to send both text and file data
                        const formData = new FormData();
                        formData.append('gameId', builtGameId);
                        formData.append('reason', denyReason);
                        formData.append('file', file);

                        // Send the AJAX request to the server
                        return $.ajax({
                            url: 'admin_process_deny_publish_request.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                // Display a SweetAlert to inform success
                                Swal.fire({
                                    title: 'Denied!',
                                    text: 'Request Publish Denied',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    window.location.href = 'pending_details_request.php';
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'An error occurred while processing the request.', 'error');
                            }
                        });
                    }
                });
            });


            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });



        });
    </script>



</body>

</html>