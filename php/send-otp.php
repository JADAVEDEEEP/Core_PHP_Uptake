<?php
session_start();
require '../includes/Connection.php';
require '../php/phpmailer/vendor/autoload.php';

if (isset($_POST['email'])) {
    $email = $_POST["email"];

    $otp = rand(100000, 999999);
    
    
    $expiry = date("Y-m-d H:i:s", time() + 600);
    
    $sql = "UPDATE users SET otp_code = ?, otp_expires_at = ? WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $otp, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows) {
       
        $mail = require __DIR__ . "/mailer.php";
        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset OTP";
        $mail->Body = "Your OTP for password reset is: $otp";

        try {
            $mail->send();
            $_SESSION['email'] = $email;
            header("Location: ../html/verify_otp.php");
            exit();
        } catch (Exception $e) {
            echo "Failed to send OTP. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
