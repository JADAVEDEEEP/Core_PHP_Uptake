<?php
include '../includes/Connection.php';

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"];

    if ($action == "saveColors") {
        $selectedColors = $_POST["colors"];
        $vehicleId = 1; // Example vehicle ID

        if (!empty($selectedColors)) {
            $conn->query("DELETE FROM vehicle_colors WHERE id = $vehicleId");

            foreach ($selectedColors as $colorId) {
                $stmt = $mysqli->prepare("INSERT INTO vehicle_colors (id, Color_ID) VALUES (?, ?)");
                $stmt->bind_param("ii", $vehicleId, $colorId);
                $stmt->execute();
            }
            echo "Colors saved successfully!";
        } else {
            echo "No colors selected.";
        }
    }
}

$mysqli->close();
?>