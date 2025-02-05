<?php
session_start();
include('../includes/Connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT id, name, email, phone, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email, $phone, $db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) { 
         
            $_SESSION['user'] = [
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
             
               
            ];

            $_SESSION['message'] = "Login successful. Welcome, $name!";
            $_SESSION['toastClass'] = "bg-success";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['message'] = "Incorrect password"; 
            $_SESSION['toastClass'] = "bg-danger";
            header("Location: login.php"); 
            exit();
        }
    } else {
        $_SESSION['message'] = "Email not found"; 
        $_SESSION['toastClass'] = "bg-warning";
        header("Location: login.php"); 
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>