
<?php
session_start();
include '../includes/Connection.php';


////////////////////////////////////////THIS IS THE USER ASSASATIVE ARRAY GET THE RESSPOMCE FROM LOGIN PAGE DAYNAMICALLY//////////////
$user = $_SESSION['user']; 
//used the real escape sstring to avoid special charascter 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    
/////////////////////////////////////////////////EDIT THAT USER ARRAY USING SQL AND ID /////////////////////
    $userId = $user['id'];
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$userId'";
    
    if (mysqli_query($mysqli, $sql)) {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phone'] = $phone;
        echo "success";
    } else {
        echo "error";
    }
    exit();
}