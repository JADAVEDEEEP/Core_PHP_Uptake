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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Verify OTP</h1>
    <form id="post">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <label for="otp">Enter OTP</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
    <script>
       $(document).ready(function(){
    $('#post').on('submit', function(e){
        e.preventDefault(); 
        
        $.ajax({
            url: '../php/process-otp.php',  
            type: 'POST',
            data: $(this).serialize(), 
            dataType: 'json', 
            success: function(response){
                if(response.success) {
                    
                    Swal.fire({
                        title: "OTP VERIFICATION",
                        text: response.message,
                        icon: "success",
                        timer: 3000,
                        willClose: function() {
                    
                            window.location.href = "../html/reset_password.php";
                        }
                    });
                } else {
                   
                    Swal.fire({
                        title: "OTP VERIFICATION",
                        text: response.message,
                        icon: "error",
                    });
                }
            },
            error: function(){
                Swal.fire({
                    title: "ERROR",
                    text: "Something went wrong. Please try again later.",
                    icon: "error",
                });
            }
        });
    });
});
    
    </script>
</body>
</html>
