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
    $userID = $_POST['userID'];

    // Prepare and execute an SQL query to delete the address
    $user_sql = "SELECT *
    FROM users
    
    WHERE user_id = $userID";

    $user_query = $conn->query($user_sql);
    $user_row = $user_query->fetch_assoc();

    if ($user_row["is_deleted"] == 0) {
        $sql = "UPDATE users
        SET 
            is_deleted = 1
        WHERE user_id = $userID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {

            $sql = "UPDATE published_built_games
        SET 
            is_hidden = 1
        WHERE creator_id = $userID"; // Use $tutID instead of $id

            if ($conn->query($sql) === TRUE) {


                echo "Data updated successfully!";
                
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
