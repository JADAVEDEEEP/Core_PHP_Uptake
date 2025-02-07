<?php
include '../includes/Connection.php';

$message = "";
$toastClass = "";
$nameErr = $emailErr = $phoneErr = $passwordErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $phone = test_input($_POST['phone']);

   
    if (empty($name)) {
        $nameErr = "Name is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and whitespace allowed";
        $isValid = false;
    }

  
    if (empty($phone)) {
        $phoneErr = "Phone number is required";
        $isValid = false;
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $phoneErr = "Invalid phone number format (10 digits required)";
        $isValid = false;
    }

    
    if (empty($password)) {
        $passwordErr = "Password is required";
        $isValid = false;
    } elseif (strlen($password) < 8) {
        $passwordErr = "Password must be at least 8 characters long";
        $isValid = false;
    } elseif (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $passwordErr = "Password must contain at least one letter and one number";
        $isValid = false;
    }

    // Email validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

    if ($isValid) {
       
        $email = mysqli_real_escape_string($conn, $email);
        $checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (!$checkEmailResult) {
            $message = "Error checking email: " . mysqli_error($conn);
            $toastClass = "#dc3545";
        } elseif (mysqli_num_rows($checkEmailResult) > 0) {
            $message = "Email ID already exists";
            $toastClass = "#007bff";
        } else {
            
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $insertQuery = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashedPassword);
            
            if (mysqli_stmt_execute($stmt)) {
                $message = "Account created successfully";
                $toastClass = "#28a745";
                header("Location: login.php"); 
            } else {
                $message = "Error: " . mysqli_error($conn);
                $toastClass = "#dc3545";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}
?>