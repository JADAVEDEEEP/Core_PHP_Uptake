<?php
include '../includes/Connection.php';

//Store all the variabls here who will be in get use 

$nameErr = $emailErr = $phoneErr = $passwordErr = "";
$isValid = true;
$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
//////////////////////////////////////////////AL KIND OF DIFFRENT VALIDATION WITH DIFFRENT REGYLAEEXPRESSION///////////////////////////////////

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

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

    if ($isValid) {
        $email = mysqli_real_escape_string($mysqli, $email);
        $checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
        $checkEmailResult = mysqli_query($mysqli, $checkEmailQuery);

        ///////////////////////////////////////////VALUIDATION FOR DUPLICATE EMAIL//////////////////////////

        if (!$checkEmailResult) {
            $message = "Error checking email: " . mysqli_error($mysqli);
            $toastClass = "error";
        } elseif (mysqli_num_rows($checkEmailResult) > 0) {
            $message = "Email ID already exists";
            $toastClass = "info";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $insertQuery = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($mysqli, $insertQuery);
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $hashedPassword);
            ///////////////////////////////////////////////////////////////SUCCES MESSAGE WITH THE SWEETALERT//////////////////////////////////////////
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                        setTimeout(() => {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Account created successfully',
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = 'login.php';
                            });
                        }, 500);
                    </script>";
            } else {
                $message = "Error: " . mysqli_error($mysqli);
                $toastClass = "error";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($mysqli);
}
?>
