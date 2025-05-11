<div class="modal-content-login">
    <h1>Login</h1>
    <form action="main/process_login.php" method="POST">
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-lock' id="togglePassword"></i>
        </div>
        <div class="register-box">
            <p>Bạn chưa có tài khoản <a href="index.php?action=register">Đăng ký</a> </p>                
        </div>
        <div class="submit-button">
            <input type="submit" value="Đăng nhập">
        </div>
    </form>
</div>
