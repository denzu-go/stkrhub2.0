<?php
session_start();
include 'connection.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$sqlClient = "SELECT * FROM constants WHERE classification = 'paypal_client_id'";
$resultClient = $conn->query($sqlClient);
while ($rowClient = $resultClient->fetch_assoc()) {
    $paypal_client_id = $rowClient['text'];
}

$sqlFee = "SELECT * FROM constants WHERE classification = 'cash_out_fee'";
$resultFee = $conn->query($sqlFee);
while ($rowFee = $resultFee->fetch_assoc()) {
    $cash_out_fee = $rowFee['percentage'];
}

$sqlMin = "SELECT * FROM constants WHERE classification = 'minimum_cash_out_amount'";
$resultMin = $conn->query($sqlMin);
while ($rowMin = $resultMin->fetch_assoc()) {
    $minimum_cash_out_amount = $rowMin['percentage'];
}

include 'html/get_bg.php';
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head><!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/icon.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <title>My profile - Wallet</title>
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

    <!-- iziToast -->
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">

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


        /* ODD EVEN */
        table.dataTable tr.odd {
            background: rgb(39, 42, 78);
            background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(21, 23, 46, 0.7) 100%);
        }


        table.dataTable tr.even {
            background: rgb(39, 42, 78);
            background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(31, 34, 67, 0.7) 100%);
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




        /* active */
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

        .edit_paypal_email_button {
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

        .page-item.active .page-link {
            background-color: lightgrey !important;
            border: 1px solid black;
        }

        .page-link {
            color: black !important;
        }

        #walletAmount {
            background: transparent;
        }

        #walletAmount tr {
            background: transparent !important;
        }



        /* toast */
        .iziToast>.iziToast-body .iziToast-icon.ico-success {
            filter: brightness(0) invert(1);
        }

        .iziToast>.iziToast-close {
            filter: brightness(0) invert(1);
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
    include 'connection.php';
    include 'html/page_header.php';

    $my_profile = '';
    $my_addresses = '';
    $my_purchase = '';
    $stkr_wallet = 'active';
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
                    <h3>STKR Wallet</h3>
                    <div class="container">

                        <table id="walletAmount" class="hover" style="width: 100%;">
                            <tbody>
                            </tbody>
                        </table>
                        <!-- <h6 style="color: #777777;">History of Transactions: </h6> -->
                        <table id="walletTransaction" class="hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="min-width: 100px; max-width: 100px;">History of Transactions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- start footer Area -->
    <?php include 'html/page_footer.php'; ?>
    <!-- End footer Area -->



    <!---------------------- MODAL ------------------------>
    <!-- cash_in -->
    <div class="modal fade" id="cashIn">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h5 modal-title" id="exampleModalLongTitle">Cash In</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="cashInForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="modal-body">

                            <label for="cash_in_amount">Cash In Value:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&#8369;</span>
                                </div>
                                <input class="form-control" type="number" min="10" max="5000" id="cash_in_amount" name="cash_in_amount" value="0" required onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" />
                            </div>

                            <span class="text-warning d-block" id="cash_in_warning"></span>

                            <div class="container mt-3 p-0">
                                <button class="btn amount-button-cash-in" type="button" data-value="10">10</button>
                                <button class="btn amount-button-cash-in" type="button" data-value="50">50</button>
                                <button class="btn amount-button-cash-in" type="button" data-value="100">100</button>
                                <button class="btn amount-button-cash-in" type="button" data-value="500">500</button>
                                <button class="btn amount-button-cash-in" type="button" data-value="1000">1000</button>
                                <button class="btn amount-button-cash-in" type="button" data-value="5000">5000</button>
                            </div>
                        </div>

                        <label class="row d-flex justify-content-center">
                            <input id="paypal_checkbox_cashin" name="stkr_wallet_checkbox" type="checkbox" />
                            &nbsp; I allow the use of Paypal to use for Cash In
                        </label>

                        <div class="container" id="paypal-payment-button-cash-in" type="submit" data-paypal_payment="' . $total_payment . '" style="width: 100%;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- cash_out -->
    <div class="modal fade " id="cashOut">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h5 modal-title" id="exampleModalLongTitle">Cash Out</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="cashOutForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="modal-body">

                            <?php
                            // pinaka total wallet amount
                            $queryAdd = "
                            SELECT SUM(CAST(FROM_BASE64(amount) AS DECIMAL(10, 2))) AS total_amount_add
                            FROM wallet_transactions
                            WHERE user_id = '$user_id'
                            AND (transaction_type = 'Cash In' OR transaction_type = 'Profit' OR transaction_type = 'Cancel');
                                        ";
                            $resultAdd = $conn->query($queryAdd);

                            if ($resultAdd) {
                                $rowAdd = $resultAdd->fetch_assoc();
                                $total_amount_add = $rowAdd['total_amount_add'];
                            }

                            $querySub = "
                            SELECT SUM(CAST(FROM_BASE64(amount) AS DECIMAL(10, 2))) AS total_amount_sub
                            FROM wallet_transactions
                            WHERE user_id = '$user_id'
                            AND (transaction_type = 'Pay' OR (transaction_type = 'Cash Out' AND status = 'success'));
                            ";
                            $resultSub = $conn->query($querySub);

                            if ($resultSub) {
                                $rowSub = $resultSub->fetch_assoc();
                                $total_amount_sub = $rowSub['total_amount_sub'];
                            }

                            $total_wallet_amount_normalized = $total_amount_add - $total_amount_sub;
                            // end of pinaka total wallet amount





                            // cashout fee
                            $sqlOutFee = "SELECT * FROM constants WHERE classification = 'cash_out_fee'";
                            $resultOutFee = $conn->query($sqlOutFee);
                            while ($rowOutFee = $resultOutFee->fetch_assoc()) {
                                $cashout_processing_fee = $rowOutFee['percentage'];
                            }
                            // end of cashout fee


                            // minimum cashout
                            $sqlMinOut = "SELECT * FROM constants WHERE classification = 'minimum_cash_out_amount'";
                            $resultMinOut = $conn->query($sqlMinOut);
                            while ($rowMinOut = $resultMinOut->fetch_assoc()) {
                                $minimum_cash_out_value = $rowMinOut['percentage'];
                            }
                            // end of minimum cashout



                            // maximum cashout
                            $maximum_cashout_value = $total_wallet_amount_normalized - $cashout_processing_fee;
                            // end of maximum cashout
                            ?>

                            <div class="container">
                                <div class="row">
                                    <span class="">STKR Hub will collect a processing fee (convenience fee) of <span class="">&#8369;<?php echo $cashout_processing_fee ?></span>` for every cash-out transaction. This amount will be automatically added from the amount you cash out to your wallet upon processing.</span>
                                </div>
                                <div class="row">
                                    <span class="">Your Balance:&nbsp;</span> <span class="">&#8369;<?php echo $total_wallet_amount_normalized ?></span>
                                </div>

                                <div class="row">
                                    <span class="">Processing Fee:&nbsp;</span> <span class="">&#8369;<?php echo $cashout_processing_fee ?></span>
                                </div>

                                <div class="row">
                                    <span class="">Minimum Cash Out:&nbsp;</span> <span class="">&#8369;<?php echo $minimum_cash_out_value ?></span>
                                </div>

                                <div class="row">
                                    <span class="">Maximum Cash Out:&nbsp;</span> <span class="">&#8369;<?php echo $maximum_cashout_value ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-3">
                                    <label for="cash_out_amount">Cash Out Value:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&#8369;</span>
                                        </div>
                                        <input class="form-control" type="number" id="cash_out_amount" name="cash_out_amount" value="" min="<?php echo $minimum_cash_out_value ?>" max="<?php echo $maximum_cashout_value ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="cash_out_paypal_email">Your Paypal Email:</label>
                                    <input class="form-control" type="email" id="cash_out_paypal_email" name="cash_out_paypal_email" required>
                                </div>
                            </div>
                            <div class="container">
                                <span class="text-warning" id="cash_out_warning"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button class="btn btn-primary" type="submit">Cashout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Paypal Email Modal -->
    <div class="modal fade" id="editPaypalEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h5 modal-title" id="exampleModalLabel">Edit Paypal Email</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <button class="btn btn-danger" id="cancel_cashout">Cancel Cashout Request</button> -->
                    <form class="mt-2" id="editPaypalEmailForm">
                        <div class="form-group">
                            <label for="paypalEmail">Paypal Email Cashout Destination:</label>
                            <input type="email" class="form-control" id="paypalEmail" name="paypalEmail" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Save Changes</button>
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

            <?php include 'js/essential.php'; ?>

            var cash_out_fee = <?php echo $cash_out_fee; ?>;
            var minimum_cash_out_amount = <?php echo $minimum_cash_out_amount; ?>;

            var user_id = <?php echo $user_id; ?>;

            $('#cancel_cashout').click(function() {
                $('#editPaypalEmailModal').modal('hide');
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
                    message: 'Are you sure you want to cancel Cash Out request?',
                    position: 'center',
                    buttons: [
                        ['<button><b>YES</b></button>', function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                            $.ajax({
                                url: 'process_cashout_request.php',
                                data: {
                                    user_id: user_id
                                },
                                success: function(response) {
                                    $('#walletAmount').DataTable().ajax.reload();
                                    $('#walletTransaction').DataTable().ajax.reload();
                                    $('#editPaypalEmailModal').modal("hide");

                                    iziToast.success({
                                        color: '#15172e',
                                        progressBarColor: 'linear-gradient(144deg, #26d3e0, #b660e8)rgb(0, 255, 184)',
                                        title: 'Success',
                                        message: 'Your Cash Out Request has been Canceled',
                                        titleColor: '#fff',
                                        messageColor: '#fff',
                                        timeout: 10000,
                                        overlayColor: 'rgba(0, 0, 0, 0.7)',
                                        // onClosed: function() {
                                        //     location.reload();
                                        // }
                                    });
                                },
                                error: function() {
                                    $('#walletAmount').DataTable().ajax.reload();
                                    $('#walletTransaction').DataTable().ajax.reload();
                                    $('#editPaypalEmailModal').modal("hide");

                                    Swal.fire('Error', 'An error occurred while processing your request.', 'error');
                                }
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





            $('#walletTransaction').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No History of Transactions found"
                },

                language: {
                    search: "",
                },

                searching: true,
                info: false,
                paging: true,
                lengthChange: false,
                ordering: false,

                "ajax": {
                    "url": "json_wallet_transaction.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });

            $('#walletAmount').DataTable({
                language: {
                    search: "",
                },

                searching: false,
                info: false,
                paging: false,
                lengthChange: false,
                ordering: false,

                "ajax": {
                    "url": "json_wallet_amount.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });


            // search bar
            var searchInput = $('div.dataTables_filter input');
            $('#walletTransaction thead th:nth-child(1)').append(searchInput);
            searchInput.attr('placeholder', 'Search here');
            searchInput.addClass('form-control');
            searchInput.css('width', '100%');




            $('#walletTransaction').on('click', '#edit_paypal_email_button', function() {
                var walletTransactionId = $(this).data("wallet_transaction_id");
                var paypal_email_destination = $(this).data("paypal_email_destination");

                $('#editPaypalEmailModal').on('hidden.bs.modal', function(e) {
                    $('#paypalEmail').val('');
                });

                $("#editPaypalEmailModal").modal("show");
                $("#paypalEmail").val(paypal_email_destination);
            });

            $('#confirmSubmit').on('click', function() {
                var paypalEmail = $('#paypalEmail').val();
                var walletTransactionId = $('#edit_paypal_email_button').data('wallet_transaction_id');

                // Validate the required input
                if (!paypalEmail) {
                    Swal.fire("Error", "Please enter a Paypal email address.", "error");
                    return;
                }

                // Validate email format
                if (!isValidEmail(paypalEmail)) {
                    Swal.fire("Error", "Please enter a valid email address.", "error");
                    return;
                }

                // Show a confirmation SweetAlert
                Swal.fire({
                    title: "Confirmation",
                    text: "Are you sure you want to save changes?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with the AJAX submission
                        $.ajax({
                            url: "process_paypal_destination_email_update.php",
                            type: "POST",
                            data: {
                                walletTransactionId: walletTransactionId,
                                paypalEmail: paypalEmail,
                            },
                            success: function(response) {
                                $('#walletAmount').DataTable().ajax.reload();
                                $('#walletTransaction').DataTable().ajax.reload();
                                $('#editPaypalEmailModal').modal("hide");
                                Swal.fire("Success", "Paypal email updated successfully", "success");
                            },
                            error: function(error) {
                                $('#walletAmount').DataTable().ajax.reload();
                                $('#walletTransaction').DataTable().ajax.reload();
                                Swal.fire("Error", "An error occurred while updating the email", "error");
                            },
                        });
                    }
                });
            });

            function isValidEmail(email) {
                // Use a regular expression to validate email format
                var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                return emailRegex.test(email);
            }





            // CASHIN
            $('#walletAmount').on('click', '#cash_in', function() {
                $("#cashIn").modal("show");
                $('#cash_in_amount').val(0);
            });
            $('.amount-button-cash-in').click(function() {
                var buttonValue = $(this).data('value');
                $('#cash_in_amount').val(buttonValue);
            });


            $('#walletAmount').on('click', '#cash_in_not', function() {
                iziToast.warning({
                    title: 'Caution',
                    message: 'You exceed to the minimum wallet Cash In limit',
                    position: 'topLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                });
            });


            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill'
                },
                createOrder: function(data, actions) {
                    var paypal_payment = parseFloat($('#cash_in_amount').val());

                    if (paypal_payment < 10 || paypal_payment === 0 || paypal_payment > 5000) {
                        $('#cash_in_warning').text('Minimum Cash In amount is P10 and maximum of P5,000');
                        return actions.reject();
                    }
                    $('#cash_in_warning').text('');

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: paypal_payment.toFixed(2),
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
                            "paypal_payment": parseFloat($('#cash_in_amount').val()),
                            "payment_id": transaction.id,
                            "order_data": orderData,
                        };

                        $.ajax({
                            method: "POST",
                            url: "process_paypal_cash_in.php",
                            data: data,
                            success: function(response) {
                                $('#walletAmount').DataTable().ajax.reload();
                                $('#walletTransaction').DataTable().ajax.reload();
                                $("#cashIn").modal("hide");
                                Swal.fire({
                                    title: "Success",
                                    text: "Cash In Successfully",
                                    icon: "success",
                                    didClose: function() {
                                        // Reload the entire page when the SweetAlert modal is closed
                                        window.location.reload();
                                    }
                                });
                            },
                            error: function(error) {
                                alertify.error("An error occurred.");
                            }
                        });
                    });
                },
                onCancel: function(data) {
                    window.location.reload();

                },
            }).render('#paypal-payment-button-cash-in');















            // CASHOUT
            $('#walletAmount').on('click', '#cash_out', function() {
                $("#cashOut").modal("show");

            });

            $('#walletAmount').on('click', '#cash_out_not', function() {
                iziToast.warning({
                    title: 'Caution',
                    message: 'You still have cashout request, please wait until the admin send the refund',
                    position: 'topLeft', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                });
            });



            $('#cashOutForm').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Confirm Cash Out',
                    text: 'Are you sure you want to cash out?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, cash out',
                    cancelButtonText: 'No, cancel',
                }).then((result) => {
                    if (result.isConfirmed) {

                        var cashOutAmount = $("#cash_out_amount").val();
                        var paypalEmail = $("#cash_out_paypal_email").val();
                        var cash_out_fee = "<?php echo $cashout_processing_fee; ?>";

                        $.ajax({
                            type: 'POST',
                            url: 'process_paypal_cash_out.php',
                            data: {
                                cash_out_amount: cashOutAmount,
                                cash_out_paypal_email: paypalEmail,
                                cash_out_fee: cash_out_fee,
                                user_id: user_id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#walletAmount').DataTable().ajax.reload();
                                    $('#walletTransaction').DataTable().ajax.reload();
                                    $("#cashOut").modal("hide");
                                    Swal.fire('Success', 'Your Cash Out request was successfully completed. Please wait until the admin successfully sends your money to your account.', 'success');
                                } else {
                                    $("#cashOut").modal("hide");
                                    Swal.fire('Error', response.message, 'error');
                                }
                            },
                            error: function() {
                                $("#cashOut").modal("hide");
                                Swal.fire('Error', 'Failed to process the cash out', 'error');
                            },
                        });
                    }
                });
            });







            $('#paypal-payment-button-cash-in').prop('disabled', true);
            $('#paypal-payment-button-cash-in').css({
                'pointer-events': 'none',
                'opacity': '0.2'
            });


            $('#paypal_checkbox_cashin').change(function() {
                if ($('#paypal_checkbox_cashin').prop('checked')) {
                    $('#paypal-payment-button-cash-in').css({
                        'pointer-events': 'auto',
                        'opacity': '1'
                    });

                } else if (!$('#paypal_checkbox_cashin').prop('checked')) {
                    $('#paypal-payment-button-cash-in').css({
                        'pointer-events': 'none',
                        'opacity': '0.2'
                    });
                }
            });








        });
    </script>


</body>

</html>