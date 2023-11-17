<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cancel_order_reason_id = $_POST['cancel_order_reason_id'];
    $unique_order_group_id = $_POST['unique_order_group_id'];
    $user_id = $_POST['user_id'];

    $sqlReason = "SELECT * FROM cancel_order_reasons WHERE cancel_order_reason_id = $cancel_order_reason_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {
        $reason_text = mysqli_real_escape_string($conn, $fetchedReason['reason_text']);
    }

    $conn->begin_transaction();

    try {

        // update orders status lng
        $sqlOrders = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
        $queryOrders = $conn->query($sqlOrders);
        while ($fetchedOrders = $queryOrders->fetch_assoc()) {
            $order_id = $fetchedOrders['order_id'];
            $published_game_id = $fetchedOrders['published_game_id'];
            $built_game_id = $fetchedOrders['built_game_id'];
            $added_component_id = $fetchedOrders['added_component_id'];
            $ticket_id = $fetchedOrders['ticket_id'];
            $quantity = $fetchedOrders['quantity'];
            $price = $fetchedOrders['price'];

            date_default_timezone_set('Asia/Manila');
            $current_datetime = date('Y-m-d H:i:s');

            // Update the orders table
            $sqlUpdateOrders = "UPDATE orders SET is_pending = 0, is_canceled = 1, cancel_order_reason_id = $cancel_order_reason_id, is_canceled_datetime = '$current_datetime' WHERE order_id = $order_id";
            $conn->query($sqlUpdateOrders);

            if ($built_game_id) {
                // Update the is_semi_purchased table
                $sqlUpdateSemiPurchased = "UPDATE built_games SET is_semi_purchased = 0 WHERE built_game_id = $built_game_id";
                $conn->query($sqlUpdateSemiPurchased);
            }
        }

        // update wallet
        $subtotal = 0;
        $sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND user_id = $user_id AND ticket_id IS NULL";
        $queryAll = $conn->query($sqlAll);
        while ($fetched = $queryAll->fetch_assoc()) {
            $quantity = $fetched['quantity'];
            $price = $fetched['price'];

            // Calculate the subtotal for this order and add it to the overall subtotal
            $orderSubtotal = $quantity * $price;
            $subtotal += $orderSubtotal;
        }

        $encoded_subtotal = base64_encode($subtotal);

        $sqlInsertWallet = "INSERT INTO wallet_transactions (user_id, transaction_type, amount, status, unique_order_group_id, published_game_id, cancel_order_reason) 
        VALUES ('$user_id', 'Cancel', '$encoded_subtotal', 'success', '$unique_order_group_id', '$published_game_id', '$reason_text')";

        if ($conn->query($sqlInsertWallet) === TRUE) {
        } else {
            echo "Error: " . $sqlInsertWallet . "<br>" . $conn->error . "<br><br><br><br><br><br><br>";
        }


        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
