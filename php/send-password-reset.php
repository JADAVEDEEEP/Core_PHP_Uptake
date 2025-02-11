<?php

include '../includes/Connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

  
    $stmt = $mysqli->prepare("UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?");
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $mail = require __DIR__ . "/mailer.php";

        if (!$mail) {
            die("Mailer failed to initialize.");
        }

        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->isHTML(true);
        $mail->Body = <<<END
        <p>Click <a href="../php/reset_password.php?token=$token">here</a> to reset your password.</a>.</p>
        
        END;

        try {
            $mail->send();
            echo "Message sent, please check your inbox.";
            header("Location: reset_password.php"); 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with this email.";
    }

    $stmt->close();
    $mysqli->close();
}

?>