<?php
// Include database connection
include '../php/cangepassword.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($redirect) : ?>
        <meta http-equiv="refresh" content="3;url=login.php">
    <?php endif; ?>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h3 class="text-center">Change Password</h3>
                    <hr>
                    <?php if (!empty($message)) : ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                        <?php if ($redirect) : ?>
                            <script>
                                setTimeout(function () {
                                    window.location.href = 'login.php';
                                }, 3000); 
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Old Password:</label>
                            <input type="password" name="old_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>New Password:</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Confirm New Password:</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Change Password</button>
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
