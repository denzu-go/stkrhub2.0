<?php
include "connection.php";

// Use prepared statement to prevent SQL injection
$sql = "SELECT classification, constant_id,image_path, percentage FROM constants WHERE image_path IS NOT NULL";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $constant_id = $row['constant_id'];
    $imagePath = $row['image_path'];
    
    $image = '<button class="btn btn-primary" id="showImage_' . $imagePath . '" data-id="' . $imagePath . '">Show Image</button>';
    $actions = '<button class="btn btn-success" id="uploadImage_' . $constant_id . '" data-id="' . $constant_id . '">Upload</button>';

    $data[] = array(
        "thumbnail" => $row["classification"],
        "image" => $image,
        "actions" => $actions,
    );
}

// Send a JSON content type header
header('Content-Type: application/json');

echo json_encode($data);
?>



