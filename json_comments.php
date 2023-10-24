<?php
include "connection.php";
$json = array();

$published_game_id = $_GET['published_game_id'];
$user_id = $_GET['user_id'];

$sqlReview = "SELECT * FROM ratings WHERE published_game_id = $published_game_id ORDER BY date_time DESC";
$resultReview = $conn->query($sqlReview);
while ($fetchedReview = $resultReview->fetch_assoc()) {
    $rating_id = $fetchedReview['rating_id'];
    $rating = $fetchedReview['rating'];
    $comment = $fetchedReview['comment'];
    $user_id = $fetchedReview['user_id'];
    $date_time = $fetchedReview['date_time'];

    $dateTime = new DateTime($date_time);
    $formattedDate = $dateTime->format('M. d, Y g:ia');

    $avatar = "SELECT * FROM users WHERE user_id = $user_id";
    $result = $conn->query($avatar);
    while ($fetchedAvatar = $result->fetch_assoc()) {
        $avatar = $fetchedAvatar['avatar'];
        $username = $fetchedAvatar['username'];

        $firstLetter = strtoupper(substr($username, 0, 1));
    }

    if (!is_null($avatar)) {
        $avatar_value = '
            <div style="position: relative; display: inline-block; width: 40px; height: 40px; border-radius: 50%; background-color: #333;">
                <img src="' . $avatar . '" alt="" style="
                        position: absolute;
                        top: 0;
                        left: 0;

                        height: 100%;
                        width: 100%;
                        object-fit: cover;
                        border-radius: 50%;
                ">

            </div>
        ';
    } else {
        $avatar_value = '
            <div style="position: relative; display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 50%;
            background: rgb(38,211,224);
            background: linear-gradient(90deg, rgba(38,211,224,1) 0%, rgba(182,96,232,1) 100%);">
            
                <p style="font-family: sans-serif; color: white; font-weight: bold; font-size:17px; padding-top: 0px;">' . $firstLetter . '</p>

            </div>
        ';
    }


    $item = '
        <div class="review_item" style="
            padding: 20px;    

            background: rgba(39, 42, 78, 0.27);
            border-radius: 15px 15px 15px 15px;
            box-shadow: 0 4px 1px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5.7px);
            -webkit-backdrop-filter: blur(5.7px);
        ">
            <div class="media d-flex justify-content-between">
                <div class="d-flex">
                    ' . $avatar_value . '
                </div>
                <div class="media-body" style="line-height:0px;">
                    <h4>' . $username . '</h4>';

    for ($i = 0; $i < $rating; $i++) {
        $item .= '<i class="fa fa-star"></i>';
    }

    $item .='
                </div>

                <div class="">
                    ' . $formattedDate . '
                </div>
            </div>

            <p>
                ' . $comment . '
            </p>

        </div>
    ';

    $json[] = array(
        "item" => $item,
    );
}
echo json_encode($json);
