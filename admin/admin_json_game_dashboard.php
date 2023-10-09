<?php
include "connection.php";

$json = array();

$game_id = $_GET['game_id'];
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM added_game_components WHERE game_id = $game_id ORDER BY added_component_id DESC";
$result = $conn->query($sql);

while ($added_game_components = $result->fetch_assoc()) {
    $added_component_id = $added_game_components['added_component_id'];
    $component_id = $added_game_components['component_id'];
    $size = $added_game_components['size'];

    $getAddedComponentName = "SELECT * FROM game_components WHERE component_id = $component_id";
    $sqlGetAddedComponentName = $conn->query($getAddedComponentName);
    $game_components = $sqlGetAddedComponentName->fetch_assoc();

    $component_name = $game_components['component_name'];
    $price = $game_components['price'];
    $category = $game_components['category'];

    $quantity = $added_game_components['quantity'];
    $color_id = $added_game_components['color_id'];
    $custom_design_file_path = $added_game_components['custom_design_file_path'];

    // Extract the original filename without unique ID
    $filenameParts = explode('_', $custom_design_file_path);
    $originalFilename = end($filenameParts);



    $edit_quantity = '
    <input 
        type="number" 
        class="quantity-input" 
        min="1" 
        max="99"
        readonly
        disabled

        data-gameid="' . $game_id . '" 
        data-componentid="' . $added_component_id . '"
        value="' . $quantity . '" 
    >
    ';

    $individual_price = $quantity * $price;

    $individual_price_value = $individual_price;


    $info = "";
    if ($added_game_components['custom_design_file_path']) {
        $info_mahaba = basename($added_game_components['custom_design_file_path']);

        $filenameParts = explode('_', $info_mahaba);
        $originalFilename = end($filenameParts);

        // Create a link to the image file
        $imageFilePath = $added_game_components['custom_design_file_path']; 
        $info = '
        size: '.$size.'<br>
        <a href="../' . $imageFilePath . '" target="_blank" class="d-inline-block text-truncate" style="max-width: 150px;" data-toggle="tooltip" title="'.$originalFilename.'">' . $originalFilename . '</a>
        ';
        
    } elseif ($added_game_components['color_id']) {
        $getColorName = "SELECT * FROM component_colors WHERE color_id = $color_id";
        $sqlGetColorName = $conn->query($getColorName);
        $fetchedColorName = $sqlGetColorName->fetch_assoc();
        $color_name = $fetchedColorName['color_name'];
        $color_code = $fetchedColorName['color_code'];

        $info = '
        size: '.$size.'<br>
        '.$color_name.'
        ';
    } else {
        $info = 'size: '.$size.'<br>';
    }

    $modify = "";
    if ($added_game_components['custom_design_file_path']) {
        $modify = '
            <button
                class="update-design"
                data-gameid="' . $game_id . '"
                data-componentid="' . $added_component_id . '"
                data-componentname="' . $component_name . '"
                data-componentprice="' . $price . '"
                data-componentcategory="' . $category . '"
                data-filepath="' . $custom_design_file_path . '"
                data-originalFilename="' . $originalFilename . '"
                data-addedcomponentid="' . $added_component_id . '"
                style="border: none; background-color: #15172e; color: white; border-radius: 10px; cursor: pointer;"
            >
                Change Design
            </button>
        ';
    } elseif ($added_game_components['color_id']) {
        $getColors = "SELECT * FROM component_colors WHERE component_id = '$component_id'";
        $sqlGetColors = $conn->query($getColors);

        $color_names = array();
        $color_ids = array();

        while ($fetchedColors = $sqlGetColors->fetch_assoc()) {
            $color_ids[] = $fetchedColors['color_id'];
            $color_names[] = $fetchedColors['color_name'];
            $color_codes[] = $fetchedColors['color_code'];
        }

        if (!empty($color_names) && !empty($color_ids)) {
            $buttons = array();

            foreach ($color_names as $index => $color_name) {
                $color_id = $color_ids[$index];
                $color_code = $color_codes[$index];

                $buttons[] = '
                    <button
                        type="button" 
                        class="color-link"
                        data-gameid="' . $game_id . '"
                        data-componentid="' . $component_id . '"
                        data-colorid="' . $color_id . '"
                        data-addedcomponentid="' . $added_component_id . '"
                        style="border: none; background: none; cursor: pointer;"
                    >
                    <i class="fa-solid fa-circle" style="color: ' . $color_code . ';"></i>
                    </button>
                ';
            }

            $modify = implode(" ", $buttons);
        }
    } else {
        $modify = "else";
    }

    $delete = '
    <div class="d-flex justify-content-center">
        <button class="delete-component" 
        data-gameid="' . $game_id . '"
        data-componentid= "' . $added_component_id . '"
        >
            <i class="fa-solid fa-trash"></i>
        </button>
    </div>  
    ';

    $price_peso = '&#8369 '.number_format($price, 2);
    $individual_price_peso = '<span style="color: #26d3e0;">&#8369 '.number_format($individual_price, 2) .'</span>';

    $component_name_value = '<span class="d-inline-block text-truncate" style="color: #26d3e0; max-width: 250px;">'.$component_name .'</span>';


    $json[] = array(
        "added_component_id" => $added_component_id,
        "component_id" => $component_id,
        "component_name" => $component_name_value,
        "price" => $price_peso,
        "individual_price" => $individual_price_peso,
        "category" => $category,
        "edit_quantity" => $edit_quantity,
        "info" => $info,
    );
}



echo json_encode($json);