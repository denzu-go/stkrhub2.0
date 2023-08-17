<?php
include 'connection.php';
include 'html/header.html.php';

echo '<div>';
echo '<a href="create_game.php">Create Game</a>';
echo '<a href="created_games_page.php">Created Games</a>';
echo '<a href="built_games_page.php">Built Games</a>';
echo '<a href="pending_built_games_page.php">Pending</a>';
echo '<a href="canceled_built_games_page.php">Canceled</a>';
echo '<a href="approved_built_games_page.php">Approved</a>';
echo '<a href="purchased_built_games_page.php">Purchased</a>';
echo '<a href="published_built_games_page.php">Published</a>';
echo '</div>';

$query = "SELECT * FROM built_games WHERE is_published = 1";
$result = mysqli_query($conn, $query);

echo '<h2>Published Built Games</h2>';
echo '<ul>';
while ($game = mysqli_fetch_assoc($result)) {
    echo '<li>';
    echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
    echo 'Game ID: ' . $game['game_id'] . '<br>';
    echo 'Name: ' . $game['name'] . '<br>';
    echo 'Description: ' . $game['description'] . '<br>';
    echo 'Creator ID: ' . $game['creator_id'] . '<br>';
    echo 'Build Date: ' . $game['build_date'] . '<br>';
    echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
    echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
    echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
    echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
    echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
    echo 'Price: $' . $game['price'] . '<br>';

    // You can add more details or links related to published games here

    echo '</li>';
}
echo '</ul>';
?>