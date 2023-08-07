<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['purchase_game'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];

    echo "Game ID: " . $game_id . "<br>";
    echo "Game Name: " . $game_name . "<br>";
    echo "User ID: " . $user_id . "<br>";

    // Handle the purchase logic here
} else {
    echo "Invalid request";
}
?>

<form method="post" action="purchase_confirm.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
    <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
    <button type="submit" name="buy_game">Buy</button>
</form>
