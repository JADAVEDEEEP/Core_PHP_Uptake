<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: forgot_password.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Verify OTP</h1>
    <form method="post" action="../php/process-otp.php">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <label for="otp">Enter OTP</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
