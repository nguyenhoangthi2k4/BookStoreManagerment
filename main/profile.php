<?php
session_start();
include('../config.php');
include('../dbprocess.php');

if (!isset($_SESSION['username'])) {
    die("Chưa đăng nhập.");
}
$username = $_SESSION['username'];

$sql = 'SELECT * FROM KHACHHANG WHERE username = "'.$username.'"';

$user = executePreparedSingleResult($sql);
if (!$user) {
    die("Không tìm thấy thông tin người dùng.");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa hồ sơ</title>
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="icon" href="../img/icon.png">
</head>
<body>
    <div class="profile-container">
        <h1>Chỉnh sửa hồ sơ cá nhân</h1>
        <form action="process_update_profile.php" method="POST" class="profile-form">
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['TENKHACHHANG']); ?>" required>
            </div>

            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['USERNAME']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['EMAIL']); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['SDT']); ?>" required maxlength="10">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['DIACHI']); ?>" required>
            </div>

            <div class="form-group">
                <label for="ngaysinh">Ngày sinh</label>
                <input type="date" name="ngaysinh" id="ngaysinh" value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($user['NGAYSINH']))); ?>" required>
            </div>

            <div class="form-group gender-group">
                <label>Giới tính</label>
                <label><input type="radio" name="gioitinh" value="0" checked=<?php echo ($user['GIOITINH'] == 0) ? 'checked' : ''; ?>> Nữ</label>
                <label><input type="radio" name="gioitinh" value="1" checked=<?php echo ($user['GIOITINH'] == 1) ? 'checked' : ''; ?>> Nam</label>
            </div>

            <div class="submit-button">
                <button type="submit">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</body>
</html>
