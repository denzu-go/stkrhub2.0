<?php
include "connection.php";
$data = array();

$item1 = 'item1';
$item2 = 'item2';


$data[] = array(
    "item1" => $item1,
    "item2" => $item2,
);


echo json_encode($data);
