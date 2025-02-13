<?php

include '../includes/Connection.php';

if (isset($_POST['token']) && isset($_POST['email'])) {
    $token = $_POST["token"];
    $email = $_POST["email"];

    // Query to find the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // If no user founda
    if (!$user) {
        die("No user found with this email.");
    }

    // Desbuging For R&D purpose c
    echo "Database Token (Hashed): " . htmlspecialchars($user['reset_token_hash']) . "<br>";
    echo "Token Expiry: " . $user["reset_token_expires_at"] . "<br>";

    // token decryption with hash verify
    if (!password_verify($token, $user["reset_token_hash"])) {
        die("Invalid or expired token.");
    }

    // Check if token is expired
    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("Token has expired.");
    }

    // Validate password
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters.");
    }

    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter.");
    }

    if (!preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number.");
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match.");
    }

    // Hash new password
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Update the password and remove the reset token
    $sql = "UPDATE users 
    SET password = ?, 
        reset_token_hash = NULL, 
        reset_token_expires_at = NULL 
    WHERE email = ?";


    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("ss", $password_hash, $email);
    $stmt->execute();

    echo "Password updated successfully. You can now log in.";
}

?>
