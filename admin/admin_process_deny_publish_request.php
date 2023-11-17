<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $game_id = $_POST['game_id'];
    $creator_id = $_POST['creator_id'];
    $reason = $_POST['reason'];


    $uploadDirectory = '../uploads/denied_publish_requests/';

    if (isset($_FILES['fileupload'])) {
        $file = $_FILES['fileupload'];

        $uniqueFilename = uniqid() . '_' . $file['name'];
        $uploadPath = $uploadDirectory . $uniqueFilename;
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        } else {
            echo "File upload failed.";
            exit;
        }
    } else {
        $uploadPath = 0;
    }

    echo "reason" . $reason . "<br>";
    echo "game_id" . $game_id . "<br>";
    echo "creator_id" . $creator_id . "<br>";
    echo "uploadPath" . $uploadPath . "<br>";



    // Insert data into the database
    $insertQuery = "INSERT INTO denied_publish_requests (built_game_id, reason, file_path) VALUES ('$game_id', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);




    // Update the built_games table
    $updateQuery = "UPDATE built_games SET is_pending_published = 0, is_request_denied = 1 WHERE built_game_id = $game_id";
    if (mysqli_query($conn, $updateQuery)) {

        $UpdateQuery1 = "UPDATE pending_published_built_games SET is_visible = 0 WHERE built_game_id = $game_id";
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
