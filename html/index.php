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
    <title>User Dashboard</title>

    <style>
        /* Sidebar Design */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(135deg, #1d2671, #c33764);
            padding: 20px;
            color: white;
            transition: all 0.3s;
        }

        .sidebar h3 {
            text-align: center;
            font-family: 'Goudy Bookletter 1911', sans-serif;
        }

        .sidebar .nav button {
            width: 100%;
            text-align: left;
            background: transparent;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            transition: 0.3s;
        }

        .sidebar .nav button:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        /* Dashboard Content */
        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .profile-table th, .profile-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .profile-table th {
            background: #1d2671;
            color: white;
        }

        .btn-edit {
            background: #28a745;
            color: white;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background: #218838;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        //change the javascript buttons into the jqery and perom hide and show
        function showEditForm() {
            $("#editForm").show();
            $("#userDetails").hide();
        }

        function hideEditForm() {
            $("#editForm").hide();
            $("#userDetails").show();
        }
        //Edit execution since we hit the edit that will get the risponce from back url as fiels 
        $(document).ready(function() {
            $("#editProfileForm").submit(function(e) {
                e.preventDefault(); // Prevent default form submission

 /////////////////////////////////////EDIT PROFILE API/////////////////////////////////////////
                $.ajax({
                    url: "../php/index.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.trim() === "success") {
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="fw-bold">CarDekho</h3>
        <ul class="nav flex-column">
            <button class="btn btn-toggle fw-bold">🏠 Dashboard</button>
            <a href="../html/VichaleCrud.php">
                <button class="btn btn-toggle fw-bold">🚗 Add Vehicle</button>
            </a>
        </ul>
    </div>

    <!-- Dashboard Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm mb-4">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-end">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </nav>

        <!-- Profile Card -->
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card p-4 shadow">
                        <div id="userDetails">
                            <h2 class="text-center">Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
                            <hr>
                            <h5 class="text-muted">Your Profile</h5>
                            
                            <!-- Profile Table -->
                            <table class="profile-table">
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                                </tr>
                            </table>

                            <div class="text-center mt-3">
                                <button class="btn btn-edit" onclick="showEditForm()">✏️ Edit Profile</button>
                                <a href="change_password.php" class="btn btn-warning">🔒 Change Password</a>
                            </div>
                        </div>

                        <!-- Edit Profile Form -->
                        <div id="editForm" style="display: none;">
                            <h3 class="text-center">Edit Your Details</h3>
                            <hr>
                            <form id="editProfileForm" method="POST">
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
                                    <button type="submit" class="btn btn-success">✅ Save Changes</button>
                                    <button type="button" class="btn btn-secondary" onclick="hideEditForm()">❌ Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div> 
    </div>
</body>
</html>