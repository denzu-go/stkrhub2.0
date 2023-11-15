<?php
// process_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $token = $_POST['token'];

    $token_hash = hash('sha256', $token);

    $tokenSQL = 'SELECT * FROM users where reset_token_hash = ?';
    $stmt = mysqli_prepare($conn, $tokenSQL);
    $stmt->bind_param("s", $token_hash);

    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if (strtotime($user['reset_token_expires_at']) <= time()) {

        $credentials = 'expires';
        $_SESSION['credentials'] = $credentials;
        header("Location: email_forgot_password.php");
    } else {
        if ($password == $conpassword) {
            // Password and confirm password match
            // Hash the new password
            $newpassword = password_hash($password, PASSWORD_DEFAULT);

            // Create an SQL query to update the user's password in the database
            $sql = "UPDATE users SET password = '$newpassword' WHERE reset_token_hash = '$token_hash'";

            // Execute the SQL query (you should add error handling here)
            if (mysqli_query($conn, $sql)) {
                $credentials = 'success';
      
                $_SESSION['credentials'] = $credentials;
                header("Location: login_page.php");
                exit;
               
            } else {
                // Password update failed; handle the error as needed
                echo 'Password update failed.';
            }
        } else {
            // Password and confirm password do not match; handle the error as needed
            $credentials = 'false';
      
            $_SESSION['credentials'] = $credentials;
            header("Location: forgot_password.php");
            exit;
        }
    }
}
