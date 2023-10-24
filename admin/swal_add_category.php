<?php
session_start();

include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data sent via POST request
    $category = $_POST['category'];

    $sql = "INSERT INTO component_category (category) VALUES (?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);

    if ($stmt->execute()) {
        // Category added successfully
        $stmt->close();
        $conn->close();
        http_response_code(200); // Set the HTTP status code to 200
    } else {
        // Error occurred while adding the category
        echo "Error: " . $stmt->error;
        http_response_code(500); // Set the HTTP status code to indicate a server error
    }    


} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>



