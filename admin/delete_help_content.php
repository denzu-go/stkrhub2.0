<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tutorial_id = $_POST['tutID'];
    
    // Retrieve the category from the database
    $sql = "DELETE FROM tutorials
                WHERE tutorial_id = $tutorial_id";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully!";
           
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "tutorial not found.";
    }




