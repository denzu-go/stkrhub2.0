<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id = $_POST['admin_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM admins WHERE admin_id = $id";
    $result = mysqli_query($conn, $query);


    $sql = "UPDATE admins SET username = '$username',
                              email = '$email' 
                              WHERE admin_id = $id";

                // Execute the SQL query
                if (mysqli_query($conn, $sql)) {
                    // Password update successful
                    echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully']);
                    exit;
                } else {
                    // Password update failed
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update profile']);
                    exit;
                }
}
?>
