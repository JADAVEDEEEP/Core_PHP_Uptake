<?php
////////////////////////////////////////////////////////////////////// MYSQL CONNECTION WITH DATABASE  //////////////////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$database = "regsitration"; 

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

///////////////////////////////////////////////////////////// VALIDATION AND DATA PROCESSING //////////////////////////////////////
$nameErr = $emailErr = $passErr = $repeatErr = "";
$name = $email = $password = $repeat = "";
$edit_id = $edit_name = $edit_email = $edit_password = "";

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

    //////////////////////////////////////////////// INSERT OR UPDATE DATA IN DATABASE ////////////////////////////////////////////////
    if ($isValid) {
  
        if (!empty($_POST["edit_id"])) {
            $edit_id = intval($_POST["edit_id"]);
            $updateQuery = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$edit_id";

            if (mysqli_query($conn, $updateQuery)) {
                echo "<h2 class='text-success text-center'>User Updated Successfully!</h2>";
            } else {
                echo "<h2 class='text-danger text-center'>Error updating user: " . mysqli_error($conn) . "</h2>";
            }
        } else {
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<h2 class='text-success text-center'>Registration Successful!</h2>";
            } else {
                echo "<h2 class='text-danger text-center'>Error: " . mysqli_error($conn) . "</h2>";
            }
        }
    }
}
////////////////////////////////////////////////////////////////GET USER FROM DATBASE //////////////////////////////////////////////
$sql = "SELECT id, name, email, password FROM users";
$result = $conn->query($sql);

//////////////////////////////////////////////////////// DELETE USER WITH DATBASE  //////////////////////////////////////////////////////
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<h2 class='text-success text-center'>User Deleted Successfully!</h2>";
    } else {
        echo "<h2 class='text-danger text-center'>Error deleting user: " . mysqli_error($conn) . "</h2>";
    }
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

//////////////////////////////////////////////////////// EDIT USER WITH DATBASE  //////////////////////////////////////////////////////
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $editQuery = "SELECT * FROM users WHERE id = $edit_id";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult && mysqli_num_rows($editResult) > 0) {
        $editRow = mysqli_fetch_assoc($editResult);
        $edit_name = $editRow['name'];
        $edit_email = $editRow['email'];
        $edit_password = $editRow['password'];
    }
}
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
<!----------------------------------------------------REGISTED USER FORM  ------------------------------------------------------------>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                            <div class="col-md-10 col-lg-6 col-xl-5">
                                <p class="text-center h1 fw-bold mb-5">
                                 

                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">

                                    <div class="mb-4">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $edit_name; ?>" />
                                        <span class="error text-danger"><?php echo $nameErr; ?></span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $edit_email; ?>" />
                                        <span class="error text-danger"><?php echo $emailErr; ?></span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" value="<?php echo $edit_password; ?>" />
                                        <span class="error text-danger"><?php echo $passErr; ?></span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="repeat" class="form-control" value="<?php echo $edit_password; ?>" />
                                        <span class="error text-danger"><?php echo $repeatErr; ?></span>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-<?php echo ($edit_id) ? "warning" : "success"; ?> btn-lg">
                                            <?php echo ($edit_id) ? "Update" : "Register"; ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------------------------------------------------REGISTED USERS RECCORDS TABLE FROM DATABASE------------------------------------------------------------>
<section class="mt-5">
    <div class="container">
        <h2 class="text-center">Registered Users</h2>
        <table class="table table-bordered">
            <tr><th>ID</th><th>Name</th><th>Email</th><th>paswword</th><th>Action</th></tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td>
                        <a href="?edit=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>
</body>
</html>

<?php mysqli_close($conn); ?>