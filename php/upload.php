
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$uploadDir = "assets/";
$response = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vichalename = $_POST["name"] ?? "";
    $vichaletype = $_POST["v_type"] ?? "";
    $ownername = $_POST["owner"] ?? "";
    $vichlenumber = $_POST["v_Number"] ?? "";
    $v_Number = $_POST["v_Number"];
    
    $imagePath = "";
    $rcBookPath = "";

 if (empty($vichalename) || empty($vichaletype) || empty($ownername) || empty($vichlenumber)) {
        echo json_encode(["success" => false, "message" => "All fields are required!"]);
        exit;
    }

    if (!empty($_FILES["rc_book"]["name"])) {
        $rcBookPath = $uploadDir . basename($_FILES["rc_book"]["name"]);
        move_uploaded_file($_FILES["rc_book"]["tmp_name"], $rcBookPath);
    }

    $conn = new mysqli("localhost", "root", "", "your_database");

    if ($conn->connect_error) {
        $response["success"] = false;
        $response["message"] = "Database connection failed!";
        echo json_encode($response);
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO vehicles (name, v_type, owner, v_Number, vichalephto, rc_book) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $v_type, $owner, $v_Number, $imagePath, $rcBookPath);

    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Vehicle added successfully!";
    } else {
        $response["success"] = false;
        $response["message"] = "Failed to add vehicle!";
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>