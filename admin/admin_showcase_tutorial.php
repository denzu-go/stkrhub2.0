<?php
include("connection.php");

if (isset($_GET['id'])) {
    $tutID = $_GET['id'];

    $tut_sql = "SELECT *
            FROM tutorials
            LEFT JOIN faq ON tutorials.faq_id = faq.faq_id
            WHERE tutorial_id = $tutID";

    $tut_query = $conn->query($tut_sql);
    $tut_row = $tut_query->fetch_assoc();

    if ($tut_row["is_primary"] == "1") {
        $sql = "UPDATE tutorials
            SET 
                is_primary = 0
            WHERE tutorial_id = $tutID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: admin_help.php?category=" . $tut_row["faq_category"]); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        $sql = "UPDATE tutorials
            SET 
                is_primary = 1
            WHERE tutorial_id = $tutID"; // Use $tutID instead of $id

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
            header("Location: admin_help.php?category=" . $tut_row["faq_category"]); // Use "." for concatenation
            exit; // Exit to prevent further execution
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

