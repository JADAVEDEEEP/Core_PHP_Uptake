<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      background: linear-gradient(to right, #8e44ad, #3498db);
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .register-box {
      width: 350px;
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control {
      border-radius: 20px;
      height: 40px;
      font-size: 14px;
    }
    .btn-custom {
      background: linear-gradient(45deg, #8e44ad, #3498db);
      border: none;
      border-radius: 25px;
      padding: 10px;
      color: #fff;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn-custom:hover {
      opacity: 0.8;
    }
    .icon-header {
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
  <div class="register-box text-center">
    <i class="fa fa-user-circle-o icon-header"></i>
    <h5 class="mt-2 mb-3 fw-bold">Create Account</h5>
    
    <div id="alertMessage"></div>
    
    <form id="registerForm">
      <div class="mb-2 text-start">
        <label for="username"><i class="fa fa-user"></i> Username</label>
        <input type="text" name="name" id="username" class="form-control" placeholder="Enter your name">
        <span class="error text-danger" id="nameError"></span>
      </div>

      <div class="mb-2 text-start">
        <label for="email"><i class="fa fa-envelope"></i> Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
        <span class="error text-danger" id="emailError"></span>
      </div>

      <div class="mb-2 text-start">
        <label for="phone"><i class="fa fa-phone"></i> Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number">
        <span class="error text-danger" id="phoneError"></span>
      </div>

      <div class="mb-3 text-start">
        <label for="password"><i class="fa fa-lock"></i> Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
        <span class="error text-danger" id="passwordError"></span>
      </div>

      <button type="submit" class="btn btn-custom w-100">Create Account</button>

      <p class="text-center mt-2 mb-0">
        Already have an account? <a href="./login.php" class="text-decoration-none text-primary">Login</a>
      </p>
    </form>
  </div>

  <script>
    $(document).ready(function(){
      $('#registerForm').on('submit', function(e){
        e.preventDefault();
//DEFINE THE ERROR VARIABLES TO STORE THE BACKEND RISPONCE USING SWAL FIRE MESSAGE S 
        $('#nameError, #emailError, #phoneError, #passwordError, #alertMessage').html('');

        $.ajax({
          url: '../php/Register.php', 
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
            if(response.status === 'success') {
              Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
              }).then(() => {
                window.location.href = 'login.php';
              });
            } else if(response.status === 'info') {
              Swal.fire({
                title: 'Info!',
                text: response.message,
                icon: 'info',
                timer: 3000,
                showConfirmButton: false
              });
              //USED THE TEXT TO GET REPSONCE FROM BACEKND IT USED TO STORE THE COTNENT AND ALOS GET THE CONTENT 
            } else if(response.status === 'error') {
              if(response.errors) {
                $('#nameError').text(response.errors.nameErr);
                $('#emailError').text(response.errors.emailErr);
                $('#phoneError').text(response.errors.phoneErr);
                $('#passwordError').text(response.errors.passwordErr);
              } else {
                $('#alertMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
              }
            }
          },

          ///AJAX ERROR THROW 
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            $('#alertMessage').html('<div class="alert alert-danger">An error occurred while processing your request.</div>');
          }
        });
      });
    });
  </script>
</body>
</html>