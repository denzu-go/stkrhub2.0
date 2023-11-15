<?php
session_start();
include "connection.php";
    
    $is_deleted = 0;
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE is_deleted = ?");
    $stmt->bind_param("i", $is_deleted); // Assuming 'category' is a string, use "s" for string
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        

        

        $active = '';

                if ($row["is_active"] == 1) {
                    $active = '<a href="admin_user_active.php?id=' . $row['user_id'] . '" style="color:green;"> Active </a>';
                } else {
                    $active = '<a href="admin_user_active.php?id=' . $row['user_id'] . '" style="color:red;"> Deactivated </a>';
                }


                $actions = '';

                if (isset($_SESSION['admin_id'])) {
                    $id = $_SESSION['admin_id'];

                    $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                    $queryAdmin= $conn->query($getAdmin);
                    $row2 = $queryAdmin->fetch_assoc();

                    if ($row2["is_super_admin"] == 1) {
                        $actions = '<a href="admin_delete_user.php?id=' . $row['user_id'] . '" Style = "color:red;">Delete</a>' ;
                    } else {
                        $actions = 'No Action';
                    }
                }

        

        $data[] = array(
            "userID" => $row['unique_user_id'],
            "username" => $row['username'],
            "fname" => $row['firstname'],
            "lname" => $row['lastname'],
            "phone" => $row['phone_number'], // Store colors as an array
            "email" => $row['email'],
            "date" => $row['created_at'], // Store templates as an array
            "active" => $active,
            "action" => $actions,
        );
    }

    // Send a JSON content type header
    header('Content-Type: application/json');
    
    echo json_encode($data);

?>
