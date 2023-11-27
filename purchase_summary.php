<?php
session_start();
include 'connection.php';

$getThemeBG = "SELECT * FROM constants WHERE classification = 'theme_background'";
$queryThemeBG = $conn->query($getThemeBG);
while ($row = $queryThemeBG->fetch_assoc()) {
    $image_path = $row['image_path'];
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_POST['cart_id']) && is_array($_POST['cart_id'])) {
    $selectedCartIds = $_POST['cart_id'];
}

$sqlClient = "SELECT * FROM constants WHERE classification = 'paypal_client_id'";
$resultClient = $conn->query($sqlClient);
while ($rowClient = $resultClient->fetch_assoc()) {
    $paypal_client_id = $rowClient['text'];
}

$region = "SELECT * FROM region";
$region_qry = mysqli_query($conn, $region);
?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

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

    <!-- iziToast -->
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">

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
            padding-top: 80%;
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

        .custom-shadow,
        .address-card {
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
        table.dataTable thead th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
            padding: 0px;
        }
    </style>
</head>

<body style="
    background-image: url('<?php echo $image_path; ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
">

    <?php include 'html/page_header.php'; ?>
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb" style="background: none;">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area" style="background: none;">
        <div class="container">

            <h1>Check Out Page</h1>

            <div class="row">
                <div class="col">
                    <div class="card address-card p-0 m-0" style="background-color: #272a4e;">
                        <div class="card-header px-4 py-2 m-0" style="background-color: #16162a">
                            <span class="h6" style="
                            background: -webkit-linear-gradient(right, #26d3e0, #b660e8);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            ">
                                <i class="fa-solid fa-map-location"></i> Delivery Address
                            </span>
                        </div>

                        <div class="card-body">
                            <table id="purchaseAddress" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

            <br><br>

            <div class="row">

                <div class="col">
                    <table id="purchaseTable" class="display" style="width: 100%;">
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="col-3">


                    <div class="row">
                        <span class="pl-3 h6">Select Payment Method:</span>
                    </div>

                    <div class="container">
                        <label class="row p-2 mb-2 d-flex align-items-center" style="background: #272a4e; border-radius: 14px; color: white; font-size: 20px;">
                            <input type="radio" name="payment_method" value="paypal" id="paypal_radio">&nbsp;
                            <i class="fa-brands fa-paypal" style="color: #003087;"></i>
                            <span class="">&nbsp; Paypal</span>
                        </label>

                        <label class="row p-2 d-flex align-items-center" style="background: #272a4e; border-radius: 14px; color: white; font-size: 20px;">
                            <input type="radio" name="payment_method" value="stkr_wallet" id="stkr_wallet_radio">&nbsp;
                            <i class="fa-solid fa-wallet" style="color: #f7f799"></i>
                            <span class="">&nbsp; STKR Wallet</span>
                        </label>

                    </div>


                    <hr>

                    <div id="paypal_selected">
                        <table id="paypalTable" class="display" style="width:100%">
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div id="stkr_selected" style="display: none">
                        <table id="stkrTable" class="display" style="width:100%">
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


        <div class="container">
            <div class="row">


                <div class="col">

                </div>




            </div>


        </div>
    </section>
    <!--================End Cart Area =================-->


    <?php
    include 'html/page_footer.php';
    ?>







    <!-- modals -->
    <div class="modal fade" id="changeAddress">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">My Address</h5>
                </div>
                <div class="modal-body">
                    <button id="addAddressBtn">Add Address</button>
                    <table id="profileAddress" class="display" style="width: 100%;">
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>









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

    <!-- iziToast -->
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypal_client_id ?>&currency=PHP&disable-funding=credit,card"></script>

    <script>
        $(document).ready(function() {
            $("#paypal_selected").show();
            $('#paypal_radio').prop('checked', true);

            $('input[name="payment_method"]').change(function() {
                if ($('#paypal_radio').prop('checked')) {
                    $("#paypal_selected").show();
                    $("#stkr_selected").hide();
                } else if ($('#stkr_wallet_radio').prop('checked')) {
                    $("#paypal_selected").hide();
                    $("#stkr_selected").show();
                }
            });


            <?php include 'js/essential.php' ?>

            var user_id = <?php echo $user_id; ?>;
            var selectedCartIds = <?php echo json_encode($selectedCartIds); ?>;



            $('#infoPurhaseTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_purchase_info.php",
                    method: "POST",
                    data: {
                        user_id: user_id,
                        selectedCartIds: selectedCartIds,
                    },
                    dataSrc: ""
                },
                columns: [{
                        data: "item1"
                    },
                    {
                        data: "item2"
                    },

                ]
            });


            // Add a click event listener to the "Delete" buttons
            $('#infoPurhaseTable').on('click', '#purchase_payment', function() {

                var selectedCartIds = $(this).data('carts_selected');

                window.location.href = 'process_payment.php?selectedCartIds=' + selectedCartIds;
            });


            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:

            $('#profileAddress').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_address_purchase_summary.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "item"
                    },

                ]
            });



            // Add a click event listener to the "Edit" buttons
            $('#profileAddress').on('click', '.edit-btn', function() {
                // Get the address ID associated with the clicked "Edit" button
                var addressId = $(this).data('address-id');

                // Fetch the address details for the specified address ID from the server
                $.ajax({
                    url: "swal_get_address_details.php", // Create this PHP file to fetch address details by ID
                    method: "GET",
                    data: {
                        addressId: addressId,
                    },
                    success: function(response) {
                        // Handle the response and show a SweetAlert for editing
                        Swal.fire({
                            title: "Edit Address",
                            html: response, // Include the fetched address details in the SweetAlert content
                            showCancelButton: true,
                            confirmButtonText: "Save",
                            cancelButtonText: "Cancel",
                            preConfirm: () => {
                                // Handle the "Save" button click here
                                var formData = {
                                    addressId: addressId,
                                    // Retrieve and collect edited address details from the SweetAlert form fields
                                    fullname: $('#editedFullname').val(),
                                    number: $('#editedNumber').val(),
                                    region: $('#editedregion_').val(),
                                    province: $('#editedprovince_').val(),
                                    city: $('#editedcity_').val(),
                                    barangay: $('#editedbarangay_').val(),
                                    zip: $('#editedZip').val(),
                                    street: $('#editedStreet').val(),
                                };

                                // Send an AJAX request to update the address information in the database
                                $.ajax({
                                    url: "swal_update_address.php", // Create this PHP file to update the address
                                    method: "POST",
                                    data: formData,
                                    success: function() {
                                        // Reload the DataTable after the address is updated
                                        $('#profileAddress').DataTable().ajax.reload();

                                        // Show a success message with Swal
                                        Swal.fire({
                                            title: "Success",
                                            text: "Address updated successfully!",
                                            icon: "success",
                                        });
                                    },
                                    error: function() {
                                        // Handle any AJAX errors here
                                    },
                                });
                            },
                        });

                        $('#editedregion_').on('change', function() {
                            var region_id = $(this).val();
                            console.log(region_id);
                            $.ajax({
                                url: 'option_province.php',
                                type: "POST",
                                data: {
                                    region_data: region_id
                                },
                                success: function(result) {
                                    $('#editedprovince_').html(result);
                                    //console.log(result);
                                }
                            })
                        });

                        $('#editedprovince_').on('change', function() {
                            var province_id = $(this).val();
                            //console.log(province_id); 
                            $.ajax({
                                url: 'option_city.php',
                                type: "POST",
                                data: {
                                    province_data: province_id
                                },
                                success: function(data) {
                                    $('#editedcity_').html(data);
                                    //console.log(result);
                                }
                            })
                        });

                        $('#editedcity_').on('change', function() {
                            var city_id = $(this).val();
                            //console.log(province_id); 
                            $.ajax({
                                url: 'option_barangay.php',
                                type: "POST",
                                data: {
                                    city_data: city_id
                                },
                                success: function(data) {
                                    $('#editedbarangay_').html(data);
                                    //console.log(result);
                                }
                            })
                        });
                    },
                    error: function() {
                        // Handle any AJAX errors here
                    },
                });



            });




            // Add a click event listener to the "Delete" buttons
            $('#profileAddress').on('click', '.delete-btn', function() {
                var addressId = $(this).data('address-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this address?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "swal_delete_address.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                addressId: addressId,
                            },
                            success: function(response) {
                                // Reload the DataTable after the address is updated
                                $('#infoPurhaseTable').DataTable().ajax.reload();
                                $('#profileAddress').DataTable().ajax.reload();
                                $('#purchaseTable').DataTable().ajax.reload();

                                $('#cartCount').DataTable().ajax.reload();



                                // Show a success message with Swal
                                Swal.fire({
                                    title: "Success",
                                    text: "Deleted successfully!",
                                    icon: "success",
                                });
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });
            });




            // Add a click event listener to the "swal_process_default_address.php" buttons
            $('#profileAddress').on('click', '.radio-chosen', function() {
                var addressId = $(this).data('address-id');

                // Show a confirmation dialog
                Swal.fire({
                    title: "Confirm Change",
                    text: "Are you sure you want to change the default address?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Yes," send an AJAX request to update the default address
                        $.ajax({
                            url: "swal_process_default_address.php",
                            method: "POST",
                            data: {
                                user_id: user_id,
                                addressId: addressId
                            },
                            success: function(response) {
                                $('#infoPurhaseTable').DataTable().ajax.reload();
                                $('#profileAddress').DataTable().ajax.reload();
                                $('#purchaseTable').DataTable().ajax.reload();
                                $('#purchaseAddress').DataTable().ajax.reload();
                                $('#paypalTable').DataTable().ajax.reload();


                                $('#cartCount').DataTable().ajax.reload();

                                window.location.reload();

                                Swal.fire({
                                    title: "Success",
                                    text: "You changed the default address",
                                    icon: "success",
                                });




                            },
                            error: function() {
                                // Handle any AJAX errors here
                            }
                        });
                    } else {
                        // Reload the DataTable after the address is updated
                        $('#infoPurhaseTable').DataTable().ajax.reload();
                        $('#profileAddress').DataTable().ajax.reload();
                        $('#purchaseTable').DataTable().ajax.reload();

                        $('#cartCount').DataTable().ajax.reload();
                    }
                });
            });








            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:

            // Add a click event listener to the "Add Address" button
            $('#addAddressBtn').on('click', function() {

                Swal.fire({

                    title: "Add Address",
                    html: '<div class="form-container">' +
                        '<label for="fullname">Fullname:</label>' +
                        '<input type="text" id="fullname" name="fullname" required><br>' +

                        '<label for="number">Number:</label>' +
                        '<input type="text" id="number" name="number" required><br>' +

                        '<label for="region"> Region:</label>' +
                        '<select id="region" name="region" required><br>' +
                        '<option selected disabled>  Select Region </option>' +
                        '<?php while ($row = mysqli_fetch_assoc($region_qry)) : ?>' +
                        '<option value="<?php echo $row['id']; ?>"><?php echo $row['region_name']; ?></option>' +
                        '<?php endwhile; ?>' +
                        '</select><br>' +

                        '<label for="province">Province:</label>' +
                        '<select id="province" name="province" required><br>' +
                        '<option selected disabled>  Select Province </option>' +
                        '</select><br>' +

                        '<label for="city">City:</label>' +
                        '<select id="city" name="city" required><br>' +
                        '<option value="city">Select City</option>' +
                        '</select><br>' +

                        '<label for="barangay">Barangay:</label>' +
                        '<select id="barangay" name="barangay" required><br>' +
                        '<option value="barangay">Select Barangay</option>' +
                        '</select><br>' +

                        '<label for="zip">ZIP Code:</label>' +
                        '<input type="text" id="zip" name="zip" required><br>' +

                        '<label for="street">Street:</label>' +
                        '<input type="text" id="street" name="street" required><br>' +
                        '</div>',

                    showCancelButton: true,
                    confirmButtonText: "Add",
                    cancelButtonText: "Cancel",
                    preConfirm: () => {
                        // Handle the "Add" button click here
                        var formData = {
                            fullname: $('#fullname').val(),
                            number: $('#number').val(),
                            region: $('#region').val(),
                            province: $('#province').val(),
                            city: $('#city').val(),
                            barangay: $('#barangay').val(),
                            zip: $('#zip').val(),
                            street: $('#street').val(),
                        };

                        // Send an AJAX request to add the address
                        return $.ajax({
                            url: "swal_add_address.php", // Create this PHP file to add the address
                            method: "POST",
                            data: formData,
                        });

                    },
                }).then((result) => {
                    // Handle the AJAX response
                    if (result.isConfirmed) {
                        if (result.value === "success") {
                            // Address added successfully
                            Swal.fire("Success", "Address added successfully", "success");
                            // Reload the DataTable to display the new address
                            $('#profileAddress').DataTable().ajax.reload();
                        } else {
                            // Error occurred while adding the address
                            Swal.fire("Error", "Error adding address", "error");
                        }
                    }
                });

                $('#region').on('change', function() {
                    var region_id = $(this).val();
                    //console.log(region_id);
                    $.ajax({
                        url: 'option_province.php',
                        type: "POST",
                        data: {
                            region_data: region_id
                        },
                        success: function(result) {
                            $('#province').html(result);
                            //console.log(result);
                        }
                    })
                });

                $('#province').on('change', function() {
                    var province_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url: 'option_city.php',
                        type: "POST",
                        data: {
                            province_data: province_id
                        },
                        success: function(data) {
                            $('#city').html(data);
                            //console.log(result);
                        }
                    })
                });

                $('#city').on('change', function() {
                    var city_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url: 'option_barangay.php',
                        type: "POST",
                        data: {
                            city_data: city_id
                        },
                        success: function(data) {
                            $('#barangay').html(data);
                            //console.log(result);
                        }
                    })
                });






            });








            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:


            $('#purchaseTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                "ajax": {
                    "url": "json_purchase_summary.php",
                    "data": {
                        user_id: user_id,
                        selectedCartIds: selectedCartIds,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }]
            });




            $('#purchaseAddress').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_purchase_address.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "item"
                    },

                ]
            });


            $('#purchaseAddress').on('click', '#change_address', function() {

                $("#changeAddress").modal("show");
            });





            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:

            $('#paypalTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_paypal.php",
                    method: "POST",
                    "data": {
                        user_id: user_id,
                        selectedCartIds: selectedCartIds,
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });

            $('#stkrTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_stkr.php",
                    method: "POST",
                    "data": {
                        user_id: user_id,
                        selectedCartIds: selectedCartIds,
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });

            $('#stkrTable').on('click', '#stkr-payment-button', function() {
                var user_id = <?php echo $user_id; ?>;

                var shipping_discount = $('#stkr-payment-button').data('shipping_discount');

                var paypal_payment = $('#stkr-payment-button').data('paypal_payment');
                var fullname = $('#stkr-payment-button').data('fullname');
                var number = $('#stkr-payment-button').data('number');
                var region = $('#stkr-payment-button').data('region');
                var province = $('#stkr-payment-button').data('province');
                var city = $('#stkr-payment-button').data('city');
                var barangay = $('#stkr-payment-button').data('barangay');
                var zip = $('#stkr-payment-button').data('zip');
                var street = $('#stkr-payment-button').data('street');
                var carts_selected = $('#stkr-payment-button').data('carts_selected');

                iziToast.question({
                    color: '#15172e',
                    progressBarColor: 'linear-gradient(144deg, #26d3e0, #b660e8)rgb(0, 255, 184)',
                    titleColor: '#fff',
                    messageColor: '#fff',
                    overlayColor: 'rgba(0, 0, 0, 0.7)',

                    timeout: 20000,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: '',
                    message: 'Are you sure you want to purchase using STKR wallet? This can\'t be undone.',
                    position: 'center',
                    buttons: [
                        ['<button><b>YES</b></button>', function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                            var data = {
                                "user_id": user_id,
                                "shipping_discount": shipping_discount,
                                "paypal_payment": paypal_payment,
                                "fullname": fullname,
                                "number": number,
                                "region": region,
                                "province": province,
                                "city": city,
                                "barangay": barangay,
                                "zip": zip,
                                "street": street,
                                "carts_selected": carts_selected,
                            };

                            $.ajax({
                                method: "POST",
                                url: "stkr_wallet_success.php",
                                data: data,
                                success: function(response) {
                                    window.location.href = "profile_pending.php";
                                },
                                error: function() {
                                    Swal.fire({
                                        title: "Error",
                                        text: "Purchased unsuccessful!",
                                        icon: "error",
                                    });
                                },
                            });

                        }, true],
                        ['<button style="color: white;">NO</button>', function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }],
                    ],

                    onClosing: function(instance, toast, closedBy) {
                        console.info('Closing | closedBy: ' + closedBy);
                    },
                    onClosed: function(instance, toast, closedBy) {
                        console.info('Closed | closedBy: ' + closedBy);
                    }
                });


            });
        });











        $(window).on('load', function() {

            var user_id = <?php echo $user_id; ?>;

            var paypal_payment = $('#paypal-payment-button').data('paypal_payment');
            var fullname = $('#paypal-payment-button').data('fullname');
            var number = $('#paypal-payment-button').data('number');
            var region = $('#paypal-payment-button').data('region');
            var province = $('#paypal-payment-button').data('province');
            var city = $('#paypal-payment-button').data('city');
            var barangay = $('#paypal-payment-button').data('barangay');
            var zip = $('#paypal-payment-button').data('zip');
            var street = $('#paypal-payment-button').data('street');
            var carts_selected = $('#paypal-payment-button').data('carts_selected');

            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill'
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: paypal_payment
                            }
                        }],
                        application_context: {
                            shipping_preference: 'NO_SHIPPING'
                        }
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        console.log(orderData);
                        // successful
                        const transaction = orderData.purchase_units[0].payments.captures[0];

                        var data = {
                            "user_id": user_id,
                            "paypal_payment": paypal_payment,
                            "fullname": fullname,
                            "number": number,
                            "region": region,
                            "province": province,
                            "city": city,
                            "barangay": barangay,
                            "zip": zip,
                            "street": street,
                            "carts_selected": carts_selected,
                            "payment_id": transaction.id,
                            "order_data": orderData,
                        };

                        $.ajax({
                            method: "POST",
                            url: "paypal_success.php",
                            data: data,
                            success: function(response) {

                                // Redirect to purchase_summary_page.php after successful order placement
                                window.location.href = 'purchase_success_page.php';
                            },
                            error: function(error) {
                                alertify.error("An error occurred while processing your order.");
                                console.log('TAPOSSSSSSSSSssssssssss');
                            }
                        });
                    });
                },
                onCancel: function(data) {
                    window.location.reload();

                }
            }).render('#paypal-payment-button');




            $('#stkr-payment-button').prop('disabled', true);
            $('#stkr-payment-button').css({
                
                'opacity': '0.2'
            });

            $('#stkr_wallet_checkbox').change(function() {
                if ($('#stkr_wallet_checkbox').prop('checked')) {
                    $('#stkr-payment-button').prop('disabled', false);
                    $('#stkr-payment-button').css({
                        
                        'opacity': '1'
                    });

                } else if (!$('#stkr_wallet_checkbox').prop('checked')) {
                    $('#stkr-payment-button').prop('disabled', true);
                    $('#stkr-payment-button').css({
                        
                        'opacity': '0.2'
                    });
                }
            });

            $('#paypal-payment-button').css({
                'pointer-events': 'none',
                'opacity': '0.2'
            });

            $('#paypal_checkbox').change(function() {
                if ($('#paypal_checkbox').prop('checked')) {
                    $('#paypal-payment-button').css({
                        'pointer-events': 'auto',
                        'opacity': '1'
                    });

                } else if (!$('#paypal_checkbox').prop('checked')) {
                    $('#paypal-payment-button').css({
                        'pointer-events': 'none',
                        'opacity': '0.2'
                    });
                }
            });

        });
    </script>






</body>

</html>