<?php

include "connection.php";
$unique_order_group_id = $_GET['unique_order_group_id'];
$passed_status = $_GET['passed_status'];

$data = array();

$sqlOrderDetails = "SELECT * FROM to_deliver WHERE unique_order_group_id = $unique_order_group_id";
$queryOrderDetails = $conn->query($sqlOrderDetails);
while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
    $date_time_stamp = $fetchedD['date_time_stamp'];
    $formatted_date = date('M. d, Y h:i A', strtotime($date_time_stamp));

    $to_deliver_id = $fetchedD['to_deliver_id'];
    $tracking_number = $fetchedD['tracking_number'];
    $courier = $fetchedD['courier'];
}

$item = '
<h6>Delivery Details</h6>
<div class="container">
    <div class="row">
        <span>Order ID: </span> &nbsp;
        <span>'.$unique_order_group_id.'</span>
    </div>

    <div class="row">
        <span>Tracking Number: </span> &nbsp;
        <span>'.$tracking_number.'</span>
    </div>

    <div class="row">
        <span>Courier: </span> &nbsp;
        <span>'.$courier.'</span>
    </div>
</div>
';



$data[] = array(
    "item" => $item,
);


echo json_encode($data);
