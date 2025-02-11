<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_crud";


$mysqli = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
return $mysqli;
?>