<?php
session_start();
include 'connection.php';

$component_id;

if (isset($_GET['id'])) {
    $component_id = $_GET['id'];
    
    // Retrieve the category from the database
    $SQL = "SELECT * FROM game_components WHERE component_id = $component_id";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_assoc($result);
    $category = $row['category'];

    // Delete records from various tables
    $sql = "DELETE FROM component_colors WHERE component_id = $component_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM component_templates WHERE component_id = $component_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM component_assets WHERE component_id = $component_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM game_components WHERE component_id = $component_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }

    // Redirect to the 'add_game_piece.php' page with the category parameter
    header("Location: add_game_piece.php?category=" . $category);
}



