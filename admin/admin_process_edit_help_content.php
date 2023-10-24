<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $faq_id = mysqli_real_escape_string($conn, $_POST["faq_id"]);
    $link = mysqli_real_escape_string($conn, $_POST["link"]);

    // SQL query to update data in the tutorials table
    $sql = "UPDATE tutorials
            SET tutorial_title = '$title',
                tutorial_description = '$description',
                tutorial_link = '$link'
            WHERE tutorial_id = $id";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted!";
}
?>
    