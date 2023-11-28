<?php
session_start();
include("connection.php");

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];

    $user_sql = "SELECT *
                 FROM admins
                 WHERE admin_id = $userID";

    $user_query = $conn->query($user_sql);
    $user_row = $user_query->fetch_assoc();

    if ($user_query->num_rows > 0) {
        $sql = "DELETE FROM admins
                WHERE admin_id = $userID";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => 'success',
                'message' => 'Data deleted successfully!'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error: ' . $conn->error
            );
            echo json_encode($response);
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'User not found.'
        );
        echo json_encode($response);
    }
}
?>


