<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_POST['cart_id']) && is_array($_POST['cart_id'])) {
    $selectedCartIds = $_POST['cart_id'];
}
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
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">



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

    <style>
        <?php include 'css/body.css'; ?>#infoPurhaseTable tbody tr {
            background-color: transparent !important;
        }
    </style>
</head>

<body>

    <?php include 'html/page_header.php'; ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">


            <!-- DataTables Game Components -->
            <table id="purchaseTable" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Item</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>


        <div class="container">
            <div class="row">

                <div class="col">
                    <!-- DataTables Build Game  -->

                    <button id="addAddressBtn">Add Address</button>
                    <table id="profileAddress" class="display" style="width: 100%;">


                        <tbody>
                        </tbody>
                    </table>
                </div>


                <div class="col">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php
                                    // Count the number of cart IDs
                                    $numSelectedCarts = count($selectedCartIds);

                                    $selectedCartIdsString = implode(',', $selectedCartIds);

                                    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_id IN ($selectedCartIdsString) AND is_visible = 1";
                                    $result = $conn->query($sql);

                                    $sub_total = 0;

                                    while ($fetched = $result->fetch_assoc()) {
                                        $cart_id = $fetched['cart_id'];
                                        $published_game_id = $fetched['published_game_id'];
                                        $built_game_id = $fetched['built_game_id'];
                                        $added_component_id = $fetched['added_component_id'];
                                        $quantity = $fetched['quantity'];
                                        $price = $fetched['price'];
                                        $is_active = $fetched['is_active'];

                                        (int)$sub_total += $price * $quantity;
                                    }


                                    $sqlGetActive = "SELECT * FROM addresses WHERE is_default = 1 AND user_id = $user_id";
                                    $queryGetActive = $conn->query($sqlGetActive);
                                    while ($fetchedActive = $queryGetActive->fetch_assoc()) {
                                        $address_id = $fetchedActive['address_id'];
                                        $fullname = $fetchedActive['fullname'];
                                        $number = $fetchedActive['number'];
                                        $region = $fetchedActive['region'];
                                        $province = $fetchedActive['province'];
                                        $city = $fetchedActive['city'];
                                        $barangay = $fetchedActive['barangay'];
                                        $zip = $fetchedActive['zip'];
                                        $street = $fetchedActive['street'];

                                        echo '
                                            <p class="card-text text-muted">
                                            ' . $region . ' | ' . $province . ' | ' . $city . ' | ' . $barangay . ' | ' . $zip . ' | ' . $street . '
                                            </p>
                                            ';


                                        // Initialize $destination_id with a default value
                                        $destination_id = 0;

                                        // Check if the inner query has any results before entering the nested loop
                                        $sqlCheckDestination = "SELECT * FROM destination_rates WHERE destination_name = '$region'";
                                        $queryCheckDestination = $conn->query($sqlCheckDestination);
                                        if ($queryCheckDestination->num_rows > 0) {
                                            // Fetch the results from the inner query
                                            $fetchedDestination = $queryCheckDestination->fetch_assoc();

                                            $destination_id = $fetchedDestination['destination_id'];
                                            $weight_price_1 = $fetchedDestination['weight_price_1'];
                                            $weight_price_2 = $fetchedDestination['weight_price_2'];
                                            $weight_price_3 = $fetchedDestination['weight_price_3'];
                                            $weight_price_4 = $fetchedDestination['weight_price_4'];
                                            $weight_price_5 = $fetchedDestination['weight_price_5'];
                                        }

                                        $numSelectedCarts = count($selectedCartIds);
                                        // Initialize variables
                                        $weight_price = 0;

                                        if ($numSelectedCarts >= 1 && $numSelectedCarts <= 10) {
                                            $weight_price = (float)$weight_price_1;
                                        } elseif ($numSelectedCarts >= 11 && $numSelectedCarts <= 20) {
                                            $weight_price = (float)$weight_price_2;
                                        } elseif ($numSelectedCarts >= 21 && $numSelectedCarts <= 30) {
                                            $weight_price = (float)$weight_price_3;
                                        } elseif ($numSelectedCarts >= 31 && $numSelectedCarts <= 40) {
                                            $weight_price = (float)$weight_price_4;
                                        } elseif ($numSelectedCarts >= 41) {
                                            $weight_price = (float)$weight_price_5;
                                        }

                                        echo 'Sub Total: ' . $sub_total . '<br>';
                                        echo $shipping = 'Shipping: ' . $weight_price . '<br>';

                                        $total_payment = ($sub_total + $weight_price);

                                        
                                        echo 'Total Payment: ' . $total_payment;


                                        echo '
                                            <div id="paypal-payment-button"
                                            data-paypal_payment="' . $total_payment . '"
                                            data-fullname="' . $fullname . '"
                                            data-number="' . $number . '"
                                            data-region="' . $region . '"
                                            data-province="' . $province . '"
                                            data-city="' . $city . '"
                                            data-barangay="' . $barangay . '"
                                            data-zip="' . $zip . '"
                                            data-street="' . $street . '"
                                            data-carts_selected="' . implode(',', $selectedCartIds) . '"
                                            ></div>
                                        ';
                                    }
                                    ?>


                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>




            </div>


        </div>
    </section>
    <!--================End Cart Area =================-->










    <!-- <button id="clickButton">Click Me</button> -->









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




    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUtrxFWAdHF9RgdAqRcEjzOICrG5WaXVfckhbUYdcTVDVIz-QnvKNoYqEZ9zE-JI5ViTJEy4AoN6iCJL&currency=PHP&disable-funding=credit,card"></script>



    <script>
        $(document).ready(function() {

            var user_id = <?php echo $user_id; ?>;
            var selectedCartIds = <?php echo json_encode($selectedCartIds); ?>;



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
                                alertify.success("Order Placed Successfully");
                                windows.location.href = '';

                            },
                            error: function(error) {
                                alertify.error("An error occurred while processing your order.");
                            }
                        });
                    });
                },
                onCancel: function(data) {
                    window.location.reload();

                }
            }).render('#paypal-payment-button');

            $('#example').DataTable({
                searching: false, // Disable search bar
                info: false, // Disable info (i.e., "Showing X of Y entries")
                paging: false, // Disable paging
                ordering: false, // Disable column sorting

            });

            $('#infoPurhaseTable').DataTable({
                searching: false, // Disable search bar
                info: false, // Disable info (i.e., "Showing X of Y entries")
                paging: false, // Disable paging
                ordering: false, // Disable column sorting
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
                                    region: $('#editedRegion').val(),
                                    province: $('#editedProvince').val(),
                                    city: $('#editedCity').val(),
                                    barangay: $('#editedBarangay').val(),
                                    zip: $('#editedZip').val(),
                                    street: $('#editedStreet').val(),
                                    setDefaultAddress: $('#setDefaultAddress').prop('checked'),

                                };

                                // Send an AJAX request to update the address information in the database
                                $.ajax({
                                    url: "swal_update_address.php", // Create this PHP file to update the address
                                    method: "POST",
                                    data: formData,
                                    success: function() {
                                        // Reload the DataTable after the address is updated
                                        $('#infoPurhaseTable').DataTable().ajax.reload();
                                        $('#profileAddress').DataTable().ajax.reload();
                                        $('#purchaseTable').DataTable().ajax.reload();

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
                                // Reload the DataTable after the address is updated
                                $('#infoPurhaseTable').DataTable().ajax.reload();
                                $('#profileAddress').DataTable().ajax.reload();
                                $('#purchaseTable').DataTable().ajax.reload();

                                Swal.fire({
                                    title: "Success",
                                    text: "You changed the default address",
                                    icon: "success",
                                    didClose: () => {
                                        // Reload the whole page after the SweetAlert is closed
                                        window.location.reload();
                                    },
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
                        '<label for="region">Region:</label>' +
                        '<input type="text" id="region" name="region" required><br>' +
                        '<label for="province">Province:</label>' +
                        '<input type="text" id="province" name="province" required><br>' +
                        '<label for="city">City:</label>' +
                        '<input type="text" id="city" name="city" required><br>' +
                        '<label for="barangay">Barangay:</label>' +
                        '<input type="text" id="barangay" name="barangay" required><br>' +
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
            });








            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:


            $('#purchaseTable').DataTable({
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















        });
    </script>








</body>

</html>