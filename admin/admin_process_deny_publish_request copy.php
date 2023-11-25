<?php
session_start();
include 'connection.php';

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent via POST
    $builtGameId = $_POST['gameId'];
    $reason = $_POST['reason'];
    $file = $_FILES['file'];

    echo "Built Game ID: " . $builtGameId . "<br>";
    echo "Reason: " . $reason . "<br>";

    $uploadDirectory = '../uploads/denied_publish_requests/';

    if (isset($_FILES['file'])) {
        $uniqueFilename = time() . '_' . $file['name'];
        $uploadPath = $uploadDirectory . $uniqueFilename;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        } else {
            echo "File upload failed.";
            exit;
        }
    } else {
        $uploadPath = 0;
    }


    // Insert data into the database
    $insertQuery = "INSERT INTO denied_publish_requests (built_game_id, reason, file_path) VALUES ('$builtGameId', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);

    // Update the built_games table
    $updateQuery = "UPDATE built_games SET is_pending_published = 0, is_request_denied = 1 WHERE built_game_id = $builtGameId";
    if (mysqli_query($conn, $updateQuery)) {

        $UpdateQuery1 = "UPDATE pending_published_built_games SET is_visible = 0 WHERE built_game_id = $builtGameId";
        mysqli_query($conn, $UpdateQuery1);

        // $deleteQuery2 = "DELETE FROM pending_published_built_games WHERE built_game_id = $builtGameId";
        // mysqli_query($conn, $deleteQuery2);

        echo $uploadPath;

        echo 'success';
    } else {
        echo 'Error updating built_games.';
    }
} else {
    echo "Invalid request";
}