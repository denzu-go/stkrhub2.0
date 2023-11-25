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


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $game_id = $_POST['game_id'];
    $creator_id = $_POST['creator_id'];
    $reason = $_POST['reason'];

    $uploadDirectory = '../uploads/denied_approve_game_requests/';

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
    $insertQuery = "INSERT INTO denied_update_publish_requests (published_built_game_id, reason, file_path) VALUES ('$game_id', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);
    $denied_approve_game_request_id = mysqli_insert_id($conn);

    // Update the games table
    $updateQuery = "UPDATE published_built_games SET has_pending_update = 0, is_update_request_denied = 1 WHERE published_game_id = $game_id";
    if (mysqli_query($conn, $updateQuery)) {
        echo '<br<br>umenter na sa update query na legoo<br<br>';

        $deleteQuery1 = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = $game_id";
        mysqli_query($conn, $deleteQuery1);

        $deleteQuery2 = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = $game_id";
        mysqli_query($conn, $deleteQuery2);

        echo $uploadPath;
    } else {
        echo 'Error updating built_games.';
    }
}
