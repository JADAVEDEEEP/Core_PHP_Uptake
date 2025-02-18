<?php
session_start();
require '../includes/Connection.php';

if (!isset($_SESSION['otp_verified']) || !isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit();
}

if (strlen($_POST["password"]) < 8) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters.']);
    exit();
}

if (!preg_match("/[a-z]/i", $_POST["password"]) || !preg_match("/[0-9]/", $_POST["password"])) {
    echo json_encode(['success' => false, 'message' => 'Password must contain at least one letter and one number.']);
    exit();
}

$email = $_SESSION['email'];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Update password in the database
$sql = "UPDATE users SET password = ?, otp_code = NULL, otp_expires_at = NULL WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $email);

if ($stmt->execute()) {
   
    echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
} else {
   
    echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
}

session_destroy();
?>