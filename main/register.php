<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="icon" href="../img/icon.png">
    <title>Đăng kí</title>
</head>
<body>
    <div class="modal-content-register">
    <h1>Đăng kí tài khoản</h1>
    <form action="process_register.php" method="POST">
        <div class="input-box">
            <label for="hoten">Họ tên</label>
            <input type="text" name="name" id="name" required>
        <div class="input-box">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" required>            
        </div>
        <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="input-box">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required>            
        </div>
        <div class="input-box">
            <label for="confirm_password">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <div class="input-box">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" required>
        </div class="input-box">
            <label for="namsinh">Ngày sinh</label>
            <input type="date" id="namsinh" name="namsinh">
        <div class="input-box">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" required>
        </div>
        <div class="submit-button">
            <input type="submit" value="Đăng ký">
        </div>
    </form>
</div>
</body>