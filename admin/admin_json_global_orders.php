<?php
include "connection.php";
$data = array();
$passed_status = $_GET['passed_status'];
$number = 0;

$sqlUniqueOrderDates = "SELECT DISTINCT unique_order_group_id FROM orders WHERE $passed_status = 1";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $unique_order_group_id = $row['unique_order_group_id'];

    $getUser = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
    $queryUser = $conn->query($getUser);
    while ($fetchedUser = $queryUser->fetch_assoc()) {
        $user_id = $fetchedUser['user_id'];
        $order_date = $fetchedUser['order_date'];
        $formatted_date = date('M. d, Y h:i A', strtotime($order_date));

        $is_pending = $fetchedUser['is_pending'];
        $in_production = $fetchedUser['in_production'];
        $to_ship = $fetchedUser['to_ship'];
        $to_deliver = $fetchedUser['to_deliver'];
        $is_received = $fetchedUser['is_received'];
        $is_canceled = $fetchedUser['is_canceled'];
        $is_completely_canceled = $fetchedUser['is_completely_canceled'];
    }

    // status
    if ($is_pending) {
        $status = 'Pending';
    } elseif ($in_production) {
        $status = 'In Production';
    } elseif ($to_ship) {
        $status = 'To Ship';
    } elseif ($to_deliver) {
        $status = 'To Deliver';
    } elseif ($is_received) {
        $status = 'Received';
    } elseif ($is_canceled) {
        $status = 'Canceled';
    } elseif ($is_completely_canceled) {
        $status = 'Refunded';
    } else {
        $status = 'Undefined';
    }


    // getUsersFROM USERS TABLE
    $getUserTable = "SELECT * FROM users WHERE user_id = $user_id";
    $queryUserTable = $conn->query($getUserTable);

    if ($queryUserTable) {
        $fetchedUserTable = $queryUserTable->fetch_assoc();
        if ($fetchedUserTable) {
            $unique_user_id = $fetchedUserTable['unique_user_id'];
        } else {
            // Data not found, set it to 'undefined'
            $unique_user_id = 'undefined';
        }
    } else {
        // Handle the query execution error
        die("Error in query: " . $conn->error);
    }

    $zip = new ZipArchive();
    $filename = 'zip/' . $unique_order_group_id . '.zip';
    if (file_exists($filename)) {
        unlink($filename);
    }

    if ($zip->open($filename, ZipArchive::CREATE) === TRUE) {

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
                $from = 'built_games_added_game_components';
                $where = 'built_game_id';
                $where_id = $built_game_id;
                $classification = 'Published Game';
            } elseif ($built_game_id) {
                $from = 'built_games_added_game_components';
                $where = 'built_game_id';
                $where_id = $built_game_id;
                $classification = 'Approved Game';
            } elseif ($added_component_id) {
                $from = 'added_game_components';
                $where = 'added_component_id';
                $where_id = $added_component_id;
                $classification = 'Component';
            } else {
                $from = 'built_games_added_game_components';
                $where = 'built_game_id';
                $where_id = $built_game_id;
                $classification = 'UNDEFINED';
            }

            $ParentDir = $classification . ' ' . $order_id;
            $zip->addEmptyDir($ParentDir);


            $sqlGetComponents2 = "SELECT * FROM $from WHERE $where = '$where_id'";
            $queryGetComponents2 = $conn->query($sqlGetComponents2);
            while ($fetchedGetComponents2 = $queryGetComponents2->fetch_assoc()) {
                $added_component_id = $fetchedGetComponents2['added_component_id'];
                $component_id = $fetchedGetComponents2['component_id'];
                $is_custom_design = $fetchedGetComponents2['is_custom_design'];

                $custom_design_file_path = $fetchedGetComponents2['custom_design_file_path'];
                $custom_design_file_path_true = '../' . $custom_design_file_path;
                $custom_design_file_path_base = basename($custom_design_file_path);

                $quantity = $fetchedGetComponents2['quantity'];
                $color_id = $fetchedGetComponents2['color_id'];
                $color_code = '';
                $size = $fetchedGetComponents2['size'];

                // ginet lng ung component name
                $getComponentInfo = "SELECT * FROM game_components WHERE component_id = $component_id";
                $queryComponentInfo = $conn->query($getComponentInfo);
                while ($fetchedComponentInfo = $queryComponentInfo->fetch_assoc()) {
                    $component_name = $fetchedComponentInfo['component_name'];
                    $category = $fetchedComponentInfo['category'];
                }

                // ginet lng ung color
                $color_name = 'N/A';
                $getComponentColors = "SELECT * FROM component_colors WHERE component_id = $component_id";
                $queryComponentColors = $conn->query($getComponentColors);
                while ($fetchedComponentColors = $queryComponentColors->fetch_assoc()) {
                    $color_name = $fetchedComponentColors['color_name'];
                    $color_code = $fetchedComponentColors['color_code'];
                }

                $directory2 = $component_name . ' ' . $size . ' ' . $added_component_id . ' ' . 'Qty: ' . $quantity;

                if (!empty($custom_design_file_path)) {
                    $zip->addFile($custom_design_file_path_true, '' . $ParentDir . '/' . $directory2 . '/' . $custom_design_file_path_base);
                }

                $file_name = 'info component id ' . $added_component_id . '.txt';

                $file_content = '
                ADDED COMPONENT ID: ' . $added_component_id . '
                COMPONENT NAME: ' . $component_name . '
                CATEGORY: ' . $category . '
                SIZE: ' . $size . '

                QUANTITY: ' . $quantity . '
                COLOR: ' . $color_name . ' ' . $color_code . '
                FILE: ' . $custom_design_file_path_base . '
                ';

                file_put_contents($file_name, $file_content);

                $zip->addFile($file_name, '' . $ParentDir . '/' . $directory2 . '/' . basename($file_name));
            }


            $download = '
            <a href="' . $filename . '" download>Download Zip</a>
        ';
        }
    }

    $zip->close();



    $creator = $unique_user_id;
    $date = $formatted_date;


    $view_order_button = '<button class="btn p-0 m-0" id="view_order" data-unique_order_group_id="' . $unique_order_group_id . '">View Order</button>';


    if ($passed_status == 'is_pending') {
        $next_order_button = '<button class="btn p-0 m-0" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>';
    } elseif ($passed_status == 'in_production') {
        $next_order_button = '<button class="btn p-0 m-0" id="to_ship" data-unique_order_group_id="' . $unique_order_group_id . '">To Ship Order</button>';
    } elseif ($passed_status == 'to_ship') {
        $next_order_button = '<button class="btn p-0 m-0" id="to_deliver" data-unique_order_group_id="' . $unique_order_group_id . '">To Deliver Order</button>';
    } elseif ($passed_status == 'to_deliver') {
        $next_order_button = '<button class="btn p-0 m-0" id="view_delivery_details" data-unique_order_group_id="' . $unique_order_group_id . '">Delivery Details</button>';
    } elseif ($passed_status == 'is_received') {
        $next_order_button = '<button class="btn p-0 m-0" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>';
    } elseif ($passed_status == 'is_canceled') {
        $next_order_button = '<button class="btn p-0 m-0" id="view_cancelation_details" data-unique_order_group_id="' . $unique_order_group_id . '">Cancelation Details</button>';
    } elseif ($passed_status == 'is_completely_canceled') {
        $next_order_button = '<button class="btn p-0 m-0" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>';
    } else {
        $next_order_button = '';
    }


    $actions = '
    <div class="row p-0 m-0">
        <div class="col p-0 m-0">
            ' . $view_order_button . '
        </div>

        <div class="col p-0 m-0">
            ' . $download . '
        </div>

        <div class="col p-0 m-0">
            ' . $next_order_button . '
        </div>

    </div>

    ';



    $number++;


    $data[] = array(
        "number" => $number,
        "unique_order_group_id" => $unique_order_group_id,
        "creator" => $creator,
        "status" => $status,
        "date" => $date,
        "actions" => $actions,
        "download" => $download,
    );
}

echo json_encode($data);
