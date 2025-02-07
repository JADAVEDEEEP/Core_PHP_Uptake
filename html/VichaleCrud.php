<?php
include '../includes/Connection.php';

$uploadDir = "assets/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $type = trim($_POST["v_type"]);
    $owner = trim($_POST["owner"]);
    $vehicle_number = trim($_POST["v_Number"]);

    function uploadFile($file, $uploadDir) {
        if ($file["error"] === UPLOAD_ERR_OK) {
            $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
            $uniqueName = uniqid() . "." . $fileType;
            $filePath = $uploadDir . $uniqueName;
            if (move_uploaded_file($file["tmp_name"], $filePath)) {
                return $filePath;
            }
        }
        return "";
    }

    $rcBookPath = !empty($_FILES["rc_book"]["name"]) ? uploadFile($_FILES["rc_book"], $uploadDir) : "";
    $imagePath = !empty($_FILES["image"]["name"]) ? uploadFile($_FILES["image"], $uploadDir) : "";

    $stmt = $conn->prepare("INSERT INTO vehicles (vichalename, vichaletype, ownername, vichlenumber, vichalephto, rcBookfile) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $type, $owner, $vehicle_number, $imagePath, $rcBookPath);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    }
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    
   
    $stmt = $conn->prepare("SELECT vichalephto, rcBookfile FROM vehicles WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result) {
        if (file_exists($result['vichalephto'])) unlink($result['vichalephto']);
        if (file_exists($result['rcBookfile'])) unlink($result['rcBookfile']);
    }
    
    
    $stmt = $conn->prepare("DELETE FROM vehicles WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    header("Location: VichaleCrud.php");
    exit();
}


$result = $conn->query("SELECT * FROM vehicles");
$vehicles = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    <link rel="stylesheet" href="../css/Vichale.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <button class="btn btn-primary mb-3" onclick="document.getElementById('form1').style.display='block'">Add New Vehicle</button>

        <form id="form1" method="POST" enctype="multipart/form-data" style="display: none;">
            <h2>Vehicle Form</h2>

            <div class="mb-2">
                <label>Vehicle Name</label>
                <input class="form-control" name="name" required>
            </div>
            <div class="mb-2">
                <label>Vehicle Type</label>
                <input class="form-control" name="v_type" required>
            </div>
            <div class="mb-2">
                <label>Owner Name</label>
                <input class="form-control" name="owner" required>
            </div>
            <div class="mb-2">
                <label>Vehicle Number</label>
                <input class="form-control" name="v_Number" required>
            </div>
            <div class="mb-2">
                <label>RC Book</label>
                <input class="form-control" type="file" name="rc_book">
            </div>
            <div class="mb-2">
                <label>Vehicle Picture</label>
                <input class="form-control" type="file" name="image">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('form1').style.display='none'">Cancel</button>
        </form>

        <h2>Vehicle List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                   <th>SrNo</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Owner</th>
                    <th>Number</th>
                    <th>RC Book</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                    <td><?= htmlspecialchars($vehicle["id"]) ?></td>
                        <td>
                            <?php if (!empty($vehicle["vichalephto"])): ?>
                                <img src="<?= $vehicle["vichalephto"] ?>" width="80">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($vehicle["vichalename"]) ?></td>
                        <td><?= htmlspecialchars($vehicle["vichaletype"]) ?></td>
                        <td><?= htmlspecialchars($vehicle["ownername"]) ?></td>
                        <td><?= htmlspecialchars($vehicle["vichlenumber"]) ?></td>
                        <td>
                            <?php if (!empty($vehicle["rcBookfile"])): ?>
                                <a href="<?= $vehicle["rcBookfile"] ?>" target="_blank">View</a>
                            <?php else: ?>
                                No RC Book
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?delete=<?= $vehicle["id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>