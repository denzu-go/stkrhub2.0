<?php
// Include the connection.php file to establish a database connection
include("connection.php");

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $id = isset($_POST["admin_id"]) ? mysqli_real_escape_string($conn, $_POST["admin_id"]) : null;

    if ($id !== null) {
        // Check if the admin with the given ID exists
        $checkAdminQuery = "SELECT * FROM admins WHERE admin_id = $id";
        $adminResult = $conn->query($checkAdminQuery);

        if ($adminResult->num_rows > 0) {
            if (isset($_FILES["file"])) {
                $coverName = $_FILES["file"]["name"];
                $coverTmp = $_FILES["file"]["tmp_name"];

                // Generate a unique filename
                $uniqueFilename = uniqid() . "_" . $coverName;

                // Set your upload directory
                $uploadDirectory = "assets/avatar/";
                $uploadPath = $uploadDirectory . $uniqueFilename;

                // Ensure the directory exists, create it if not
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                // Move the uploaded file to the target directory
                if (move_uploaded_file($coverTmp, $uploadPath)) {
                    $sql = "UPDATE admins SET avatar = ? WHERE admin_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si", $uploadPath, $id);

                    if ($stmt->execute()) {
                        $response["success"] = true;
                        $response["message"] = "Avatar updated successfully.";
                    } else {
                        $response["message"] = "Error updating avatar: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    $response["message"] = "Error uploading the file.";
                }
            } else {
                $response["message"] = "File not provided.";
            }
        } else {
            $response["message"] = "Error: Admin not found.";
        }
    } else {
        $response["message"] = "Error: Invalid admin ID.";
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
