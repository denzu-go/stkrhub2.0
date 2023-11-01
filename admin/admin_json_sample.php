<?php
include "connection.php";
$data = array();

$sqlUniqueOrderDates = "SELECT DISTINCT unique_order_group_id FROM orders WHERE is_pending = 1";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $unique_order_group_id = $row['unique_order_group_id'];

    $getUser = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
    $queryUser = $conn->query($getUser);
    while ($fetchedUser = $queryUser->fetch_assoc()) {
        $user_id = $fetchedUser['user_id'];
    }


    $sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND ticket_id IS NULL";
    $queryAll = $conn->query($sqlAll);
    while ($fetched = $queryAll->fetch_assoc()) {
        $order_id = $fetched['order_id'];
        $published_game_id = $fetched['published_game_id'];
        $built_game_id = $fetched['built_game_id'];
        $added_component_id = $fetched['added_component_id'];

        // kinuha lng ung built_game_id if wala
        if ($published_game_id) {
            $sqlGetComponents = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryGetComponents = $conn->query($sqlGetComponents);
            while ($fetchedGetComponents = $queryGetComponents->fetch_assoc()) {
                $built_game_id = $fetchedGetComponents['built_game_id'];
            }
        }


        $sqlGetComponents2 = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
        $queryGetComponents2 = $conn->query($sqlGetComponents2);
        while ($fetchedGetComponents2 = $queryGetComponents2->fetch_assoc()) {
            $component_id = $fetchedGetComponents2['component_id'];
            $is_custom_design = $fetchedGetComponents2['is_custom_design'];

            $custom_design_file_path = $fetchedGetComponents2['custom_design_file_path'];
        }
    }




    

    $actions = '
    <button class="btn" id="view_order" data-unique_order_group_id="' . $unique_order_group_id . '">View Order</button>

    <button class="btn" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>

    <a href="" download>Download Zip</a>
    ';

    $creator = $user_id;
    $status = 'status';
    $date = 'date';


    $data[] = array(
        "unique_order_group_id" => $unique_order_group_id,
        "creator" => $creator,
        "status" => $status,
        "date" => $date,
        "actions" => $actions,
    );
}

echo json_encode($data);
