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
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Page</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h5 {
            font-weight: bold;
            color: #2c3e50;
        }
        .login-container i {
            color: #27ae60;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-success {
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-success:hover {
            background: #1e8449;
        }
        .social-icons a {
            font-size: 24px;
            transition: 0.3s;
        }
        .social-icons a:hover {
            transform: scale(1.1);
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
                <i class="fa fa-user-circle fa-4x mb-3"></i>
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
            <button type="submit" class="btn btn-success w-100">Login</button>
            <div class="mt-3 text-center">
                <p><a href="./register.php" class="text-success fw-bold">Create Account</a> OR <a href="./resetpassword.php" class="text-danger fw-bold">Forgot Password</a></p>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-3 social-icons">
                <a href="#" class="text-primary"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-danger"><i class="fab fa-instagram"></i></a>
            </div>
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
