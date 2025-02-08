<?php
// Include database connection
include '../includes/Connection.php';
session_start();

$message = "";
$redirect = false; // Flag to trigger redirection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // User enters email
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the current password from the database using email
    $query = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();
    $stmt->close();

    if (!$db_password) {
        $message = "No account found with this email!";
    } elseif (!password_verify($old_password, $db_password)) {
        $message = "Old password is incorrect!";
    } elseif ($old_password === $new_password) {
        $message = "New password cannot be the same as the old password!";
    } elseif ($new_password !== $confirm_password) {
        $message = "New password and Confirm password do not match!";
    } else {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password in the database
        $update_query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            $message = "Password changed successfully! Redirecting to login...";
            $redirect = true; // Set flag to true for redirection
        } else {
            $message = "Error updating password. Please try again.";
        }
        $stmt->close();
    }
}
?>