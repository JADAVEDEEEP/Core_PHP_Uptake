
<?php
// Include database connection
include '../includes/Connection.php';
session_start();

header('Content-Type: application/json'); // Set response as JSON

$response = ['status' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $response['message'] = "All fields are required!";
        echo json_encode($response);
        exit();
    }

    // Fetch the current password from the database using email
    $query = "SELECT password FROM users WHERE email = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($db_password);
        $stmt->fetch();
        $stmt->close();
//////////////////////////////////VALIDATION TROUGH DATABASE//////////////////////////// 
        if (!$db_password) {
            $response['message'] = "No account found with this email!";
        } elseif (!password_verify($old_password, $db_password)) {
            $response['message'] = "Old password is incorrect!";
        } elseif ($old_password === $new_password) {
            $response['message'] = "New password cannot be the same as the old password!";
        } elseif ($new_password !== $confirm_password) {
            $response['message'] = "New password and confirm password do not match!";
        } else {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password in the database
            $update_query = "UPDATE users SET password = ? WHERE email = ?";
            if ($stmt = $mysqli->prepare($update_query)) {
                $stmt->bind_param("ss", $hashed_password, $email);
                if ($stmt->execute()) {
                    $response['status'] = true;
                    $response['message'] = "Password changed successfully! Redirecting to login...";
                } else {
                    $response['message'] = "Error updating password. Please try again.";
                }
                $stmt->close();
            }
        }
    } else {
        $response['message'] = "Database error. Try again later.";
    }
}

// it will retun the response in to the json fromat 
echo json_encode($response);
exit();
?>