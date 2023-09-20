<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_with_colors'])) {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $component_id = $_POST['component_id'];
    $component_name = $_POST['component_name'];
    $component_price = $_POST['component_price'];
    $component_category = $_POST['component_category'];
    $selected_size = $_POST['selected_size'];
    $selected_color_id = $_POST['selected_color'];
    $quantity = $_POST['quantity']; // Include quantity

    // Check if game_id exists (it's part of a game) or not
    if ($game_id !== '') {

        // // Echo the values passed from the previous page
        echo "Game ID: " . $game_id . "<br>";
        echo "Component ID: " . $component_id . "<br>";
        echo "Selected Size: " . $selected_size . "<br>";
        echo "Quantity: " . $quantity . "<br>";

        // Insert the new component into the added_game_components table
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, quantity, size, user_id) 
        VALUES ('$game_id', '$component_id', '$selected_color_id', '$quantity', '$selected_size', '$user_id')";


        if (mysqli_query($conn, $insert_query)) {
            // Redirect back to the game dashboard after successful addition
            header("Location: game_dashboard.php?game_id=$game_id");
            exit;
        } else {
            // Handle the error if the insert fails
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            exit;
        }

    } else {
        echo "It is a single game component.<br>";

        echo $quantity;
        echo $component_id;
        echo $selected_color_id;
        echo $selected_size;
        echo $user_id;
    
        $insert_query = "INSERT INTO added_game_components (game_id, component_id, color_id, quantity, size, user_id) 
        VALUES (NULL, '$component_id', '$selected_color_id', '$quantity', '$selected_size', '$user_id')";

        if (mysqli_query($conn, $insert_query)) {
            echo "Single game component inserted into added_game_components successfully.<br>";

            // Retrieve the last inserted ID for the added component
            $added_component_id = mysqli_insert_id($conn);

            // Insert the single game component into the cart table
            $cart_insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active)
                          VALUES ('$user_id', NULL, NULL, '$added_component_id', '$quantity', '$component_price', 1)";

            if (mysqli_query($conn, $cart_insert_query)) {
                echo "Single game component inserted into cart successfully with quantity $quantity.";
            } 

            header('location: cart.php');
        } 
    }
}
?>