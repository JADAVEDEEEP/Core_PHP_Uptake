<?php
include '../php/send-otp.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Forgot Password</h1>
    <form method="post" action="../php/send-otp.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
