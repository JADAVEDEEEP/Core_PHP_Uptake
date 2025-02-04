<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_crud";


$conn = new mysqli($servername, $username, $password, $dbname);

echo "hal chak me agaya";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>