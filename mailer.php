<?php
include 'connection.php';

$emailQuery = "SELECT * FROM constants WHERE constant_id = 10";
$stmtEmail = $conn->query($emailQuery);
$resultEmail = $stmtEmail->fetch_assoc();


    $email = $resultEmail['text'];


$passwordQuery = "SELECT * FROM constants WHERE constant_id = 11";
$stmtPassword = $conn->query($passwordQuery);
$resultPassword = $stmtPassword->fetch_assoc();


    $password = $resultPassword['text'];





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = $email;
$mail->Password = $password;

$mail->isHTML(true);

return $mail;




?>