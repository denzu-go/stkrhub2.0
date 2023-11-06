<?php

include "connection.php";
$unique_order_group_id = $_GET['unique_order_group_id'];
$passed_status = $_GET['passed_status'];

$data = array();

$sqlOrderDetails = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
$queryOrderDetails = $conn->query($sqlOrderDetails);
while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
    $cancel_order_reason_id = $fetchedD['cancel_order_reason_id'];

    $sqlR = "SELECT * FROM cancel_order_reasons WHERE cancel_order_reason_id = $cancel_order_reason_id";
    $queryR = $conn->query($sqlR);
    while ($fetchedR = $queryR->fetch_assoc()) {
        $reason_text = $fetchedR['reason_text'];
    }
}

$item = '
<h6>Cancelation Details</h6>
<div class="container">
    <div class="row">
        <span>Order ID: </span> &nbsp;
        <span>'.$unique_order_group_id.'</span>
    </div>

    <div class="row">
        <span>Cancelation Reason: </span> &nbsp;
        <span>'.$reason_text.'</span>
    </div>

    <div class="row">
        <span>Date: </span> &nbsp;
        <span>date</span>
    </div>
</div>
';



$data[] = array(
    "item" => $item,
);


echo json_encode($data);
