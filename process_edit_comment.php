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

        $sqlPID = "SELECT * FROM ratings WHERE rating_id = $rating_id";
        $result = mysqli_query($conn, $sqlPID);
        $row = mysqli_fetch_assoc($result);
        $published_game_id = $row["published_game_id"];

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
