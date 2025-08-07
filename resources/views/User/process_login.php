<?php
$open_connect = 1;
require('connect.php');

session_start();

$email_account = $_POST['email_account'] ?? '';
$password_account = $_POST['password_account'] ?? '';

$query = "SELECT * FROM account WHERE email_account = '$email_account'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('ไม่พบบัญชีผู้ใช้');
}

$limit_login_account = 3;
$time_ban_account = 1;

$login_count = isset($data['login_count_account']) ? $data['login_count_account'] : 0;

if ($data['lock_account'] == 1) {
    die('บัญชีของคุณถูกล็อก');
}

if ($password_account == $data['password_account']) {
    $_SESSION['email_account'] = $email_account;

    // Reset login count
    $query_reset_login = "UPDATE account SET login_count_account = 0 WHERE email_account = '$email_account'";
    mysqli_query($connect, $query_reset_login);

    header("Location: index.php");
    exit();
} else {
    $login_count++;

    // Update login count
    $query_login_count = "UPDATE account SET login_count_account = $login_count WHERE email_account = '$email_account'";
    mysqli_query($connect, $query_login_count);

    if ($login_count >= $limit_login_account) {
        $query_ban = "UPDATE account SET lock_account = 1, ban_account = DATE_ADD(NOW(), INTERVAL $time_ban_account MINUTE) WHERE email_account = '$email_account'";
        mysqli_query($connect, $query_ban);
        die('บัญชีถูกระงับชั่วคราว');
    }

    die('รหัสผ่านไม่ถูกต้อง');
}
?>
