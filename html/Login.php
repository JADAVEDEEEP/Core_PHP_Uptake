<?php
include '../php/Login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>

<body>
    <div class="login-container shadow-lg">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="toast align-items-center text-white <?php echo $_SESSION['toastClass']; ?> border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php 
                        echo $_SESSION['message']; 
                        unset($_SESSION['message']); 
                        unset($_SESSION['toastClass']);
                        ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <form action="Login.php" method="post">
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
                <p><a href="./register.php" class="text-primary fw-bold mx-3">Create Account</a>  <a href="../html/forgot-password.php" class="text-primary fw-bold">Forgot Password</a></p>
            </div>
            </div>
            
                <a href="#" class="fa fa-google"></a>
        </form>
    </div>
    

    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, { delay: 3000 });
        });
        toastList.forEach(toast => toast.show());
    </script>
</body>
</html>
