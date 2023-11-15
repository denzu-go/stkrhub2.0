<?php
session_start();

include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data sent via POST request
    $category = $_POST['category'];
    $type = $_POST['type'];

    $sql = "INSERT INTO faq (faq_category, faq_type) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $category, $type);

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
