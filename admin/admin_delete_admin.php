<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];

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
           
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "User not found.";
    }
}
?>

