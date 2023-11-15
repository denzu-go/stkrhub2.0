<?php
// Include the connection.php file to establish a database connection
include("connection.php");

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    // Check if the component with the given name exists
    $checkComponentQuery = "SELECT * FROM index_banner WHERE banner_name = '$name'";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows > 0) {
        $response["message"] = "Error: Banner Name is already Taken.";
    } else {
        if (isset($_FILES["file"])) {
            $coverName = $_FILES["file"]["name"];
            $coverTmp = $_FILES["file"]["tmp_name"];

            // Generate a unique filename
            $uniqueFilename = uniqid() . "_" . $coverName;

            // Set your upload directory
            $uploadDirectory = "../img/banner/";
            $uploadPath = $uploadDirectory . $uniqueFilename;

            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($coverTmp, $uploadPath)) {

                $uploadDirectory = "img/banner/";
                $uploadPath = $uploadDirectory . $uniqueFilename;

                $sql = "INSERT INTO index_banner (banner_name, image_path) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $name, $uploadPath);

                if ($stmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "New Banner added successfully.";
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
