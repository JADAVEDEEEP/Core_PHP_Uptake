<?php
session_start();
require '../includes/Connection.php';

$response = array('success' => false, 'message' => '');

if (isset($_POST['email']) && isset($_POST['new_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

   
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $response['success'] = true;
        $response['message'] = "Your password has been reset successfully.";
    } else {
        $response['message'] = "Failed to reset password. Please try again.";
    }
} else {
    $response['message'] = "Missing data.";
}

echo json_encode($response);
?>