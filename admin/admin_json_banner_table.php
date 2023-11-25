<?php
session_start();
include "connection.php";

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in



// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM index_banner";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $constant_id = $row['id'];
    $imagePath = $row['image_path'];

    $image = '<button class="btn btn-primary" id="showImage_' . $imagePath . '" data-id="../' . $imagePath . '">Show Image</button>';
    $actions = '<button class="btn btn-success" id="uploadImage_' . $constant_id . '" data-id="' . $constant_id . '">Edit</button>';

    $primary = '';

    if ($row["is_showcased"] == 1) {
        $primary = '<a href="admin_showcase_banner.php?id=' . $row['id'] . '" style="color:white; padding:10px; border-radius: 14px; background-color: violet;"> Showcased </a>';
    } else {
        $primary = '<a href="admin_showcase_banner.php?id=' . $row['id'] . '" style="color:white;padding:10px; border-radius: 14px; background-color: red;"> Not Showcased </a>';
    }

    $data[] = array(
        "name" => $row["banner_name"],
        "image" => $image,
        "showcased" => $primary,
        "actions" => $actions,
    );
}

// Send a JSON content type header
header('Content-Type: application/json');

echo json_encode($data);
