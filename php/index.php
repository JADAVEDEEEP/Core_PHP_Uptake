<?php
session_start();

if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user']; 



$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    include '../includes/Connection.php';
    $userId = $user['id'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$userId'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phone'] = $phone;
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
