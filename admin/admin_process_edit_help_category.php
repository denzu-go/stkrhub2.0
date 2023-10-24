<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $faq_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);



    // Check if the component with the given ID exists
    $checkComponentQuery = "SELECT * FROM faq WHERE faq_id = $faq_id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        echo "Error: Component not found.";
    } else {
        // SQL query to update data in the game_components table
        $sql = "UPDATE faq SET
        faq_category = '$category',
        faq_description = '$description'
        WHERE faq_id = $faq_id";

        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        if (isset($_FILES["coverPhoto"])) {
            $coverName = $_FILES["coverPhoto"]["name"];
            $coverTmp = $_FILES["coverPhoto"]["tmp_name"];
    
            // Generate a unique filename
            $uniqueFilename = uniqid() . "_" . $coverName;
    
            // Set your upload directory
            $uploadDirectory = "../assets/help_assets/";
            $uploadPath = $uploadDirectory . $uniqueFilename;
    
            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
    
            // Move the uploaded file to the target directory
            if (move_uploaded_file($coverTmp, $uploadPath)) {
                // File uploaded successfully, update the database
                // Assuming you have the FAQ ID available, replace $faq_id with the actual FAQ ID
                $uploadDirectory = "assets/help_assets/";
    
                // Use prepared statements to update the database safely
                $sql = "UPDATE faq SET faq_image_path = ? WHERE faq_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $uploadPath, $faq_id);
    
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
} else {
    echo "Form not submitted!";


}