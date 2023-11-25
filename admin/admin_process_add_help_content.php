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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $link = mysqli_real_escape_string($conn, $_POST["link"]);

    // Retrieve the FAQ record for the specified category
    $faq_sql = "SELECT * FROM faq WHERE faq_category = '$category'";
    $faq_query = $conn->query($faq_sql);

    if ($faq_query->num_rows == 0) {
        // Category not found
        echo "Error: Category not found.";
    } else {
        $faq_row = $faq_query->fetch_assoc();

        // Check if a tutorial with the same title already exists
        $checkDuplicateQuery = "SELECT * FROM tutorials WHERE tutorial_title = '$title'";
        $duplicateResult = $conn->query($checkDuplicateQuery);

        if ($duplicateResult->num_rows > 0) {
            // A tutorial with the same title already exists
            echo "Error: A tutorial with the same title already exists.";
        } else {
            // SQL query to insert data into the tutorials table
            $sql = "INSERT INTO tutorials (faq_id, tutorial_title, tutorial_description, tutorial_link, is_primary, time_added) 
                    VALUES ({$faq_row['faq_id']}, '$title', '$description', '$link', 0, CURRENT_TIMESTAMP())";

            if ($conn->query($sql) === TRUE) {
                // Data inserted successfully
                echo "Data inserted successfully!";
            } else {
                // Error in inserting data
                echo "Error: " . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted, show an error or redirect as needed
    echo "Form not submitted!";
}
?>

