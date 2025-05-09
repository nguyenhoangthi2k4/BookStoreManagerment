<?php
    session_start();
    include_once "config.php";
?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Import CSS -->
    <link rel="stylesheet" href="style/mystyle.css">

    <title>Website Bán sách số 1 - VN</title>
</head>
<body>
    <header>
        <div class="header-left">
            <img src="img/logo.png" alt="Logo" style="width: 70px; height: 70px;">
            <ul class="menu">
                <li><a href="home.php">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Liên hệ</a></li>          
            </ul>
        </div>
        
        <div class="search-box">
            <input type="text" title="Nhập tên sách" placeholder="Tìm kiếm sản phẩm...">
            <button type="button" class="btn"><i class='bx bx-search'></i></button>
        </div>
        
        <div class="header-right">
            <div class="user">
                <ul class="menu-user">
                    <?php
                        if (isset($_SESSION['user'])==false) {
                            echo "<li><a href='profile.php'>Thông tin</a></li>";
                            echo "<li><a href='logout.php'>Đăng xuất</a></li>";
                        } else {
                            echo "<li><a href='login.php'>Đăng nhập</a></li>";
                            echo "<li><a href='register.php'>Đăng ký</a></li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="cart">
                <a href="#"><i class='bx bx-cart' style="font-size: 24px;"></i></a>
            </div>
        </div>
    </header>
    

    <nav></nav>
    <footer></footer>
</body>
</html>
