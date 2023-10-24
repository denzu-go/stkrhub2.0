<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    $sql = "UPDATE users SET
            username = '$username',
            firstname = '$firstName',
            lastname = '$lastName',
            email = '$email',
            phone_number = '$phoneNumber'
            WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo 'Profile updated successfully.';
    } else {
        echo 'Error: ' . $conn->error;
    }
} else {
    echo 'Invalid request';
}
?>
