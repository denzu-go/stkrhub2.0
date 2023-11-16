<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unique_order_group_id = $_POST['unique_order_group_id'];

    $currentDateTime = date('Y-m-d H:i:s');

    $conn->begin_transaction();

    try {
        $sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
        $queryAll = $conn->query($sqlAll);
        while ($fetched = $queryAll->fetch_assoc()) {
            $order_id = $fetched['order_id'];
            $published_game_id = $fetched['published_game_id'];
            $built_game_id = $fetched['built_game_id'];
            $added_component_id = $fetched['added_component_id'];
            $ticket_id = $fetched['ticket_id'];
            $quantity = $fetched['quantity'];
            $price = $fetched['price'];

            if ($ticket_id) {
                $sqlUpdateOrders = "UPDATE orders SET is_received = 1, is_received_datetime = '$currentDateTime' WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            } elseif ($built_game_id) {
                $sqlUpdateOrders = "UPDATE orders SET to_deliver = 0, is_received = 1, is_received_datetime = '$currentDateTime' WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            } elseif ($published_game_id) {
                $sqlUpdateOrders = "UPDATE orders SET to_deliver = 0, is_received = 1, is_received_datetime = '$currentDateTime' WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            } else {
                $sqlUpdateOrders = "UPDATE orders SET to_deliver = 0, is_received = 1, is_received_datetime = '$currentDateTime' WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            }
        }

        $conn->commit();

        $response = ["success" => true, "message" => "Success!"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();
        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}