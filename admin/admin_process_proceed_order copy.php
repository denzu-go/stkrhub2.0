<?php
session_start();
include 'connection.php';

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in


$order_id = $_POST['order_id'];

$sql = "UPDATE orders
        SET is_pending = 0, in_production = 1
        WHERE order_id = $order_id";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => "Order created successfully");
} else {
    $response = array("status" => "error", "message" => "Error creating order: " . $conn->error);
}
echo json_encode($response);
?>