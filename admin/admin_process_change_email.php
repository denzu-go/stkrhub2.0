<?php
session_start();
include("connection.php");

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $email_id = $_POST['email_id']; // Use the correct variable name
    $password_id = $_POST['password_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE constants
            SET text = '$email'
            WHERE constant_id = $email_id"; // Use the correct variable name

    if ($conn->query($sql) === TRUE) {

        $sql2 = "UPDATE constants
            SET text = '$password'
            WHERE constant_id = $password_id";


       
        if ($conn->query($sql2) === TRUE) {
            $confirm = '1';
            session_start();
            $_SESSION['confirm'] = $confirm;
            echo "success";
        } else {
            // Return an error response
            echo "error: " . $conn->error;
        }
        
    } else {
        // Return an error response
        echo "error: " . $conn->error;
    }
}
