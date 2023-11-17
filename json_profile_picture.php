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

    $firstLetter = substr($username, 0, 1);
    $firstLetter = strtoupper($firstLetter);


    $row = '';


    if (!is_null($avatar)) {

        $row = '

    <div class="row pl-4 pr-4" style="display: flex; flex-direction: row; justify-content: center; align-items:center;">
        <div class="image-mini-container">
            <img src="' . $avatar . '" alt="Admin" class="image-mini">
        </div>
        <button type="button" class="btn edit-btn-avatar"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
    </div>



    <div class="container">
        <h4 class="d-flex justify-content-center">' . $username . '</h4>
        <p class="text-secondary mb-1 d-flex justify-content-center">' . $firstname . '&nbsp;' . $lastname . '</p>
        <p class="text-muted font-size-sm d-flex justify-content-center">' . $email . '</p>
    </div>


    ';
    } else {
        $row = '
            <div class="row pl-4 pr-4" style="display: flex; flex-direction: row; justify-content: center; align-items:center;">
                <div class="" style="display: flex; justify-content: center; align-items: center; height: 210px; width: 210px;
                background: rgb(38,211,224);
                background: linear-gradient(90deg, rgba(38,211,224,1) 0%, rgba(182,96,232,1) 100%);
                ">
                <p style="font-family: sans-serif; font-weight: bold; font-size:47px; padding-top: 18px; color: white;">' . $firstLetter . '</p>

                </div>
            </div>


        </div>
        </div>



    <div class="container">
        <h4 class="d-flex justify-content-center">' . $username . '</h4>
        <p class="text-secondary mb-1 d-flex justify-content-center">' . $firstname . '&nbsp;' . $lastname . '</p>
        <p class="text-muted font-size-sm d-flex justify-content-center">' . $email . '</p>
    </div>


    ';
    }


    $json[] = array(
        "row" => $row,

    );
}



echo json_encode($json);
