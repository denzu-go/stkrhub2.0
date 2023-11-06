<?php
// process_registration.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the connection.php file to access the existing database connection
    require_once 'connection.php';

    // Retrieve form data
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    echo $fname . '<br>';
    echo $lname . '<br>';
    echo $phone .'<br>';
    echo $username .'<br>';
    echo $email .'<br>';
    echo $password .'<br>';
    

    // Check if the username or email already exists in the database
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Username or email already exists, handle the error (e.g., display an error message)
        echo "Username or email already exists. Please choose another one.";
        exit;
    }

    // Insert the new user into the "users" table with the current timestamp for created_at
    $insert_query = "INSERT INTO users (firstname, lastname, phone_number, username, email, password) VALUES ('$fname','$lname', $phone,'$username', '$email', '$password')";
    if (mysqli_query($conn, $insert_query)) {

        $user_id = mysqli_insert_id($conn);

        $currentMonth = date('n');
        $currentDay = date('j');
        $currentYear = date('Y');

        $addthis = 'user-'.$currentMonth . $currentDay . $currentYear . '-' . $user_id;
        echo $addthis;

        $updateUsers = "UPDATE users SET unique_user_id = '$addthis' WHERE user_id = $user_id";
        if (mysqli_query($conn, $updateUsers)) {
            echo '<br><br>UPDATED NA UNG uniq users';
        } else {
            echo $user_id;
            echo mysqli_error($conn);
        }

        // header("Location: login_page.php");
        // exit;
    } else {
        // Handle the error if the insertion fails
        
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        exit;
    }
}
