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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];

    echo $built_game_id;

    $sqlGetRequestDetails = "SELECT * FROM pending_published_built_games WHERE built_game_id = $built_game_id";
    $queryGetRequestDetails = $conn->query($sqlGetRequestDetails);
    while ($fetchedRequest = $queryGetRequestDetails->fetch_assoc()) {
        $pending_published_built_game_id = $fetchedRequest['pending_published_built_game_id'];
        $game_name = $fetchedRequest['game_name'];
        $category = $fetchedRequest['category'];
        $edition = $fetchedRequest['edition'];
        $published_date = $fetchedRequest['published_date'];
        $creator_id = $fetchedRequest['creator_id'];
        $age_id = $fetchedRequest['age_id'];
        $short_description = $fetchedRequest['short_description'];
        $long_description = $fetchedRequest['long_description'];
        $website = $fetchedRequest['website'];
        $logo_path = $fetchedRequest['logo_path'];
        $min_players = $fetchedRequest['min_players'];
        $max_players = $fetchedRequest['max_players'];
        $min_playtime = $fetchedRequest['min_playtime'];
        $max_playtime = $fetchedRequest['max_playtime'];
        $has_pending_update = $fetchedRequest['has_pending_update'];
        $desired_markup = $fetchedRequest['desired_markup'];
        $manufacturer_profit = $fetchedRequest['manufacturer_profit'];
        $creator_profit = $fetchedRequest['creator_profit'];
        $marketplace_price = $fetchedRequest['marketplace_price'];
    }

    $sqlCategory = "SELECT * FROM categories WHERE category_id = $category";
    $queryCategory = $conn->query($sqlCategory);
    while ($fetchedCategory = $queryCategory->fetch_assoc()) {
        $category_name = $fetchedCategory['category_name'];
    }


    $insertQuery = "INSERT INTO published_built_games
    (built_game_id, game_name, category, edition, creator_id, age_id, short_description, long_description, website, logo_path, min_players, max_players, min_playtime, max_playtime, has_pending_update, desired_markup, manufacturer_profit, creator_profit, marketplace_price) 
    VALUES (
        '$built_game_id', 
        '$game_name', 
        '$category_name', 
        '$edition', 
        '$creator_id', 
        '$age_id', 
        '$short_description', 
        '$long_description', 
        '$website', 
        '$logo_path', 
        '$min_players', 
        '$max_players', 
        '$min_playtime', 
        '$max_playtime', 
        '$has_pending_update', 
        '$desired_markup', 
        '$manufacturer_profit', 
        '$creator_profit', 
        '$marketplace_price'
    )";

    mysqli_query($conn, $insertQuery);

    // Get the auto-generated primary key (published_game_id)
    $published_game_id = mysqli_insert_id($conn);
    echo $published_built_game_id = $published_game_id;

    // Query to retrieve pending update files information
    $pendingFilesQuery = "SELECT * FROM pending_published_multiple_files WHERE built_game_id = '$built_game_id'";
    $pendingFilesResult = mysqli_query($conn, $pendingFilesQuery);

    // Loop through the pending files and insert into published_multiple_files table
    while ($pendingFileRow = mysqli_fetch_assoc($pendingFilesResult)) {
        $insertFileQuery = " INSERT INTO 
        
            published_multiple_files (published_built_game_id, built_game_id, creator_id, file_path)

            VALUES (
                $published_built_game_id,
                '{$pendingFileRow['built_game_id']}',
                $creator_id,
                '{$pendingFileRow['file_path']}'
            )
        ";
        mysqli_query($conn, $insertFileQuery);
    }

    // Delete the rows from pending_published_multiple_files files table
    $deleteFilesQuery = "DELETE FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
    mysqli_query($conn, $deleteFilesQuery);

    // Delete the rows from pending_published_built_games table
    $deleteQuery = "DELETE FROM pending_published_built_games WHERE built_game_id = '$built_game_id'";
    mysqli_query($conn, $deleteQuery);

    $updateQuery1 = "UPDATE built_games SET is_pending_published = 0 WHERE built_game_id = $built_game_id";
    mysqli_query($conn, $updateQuery1);

    $updateQuery2 = "UPDATE built_games SET is_published = 1 WHERE built_game_id = $built_game_id";
    mysqli_query($conn, $updateQuery2);
}
