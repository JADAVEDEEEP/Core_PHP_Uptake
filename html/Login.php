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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1abc9c, #16a085);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            max-width: 420px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
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
            border-radius: 10px;
            transition: 0.3s;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(26, 188, 156, 0.5);
        }
        .btn-success {
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
            background: #2ecc71;
            border: none;
        }
        .btn-success:hover {
            background: #27ae60;
            transform: scale(1.05);
        }
        .social-icons a {
            font-size: 24px;
            transition: 0.3s;
            margin: 0 10px;
        }
        .social-icons a:hover {
            transform: scale(1.2);
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
                <i class="fa fa-user-circle fa-4x mb-3 text-success"></i>
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
                <p><a href="./register.php" class="text-success fw-bold">Create Account</a> OR <a href="../html/forgot-password.php" class="text-danger fw-bold">Forgot Password</a></p>
            </div>
            <div class="d-flex justify-content-center social-icons">
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
