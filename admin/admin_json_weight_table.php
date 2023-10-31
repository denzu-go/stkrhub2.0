<?php
include "connection.php";

// Use prepared statement to prevent SQL injection
$sql = "SELECT *
        FROM destination_rates";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    
    $actions = '<a href="edit_weight_charges.php?id=' . $row['destination_id'] . '">Edit</a>';

    $data[] = array(
        "location" => $row["destination_name"],
        "fee1" => $row["weight_price_1"],
        "fee2" => $row["weight_price_2"],
        "fee3" => $row["weight_price_3"],
        "fee4" => $row["weight_price_4"],
        "fee5" => $row["weight_price_5"], 
        "actions" => $actions,
    );
}

// Send a JSON content type header
header('Content-Type: application/json');

echo json_encode($data);
?>

