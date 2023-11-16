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
                            <h4>User Account Management</h4>
                            <p class="mb-0">Users Details</p>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="userTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Date Created</th>
                                            <th>Active</th>

                                            <?php

                                            if (isset($_SESSION['admin_id'])) {
                                                $id = $_SESSION['admin_id'];

                                                $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                                                $queryAdmin = $conn->query($getAdmin);
                                                $row = $queryAdmin->fetch_assoc();

                                                if ($row["is_super_admin"] == 1) {
                                                    echo '<th>Action</th>';
                                                }
                                            }

                                            ?>

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

            $('#userTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,
                ajax: {
                    url: "admin_json_user_table.php",
                    data: {}, // You can add additional data parameters if needed
                    dataSrc: ""
                },
                columns: [{
                        data: "userID"
                    },
                    {
                        data: "username"
                    },
                    {
                        data: "fname"
                    },
                    {
                        data: "lname"
                    },
                    {
                        data: "phone"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "date"
                    },
                    {
                        data: "active",
                        "render": function(data, type, row) {
                            return data;
                        }
                    },
                    <?php
                    if (isset($_SESSION['admin_id'])) {
                        $id = $_SESSION['admin_id'];
                        $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                        $queryAdmin = $conn->query($getAdmin);
                        $row = $queryAdmin->fetch_assoc();

                        if ($row["is_super_admin"] == 1) {
                            echo '{ data : "action"}';
                        }
                    }
                    ?>
                ]
            });


            $('#userTable').on('click', '.delete-user', function() {
                var userID = $(this).data('user-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this User?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    confirmButtonClass: 'btn btn-danger', // Add this line to assign the red color
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "admin_delete_user.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                userID: userID,
                            },
                            success: function(response) {
                                // Reload the DataTable
                                $('#userTable').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });
            });
















        });
    </script>



</body>

</html>