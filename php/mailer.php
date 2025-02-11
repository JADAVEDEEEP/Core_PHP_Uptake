<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/phpmailer/vendor/autoload.php";

try {
    $mail = new PHPMailer(true);

  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'jadavdeep560@gmail.com';
    $mail->Password   = 'dlny ybsy rbwl ebsa'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

   
    $mail->CharSet = 'UTF-8';

    return $mail;
} catch (Exception $e) {
    error_log("Mailer Error: " . $e->getMessage()); 
    return false; 
}