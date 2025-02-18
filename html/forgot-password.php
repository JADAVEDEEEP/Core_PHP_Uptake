<?php
include '../php/send-otp.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Forgot Password</h1>
    <form id="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Send OTP</button>
    </form>
    <script>
        $(document).ready(function(){
            $('#post').on('submit',function(){
             $.ajax({
                url:'../php/send-otp.php',
                type:'POST',
                data: $(this).serialize(),
                 dataType: 'json',
             });
             swal.fire({
                text: "Check Your Gmail",
                type: "success"
               }).then(function() {
                 window.location.href = "../html/verify_otp.php";
               })
            });
        });
    </script>
</body>
</html>
