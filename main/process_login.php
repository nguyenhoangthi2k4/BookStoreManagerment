<?php
include_once('../config.php');
include_once('../dbprocess.php');

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Tìm tài khoản theo username
    $sql = 'SELECT A.*, K.MAKHACHHANG 
        FROM ACCOUNT A 
        JOIN KHACHHANG K ON A.USERNAME = K.USERNAME 
        WHERE A.USERNAME = "'.$username.'"';
    $account = executePreparedSingleResult($sql);

    // Nếu tài khoản tồn tại và mật khẩu đúng
    if ($account && password_verify($password, $account['PASSWORD'])) {
        $_SESSION['username'] = $account['USERNAME'];
        $_SESSION['quyen'] = $account['QUYEN'];
        $_SESSION['user_id'] = $account['MAKHACHHANG'];

        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>
                alert('Sai tên đăng nhập hoặc mật khẩu!');
                window.location.href = '../index.php';
              </script>";
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
