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

    $zip = new ZipArchive();
    $filename = $unique_order_group_id . '.zip';
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

            $zip->addEmptyDir($order_id);


            if ($published_game_id) {
                // kinuha lng ung built_game_id for published game
                $sqlGetPublishedBuiltGame = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                $queryGetPublishedBuiltGame = $conn->query($sqlGetPublishedBuiltGame);
                while ($fetchedGetPublishedBuiltGame = $queryGetPublishedBuiltGame->fetch_assoc()) {
                    $built_game_id = $fetchedGetPublishedBuiltGame['built_game_id'];
                }

                $sqlGetComponents2 = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
                $queryGetComponents2 = $conn->query($sqlGetComponents2);
                while ($fetchedGetComponents2 = $queryGetComponents2->fetch_assoc()) {
                    $component_id = $fetchedGetComponents2['component_id'];
                    $is_custom_design = $fetchedGetComponents2['is_custom_design'];
                    $custom_design_file_path = $fetchedGetComponents2['custom_design_file_path'];
                    $custom_design_file_path_true = '../' . $custom_design_file_path;
                    $custom_design_file_path_base = basename($custom_design_file_path);

                    // ginet lng ung component name
                    $getComponentInfo = "SELECT * FROM game_components WHERE component_id = $component_id";
                    $queryComponentInfo = $conn->query($getComponentInfo);
                    while ($fetchedComponentInfo = $queryComponentInfo->fetch_assoc()) {
                        $component_name = $fetchedComponentInfo['component_name'];
                        $category = $fetchedComponentInfo['category'];
                    }

                    if (!empty($custom_design_file_path)) {
                        $zip->addFile($custom_design_file_path_true, ''.$order_id.'/'. $custom_design_file_path_base);
                    }
                }
            } elseif ($built_game_id) {

                $sqlGetComponents2 = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
                $queryGetComponents2 = $conn->query($sqlGetComponents2);
                while ($fetchedGetComponents2 = $queryGetComponents2->fetch_assoc()) {
                    $component_id = $fetchedGetComponents2['component_id'];
                    $is_custom_design = $fetchedGetComponents2['is_custom_design'];
                    $custom_design_file_path = $fetchedGetComponents2['custom_design_file_path'];
                    $custom_design_file_path_true = '../' . $custom_design_file_path;
                    $custom_design_file_path_base = basename($custom_design_file_path);

                    // ginet lng ung component name
                    $getComponentInfo = "SELECT * FROM game_components WHERE component_id = $component_id";
                    $queryComponentInfo = $conn->query($getComponentInfo);
                    while ($fetchedComponentInfo = $queryComponentInfo->fetch_assoc()) {
                        $component_name = $fetchedComponentInfo['component_name'];
                        $category = $fetchedComponentInfo['category'];
                    }

                    if (!empty($custom_design_file_path)) {
                        $zip->addFile($custom_design_file_path_true, ''.$order_id.'/'. $custom_design_file_path_base);
                    }
                }
            }


            

            $download = '
            <a href="' . $filename . '" download>Download Zip</a>
        ';
        }
    }

    $zip->close();



    $creator = $user_id;
    $status = 'status';
    $date = 'date';


    $view_order_button = '<button class="btn p-0 m-0" id="view_order" data-unique_order_group_id="' . $unique_order_group_id . '">View Order</button>';
    $proceed_order_button = '<button class="btn p-0 m-0" id="proceed_order" data-unique_order_group_id="' . $unique_order_group_id . '">Proceed Order</button>';


    $actions = '
    <div class="row p-0 m-0">
        <div class="col p-0 m-0">
            ' . $view_order_button . '
        </div>

        <div class="col p-0 m-0">
            ' . $download . '
        </div>

        <div class="col p-0 m-0">
            ' . $proceed_order_button . '
        </div>

    </div>

    ';





    $data[] = array(
        "unique_order_group_id" => $unique_order_group_id,
        "creator" => $creator,
        "status" => $status,
        "date" => $date,
        "actions" => $actions,
        "download" => $download,
    );
}

echo json_encode($data);
