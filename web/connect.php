<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stsdatabase";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

return $conn;
?>