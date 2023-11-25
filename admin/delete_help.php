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
    $id = $_POST['helpID'];
    
    // Retrieve the category from the database
    $sql = "DELETE FROM help
                WHERE help_id = $id";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully!";
           
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Help not found.";
    }




