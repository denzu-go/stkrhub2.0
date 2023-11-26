<?php
// Include the connection file to use the existing $conn variable
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Access form data sent via AJAX
    $rating_id = $_POST['rating_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Set the time zone to Manila
    date_default_timezone_set('Asia/Manila');
    $manilaTime = date('Y-m-d H:i:s'); // Get the current date and time in the Manila time zone

    // SQL query to update the existing record based on rating_id
    $sql = "UPDATE ratings SET rating = '$rating', comment = '$comment', date_time = '$manilaTime' WHERE rating_id = $rating_id";

    if ($conn->query($sql) === TRUE) {

        $sqlPID = "SELECT * FROM ratings WHERE rating_id = $rating_id";
        $result = mysqli_query($conn, $sqlPID);
        $row = mysqli_fetch_assoc($result);
        $published_game_id = $row["published_game_id"];

        $sqlRating = "SELECT published_game_id, AVG(rating) AS average_rating 
        FROM ratings 
        WHERE published_game_id = $published_game_id
        GROUP BY published_game_id";

        $query = mysqli_query($conn, $sqlRating);

        if ($query) {
            $row = mysqli_fetch_assoc($query);

            if ($row) {
                $averageRating = $row['average_rating'];

                $sqlUpdate = "UPDATE published_built_games 
                SET game_rating = $averageRating 
                WHERE published_game_id = $published_game_id";

                $queryUpdate = mysqli_query($conn, $sqlUpdate);

                if ($queryUpdate) {
                    echo 'Ratings updated successfully.';
                } else {
                    // An error occurred during the update
                    echo 'Error updating ratings: ' . mysqli_error($conn);
                }
            } else {
                // No matching record found in the ratings table
                echo 'No rating data found for this game.';
            }
        } else {
            // Query execution failed
            echo 'Error: ' . mysqli_error($conn);
        }


        if (isset($_POST["thumbnail_id"]) && isset($_FILES["thumbnail_file"])) {
            $thumbnailIds = $_POST["thumbnail_id"];
            
            // Loop through the uploaded files
            foreach ($_FILES["thumbnail_file"]["tmp_name"] as $index => $tmpFile) {
                // Get thumbnail ID, name, and the temporary file path
                $thumbnailId = $thumbnailIds[$index];
                $thumbnailFileName = $_FILES["thumbnail_file"]["name"][$index];
                $thumbnailTmp = $_FILES["thumbnail_file"]["tmp_name"][$index];
                
                // Generate a unique filename
                $uniqueFilename = uniqid() . "_" . $thumbnailFileName;
                
                // Set your upload directory
                $uploadDirectory = "assets/comment_assets/";
                $uploadPath = $uploadDirectory . $uniqueFilename;
                
                // Ensure the directory exists, create it if not
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }
                
                // Move the uploaded file to the target directory
                if (move_uploaded_file($thumbnailTmp, $uploadPath)) {
                    // File uploaded successfully, update the database
                    // Use prepared statements to update the database safely

                    $sql = "UPDATE ratings_images SET rating_image_path = ? WHERE rating_image_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si", $uploadPath, $thumbnailId);
        
                    if ($stmt->execute()) {
                        echo "Thumbnail with ID $thumbnailId updated successfully.";
                    } else {
                        echo "Error updating thumbnail with ID $thumbnailId: " . $stmt->error;
                    }
        
                    $stmt->close();
                } else {
                    echo "Error uploading file for thumbnail with ID $thumbnailId.";
                }
            }
          
        }




        $numberOfThumbnails = isset($_POST["No_thumbnail"]) ? intval($_POST["No_thumbnail"]) : 0; // Number of thumbnails submitted

    $thumbnailUploadedFiles = array();

    for ($i = 1; $i <= $numberOfThumbnails; $i++) {
        $thumbnailFileKey = "thumbnailCode$i";
    
        if (isset($_FILES[$thumbnailFileKey])) {
            $thumbnailFileName = $_FILES[$thumbnailFileKey]["name"];
            $thumbnailFiles[] = $thumbnailFileName;
    
            // Generate a unique filename to avoid overwriting
            $uniqueFilename = uniqid() . "_" . $thumbnailFileName;
    
            // Upload the thumbnail file
            $uploadDirectory = "assets/comment_assets/"; // Set your upload directory
            // Ensure the directory exists, create it if not
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
    
            $uploadPath = $uploadDirectory . $uniqueFilename;
    
            if (move_uploaded_file($_FILES[$thumbnailFileKey]["tmp_name"], $uploadPath)) {
                // File uploaded successfully, store its path
                $uploadPath;
                $thumbnailUploadedFiles[] = $uploadPath;
            }
        }
    }

    if (!empty($thumbnailUploadedFiles)) {
        // Assuming you have a valid $componentId
    
        foreach ($thumbnailUploadedFiles as $index => $thumbnailUploadedFile) {

            $stmt = $conn->prepare("INSERT INTO ratings_images (rating_id, rating_image_path) VALUES (?, ?)");
            $stmt->bind_param("is", $rating_id, $thumbnailUploadedFile);
    
            if ($stmt->execute()) {
                echo "images recorded successfully.";
            } else {
                echo "Error inserting thumbnail: " . $stmt->error;
            }

            
            
        }
    }





        // The record was updated successfully
        echo 'Rating ID: ' . $rating_id . ' has been updated.';
    } else {
        // An error occurred
        echo 'Error: ' . $conn->error;
    }
} else {
    // Handle other request methods or errors
    echo 'Invalid request';
}
