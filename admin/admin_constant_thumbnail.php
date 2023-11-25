<?php
session_start();
include 'connection.php';


// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Thumbnail</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css?<?php echo time(); ?>" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/orders_count.css'; ?>
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
                            <h4>Thumbnails</h4>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>





                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="thumbnail" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include 'html/admin_footer.php'; ?>



    </div>











    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {

            <?php include 'html/count_orders.php'; ?>



            $('#thumbnail').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: true,
                ajax: {
                    url: "admin_json_thumbnail_table.php", // Use the PHP script to fetch data
                    dataSrc: ""
                },
                columns: [{
                        data: "thumbnail"
                    },
                    {
                        data: "image"
                    },
                    {
                        data: "actions"
                    }
                ]
            });

            $(document).ready(function() {
                // Event handler for the "Show Image" button
                $('body').on('click', '[id^="showImage_"]', function() {
                    // Extract the image path from the button's ID
                    var imagePath = $(this).data('id');

                    // Generate the HTML for the image
                    var imageHTML = '<img src="' + imagePath + '" alt="Image" style = "width:300px;height:300px;">';

                    // Use SweetAlert to display the image
                    Swal.fire({
                        title: 'Image Preview',
                        html: imageHTML,
                        confirmButtonText: 'Close'
                    });
                });
            });

            $('body').on('click', '[id^="uploadImage_"]', function() {
                // Extract the constant_id from the button's ID
                var constant_id = $(this).data('id');

                // Create a SweetAlert form for image upload
                Swal.fire({
                    title: 'Upload Image',
                    html: '<input type="file" id="imageUploadInput" accept="image/*">',
                    showCancelButton: true,
                    confirmButtonText: 'Upload',
                    preConfirm: () => {
                        const fileInput = document.getElementById('imageUploadInput');
                        const file = fileInput.files[0];

                        if (!file) {
                            Swal.showValidationMessage('Please select an image to upload.');
                        } else {
                            // You can use FormData to send the file to the server
                            const formData = new FormData();
                            formData.append('file', file);
                            formData.append('constant_id', constant_id);

                            // You can use AJAX or fetch to send the file to the server
                            // Example using fetch:
                            fetch('admin_process_image.php', {
                                    method: 'POST',
                                    body: formData,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {

                                        Swal.fire('Image uploaded successfully!', '', 'success');
                                        setTimeout(() => {
                                            location.reload(); // Reload the page
                                        }, 2000); // Delay for 2 seconds (adjust as needed)

                                        // Show success modal after a delay

                                    } else {
                                        Swal.fire('Error uploading image', data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error(error);
                                    Swal.fire('Error uploading image', 'An error occurred.', 'error');
                                });
                        }
                    },
                });
            });


        });
    </script>



</body>

</html>