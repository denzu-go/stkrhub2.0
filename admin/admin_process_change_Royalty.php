

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
    // Sanitize and retrieve values from the form
    $id = $_POST['id']; // Use the correct variable name
    $percent = $_POST['percentage'];

    $sql = "UPDATE markup_percentage
            SET percentage = '$percent'
            WHERE id = $id"; // Use the correct variable name

    if ($conn->query($sql) === TRUE) {
        $confirm = '2';
        session_start();
        $_SESSION['confirm'] = $confirm;
        echo "success";
    } else {
        // Return an error response
        echo "error: " . $conn->error;
    }
}
?>


