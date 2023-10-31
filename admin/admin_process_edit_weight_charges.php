<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    
    
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $fee1 = mysqli_real_escape_string($conn, $_POST["price1"]);
    $fee2 = mysqli_real_escape_string($conn, $_POST["price2"]);
    $fee3 = mysqli_real_escape_string($conn, $_POST["price3"]);
    $fee4 = mysqli_real_escape_string($conn, $_POST["price4"]);
    $fee5 = mysqli_real_escape_string($conn, $_POST["price5"]);

    // SQL query to update data in the tutorials table
    $sql = "UPDATE destination_rates
            SET weight_price_1 = $fee1,
            weight_price_2 = $fee2,
            weight_price_3 = $fee3,
            weight_price_4 = $fee4,
            weight_price_5 = $fee5
            
            WHERE destination_id = $id";

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