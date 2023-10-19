<?php
// Include the connection file to use the existing $conn variable
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Access form data sent via AJAX
    $rating_id = $_POST['rating_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Set the time zone to Manila
    date_default_timezone_set('Asia/Manila');
    $manilaTime = date('Y-m-d H:i:s'); // Get the current date and time in the Manila time zone

    // SQL query to update the existing record based on rating_id
    $sql = "UPDATE ratings SET rating = '$rating', comment = '$comment', date_time = '$manilaTime' WHERE rating_id = $rating_id";

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
?>
