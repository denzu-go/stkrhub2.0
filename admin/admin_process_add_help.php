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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);

    // Check if a tutorial with the same title already exists
    $checkDuplicateQuery = "SELECT * FROM help WHERE help_title = '$title'";
    $duplicateResult = $conn->query($checkDuplicateQuery);

    if ($duplicateResult->num_rows > 0) {
        // A tutorial with the same title already exists
        echo "Error: A tutorial with the same title already exists.";
    } else {
        // Retrieve the FAQ record for the specified category
        $faq_sql = "SELECT * FROM faq WHERE faq_category = '$category'";
        $faq_query = $conn->query($faq_sql);

        if ($faq_query->num_rows == 0) {
            // Category not found
            echo "Error: Category not found.";
        } else {
            $faq_row = $faq_query->fetch_assoc();

            // SQL query to insert data into the help table
            $sql = "INSERT INTO help (faq_id, help_title, help_description) 
                    VALUES ({$faq_row['faq_id']}, '$title', '$description')";

            if ($conn->query($sql) === TRUE) {
                // Data inserted successfully

                // Handle file upload
                if (isset($_FILES["photo"])) {
                    $coverName = $_FILES["photo"]["name"];
                    $coverTmp = $_FILES["photo"]["tmp_name"];

                    // Generate a unique filename
                    $uniqueFilename = uniqid() . "_" . $coverName;

                    // Set your upload directory
                    $uploadDirectory = "../asset/help_assets/";
                    $uploadPath = $uploadDirectory . $uniqueFilename;

                    // Ensure the directory exists, create it if not
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }

                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($coverTmp, $uploadPath)) {
                        // File uploaded successfully

                        $uploadDirectory = "asset/help_assets/";
                        $uploadPath = $uploadDirectory . $uniqueFilename;

                        // SQL query to update help entry with image path
                        $updateImagePathSql = "UPDATE help SET help_image_path = '$uploadPath' WHERE help_title = '$title'";
                        if ($conn->query($updateImagePathSql) === TRUE) {
                            echo "Data inserted successfully!";
                        } else {
                            echo "Error updating image path: " . $conn->error;
                        }
                    } else {
                        echo "Error uploading the file.";
                    }
                } else {
                    echo "Error: File not uploaded.";
                }
            } else {
                // Error in inserting data
                echo "Error: " . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted, show an error or redirect as needed
    echo "Form not submitted!";
}
