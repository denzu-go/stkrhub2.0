<?php
// process_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';
    
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $email = $_POST['email'];
    
    if ($password == $conpassword) {
        // Password and confirm password match
        // Hash the new password
        $newpassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Create an SQL query to update the user's password in the database
        $sql = "UPDATE users SET password = '$newpassword' WHERE email = '$email'";
        
        // Execute the SQL query (you should add error handling here)
        if (mysqli_query($conn, $sql)) {
            $change = 'true';
            session_start();
            $_SESSION["change"] = $change;
            header("location:forgot_password.php");
        } else {
            // Password update failed; handle the error as needed
            echo 'Password update failed.';
        }
    } else {
        // Password and confirm password do not match; handle the error as needed
        $credentials = 'false';
        session_start(); // Start or resume the session
        $_SESSION['credentials'] = $credentials;
        header("Location: forgot_password.php");
        exit;
    }
}
?>
