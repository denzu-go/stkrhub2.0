<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlApproved = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_approved = 1 ORDER BY build_date DESC";
$resultApproved = $conn->query($sqlApproved);

$data = array();

while ($fetched = $resultApproved->fetch_assoc()) {
    $built_game_id = $fetched['built_game_id'];
    $game_id = $fetched['game_id'];
    $name = $fetched['name'];
    $description = $fetched['description'];
    $creator_id = $fetched['creator_id'];

    $date_modified = $fetched['build_date'];
    $timestamp = strtotime($date_modified);
    $dateFormatted = date("M. d, Y", $timestamp);
    $timeFormatted = date("h:i a", $timestamp);

    $date_modified_value = $dateFormatted . '<br>' . $timeFormatted;


    $price = $fetched['price'];

    $is_pending = $fetched['is_pending'];
    $is_canceled = $fetched['is_canceled'];
    $is_approved = $fetched['is_approved'];

    $is_at_cart = $fetched['is_at_cart'];
    $is_semi_purchased = $fetched['is_semi_purchased'];
    $is_purchased = $fetched['is_purchased'];

    $is_pending_published = $fetched['is_pending_published'];
    $is_request_denied = $fetched['is_request_denied'];
    $is_published = $fetched['is_published'];

    $ticket_cost = $fetched['ticket_cost'];

    $sqlReason = "SELECT * FROM denied_publish_requests WHERE built_game_id = $built_game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {
        $denied_publish_request_id = $fetchedReason['denied_publish_request_id'];
        $reason = $fetchedReason['reason'];

        if ($fetchedReason['file_path'] === null) {
            $file_path = 'null';
        } else {
            $file_path = $fetchedReason['file_path'];
        }
    }


    $game_link = '

    <div class="container">
        <div class="row">
            <a href="built_game_dashboard.php?built_game_id=' . $built_game_id . '">
                <span class="d-inline-block text-truncate" style="max-width: 190px; color: #26d3e0;" data-toggle="tooltip" title="' . $name . '" >
                    ' . $name . '
                </span>
            </a>
        </div>

        <div class="row">
            <span class="small text-muted" style="padding: 0px; margin:0px; color: #b660e8 !important;">Approved Game ID: ' . $built_game_id . '</span>
        </div>';

        if($is_published){
            $getPublishedD = "SELECT * FROM published_built_games WHERE built_game_id = $built_game_id";
            $queryPublishedD = $conn->query($getPublishedD);
            while($fetchedPD = $queryPublishedD->fetch_assoc()){
                $published_game_id = $fetchedPD['published_game_id'];
            }
            $game_link .='
            <div class="row">
                <span class="small text-muted" style="padding: 0px; margin:0px">Published Game ID: ' . $published_game_id . '</span>
            </div>
            ';
        }
        

        $game_link .='

        <div class="row">
            <span class="small text-muted" style="padding: 0px; margin:0px">Created Game ID: ' . $game_id . '</span>
        </div>
    </div>
    ';

    $description_value = '
    <span class="d-inline-block text-truncate" style="max-width: 140px;" data-toggle="tooltip" title="' . $description . '">
    ' . $description . '
    </span>';


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

    $publish_request = '
    <a href="edit_game_page.php?built_game_id=' . $built_game_id . '">Publish Here!</a>
    ';


    // status
    if ($is_at_cart == 1) {
        $title = 'Please Purchase at Cart';
        $status_icon = '
            <i class="fa-solid fa-cart-shopping" style="color: #f7f799;"></i>
        ';
        $status_action = '
        
        ';
    } elseif ($is_request_denied == 1) {
        $title = '
        Denied
        ';

        $status_icon = '
            <i class="fa-solid fa-heart-crack" style="color: #dc3545;"></i>
        ';

        $status_action = '
        <button class="view-reason" data-built_game_id="' . $built_game_id . '" data-reason="' . $reason . '" data-file_path="' . $file_path . '">
            View Reason
        </button>
        <br>
        <a href="denied_publish_request_page.php?built_game_id=' . $built_game_id . '">Try Publish Again</a>

        
        ';
    } elseif ($is_pending_published == 1) {
        $title = '
        Publish Requested
        ';

        $status_icon = '
            <i class="fa-solid fa-face-grin-wide" style="color: #3dc1e1;"></i>
        ';

        $status_action = '
        <a href="pending_publish_request_page.php?built_game_id=' . $built_game_id . '">View Publish Request</a>
        ';
    } elseif ($is_published == 1) {
        $title = 'PUBLISHED';

        $status_icon = '
            <i class="fa-solid fa-flag-checkered" style="color: #b660e8;"></i>
        ';

        $status_action = '
        
        ';
    } elseif ($is_semi_purchased == 1) {
        if ($is_purchased) {
            $title = '
            ' . $publish_request . '
            ';

            $status_icon = '

            ';

            $status_action = '
        
            ';
        } else {
            $title = 'Do not Cancel your order';
            $status_icon = '
            <i class="fa-regular fa-circle-dot" style="color: #3dc1e1;"></i>
            ';
            $status_action = '
        
            ';
        }
    } elseif ($is_purchased == 1) {
        $title = '
        Ready To Publish
        ';

        $status_icon = '
        <i class="fa-solid fa-clipboard-check" style="color: #90ee90;"></i>
        ';
        $status_action = '
        '.$publish_request.'
        ';
    } elseif ($is_approved == 1) {
        $title = 'Purchase first, to Publish';
        $status_icon = '
            <i class="fa-solid fa-paperclip" style="color: yellow;"></i>
        ';
        $status_action = '
        
        ';
    } else {
        $title = '';

        $status_icon = '
        
        ';
        $status_action = '
        
        ';
    }

    $status = '
        ' . $status_icon . '
        <span class="" style="color: #e7e7e7; font-size: 12px;" 
        data-toggle="tooltip" title="' . $title . '"
        > 
        ' . $title . '
        </span>
        <br>
        '.$status_action.'
    ';


    // old extra actions
    $old_extra_actions = '
    <button class="edit-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    ';

    // extra actions
    $extra_actions = '
    <button class="edit-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>
    ';


    // actions
    if ($is_at_cart == 1) {
        $actions = '
    <button id="built_game_buy"
    data-built_game_id="' . $built_game_id . '"
    class="add-to-cart-approved"
    
    disabled
    data-toggle="tooltip" title="You can only buy bulk once you have purchased it once"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>

    ' . $extra_actions . '
    ';
    } elseif ($is_published == 1) {
        $actions = '
    <button 
    id="built_game_buy_again" data-built_game_id="' . $built_game_id . '" 
    class="add-to-cart-approved"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    } elseif ($is_semi_purchased == 1) {
        if ($is_purchased) {
            $actions = '
            <button 
            id="built_game_buy_again" data-built_game_id="' . $built_game_id . '" 
            class="add-to-cart-approved"
            >
                <span class="ti-bag"></span> Add to Cart
            </button>
            ' . $extra_actions . '
            ';
        } else {
            $actions = '
            <button id="built_game_buy"
            data-built_game_id="' . $built_game_id . '"
            class="add-to-cart-approved"
            
            disabled
            data-toggle="tooltip" title="You can only buy bulk once you have completely purchased it once"
            >
                <span class="ti-bag"></span> Add to Cart
            </button>
        
            ' . $extra_actions . '
            ';
        }
    } elseif ($is_purchased == 1) {
        $actions = '
    <button 
    id="built_game_buy_again" data-built_game_id="' . $built_game_id . '" 
    class="add-to-cart-approved"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    } elseif ($is_approved == 1) {
        $actions = '
    <button id="built_game_buy_first"
    data-built_game_id="' . $built_game_id . '"
    data-ticket_cost="' . $ticket_cost . '"
    data-price="' . $price . '"
    class="add-to-cart-approved"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>

    ' . $extra_actions . '
    ';
    } else {
        $actions = '
    <button id="built_game_buy" data-built_game_id="' . $built_game_id . '" class="social-info">
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    }





    $built_game_link = $game_link;
    $total_price = '<span class="text-truncate" style="color: #26d3e0; max-width: 100px;" data-toggle="tooltip" title="' . $price . '">&#8369;' . number_format($price, 2) . '</span>';
    $formatted_date = $date_modified_value;


    $data[] = array(
        "built_game_link" => $built_game_link,
        "description" => $description_value,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "status" => $status,
        "actions" => $actions,

    );
}

echo json_encode($data);
