<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM wallet_transactions WHERE user_id = $user_id ORDER BY transaction_date DESC";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_transaction_id = $fetched['wallet_transaction_id'];
    $transaction_type = $fetched['transaction_type'];
    $amount = $fetched['amount'];

    $transaction_date = $fetched['transaction_date'];
    $timestamp = strtotime($transaction_date);
    $month = strtoupper(date("M", $timestamp));
    $day = date("j", $timestamp);
    $year = date("Y", $timestamp);
    $time = date("g:ia", $timestamp);

    $status = $fetched['status'];
    $mode = $fetched['mode'];
    $paypal_transaction_id = $fetched['paypal_transaction_id'];

    if ($transaction_type == 'Cash In' || $transaction_type == 'Received') {
        $amount_value = '
        <span style="color: #90ee90">
            + &#8369;' . number_format($amount, 2) . '
        </span>
        ';
    } elseif ($transaction_type == 'Cash Out' || $transaction_type == 'Pay') {
        $amount_value = '
        <span style="color: #dc3545">
            - &#8369;' . number_format($amount, 2) . '
        </span>
        ';
    } else {
        $amount_value = '
        <span>
            &#8369;' . number_format($amount, 2) . '
        </span>
        ';
    }

    if ($status == 'success') {
        $status_value = '
        <span style="color: #90ee90">
            <i class="fa-solid fa-circle-check"></i> ' . strtoupper($status) . '
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
    <div class="row d-flex align-items-center p-3">
        <div class="col-1 "style="line-height: 0.7rem;">
            <div class="row d-flex justify-content-center">' . $month . '</div>
            <div class="row d-flex justify-content-center"><span class="h4 p-0 m-0">' . $day . '</span></div>
            <div class="row d-flex justify-content-center"><span class="small">' . $year . '</span></div>
        </div>

        <div class="col-1 d-flex flex-row">' . $time . '</div>

        <div class="col pl-5">
            <div class="container">
                <div class="row">' . $transaction_type . '</div>
                <div class="row">' . $paypal_transaction_id . '</div>
            </div>
        </div>

        <div class="col-3 d-flex flex-row-reverse">' . $status_value . '</div>
        <div class="col-3 d-flex flex-row-reverse">' . $amount_value . '</div>
    </div>
    ';


    $json[] = array(
        "item" => $item,
    );
}

echo json_encode($json);
