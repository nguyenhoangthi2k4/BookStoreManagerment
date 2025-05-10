<!-- Popup login (ẩn ban đầu) -->
<div id="loginPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <span class="close-btn" onclick="closeLoginForm()">&times;</span>
        <div id="loginFormContainer"></div> 
    </div>
</div>

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
                if (isset($_SESSION['user'])) { // phân quyền người dùng
                    echo "<li><a href='profile.php'>Thông tin</a></li>";
                    echo "<li><a href='logout.php'>Đăng xuất</a></li>";
                } else {
                    echo "<li><a href='#' onclick='loadLoginForm()'>Đăng nhập</a></li>";
                    echo "<li><a href='register.php'>Đăng ký</a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="cart">
        <a href="#"><i class='bx bx-cart' style="font-size: 24px;"></i></a>
    </div>
</div>

<script>
function loadLoginForm() {
    fetch('main/login.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById("loginFormContainer").innerHTML = data;
            document.getElementById("loginPopup").style.display = "flex";
        })
}

function closeLoginForm() {
    document.getElementById("loginPopup").style.display = "none";
}
</script>
