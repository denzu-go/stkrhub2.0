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

    $sqlUserDetails = "SELECT user_id, SUM(creator_profit * quantity) AS total_creator_profit
                  FROM orders
                  WHERE is_pending != 1 AND is_canceled != 1 AND user_id = $user_id
                  GROUP BY user_id
                  ORDER BY total_creator_profit DESC";
    $resultUserDetails = $conn->query($sqlUserDetails);
    while ($rowUsers = $resultUserDetails->fetch_assoc()) {
        $user_id = $rowUsers['user_id'];
        $totalCreatorProfit = $rowUsers['total_creator_profit'];


        // COMPLETED ORDERSz
        $sqlGetAllOrders = "SELECT user_id, COUNT(*) AS frequency
        FROM orders
        WHERE is_pending != 1 AND is_canceled != 1 AND user_id = $user_id
        GROUP BY user_id
        ORDER BY frequency DESC";
        $resultGetAllOrders = $conn->query($sqlGetAllOrders);

        while ($rowAllOrders = $resultGetAllOrders->fetch_assoc()) {
            $frequencyAllOrders = $rowAllOrders['frequency'];
        }



        // CANCELED ORDERS
        $sqlGetCanceledOrders = "SELECT user_id, COUNT(*) AS frequency_canceled
            FROM orders
            WHERE is_canceled = 1 AND user_id = $user_id
            GROUP BY user_id
            ORDER BY frequency_canceled DESC";

        $resultGetCanceledOrders = $conn->query($sqlGetCanceledOrders);

        if ($resultGetCanceledOrders->num_rows > 0) {
            while ($rowCanceledOrders = $resultGetCanceledOrders->fetch_assoc()) {
                $frequencyCanceledOrders = $rowCanceledOrders['frequency_canceled'];
            }
        } else {
            $frequencyCanceledOrders = 0;
        }




        // PUBLISHED GAMES
        $sqlGetNumberPublished = "SELECT creator_id, COUNT(DISTINCT published_game_id) AS game_count
        FROM published_built_games
        WHERE creator_id = $user_id
        GROUP BY creator_id
        ORDER BY game_count DESC";

        $resultGetNumberPublished = $conn->query($sqlGetNumberPublished);

        if ($resultGetNumberPublished->num_rows > 0) {
            while ($rowGetNumberPublished = $resultGetNumberPublished->fetch_assoc()) {
                $frequencyNumberPublished = $rowGetNumberPublished['game_count'];
            }
        } else {
            $frequencyNumberPublished = 0;
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




        // STATUS
        if ($is_active = 1) {
            $status_value = 'Active';
        } elseif ($is_active != 1) {
            $status_value = 'Inactive';
        }





        $published_games_value = '
        <span>Number of Published Games: ' . $frequencyNumberPublished . '</span><br>
        <span>Published Games IDs: ' . implode(', ', $publishedGameIds) . '</span>
        ';






        
    }

    $number_loop = $number++;

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
