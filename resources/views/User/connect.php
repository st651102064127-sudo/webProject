<?php
$hostname = "localhost";
$username = "root";
$password = "";          // ถ้า XAMPP ไม่ได้ตั้งรหัสผ่าน ให้เว้นว่างแบบนี้
$database = "account";   // ชื่อฐานข้อมูลของคุณ

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($connect, "utf8");
?>
