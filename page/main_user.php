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
                                echo '<button class="add-to-cart">Thêm vào giỏ</button>';
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
        <script>
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


