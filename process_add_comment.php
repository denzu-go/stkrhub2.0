<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection file (e.g., connection.php)
    include 'connection.php';

    // Get data from the form
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $published_game_id = $_POST['published_game_id'];

    // You may also want to add additional data validation and sanitation here

    // SQL query to insert data into the ratings table
    $sql = "INSERT INTO ratings (user_id, published_game_id, rating, comment) VALUES ('$user_id', '$published_game_id', '$rating', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // The comment was successfully added
        echo 'Your comment has been added.';
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
