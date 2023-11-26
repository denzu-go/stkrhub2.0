<?php
// Include the connection file to use the existing $conn variable
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Access form data sent via AJAX
    $rating_id = $_POST['CommentID'];
    
    // SQL query to update the existing record based on rating_id
    $sql = "DELETE FROM ratings WHERE rating_id = $rating_id";

    if ($conn->query($sql) === TRUE) {


        // The record was updated successfully
        echo 'Rating ID: ' . $rating_id . ' has been updated.';
    } else {
        // An error occurred
        echo 'Error: ' . $conn->error;
    }
} else {
    // Handle other request methods or errors
    echo 'Invalid request';
}