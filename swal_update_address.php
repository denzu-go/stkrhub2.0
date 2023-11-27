<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data sent via POST request
    // Assuming $conn is your MySQLi connection

    $addressId = mysqli_real_escape_string($conn, $_POST['addressId']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);






    $setDefaultAddress = $_POST['setDefaultAddress'];

    $stmt = $conn->prepare("UPDATE addresses 
    SET fullname = ?, number = ?, zip = ?, street = ?
    WHERE address_id = ?");

    $stmt->bind_param("ssssi", $fullname, $number, $zip, $street, $addressId);

    if ($stmt->execute()) {

        // Address information updated successfully
        echo "Address information updated successfully.";
    } else {
        // Error occurred during the update
        echo "Error updating address information: " . $stmt->error;
    }

    $region = $_POST['region'];
    $region_name_qry = "SELECT * FROM region WHERE id = $region";
    $region_qry = mysqli_query($conn, $region_name_qry);
    $region_result = mysqli_fetch_assoc($region_qry);
    $region_name = $region_result['region_name'];

    $province = $_POST['province'];
    $province_name_qry = "SELECT * FROM province WHERE id = $province";
    $province_qry = mysqli_query($conn, $province_name_qry);
    $province_result = mysqli_fetch_assoc($province_qry);
    $province_name = $province_result['province_name'];

    $city = $_POST['city'];
    $city_name_qry = "SELECT * FROM city WHERE id = $city";
    $city_qry = mysqli_query($conn, $city_name_qry);
    $city_result = mysqli_fetch_assoc($city_qry);
    $city_name = $city_result['city_name'];

    $barangay = $_POST['barangay'];
    $barangay_name_qry = "SELECT * FROM barangay WHERE id = $barangay";
    $barangay_qry = mysqli_query($conn, $barangay_name_qry);
    $barangay_result = mysqli_fetch_assoc($barangay_qry);
    $barangay_name = $barangay_result['barangay_name'];

    $stmt = $conn->prepare("UPDATE addresses 
    SET region = ?, province = ?, city = ?, barangay = ?
    WHERE address_id = ?");

    $stmt->bind_param("ssssi", $region_name, $province_name, $city_name, $barangay_name, $addressId);

    if ($stmt->execute()) {

        // Address information updated successfully
        echo "Address information updated successfully.";
    } else {
        // Error occurred during the update
        echo "Error updating address information: " . $stmt->error;
    }


    if ($setDefaultAddress === 'true') {

        $clearIsDefaultQuery = "UPDATE addresses SET is_default = 0 WHERE user_id = $user_id";
        if ($conn->query($clearIsDefaultQuery)) {

            $setDefault = "UPDATE addresses SET is_default = 1 WHERE address_id = $addressId";
            if ($conn->query($setDefault)) {
                echo 'default changed';
            }
        }
    } elseif ($setDefaultAddress === 'false') {
        echo 'FALSE';
    } else {
        echo '';
    }
    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    echo "Invalid request method.";
}
