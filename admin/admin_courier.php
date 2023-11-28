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
    <title>STKR Admin -  Couriers</title>
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
                            <h4>Couriers</h4>
                            <p class="mb-0">Courier Details</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <table id="courierTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Courier-ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="row mb-3">
                                    <div class="col-sm-3 d-grid">
                                    <a class="btn btn-outline-primary" id="addCourier" style="display: block; margin:20px; width:200px;color:cornflowerblue;" role="button" style="text-align:center;">Add New Courierr</a>
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

            <?php include 'html/count_orders.php'; ?>





            $('#courierTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,
                ajax: {
                    url: "admin_json_courier_table.php",
                    data: {}, // You can add additional data parameters if needed
                    dataSrc: ""
                },
                columns: [{
                        data: "id"
                    },

                    {
                        data: "name"
                    },
                    {
                        data: "action"
                    }
                ]
            });

           

            $('#courierTable').on('click', '.delete-courier', function() {
                var courierID = $(this).data('courier-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this Courier?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    confirmButtonClass: 'btn btn-danger', // Add this line to assign the red color
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "admin_delete_courier.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                courierID: courierID,
                            },
                            success: function(response) {
                                // Reload the DataTable
                                $('#courierTable').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });
            });

            $('body').on('click', '[id^="uploadImage_"]', function() {
                var courier_id = $(this).data('id');

                Swal.fire({
                    title: 'Edit Courier',
                    html: '<div class="form-container">' +
                        '<label for="name">Courier Name:</label>' +
                        '<input type="text" id="name" name="name" required><br>',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    preConfirm: () => {
                        

                        

                        const formData = new FormData();
                        
                        formData.append('courier_id', courier_id);
                        formData.append('name', $('#name').val());

                        return $.ajax({
                            url: 'admin_process_edit_courier.php',
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


            $('#addCourier').on('click', function() {
                Swal.fire({
                    title: "Add New Courier",
                    html: '<div class="form-container">' +
                        '<label for="name">Courier Name:</label>' +
                        '<input type="text" id="name" name="name" required><br>',
                    showCancelButton: true,
                    confirmButtonText: "Add",
                    cancelButtonText: "Cancel",
                    preConfirm: () => {
                        // Handle the "Add" button click here
                        const name = $('#name').val();
                       

                        if (!name) {
                            Swal.showValidationMessage('Name is required');
                            return false;
                        }

                        const formData = new FormData();
                        formData.append('name', name);

                        return $.ajax({
                            url: "swal_add_courier.php",
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
                        Swal.fire("Success", "New Courier added successfully", "success").then(() => {
                            // Redirect to the specified location if needed
                            window.location.reload(); // Example: Refresh the page after adding the banner
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Handle the cancel action
                        // You can add any specific logic for cancel here, or leave it empty if no action is needed
                    } else {
                        // Error handling
                        Swal.fire("Error", "Error adding Courier", "error");
                    }
                });
            });

            


        });
    </script>



</body>

</html>
