<?php
include '../includes/Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "add" || $action == "update") {
        $name = $_POST['name'];
        $number_plate = $_POST['number_plate'];
        $rc_book_no = $_POST['rc_book_no'];
        $type_id = $_POST['type_id'];
        $color_ids = $_POST['color_id'];
        $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : null;

        $uploadDir = '../uploads/rc_books/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $rcBookFileName = time() . "_" . basename($_FILES['rc_book_filepath']['name']); 
        $rcBookFilePath = $uploadDir . $rcBookFileName;
        /////////////////////////////////////////////////////ADD OR UPDATE API////////////////////////////////

        if ($action == "add" || ($action == "update" && !empty($_FILES['rc_book_filepath']['name']))) {
            if (move_uploaded_file($_FILES['rc_book_filepath']['tmp_name'], $rcBookFilePath)) {
                if ($action == "add") {
                    $stmt = $mysqli->prepare("INSERT INTO vehicle (name, number_plate, rc_book_no, rc_book_filepath, type_id) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssi", $name, $number_plate, $rc_book_no, $rcBookFilePath, $type_id);
                    $stmt->execute();
                    $vehicle_id = $stmt->insert_id;
                    $stmt->close();
                } else {
                    $stmt = $mysqli->prepare("UPDATE vehicle SET name = ?, number_plate = ?, rc_book_no = ?, rc_book_filepath = ?, type_id = ? WHERE id = ?");
                    $stmt->bind_param("ssssii", $name, $number_plate, $rc_book_no, $rcBookFilePath, $type_id, $vehicle_id);
                    $stmt->execute();
                    $stmt->close();
                }

                // Delete existing color associations
                $mysqli->query("DELETE FROM vehicle_color WHERE vehicle_id = $vehicle_id");

                // Insert new color associations
                foreach ($color_ids as $color_id) {
                    $stmt = $mysqli->prepare("INSERT INTO vehicle_color (vehicle_id, color_id) VALUES (?, ?)");
                    $stmt->bind_param("ii", $vehicle_id, $color_id);
                    $stmt->execute();
                    $stmt->close();
                }

                echo json_encode(["status" => "success", "message" => "Vehicle " . ($action == "add" ? "added" : "updated") . " successfully!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "File upload failed!"]);
            }
        } else {
            $stmt = $mysqli->prepare("UPDATE vehicle SET name = ?, number_plate = ?, rc_book_no = ?, type_id = ? WHERE id = ?");
            $stmt->bind_param("sssii", $name, $number_plate, $rc_book_no, $type_id, $vehicle_id);
            $stmt->execute();
            $stmt->close();

            // Delete existing color associations
            $mysqli->query("DELETE FROM vehicle_color WHERE vehicle_id = $vehicle_id");

            // Insert new color associations
            foreach ($color_ids as $color_id) {
                $stmt = $mysqli->prepare("INSERT INTO vehicle_color (vehicle_id, color_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $vehicle_id, $color_id);
                $stmt->execute();
                $stmt->close();
            }

            echo json_encode(["status" => "success", "message" => "Vehicle updated successfully!"]);
        }
    }
////////////////////////////////////////////////DELETE API///////////////////////
    if ($action == "delete") {
        $id = $_POST['id'];

        // Fetch file path
        $fileResult = $mysqli->query("SELECT rc_book_filepath FROM vehicle WHERE id = $id");
        $fileRow = $fileResult->fetch_assoc();
        if ($fileRow && file_exists($fileRow['rc_book_filepath'])) {
            unlink($fileRow['rc_book_filepath']);  // Delete file
        }

        // Delete vehicle records
        $mysqli->query("DELETE FROM vehicle_color WHERE vehicle_id = $id");
        $mysqli->query("DELETE FROM vehicle WHERE id = $id");

        echo json_encode(["status" => "success", "message" => "Vehicle deleted successfully!"]);
    }
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == "fetch") {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM vehicle WHERE id = $id");
    $row = $result->fetch_assoc();

    $color_ids = [];
    $colors_query = $mysqli->query("SELECT color_id FROM vehicle_color WHERE vehicle_id = $id");
    while ($color = $colors_query->fetch_assoc()) {
        $color_ids[] = $color['color_id'];
    }

    $row['color_ids'] = $color_ids;
    echo json_encode($row);
    exit;
}

//////////////////////////////////////////////GET API ////////////////////////////////////
$vehicles = [];
$result = $mysqli->query("SELECT v.*, t.name as type_name FROM vehicle v INNER JOIN type t ON v.type_id = t.id");
while ($row = $result->fetch_assoc()) {
    $vehicle_id = $row['id'];
    $color_names = [];
    $colors_query = $mysqli->query("SELECT c.name FROM vehicle_color vc JOIN color c ON vc.color_id = c.id WHERE vc.vehicle_id = $vehicle_id");

    while ($color = $colors_query->fetch_assoc()) {
        $color_names[] = $color['name'];
    }
    $row['colors'] = implode(', ', $color_names);

    // Convert file path to a web-accessible URL
    $row['rc_book_filepath'] = str_replace('../', '', $row['rc_book_filepath']);

    $vehicles[] = $row;
}

echo json_encode(["vehicles" => $vehicles]);
?>