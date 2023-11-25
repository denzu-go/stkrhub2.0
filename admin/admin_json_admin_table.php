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



$is_super = 0;
// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM admins WHERE is_super_admin = ?");
$stmt->bind_param("i", $is_super); // Assuming 'category' is a string, use "s" for string
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {

    $actions = '<a class="btn btn-outline-primary " href="admin_edit_admin.php?id=' . $row['admin_id'] . '">Edit   </a>   <button type="button" class="delete-admin btn btn-danger" data-admin-id =" ' . $row['admin_id'] . '">Delete</a>';

    $data[] = array(

        "username" => $row['username'],
        "email" => $row['email'],
        "date" => $row['created_at'],
        "action" => $actions,
    );
}

// Send a JSON content type header 
header('Content-Type: application/json');

echo json_encode($data);
