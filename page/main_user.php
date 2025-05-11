<nav class="nav-title">
    <div class="nav-header">
        <h2>DANH MỤC BOOK</h2>
        <a href="#">Tất cả các loại sách</a>
    </div>
    <div class="nav-list">
        <ul class="ebook-menu">
            <?php 
                include_once('dbprocess.php');
                $sql = "SELECT * FROM theloai";
                $result = executeResults($sql);
                foreach ($result as $item) {
                    echo '<li><a href="#"><span>' . $item['TENTHELOAI'] . '</span></a></li>';
                }
            ?>
        </ul>
    </div>    
</nav>

<div class="layout">
    <div class="center">
        <h2>📚 Danh sách sách</h2>
        <div class="book-grid">           
            <?php
                $sql = "SELECT * FROM SACH";
                $result = executeResults($sql);
                foreach ($result as $item) {
                    echo '<div class="book-box">';
                        echo '<div class="book-top">';
                            echo '<a href="index.php?id=' . $item['MASACH'] . '">';
                                echo '<img src="' . $item['ANHBIA'] . '" alt="' . $item['TENSACH'] . '">';
                                echo '<h3>' . $item['TENSACH'] . '</h3>';
                            echo '</a>';
                        echo '</div>';
                        echo '<div class="book-bottom">';
                            echo '<p>Giá: ' . number_format($item['GIAGOC'], 0, ',', '.') . 'đ</p>';
                            echo '<button class="add-to-cart">Thêm vào giỏ</button>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>           
        </div>
    </div>

    <div class="right">
        <h3>🛒 Giỏ hàng</h3>
        <ul>
            
        </ul>
        <hr />
        <strong>Tổng: 240.000đ</strong>
        <br /><br />
        <button class="checkout">Thanh toán</button>
    </div>
</div>
