
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h3 class="text-center">Change Password</h3>
                    <hr>
                    <div id="message" class="alert d-none"></div>
                    <form id="changePasswordForm">
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

    <script>
        $(document).ready(function () {
            $("#changePasswordForm").submit(function (event) {
                event.preventDefault(); // Prevent form submission
///////////////////////////////////////CHANGE PASSWORD API//////////////////////////////////////
                $.ajax({
                    url: '../php/changePassword.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    //Show the error message 
                    success: function (response) {
                         const messageDiv = $("#message");
                        messageDiv.removeClass("d-none alert-danger alert-success");
                   //or it wwill add the class of success message if risponce is correct and refirect to login 
                        if (response.status) {
                            messageDiv.addClass("alert-success").text(response.message);
                            setTimeout(function () {
                                window.location.href = "login.php";
                            }, 3000);
                        } else {
                            messageDiv.addClass("alert-danger").text(response.message);
                        }
                    },
                    error: function () {
                        $("#message").removeClass("d-none").addClass("alert-danger").text("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>
</body>
</html>