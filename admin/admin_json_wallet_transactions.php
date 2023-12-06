<?php
session_start();
include "connection.php";

$data = array();

$sql = "SELECT * FROM wallet_transactions ORDER BY transaction_date DESC";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $user_id = $fetched['user_id'];
    // get unique user id
    $sqlGetUID = "SELECT * FROM users WHERE user_id = $user_id";
    $resultGetUID = $conn->query($sqlGetUID);
    while ($fetchedUID = $resultGetUID->fetch_assoc()) {
        $unique_user_id = $fetchedUID['unique_user_id'];
    }



    $wallet_transaction_id = $fetched['wallet_transaction_id'];
    $transaction_type = $fetched['transaction_type'];
    $published_game_id = $fetched['published_game_id'];
    $cancel_order_reason = $fetched['cancel_order_reason'];

    $cash_out_fee = $fetched['cash_out_fee'];

    $amount = base64_decode($fetched['amount']);
    $amount = (float) $amount;

    $cashout_amount_requested = $amount - $cash_out_fee;

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

    $transaction_id = $wallet_transaction_id . $timestamp;

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
        Canceled Order ID: ' . $unique_order_group_id . '<br>
        Cancelation Reason: ' . $cancel_order_reason . '<br>
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
    $cashout_extra1 = '';
    if ($transaction_type == 'Cash In') {
        $amount_value = '
        <span style="color: green">
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

        $cashout_extra1 = '
        Cash Out Amount Requested: &#8369;' . number_format($cashout_amount_requested, 2) . ', Cash Out Fee: &#8369;' . number_format($cash_out_fee, 2) . '
        ';
    } elseif ($transaction_type == 'Canceled Order') {
        $amount_value = '
        <span style="color: green">
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
        <span style="color: green">
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
    if ($status == 'success' && $transaction_type == 'Canceled Order') {
        $status_value = '
        <span>
            <i class="fa-regular fa-circle-check"></i> ' . strtoupper('REFUNDED') . '
        </span>
        ';
    } elseif ($status == 'success') {
        $status_value = '
        <span>
            <i class="fa-regular fa-circle-check"></i> ' . strtoupper($status) . '
        </span>
        ';
    } else {
        $status_value = '
        <span>
            <i class="fa-regular fa-circle-dot"></i> ' . strtoupper($status) . '
        </span>
        ';
    }


    $data[] = array(
        "user_id" => $unique_user_id,
        "date" => $month . ' ' . $day . ' ' . $year . ', ' . $time,
        "transaction_type" => $transaction_type,
        "transaction_id" => $transaction_id,
        "status" => $status_value,
        "amount" => $amount_value,
    );
}


echo json_encode($data);
