<?php
include '../php/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <script>
        function showEditForm() {
            document.getElementById("editForm").style.display = "block";
            document.getElementById("userDetails").style.display = "none";
        }

        function hideEditForm() {
            document.getElementById("editForm").style.display = "none";
            document.getElementById("userDetails").style.display = "block";
        }
    </script>
</head>
<body>

 
    <div class="sidebar">
        <h3 class="text-white fw-bold"style="font-family:Goudy Bookletter 1911", sans-serif">CarDekho</h3>
        <ul class="nav flex-column">
            
        <button class="btn btn-toggle mt-5 fw-bold border-none bg-white align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Home
        </button>
        <a href="../html/VichaleCrud.php">
        <button class="btn btn-toggle mt-5 fw-bold border-none bg-white align-items-center rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false" href="../html/VichaleCrud.php">
          Vichale Add
        </button>
</a>   
        
        
           
        </ul>
    </div>

    
    <div class="content">
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm mb-4">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-end">
                    <a href="logout.php" class="btn btn-light">Logout</a>
                </div>
            </div>
        </nav>

        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <div id="userDetails">
                            <h2 class="text-center">Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
                            <hr>
                            <h5 class="text-muted">Your Details:</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                                <li class="list-group-item"><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></li>
                            </ul>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary d-flex justify-content-start mt-3" onclick="showEditForm()">Edit Profile</button>
                                <a href="change_password.php" class="btn btn-warning d-flex justify-content-center mt-3">Change Password</a>

                            </div>
                        </div>

                        <div id="editForm" style="display: none;">
                            <h3 class="text-center">Edit Your Details</h3>
                            <hr>
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Phone:</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                    <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
        </div>    
    </div>
    

</body>
</html>+