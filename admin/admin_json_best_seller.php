<?php
session_start();
include "../connection.php";

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in



// Query to get the most frequent published_game_id to less frequent published_game_id
$sqlGames = "SELECT published_game_id, COUNT(*) AS frequency
             FROM orders
             WHERE is_pending != 1
             AND published_game_id IS NOT NULL
             GROUP BY published_game_id
             ORDER BY frequency ASC";

$resultGames = $conn->query($sqlGames);

$data = array();

while ($row = $resultGames->fetch_assoc()) {
    $published_game_id = $row['published_game_id'];
    $frequency = $row['frequency']; 

    $sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
    $queryPublished = $conn->query($sqlPublished);
    while ($fetchedPublished = $queryPublished->fetch_assoc()) {
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

    if($is_hidden){
        $status_value = 'hidden';
    } else {
        $status_value = 'visible';
    }

    $cost = $marketplace_price - $desired_markup;
    $cost_value = '&#8369;' .number_format($cost, 2);

    $marketplace_price_value = '&#8369;' .number_format($marketplace_price, 2);
    $manufacturer_profit_value = '&#8369;' .number_format($manufacturer_profit, 2);
    $creator_profit_value = '&#8369;' .number_format($creator_profit, 2);

    $action = '
    <a href="../marketplace_item_page.php?published_game_id='.$published_game_id.'" target="_blank">View</a>

    ';

    
    $data[] = array(
        "id" => $published_game_id,
        "title" => $title,
        "category" => $category,
        "cost" => $cost_value,
        "price" => $marketplace_price_value,
        "manufacturer_profit" => $manufacturer_profit_value,
        "creator_profit" => $creator_profit_value,
        "creator" => $unique_user_id,
        "status" => $status_value,
        "frequency" => $frequency,
        "action" => $action,
    );
}

echo json_encode($data);
?>
