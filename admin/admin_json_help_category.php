<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['help_category'])) {
    $category = $_SESSION['help_category']; // Retrieve $category from the session

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT *
    FROM faq
    WHERE faq_category = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        
        $actions = '<a href="edit_help_category.php?id=' . $row['faq_id'] . '">Edit</a>';

        $data[] = array(
            "title" => $row["faq_category"],
            "description" => $row["faq_description"],
            "image" => $row["faq_image_path"],
            "actions" => $actions,
        );
    }

    // Send a JSON content type header
    header('Content-Type: application/json');

    echo json_encode($data);
} else {
    echo "Category not set.";
}
