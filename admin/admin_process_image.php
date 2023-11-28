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

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $id = mysqli_real_escape_string($conn, $_POST["constant_id"]);

    // Check if the component with the given ID exists
    $checkComponentQuery = "SELECT * FROM constants WHERE constant_id = $id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        $response["message"] = "Error: Component not found.";
    } else {
        if (isset($_FILES["file"])) {
            $coverName = $_FILES["file"]["name"];
            $coverTmp = $_FILES["file"]["tmp_name"];

            // Generate a unique filename
            $uniqueFilename = uniqid() . "_" . $coverName;

            // Set your upload directory
            $uploadDirectory = "../img/constant/";
            $uploadPath = $uploadDirectory . $uniqueFilename;

            $dbPath = "img/constant/" . $uniqueFilename;

            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($coverTmp, $uploadPath)) {
                // Properly escape and quote values in the SQL query
                $escapedUploadPath = $conn->real_escape_string($dbPath);
                $sql = "UPDATE constants SET image_path = '$escapedUploadPath' WHERE constant_id = $id";

                if ($query = $conn->query($sql)) {
                    $response["success"] = true;
                    $response["message"] = "Cover photo updated successfully.";
                } else {
                    $response["message"] = "Error updating cover photo: " . $conn->error;
                }
            } else {
                $response["message"] = "Error uploading the file.";
            }
        }
    }

    // Close the database connection
    $conn->close();
} else {
    $response["message"] = "Form not submitted!";
}

// Send the JSON response
header("Content-Type: application/json");
echo json_encode($response);
