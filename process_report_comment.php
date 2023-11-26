<?php
// Include the connection file to use the existing $conn variable
include 'connection.php'; 
session_start();
if (isset($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Access form data sent via AJAX
            $rating_id = $_POST['rating_id'];
            
            // SQL query to update the existing record based on rating_id
            $sql = "UPDATE ratings SET is_reported = 1, was_reported = 1 WHERE rating_id = $rating_id";
        
            if ($conn->query($sql) === TRUE) {
        
        
                // The record was updated successfully
                echo 'Rating ID: ' . $rating_id . ' has been updated.';
            } else {
                // An error occurred
                echo 'Error: ' . $conn->error;
            }
        } else {
            // Handle other request methods or errors
            echo 'Invalid request';
        }
    }


