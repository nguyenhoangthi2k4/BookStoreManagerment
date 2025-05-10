<!DOCTYPE html>
<head>    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="style/header.css">   
</head>
<body>
    <div id="loginModal" class="modal">
    <div class="modal-content">
        <h1>Login</h1>
        <form action="process_login.php" method="POST">
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required id = "passwordField">
                <i class='bx bx-lock' id="togglePassword"></i>
            </div>
            <div class="register-box">
                <p>Bạn chưa có tài khoản <a href="register.php">Đăng kí</a> </p>                
            </div>
            <div class="submit-button">
                <input type="submit" value="Đăng nhập">
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('passwordField');

        togglePassword.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.classList.toggle('bx-show');
        });
    </script>
</body>
</html>