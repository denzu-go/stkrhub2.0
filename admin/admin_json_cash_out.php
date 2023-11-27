<?php
include "connection.php"; // Include your database connection script

$data = array();
$number = 1;

$sql = "SELECT * FROM wallet_transactions WHERE status = 'pending'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $wallet_transaction_id = $row['wallet_transaction_id'];
    $creator_id = $row['user_id'];
    $transaction_type = $row['transaction_type'];
    $amount = (float)base64_decode($row['amount']);
    $transaction_date = $row['transaction_date'];
    $paypal_email_destination  = $row['paypal_email_destination'];
    $cash_out_fee  = $row['cash_out_fee'];

    $sqlGetUser = "SELECT * FROM users WHERE user_id = $creator_id ";
    $queryGetUser = $conn->query($sqlGetUser);
    while($rowNicoleAkoNaLangSana = $queryGetUser->fetch_assoc()){
        $unique_user_id  = $rowNicoleAkoNaLangSana['unique_user_id'];
    }
    

    $actions = '
    <a href="#!" class="text-primary" id="send_money" 
    data-wallet_transaction_id="' . $wallet_transaction_id . '"
    data-creator_id="' . $creator_id . '"
    data-paypal_email_destination="'.$paypal_email_destination.'"
    data-amount="'.$amount.'"
    data-cash_out_fee="'.$cash_out_fee.'"
    >
        Send Money
    </a>
    ';


    $number = $number++;

    $data[] = array(
        "number" => $number,
        "user_id" => $unique_user_id,
        "transaction_type" => $transaction_type,
        "transaction_date" => $transaction_date,
        "amount" => $amount,
        "paypal_email_destination" => $paypal_email_destination,
        "actions" => $actions,
    );
}

echo json_encode($data);
