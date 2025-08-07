<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "your_database"; // เปลี่ยนให้ตรงกับของคุณ

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("❌ Connection failed: " . mysqli_connect_error());
} else {
    echo "✅ Connected successfully!";
}
?>
