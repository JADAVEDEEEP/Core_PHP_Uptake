<?php
include '../html/Sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .password-eye {
            cursor: pointer;
        }
    </style>
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
                            <label>Old Password:</label>
                            <div class="input-container" style="position: relative;">
                                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter your old password">
                                <span class="password-eye" id="toggleOldPassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>New Password:</label>
                            <div class="input-container" style="position: relative;">
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your new password">
                                <span class="password-eye" id="toggleNewPassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Confirm New Password:</label>
                            <div class="input-container" style="position: relative;">
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm your new password">
                                <span class="password-eye" id="toggleConfirmPassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
                            </div>
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
            $("#toggleOldPassword").click(function () {
                let input = $("#old_password");
                let type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
            });
            $("#toggleNewPassword").click(function () {
                let input = $("#new_password");
                let type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
            });
            $("#toggleConfirmPassword").click(function () {
                let input = $("#confirm_password");
                let type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
            });

            // Submit the form
            $("#changePasswordForm").submit(function (event) {
                event.preventDefault();

                // Clear any previous messages
                const messageDiv = $("#message");
                messageDiv.removeClass("d-none alert-danger alert-success");

                $.ajax({
                    url: '../php/changePassword.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        messageDiv.removeClass("d-none alert-danger alert-success");
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
                        messageDiv.removeClass("d-none").addClass("alert-danger").text("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>
</body>
</html>