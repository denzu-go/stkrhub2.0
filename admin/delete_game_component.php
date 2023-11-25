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
    $componentID = $_POST['ComponentID'];

    $component_sql = "SELECT *
                      FROM game_components
                      WHERE component_id = $componentID";

    $user_query = $conn->query($component_sql);
    $user_row = $user_query->fetch_assoc();

    if ($user_query->num_rows > 0) {
        $sql = "UPDATE game_components
                SET is_deleted = 1
                WHERE component_id = $componentID";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully!";
           
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Component not found.";
    }
}
?>
