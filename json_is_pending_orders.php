<?php

include "connection.php";
$user_id = $_GET['user_id'];

$data = array();

$sqlUniqueOrderDates = "SELECT DISTINCT unique_order_group_id FROM orders WHERE is_pending = 1 AND user_id = $user_id ORDER BY order_date DESC";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $unique_order_group_id = $row['unique_order_group_id'];


    $sqlOrderDetails = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND is_pending = 1 AND user_id = $user_id";
    $queryOrderDetails = $conn->query($sqlOrderDetails);
    while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
        $order_date = $fetchedD['order_date'];
        $formatted_date = date('M. d, Y h:i A', strtotime($order_date));

        $is_pending = $fetchedD['is_pending'];
        $in_production = $fetchedD['in_production'];
        $to_ship = $fetchedD['to_ship'];
        $to_deliver = $fetchedD['to_deliver'];
        $is_received = $fetchedD['is_received'];
        $is_canceled = $fetchedD['is_canceled'];
        $is_completely_canceled = $fetchedD['is_completely_canceled'];
    }

    // status
    if ($is_pending) {
        $status = 'PENDING';
    } elseif ($in_production) {
        $status = 'IN PRODUCTION';
    } elseif ($to_ship) {
        $status = 'TO SHIP';
    } elseif ($to_deliver) {
        $status = 'TO DELIVER';
    } elseif ($is_received) {
        $status = 'RECEIVED';
    } elseif ($is_canceled) {
        $status = 'CANCELED';
    }




    $item = '
            <div class="row">

                <div class="col">
                
                    <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #17172b; padding: 0.1rem;">
                
                        <div class="card-header py-1">
                            <div class="row p-0">
                
                                <div class="col-0 d-flex align-items-center">
                                    <i class="fa-regular fa-calendar-days"></i>&nbsp;' . $formatted_date . '
                                </div>
                
                                <div class="col-0 d-flex align-items-center ml-auto">
                                    <div class="mr-2">Status: ' . $status . '</div>
                                    <div class="mr-2">Order ID: ' . $unique_order_group_id . '</div>
                                </div>
                
                            </div>
                        </div>
                
                        <div class="card-body p-0" style="background-color: #272a4e;">
                            <div class="row d-flex justify-content-between align-items-center ">
                                <div class="col">';

    $subtotal = 0;
    $sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND is_pending = 1 AND user_id = $user_id AND ticket_id IS NULL";
    $queryAll = $conn->query($sqlAll);
    while ($fetched = $queryAll->fetch_assoc()) {
        $order_id = $fetched['order_id'];
        $published_game_id = $fetched['published_game_id'];
        $built_game_id = $fetched['built_game_id'];
        $added_component_id = $fetched['added_component_id'];
        $ticket_id = $fetched['ticket_id'];
        $quantity = $fetched['quantity'];
        $price = $fetched['price'];
        $total_payment = $fetched['total_payment'];

        $paypal_transaction_id = $fetched['paypal_transaction_id'];
        $shipping_discount = $fetched['shipping_discount'];

        // Calculate the subtotal for this order and add it to the overall subtotal
        $orderSubtotal = $quantity * $price;
        $subtotal += $orderSubtotal;

        $order_date = $fetched['order_date'];

        $is_pending = $fetched['is_pending'];
        $in_production = $fetched['in_production'];
        $to_ship = $fetched['to_ship'];
        $to_deliver = $fetched['to_deliver'];
        $is_received = $fetched['is_received'];
        $is_canceled = $fetched['is_canceled'];
        $is_completely_canceled = $fetched['is_completely_canceled'];

        $fullname = $fetched['fullname'];
        $number = $fetched['number'];
        $region = $fetched['region'];
        $province = $fetched['province'];
        $city = $fetched['city'];
        $barangay = $fetched['barangay'];
        $zip = $fetched['zip'];
        $street = $fetched['street'];

        $full_address_value = '
        ' . $street . '  ' . $barangay . '  ' . $city . '  ' . $barangay . '  ' . $province . '  ' . $region . '  ' . $zip . ' 
        ';



        // classification
        if ($published_game_id) {
            $classification = 'Published Game';
        } elseif ($built_game_id) {
            $classification = 'Approved Game';
        } elseif ($added_component_id) {
            $classification = 'Game Component';
        } elseif ($ticket_id) {
            $classification = 'Ticket';
        }

        // title
        if ($published_game_id) {
            $sqlGetTitle = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $fetched_title = $fetchedGetTitle['game_name'];
            }
        } elseif ($built_game_id) {
            $sqlGetTitle = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $fetched_title = $fetchedGetTitle['name'];
            }
        } elseif ($added_component_id) {
            $sqlGetComponentID = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
            $queryGetComponentID = $conn->query($sqlGetComponentID);
            while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
                $fetched_component_id = $fetchedGetComponentID['component_id'];

                $sqlGetTitle = "SELECT * FROM game_components WHERE component_id = $fetched_component_id";
                $queryGetTitle = $conn->query($sqlGetTitle);
                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $fetched_title = $fetchedGetTitle['component_name'];
                    $fetched_category = $fetchedGetTitle['category'];
                    $fetched_size = $fetchedGetTitle['size'];
                }
            }
        } elseif ($ticket_id) {
            $sqlGetTitle = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $fetched_game_id = $fetchedGetTitle['game_id'];

                $getGameName = "SELECT * FROM games WHERE game_id = $fetched_game_id";
                $queryGetName = $conn->query($getGameName);
                while ($fetchedGetTitleA = $queryGetName->fetch_assoc()) {
                    $fetched_title = $fetchedGetTitleA['name'];
                }
            }
        } else {
            $fetched_title = 'Undefined';
        }

        // status
        if ($is_pending) {
            $status = 'PENDING';
        } elseif ($in_production) {
            $status = 'IN PRODUCTION';
        } elseif ($to_ship) {
            $status = 'TO SHIP';
        } elseif ($to_deliver) {
            $status = 'TO DELIVER';
        } elseif ($is_received) {
            $status = 'RECEIVED';
        } elseif ($is_canceled) {
            $status = 'CANCELED';
        }

        // shop_from
        if ($published_game_id) {
            $sqlGetTitle = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            if ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $creator_id = $fetchedGetTitle['creator_id'];
                $sqlGetCreator = "SELECT * FROM users WHERE user_id = $creator_id";
                $queryGetCreator = $conn->query($sqlGetCreator);
                if ($fetchedCreator = $queryGetCreator->fetch_assoc()) {
                    $username = $fetchedCreator['username'];
                }
                $shop_from = $username;
            }
        } elseif ($built_game_id) {
            $shop_from = 'asd';
        } elseif ($added_component_id) {
            $shop_from = 'asd';
        } elseif ($ticket_id) {
            $shop_from = 'asd';
        } else {
            $shop_from = 'asd';
        }

        // description
        if ($published_game_id) {
            $sqlGetTitle = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $category = $fetchedGetTitle['category'];
                $edition = $fetchedGetTitle['edition'];
            }
            $description = '
                                            <span class="text-muted text-truncate" data-toggle="' . $category . '" title="Title" style="max-width:270px;">
                                                Category: 
                                            </span>' . $category . '<br>
                                            <span class="text-muted text-truncate" data-toggle="' . $edition . '" title="Title" style="max-width:270px;">
                                                Edition: 
                                            </span>' . $edition . '
                                            ';
        } elseif ($built_game_id) {
            $sqlGetTitle = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
            $queryGetTitle = $conn->query($sqlGetTitle);
            while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                $desc = $fetchedGetTitle['description'];
            }
            $description = '
                                            <span class="text-muted text-truncate" data-toggle="' . $desc . '" title="Title" style="max-width:270px;">
                                                Category: 
                                            </span>' . $desc . '
                                            ';
        } elseif ($added_component_id) {
            $sqlGetComponentID = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
            $queryGetComponentID = $conn->query($sqlGetComponentID);

            while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
                $fetched_component_id = $fetchedGetComponentID['component_id'];
                $is_custom_design = $fetchedGetComponentID['is_custom_design'];

                $sqlGetTitle = "SELECT * FROM game_components WHERE component_id = $fetched_component_id";
                $queryGetTitle = $conn->query($sqlGetTitle);

                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $fetched_title = $fetchedGetTitle['component_name'];
                    $fetched_category = $fetchedGetTitle['category'];
                    $fetched_size = $fetchedGetTitle['size'];
                }

                $description = '<span class="text-muted text-truncate" data-toggle="' . $fetched_category . '" title="Category" style="max-width:270px;">Category: </span>' . $fetched_category . '<br>';
                $description .= '<span class="text-muted text-truncate" data-toggle="' . $fetched_size . '" title="Size" style="max-width:270px;">Size: </span>' . $fetched_size . ' ';

                if ($is_custom_design) {
                    $custom_design_file_path = "uploads/kids award.docx";
                    $filename = basename($custom_design_file_path);

                    $description .= '<a href="' . $custom_design_file_path . '" download="' . $filename . '"><i class="fa-solid fa-download"></i> ' . $filename . '</a>';
                }
            }
        } elseif ($ticket_id) {
            $sqlGetComponentID = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
            $queryGetComponentID = $conn->query($sqlGetComponentID);
            while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
                $game_id = $fetchedGetComponentID['game_id'];

                $sqlGetTitle = "SELECT * FROM games WHERE game_id = $game_id";
                $queryGetTitle = $conn->query($sqlGetTitle);

                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $name = $fetchedGetTitle['name'];
                }

                $description = '<span class="text-muted text-truncate" data-toggle="' . $game_id . '" title="Title" style="max-width:270px;">Game ID: </span>' . $game_id . ' <br>';
                $description .= '<span class="text-muted text-truncate" data-toggle="' . $name . '" title="Title" style="max-width:270px;">Game Name: </span>' . $name;
            }
        } else {
            $description = '
                                    
                                            ';
        }

        // img_src
        if ($published_game_id) {
            $sqlImgPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryImgPublished = $conn->query($sqlImgPublished);
            while ($fetchedImgPublished = $queryImgPublished->fetch_assoc()) {
                $logo_path = $fetchedImgPublished['logo_path'];
            }
            $img_src = $logo_path;
        } elseif ($built_game_id) {
            $sqlConstantBuiltG = "SELECT * FROM constants WHERE classification = 'thumbnail_built_game'";
            $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
            while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
                $constant_id = $fetchedConstantBuiltG['constant_id'];
                $image_path = $fetchedConstantBuiltG['image_path'];

                $img_src = $image_path;
            }
        } elseif ($added_component_id) {
            $sqlGetComponentId = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
            $queryGetComponentId = $conn->query($sqlGetComponentId);

            if ($queryGetComponentId) {
                $fetchedGetComponent = $queryGetComponentId->fetch_assoc();
                $fetched_component_id = $fetchedGetComponent['component_id'];

                $sqlConstantComponent = "SELECT * FROM component_assets WHERE component_id = $fetched_component_id AND is_thumbnail = 1";
                $queryConstantComponent = $conn->query($sqlConstantComponent);

                if ($queryConstantComponent) {
                    $fetchedConstantComponent = $queryConstantComponent->fetch_assoc();
                    $asset_path = $fetchedConstantComponent['asset_path'];

                    $img_src = $asset_path;
                }
            }
        } elseif ($ticket_id) {
            $sqlConstantBuiltG = "SELECT * FROM constants WHERE classification = 'thumbnail_ticket'";
            $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
            while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
                $constant_id = $fetchedConstantBuiltG['constant_id'];
                $image_path = $fetchedConstantBuiltG['image_path'];

                $img_src = $image_path;
            }
        } else {
            $img_src = '';
        }

        // quantity_input
        $quantity_input = '
        Quantity: ' . $quantity . '
        ';

        // $total_price
        $total_price = $quantity * $price;

        // actions
        if ($is_pending) {
            $action = '
                                            <div class="col text-end">
                                                <a href="#!" class="text-danger small delete-cart-item" data-order_id="' . $order_id . '"><i class="fa-solid fa-ban"></i> Cancel Order</a>
                                            </div>
                                        ';
        } else {
            $action = '';
        }

        if ($paypal_transaction_id === null) {
            $shipping_fee = $total_payment - $subtotal;
        } else {
            $shipping_fee = $total_payment - $subtotal;
        }
        $order_total_amount = $subtotal + $shipping_fee;


        $item .= '
                                    <div class="container p-0 m-0" style="border-bottom: 2px solid #15172e;">

                                        <div class="row">

                                            <div class="col">

                                                <div class="card-body p-0" style="background-color: #272a4e;">
                                                    <div class="row d-flex justify-content-between align-items-center ">

                                                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                                                            <div class="container" style="height: 100%; width: 100%;">
                                                                <div class="image-mini-container mask1">
                                                                    <img class="image-mini" src="' . $img_src . '">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col overflow-hidden">
                                                            <div class="container" style="line-height: 17px;">
                                                                <div class="row mb-1">
                                                                    <span class="lead d-inline-block text-truncate data-toggle="tooltip" title="' . $fetched_title . '"" style="max-width: 500px; color: #e7e7e7">
                                                                        ' . $fetched_title . '
                                                                    </span>
                                                                </div>
                                                                
                                                                <div class="row mb-1">
                                                                    <span class="d-inline-block text-truncate" style="max-width: 500px;">
                                                                        ' . $description . '
                                                                    </span>
                                                                </div>

                                                                <div class="row mb-1">
                                                                    <span class="small d-inline-block text-truncate" style="max-width: 500px;">
                                                                        ' . $classification . '
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3 pr-5">
                                                            <div class="container " style="line-height: 17px;">

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-1" style="">Price: &#8369;' . number_format($price, 2) . '</span>
                                                                </div>

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-1" style="">Quantity: ' . $quantity . '</span>
                                                                </div>

                                                                <div class="row d-flex justify-content-end">
                                                                    <span class="mb-0" style="color: #26d3e0">&#8369;' . number_format($total_price, 2) . '</span>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>              


                                                    </div>
                                                </div>
                                                

                                            </div>

                                        </div>
                                    </div>
                                    ';
    }

    $item .= '
                                </div>
                            </div>
                        </div>

                        <div class="card-footer" style="background: rgb(39, 42, 78);
                        background: linear-gradient(143deg, rgba(39, 42, 78, 1) 0%, rgba(21, 23, 46, 0.7) 100%);">

                            <div class="row">

                                <div class="col d-flex justify-content-start">
                                    <div class="row">
                                        <div class="col-3"><span class="small">' . $fullname . '<br>' . $number . '</span></div>
                                        <div class="col-8"><span class="small">' . $full_address_value . '</span></div>
                                    </div>
                                </div>

                                <div class="col d-flex justify-content-end">

                                    <div class="">
                                        <div class="row d-flex justify-content-end">
                                            <div class="col">
                                                <h6 class="small d-flex justify-content-end">Sub Total:&nbsp; 
                                                    <span class="mb-1" style="color: #26d3e0;">&#8369;' . number_format($subtotal, 2) . '</span>
                                                </h6>
                                            </div>

                                            <div class="col">
                                                <h6 class="small d-flex justify-content-end">Shipping Fee:&nbsp; 
                                                    <span class="mb-1" style="color: #777777;">&#8369;' . number_format($shipping_fee, 2) . '</span>
                                                </h6>
                                            </div>
                                            
                                            <div class="col">
                                                <h6 class="d-flex justify-content-end">Order Total:&nbsp; 
                                                    <span class="mb-1" style="color: #b660e8;">&#8369;' . number_format($order_total_amount, 2) . '</span>
                                                </h6>
                                            </div>
                                        </div>


                                        <div class="row mr-0 d-flex justify-content-end">
                                            <a href="#!" class="" id="cancel_orders" data-unique_order_group_id="' . $unique_order_group_id . '">Cancel</a>
                                            
                                            <a href="profile_order_details.php?unique_order_group_id=' . $unique_order_group_id . '"
                                            class="" id="cancelation_details" data-unique_order_group_id="' . $unique_order_group_id . '">
                                                View Details
                                            </a>
                                        </div>
                                        
                                    </div>
                                    
                    
                                </div>
                            </div>
                        </div>

                        

                    </div>
                
                </div>
            
            </div>
        
        ';



    $data[] = array(
        "item" => $item,
    );
}

echo json_encode($data);