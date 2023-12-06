<?php
include "connection.php";

$passed_status = $_GET['passed_status'];
$data = array();



$sql = "SELECT COUNT(DISTINCT unique_order_group_id) AS count_orders FROM orders WHERE $passed_status = 1 AND ticket_id IS NULL";
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    $count_orders = $row['count_orders'];
}


if ($passed_status == 'is_pending') {
    $icon = '<i class="fa-solid fa-ellipsis"></i>';
    $title = 'Pending Orders';
} elseif ($passed_status == 'in_production') {
    $icon = '<i class="fa-solid fa-person-digging"></i>';
    $title = 'In Production Orders';
} elseif ($passed_status == 'to_ship') {
    $icon = '<i class="fa-solid fa-truck-ramp-box"></i>';
    $title = 'To Ship Orders';
} elseif ($passed_status == 'to_deliver') {
    $icon = '<i class="fa-solid fa-truck-fast"></i>';
    $title = 'To Deliver Orders';
} elseif ($passed_status == 'is_received') {
    $icon = '<i class="fa-solid fa-check-to-slot"></i>';
    $title = 'Received Orders';
} elseif ($passed_status == 'is_canceled') {
    $icon = '<i class="fa-solid fa-ban"></i>';
    $title = 'Canceled Orders';
} else {
    $icon = '<i class="fa-solid fa-check-to-slot"></i>';
    $title = 'To Deliver Orders';
}






$item = '
' . $icon . '
<span class="nav-text"> ' . $title . '
    <span class="p-1" style="background-color: red;">
        ' . $count_orders . '
    </span>
</span>



';


$data[] = array(
    "cart_count" => $item,

);


echo json_encode($data);
