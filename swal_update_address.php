<?php
include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data sent via POST request
    $addressId = $_POST['addressId'];
    $fullname = $_POST['fullname'];
    $number = $_POST['number'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];

    // Prepare and execute an SQL query to update the address information
    $sql = "UPDATE addresses 
            SET fullname = ?, number = ?, region = ?, province = ?, 
                city = ?, barangay = ?, zip = ?, street = ?
            WHERE address_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssi",
        $fullname,
        $number,
        $region,
        $province,
        $city,
        $barangay,
        $zip,
        $street,
        $addressId
    );

    if ($stmt->execute()) {
        // Address information updated successfully
        echo "Address information updated successfully.";
    } else {
        // Error occurred during the update
        echo "Error updating address information: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>