<?php
include "connection.php";

$passed_status = $_GET['passed_status'];
$data = array();

$sql = "SELECT COUNT(DISTINCT unique_order_group_id) AS count_orders FROM orders WHERE $passed_status = 1";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    $count_orders = $row['count_orders'];
}



$item = '
<i class="fa-solid fa-person-digging"></i>
<span class="nav-text">In Production Orders <span class="p-1" style="background-color: red;">' . $count_orders . '</span></span>
';


$data[] = array(
    "cart_count" => $item,

);


echo json_encode($data);
