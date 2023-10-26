<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unique_order_group_id = $_POST['unique_order_group_id'];

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
                // Update the orders table
                $sqlUpdateOrders = "UPDATE orders SET is_received = 1 WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            } elseif ($built_game_id) {
                // Update the orders table
                $sqlUpdateOrders = "UPDATE orders SET is_pending = 0, in_production = 1 WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);

                $sqlUpdateBuiltGame = "UPDATE built_games SET is_semi_purchased = 0, is_purchased = 1 WHERE built_game_id = $built_game_id";
                $queryUpdateBuiltGame = $conn->query($sqlUpdateBuiltGame);
            } elseif ($published_game_id) {
                $sqlUpdateOrders = "UPDATE orders SET is_pending = 0, in_production = 1 WHERE order_id = $order_id";
                if ($conn->query($sqlUpdateOrders) === TRUE) {
                    // Successfully updated orders table

                    // Retrieve creator information
                    $sqlPublishD = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                    $queryPD = $conn->query($sqlPublishD);

                    if ($queryPD->num_rows > 0) {
                        $fetchedPD = $queryPD->fetch_assoc();
                        $creator_id = $fetchedPD['creator_id'];
                        $creator_profit = $fetchedPD['creator_profit'];

                        $total_creator_profit = $creator_profit * $quantity;

                        // Encode the creator profit
                        $encoded_total_creator_profit = base64_encode($total_creator_profit);

                        // Insert a profit transaction into the wallet_transactions table
                        $sqlInsertWallet = "INSERT INTO wallet_transactions (user_id, transaction_type, amount, status, published_game_id) 
                        VALUES ('$creator_id', 'Profit', '$encoded_total_creator_profit', 'success', '$published_game_id')";

                        if ($conn->query($sqlInsertWallet) === TRUE) {
                        }
                    }
                }
            } else {
                // Update the orders table
                $sqlUpdateOrders = "UPDATE orders SET is_pending = 0, in_production = 1 WHERE order_id = $order_id";
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