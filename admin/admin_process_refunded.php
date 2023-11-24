<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wallet_transaction_id = $_POST['wallet_transaction_id'];
    $creator_id = $_POST['creator_id'];
    $paypal_email_destination = $_POST["paypal_email_destination"];
    $amount = $_POST["amount"];
    $cash_out_fee = $_POST["cash_out_fee"];

    $minus_amount = $amount + $cash_out_fee;

    $conn->begin_transaction();

    try {

        $sqlInsertWallet = "UPDATE wallet_transactions SET status = 'success', paypal_email_destination = '$paypal_email_destination', cash_out_timestamp = NOW() WHERE wallet_transaction_id = $wallet_transaction_id";
        $queryInsertWallet = $conn->query($sqlInsertWallet);

        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
        echo json_encode($response);
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    $response = ["success" => true, "message" => "Success"];
    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
