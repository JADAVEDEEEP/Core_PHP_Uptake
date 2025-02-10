<?php

include '../includes/Connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Generate a token and hash it
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);

    // Check if the token already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token_hash = ?");
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Token hash already exists, generating a new one...";
    } else {
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
        $stmt = $conn->prepare("UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?");
        $stmt->bind_param("sss", $token_hash, $expiry, $email);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();

    if ($stmt->affected_rows) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="http://example.com/reset-password.php?token=$token">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            echo "Message sent, please check your inbox.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer: {$mail->ErrorInfo}";
        }
    }
}
?>