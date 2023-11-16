<?php
session_start();
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
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

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Adjust the width as needed */
        .wide-swal {
            width: 800px;
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
                            <h4>Banners</h4>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>





                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="banners" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Banner Name</th>
                                            <th>Image</th>
                                            <th>Showcased</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <a class="btn btn-outline-primary" id="addBanner" style="display: block; margin:20px; width:200px;color:cornflowerblue;" role="button" style="text-align:center;">Add New Banner</a>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include 'html/admin_footer.php'; ?>


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

            $('#banners').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: true,
                ajax: {
                    url: "admin_json_banner_table.php", // Use the PHP script to fetch data
                    dataSrc: ""
                },
                columns: [{
                        data: "name"
                    },
                    {
                        data: "image"
                    },
                    {
                        data: "showcased"
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
                    var imageHTML = '<img src="' + imagePath + '" alt="Image" style = "width:700px;">';

                    // Use SweetAlert to display the image
                    Swal.fire({
                        title: 'Image Preview',
                        html: imageHTML,
                        confirmButtonText: 'Close',
                        customClass: {
                            popup: 'wide-swal'
                        }
                    });
                });
            });

            $('body').on('click', '[id^="uploadImage_"]', function() {
                var constant_id = $(this).data('id');

                Swal.fire({
                    title: 'Upload Image',
                    html: '<div class="form-container">' +
                        '<label for="category">Banner Name:</label>' +
                        '<input type="text" id="category" name="category" required><br>' +
                        '<input type="file" id="imageUploadInput" accept="image/*">',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    preConfirm: () => {
                        const fileInput = document.getElementById('imageUploadInput');
                        const file = fileInput.files[0];

                        if (!file) {
                            Swal.showValidationMessage('Please select an image to upload.');
                            return false;
                        }

                        const formData = new FormData();
                        formData.append('file', file);
                        formData.append('constant_id', constant_id);
                        formData.append('category', $('#category').val());

                        return $.ajax({
                            url: 'admin_process_banner.php',
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                        }).then(data => {
                            if (data.success) {
                                Swal.fire('Image uploaded successfully!', '', 'success');
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire('Error uploading image', data.message, 'error');
                            }
                        }).fail((jqXHR, textStatus, errorThrown) => {
                            console.error(errorThrown);
                            Swal.fire('Error uploading image', 'An error occurred.', 'error');
                        });
                    },
                });
            });








            $('#addBanner').on('click', function() {
                Swal.fire({
                    title: "Add New Banner",
                    html: '<div class="form-container">' +
                        '<label for="name">Banner Name:</label>' +
                        '<input type="text" id="name" name="name" required><br>' +
                        '<input type="file" id="file" name="file" accept="image/*">',
                    showCancelButton: true,
                    confirmButtonText: "Add",
                    cancelButtonText: "Cancel",
                    preConfirm: () => {
                        // Handle the "Add" button click here
                        const name = $('#name').val();
                        const fileInput = $('#file')[0];

                        if (!name || !fileInput.files.length) {
                            Swal.showValidationMessage('Name and image are required');
                            return false;
                        }

                        const formData = new FormData();
                        formData.append('name', name);
                        formData.append('file', fileInput.files[0]);

                        return $.ajax({
                            url: "swal_add_banner.php",
                            method: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                        });
                    },
                    didClose: () => {
                        // Handle the case when the modal is closed (cancel button or outside click)
                        // You can add any cleanup or additional logic here if needed.
                        // For example, you can clear the form fields.
                    },
                }).then((result) => {
                    // Check if the result is confirmed or if the modal was closed without confirmation
                    if (result.isConfirmed) {
                        Swal.fire("Success", "New Banner added successfully", "success").then(() => {
                            // Redirect to the specified location if needed
                            window.location.reload(); // Example: Refresh the page after adding the banner
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Handle the cancel action
                        // You can add any specific logic for cancel here, or leave it empty if no action is needed
                    } else {
                        // Error handling
                        Swal.fire("Error", "Error adding Banner", "error");
                    }
                });
            });



        });
    </script>



</body>

</html>