<?php
session_start();
if (!isset($_SESSION['otp_verified']) || !isset($_SESSION['email'])) {
    header("Location: forgot_password.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Reset Password</h1>
    <form id="post">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <button type="submit">Reset Password</button>
    </form>
    <script>
    $(document).ready(function(){
    $('#post').on('submit', function(e){
        e.preventDefault();  // Prevent the default form submission behavior
        $.ajax({
            url: '../php/process_reset_password.php',
            type: 'POST',
            data: $(this).serialize(),  // Serialize form data
            dataType: 'json',  // Expect a JSON response
            success: function(response) {
                if(response.success) {
                    // Show success message and redirect
                    Swal.fire({
                        title: "Password Successfully Updated",
                        text: "Check Your Gmail",
                        icon: "success"
                    }).then(function() {
                        window.location.href = "../html/Login.php";
                    });
                } else {
                    // Show error message if something goes wrong
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error"
                    });
                }
            },
            error: function(xhr, status, error) {
                // Show a generic error message if something goes wrong with the AJAX request
                Swal.fire({
                    title: "Error",
                    text: "An error occurred. Please try again.",
                    icon: "error"
                });
            }
        });
    });
});

    </script>
</body>
</html>
