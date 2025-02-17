<?php
session_start();
require '../includes/Connection.php';

if (isset($_POST['email']) && isset($_POST['otp'])) {
    $email = $_POST["email"];
    $otp = $_POST["otp"];

   
    $sql = "SELECT otp_code, otp_expires_at FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Invalid request.");
    }

    if ($user["otp_expires_at"] < date("Y-m-d H:i:s")) {
        die("OTP has expired.");
    }

    if ($user["otp_code"] !== $otp) {
        die("Invalid OTP.");
    }

    $_SESSION['otp_verified'] = true;
    $_SESSION['email'] = $email;
    header("Location: ../html/reset_password.php");
    exit();
}
?>
