<?php
include "connection.php";

$json = array();

$user_id = $_POST['user_id'];
$selectedCartIds = $_POST['selectedCartIds'];

$numSelectedCarts = count($selectedCartIds);

$selectedCartIdsString = implode(',', $selectedCartIds);


$sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_id IN ($selectedCartIdsString) AND is_visible = 1";
$result = $conn->query($sql);

$sub_total = 0;
while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $added_component_id = $fetched['added_component_id'];
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $is_active = $fetched['is_active'];

    (int)$sub_total += $price * $quantity;
}


$sqlGetActive = "SELECT * FROM addresses WHERE is_default = 1 AND user_id = $user_id";
$queryGetActive = $conn->query($sqlGetActive);
while ($fetchedActive = $queryGetActive->fetch_assoc()) {
    $address_id = $fetchedActive['address_id'];
    $fullname = $fetchedActive['fullname'];
    $number = $fetchedActive['number'];
    $region = $fetchedActive['region'];
    $province = $fetchedActive['province'];
    $city = $fetchedActive['city'];
    $barangay = $fetchedActive['barangay'];
    $zip = $fetchedActive['zip'];
    $street = $fetchedActive['street'];


    // Initialize $destination_id with a default value
    $destination_id = 0;

    // Check if the inner query has any results before entering the nested loop
    $sqlCheckDestination = "SELECT * FROM destination_rates WHERE destination_name = '$region'";
    $queryCheckDestination = $conn->query($sqlCheckDestination);
    if ($queryCheckDestination->num_rows > 0) {
        // Fetch the results from the inner query
        $fetchedDestination = $queryCheckDestination->fetch_assoc();

        $destination_id = $fetchedDestination['destination_id'];
        $weight_price_1 = $fetchedDestination['weight_price_1'];
        $weight_price_2 = $fetchedDestination['weight_price_2'];
        $weight_price_3 = $fetchedDestination['weight_price_3'];
        $weight_price_4 = $fetchedDestination['weight_price_4'];
        $weight_price_5 = $fetchedDestination['weight_price_5'];
    }

    $numSelectedCarts = count($selectedCartIds);
    // Initialize variables
    $weight_price = 0;

    if ($numSelectedCarts >= 1 && $numSelectedCarts <= 10) {
        $weight_price = (float)$weight_price_1;
    } elseif ($numSelectedCarts >= 11 && $numSelectedCarts <= 20) {
        $weight_price = (float)$weight_price_2;
    } elseif ($numSelectedCarts >= 21 && $numSelectedCarts <= 30) {
        $weight_price = (float)$weight_price_3;
    } elseif ($numSelectedCarts >= 31 && $numSelectedCarts <= 40) {
        $weight_price = (float)$weight_price_4;
    } elseif ($numSelectedCarts >= 41) {
        $weight_price = (float)$weight_price_5;
    }


    // check if only ticket sa cart shipping 0
    if ($numSelectedCarts === 1) {
        $oneCartId = $selectedCartIds[0];
        $sqlCheckTicket = "SELECT * FROM cart WHERE cart_id = '$oneCartId'";
        if ($resultCheckTicket = mysqli_query($conn, $sqlCheckTicket)) {
            if (mysqli_num_rows($resultCheckTicket) > 0) {
                $rowCheckTicket = mysqli_fetch_assoc($resultCheckTicket);
                $ticket_id = $rowCheckTicket['ticket_id'];
                if($ticket_id){
                    $weight_price = 0;
                }
            }
        }
    }


    $total_payment = ($sub_total + $weight_price);;
}



$item = '

        <div class="card m-0 p-2" 
        style="
        background: rgba(39, 42, 78, 0.37);
        border-radius: 15px 15px 15px 15px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5.7px);
        -webkit-backdrop-filter: blur(5.7px);
        ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="">Subtotal:</p>
                    </div>

                    <div class="col">
                        <span style="color: #b660e8"> &#8369;' . number_format($sub_total, 2) . '</span>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col">
                        <p class="">Shipping Total:</p>
                    </div>  

                    <div class="col">
                        <span> &#8369;' . number_format($weight_price, 2) . '</span>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col">
                        <p class="">Total Payment:</p>
                    </div>

                    <div class="col lead">
                        <span style="color: #26d3e0;"> &#8369;' . number_format($total_payment, 2) . '</span>
                    </div>
                </div>

                <label class="row d-flex justify-content-center">
                    <input id="paypal_checkbox" name="stkr_wallet_checkbox" type="checkbox" /> 
                    &nbsp; I agree to these &nbsp;<a role="button" id="termsAndCondi" style = "color:aquamarine; cursor:pointer;">Terms and Conditions</a>
                </label>

                <div class="row">
                    <div id="paypal-payment-button"
                    data-paypal_payment="' . $total_payment . '"
                    data-fullname="' . $fullname . '"
                    data-number="' . $number . '"
                    data-region="' . $region . '"
                    data-province="' . $province . '"
                    data-city="' . $city . '"
                    data-barangay="' . $barangay . '"
                    data-zip="' . $zip . '"
                    data-street="' . $street . '"
                    data-carts_selected="' . implode(',', $selectedCartIds) . '"
                    style="width: 100%;"
                    ></div>
                </div>
            </div>
        </div>
';




$item .= '
';

$json[] = array(
    "item" => $item,
);


echo json_encode($json);
