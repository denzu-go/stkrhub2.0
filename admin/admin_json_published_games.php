<?php
include "../connection.php";
$data = array();

$number = 1;
$sqlPublished = "SELECT * FROM published_built_games";
$queryPublished = $conn->query($sqlPublished);
while ($fetchedPublished = $queryPublished->fetch_assoc()) {
    $published_game_id = $fetchedPublished['published_game_id'];
    $built_game_id = $fetchedPublished['built_game_id'];
    $game_name = $fetchedPublished['game_name'];
    $category = $fetchedPublished['category'];
    $published_date = $fetchedPublished['published_date'];
    $creator_id = $fetchedPublished['creator_id'];
    $logo_path = $fetchedPublished['logo_path'];
    $desired_markup = $fetchedPublished['desired_markup'];
    $manufacturer_profit = $fetchedPublished['manufacturer_profit'];
    $creator_profit = $fetchedPublished['creator_profit'];
    $marketplace_price = $fetchedPublished['marketplace_price'];
    $is_hidden = $fetchedPublished['is_hidden'];

    $sqlCountBuyer = "SELECT COUNT(*) AS count FROM orders WHERE published_game_id = $published_game_id AND is_pending = 0 AND is_canceled != 1";
    $resultBuyer = $conn->query($sqlCountBuyer);
    if ($resultBuyer) {
        $rowBuyer = $resultBuyer->fetch_assoc();
        $total_buyer = $rowBuyer["count"];
    } else {
        echo "Error executing query: " . $conn->error;
    }


    $title = $game_name;

    $sqlCreator = "SELECT * FROM users WHERE user_id = $creator_id";
    $queryCreator = $conn->query($sqlCreator);
    while ($fetchedCreator = $queryCreator->fetch_assoc()) {
        $username = $fetchedCreator['username'];
        $unique_user_id = $fetchedCreator['unique_user_id'];
        $avatar = $fetchedCreator['avatar'];
    }

    $creator = $username;

    if ($is_hidden) {
        $status_value = 'hidden';
    } else {
        $status_value = 'visible';
    }

    $cost = $marketplace_price - $desired_markup;
    $cost_value = '&#8369;' . number_format($cost, 2);

    $marketplace_price_value = '&#8369;' . number_format($marketplace_price, 2);
    $manufacturer_profit_value = '&#8369;' . number_format($manufacturer_profit, 2);
    $creator_profit_value = '&#8369;' . number_format($creator_profit, 2);

    $action = '
    <a href="../marketplace_item_page.php?published_game_id=' . $published_game_id . '" target="_blank">View</a>

    ';

    $number_value = $number++;

    $data[] = array(
        "number" => $number_value,
        "id" => $published_game_id,
        "title" => $title,
        "category" => $category,
        "published_date" => $published_date,
        "creator" => $unique_user_id,
        "cost" => $cost_value,
        "price" => $marketplace_price_value,
        "manufacturer_profit" => $manufacturer_profit_value,
        "creator_profit" => $creator_profit_value,
        "status" => $status_value,
        "frequency" => $total_buyer,
        "action" => $action,
    );
}

echo json_encode($data);
