<?php
// process_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';
    $old = $_POST['old'];
    $newpassword = $_POST['new'];
    $conpassword = $_POST['con'];
    $id = $_POST['user_id'];

    $query = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    

    if (password_verify($old, $user['password'])) {
        echo 'password matchs';
        if ($newpassword == $conpassword) {
            // Password and confirm password match
            // Hash the new password
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

            // Create an SQL query to update the user's password in the database
            $sql = "UPDATE users SET password = '$newpassword' WHERE user_id = $id";

            // Execute the SQL query (you should add error handling here)
            if (mysqli_query($conn, $sql)) {
                $credentials = '3';
                $_SESSION['credentials'] = $credentials;
                header("location:change_password.php");
                exit;
            } else {
                // Password update failed; handle the error as needed
                echo 'Password update failed.';
                exit;
            }
        } else {
            // Password and confirm password do not match; handle the error as needed
            $credentials = '2';
            $_SESSION['credentials'] = $credentials;
            header("location:change_password.php");
            exit;
        }

    } else {
       
        $credentials = '1';
        $_SESSION['credentials'] = $credentials;
        header("location:change_password.php");
        exit;
    }

    }
}
