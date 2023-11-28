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
$sql = "SELECT * FROM courier";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    

   
    $actions = '<button class="btn btn-primary" id="uploadImage_' . $row["courier_id"] . '" data-id="' . $row["courier_id"] . '">Edit</button>
    <button type="button" class="delete-courier btn btn-danger" data-courier-id =" '.$row['courier_id'].'" style = "margin:5px;">Delete</a>';

    

    $data[] = array(
        "id" => $row["courier_id"],
        "name" => $row["courier_name"],
        "action" => $actions,
    );
}

// Send a JSON content type header
header('Content-Type: application/json');

echo json_encode($data);
