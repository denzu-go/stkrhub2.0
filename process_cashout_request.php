<?php
include "connection.php";

$user_id = $_GET['user_id'];
echo $user_id;

$sql = "DELETE FROM wallet_transactions WHERE user_id = $user_id AND transaction_type = 'Cash Out'";

if (mysqli_query($conn, $sql)) {
    echo 'success';
} else {
    echo 'error';
}
