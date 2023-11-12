<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    // Retrieve the user from the database by their username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row["email"] == $email) {
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
    
    }else {
        $credentials = 'false';
        session_start(); // Start or resume the session
        $_SESSION['credentials'] = $credentials;
        header("Location: email_forgot_password.php");
        exit;
    }

}
