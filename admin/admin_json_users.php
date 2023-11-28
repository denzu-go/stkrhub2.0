<?php
include "../connection.php";
$data = array();

$sqlUsers = "SELECT * FROM users";
$resultUsers = $conn->query($sqlUsers);

$number = 1;
while ($row = $resultUsers->fetch_assoc()) {
    $user_id = $row['user_id'];
    $unique_user_id = $row['unique_user_id'];
    $username = $row['username'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $phone_number = $row['phone_number'];
    $email = $row['email'];

    $is_active = $row['is_active'];
    $number_loop = $number++;

    // STATUS
    if ($is_active = 1) {
        $status_value = 'Active';
    } elseif ($is_active != 1) {
        $status_value = 'Inactive';
    }


    // COMPLETED ORDERS
    $sqlGetCompletedOrders = "SELECT COUNT(*) as completed_orders FROM orders 
    WHERE is_pending != 1 AND is_canceled != 1 AND user_id = $user_id
    ";
    $resultGetCompletedOrders = $conn->query($sqlGetCompletedOrders);
    if ($resultGetCompletedOrders) {
        $rowGetCompletedOrders = $resultGetCompletedOrders->fetch_assoc();
        $completed_orders = $rowGetCompletedOrders['completed_orders'];
    }

    // CANCELED ORDERS
    $sqlGetCanceledOrders = "SELECT COUNT(*) as canceled_orders FROM orders 
    WHERE is_canceled = 1 AND user_id = $user_id
    ";
    $resultGetCanceledOrders = $conn->query($sqlGetCanceledOrders);
    if ($resultGetCanceledOrders) {
        $rowGetCanceledOrders = $resultGetCanceledOrders->fetch_assoc();
        $canceled_orders = $rowGetCanceledOrders['canceled_orders'];
    }

    // PUBLISHED GAMES
    $sqlGetPublished = "SELECT COUNT(*) as published_games_count FROM published_built_games 
    WHERE creator_id = $user_id
    ";
    $resultGetPublished = $conn->query($sqlGetPublished);
    if ($resultGetPublished) {
        $rowGetPublished = $resultGetPublished->fetch_assoc();
        $published_games_count = $rowGetPublished['published_games_count'];
    }

    // ALL PUBLISHED GAME IDS PER USER
    $sqlGetPublishedIDS = "SELECT published_game_id
    FROM published_built_games
    WHERE creator_id = $user_id";
    $resultGetPublishedIDS = $conn->query($sqlGetPublishedIDS);
    if ($resultGetPublishedIDS->num_rows > 0) {
        $publishedGameIds = array();

        while ($rowPublishedIDS = $resultGetPublishedIDS->fetch_assoc()) {
            $publishedGameIds[] = $rowPublishedIDS['published_game_id'];
        }
    } else {
        $publishedGameIds[] = '';
    }


    $published_games_value = '
        <span>Number of Published Games: ' . $published_games_count . '</span><br>
        <span>Published Games IDs: ' . implode(', ', $publishedGameIds) . '</span>
    ';


    $frequencyAllOrders = $completed_orders;
    $frequencyCanceledOrders = $canceled_orders;


    $data[] = array(
        "number" => $number_loop,
        "id" => $unique_user_id,
        "username" => $username,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "phone_number" => $phone_number,
        "email" => $email,
        "completed_orders" => $frequencyAllOrders,
        "orders_canceled" => $frequencyCanceledOrders,
        "published_games" => $published_games_value,
        "status" => $status_value,
    );
}


echo json_encode($data);
