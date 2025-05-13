<?php
session_start();
include_once("../dbprocess.php");

$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$username = $_SESSION['username'];

if ($new_password !== $confirm_password) {
    header("Location: ../index.php?action=change_password&error=Mật khẩu mới không khớp");
    exit;
}
// Lấy mật khẩu hiện tại từ DB
$sql = 'SELECT * FROM ACCOUNT WHERE USERNAME = "'.$username.'"';
$row = executePreparedSingleResult($sql);

if ($row && password_verify($old_password, $row['PASSWORD'])) {
    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = 'UPDATE ACCOUNT SET PASSWORD = "'.$new_hashed_password.'" WHERE USERNAME = "'.$username.'"';
    execute($update_sql);
    header("Location: ../index.php");
} else {
    header("Location: ../index.php?action=change_password&error=Mật khẩu cũ không đúng");
}
?>
