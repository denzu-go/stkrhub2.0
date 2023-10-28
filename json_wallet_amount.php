<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];

$sqlPending = "SELECT COUNT(*) AS count FROM wallet_transactions WHERE status = 'pending' AND user_id = $user_id";
$resultPending = mysqli_query($conn, $sqlPending);

if ($resultPending) {
    $rowPending = mysqli_fetch_assoc($resultPending);
    $count = $rowPending['count'];

    if ($count > 0) {
        $sql = "SELECT amount FROM wallet_transactions WHERE status = 'pending' AND user_id = $user_id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $amount_value = $row['amount'];
            $decoded_amount = base64_decode($amount_value);
            $amount_value = (float) $decoded_amount;
            $amount_peso = '- &#8369;' .number_format($amount_value, 2);
        } else {
            $amount_peso = 'none';
        }
    } else {
        $amount_peso = '<span style="color: #e7e7e7">No Pending Transactions</span>';
    }
}


// pinaka total wallet amount
$queryAdd = "
SELECT SUM(CAST(FROM_BASE64(amount) AS DECIMAL(10, 2))) AS total_amount_add
FROM wallet_transactions
WHERE user_id = '$user_id'
AND (transaction_type = 'Cash In' OR transaction_type = 'Profit' OR transaction_type = 'Cancel');
";
$resultAdd = $conn->query($queryAdd);

if ($resultAdd) {
    $rowAdd = $resultAdd->fetch_assoc();
    $total_amount_add = $rowAdd['total_amount_add'];
}

$querySub = "
SELECT SUM(CAST(FROM_BASE64(amount) AS DECIMAL(10, 2))) AS total_amount_sub
FROM wallet_transactions
WHERE user_id = '$user_id'
AND (transaction_type = 'Pay' OR (transaction_type = 'Cash Out' AND status = 'success'));
";
$resultSub = $conn->query($querySub);

if ($resultSub) {
    $rowSub = $resultSub->fetch_assoc();
    $total_amount_sub = $rowSub['total_amount_sub'];
}

$total_wallet_amount_normalized = $total_amount_add - $total_amount_sub;
// end of pinaka total wallet amount



$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_amount = $fetched['wallet_amount'];

    $item = '

<div class="row pl-4 pr-4 d-flex align-items-center">

    <div class="col-9">
        <div class="row">STKR Wallet Amount: </div>
        <div class="row"><span class="display-3" style="color: #26d3e0;">&#8369;' . number_format($total_wallet_amount_normalized, 2) . '</span></div>
        <div class="row"><h6 class="small" style="color: #777777">Pending: <span style="color: #dc3545">'.$amount_peso.'</span></h6></div>
    </div>

    <div class="col d-flex">
        <div class="container d-flex flex-column align-items-center">
            <div class="row">
                <button class="btn" id="cash_in" style="
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    padding: 0;
                    text-align: center;

                    border: 2px #e7e7e7 solid;
                    
                    background-color: transparent;
                    color: #e7e7e7;
                "><i class="fa-solid fa-circle-dollar-to-slot" style="font-size: 2rem;"></i></button>
            </div>
            
            <div class="row">Cash In</div>
        </div>

        <div class="container d-flex flex-column align-items-center">
            <div class="row">
                <button class="btn btn-outline-primary" id="cash_out"
                    data-current_wallet_balance = "'.$wallet_amount.'"
                    style="
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    padding: 0;
                    text-align: center;

                    border: 2px #e7e7e7 solid;
                    
                    background-color: transparent;
                    color: #e7e7e7;
                "><i class="fa-solid fa-money-bill-transfer" style="font-size: 2rem;"></i></button>
            </div>
            
            <div class="row">Cash Out</div>
        </div>
    </div>

</div>

    ';

    $json[] = array(
        "item" => $item,
    );
}

echo json_encode($json);
