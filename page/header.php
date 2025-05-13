<head>
    <link rel="stylesheet" href="style/login.css">
</head>

<!-- Popup login (ẩn ban đầu) -->
<div id="loginPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <span class="close-btn" onclick="closeLoginForm()">&times;</span>
        <div id="loginFormContainer"></div> 
    </div>
</div>

<div class="header">
    <div class="header-left">
        <img src="img/logo.png" alt="Logo" style="width: 70px; height: 70px;">
        <ul class="menu">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>          
        </ul>
    </div>

    <div class="search-box">
        <input type="text" title="Nhập tên sách" placeholder="Tìm kiếm sản phẩm..." id="searchInput">
        <button type="button" id="searchBtn" class="btn_search"><i class='bx bx-search'></i></button>
        <div id="searchResults" class="search-results-box"></div>        
    </div>

    <div class="header-right">
        <div class="user">
            <ul class="menu-user">
                <?php
                    if (isset($_SESSION['username'])) { // phân quyền người dùng
                        if(isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1)
                        {
                            echo "<li><a href='main/profile.php'>Admin</a></li>";
                            echo "<li><a href='main/logout.php'>Đăng xuất</a></li>";
                        }else{
                            // echo "<li><a href='main/profile.php'>Khách hàng</a></li>";
                            // echo "<li><a href='main/logout.php'>Đăng xuất</a></li>";
                            echo "
                                <li class='dropdown'>
                                    <a href='#' class='dropbtn'>Khách hàng</a>
                                    <ul class='dropdown-content'>
                                        <li><a href='main/profile.php'>Xem hồ sơ</a></li>
                                        <li><a href='index.php?action=history'>Lịch sử mua hàng</a></li>
                                        <li><a href='index.php?action=change_password'>Đổi mật khẩu</a></li>
                                    </ul>
                                </li>
                                <li><a href='main/logout.php'>Đăng xuất</a></li>
                            ";
                        }
                    } else {
                        echo "<li><a href='#' onclick='loadLoginForm()'>Đăng nhập</a></li>";
                        echo "<li><a href='index.php?action=register'>Đăng ký</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="banner">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/banner1.jpg" alt="Banner 1">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/banner2.jpg" alt="Banner 2">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/banner3.jpg" alt="Banner 3">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/banner4.jpg" alt="Banner 3">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="img/banner5.jpg" alt="Banner 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
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

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("searchBtn").addEventListener("click", function () {                
        const keyword = document.getElementById("searchInput").value.trim();
        const resultBox = document.getElementById("searchResults");

        if (keyword !== "") {
            fetch("main/search_books.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "keyword=" + encodeURIComponent(keyword)
            })
            .then(res => res.text())
            .then(html => {
                console.log("Kết quả nhận được:", html);
                resultBox.style.display = "block";
                resultBox.innerHTML = html;
            });
        } else {
            resultBox.style.display = "none";
            resultBox.innerHTML = "";
        }
    });

       

    // Ẩn kết quả khi click ra ngoài
    document.addEventListener("click", function (e) {
        const box = document.getElementById("searchResults");
        const searchBox = document.querySelector(".search-box");

        if (!searchBox.contains(e.target)) {
            box.style.display = "none";
        }
    });
});   

</script>

