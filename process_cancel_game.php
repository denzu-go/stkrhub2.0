<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }


    $built_game_id = $_POST['built_game_id'];
    $name = $_POST['name'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Update the 'is_built' flag in the 'games' table
        $sqlUpdateIsPending = "UPDATE built_games SET is_pending = 0 WHERE built_game_id = $built_game_id";
        $conn->query($sqlUpdateIsPending);

        // Commit the transaction
        $conn->commit();

        $response = ["success" => true, "message" => "Game successfully Canceled"];
    } catch (mysqli_sql_exception $e) {
        // Rollback the transaction on error
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}