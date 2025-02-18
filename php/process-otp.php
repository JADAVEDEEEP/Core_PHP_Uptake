<?php
session_start();
require '../includes/Connection.php';

$response = array('success' => false, 'message' => '');

if (isset($_POST['email']) && isset($_POST['otp'])) {
    $email = $_POST["email"];
    $otp = $_POST["otp"];

    ////////////////////////////////////////////CHECK THE OTP INSIDE DATBASE /////////////////////
    $sql = "SELECT otp_code, otp_expires_at FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        $response['message'] = "Invalid request.";
    } elseif ($user["otp_expires_at"] < date("Y-m-d H:i:s")) {
        $response['message'] = "OTP has expired.";
    } elseif ($user["otp_code"] !== $otp) {
        $response['message'] = "Invalid OTP.";
    } else {
        $_SESSION['otp_verified'] = true;
        $_SESSION['email'] = $email;
        $response['success'] = true;
        $response['message'] = "OTP verified successfully.";
    }
} else {
    $response['message'] = "Missing email or OTP.";
}

/////////////////////////////////////////GET THE REPONCE IN JASON FROMAT ////////////////////////
echo json_encode($response);
?>