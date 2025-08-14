<?php
// ไม่มีบรรทัดว่างหรือ space ก่อน <?php

$open_connect = 1;
require('connect.php');

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["Password1"]) && isset($_POST["Password2"])) {
    $username_account = htmlspecialchars($_POST["username"]);
    $email_account = htmlspecialchars($_POST["email"]);
    $password1 = $_POST["Password1"];
    $password2 = $_POST["Password2"];

    if (empty($username_account)) {
        die(header("Location: form_register.php?error=empty_username"));
    } elseif (empty($email_account)) {
        die(header("Location: form_register.php?error=empty_email"));
    } elseif (empty($password1) || empty($password2)) {
        die(header("Location: form_register.php?error=empty_password"));
    } elseif ($password1 !== $password2) {
        die(header("Location: form_register.php?error=password_mismatch"));
    } else {
        $query_check_email_account = "SELECT email_account FROM account WHERE email_account = ?";
        $stmt = mysqli_prepare($connect, $query_check_email_account);
        mysqli_stmt_bind_param($stmt, "s", $email_account);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            die(header("Location: form_register.php?error=email_exists"));
        } else {
            $salt_account = bin2hex(random_bytes(16));
            $password_with_salt = $password1 . $salt_account;
            $password_account = password_hash($password_with_salt, PASSWORD_ARGON2ID);

            $role_account = 'user';
            $images_account = 'default.png';
            $Login_count_account = 0;
            $lock_account = 0;
            $ban_account = 0;

            $query_insert = "INSERT INTO account 
                (username_account, email_account, password_account, salt_account, role_account, images_account, Login_count_account, lock_account, ban_account)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt_insert = mysqli_prepare($connect, $query_insert);
            mysqli_stmt_bind_param($stmt_insert, "ssssssiii", 
                $username_account, 
                $email_account, 
                $password_account, 
                $salt_account, 
                $role_account, 
                $images_account, 
                $Login_count_account, 
                $lock_account, 
                $ban_account
            );

            if (mysqli_stmt_execute($stmt_insert)) {
                header("Location: Login.php?register_success=1");
                exit;
            } else {
                die("Error: " . mysqli_error($connect));
            }
        }

        mysqli_stmt_close($stmt);
    }
} else {
    die(header("Location: form_register.php"));
}
?>
