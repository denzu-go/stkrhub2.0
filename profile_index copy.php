<?php
session_start();
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

    <!-- font awesome -->
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
            padding-top: 70%;
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 100%);
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
            padding: 10px;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: yellow;
        }
    </style>
</head>

<body>
    <?php
    include 'connection.php';
    include 'html/page_header.php';
    ?>

    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <section class="sample-text-area">
        <div class="container">

            <div class="wrapper d-flex align-items-stretch row">

                <!-- profile sidebar -->
                <?php include 'html/profile_sidebar.php'; ?>

                <div id="content" class="col">

                    <!-- content -->
                    <div class="container">
                        <table id="profileUsername" class="display" style="width: 100%;">
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </section>




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


            $('#profileUsername').DataTable({
                "dom": '<"compact"lfrtip>',

                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_profile_username.php",
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

            $('#profileUsername').on('click', 'button.edit-btn', function() {
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

                                $('#profileUsername').DataTable().ajax.reload();
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
            $('#profileUsername').on('click', 'button.edit-btn-avatar', function() {
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
                        $('#profileUsername').DataTable().ajax.reload();
                        $("#cartCount").DataTable().ajax.reload();
                    }
                });
            });




        });
    </script>

</body>

</html>