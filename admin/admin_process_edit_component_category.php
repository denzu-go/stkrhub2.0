<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);




    // Check if the component with the given ID exists
    $checkComponentQuery = "SELECT * from component_category WHERE component_category_id = $id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        echo "Error: Component not found.";
    } else {
        // SQL query to update data in the game_components table
        $componentData = $componentResult->fetch_assoc();
        $oldCategory = mysqli_real_escape_string($conn, $componentData['category']);

        // SQL query to update data in the component_category table
        $updateComponentQuery = "UPDATE component_category
            SET category = '$category'
            WHERE component_category_id = $id";

        if ($conn->query($updateComponentQuery) === TRUE) {
            // SQL query to update data in the game_components table
            $updateGameComponentsQuery = "UPDATE game_components
                SET category = '$category'
                WHERE category = '$oldCategory'";

            if ($conn->query($updateGameComponentsQuery) === TRUE) {
                // Commit the transaction if both updates are successful
                $conn->commit();
                echo "Data updated successfully!";
            } else {
                $conn->rollback();
                echo "Error updating game_components: " . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Error updating component_category: " . $conn->error;
        }

        $upload_only = isset($_POST["upload"]) ? intval($_POST["upload"]) : 0; // post has_color

        if ($upload_only == 1) {
            $updateComponentQuery = "UPDATE component_category
    SET is_upload_only = 1
    WHERE component_category_id = $id";
        } else {
            $updateComponentQuery = "UPDATE component_category
    SET is_upload_only = 0
    WHERE component_category_id = $id";
        }

        if ($conn->query($updateComponentQuery) === TRUE) {
            // Commit the transaction if the update is successful
            $conn->commit();
            echo "Data updated successfully!";
        } else {
            $conn->rollback();
            echo "Error updating component_category: " . $conn->error;
        }


        if (isset($_FILES["coverPhoto"])) {
            $coverName = $_FILES["coverPhoto"]["name"];
            $coverTmp = $_FILES["coverPhoto"]["tmp_name"];

            // Generate a unique filename
            $uniqueFilename = uniqid() . "_" . $coverName;

            // Set your upload directory
            $uploadDirectory = "../assets/game_category_assets/";
            $uploadPath = $uploadDirectory . $uniqueFilename;

            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($coverTmp, $uploadPath)) {
                // File uploaded successfully, update the database
                // Assuming you have the FAQ ID available, replace $faq_id with the actual FAQ ID
                $uploadDirectory = "assets/game_category_assets/";

                // Use prepared statements to update the database safely



                $sql = "UPDATE component_category SET compondent_image_path = ? WHERE faq_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $uploadPath, $id);

                if ($stmt->execute()) {
                    echo "Cover photo updated successfully.";
                } else {
                    echo "Error updating cover photo: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error uploading the file.";
            }
        }
    }

    // Close the database connection
    $conn->close();
    header("Location: add_game_piece.php?category=" . $category);
} else {
    echo "Form not submitted!";
}
