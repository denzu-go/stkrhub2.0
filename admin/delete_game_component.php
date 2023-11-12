<?php
include("connection.php");

if (isset($_GET['id'])) {
    $componentID = $_GET['id'];

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
            header("Location: add_game_piece.php?category=" . $user_row['category']); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Component not found.";
    }
}
?>
