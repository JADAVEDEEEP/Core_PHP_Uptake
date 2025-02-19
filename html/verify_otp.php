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
</head>
<body>
    <h1>Verify OTP</h1>
    
    <!-- OTP Form -->
    <form id="otpForm">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <label for="otp">Enter OTP</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>

    <!-- Reset Password Form (hidden initially) -->
    <form id="resetPasswordForm" style="display: none;">
        <div class="mb-3">
            <label>New Password:</label>
            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your new password" required>
        </div>
        <div class="mb-3">
            <label>Confirm New Password:</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm your new password" required>
        </div>
        <button type="submit">Reset Password</button>
    </form>

    <script>
        $(document).ready(function(){
            
            $('#otpForm').on('submit', function(e){
                e.preventDefault(); 
                
                $.ajax({
                    url: '../php/process-otp.php',  
                    type: 'POST',
                    data: $(this).serialize(), 
                    dataType: 'json', 
                    success: function(response){
                        if(response.success) {
                            // Hide OTP form and show reset password form
                            $('#otpForm').hide();
                            $('#resetPasswordForm').show();
                            
                            Swal.fire({
                                title: "OTP Verification",
                                text: response.message,
                                icon: "success",
                                timer: 3000
                            });
                        } else {
                            Swal.fire({
                                title: "OTP Verification",
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

   
            $('#resetPasswordForm').on('submit', function(e){
                e.preventDefault();
                
                // Get form data for password reset
                var newPassword = $('#new_password').val();
                var confirmPassword = $('#confirm_password').val();

                // Validate passwords
                if (newPassword !== confirmPassword) {
                    Swal.fire({
                        title: "Password Mismatch",
                        text: "New password and confirm password do not match.",
                        icon: "error",
                    });
                    return;
                }

                
                $.ajax({
                    url: '../php/process_reset_password.php',  
                    type: 'POST',
                    data: { 
                        email: '<?php echo $_SESSION['email']; ?>',
                        new_password: newPassword
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.success) {
                            Swal.fire({
                                title: "Password Reset",
                                text: response.message,
                                icon: "success",
                                timer: 3000,
                                willClose: function() {
                                    window.location.href = "login.php"; // Redirect after successful reset
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
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