<?php
include "connection.php";
$json = array();

$user_id = $_GET['user_id'];
$unique_order_group_id = $_GET['unique_order_group_id'];

$sqlOrderDetails = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND user_id = $user_id";
$queryOrderDetails = $conn->query($sqlOrderDetails);
while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
    $order_date = $fetchedD['order_date'];
    $formatted_date = date('M. d, Y h:i A', strtotime($order_date));

    $is_pending = $fetchedD['is_pending'];
    $in_production = $fetchedD['in_production'];
    $to_ship = $fetchedD['to_ship'];
    $to_deliver = $fetchedD['to_deliver'];
    $is_received = $fetchedD['is_received'];
    $is_canceled = $fetchedD['is_canceled'];
    $is_completely_canceled = $fetchedD['is_completely_canceled'];

    $cancel_order_reason_id = $fetchedD['cancel_order_reason_id'];

    $in_production_datetime = $fetchedD['in_production_datetime'];
    $to_ship_datetime = $fetchedD['to_ship_datetime'];
    $to_deliver_datetime = $fetchedD['to_deliver_datetime'];
    $is_received_datetime = $fetchedD['is_received_datetime'];
    $is_canceled_datetime = $fetchedD['is_canceled_datetime'];
    $is_completely_canceled_datetime = $fetchedD['is_completely_canceled_datetime'];

    // Format the dates or display 'NULL'
    $formatted_in_production_datetime = ($in_production_datetime !== null) ? date('M. d, Y h:i A', strtotime($in_production_datetime)) : '&nbsp;';
    $formatted_to_ship_datetime = ($to_ship_datetime !== null) ? date('M. d, Y h:i A', strtotime($to_ship_datetime)) : '&nbsp;';
    $formatted_to_deliver_datetime = ($to_deliver_datetime !== null) ? date('M. d, Y h:i A', strtotime($to_deliver_datetime)) : '&nbsp;';
    $formatted_is_received_datetime = ($is_received_datetime !== null) ? date('M. d, Y h:i A', strtotime($is_received_datetime)) : '&nbsp;';
    $formatted_is_canceled_datetime = ($is_canceled_datetime !== null) ? date('M. d, Y h:i A', strtotime($is_canceled_datetime)) : '&nbsp;';
    $formatted_is_completely_canceled_datetime = ($is_completely_canceled_datetime !== null) ? date('M. d, Y h:i A', strtotime($is_completely_canceled_datetime)) : '&nbsp;';

    $fullname = $fetchedD['fullname'];
    $number = $fetchedD['number'];
    $region = $fetchedD['region'];
    $province = $fetchedD['province'];
    $city = $fetchedD['city'];
    $barangay = $fetchedD['barangay'];
    $zip = $fetchedD['zip'];
    $street = $fetchedD['street'];
}

// address
$full_address_value = '
' . $street . '  ' . $barangay . '  ' . $city . '  ' . $barangay . '  ' . $province . '  ' . $region . '  ' . $zip . ' 
';
$delivery_address = '
<div class="row">
    <div class="col-2"><span class="">' . $fullname . '<br>' . $number . '</span></div>
    <div class="col"><span class="">' . $full_address_value . '</span></div>
</div>
';


// courier details
$sqlGetCourier = "SELECT * FROM to_deliver WHERE unique_order_group_id = $unique_order_group_id";
$queryGetCourier = $conn->query($sqlGetCourier);
while($fetchedCourier = $queryGetCourier->fetch_assoc()){
    $tracking_number = $fetchedCourier['tracking_number'];
    $courier = $fetchedCourier['courier'];
}

// cancel order reason
$sqlGetCancelReason = "SELECT * FROM cancel_order_reasons WHERE cancel_order_reason_id = $cancel_order_reason_id";
$queryGetCancelReason = $conn->query($sqlGetCancelReason);
while($fetchedCancelReason = $queryGetCancelReason->fetch_assoc()){
    $reason_text = $fetchedCancelReason['reason_text'];
}

// status
if ($is_pending) {
    $status = 'PENDING';
} elseif ($in_production) {
    $status = 'IN PRODUCTION';
} elseif ($to_ship) {
    $status = 'TO SHIP';
} elseif ($to_deliver) {
    $status = 'TO DELIVER';
} elseif ($is_received) {
    $status = 'RECEIVED';
} elseif ($is_canceled) {
    $status = 'CANCELED';
}


$courier_details = '';
$cancelation_reason = '';
if ($is_pending == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck-ramp-box"></i></span>
    </div>
    
    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Ship</span> <span class="small">' . $formatted_to_ship_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';
} elseif ($in_production == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck-ramp-box"></i></span>
    </div>
    
    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Ship</span> <span class="small">' . $formatted_to_ship_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';
} elseif ($to_ship == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-truck-ramp-box"></i></span>
    </div>
    
    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Ship</span> <span class="small">' . $formatted_to_ship_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';
} elseif ($to_deliver == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-truck-ramp-box"></i></span>
    </div>
    
    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line_not_yet"></span>
    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Ship</span> <span class="small">' . $formatted_to_ship_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';

    $courier_details = '
    <div class="container">
        <div class="row">
            <span style="color: white;">Courier:</span>&nbsp;'.$courier.'
        </div>

        <div class="row">
            <span style="color: white;">Tracking Number:</span>&nbsp;'.$tracking_number.'
        </div>
    </div>
    ';
} elseif ($is_received == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-truck-ramp-box"></i></span>
    </div>
    
    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Ship</span> <span class="small">' . $formatted_to_ship_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';

    $courier_details = '
    <div class="container">
        <div class="row">
            <span style="color: white;">Courier:</span>&nbsp;'.$courier.'
        </div>

        <div class="row">
            <span style="color: white;">Tracking Number:</span>&nbsp;'.$tracking_number.'
        </div>
    </div>
    ';
} elseif ($is_completely_canceled == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-ban"></i></span>
    </div>

    <span class="step-line"></span>
    <div class="steps">

    <span><i class="fa-solid fa-wallet"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>
    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Canceled</span> <span class="small">' . $formatted_is_canceled_datetime . '</span>
    </div>
    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Refunded</span> <span class="small">' . $formatted_is_canceled_datetime . '</span>
    </div>
    ';

    $cancelation_reason = '
    <div class="container">
        <div class="row">
            <span style="color: white;">Cancelation Reason:</span>&nbsp;'.$reason_text.'
        </div>
    </div>
    ';
} elseif ($is_canceled == 1) {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>
    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-ban"></i></span>
    </div>
    <span class="step-line"></span>
    <div class="steps">
    <span><i class="fa-solid fa-wallet"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>
    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Canceled</span> <span class="small">' . $formatted_is_canceled_datetime . '</span>
    </div>
    <span class="step-line-b"></span>
    <div class="steps-b">
        <span style="color: #e7e7e7">Refunded</span> <span class="small">' . $formatted_is_canceled_datetime . '</span>
    </div>
    ';

    $cancelation_reason = '
    <div class="container">
        <div class="row">
            <span style="color: white;">Cancelation Reason:</span>&nbsp;'.$reason_text.'
        </div>
    </div>
    ';
} else {
    $progresses_taas = '
    <div class="steps">
    <span><i class="fa-solid fa-money-bill-wave"></i></span>
    </div>

    <span class="step-line_not_yet"></span>

    <div class="steps_not_yet">
    <span><i class="fa-solid fa-person-digging"></i></span>
    </div>
    
    <span class="step-line_not_yet"></span>

    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-truck"></i></span>
    </div>

    <span class="step-line_not_yet"></span>

    <div class="steps_not_yet">
    <span class="font-weight-bold"><i class="fa-solid fa-house-circle-check"></i></span>
    </div>
    ';

    $progresses_baba = '
    <div class="steps-b">
        <span style="color: #e7e7e7">Order Placed</span> <span class="small">' . $formatted_date . '</span>
    </div>

    <span class="step-line-b"></span>

    <div class="steps-b">
        <span style="color: #e7e7e7">In Production</span> <span class="small">' . $formatted_in_production_datetime . '</span>
    </div>

    <span class="step-line-b"></span>

    <div class="steps-b">
        <span style="color: #e7e7e7">To Deliver</span> <span class="small">' . $formatted_to_deliver_datetime . '</span>
    </div>

    <span class="step-line-b"></span>

    <div class="steps-b">
        <span style="color: #e7e7e7">Received</span> <span class="small">' . $formatted_is_received_datetime . '</span>
    </div>
    ';
}


$item = '

<div class="row p-0">
    <div class="col">
        <div class="d-flex justify-content-start">
            <a href="javascript:history.back()" style="color: #; cursor:pointer;"><i class="fa-solid fa-arrow-left"></i> Back</a> 
        </div>
    </div>

    <div class="col">
        <div class="d-flex justify-content-end">
        
            <ul class="d-flex" style="gap: 2rem;">
                <li class="">
                    Order ID: ' . $unique_order_group_id . '
                </li>

                <li class="">
                    Status: ' . $status . '
                </li>
            </ul>
    
        </div>
    </div>
</div>

<div class="row p-4">
    <div class="col">
        <div class="container d-flex justify-content-center align-items-center">

            <div class="">

                <div class="progresses mb-3">
                    ' . $progresses_taas . '
                </div>
              
                <div class="progresses">
                    ' . $progresses_baba . '
                </div>

            </div>    

        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <p>' . $courier_details . '</p>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>' . $cancelation_reason . '</p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5>Delivery Address</h5>
        ' . $delivery_address . '
    </div>
</div>

';


$json[] = array(
    "item" => $item,
);

echo json_encode($json);
