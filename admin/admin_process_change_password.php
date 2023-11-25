<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $old = $_POST['old'];
    $newpassword = $_POST['new'];
    $conpassword = $_POST['con'];
    $id = $_POST['admin_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM admins WHERE admin_id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the old password matches
        if (password_verify($old, $user['password'])) {
            // Old password matches

            // Check if the new and confirm passwords match
            if ($newpassword == $conpassword) {
                // Password and confirm password match
                // Hash the new password
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $sql = "UPDATE admins SET password = '$newpassword' WHERE admin_id = $id";

                // Execute the SQL query
                if (mysqli_query($conn, $sql)) {
                    // Password update successful
                    echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
                    exit;
                } else {
                    // Password update failed
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
                    exit;
                }
            } else {
                // Password and confirm password do not match
                echo json_encode(['status' => 'error', 'message' => 'Passwords do not match']);
                exit;
            }
        } else {
            // Old password is incorrect
            echo json_encode(['status' => 'error', 'message' => 'Old password is incorrect']);
            exit;
        }
    } else {
        // User not found
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
        exit;
    }
}
?>
