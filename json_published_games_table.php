<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM published_built_games WHERE creator_id = $user_id";
$result = $conn->query($sql);

$data = array();

while ($fetched = $result->fetch_assoc()) {

    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $game_name = $fetched['game_name'];
    $category = $fetched['category'];
    $edition = $fetched['edition'];

    $date_modified = $fetched['published_date'];
    $timestamp = strtotime($date_modified);
    $dateFormatted = date("M. d, Y", $timestamp);
    $timeFormatted = date("h:i a", $timestamp);

    $date_modified_value = '<span>' . $dateFormatted . ' ' . $timeFormatted . '</span>';


    $logo_path = $fetched['logo_path'];
    $desired_markup = $fetched['desired_markup'];
    $manufacturer_profit = $fetched['manufacturer_profit'];
    $creator_profit = $fetched['creator_profit'];
    $marketplace_price = $fetched['marketplace_price'];

    $has_pending_update = $fetched['has_pending_update'];
    $is_update_request_denied = $fetched['is_update_request_denied'];
    $is_hidden = $fetched['is_hidden'];

    // Initialize variables before the nested loop
    $game_id = '';
    $built_game_name = '';
    $price = '';

    $sqlGetBuiltGames = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $resultGetBuiltGames = $conn->query($sqlGetBuiltGames);
    while ($fetchedBuiltGames = $resultGetBuiltGames->fetch_assoc()) {
        $game_id = $fetchedBuiltGames['game_id'];
        $built_game_name = $fetchedBuiltGames['name'];
        $price = $fetchedBuiltGames['price'];
    }

    // status
    if ($is_hidden == 1) {
        $status = 'Hidden';
        $status_icon = '<i class="fa-solid fa-eye-slash" style="color: #dc3545"></i>';
    } elseif ($is_hidden == 0) {
        $status = 'Visible';
        $status_icon = '<i class="fa-solid fa-eye" style="color: #63d19e"></i>';
    } else {
        $status = 'Visible';
        $status_icon = '<i class="fa-solid fa-eye" style="color: #63d19e"></i>';
    }

    // Count number of buyer
    // SELECT COUNT(*) AS total_orders
    // FROM orders
    // WHERE published_game_id = $published_game_id
    // AND is_pending = 0
    // AND is_canceled != 1
    // AND is_completely_canceled = 1

    $sqlCountBuyer = "SELECT COUNT(*) AS count FROM orders WHERE published_game_id = $published_game_id AND is_pending = 0 AND is_canceled != 1";
    $resultBuyer = $conn->query($sqlCountBuyer);
    if ($resultBuyer) {
        $rowBuyer = $resultBuyer->fetch_assoc();
        $total_buyer = $rowBuyer["count"];
    } else {
        echo "Error executing query: " . $conn->error;
    }

    $sqlCreatorEarnings = "SELECT SUM(creator_profit) AS total_profit FROM orders WHERE published_game_id = $published_game_id AND is_pending = 0 AND is_canceled != 1";
    $resultCreatorEarnings = $conn->query($sqlCreatorEarnings);
    if ($resultCreatorEarnings) {
        $rowCreatorEarnings = $resultCreatorEarnings->fetch_assoc();
        $total_creator_earnings = $rowCreatorEarnings['total_profit'];
    } else {
        echo "Error in the query: " . $conn->error;
    }


    $published_game_link = '
    <div class="container">
        <div class="row">
            <a href="marketplace_item_page.php?published_game_id=' . $published_game_id . '">
                <span class="d-inline-block text-truncate" style="max-width: 190px; color: #26d3e0;" data-toggle="tooltip" title="' . $game_name . '" >
                    ' . $game_name . '
                </span>
            </a>
        </div>

        <div class="row">
            <span class="d-inline-block text-truncate" style="max-width: 190px; color: #e7e7e7; font-size: 12px;" data-toggle="tooltip" title="' . $edition . '" >
                Edition: ' . $edition . '
            </span>
        </div>

        <div class="row">
            <span class="small text-muted" style="padding: 0px; margin:0px; color: #b660e8 !important;">Published Game ID: ' . $published_game_id . '</span>
        </div>

    </div>
    ';


    $info_value = '
        <p>Built Game Name: ' . $built_game_name . '</p>
        <p>From what Game ID: ' . $game_id . '</p>
    ';
    $info = $info_value;

    $price_and_markup_value = '
    <div class="container p-0 m-0" style="color: #e7e7e7;">
        <div class="row d-flex justify-content-between">
            <div class="col-auto small">Cost: </div>
            <div class="col-auto small"><span style="color: #26d3e0;">&#8369;' . number_format($price, 2) . '</span></div>
        </div>

        <div class="row  d-flex justify-content-between">
            <div class="col-auto small">Desire Markup: </div>
            <div class="col-auto small"><span style="color: #26d3e0;">&#8369;' . number_format($desired_markup, 2) . '</span></div>
        </div>

        <div class="row  d-flex justify-content-between">
            <div class="col-auto small">Manyfacturer\'s Profit: </div>
            <div class="col-auto small"><span style="color: #26d3e0;">&#8369;' . number_format($manufacturer_profit, 2) . '</span></div>
        </div>

        <div class="row  d-flex justify-content-between">
            <div class="col-auto small">Your Profit: </div>
            <div class="col-auto small"><span style="color: #26d3e0;">&#8369;' . number_format($creator_profit, 2) . '</span></div>
        </div>

        <div class="row  d-flex justify-content-between">
            <div class="col-auto">Marketplace Price: </div>
            <div class="col-auto"><span style="color: #b660e8;">&#8369;' . number_format($marketplace_price, 2) . '</span></div>
        </div>
    </div>

    ';
    $price_and_markup = $price_and_markup_value;


    $sqlCalculate = "SELECT * FROM orders WHERE published_game_id = $published_game_id AND to_deliver = 1";
    $queryCalculate = $conn->query($sqlCalculate);
    while ($fetchedCalculate = $queryCalculate->fetch_assoc()) {
        $calculate_quantity = $fetchedCalculate['quantity'];

        $calculate_price = $fetchedCalculate['price'] * $calculate_quantity;
        $calculate_desired_markup = $fetchedCalculate['desired_markup'] * $calculate_quantity;
        $calculate_manufacturer_profit = $fetchedCalculate['manufacturer_profit'] * $calculate_quantity;
        $calculate_creator_profit = $fetchedCalculate['creator_profit'] * $calculate_quantity;
        $calculate_marketplace_price = $fetchedCalculate['marketplace_price'] * $calculate_quantity;
        $total_price += $calculate_price;
        $total_desired_markup += $calculate_desired_markup;
        $total_manufacturer_profit += $calculate_manufacturer_profit;
        $total_creator_profit += $calculate_creator_profit;
        $total_marketplace_price += $calculate_marketplace_price;
    }


    $total_earnings_value = '
    <div class="container p-0 m-0" style="color: #e7e7e7;">
        <div class="row d-flex justify-content-between">
            <div class="col-auto small">Number of Buyer: </div>
            <div class="col-auto small"><span style="color: #26d3e0;">' . $total_buyer . '</span></div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-auto">Total Earnings: </div>
            <div class="col-auto"><span style="color: #b660e8;">&#8369;' . number_format($total_creator_earnings, 2) . '</span></div>
        </div>
    </div>

    ';
    $total_earnings = $total_earnings_value;


    if ($is_hidden === '1') {
        $action1 = '
            <button id="unhideButton" data-published_game_id="' . $published_game_id . '">Unhide</button>
        ';
    } else {
        $action1 = '
            <button id="hideButton" data-published_game_id="' . $published_game_id . '">Hide</button>
        ';
    }


    $reason = '';
    $file_path = '';
    $sqlReason = "SELECT * FROM denied_update_publish_requests WHERE published_built_game_id = $published_game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {
        $denied_update_publish_request_id = $fetchedReason['denied_update_publish_request_id'];
        $reason = $fetchedReason['reason'];

        if ($fetchedReason['file_path'] === null) {
            $file_path = 'null';
        } else {
            $file_path = $fetchedReason['file_path'];
        }
    }


    if ($has_pending_update === '1') {
        $view_edit_req = '
        <button class="view_edit_request" id="viewEditButton" data-published_game_id="' . $published_game_id . '">View Edit Request</button>
        ';
        $action2 = '
            
        ';
        $action3 = '
        
        ';
    } elseif ($is_update_request_denied === '1') {
        $view_edit_req = '';
        $action2 = '
        
        ';
        $action3 = '
            <span class="" style="color: #e7e7e7; font-size: 12px;" 
            data-toggle="tooltip" title="Your request has beed denied"
            > 
            <i class="fa-solid fa-heart-crack" style="color: #dc3545;"></i> Denied
            </span>

            <button id="viewReason" data-published_game_id="' . $published_game_id . '" data-reason="' . $reason . '" data-file_path="' . $file_path . '">
            View Reason
            </button>
        ';
    } else {
        $view_edit_req = '';
        $action2 = '
            <button id="editButton" data-published_game_id="' . $published_game_id . '"><i class="fa-solid fa-pen-to-square"></i> Edit</button>

        ';
        $action3 = '
        
        ';
    }

    $actions = $action1 . $action2;

    $status_value = '
        ' . $status_icon . '
        <span class="" style="color: #e7e7e7; font-size: 14px;" 
        data-toggle="tooltip" title="' . $status . '"
        > 
        ' . $status . '
        </span>
        <br>

        ' . $view_edit_req . '

        ' . $action3 . '
        
    ';



    $data[] = array(
        "published_game_link" => $published_game_link,
        "edition" => $edition,
        "category" => $category,
        "info" => $info,
        "published_date" => $date_modified_value,
        "price_and_markup" => $price_and_markup,
        "total_earnings" => $total_earnings,
        "status" => $status_value,
        "actions" => $actions,
    );
}

echo json_encode($data);
