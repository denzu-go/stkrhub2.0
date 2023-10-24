<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sqlPinakaProfile = "SELECT * FROM users WHERE user_id = $user_id";
$resultPinaka = $conn->query($sqlPinakaProfile);

$data = array();

while ($fetchedPinaka = $resultPinaka->fetch_assoc()) {
    $username  = $fetchedPinaka['username'];
    $email  = $fetchedPinaka['email'];
    $avatar  = $fetchedPinaka['avatar'];
    $wallet_amount  = $fetchedPinaka['wallet_amount'];
}

$item = '


<div class="row p-2 mb-3 d-flex justify-content-between">
    <div class="col d-flex justify-content-start">
        <div class="row d-flex align-items-center">
            <div class="col">
                iamge
            </div>
            <div class="col">
                <div class="row">username</div>
                <div class="row">Full Name</div>
            </div>
        </div>
    </div>

    <div class="col d-flex justify-content-end">
        <div class="row d-flex align-items-center">
            Wallet
        </div>
    </div>
</div>












';


$data[] = array(
    "item" => $item,
);

echo json_encode($data);
