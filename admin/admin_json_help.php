<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['help_category'])) {
    $category = $_SESSION['help_category']; // Retrieve $category from the session

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT *
    FROM faq
    LEFT JOIN tutorials ON faq.faq_id = tutorials.faq_id
    WHERE faq_category = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $primary = '';

        if ($row["is_primary"] == 1) {
            $primary = '<a href="admin_showcase_tutorial.php?id=' . $row['tutorial_id'] . '" style="color:green;"> Showcased </a>';
            
        } else { 
            $primary = '<a href="admin_showcase_tutorial.php?id=' . $row['tutorial_id'] . '" style="color:red;"> Not Showcased </a>';
        }

        $actions = '<a href="edit_help_content.php?id=' . $row['tutorial_id'] . '">Edit</a> <a href="delete_help_content.php?id=' . $row['tutorial_id'] . '" style = "color:red;">Delete</a>';

        $data[] = array(
            "title" => $row["tutorial_title"],
            "description" => $row["tutorial_description"],
            "link" => $row["tutorial_link"],
            "showcased" => $primary,
            "actions" => $actions,
        );
    }

    // Send a JSON content type header
    header('Content-Type: application/json');

    echo json_encode($data);
} else {
    echo "Category not set.";
}
