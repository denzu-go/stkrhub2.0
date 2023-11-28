<?php
session_start();
include 'connection.php';
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
$sqlUserDetails = "SELECT * FROM users WHERE user_id = $user_id";
$resultUserDetails = $conn->query($sqlUserDetails);
while ($fetchedUserDetails = $resultUserDetails->fetch_assoc()) {

    $username = $fetchedUserDetails['username'];
    $firstname = $fetchedUserDetails['firstname'];
    $lastname = $fetchedUserDetails['lastname'];
    $phone_number = $fetchedUserDetails['phone_number'];
    $email = $fetchedUserDetails['email'];
    $avatar = $fetchedUserDetails['avatar'];
}

include 'html/get_bg.php';
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- CSS ================================ -->
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

    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">


    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">


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
    </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php
    include 'html/page_header.php';
    $my_profile = 'active';
    $my_addresses = '';
    $my_purchase = '';
    $stkr_wallet = '';
    $change_password = '';
    ?>

    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <section class="sample-text-area" style="background: none;">
        <div class="container">

            <div class="wrapper d-flex align-items-stretch row">

                <!-- profile sidebar -->
                <?php include 'html/profile_sidebar.php'; ?>

                <div id="content" class="col">

                    <!-- content -->
                    <div class="container">
                        <div class="container">
                            <div class="main-body">

                                <div class="row gutters-sm">

                                    <div class="col-md-4 mb-3">

                                        <div class="card" style="background: rgba(39, 42, 78, 0.57);
                                        border-radius: 7px 7px 7px 7px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                        backdrop-filter: blur(5.7px);
                                        -webkit-backdrop-filter: blur(5.7px);">
                                            <table id="profilePicture" class="display" style="width: 100%;">
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card mt-3" style="/* <!-- glass morph--> */
                                        background: rgba(39, 42, 78, 0.57);
                                        border-radius: 7px 7px 7px 7px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                        backdrop-filter: blur(5.7px);
                                        -webkit-backdrop-filter: blur(5.7px);
                                        line-height: 0px !important;">

                                             <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: transparent;">
                                                    <h6 class="mb-0">
                                                        <i class="fa-solid fa-wallet"></i>
                                                        STKR Wallet
                                                    </h6>
                                                    <span class="text-secondary">1,000</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: transparent;">
                                                    <h6 class="mb-0">
                                                        Published Games
                                                    </h6>
                                                    <span class="text-secondary">4</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: transparent;">
                                                    <h6 class="mb-0">
                                                        Total Earnings
                                                    </h6>
                                                    <span class="text-secondary">1,000</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card mb-3" style="background: rgba(39, 42, 78, 0.57);
                                        border-radius: 7px 7px 7px 7px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                                        backdrop-filter: blur(5.7px);
                                        -webkit-backdrop-filter: blur(5.7px);">
                                            <div class="card-body">


                                                <table id="profileDetails" class="display" style="width: 100%;">
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

                </div>

            </div>

        </div>
    </section>

    <!-- modals -->
    <div class="modal" id="editProfileModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Add modal content here -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="editProfileForm">
                        <input type="hidden" name="user_id" id="user_id_input" value="<?php echo $user_id; ?>">
                        <div class="form-group">
                            <label for="username">Userame:</label>
                            <input type="text" class="form-control" id="username" name="username" required value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required value="<?php echo $firstname ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required value="<?php echo $lastname ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phone_number ?>">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                </div>

            </div>
        </div>
    </div>

    <!-- start footer Area -->
    <?php include 'html/page_footer.php'; ?>
    <!-- End footer Area -->




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

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>



    <script>
        $(document).ready(function() {
            <?php include 'js/essential.php'; ?>


            //DataTables
            var user_id = <?php echo $user_id; ?>;

            $('#pinakaProfile').DataTable({

                language: {
                    search: "",
                },

                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_pinaka_profile.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });


            $('#profilePicture').DataTable({
                "dom": '<"compact"lfrtip>',

                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_profile_picture.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "row"
                    },

                ]
            });

            $('#profilePicture').on('click', 'button.edit-btn', function() {
                var currentUsername = $(this).closest('tr').find('.username-input').val();

                Swal.fire({
                    title: 'Update Username',
                    input: 'text',
                    inputValue: currentUsername,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Cancel',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Username is required';
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newUsername = result.value;

                        $.ajax({
                            url: 'swal_process_update_username.php',
                            method: 'POST',
                            data: {
                                user_id: user_id,
                                new_username: newUsername
                            },
                            success: function(response) {
                                $("#cartCount").DataTable().ajax.reload();
                                Swal.fire('Updated!', 'Username has been updated.', 'success');

                                $('#profilePicture').DataTable().ajax.reload();
                            },
                            error: function() {
                                $("#cartCount").DataTable().ajax.reload();
                                Swal.fire('Error', 'Failed to update username', 'error');
                            }
                        });
                    }
                });
            });


            // Add a click event handler for "Edit" buttons in the profilePassword table
            $('#profilePicture').on('click', 'button.edit-btn-avatar', function() {
                Swal.fire({
                    title: 'Update Avatar',
                    input: 'file',
                    inputAttributes: {
                        accept: 'image/*',
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Upload',
                    cancelButtonText: 'Cancel',
                    inputValidator: (file) => {
                        if (!file) {
                            return 'Avatar file is required';
                        }
                    },
                    preConfirm: async (file) => {
                        const formData = new FormData();
                        formData.append('user_id', user_id);
                        formData.append('avatar', file);

                        try {
                            const response = await fetch('swal_process_update_avatar.php', {
                                method: 'POST',
                                body: formData,
                            });

                            if (!response.ok) {
                                throw new Error('Failed to upload avatar');
                            }

                            return response.json();
                        } catch (error) {
                            Swal.showValidationMessage(`Error: ${error.message}`);
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Updated!', 'Avatar has been updated.', 'success');
                        $('#profilePicture').DataTable().ajax.reload();
                        $("#cartCount").DataTable().ajax.reload();
                    }
                });
            });


            $('#profileDetails').DataTable({

                language: {
                    search: "",
                },

                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_profile_details.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "row"
                }, ]
            });


            $('#profileDetails').on('click', '.edit-profile-details', function() {
                var user_id = $(this).data("user_id");
                $("#editProfileModal").modal("show");
                $('#profileDetails').DataTable().ajax.reload();
                $('#profilePicture').DataTable().ajax.reload();
            });

            $(document).on("click", "#saveChangesBtn", function() {
                const requiredFields = document.querySelectorAll('#editProfileForm [required]');
                let isFormValid = true;

                requiredFields.forEach(function(field) {
                    if (field.value.trim() === '') {
                        isFormValid = false;
                    }
                });

                if (!isFormValid) {
                    Swal.fire("Error", "Please fill in all required fields.", "error");
                    return;
                }

                var formData = $("#editProfileForm").serialize();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to update your profile.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, update it!",
                    cancelButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with the update
                        var formData = $("#editProfileForm").serialize();
                        $.ajax({
                            url: "process_edit_profile.php",
                            type: "POST",
                            data: formData,
                            success: function(response) {
                                $("#editProfileModal").modal("hide");
                                $('#profileDetails').DataTable().ajax.reload();
                                $('#profilePicture').DataTable().ajax.reload();
                                Swal.fire("Success", "Profile updated successfully", "success");
                            },
                            error: function(error) {
                                $('#profileDetails').DataTable().ajax.reload();
                                $('#profilePicture').DataTable().ajax.reload();
                                Swal.fire("Error", "An error occurred while updating the profile", "error");
                            }
                        });
                    }
                });
            });






        });
    </script>

</body>

</html>