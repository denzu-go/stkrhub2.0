<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];




$sql1A = "SELECT COUNT(*) as total FROM cart WHERE user_id = $user_id AND is_visible = 1";
$result1A = $conn->query($sql1A);
$row1A = $result1A->fetch_assoc();

$totalRowsA = $row1A['total'];

if ($totalRowsA > 0) {
    

$item = '
';

$item .=
    '
    <div class="row" style="padding-bottom:20px;">
        <div class="col-0 d-flex align-items-center">';

$sql1 = "SELECT COUNT(*) as total FROM cart WHERE user_id = $user_id AND is_visible = 1";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$totalRows = $row1['total'];

if ($totalRows > 0) {
    // Check if all cart_ids for this user have is_active set to 1
    $sqlActiveCount = "SELECT COUNT(*) as active_count FROM cart WHERE user_id = $user_id AND is_visible = 1 AND is_active = 1";
    $resultActiveCount = $conn->query($sqlActiveCount);
    $rowActiveCount = $resultActiveCount->fetch_assoc();

    $activeCount = $rowActiveCount['active_count'];

    if ($activeCount == $totalRows) {
        $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;" checked>';
    } else {
        $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;">';
    }
} else {
    $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;">';
}
$item .=
    '
        </div>

        <div class="col">

            <div class="card rounded-3 mb-0 p-0" style="background-color: #17172b; padding: 0.1rem;">

                <div class="card-body p-0" style="background-color: #272a4e;">
                    <div class="row d-flex justify-content-between align-items-center p-2">


                        <div class="col-3">
                            Product
                        </div>

                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">

                        </div>

                        <div class="col">
                            Unit Price
                        </div>

                        <div class="col-2">
                            Quantity
                        </div>

                        <div class="col">
                            Total
                        </div>

                        <div class="col-md-1">
                            Actions
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    ';






// main part

$sql = "SELECT c.*, gc.price AS game_component_price, gc.is_available
        FROM cart AS c
        LEFT JOIN added_game_components AS agc ON c.added_component_id = agc.added_component_id
        LEFT JOIN game_components AS gc ON agc.component_id = gc.component_id
        WHERE c.user_id = $user_id AND c.is_visible = 1
        ORDER BY c.cart_id DESC";

$result = $conn->query($sql);

while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $added_component_id = $fetched['added_component_id'];
    $ticket_id = $fetched['ticket_id'];
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $is_active = $fetched['is_active'];
    $is_available = $fetched['is_available'];
    
    $is_only_one_quantity = $fetched['is_only_one_quantity'];

    $total_price = $quantity * $price;

    // checkbox
    if ($is_active) {
        $checked = 'checked';
    } else {
        $checked = '';
    }

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
        <span class="text-muted text-truncate" data-toggle="' . $category . '" title="" style="max-width:270px;">
            Category: 
        </span>' . $category . '<br>
        <span class="text-muted text-truncate" data-toggle="' . $edition . '" title="" style="max-width:270px;">
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
        <span class="text-muted text-truncate" data-toggle="' . $desc . '" title="" style="max-width:270px;">
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

            $description = '<span class="text-muted text-truncate" data-toggle="' . $game_id . '" title="Game ID" style="max-width:270px;">Game ID: </span>' . $game_id . ' <br>';
            $description .= '<span class="text-muted text-truncate" data-toggle="' . $name . '" title="Game Name" style="max-width:270px;">Game Name: </span>' . $name;
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
                // $asset_path = $fetchedConstantComponent['asset_path'];
                $asset_path = $fetchedConstantComponent['asset_path'] ?? 'default_path.jpg';

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
    if ($ticket_id) {
        $quantity_input = '
        <input min="1" max="99" data-cart_id="' . $cart_id . '" value="' . $quantity . '" type="number" class="form-control form-control-sm col-5" id="quantity_input" disabled data-toggle="tooltip" title="You need only 1 ticket per game" 
        style="border: 0px; margin: 0px; cursor: not-allowed"
        />
        ';
    } elseif ($built_game_id && $is_only_one_quantity) {
        $quantity_input = '
        <input min="1" max="99" data-cart_id="' . $cart_id . '" value="' . $quantity . '" type="number" class="form-control form-control-sm col-5" id="quantity_input" disabled data-toggle="tooltip" title="You need to buy it once before you can buy it bulk" 
        style="border: 0px; margin: 0px; cursor: not-allowed"
        />
        ';
    } else {
        $quantity_input = '
            <input min="1" max="99" data-cart_id="' . $cart_id . '" value="' . $quantity . '" type="number" class="form-control form-control-sm col-5" id="quantity_input"
            style="border: 0px; margin: 0px;"/>
        ';
    }

    // $total_price
    $total_price = $quantity * $price;






            // item

  if ($is_available == 0 && is_null($published_game_id)) {

            $item .= '

    <div class="row">

        <div class="col-0 d-flex align-items-center">
            
        </div>

        <div class="col">

            <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #17172b; padding: 0.1rem;">

                <div class="card-header py-1">
                    <div class="row p-0">

                        <div class="col-0 d-flex align-items-center">
                            ' . $classification . '
                        </div>
                        <div class="col-0 d-flex align-items-center">
                           <p style="color:red; margin-top:10px;margin-left:20px;"> Unavailable </p>
                        </div>
                        <div class="col-0 d-flex align-items-center ml-auto">
                            <div class="mr-2">Cart ID: ' . $cart_id . '</div>
                        </div>

                    </div>
                </div>

                <div class="card-body p-0" style="background-color: #272a4e;">
                    <div class="row d-flex justify-content-between align-items-center ">

                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                            <div class="container" style="height: 100%; width: 100%;">
                                <div class="image-mini-container mask1">
                                    <img class="image-mini" src="' . $img_src . '">
                                </div>
                            </div>
                        </div>

                        <div class="col-3 overflow-hidden">
                            <p class="lead fw-normal mb-2 text-truncate" data-toggle="tooltip" title="' . $fetched_title . '" style="max-width:270px;">
                                ' . $fetched_title . '
                            </p>
                                ' . $description . '
                        </div>

                        <div class="col">
                            <h5 class="mb-0">&#8369; ' . number_format($price, 2) . '</h5>
                        </div>

                        <div class="col-2">
                            ' . $quantity_input . '
                        </div>

                        <div class="col">
                            <h5 class="mb-0" style="color: #26d3e0">&#8369; ' . number_format($total_price, 2) . '</h5>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                           
                            <a href="#!" class="text-danger delete-cart-item" data-cart_id="' . $cart_id . '"><i class="fas fa-trash fa-lg"></i></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


    

    ';
        }  else{
            
                        // item

            $item .= '

    <div class="row">

        <div class="col-0 d-flex align-items-center">
            <input type="checkbox" style="transform: scale(1.7); margin-right: none;"
            value="" 
            data-cart_id="' . $cart_id . '"
            id="checkbox-active" ' . $checked . '>
        </div>

        <div class="col">

            <div class="card rounded-3 mb-4 p-0 custom-shadow" style="background-color: #17172b; padding: 0.1rem;">

                <div class="card-header py-1">
                    <div class="row p-0">

                        <div class="col-0 d-flex align-items-center">
                            ' . $classification . '
                        </div>

                        <div class="col-0 d-flex align-items-center ml-auto">
                            <div class="mr-2">Cart ID: ' . $cart_id . '</div>
                        </div>

                    </div>
                </div>

                <div class="card-body p-0" style="background-color: #272a4e;">
                    <div class="row d-flex justify-content-between align-items-center ">

                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                            <div class="container" style="height: 100%; width: 100%;">
                                <div class="image-mini-container mask1">
                                    <img class="image-mini" src="' . $img_src . '">
                                </div>
                            </div>
                        </div>

                        <div class="col-3 overflow-hidden">
                            <p class="lead fw-normal mb-2 text-truncate" data-toggle="tooltip" title="' . $fetched_title . '" style="max-width:270px;">
                                ' . $fetched_title . '
                            </p>
                                ' . $description . '
                        </div>

                        <div class="col">
                            <h5 class="mb-0">&#8369; ' . number_format($price, 2) . '</h5>
                        </div>

                        <div class="col-2">
                            ' . $quantity_input . '
                        </div>

                        <div class="col">
                            <h5 class="mb-0" style="color: #26d3e0">&#8369; ' . number_format($total_price, 2) . '</h5>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                           
                            <a href="#!" class="text-danger delete-cart-item" data-cart_id="' . $cart_id . '"><i class="fas fa-trash fa-lg"></i></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


    

    ';
        }
        
    };










// lower part
$sqlA = "SELECT * FROM cart WHERE user_id = $user_id AND is_active = 1 AND is_visible !=0";
$resultA = $conn->query($sqlA);

$sub_total = 0; // Move the subtotal calculation outside the loop

while ($fetchedA = $resultA->fetch_assoc()) {
    $cart_id = $fetchedA['cart_id'];
    $published_game_id = $fetchedA['published_game_id'];
    $built_game_id = $fetchedA['built_game_id'];
    $added_component_id = $fetchedA['added_component_id'];
    $quantity = $fetchedA['quantity'];
    $price = $fetchedA['price'];
    $is_active = $fetchedA['is_active'];

    // Calculate the subtotal for each item and accumulate it
    $sub_total += $price * $quantity;
}

$item .= '
<div
style="position: sticky;
bottom: 0;

border-radius: 15px 15px 0px 0px;
box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.5);

background: rgba(21, 23, 46, 0.77);

backdrop-filter: blur(5.7px);
-webkit-backdrop-filter: blur(5.7px);
">

    <div class="d-flex justify-content-between">
        <div class="row m-4">';



        if ($totalRows > 0) {
            // Check if all cart_ids for this user have is_active set to 1
            $sqlActiveCount = "SELECT COUNT(*) as active_count FROM cart WHERE user_id = $user_id AND is_visible = 1 AND is_active = 1";
            $resultActiveCount = $conn->query($sqlActiveCount);
            $rowActiveCount = $resultActiveCount->fetch_assoc();
        
            $activeCount = $rowActiveCount['active_count'];
        
            if ($activeCount == $totalRows) {
                $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;" checked>';
            } else {
                $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;">';
            }
        } else {
            $item .= '<input id="select_all" type="checkbox" style="transform: scale(1.7); margin-right: none;">';
        }

            



            $item .='
            <button style="background: transparent !important; border: none; color: white;">Select All</button>
            <button class="delete-selected ml-4" style="background-color: transparent !important;
            border: none;
            cursor: pointer;
            color: #dc3545;"><i class="fa-solid fa-trash"></i>Delete Selected</button>
        </div>
        

        <div class="row m-4">
            <span>Amount to Pay: </span><h3 style="color: #26d3e0;">&nbsp; &#8369;' . number_format($sub_total, 2) . '</h3>

            <button  class="btn purchase-selected ml-4" 
            style="color: #ffffff; width:7rem; border: none; background: linear-gradient(144deg, #26d3e0, #b660e8); cursor: pointer;"
            data-toggle="tooltip" title="Purchase using Paypal">
                Purchase
            </button>
        </div>

        
    </div>

</div>

';

} else {
    $item = '
    <br><br><br><br><br><br><br>
    <div class="container d-flex align-items-center justify-content-center">
        <i class="fa-solid fa-cart-shopping text-center" style="font-size: 44px;"></i>
    </div>

    <div class="container d-flex align-items-center justify-content-center">    
        <h5 class="text-center">Your cart is empty</h5>
    </div>
    ';
}




$json[] = array(
    "item" => $item,
);


echo json_encode($json);
