<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM addresses WHERE user_id = $user_id";
$resultAddresses = $conn->query($sql);

$data = array();

$radioGroupName = 'address_radio'; // Common name for the radio button group

while ($row = $resultAddresses->fetch_assoc()) {
    $radioId = 'address_radio_' . $row['address_id']; // Unique ID for each radio button

    $isChecked = $row['is_default'] == 1 ? 'checked' : ''; // Check if is_default is 1

    
        $is_default = '';

        if ($row['is_default'] == 1) {
            $is_default = '<span class="p-1 m-2"  cursor="pointer" style="border: 2px solid #b660e8; color: #b660e8; border-radius: 7px; width:60px;">Default</span>
            ';
        } else {
            $is_default = '<span class="p-1 m-2 change-address" data-address-id="' . $row['address_id'] . '" style="border: 2px solid white; color: white; background-color: #16162a; width:100px;  border-radius: 7px; cursor: pointer">
            Make Default
        </span>
        ';
        }

    $address = '<div class="card mb-3" style="background: rgba(39, 42, 78, 0.57);
                border-radius: 7px 7px 7px 7px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(5.7px);
                -webkit-backdrop-filter: blur(5.7px);
                width:650px;
                margin-left:10px;
                padding:20px;">

                '.$is_default.'
                <br>

            <div class="container">
            
            <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['fullname'] . '
            </div>
        </div>
        

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Number:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['number'] . '
            </div>
        </div>

         <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Region:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['region'] . '
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Province:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['province'] . '
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">City:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['city'] . '
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Barangay:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['barangay'] . '
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Zip Code:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['zip'] . '
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Street:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
            ' . $row['street'] . '
            </div>
        </div>
        <br>
  

                    <button type="button" class="btn edit-profile-details" data-address-id="' . $row['address_id'] . '">Edit</button>

                   <button type="button" class="btn delete-address" data-address-id="' . $row['address_id'] . '" style = background:red;color:white;margin-left:450px;>Delete</button>


            </div>
            </div>
        
        
        
    ';


 



    $data[] = array(
        "address" => $address,
        

    );
}

echo json_encode($data);
