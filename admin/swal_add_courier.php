<?php
// Include the connection.php file to establish a database connection
include("connection.php");

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    // Check if the component with the given name exists
    $checkComponentQuery = "SELECT * FROM courier WHERE courier_name = '$name'";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows > 0) {
        $response["message"] = "Error: Courier Name is already Taken.";
    } else {
       

                $sql = "INSERT INTO courier (courier_name) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $name);

                if ($stmt->execute()) {
                    $response["success"] = true;
                    $response["message"] = "New Courier added successfully.";
                } else {
                    $response["message"] = "Error updating Courier: " . $stmt->error;
                }

                $stmt->close();
           
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
