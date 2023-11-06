<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $faq_id = mysqli_real_escape_string($conn, $_POST["faq_id"]);



    $sql = "UPDATE help
            SET help_title = '$title',
                help_description = '$description'
            WHERE help_id = $id";

            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                echo "Data updated successfully!";
            } else {
                echo "Error: " . $conn->error;
            }


    if (isset($_FILES["file"])) {
        $coverName = $_FILES["file"]["name"];
        $coverTmp = $_FILES["file"]["tmp_name"];

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
            $uploadDirectory = "assets/help_assets/";
            $uploadPath = $uploadDirectory . $uniqueFilename;

            // SQL query to update data in the help table
            $sql = "UPDATE help
            SET  help_image_path = '$uploadPath'
            WHERE help_id = $id";

            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                echo "Data updated successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading the file. Error code: " . $_FILES["file"]["error"];
        }
    } else {
        // SQL query to update data in the help table without changing the image path
        $sql = "UPDATE help
        SET help_title = '$title',
            help_description = '$description'
        WHERE help_id = $id";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted!";
}
?>
