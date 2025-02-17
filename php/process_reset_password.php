<?php
session_start();
require '../includes/Connection.php';

if (!isset($_SESSION['otp_verified']) || !isset($_SESSION['email'])) {
    die("Unauthorized access.");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords do not match.");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters.");
}

if (!preg_match("/[a-z]/i", $_POST["password"]) || !preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one letter and one number.");
}

$email = $_SESSION['email'];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Update password in the database
$sql = "UPDATE users SET password = ?, otp_code = NULL, otp_expires_at = NULL WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $email);
$stmt->execute();

session_destroy();
echo "Password updated successfully. You can now <a href='../html/login.php'>log in</a>.";
?>
