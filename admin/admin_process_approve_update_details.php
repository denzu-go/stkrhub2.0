<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $published_game_id = $_POST['game_id'];

    $sqlGetRequestDetails = "SELECT * FROM pending_update_published_built_games WHERE published_built_game_id = $published_game_id";
    $queryGetRequestDetails = $conn->query($sqlGetRequestDetails);
    while ($fetchedRequest = $queryGetRequestDetails->fetch_assoc()) {

        $pending_update_published_built_games_id = $fetchedRequest['pending_update_published_built_games_id'];

        $new_built_game_id = $fetchedRequest['built_game_id'];

        $new_game_name = mysqli_real_escape_string($conn, $fetchedRequest['game_name']);
        $new_category = mysqli_real_escape_string($conn, $fetchedRequest['category']);
        $new_edition = mysqli_real_escape_string($conn, $fetchedRequest['edition']);

        $new_published_date = $fetchedRequest['published_date'];
        $new_creator_id = $fetchedRequest['creator_id'];

        $new_age_id = $fetchedRequest['age_id'];
        $new_short_description = mysqli_real_escape_string($conn, $fetchedRequest['short_description']);
        $new_long_description = mysqli_real_escape_string($conn, $fetchedRequest['long_description']);

        $new_website = '';
        $new_logo_path = mysqli_real_escape_string($conn, $fetchedRequest['logo_path']);

        $new_min_players = $fetchedRequest['min_players'];
        $new_max_players = $fetchedRequest['max_players'];
        $new_min_playtime = $fetchedRequest['min_playtime'];
        $new_max_playtime = $fetchedRequest['max_playtime'];

        $new_desired_markup = $fetchedRequest['desired_markup'];
        $new_manufacturer_profit = $fetchedRequest['manufacturer_profit'];
        $new_creator_profit = $fetchedRequest['creator_profit'];
        $new_marketplace_price = $fetchedRequest['marketplace_price'];
    }

    echo 'pending_update_published_built_games_id:' . $pending_update_published_built_games_id . '<br>';
    echo 'new_built_game_id:' . $new_built_game_id . '<br>';
    echo 'new_game_name:' . $new_game_name . '<br>';
    echo 'new_category:' . $new_category . '<br>';
    echo 'new_edition:' . $new_edition . '<br>';

    echo 'new_published_date:' . $new_published_date . '<br>';
    echo 'new_creator_id:' . $new_creator_id . '<br>';

    echo 'new_age_id:' . $new_age_id . '<br>';
    echo 'new_short_description:' . $new_short_description . '<br>';
    echo 'new_long_description:' . $new_long_description . '<br>';

    echo 'new_website:' . $new_website . '<br>';
    echo 'new_logo_path:' . $new_logo_path . '<br>';

    echo 'new_min_players:' . $new_min_players . '<br>';
    echo 'new_max_players:' . $new_max_players . '<br>';
    echo 'new_min_playtime:' . $new_min_playtime . '<br>';
    echo 'new_max_playtime:' . $new_max_playtime . '<br>';

    echo 'new_desired_markup:' . $new_desired_markup . '<br>';
    echo 'new_manufacturer_profit:' . $new_manufacturer_profit . '<br>';
    echo 'new_creator_profit:' . $new_creator_profit . '<br>';
    echo 'new_marketplace_price:' . $new_marketplace_price . '<br>';

    $updateQuery = " UPDATE published_built_games
        SET built_game_id = $new_built_game_id, 
            game_name = '$new_game_name',
            category = '$new_category',
            edition = '$new_edition',
            published_date = $new_published_date,
            creator_id = $new_creator_id,
            short_description = '$new_short_description',
            long_description = '$new_long_description',
            website = '$new_website',
            logo_path = '$new_logo_path',
            min_players = '$new_min_players',
            max_players = '$new_max_players',
            min_playtime = '$new_min_playtime',
            max_playtime = '$new_max_playtime',
            desired_markup = $new_desired_markup,
            manufacturer_profit = $new_manufacturer_profit,
            creator_profit = $new_creator_profit,
            marketplace_price = $new_marketplace_price
        WHERE published_game_id = $published_game_id;
    ";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Update success at published_built_games updateQuery 1<br><br><br><br><br><br>";
    } else {
        echo "Error deleting files: " . mysqli_error($conn);
    }


    // Delete the rows from published_multiple_files files table
    $deleteFilesQuery = "DELETE FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
    if (mysqli_query($conn, $deleteFilesQuery)) {
        echo "Deletion success at published_multiple_files<br><br><br><br><br>";
    } else {
        echo "Error deleting files: " . mysqli_error($conn);
    }


    // Query to retrieve pending update files information
    $pendingFilesQuery = "SELECT * FROM pending_update_published_multiple_files WHERE published_built_game_id = $published_game_id";
    $pendingFilesResult = mysqli_query($conn, $pendingFilesQuery);
    while ($pendingFileRow = mysqli_fetch_assoc($pendingFilesResult)) {
        $file_path = mysqli_real_escape_string($conn, $pendingFileRow['file_path']);

        $insertFileQuery = "INSERT INTO published_multiple_files (published_built_game_id, built_game_id, creator_id, file_path)
            VALUES ($published_game_id, $new_built_game_id, $new_creator_id, '$file_path')";
        $resultInsertFileQuery = mysqli_query($conn, $insertFileQuery);

        if ($resultInsertFileQuery) {
            echo "File inserted successfully<br><br><br><br><br><br>";
        } else {
            echo "Error inserting file: " . mysqli_error($conn);
        }
    }


    // Delete the rows from pending_update_published_multiple_files table
    $deleteQuery = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_game_id'";
    $resultDeleteQuery = mysqli_query($conn, $deleteQuery);
    if ($resultDeleteQuery) {
        echo "Deletion successful at pending_update_published_multiple_files<br><br><br><br>";
    } else {
        echo "Error deleting: " . mysqli_error($conn);
    }

    // Delete the rows from pending_update_published_built_games table
    $deleteQuery2 = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = '$published_game_id'";
    $resultDeleteQuery2 = mysqli_query($conn, $deleteQuery2);
    if ($resultDeleteQuery2) {
        echo "Deletion successful at pending_update_published_built_games 2nd delete query<br><br><br><br><br><br><br>";
    } else {
        echo "Error deleting: " . mysqli_error($conn);
    }

    $updateQuery1 = "UPDATE published_built_games SET has_pending_update = 0, is_update_request_denied = 1 WHERE published_game_id = $published_game_id";
    $resultUpdateQuery1 = mysqli_query($conn, $updateQuery1);
    if ($resultUpdateQuery1) {
        echo "Deletion successful at published_built_games updateQuery1<br><br><br><br><br>";
    } else {
        echo "Error deleting: " . mysqli_error($conn);
    }
}
