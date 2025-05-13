<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <script>
        // Hàm thêm sản phẩm vào giỏ hàng và cập nhật giỏ hàng
        function addToCart(event, productCode, qty, returnUrl) {
            event.preventDefault(); // Ngừng việc gửi form mặc định

            // Gửi AJAX request để thêm sản phẩm vào giỏ hàng
            fetch('page/cart_update.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `product_code=${productCode}&product_qty=${qty}&type=add&return_url=${returnUrl}`
            })
            .then(response => response.text())
            .then(data => {
                updateCartUI(data); // Cập nhật giỏ hàng ngay sau khi thêm sản phẩm
            })
            .catch(error => console.error('Error:', error));
        }

        // Hàm cập nhật giao diện giỏ hàng
        function updateCartUI(cartData) {
            const cart = document.querySelector('.right ul');
            cart.innerHTML = cartData; // Cập nhật giỏ hàng mới
        }

        // Hàm xóa sản phẩm khỏi giỏ hàng và cập nhật giỏ hàng
        function removeFromCart(productCode, returnUrl) {
            fetch('page/cart_update.php?removep=' + productCode + '&return_url=' + returnUrl)
            .then(response => response.text())
            .then(data => {
                updateCartUI(data); // Cập nhật giỏ hàng sau khi xóa sản phẩm
            })
            .catch(error => console.error('Error:', error));
        }

        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll('.see-more-btn');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const matl = this.getAttribute('data-matl');
                    let page = parseInt(this.getAttribute('data-page')) + 1;

                    const btn = this;
                    btn.innerText = "Đang tải...";

                    fetch('main/load_more.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'matl=' + matl + '&page=' + (page - 1)
                    })
                    .then(res => res.text())
                    .then(html => {
                        if (html.trim() !== '') {
                            document.getElementById('book-grid-' + matl).insertAdjacentHTML('beforeend', html);
                            btn.setAttribute('data-page', page);
                            btn.innerText = "Xem thêm";
                        } else {
                            btn.innerText = "Không còn sách nào";
                            btn.disabled = true;
                        }
                        });
                    });
                });
            });
    </script>
</head>
<body>
    <nav class="nav-title">
        <div class="nav-header">
            <h2 class='title-book'>DANH MỤC BOOK</h2>
            <a href="#">Tất cả các loại sách</a>
        </div>
        <div class="nav-list">
            <ul class="ebook-menu">
                <?php 
                    include_once('dbprocess.php');
                    $sql = "SELECT * FROM theloai";
                    $result = executeResults($sql);
                    foreach ($result as $item) {
                        echo '<li><a href="#'.$item['MATHELOAI'].'"><span>' . $item['TENTHELOAI'] . '</span></a></li>';
                    }
                ?>
            </ul>
        </div>    
    </nav>

    <div class="layout">
        <div class="center">
            <?php 
                $cates = executeResults("SELECT * FROM theloai");
                foreach ($cates as $cate) {
                    $matl = $cate['MATHELOAI'];
                    $tentl = $cate['TENTHELOAI'];

                    echo '<div class="category-section" id="'. $matl . '">';
                    echo "<h2 class='title-book'>$tentl</h2>";
                    echo "<div class='book-grid' id='book-grid-$matl'>";

                    $sachs = executeResults("SELECT * FROM SACH WHERE MATHELOAI = '$matl' LIMIT 4");
                    foreach ($sachs as $item) {
                        echo '<div class="book-box">';
                            echo '<div class="book-top">';
                                echo '<a href="index.php?id=' . $item['MASACH'] . '">';
                                echo '<img src="' . $item['ANHBIA'] . '" alt="' . $item['TENSACH'] . '">';
                                echo '<h3>' . $item['TENSACH'] . '</h3>';
                                echo '</a>';
                            echo '</div>';
                            echo '<div class="book-bottom">';
                                echo '<p>Giá: ' . number_format($item['GIAGOC'], 0, ',', '.') . 'đ</p>';

                                if (!isset($_SESSION['username'])) { 
                                    // Chưa đăng nhập
                                    echo '<form class="add-to-cart-form" onsubmit="alert(\'Bạn cần đăng nhập để sử dụng chức năng này\'); loadLoginForm(); return false;">';
                                        echo '<button type="submit">Thêm vào giỏ</button>';
                                    echo '</form>';
                                } else {
                                    // Đã đăng nhập
                                    echo '<form class="add-to-cart-form" onsubmit="addToCart(event, \'' . $item['MASACH'] . '\', 1, \''. base64_encode($_SERVER['REQUEST_URI']) .'\')">';
                                        echo '<button type="submit">Thêm vào giỏ</button>';
                                    echo '</form>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>'; // end book-grid

                    echo '<div class="see-more">';
                        echo '<button class="see-more-btn" data-matl="'.$matl.'" data-page="1">Xem thêm</button>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>

        <div class="right" >
            <h3 id="cart">🛒 Giỏ hàng</h3>
            <ul>
                <?php 
                    $total = 0;
                    if (isset($_SESSION["products"])) {
                        foreach ($_SESSION["products"] as $item) {
                            echo '<li>' . $item["name"] . ' x ' . $item["qty"] . ' - ' . number_format($item["price"] * $item["qty"], 0, ',', '.') . 'đ';
                            echo ' <a href="javascript:void(0);" onclick="removeFromCart(\'' . $item["code"] . '\', \''. base64_encode($_SERVER["REQUEST_URI"]) .'\')">❌</a></li>';
                            $total += $item["price"] * $item["qty"];
                        }
                    }
                ?>
            </ul>
            <hr />
            <strong>Tổng cũ: <?= number_format($total, 0, ',', '.') ?>đ</strong>
            <br /><br />
            <form action="page/checkout.php" method="post" name ="checkout">
                <button type="submit" class="checkout">Thanh toán</button>
            </form>            
        </div>
    </div>
</body>
</html>
