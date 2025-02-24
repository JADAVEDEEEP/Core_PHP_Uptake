
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
   


    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="fw-bold">CarDekho</h3>
        <ul class="nav flex-column mt-5">
        <a href="../html/index.php">
                <button class="btn btn-toggle fw-bold">Home Page</button>
            </a>
            <a href="../html/VichaleCrudhtml.php">
                <button class="btn btn-toggle fw-bold">List Vehicle</button>
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

</body>
</html>