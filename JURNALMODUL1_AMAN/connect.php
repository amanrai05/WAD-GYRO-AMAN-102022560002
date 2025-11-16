<?php
// connect.php - update with your database credentials
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'perpustakaan_ead';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
// Use $conn for queries
?>