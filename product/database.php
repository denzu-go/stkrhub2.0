<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$host = "localhost";
$userName = "root";
$password = "";
$dbName = "projects";
$conn =  mysqli_connect($host, $userName, $password, $dbName);
if (!$conn) die(mysqli_connect_error($conn));
