<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['category'])) {
    $category = $_SESSION['category']; // Retrieve $category from the session

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM game_components WHERE category = ?");
    $stmt->bind_param("s", $category); // Assuming 'category' is a string, use "s" for string
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $component_id = $row['component_id'];
        $name = $row['component_name'];
        $description = $row['description'];
        $price = $row['price'];
        $size = $row['size'];
        $has_colors = $row['has_colors'];
        $colors = array(); // Initialize an empty array for colors
        $templates = ""; // Initialize an empty array for templates
        $thumbnails = "";
        $is_deleted = $row['is_deleted'];

        if ($is_deleted == 0) {
            if ($has_colors == 1) {
                $colorQuery = "SELECT * FROM component_colors WHERE component_id = $component_id";
                $colorResult = mysqli_query($conn, $colorQuery);

                while ($colorRow = mysqli_fetch_assoc($colorResult)) {
                    $colors[] = $colorRow['color_name']; // Add color to the array
                }
            } else {
                $colors[] = 'No Color';
            }

            $templateQuery = "SELECT * FROM component_templates WHERE component_id = $component_id";
            $templateResult = mysqli_query($conn, $templateQuery);

            // Initialize an empty array for templates
            $imageData = array();

            while ($templateRow = mysqli_fetch_assoc($templateResult)) {
                // Add data-id and name to the array
                $imageData[] = array(
                    'id' => $templateRow['template_file_path'],
                    'name' => $templateRow['template_name'] // Assuming you have a field 'image_name' in your database
                );
            }

        

            if (!empty($imageData)) {
                foreach ($imageData as $image) {
                    $templates .= '<button class="btn btn-primary showTemplateBtn" style = "margin:5px;" data-id="' . $image['id'] . '" data-name="' . $image['name'] . '">' . $image['name'] . '</button>';
                }
            } else {
                $templates = 'No Templates';
            }

            $thumbnailQuery = "SELECT * FROM component_assets WHERE component_id = $component_id";
            $thumbnailResult = mysqli_query($conn, $thumbnailQuery);

            // Initialize an empty array for templates
            $thumbnailData = array();
            $tno = 0;
            while ($thumbnailRow = mysqli_fetch_assoc($thumbnailResult)) {
                // Add data-id and name to the array
              
                $tno++;
                $thumbnailData[] = array(
                    'id' => $thumbnailRow['asset_path'],
                    'name' =>  $tno,
                );
            }

      

            if (!empty($thumbnailData)) {
                foreach ($thumbnailData as $image) {
                    $thumbnails .= '<button class="btn btn-primary showThumbnailBtn" style = "margin:5px;" data-id="' . $image['id'] . '" data-name="' . $image['name'] . '"> Thumbnail' . $image['name'] . '</button>';
                }
            } else {
                $thumbnails = 'No Thumbnails';
            }

            $available = '';

            if ($row["is_available"] == 1) {
                $available = '<a href="admin_available_product.php?id=' . $row['component_id'] . '" style="color:green;"> Available </a>';
            } else {
                $available = '<a href="admin_available_product.php?id=' . $row['component_id'] . '" style="color:red;"> Not Available </a>';
            }


            $actions = '';

                if (isset($_SESSION['admin_id'])) {
                    $id = $_SESSION['admin_id'];

                    $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                    $queryAdmin= $conn->query($getAdmin);
                    $row2 = $queryAdmin->fetch_assoc();

                    if ($row2["is_super_admin"] == 1) {
                        $actions = '<a class="btn btn-outline-primary " href="edit_game_components.php?id=' . $component_id . '" style = "margin:5px;">Edit   
                        </a>
                        
                        <button type="button" class="delete-component btn btn-danger" data-component-id =" '.$row['component_id'].'" style = "margin:5px;">Delete</a>' ;
                    } else {
                        $actions = '<a class="btn btn-outline-primary " href="edit_game_components.php?id=' . $component_id . '" style = "margin:5px;">Edit   
                        </a>
                        
                    ';
                    }
                }


           


            

            $data[] = array(
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "size" => $size,
                "colors" => $colors, // Store colors as an array
                "templates" => $templates,
                "thumbnails" => $thumbnails,
                "available" => $available, // Store templates as an array
                "actions" => $actions,
            );
        }
    }

    // Send a JSON content type header
    header('Content-Type: application/json');

    echo json_encode($data);
} else {
    echo "Category not set.";
}
