<?php
include '../php/process-reset-password.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Reset Password</h1>

    <form action="../php/process-reset-password.php" method="POST">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="New Password">
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <button type="submit">Reset Password</button>
</form>


</body>
</html>