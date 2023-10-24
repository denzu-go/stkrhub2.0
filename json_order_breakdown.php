<?php
include "connection.php";
$json = array();

$user_id = $_GET['user_id'];
$unique_order_group_id = $_GET['unique_order_group_id'];

$subtotal = 0;
$quantitySubtotal = 0;
$priceSubtotal = 0;
$sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND user_id = $user_id AND ticket_id IS NULL ORDER BY order_date DESC";
$queryAll = $conn->query($sqlAll);
while ($fetched = $queryAll->fetch_assoc()) {
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $total_payment = $fetched['total_payment'];

    $orderSubtotal = $quantity * $price;
    $subtotal += $orderSubtotal;

    $paypal_transaction_id = $fetched['paypal_transaction_id'];
    $shipping_discount = $fetched['shipping_discount'];
}

if ($paypal_transaction_id === null) {
    $payment_method = 'STKR Wallet';
    $shipping_fee = $total_payment - $subtotal;
} else {
    $payment_method = 'Paypal';
    $shipping_fee = $total_payment - $subtotal;
}

$order_total_amount = $subtotal + $shipping_fee;



$item = '

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Subtotal
    </div>

    <div class="col-3 d-flex justify-content-end">
        <span class="mb-1" style="color: #26d3e0;">&#8369;' . number_format($subtotal, 2) . '</span>
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Shipping Discount
    </div>

    <div class="col-3 d-flex justify-content-end">
        <span class="mb-1" style="color: ;">- &#8369;' . number_format($shipping_discount, 2) . '</span>
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Shipping Fee
    </div>

    <div class="col-3 d-flex justify-content-end">
        <span class="mb-1" style="color: ;">&#8369;' . number_format($shipping_fee, 2) . '</span>
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Payment Method
    </div>

    <div class="col-3 d-flex justify-content-end">
        ' . $payment_method . '
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Order Total
    </div>

    <div class="col-3 d-flex justify-content-end">
        <h4>
            <span class="mb-1" style="color: #b660e8;">&#8369;' . number_format($order_total_amount, 2) . '</span>
        </h4>
    </div>
</div>

';


$json[] = array(
    "item" => $item,
);

echo json_encode($json);
