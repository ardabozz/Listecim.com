<?php
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "projetodo";

// MySQL'e bağlan
$conn = new mysqli($host, $username, $password, $database);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("add: " . $conn->connect_error);
}
?>