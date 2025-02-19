<?php
// Include database connection
include '../includes/Connection.php';
session_start();

header('Content-Type: application/json'); // Set response as JSON

$response = ['status' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if any field is empty
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $response['message'] = "All fields are required.";
        echo json_encode($response);
        exit();
    }

    // Validate password length
    if (strlen($new_password) < 6) {
        $response['message'] = "New password must be at least 6 characters long.";
        echo json_encode($response);
        exit();
    }

    if ($new_password !== $confirm_password) {
        $response['message'] = "New password and confirm password do not match.";
        echo json_encode($response);
        exit();
    }

    // Fetch the current password from the database using session email
    $email = $_SESSION['user']['email'];
    $query = "SELECT password FROM users WHERE email = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($db_password);
        $stmt->fetch();
        $stmt->close();

        // Check if the old password matches the one in the database
        if (!$db_password) {
            $response['message'] = "No account found with this email!";
        } elseif (!password_verify($old_password, $db_password)) {
            $response['message'] = "Old password is incorrect!";
        } elseif ($old_password === $new_password) {
            $response['message'] = "New password cannot be the same as the old password!";
        } else {
            // Hash the new password and update in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
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

// Return response as JSON
echo json_encode($response);
exit();
?>