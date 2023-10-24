<?php

include('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $wallet_transaction_id = $_POST['walletTransactionId'];
    $paypal_email_destination = $_POST['paypalEmail'];

    $sql = "UPDATE wallet_transactions SET paypal_email_destination = '$paypal_email_destination' WHERE wallet_transaction_id = $wallet_transaction_id";

    if ($conn->query($sql) === TRUE) {
        echo "PayPal destination email updated successfully.";
    } else {
        // Update failed
        echo "Failed to update PayPal destination email: " . $conn->error;
    }
}
