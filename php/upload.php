<?php
include '../includes/Connection.php';

//file directory read write abd create 
$uploadDir = "assets/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
//generates the uniqe file name everytime 
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
// function uploadFile($file, $uploadDir) {
//     if ($file["error"] === UPLOAD_ERR_OK) {
//         $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
//         $uniqueName = uniqid() . "." . $fileType;
//         $filePath = $uploadDir . $uniqueName;

//         if (move_uploaded_file($file["tmp_name"], $filePath)) {
//             // Generate the full URL
//             $baseUrl = "http://yourdomain.com/uploads/"; // Replace with your actual domain & upload folder
//             return $baseUrl . $uniqueName;
//         }
//     }
//     return "";
//  }



// function uploadFile($file, $uploadDir) {
//     if ($file["error"] !== UPLOAD_ERR_OK) {
//       return "";
//     }
//     $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
//     $uniqueName = uniqid() . "." . $fileType;
//     $filePath = $uploadDir . $uniqueName;
//     if (!move_uploaded_file($file["tmp_name"], $filePath)) {
//       return "";
//     }
  
//     $baseUrl = "http://yourdomain.com/uploads/"; // Replace with your actual domain & upload folder
//     return $baseUrl . $uniqueName;
//   }

//checth the if th reust method is posot 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
    $name = trim($_POST["name"]);
    $type = trim($_POST["v_type"]);
    $owner = trim($_POST["owner"]);
    $vehicle_number = trim($_POST["v_Number"]);

    //validation 
   
    if (empty($name) || empty($type) || empty($owner) || empty($vehicle_number)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // Handling file File uploads
    $rcBookPath = !empty($_FILES["rc_book"]["name"]) ? uploadFile($_FILES["rc_book"], $uploadDir) : "";
    $imagePath = !empty($_FILES["image"]["name"]) ? uploadFile($_FILES["image"], $uploadDir) : "";

    if (!empty($id)) {
      //updae vichale data
        $stmt = $mysqli->prepare("UPDATE vehicles SET vichalename=?, vichaletype=?, ownername=?, vichlenumber=?, vichalephto=IFNULL(?, vichalephto), rcBookfile=IFNULL(?, rcBookfile) WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $type, $owner, $vehicle_number, $imagePath, $rcBookPath, $id);
    } else {
     //insert vicahle data 
        $stmt = $mysqli->prepare("INSERT INTO vehicles (vichalename, vichaletype, ownername, vichlenumber, vichalephto, rcBookfile) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $type, $owner, $vehicle_number, $imagePath, $rcBookPath);
    }

    if ($stmt->execute()) {
        header("Location: VichaleCrud.php");
        exit();
    }
}

/////////////////////////////////////////////////////////DELETE OPERATION API//////////////////////////////////////////////////////

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $stmt = $mysqli->prepare("SELECT vichalephto, rcBookfile FROM vehicles WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        if (!empty($result['vichalephto']) && file_exists($result['vichalephto'])) unlink($result['vichalephto']);
        if (!empty($result['rcBookfile']) && file_exists($result['rcBookfile'])) unlink($result['rcBookfile']);
    }

    $stmt = $mysqli->prepare("DELETE FROM vehicles WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: VichaleCrud.php");
    exit();
}

///////////////////////////////////////////////////////////////////////fetch the vichales ///////////////////////////////////////////
$result = $mysqli->query("SELECT * FROM vehicles");
$vehicles = $result->fetch_all(MYSQLI_ASSOC);
?>