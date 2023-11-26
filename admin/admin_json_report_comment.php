<?php
session_start();
include "connection.php";


    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM ratings WHERE is_reported = 1");
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();

    while ($row = $result->fetch_assoc()) {
        $game_title = '';
        $username = '';
        $thumbnails = '';
        $stmtGame = $conn->prepare("SELECT * FROM published_built_games WHERE published_game_id = $row[published_game_id]");
        $stmtGame->execute();
        $resultGame = $stmtGame->get_result();
        while($rowGame = $resultGame->fetch_assoc()) {
            $game_title = $rowGame['game_name'];
        }

        $stmtUser = $conn->prepare("SELECT * FROM users WHERE user_id = $row[user_id]");
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();
        while($rowUser = $resultUser->fetch_assoc()) {
            $username = $rowUser['username'];
        }


            $thumbnailQuery = "SELECT * FROM ratings_images WHERE rating_id = $row[rating_id]";
            $thumbnailResult = mysqli_query($conn, $thumbnailQuery);

            // Initialize an empty array for templates
            $thumbnailData = array();
            $tno = 0;
            while ($thumbnailRow = mysqli_fetch_assoc($thumbnailResult)) {
                // Add data-id and name to the array
              
                $tno++;
                $thumbnailData[] = array(
                    'id' => $thumbnailRow['rating_image_path'],
                    'name' =>  $tno,
                );
            }

      

            if (!empty($thumbnailData)) {
                foreach ($thumbnailData as $image) {
                    $thumbnails .= '<button class="btn btn-primary showThumbnailBtn" style = "margin:5px;" data-id="' . $image['id'] . '" data-name="' . $image['name'] . '"> Image' . $image['name'] . '</button>';
                }
            } else {
                $thumbnails = 'No Image';
            }

           


            
                        $actions = '
                        <button type="button" class="approve-comment btn btn-success" data-comment-id =" '.$row['rating_id'].'" style = "margin:5px;">Approve</a>
                        <button type="button" class="delete-comment btn btn-danger" data-comment-id =" '.$row['rating_id'].'" style = "margin:5px;">Delete</a>' ;
                    


           


            

            $data[] = array(
                "title" => $game_title,
                "username" => $username,
                "comment" => $row['comment'],
            
                "image" => $thumbnails,
        
                "actions" => $actions,
            );
        
    }

    // Send a JSON content type header
    header('Content-Type: application/json');

    echo json_encode($data);

