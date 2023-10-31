<?php
include "connection.php";

// Use prepared statement to prevent SQL injection
$sql = "SELECT classification, percentage FROM constants WHERE percentage IS NOT NULL";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $percentage = $row["percentage"] . '%';
    
    

    $data[] = array(
        "service" => $row["classification"],
        "percentage" => $percentage, 
   
    );
}

// Send a JSON content type header
header('Content-Type: application/json');

echo json_encode($data);
?>

