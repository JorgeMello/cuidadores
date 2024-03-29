<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuidadores";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . ".<br> Por favor, verifique o SQL file");
}

// Start Session
session_start();
