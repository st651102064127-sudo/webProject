<?php
// ไม่มีบรรทัดว่างหรือ space ก่อน <?php

$open_connect = 1;
require('connect.php');

session_start();

$email_account = $_POST['email_account'] ?? '';
$password_account = $_POST['password_account'] ?? '';

// ป้องกัน SQL Injection โดยใช้ prepared statements
$query = "SELECT * FROM account WHERE email_account = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "s", $email_account);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('<script>alert("ไม่พบบัญชีผู้ใช้"); window.location="Login.php";</script>');
}

// ตรวจสอบสถานะบัญชี
if ($data['lock_account'] == 1) {
    die('<script>alert("บัญชีของคุณถูกล็อก"); window.location="Login.php";</script>');
}

// ตรวจสอบรหัสผ่านที่ถูกต้อง
// ดึง salt จากฐานข้อมูล
$salt_account = $data['salt_account'];
$password_with_salt = $password_account . $salt_account;

if (password_verify($password_with_salt, $data['password_account'])) {
    // รหัสผ่านถูกต้อง
    $_SESSION['email_account'] = $email_account;

    // รีเซ็ตจำนวนครั้งที่ล็อกอินผิด
    $query_reset_login = "UPDATE account SET login_count_account = 0 WHERE email_account = ?";
    $stmt_reset = mysqli_prepare($connect, $query_reset_login);
    mysqli_stmt_bind_param($stmt_reset, "s", $email_account);
    mysqli_stmt_execute($stmt_reset);
    
    // *** เปลี่ยนการ redirect ไปยัง main.php ***
    header("Location: main.php"); 
    exit();
} else {
    // รหัสผ่านไม่ถูกต้อง
    $login_count = $data['login_count_account'] + 1;
    $limit_login_account = 3;

    if ($login_count >= $limit_login_account) {
        // ล็อกบัญชี
        $query_lock = "UPDATE account SET login_count_account = ?, lock_account = 1 WHERE email_account = ?";
        $stmt_lock = mysqli_prepare($connect, $query_lock);
        mysqli_stmt_bind_param($stmt_lock, "is", $login_count, $email_account);
        mysqli_stmt_execute($stmt_lock);
        
        die('<script>alert("รหัสผ่านไม่ถูกต้องเกิน 3 ครั้ง บัญชีของคุณถูกล็อก"); window.location="Login.php";</script>');
    } else {
        // อัปเดตจำนวนครั้งที่ล็อกอินผิด
        $query_login_count = "UPDATE account SET login_count_account = ? WHERE email_account = ?";
        $stmt_count = mysqli_prepare($connect, $query_login_count);
        mysqli_stmt_bind_param($stmt_count, "is", $login_count, $email_account);
        mysqli_stmt_execute($stmt_count);

        $remaining_attempts = $limit_login_account - $login_count;
        die("<script>alert(\"รหัสผ่านไม่ถูกต้อง\\nคุณสามารถลองได้อีก $remaining_attempts ครั้งก่อนบัญชีจะถูกล็อก\"); window.location=\"Login.php\";</script>");
    }
}
?>