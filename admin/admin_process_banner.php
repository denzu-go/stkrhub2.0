<?php
include("connection.php");

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["category"]);
    $id = mysqli_real_escape_string($conn, $_POST["constant_id"]);

    $checkComponentQuery = "SELECT * FROM index_banner WHERE id = $id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        $response["message"] = "Error: Banner not found.";
    } else {
        if (isset($_FILES["file"])) {
            $coverName = $_FILES["file"]["name"];
            $coverTmp = $_FILES["file"]["tmp_name"];
            $uniqueFilename = uniqid() . "_" . $coverName;
            $uploadDirectory = "../img/banner/";
            $uploadPath = $uploadDirectory . $uniqueFilename;

            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            if (move_uploaded_file($coverTmp, $uploadPath)) {
                $uploadDirectory = "img/banner/";
                $uploadPath = $uploadDirectory . $uniqueFilename;

                $sql = "UPDATE index_banner SET banner_name = ?, image_path = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $uploadPath, $id);

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

    $conn->close();
} else {
    $response["message"] = "Form not submitted!";
}

header("Content-Type: application/json");
echo json_encode($response);
?>
