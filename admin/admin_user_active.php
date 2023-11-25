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

if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $user_sql = "SELECT *
            FROM users
            
            WHERE user_id = $userID";

    $user_query = $conn->query($user_sql);
    $user_row = $user_query->fetch_assoc();

    if ($user_row["is_active"] == 1) {
        $sql = "UPDATE users
            SET 
                is_active = 0
            WHERE user_id = $userID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: admin_user_management.php"); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        $sql = "UPDATE users
        SET 
            is_active = 1
        WHERE user_id = $userID"; // Use $tutID instead of $id

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
        header("Location: admin_user_management.php?"); // Use "." for concatenation
        exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

