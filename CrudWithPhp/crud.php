<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "regsitration";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nameErr = $emailErr = $passErr = $repeatErr = "";
$name = $email = $password = $repeat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and whitespace allowed";
            $isValid = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $isValid = false;
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passErr = "Password must be at least 8 characters long";
            $isValid = false;
        }
    }

    if (empty($_POST["repeat"])) {
        $repeatErr = "Repeat password is required";
        $isValid = false;
    } else {
        $repeat = test_input($_POST["repeat"]);
        if ($password !== $repeat) {
            $repeatErr = "Passwords do not match";
            $isValid = false;
        }
    }

    if ($isValid) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo "<h2 class='text-success text-center'>Registration Successful!</h2>";
        } else {
            echo "<h2 class='text-danger text-center'>Error: " . mysqli_error($conn) . "</h2>";
        }
    }
}


$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <section class="mt-3">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5">Sign up</p>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-4">
                      <label class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" />
                      <span class="error text-danger"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" />
                      <span class="error text-danger"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" />
                      <span class="error text-danger"><?php echo $passErr; ?></span>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Repeat Password</label>
                      <input type="password" name="repeat" class="form-control" />
                      <span class="error text-danger"><?php echo $repeatErr; ?></span>
                    </div>
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-lg">Register</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex order-2 align-items-center">
                  <img src="../CrudWithPhp/deep.jpg" class="img-fluid h-100 object-fit-contain rounded" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-5">
    <div class="container">
      <h2 class="text-center">Registered Users</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No users found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</body>
</html>

<?php mysqli_close($conn); ?>