<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating_id'])) {
    // Include your database connection file (e.g., connection.php)
    include 'connection.php';

    // Get the rating_id from the POST data
    $rating_id = $_POST['rating_id'];
    $sqlPID = "SELECT * FROM ratings WHERE rating_id = $rating_id";
    $result = mysqli_query($conn, $sqlPID);
    $row = mysqli_fetch_assoc($result);
    $published_game_id = $row["published_game_id"];

    // Fetch the published_game_id associated with the rating_id to be deleted


    if ($conn->query("DELETE FROM ratings WHERE rating_id = $rating_id") === TRUE) {

        $sqlPID2 = "SELECT * FROM ratings WHERE published_game_id = $published_game_id";
    $result2 = mysqli_query($conn, $sqlPID2);
    

        // Check if the rating was successfully deleted
        if (mysqli_num_rows($result2) > 0) {


            // Calculate the new average rating for the published_game_id
            $sqlRating = "SELECT published_game_id, AVG(rating) AS average_rating 
                FROM ratings 
                WHERE published_game_id = $published_game_id
                GROUP BY published_game_id";

            $query = mysqli_query($conn, $sqlRating);

            if ($query) {
                $row = mysqli_fetch_assoc($query);

                if ($row) {
                    $averageRating = $row['average_rating'];

                    // Update the average rating for the published_game_id in the published_built_games table
                    $sqlUpdate = "UPDATE published_built_games 
                        SET game_rating = $averageRating 
                        WHERE published_game_id = $published_game_id";

                    $queryUpdate = mysqli_query($conn, $sqlUpdate);

                    if ($queryUpdate) {
                        echo 'Ratings deleted successfully.';
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
        } else {
            // If no rows are affected, update game_rating to 0
            $sqlUpdate = "UPDATE published_built_games 
                SET game_rating = 0 
                WHERE published_game_id = $published_game_id";

            $queryUpdate = mysqli_query($conn, $sqlUpdate);

            if ($queryUpdate) {
                echo 'Ratings deleted successfully.';
            } else {
                // An error occurred during the update
                echo 'Error updating ratings: ' . mysqli_error($conn);
            }
        }
    } else {
        // An error occurred during deletion
        echo 'Error deleting rating: ' . mysqli_error($conn);
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle other request methods or errors
    echo 'Invalid request';
}
