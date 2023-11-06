<?php
include("connection.php");

if (isset($_GET['id'])) {
    $prdID = $_GET['id'];

    $prd_sql = "SELECT *
            FROM game_components
            
            WHERE component_id = $prdID";

    $prd_query = $conn->query($prd_sql);
    $prd_row = $prd_query->fetch_assoc();

    if ($prd_row["is_available"] == "1") {
        $sql = "UPDATE game_components
            SET 
                is_available = 0
            WHERE component_id = $prdID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: add_game_piece.php?category=" . $prd_row["category"]); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        $sql = "UPDATE game_components
        SET 
            is_available = 1
        WHERE component_id = $prdID"; // Use $tutID instead of $id

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
        header("Location: add_game_piece.php?category=" . $prd_row["category"]); // Use "." for concatenation
        exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

