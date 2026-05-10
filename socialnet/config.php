<?php
session_start();

$conn = new mysqli("localhost", "socialuser", "123456", "socialnet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

