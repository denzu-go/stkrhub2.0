<?php
include 'connection.php';
$order_id = $_POST['order_id'];

$sql = "SELECT ticket_id FROM orders WHERE order_id = $order_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ticket_id = $row['ticket_id'];

    if (!is_null($ticket_id)) {
        $updateSql = "UPDATE orders SET is_pending = 0, is_received = 1 WHERE order_id = $order_id";

        $sqlUpdateTicket = "UPDATE tickets SET is_accepted = 1 WHERE ticket_id = $ticket_id";
        $conn->query($sqlUpdateTicket);

        $sqlGameId = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
        $resultGameId = $conn->query($sqlGameId);
        if ($resultGameId->num_rows > 0) {
            $rowGameId = $resultGameId->fetch_assoc();
            $game_id = $rowGameId['game_id'];

            $sqlUpdateGameTicket = "UPDATE games SET is_purchased = 0, to_approve = 1 WHERE game_id = $game_id";
            $conn->query($sqlUpdateGameTicket);
        }
    } else {
        $updateSql = "UPDATE orders SET is_pending = 0, in_production = 1 WHERE order_id = $order_id";
    }

    if ($conn->query($updateSql) === TRUE) {
        $response = array("status" => "success", "message" => "Order updated successfully");
    } else {
        $response = array("status" => "error", "message" => "Error updating order: " . $conn->error);
    }
} else {
    $response = array("status" => "error", "message" => "Invalid order_id");
}

echo json_encode($response);
