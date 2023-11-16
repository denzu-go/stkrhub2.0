<?php
include "connection.php";

$data = array();

$number = 1;
$sqlGames = "SELECT * FROM pending_update_published_built_games";
$resultGames = $conn->query($sqlGames);
while ($fetchedGames = $resultGames->fetch_assoc()) {
    $pending_update_published_built_games_id = $fetchedGames['pending_update_published_built_games_id'];
    $published_built_game_id = $fetchedGames['published_built_game_id'];
    $built_game_id = $fetchedGames['built_game_id'];
    $game_name = $fetchedGames['game_name'];
    $category = $fetchedGames['category'];  
    $edition = $fetchedGames['edition'];
    $published_date = $fetchedGames['published_date'];
    $creator_id = $fetchedGames['creator_id'];
    $age_id = $fetchedGames['age_id'];
    $short_description = $fetchedGames['short_description'];
    $long_description = $fetchedGames['long_description'];
    $website = $fetchedGames['website'];
    $logo_path = $fetchedGames['logo_path'];
    $min_players = $fetchedGames['min_players'];
    $max_players = $fetchedGames['max_players'];
    $min_playtime = $fetchedGames['min_playtime'];
    $max_playtime = $fetchedGames['max_playtime'];

    $desired_markup = $fetchedGames['desired_markup'];
    $manufacturer_profit = $fetchedGames['manufacturer_profit'];
    $creator_profit = $fetchedGames['creator_profit'];
    $marketplace_price = $fetchedGames['marketplace_price'];

    $sqlBuiltGames = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $resultBuiltGames = $conn->query($sqlBuiltGames);
    while ($fetchedBuiltGames = $resultBuiltGames->fetch_assoc()) {
        $game_id = $fetchedBuiltGames['game_id'];
        $name = $fetchedBuiltGames['name'];
        $description = $fetchedBuiltGames['description'];
        $build_date = $fetchedBuiltGames['build_date'];
        $price = $fetchedBuiltGames['price'];
    }


    $game_link = '
        <a href="admin_view_has_pending_update_details_request_page.php?pending_update_published_built_games_id=' . $pending_update_published_built_games_id . ' &creator_id='.$creator_id.'">' . $game_name . '</a>

    ';

    $status = 'Has Edit Publishing Request';

    $actions = '
    <a href="admin_view_has_pending_update_details_request_page.php?pending_update_published_built_games_id=' . $pending_update_published_built_games_id . ' &creator_id='.$creator_id.'">View</a>
    ';

    $number_value = $number++;

    $data[] = array(
        "number" => $number_value,
        "published_built_game_id" => $published_built_game_id,
        "game_link" => $game_link,
        "category" => $category,
        "creator_id" => $creator_id,
        "status" => $status,
        "actions" => $actions,
    );
}

echo json_encode($data);
