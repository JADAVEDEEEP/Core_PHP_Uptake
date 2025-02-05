<?php
session_start();

if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user']; // Get user data from session
?>
