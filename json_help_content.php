<?php
include "connection.php"; // Include your database connection script

$help_id = $_GET['help_id'];

$sqlHelp = "SELECT * FROM help WHERE help_id = $help_id";
$resultHelp = $conn->query($sqlHelp);

$data = array();

$help = $resultHelp->fetch_assoc();

$formatted_description = nl2br(htmlspecialchars($help['help_description']));


$item = '
    <div class="row p-2 mb-3 d-flex justify-content-between">
        <div class="col d-flex justify-content-start">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <h3>' . $help['help_title'] . '</h3>
                    <p class="mb-0" style="color:white; padding:5px;">' . $formatted_description . '</p>';

                    if (!is_null($help['help_image_path'])){
                        $item .= '<img src="' . $help['help_image_path'] . '" style="width:550px; height:350px; margin:40px;">';
                    }
                    
$item .= '       </div>
            </div>
        </div>
    </div>';



$data[] = array(
    "item" => $item,
);

echo json_encode($data);
