<?php
include '../php/Login.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
 body {
            background: linear-gradient(to right, #8e44ad, #3498db);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            width: 350px;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-container h5 {
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
        }
        .form-control {
            border-radius: 20px;
            height: 40px;
            font-size: 14px;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(26, 188, 156, 0.5);
        }
        .btn-success {
            background: linear-gradient(45deg, #8e44ad, #3498db);
            border: none;
            border-radius: 25px;
            padding: 10px;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-success:hover {
            opacity: 0.8;
        }
        .social-icons a {
            font-size: 24px;
            transition: 0.3s;
            margin: 0 10px;
        }
        .social-icons a:hover {
            font-size: 45px;
            color: #8e44ad;
        }
        label {
            font-size: 14px;
            font-weight: 600;
        }
    </style>
    </style>
</head>

<body>
    <div class="login-container shadow-lg">
        <form id="loginForm">
            <div class="text-center">
                <i class="fa fa-user-circle fa-4x mb-3 text-primary"></i>
                <h5 class="mb-4">Login Into Your Account</h5>
            </div>
            <div class="mb-3">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mb-4 w-100">Login</button>
            <div class="d-flex justify-content:space-between">
                <p><a href="./register.php" class="text-primary fw-bold mx-4">Create Account</a>  <a href="../html/forgot-password.php" class="text-primary fw-bold">Forgot Password</a></p>
            </div>
        
        </form>
    </div>
    
    </div>

   
    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault(); 

                const email = $('#email').val();
                const password = $('#password').val();
                
////////////////////////////LOGIN API /////////////////////////////////////////////////
                $.ajax({
                    type: "POST",
                    url: "Login.php", 
                    data: {email: email, password: password},
                    success: function (response) {
                        const res = JSON.parse(response);

                        if (res.status === "success") {
                           
                            Swal.fire({
                                icon: 'success',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = 'index.php'; 
                            });
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: res.message,
                                showConfirmButton: true
                            });
                        }
                    },
                    //if no reosponce found from the url backend file it will retrun error 
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occurred. Please try again.',
                            showConfirmButton: true
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>