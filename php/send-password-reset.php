<?php

require '../php/phpmailer/vendor/autoload.php';

if (isset($_POST['email'])) {
    $email = $_POST["email"];

    // Generate a random token
    $token = bin2hex(random_bytes(16)); 

    // token ecryption with hash
    $token_hash = password_hash($token, PASSWORD_DEFAULT);

    // expirydate 
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    // Database connection
    $mysqli = require '../includes/Connection.php';

    // Store the hashed token in the database
    $sql = "UPDATE users
            SET reset_token_hash = ?, 
                reset_token_expires_at = ?
            WHERE email = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="http://localhost/xampp/Core_PHP_Uptake-Day13_core_PHP/CrudNew/html/reset_password.php?token=$token&email=$email">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            echo "Message sent, please check your inbox.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with this email.";
    }
}

?>
