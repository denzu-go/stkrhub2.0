<?php

include "connection.php";
$unique_order_group_id = $_GET['unique_order_group_id'];
$passed_status = $_GET['passed_status'];

$data = array();


$sqlOrderDetails = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND $passed_status = 1";
$queryOrderDetails = $conn->query($sqlOrderDetails);
while ($fetchedD = $queryOrderDetails->fetch_assoc()) {
    $order_date = $fetchedD['order_date'];
    $formatted_date = date('M. d, Y h:i A', strtotime($order_date));

    $published_game_id = $fetchedD['published_game_id'];
    $built_game_id = $fetchedD['built_game_id'];
    $added_component_id = $fetchedD['added_component_id'];

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
$sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id AND $passed_status = 1 AND ticket_id IS NULL";
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
        $status = 'Pending';
    } elseif ($in_production) {
        $status = 'In Production';
    } elseif ($to_ship) {
        $status = 'To Ship';
    } elseif ($to_deliver) {
        $status = 'To Deliver';
    } elseif ($is_received) {
        $status = 'Received';
    } elseif ($is_canceled) {
        $status = 'Canceled';
    } elseif ($is_completely_canceled) {
        $status = 'Refunded';
    } else {
        $status = 'Undefined';
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
                                            Description: 
                                        </span>' . $desc . '
                                        ';
    } elseif ($added_component_id) {
        $sqlGetComponentID = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
        $queryGetComponentID = $conn->query($sqlGetComponentID);

        while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
            $fetched_component_id = $fetchedGetComponentID['component_id'];
            $is_custom_design = $fetchedGetComponentID['is_custom_design'];
            $custom_design_file_path = $fetchedGetComponentID['custom_design_file_path'];

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



    $component_list = '
    <table id="sampleTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Component Name</th>
                <th>Category</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>';

    // kinuha lng ung built_game_id if wala
    if ($published_game_id) {
        $sqlGetComponents = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
        $queryGetComponents = $conn->query($sqlGetComponents);
        while ($fetchedGetComponents = $queryGetComponents->fetch_assoc()) {
            $built_game_id = $fetchedGetComponents['built_game_id'];
        }
        $from = 'built_games_added_game_components';
        $where = 'built_game_id';
        $where_id = $built_game_id;
    } elseif ($built_game_id) {
        $from = 'built_games_added_game_components';
        $where = 'built_game_id';
        $where_id = $built_game_id;
    } elseif ($added_component_id) {
        $from = 'added_game_components';
        $where = 'added_component_id';
        $where_id = $added_component_id;
    } else {
        $from = 'built_games_added_game_components';
        $where = 'built_game_id';
        $where_id = $built_game_id;
    }


    $sqlGetComponents2 = "SELECT * FROM $from WHERE $where = $where_id";
    $queryGetComponents2 = $conn->query($sqlGetComponents2);
    while ($fetchedGetComponents2 = $queryGetComponents2->fetch_assoc()) {
        $component_id = $fetchedGetComponents2['component_id'];
        $is_custom_design = $fetchedGetComponents2['is_custom_design'];

        $custom_design_file_path = $fetchedGetComponents2['custom_design_file_path'];
        $custom_design_file_path_base = basename($custom_design_file_path);

        $quantity = $fetchedGetComponents2['quantity'];
        $color_id = $fetchedGetComponents2['color_id'];
        $size = $fetchedGetComponents2['size'];

        // ginet lng ung component name
        $getComponentInfo = "SELECT * FROM game_components WHERE component_id = $component_id";
        $queryComponentInfo = $conn->query($getComponentInfo);
        while ($fetchedComponentInfo = $queryComponentInfo->fetch_assoc()) {
            $component_name = $fetchedComponentInfo['component_name'];
            $category = $fetchedComponentInfo['category'];
        }

        // ginet lng ung color
        $color_name = 'N/A';
        $getComponentColors = "SELECT * FROM component_colors WHERE component_id = $component_id";
        $queryComponentColors = $conn->query($getComponentColors);
        while ($fetchedComponentColors = $queryComponentColors->fetch_assoc()) {
            $color_name = $fetchedComponentColors['color_name'];
            $color_code = $fetchedComponentColors['color_code'];
        }

        $info = '
            <div class="row"><a href="!#" download="' . $custom_design_file_path_base . '">' . $custom_design_file_path_base . '</a></div>
            <div class="row">Color: ' . $color_name . '</div>
            <div class="row">Size: ' . $size . '</div>
            ';

        $component_list .= '
                <tr>
                    <td>' . $component_name . '</td>
                    <td>' . $category . '</td>
                    <td>' . $size . '</td>
                    <td>' . $quantity . '</td>
                    <td>' . $info . '</td>
                </tr>
            ';
    }

    $component_list .= '
        </tbody>
    </table>
    ';


    //accordion
    if ($added_component_id) {
        $accordion = '
                
        ';
    } else {
        $accordion = '
        <div class="row p-0 m-0">
            <div class="col">

                <div class="container">
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header p-0 m-0" id="headingOne">
                                <span class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne' . $order_id . '" aria-expanded="false" aria-controls="collapseOne' . $order_id . '">
                                        View Components
                                    </button>
                                </span>
                            </div>
            
                            <div id="collapseOne' . $order_id . '" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    ' . $component_list . '
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
                                <div class="container p-0 m-0" style="border-bottom: 2px solid #15172e;">

                                    <div class="row">

                                        <div class="col">
                                            <div class="card-body p-0" style="background-color: #272a4e;">
                                                <div class="row d-flex justify-content-between align-items-center p-2">

                                                    <div class="col overflow-hidden">
                                                        <div class="container" style="line-height: 17px;">
                                                            <div class="row mb-1">
                                                                <span class=" d-inline-block text-truncate data-toggle="tooltip" title="' . $fetched_title . '"" style="max-width: 500px; color: #e7e7e7">
                                                                    ' . $classification . '
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col overflow-hidden">
                                                        <div class="container" style="line-height: 17px;">
                                                            <div class="row mb-1">
                                                                Name: &nbsp; <span class=" d-inline-block text-truncate data-toggle="tooltip" title="' . $fetched_title . '"" style="max-width: 500px; color: #e7e7e7">' . $fetched_title . '</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col overflow-hidden">
                                                        <div class="container" style="line-height: 17px;">
                                                            
                                                            <div class="row mb-1">
                                                                <span class="d-inline-block text-truncate" style="max-width: 500px;">
                                                                    ' . $description . '
                                                                </span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="container " style="line-height: 17px;">

                                                            <div class="row d-flex justify-content-end">
                                                                <span class="mb-1" style="">Unit Price: &#8369;' . number_format($price, 2) . '</span>
                                                            </div>

                                                            <div class="row d-flex justify-content-end">
                                                                <span class="mb-1" style="">Quantity: ' . $quantity . '</span>
                                                            </div>

                                                            <div class="row d-flex justify-content-end">
                                                                Total Price:  &nbsp;
                                                                <span class="mb-0" style="color: #26d3e0">&#8369;' . number_format($total_price, 2) . '</span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>              


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-0">
                                        <div class="col p-0">
                                        ' . $accordion . '
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

                                    <div class="row mr-0 d-flex justify-content-end">';




$item .= '
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


echo json_encode($data);
