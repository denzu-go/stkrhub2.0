<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlApproved = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_approved = 1";
$resultApproved = $conn->query($sqlApproved);

$data = array();

while ($fetched = $resultApproved->fetch_assoc()) {
    $built_game_id = $fetched['built_game_id'];
    $game_id = $fetched['game_id'];
    $name = $fetched['name'];
    $description = $fetched['description'];
    $creator_id = $fetched['creator_id'];
    $build_date = $fetched['build_date'];
    $price = $fetched['price'];

    $is_pending = $fetched['is_pending'];
    $is_canceled = $fetched['is_canceled'];
    $is_approved = $fetched['is_approved'];
    $is_purchased = $fetched['is_purchased'];
    $is_pending_published = $fetched['is_pending_published'];
    $is_request_denied = $fetched['is_request_denied'];
    $is_published = $fetched['is_published'];


    $game_link = '
    <a href="built_game_dashboard.php?built_game_id=' . $built_game_id . '">' . $name . '</a>
    ';


    if ($game_id == 0) {
        $from_what_game_value = '
            <small>deleted</small>
        ';
    } else {
        $from_what_game_value = '
           ID: ' . $game_id . '
        ';
    }

    $from_what_game = $from_what_game_value;



    if ($is_pending == 1) {
        $status_value = 'Wait until the admin approves this';
    } elseif ($is_canceled == 1) {
        $status_value = 'CANCELED';
    } elseif ($is_approved == 1) {
        $status_value = 'APPROVED';
    } elseif ($is_purchased == 1) {
        $status_value = 'PURCHASED';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } else {
        $status_value = '';
    }

    $status = $status_value;


    $actions = '
    <button id="built_game_buy" data-built_game_id="' . $built_game_id . '" class="social-info">
        <span class="ti-bag"></span> Add to Cart
    </button>

    <button class="edit-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    ';



    $built_game_link = $game_link;
    $total_price = $price;
    $formatted_date = $build_date;


    $data[] = array(
        "built_game_link" => $built_game_link,
        "description" => $description,
        "from_what_game" => $from_what_game,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "status" => $status,
        "actions" => $actions,

    );
}

echo json_encode($data);
