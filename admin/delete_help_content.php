<?php
session_start();
include 'connection.php';

$tutorial_id;

if (isset($_GET['id'])) {
    $tutorial_id = $_GET['id'];
    
    // Retrieve the category from the database
    $SQL = "SELECT * FROM tutorials WHERE tutorial_id = $tutorial_id";
    $result = mysqli_query($conn, $SQL);
    $row = mysqli_fetch_assoc($result);

    $tut_category = $row['faq_id'];

    $faq_sql = "SELECT * FROM faq WHERE faq_id = $tut_category";
    $faq_result = mysqli_query($conn, $faq_sql);
    $faq_row = mysqli_fetch_assoc($faq_result);
    
    $faq_category;

    // Delete records from various tables
    $sql = "DELETE FROM tutorials WHERE tutorial_id = $tutorial_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $conn->error;
    }

   

    // Redirect to the 'add_game_piece.php' page with the category parameter
    header("Location: add_game_piece.php?category=" . $faq_category);
}



