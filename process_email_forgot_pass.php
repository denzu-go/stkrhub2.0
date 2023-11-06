<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $email = $_POST['email'];
    // Retrieve the user from the database by their username
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
            session_start();
        $_SESSION["email"] = $email;

        // Create a URL with the hashed email as a GET parameter
        $url = "forgot_password.php?";
    
        // Redirect to the URL
        header("Location: $url");
        } else {
            $credentials = 'false';
            session_start(); // Start or resume the session
            $_SESSION['credentials'] = $credentials;
            header("Location: email_forgot_password.php");
            exit;
        }

}
