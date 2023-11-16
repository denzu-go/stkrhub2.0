<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['help_category'])) {
    $category = $_SESSION['help_category']; // Retrieve $category from the session

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT *
    FROM faq
    WHERE faq_category = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $row2 = $result->fetch_assoc();

    $data = array();



    if ($row2['faq_type'] == 1) {

        $sql = "SELECT *
                    FROM faq
                    LEFT JOIN tutorials ON faq.faq_id = tutorials.faq_id
                    WHERE faq_category = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $tut_result = $stmt->get_result();

        if ($tut_result->num_rows > 0) {

            while ($row = $tut_result->fetch_assoc()) {
                $primary = '';

                if ($row["is_primary"] == 1) {
                    $primary = '<a href="admin_showcase_tutorial.php?id=' . $row['tutorial_id'] . '" style="color:green;"> Showcased </a>';
                } else {
                    $primary = '<a href="admin_showcase_tutorial.php?id=' . $row['tutorial_id'] . '" style="color:red;"> Not Showcased </a>';
                }

                $actions = '';

                if (isset($_SESSION['admin_id'])) {
                    $id = $_SESSION['admin_id'];

                    $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                    $queryAdmin= $conn->query($getAdmin);
                    $row2 = $queryAdmin->fetch_assoc();

                    if ($row2["is_super_admin"] == 1) {
                        $actions = '<a  class="btn btn-outline-primary " href="edit_help_content.php?id=' . $row['tutorial_id'] . '">Edit</a> 
                <button type="button" class="delete-tutorial btn btn-danger" data-tutorial-id =" '.$row['tutorial_id'].'" style = "margin:5px;">Delete</a>';
                    } else {
                        $actions = '<a  class="btn btn-outline-primary " href="edit_help_content.php?id=' . $row['tutorial_id'] . '">Edit</a> ';
                    }
                }



                $data[] = array(
                    "title" => $row["tutorial_title"],
                    "description" => $row["tutorial_description"],
                    "link" => $row["tutorial_link"],
                    "showcased" => $primary,
                    "actions" => $actions,
                );
            }

            // Send a JSON content type header
            header('Content-Type: application/json');

            echo json_encode($data);
        }
    } else {

        $sql = "SELECT *
        FROM faq
        LEFT JOIN help ON faq.faq_id = help.faq_id
        WHERE faq_category = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $category);  
            $stmt->execute();
            $help_result = $stmt->get_result();

            if ($help_result) {
                if ($help_result->num_rows > 0) {
                    $data = array();

                    while ($row = $help_result->fetch_assoc()) {
                        $imagePath = $row['help_image_path'];
                        $image='';

                if(!is_null($imagePath)){
                    $image = '<button class="btn btn-primary" id="showImage_' . $imagePath . '" data-id="../' . $imagePath . '">Show Image</button>';
                } else {
                    $image = 'No Image';
                }


                

                $actions = '';

                if (isset($_SESSION['admin_id'])) {
                    $id = $_SESSION['admin_id'];

                    $getAdmin = "SELECT * FROM admins WHERE admin_id = $id";
                    $queryAdmin= $conn->query($getAdmin);
                    $row2 = $queryAdmin->fetch_assoc();

                    if ($row2["is_super_admin"] == 1) {
                        $actions = '<a  class="btn btn-outline-primary " href="edit_help_content.php?id=' . $row['help_id'] . '">Edit</a> 
                <button type="button" class="delete-help btn btn-danger" data-help-id =" '.$row['help_id'].'" style = "margin:5px;">Delete</a>';
                    } else {
                        $actions = '<a  class="btn btn-outline-primary " href="edit_help_content.php?id=' . $row['help_id'] . '">Edit</a> ';
                    }
                }

                $data[] = array(
                    "title" => $row["help_title"],
                    "description" => $row["help_description"],
                    "image" => $image,
                    "actions" => $actions,
                );
                    }

                    // Send a JSON content type header
                    header('Content-Type: application/json');
                    echo json_encode($data);
                } else {
                    echo "No results found in the 'help' table for the given category.";
                }
            } else {
                echo "Error executing the query: " . $conn->error;
            }
        } else {
            echo "Error preparing the SQL statement: " . $conn->error;
        }
    }
} else {
    echo "Category not set.";
}
