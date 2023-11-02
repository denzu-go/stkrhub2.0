<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id']) && isset($_POST['quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];

    $getClassification = "SELECT * FROM cart WHERE cart_id = $cart_id";
    $queryClassification = $conn->query($getClassification);
    while ($fetched = $queryClassification->fetch_assoc()) {
        $published_game_id = $fetched['published_game_id'];
        $built_game_id = $fetched['built_game_id'];
        $added_component_id = $fetched['added_component_id'];
        $ticket_id = $fetched['ticket_id'];
    }

    if ($added_component_id) {
        echo '$added_component_id: '. $added_component_id;

        // Update the quantity in the "cart" table
        $update_query = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

        if (mysqli_query($conn, $update_query)) {
            echo "Quantity updated successfully at cart <br>";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }

        // Update the quantity in the "added game components" table
        $update_query_game_comp = "UPDATE added_game_components SET quantity = '$quantity' WHERE added_component_id = '$added_component_id'";

        if (mysqli_query($conn, $update_query_game_comp)) {
            echo "Quantity updated successfully at game_comp <br>";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    } else {
        // Update the quantity in the "cart" table
        $update_query = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

        if (mysqli_query($conn, $update_query)) {
            echo "Quantity updated successfully";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    }
}
