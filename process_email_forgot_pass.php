<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    $username = $_POST['username'];
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16));

    $token_hash = hash("sha256", $token);

    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    // Retrieve the user from the database by their username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row["email"] == $email) {



            $sql = "UPDATE users 
                        SET reset_token_hash = ?,
                            reset_token_expires_at = ?
                        WHERE email = ?";

            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param("sss", $token_hash, $expiry, $email);
            $stmt->execute();
            if ($stmt->execute()) {
                
                $mail = require __DIR__ ."/mailer.php";

                $mail->setFrom("stkrhub@example.com");
                $mail->addAddress("$email");
                $mail->Subject = "Password Reset";
                $mail->Body = <<<END
                
                CLICK <a href = "http://localhost/stkrhub2.0/forgot_password.php?token=$token"> here </a>
                to reset password.

                Time limit is only 30 minutes

                END;

                try {
                    $mail->send();
                    echo "Message sent successfully!";
                    $credentials = 'true';
            session_start(); // Start or resume the session
            $_SESSION['credentials'] = $credentials;
            header("Location: email_forgot_password.php");
            exit;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                

                


            } else {
                // Handle errors during execution
                echo "Error executing statement: " . $stmt->error;
            }

            
        } else {
            $credentials = 'false';
            session_start(); // Start or resume the session
            $_SESSION['credentials'] = $credentials;
            header("Location: email_forgot_password.php");
            exit;
        }
    } else {
        $credentials = 'false';
        session_start(); // Start or resume the session
        $_SESSION['credentials'] = $credentials;
        header("Location: email_forgot_password.php");
        exit;
    }
}
