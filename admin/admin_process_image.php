<?php
// Include the connection.php file to establish a database connection
include("connection.php");

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

            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($coverTmp, $uploadPath)) {
                $sql = "UPDATE constants SET image_path = ? WHERE constant_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $uploadPath, $id);

                if ($stmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "Cover photo updated successfully.";
                } else {
                    $response["message"] = "Error updating cover photo: " . $stmt->error;
                }

                $stmt->close();
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
?>
