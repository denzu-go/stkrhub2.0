<!DOCTYPE html>
<html>

<head>
    <title>Game Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h2>Game Dashboard</h2>

    <?php
    include 'connection.php';
    include 'html/header.html.php';

    // Check if the user is logged in. If not, redirect to the login page.
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['game_id'])) {
        $game_id = $_GET['game_id'];

        // Retrieve the game details from the "games" table
        $query = "SELECT * FROM games WHERE game_id = '$game_id' AND user_id = '{$_SESSION['user_id']}'";
        $result = mysqli_query($conn, $query);
        $game = mysqli_fetch_assoc($result);

        // Retrieve the added game components for this game from the "added_game_components" table
        $query_components = "SELECT agc.added_component_id, gc.component_name, gc.price, gc.category, agc.is_custom_design, agc.custom_design_file_path, agc.quantity
                            FROM added_game_components agc
                            INNER JOIN game_components gc ON agc.component_id = gc.component_id
                            WHERE agc.game_id = '$game_id'";
        $result_components = mysqli_query($conn, $query_components);
    }
    ?>

    <h3><?php echo $game['name']; ?></h3>
    <p><?php echo $game['description']; ?></p>
    <p>Category: <?php echo $game['category']; ?></p>
    <p>Total Price: <?php echo calculateTotalPrice($game_id); ?></p>

    <h4>Added Components</h4>
    <table id="componentsTable" class="display">
        <thead>
            <tr>
                <th>Component Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Edit Quantity</th>
                <th>Filename</th>
                <th>Modify</th> <!-- New column -->
                <th>Delete Component</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($component = mysqli_fetch_assoc($result_components)) { ?>
                <tr>
                    <td><?php echo $component['component_name']; ?></td>
                    <td><?php echo $component['price']; ?></td>
                    <td><?php echo $component['category']; ?></td>
                    <td>
                        <input type="number" class="quantity-input" data-gameid="<?php echo $game_id; ?>" data-componentid="<?php echo $component['added_component_id']; ?>" value="<?php echo max(1, min(99, $component['quantity'])); ?>" min="1" max="99">
                    </td>
                    <td>
                        <?php if ($component['is_custom_design'] == 1 && !empty($component['custom_design_file_path'])) {
                            echo basename($component['custom_design_file_path']);
                        } ?>
                    </td>
                    <td>
                        <!-- Add the Update Custom Design button -->
                        <?php if ($component['is_custom_design'] == 1) { ?>
                            <button class="update-design" data-gameid="<?php echo $game_id; ?>" data-componentid="<?php echo $component['added_component_id']; ?>" data-componentname="<?php echo $component['component_name']; ?>" data-componentprice="<?php echo $component['price']; ?>" data-componentcategory="<?php echo $component['category']; ?>" data-filepath="<?php echo $component['custom_design_file_path']; ?>" data-filename="<?php echo basename($component['custom_design_file_path']); ?>" data-gamename="<?php echo $game['name']; ?>" data-addedcomponentid="<?php echo $component['added_component_id']; ?>"> <!-- Add this line -->
                                Update Custom Design
                            </button>
                        <?php } ?>

                    </td>
                    <td>
                        <button class="delete-component" data-gameid="<?php echo $game_id; ?>" data-componentid="<?php echo $component['added_component_id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form method="post" action="add_custom_component.php">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game['name']; ?>">
        <input type="submit" name="add_custom_component" value="Add Custom Game Component">
    </form>


    <script>
        $(document).ready(function() {

            // Listen for update custom design button click
            $('.update-design').click(function() {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var component_name = $(this).data('componentname');
                var component_price = $(this).data('componentprice');
                var component_category = $(this).data('componentcategory');
                var file_path = $(this).data('filepath');
                var file_name = $(this).data('filename');
                var game_name = $(this).data('gamename');
                var added_component_id = $(this).data('addedcomponentid'); // Retrieve added_component_id

                // Redirect to the update_custom_design.php page with the necessary parameters
                window.location.href = 'update_custom_design.php?game_id=' + game_id +
                    '&component_id=' + component_id +
                    '&component_name=' + encodeURIComponent(component_name) +
                    '&component_price=' + component_price +
                    '&component_category=' + encodeURIComponent(component_category) +
                    '&file_path=' + encodeURIComponent(file_path) +
                    '&file_name=' + encodeURIComponent(file_name) +
                    '&game_name=' + encodeURIComponent(game_name) +
                    '&added_component_id=' + added_component_id; // Pass added_component_id
            });



            // Initialize DataTables
            $('#componentsTable').DataTable();

            // Listen for changes to quantity input
            $('.quantity-input').change(function() {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var quantity = $(this).val();

                // Send AJAX request to update_quantity.php
                $.ajax({
                    type: 'POST',
                    url: 'update_quantity.php',
                    data: {
                        game_id: game_id,
                        added_component_id: component_id,
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

            // Listen for delete button click
            $('.delete-component').click(function() {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');

                // Send AJAX request to delete_component.php
                $.ajax({
                    type: 'POST',
                    url: 'delete_component.php',
                    data: {
                        game_id: game_id,
                        added_component_id: component_id
                    },
                    success: function(response) {
                        console.log(response);
                        // Reload the page after successful deletion
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>

</html>

<?php
// Function to calculate the total price of the game based on added components
function calculateTotalPrice($game_id)
{
    global $conn;

    $total_price = 0;

    // Retrieve the added game components for this game from the "added_game_components" table
    $query_components = "SELECT gc.price FROM added_game_components agc
                        INNER JOIN game_components gc ON agc.component_id = gc.component_id
                        WHERE agc.game_id = '$game_id'";
    $result_components = mysqli_query($conn, $query_components);

    // Calculate the total price by summing up the prices of all added components
    while ($component = mysqli_fetch_assoc($result_components)) {
        $total_price += $component['price'];
    }

    return $total_price;
}
?>