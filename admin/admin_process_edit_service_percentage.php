<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['percentage'])) {
    // Sanitize and retrieve values from the form
    $ids = $_POST['id'];
    $percentages = $_POST['percentage'];

    // Check if the arrays have the same length
    if (count($ids) !== count($percentages)) {
        echo "Error: Invalid data.";
        exit;
    }

    // Prepare and execute SQL update statements for each pair of id and percentage
    $success = true;

    for ($i = 0; $i < count($ids); $i++) {
        $id = mysqli_real_escape_string($conn, $ids[$i]);
        $percentage = mysqli_real_escape_string($conn, $percentages[$i]);

        // SQL query to update data in the constants table
        $sql = "UPDATE constants
                SET percentage = '$percentage'
                WHERE constant_id = $id";

        if ($conn->query($sql) !== TRUE) {
            $success = false;
            break; // Exit the loop on the first error
        }
    }

    if ($success) {
        echo "Data updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted or invalid data!";
}
?>

