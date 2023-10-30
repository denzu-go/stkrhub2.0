<?php
include "connection.php";
$data = array();

$sqlUniqueOrderDates = "SELECT DISTINCT unique_order_group_id FROM orders WHERE is_pending = 1";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $unique_order_group_id = $row['unique_order_group_id'];

    $creator = 3;
    $status = 'status';
    $date = 'date';

    $actions = '
    <button class="btn" id="view_order" data-unique_order_group_id="' . $unique_order_group_id . '">View Order</button>

    <button class="btn" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>
    ';



    $data[] = array(
        "unique_order_group_id" => $unique_order_group_id,
        "creator" => $creator,
        "status" => $status,
        "date" => $date,
        "actions" => $actions,
    );
}

echo json_encode($data);
