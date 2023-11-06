<?php
include "connection.php";

$json = array();
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$resultUsers = $conn->query($sql);
while ($fetched = $resultUsers->fetch_assoc()) {

    $username = $fetched['username'];
    $firstname = $fetched['firstname'];
    $lastname = $fetched['lastname'];
    $phone_number = $fetched['phone_number'];
    $email = $fetched['email'];
    $avatar = $fetched['avatar'];
    


    $row = '

    <div class="row pl-4 pr-4" style="display: flex; flex-direction: row; justify-content: center; align-items:center;">
        <div class="image-mini-container">
            <img src="' . $avatar . '" alt="Admin" class="image-mini">
        </div>
        <button type="button" class="btn edit-btn-avatar"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
    </div>



    <div class="container">
        <h4 class="d-flex justify-content-center">'.$username.'</h4>
        <p class="text-secondary mb-1 d-flex justify-content-center">'.$firstname .'&nbsp;'. $lastname.'</p>
        <p class="text-muted font-size-sm d-flex justify-content-center">'.$email.'</p>
    </div>


    ';


    $json[] = array(
        "row" => $row,

    );
}



echo json_encode($json);
