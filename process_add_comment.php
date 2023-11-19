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


$sqlRating = "SELECT published_game_id, AVG(rating) AS average_rating 
              FROM ratings 
              WHERE published_game_id = $published_game_id
              GROUP BY published_game_id";

$query = mysqli_query($conn, $sqlRating);

if ($query) {
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $averageRating = $row['average_rating'];

        $sqlUpdate = "UPDATE published_built_games 
                      SET game_rating = $averageRating 
                      WHERE published_game_id = $published_game_id";

        $queryUpdate = mysqli_query($conn, $sqlUpdate);

        if ($queryUpdate) {
            echo 'Ratings updated successfully.';
        } else {
            // An error occurred during the update
            echo 'Error updating ratings: ' . mysqli_error($conn);
        }
    } else {
        // No matching record found in the ratings table
        echo 'No rating data found for this game.';
    }
} else {
    // Query execution failed
    echo 'Error: ' . mysqli_error($conn);
}


    // Close the database connection
    $conn->close();
} else {
    // Handle other request methods or errors
    echo 'Invalid request';
}
?>
