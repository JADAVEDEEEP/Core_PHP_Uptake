<?php

include '../includes/Connection.php';

// Change this to point to the assets folder
$uploadDir = "../php/assets";

// Function to upload files to the assets folder
function uploadFile($file, $uploadDir) {
    // Ensure the assets folder exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Set the target file path
    $targetFile = $uploadDir . basename($file["name"]);
    
    // Move the uploaded file to the assets folder
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        return "";
    }
}

// Insert or Update Vehicle
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
    $name = trim($_POST["name"]);
    $type = trim($_POST["v_type"]);
    $owner = trim($_POST["owner"]);
    $vehicle_number = trim($_POST["v_Number"]);

    if (empty($name) || empty($type) || empty($owner) || empty($vehicle_number)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    $rcBookPath = !empty($_FILES["rc_book"]["name"]) ? uploadFile($_FILES["rc_book"], $uploadDir) : "";
    $imagePath = !empty($_FILES["image"]["name"]) ? uploadFile($_FILES["image"], $uploadDir) : "";

    ////////////////////////////////////////////ADD OR EDIT BASED ON THE CONDTION ////////////////////////
    if (!empty($id)) {
        // Update operation
        $stmt = $mysqli->prepare("UPDATE vehicles SET vichalename=?, vichaletype=?, ownername=?, vichlenumber=?, vichalephto=IFNULL(?, vichalephto), rcBookfile=IFNULL(?, rcBookfile) WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $type, $owner, $vehicle_number, $imagePath, $rcBookPath, $id);
    } else {
        // Insert operation
        $stmt = $mysqli->prepare("INSERT INTO vehicles (vichalename, vichaletype, ownername, vichlenumber, vichalephto, rcBookfile) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $type, $owner, $vehicle_number, $imagePath, $rcBookPath);
    }

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}

///////////////////////////////////////////////////DELETE VEHICLE///////////////////////////

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $stmt = $mysqli->prepare("DELETE FROM vehicles WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "success";
    }
}

///////////////////////////////////////////FETCH VEHILES///////////////////////////

if (isset($_GET['fetch'])) {
    $stmt = $mysqli->prepare("SELECT * FROM vehicles");
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicleList = "";
    
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        $vehicleList .= "<tr>
                            <td>{$count}</td>
                            <td><img src='{$row['vichalephto']}' width='50'></td>
                            <td>{$row['vichalename']}</td>
                            <td>{$row['vichaletype']}</td>
                            <td>{$row['ownername']}</td>
                            <td>{$row['vichlenumber']}</td>
                            <td><a href='{$row['rcBookfile']}' target='_blank'>View</a></td>
                            <td>
                                <button class='btn btn-warning' onclick='openForm({$row['id']}, \"{$row['vichalename']}\", \"{$row['vichaletype']}\", \"{$row['ownername']}\", \"{$row['vichlenumber']}\")'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger' onclick='confirmDelete({$row['id']})'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>";
        $count++;
    }
    echo $vehicleList;
}

$mysqli->close();
?>
