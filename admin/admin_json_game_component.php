<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['category'])) {
    $category = $_SESSION['category']; // Retrieve $category from the session

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT *
    FROM component_category
    WHERE category = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        
        $actions = '<a href="edit_component_category.php?id=' . $row['component_category_id'] . '">Edit</a>';

        $data[] = array(
            "title" => $row["category"],
            "image" => $row["component_image_path"],
            "actions" => $actions,
        );
    }

    // Send a JSON content type header
    header('Content-Type: application/json');

    echo json_encode($data);
} else {
    echo "Category not set.";
}