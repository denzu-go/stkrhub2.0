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

    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            '.$username .'
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            '.$firstname .'&nbsp;'. $lastname.'
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            '.$email.'
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            '.$phone_number.'
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <button class="btn edit-profile-details" date-user_id="'.$user_id.'">Edit</button>
        </div>
    </div>

    ';


    $json[] = array(
        "row" => $row,

    );
}



echo json_encode($json);
