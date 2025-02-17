<?php
include '../includes/Connection.php';

// Error variables from front end 
$nameErr = $emailErr = $phoneErr = $passwordErr = "";
$isValid = true;
$response = array();

// function to santize hthe input 
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //santize inputs 
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $phone = test_input($_POST['phone']);

    // validtion for the name 
    if (empty($name)) {
        $nameErr = "Name is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and whitespace allowed";
        $isValid = false;
    }

    // Validate foor the phone 
    if (empty($phone)) {
        $phoneErr = "Phone number is required";
        $isValid = false;
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $phoneErr = "Invalid phone number format (10 digits required)";
        $isValid = false;
    }

    // Validattion for the passworf 
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

    // Validate for the email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

    // If validation fails, return errors as JSON
    if (!$isValid) {
        $response['status'] = 'error';
        $response['errors'] = array(
            'nameErr'     => $nameErr,
            'emailErr'    => $emailErr,
            'phoneErr'    => $phoneErr,
            'passwordErr' => $passwordErr
        );
        echo json_encode($response);
        exit;
    }

    // Escape email for the query and check for duplicate email
    $emailEscaped = mysqli_real_escape_string($mysqli, $email);
    $checkEmailQuery = "SELECT email FROM users WHERE email = '$emailEscaped'";
    $checkEmailResult = mysqli_query($mysqli, $checkEmailQuery);

    if (!$checkEmailResult) {
        $response['status']  = 'error';
        $response['message'] = "Error checking email: " . mysqli_error($mysqli);
        echo json_encode($response);
        exit;
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        $response['status']  = 'info';
        $response['message'] = "Email ID already exists";
        echo json_encode($response);
        exit;
    } else {
        // Insert new user record
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $insertQuery = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($mysqli, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashedPassword);
        
        if (mysqli_stmt_execute($stmt)) {
            $response['status']  = 'success';
            $response['message'] = 'Account created successfully';
        } else {
            $response['status']  = 'error';
            $response['message'] = "Error: " . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($mysqli);
    echo json_encode($response);
    exit;
}
?>