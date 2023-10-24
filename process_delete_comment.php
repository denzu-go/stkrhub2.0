<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating_id'])) {
    // Include your database connection file (e.g., connection.php)
    include 'connection.php';

    // Get the rating_id from the POST data
    $rating_id = $_POST['rating_id'];

    // SQL query to delete the comment based on the rating_id
    $sql = "DELETE FROM ratings WHERE rating_id = $rating_id";

    if ($conn->query($sql) === TRUE) {
        // The comment was successfully deleted
        echo 'Comment with rating_id ' . $rating_id . ' has been deleted.';
    } else {
        // An error occurred
        echo 'Error: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle other request methods or errors
    echo 'Invalid request';
}
?>
