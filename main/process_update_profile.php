<?php
session_start();
include('../config.php');
include('../dbprocess.php');

if (!isset($_SESSION['username'])) {
    die("Chưa đăng nhập.");
}

$username = $_SESSION['username'];

// Lấy và làm sạch dữ liệu đầu vào
$name      = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
$email     = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
$phone     = mysqli_real_escape_string($conn, trim($_POST['phone'] ?? ''));
$address   = mysqli_real_escape_string($conn, trim($_POST['address'] ?? ''));
$ngaysinh  = mysqli_real_escape_string($conn, $_POST['ngaysinh'] ?? '');
$gioitinh  = isset($_POST['gioitinh']) ? (int)$_POST['gioitinh'] : -1;

// Kiểm tra hợp lệ
$errors = [];

if (empty($name)) {
    $errors[] = "Họ tên không được để trống.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email không hợp lệ.";
}
if (!preg_match('/^0\d{9}$/', $phone)) {
    $errors[] = "Số điện thoại không hợp lệ. Phải có 10 số và bắt đầu bằng 0.";
}
if (empty($address)) {
    $errors[] = "Địa chỉ không được để trống.";
}
if (empty($ngaysinh)) {
    $errors[] = "Ngày sinh không hợp lệ.";
}
if ($gioitinh !== 0 && $gioitinh !== 1) {
    $errors[] = "Giới tính không hợp lệ.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo '<p><a href="edit_profile.php">Quay lại chỉnh sửa</a></p>';
    exit;
}

// Cập nhật thông tin
$sql = "UPDATE KHACHHANG 
        SET TENKHACHHANG = '$name', EMAIL = '$email', SDT = '$phone', DIACHI = '$address', NGAYSINH = '$ngaysinh', GIOITINH = $gioitinh 
        WHERE USERNAME = '$username'";

execute($sql);

echo "<p style='color:green;'>Cập nhật hồ sơ thành công!</p>";
echo '<p><a href="edit_profile.php">Quay lại hồ sơ</a></p>';
?>
