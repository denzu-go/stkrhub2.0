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
        $sql = "SELECT amount FROM wallet_transactions WHERE status = 'pending' ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $amount_value = $row['amount'];
        } else {
            // Handle the case where the second query fails
        }
    } else {
        $amount_value = 'none';
    }
}

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_amount = $fetched['wallet_amount'];

    $item = '

<div class="row p-4 d-flex align-items-center">

    <div class="col-9">
        <div class="row"><span class="display-3" style="color: #26d3e0;">&#8369;' . number_format($wallet_amount, 2) . '</span></div>
        <div class="row"><h6 style="color: #777777">Pending: <span style="color: #e7e7e7"></span></h6></div>
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
                <button class="btn btn-outline-primary" id="cash_in" style="
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
