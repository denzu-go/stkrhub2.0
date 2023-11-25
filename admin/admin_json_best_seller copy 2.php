<?php
session_start();
include "../connection.php";

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in


$data = array();

$sqlGames = "SELECT published_game_id, COUNT(*) AS frequency
FROM orders
WHERE published_game_id IS NOT NULL
GROUP BY published_game_id
ORDER BY frequency DESC";
$resultGames = $conn->query($sqlGames);

// Check if there are any rows returned
if ($resultGames) {
    while ($row = $resultGames->fetch_assoc()) {
        $published_game_id = $row['published_game_id'];
        $published_game_id = $row['published_game_id'];
        $published_game_id = $row['published_game_id'];
        $published_game_id = $row['published_game_id'];
        $published_game_id = $row['published_game_id'];

        $title_value = $published_game_id;
        $category_value = 'category';
        $marketplace_price_value = 'marketplace price';
        $creator_value = 'creator value';
        $status_value = 'status value';
        $frequency_value = $row['frequency'];
        
        $data[] = array(
            "title" => $title_value,
            "category" => $category_value,
            "price" => $marketplace_price_value,
            "creator" => $creator_value,
            "status" => $status_value,
            "frequency" => $frequency_value,
        );
    }

    echo json_encode($data);
} else {
    // Handle the case where the main query fails
    echo json_encode(array("message" => "Error in the main query"));
}
?>
