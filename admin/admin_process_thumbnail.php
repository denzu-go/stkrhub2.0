<?php
session_start();
include("connection.php");

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in



if (isset($_GET['id'])) {
    $name = $_GET['id'];

    $tut_sql = "SELECT *
            FROM component_assets
            LEFT JOIN game_components ON component_assets.component_id = game_components.component_id
            WHERE asset_path = '$name'";

    $tut_query = $conn->query($tut_sql);
    $tut_row = $tut_query->fetch_assoc();



    // make all thumbnails go to 0
    $component_id = $tut_row['component_id'];

    $category_sql = "SELECT * from component_assets where component_id = $component_id";
    $category_query = $conn->query($category_sql);

    while ($category = $category_query->fetch_assoc()) {

        if($category['is_thumbnail'] == 1){
            $sql = "UPDATE component_assets
            SET 
                is_thumbnail = 0
            WHERE component_id = $component_id"; 

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
            
        }

    }

    // make new thumbnail = 1

    $sql = "UPDATE component_assets
            SET 
                is_thumbnail = 1
            WHERE asset_path = '$name'"; 

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

    


}
?>

