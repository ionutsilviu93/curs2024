<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobile_devices_db";

// Crearea conexiunii la baza de date
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
