<?php
include '../includes/Connection.php';
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$colors = $_POST['colors'];

if (!empty($colors)) {
    foreach ($colors as $color) {
        list($color_name, $color_code) = explode(',', $color);

        $sql = "INSERT INTO colors_two (color_name, color_code, status) VALUES ('$color_name', '$color_code', 1)";
        $mysqli->query($sql);
    }
    echo 'Colors Inserted Successfully';
} else {
    echo 'No colors selected!';
}
?>