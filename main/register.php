<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" href="../img/icon.png">
    <title>Đăng kí</title>
</head>
<body>
    <div class="modal-content-register">
    <h1>Đăng kí tài khoản</h1>
    <form action="main/process_register.php" method="POST" class="register-form">
        <div class="input-box-register">
            <label for="hoten">Họ tên</label>
            <input type="text" name="name" id="name" placeholder="Họ tên" required>
        </div>

        <div class="input-box-register">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>            
        </div>

        <div class="input-box-register">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>

        <div class="input-box-register">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>            
        </div>

        <div class="input-box-register">
            <label for="confirm_password">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" required>
        </div>

        <div class="input-box-register">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required maxlength="10" >
        </div>

        <div class="input-box-register">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" placeholder="Địa chỉ" required>
        </div>
        
        <div class="input-box-register">
            <label for="ngaysinh">Ngày sinh</label>
            <input type="date" name="ngaysinh" id="ngaysinh" required>
        </div>

        <div class="input-box-register">
            <label for="gioitinh">Giới tính</label>
            <div>
                <input type="radio" name="gioitinh" id="gioitinh" value="0" required checked="checked"> Nữ
                <input type="radio" name="gioitinh" id="gioitinh" value="1" required> Nam
            </div>
        </div>

        <div class="submit-button">
            <input type="submit" value="Đăng ký">
        </div>        
    </form>
</div>
</body>