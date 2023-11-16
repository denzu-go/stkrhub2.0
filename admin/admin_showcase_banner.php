<?php
include("connection.php");

if (isset($_GET['id'])) {
    $tutID = $_GET['id'];

    $tut_sql = "SELECT *
            FROM index_banner
            WHERE id = $tutID";

    $tut_query = $conn->query($tut_sql);
    $tut_row = $tut_query->fetch_assoc();

    if ($tut_row["is_showcased"] == "1") {
        $sql = "UPDATE index_banner
            SET 
                is_showcased = 0
            WHERE id = $tutID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: admin_banner.php"); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        $sql = "UPDATE index_banner
            SET 
                is_showcased = 1
            WHERE id = $tutID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: admin_banner.php"); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

