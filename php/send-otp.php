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
        $mail->Body = "A sign in attempt requires further verification because we did not recognize your device. To complete the sign in, enter the verification code on the unrecognized device.

Device: Chrome on Windows
Verification code:  $otp;

If you did not attempt to sign in to your account, your password may be compromised. Visit https://github.com/settings/security to create a new, strong password for your GitHub account.

If you'd like to automatically verify devices in the future, consider enabling two-factor authentication on your account. Visit https://docs.github.com/articles/configuring-two-factor-authentication to learn about two-factor authentication.

If you decide to enable two-factor authentication, ensure you retain access to one or more account recovery methods. See https://docs.github.com/articles/configuring-two-factor-authentication-recovery-methods in the GitHub Help.

Thanks,
The Uptake Team


            ";

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
