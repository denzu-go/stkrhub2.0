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
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $id = mysqli_real_escape_string($conn, $_POST["courier_id"]);

    $checkComponentQuery = "SELECT * FROM courier WHERE courier_id = $id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        $response["message"] = "Error: Courier not found.";
    } else {
       

                $sql = "UPDATE courier SET courier_name = ? WHERE courier_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $name,$id);

                if ($stmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "Courier updated successfully.";
                } else {
                    $response["message"] = "Error updating Courier: " . $stmt->error;
                }

                $stmt->close();
            
    }

    $conn->close();
} else {
    $response["message"] = "Form not submitted!";
}

header("Content-Type: application/json");
echo json_encode($response);
?>
