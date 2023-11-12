<?php
// process_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    $super = $_POST['super'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['conpassword'];

    $newpassword;

    if ($password == $password_confirmation) {
        $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Password does not match']);
        exit;
    }

    // Check if the username or email already exists in the database
    $query = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Username already exists, handle the error
        echo json_encode(['status' => 'error', 'message' => 'Username is already taken']);
        exit;
    } else {
        $query2 = "SELECT * FROM admins WHERE email = '$email'";
        $result2 = mysqli_query($conn, $query2);

        if (mysqli_num_rows($result2) > 0) {
            // Email already exists, handle the error
            echo json_encode(['status' => 'error', 'message' => 'Email is already taken']);
            exit;
        } else {
            $insert_query = "INSERT INTO admins (username, email, password, is_super_admin) VALUES ('$username', '$email', '$newpassword', $super)";
            if (mysqli_query($conn, $insert_query)) {
                echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
                exit;
            } else {
                // Handle the error if the insertion fails
                echo json_encode(['status' => 'error', 'message' => 'Error in inserting data']);
                exit;
            }
        }
    }
}
?>
