<?php
include("connection.php");

if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $user_sql = "SELECT *
                 FROM admins
                 WHERE admin_id = $userID";

    $user_query = $conn->query($user_sql);
    $user_row = $user_query->fetch_assoc();

    if ($user_query->num_rows > 0) {
        $sql = "DELETE FROM admins
                WHERE admin_id = $userID";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully!";
            header("Location: admin_account_management.php"); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "User not found.";
    }
}
?>

