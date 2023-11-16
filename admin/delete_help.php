<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['helpID'];
    
    // Retrieve the category from the database
    $sql = "DELETE FROM help
                WHERE help_id = $id";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully!";
           
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Help not found.";
    }




