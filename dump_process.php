<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle the form data here
    $built_game_id = $_POST['built_game_id'];
    $creator_id = $_POST['creator_id'];
    $game_name = $_POST['game_name'];
    $edition = $_POST['edition'];
    $category = $_POST['category'];
    $age = $_POST['age'];

    $min_players = $_POST['min_players'];
    $max_players = $_POST['max_players'];
    $min_playtime = $_POST['min_playtime'];
    $max_playtime = $_POST['max_playtime'];

    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];

    $desired_markup = $_POST['desired_markup'];
    $manufacturer_profit = $_POST['manufacturerProfitInput'];
    $creator_profit = $_POST['creatorProfitInput'];
    $marketplace_price = $_POST['marketplacePriceInput'];

    // Handle uploaded logo file
    $logo_path = 'uploads/';
    $logo_file = $_FILES['logo'];
    $logo_filename = uniqid() . '_' . $logo_file['name'];
    $logo_path .= $logo_filename;

    if (move_uploaded_file($logo_file['tmp_name'], $logo_path)) {
        $insertQuery = "INSERT INTO pending_published_built_games (built_game_id, game_name, category, edition, creator_id, age_id, short_description, long_description, logo_path, min_players, max_players, min_playtime, max_playtime, desired_markup, manufacturer_profit, creator_profit, marketplace_price) VALUES ('$built_game_id', '$game_name', '$category', '$edition', '$creator_id', '$age', '$short_description', '$long_description', '$logo_path', '$min_players', '$max_players', '$min_playtime', '$max_playtime', '$desired_markup', '$manufacturer_profit', '$creator_profit', '$marketplace_price')";

        if (mysqli_query($conn, $insertQuery)) {
            // Retrieve the generated published_built_game_id
            $pending_published_built_game_id = mysqli_insert_id($conn);

            // Insert game images into the published_multiple_files table
            $image_paths = [];
            $image_files = $_FILES['game_images'];
            $num_images = count($image_files['name']);

            for ($i = 0; $i < $num_images; $i++) {
                $image_filename = uniqid() . '_' . $image_files['name'][$i]; // Generate unique filename
                $image_path = 'uploads/' . $image_filename;

                if (move_uploaded_file($image_files['tmp_name'][$i], $image_path)) {
                    // Image upload successful
                    $image_paths[] = $image_path;
                } else {
                    // Image upload failed
                    echo "Image upload failed.";
                }
            }


            foreach ($image_paths as $image_path) {
                $insertImageQuery = "INSERT INTO pending_published_multiple_files (pending_published_built_game_id, built_game_id, creator_id, file_path) VALUES ('$pending_published_built_game_id', '$built_game_id', '$creator_id', '$image_path')";

                if (mysqli_query($conn, $insertImageQuery)) {
                    echo 'Image inserted successfully.';
                } else {
                    echo "Error inserting image: " . mysqli_error($conn);
                }
            }
            echo 'success';

            $isPublihsedQuery = "UPDATE built_games SET is_pending_published = 1 WHERE built_game_id = '$built_game_id'";
            mysqli_query($conn, $isPublihsedQuery);

            $isRePublihsedQuery = "UPDATE built_games SET is_request_denied = 0 WHERE built_game_id = '$built_game_id'";
            mysqli_query($conn, $isRePublihsedQuery);

            $deleteDenyQuery = "DELETE FROM denied_publish_requests WHERE built_game_id = $built_game_id";
            mysqli_query($conn, $deleteDenyQuery);
        }
    }
}
