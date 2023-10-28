<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM wallet_transactions WHERE user_id = $user_id ORDER BY transaction_date DESC";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_transaction_id = $fetched['wallet_transaction_id'];
    $transaction_type = $fetched['transaction_type'];
    $published_game_id = $fetched['published_game_id'];
    $cancel_order_reason = $fetched['cancel_order_reason'];

    $amount = base64_decode($fetched['amount']);
    $amount = (float) $amount;

    $transaction_date = $fetched['transaction_date'];
    $timestamp = strtotime($transaction_date);
    $month = strtoupper(date("M", $timestamp));
    $day = date("j", $timestamp);
    $year = date("Y", $timestamp);
    $time = date("g:ia", $timestamp);

    $status = $fetched['status'];
    $mode = $fetched['mode'];
    $paypal_transaction_id = $fetched['paypal_transaction_id'];
    $unique_order_group_id = $fetched['unique_order_group_id'];

    $paypal_email_destination = $fetched['paypal_email_destination'];

    $edit_paypal_email_button = '
    <button class="edit_paypal_email_button" id="edit_paypal_email_button" 
    data-wallet_transaction_id="' . $wallet_transaction_id . '"
    data-paypal_email_destination="' . $paypal_email_destination . '">
        <i class="fa-solid fa-pen"></i>
    </button>
    ';

    // description
    if ($status == 'pending') {
        $description = '<i class="fa-regular fa-circle-dot"></i> Admin will send to ' . $paypal_email_destination . $edit_paypal_email_button;
    } elseif ($status == 'success' && $transaction_type == 'Cash Out') {
        $description = '<i class="fa-solid fa-check"></i> Sent to: ' . $paypal_email_destination;
    } elseif ($transaction_type == 'Profit') {
        $transaction_type = 'Publishing Profit';
        $description = 'Celebrate, someone has just embraced the magic of your published game (ID: ' . $published_game_id . ')';
    } elseif ($transaction_type == 'Cash In') {
        $description = 'Paypal Transaction ID: ' . $paypal_transaction_id;
    } elseif ($transaction_type == 'Cancel') {
        $transaction_type = 'Canceled Order';
        $description = '
        Canceled Order ID: ' . $unique_order_group_id.'<br>
        Cancelation Reason: ' . $cancel_order_reason.'<br>
        ';
    } elseif ($transaction_type == 'Pay') {
        $transaction_type = 'Place Order';
        $description = 'Place Order ID: ' . $unique_order_group_id;
    } elseif ($paypal_transaction_id != null) {
        $description = $paypal_transaction_id;
    } else {
        $description = '';
    }

    // amount value and color side
    if ($transaction_type == 'Cash In') {
        $amount_value = '
        <span style="color: #90ee90">
            + &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid #63d19e
        ';
    } elseif ($transaction_type == 'Cash Out') {
        $amount_value = '
        <span style="color: #dc3545">
            - &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid orange;
        ';
    } elseif ($transaction_type == 'Canceled Order') {
        $amount_value = '
        <span style="color: #90ee90">
            + &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid gray
        ';
    } elseif ($transaction_type == 'Place Order') {
        $amount_value = '
        <span style="color: #dc3545">
            - &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid pink
        ';
    } elseif ($transaction_type == 'Publishing Profit') {
        $amount_value = '
        <span style="color: #90ee90">
            + &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid #b660e8
        ';
    } else {
        $amount_value = '
        <span>
            &#8369;' . number_format($amount, 2) . '
        </span>
        ';

        $side_color = '
        border-left: 3px solid white
        ';
    }

    // success or what
    if ($status == 'success') {
        $status_value = '
        <span style="color: #90ee90">
            <i class="fa-regular fa-circle-check"></i> ' . strtoupper($status) . '
        </span>
        ';
    } else {
        $status_value = '
        <span style="color: #26d3e0">
            <i class="fa-regular fa-circle-dot"></i> ' . strtoupper($status) . '
        </span>
        ';
    }


    $item = '
    <div class="row d-flex align-items-center pl-3 pr-3" style="color: #e7e7e7; ">
        <div class="col-1 p-3"style="line-height: 0.7rem; ' . $side_color . ';">
            <div class="row d-flex justify-content-center">' . $month . '</div>
            <div class="row d-flex justify-content-center"><span class="h4 p-0 m-0">' . $day . '</span></div>
            <div class="row d-flex justify-content-center"><span class="small" style="color: #777777">' . $year . '</span></div>
        </div>

        <div class="col-1 d-flex flex-row" style="color: #777777">' . $time . '</div>

        <div class="col pl-5">
            <div class="container">
                <div class="row">' . $transaction_type . '</div>
                <div class="row"><span class="small" style="color: #777777;">' . $description . '</span></div>
            </div>
        </div>

        <div class="col-2 d-flex flex-row-reverse">' . $status_value . '</div>
        <div class="col-2 d-flex flex-row-reverse">' . $amount_value . '</div>
    </div>
    ';


    $json[] = array(
        "item" => $item,
    );
}

echo json_encode($json);
