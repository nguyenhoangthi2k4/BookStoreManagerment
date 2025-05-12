<div class="layout">
  <div class="center book-detail">
    <div class="book-top">
        <div class="book-box">
            <?php
                include_once('dbprocess.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM SACH S JOIN TACGIA TG ON S.MATACGIA = TG.MATACGIA WHERE MASACH = '$id'";
                    $book = executePreparedSingleResult($sql); // lấy 1 dòng

                    if ($book != null) {
                        echo '<div class="book-preview">';
                            echo '<h2>' . $book['TENSACH'] . '</h2>';
                            echo '<img src="' . $book['ANHBIA'] . '">';
                            echo '<p><strong>Mô tả:</strong><br>' . nl2br($book['NOIDUNG']) . '</p>';
                            echo '<p><strong>Tác giả:</strong> ' . $book['TENTACGIA'] . '</p>';
                            echo '<div class="price"><p><strong>Giá:</strong> ' . number_format($book['GIAGOC'], 0, ',', '.') . 'đ</p></div>'; 
                            echo '<a href="index.php" class="btn btn-secondary mt-3">← Quay lại danh sách</a>';
                            echo '<div class="detail-buttons">';
                                //echo '<button>Đặt hàng</button>';
                                //echo '<button>Giỏ hàng</button>';
                                echo '<form action="page/cart_update.php" method="post">';
                                    echo '<input type="hidden" name="product_code" value="' . $book['MASACH'] . '">';
                                    echo '<input type="hidden" name="product_qty" value="1">';
                                    echo '<input type="hidden" name="type" value="add">';
                                    echo '<input type="hidden" name="flag" value="true">';
                                    echo '<input type="hidden" name="return_url" value="' . base64_encode($_SERVER['REQUEST_URI']) . '">';
                                    echo '<button type="submit" class="add-to-cart">Thêm vào giỏ</button>';
                                echo '</form>';
                            echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<p>Không tìm thấy sách.</p>';
                    }
                }
            ?>
        </div>
    </div> 

    <h3 class="section-title">SÁCH CÙNG DANH MỤC</h3>
    <div class="book-grid">
        <?php
           $sql = "SELECT S.MATHELOAI FROM SACH S JOIN THELOAI TL ON S.MATHELOAI = TL.MATHELOAI WHERE MASACH = '$id'";
            $cate = executePreparedSingleResult($sql);
            $matheloai = $cate['MATHELOAI'];

            $sql = "SELECT * FROM SACH WHERE MATHELOAI = '$matheloai' AND MASACH != '$id' LIMIT 5";

            $result = executeResults($sql);
            if ($result == null) {
                echo '<p>Không tìm thấy sách.</p>';
            }
            else {
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
                        //echo '<button class="add-to-cart">Thêm vào giỏ</button>';
                        echo '<form action="page/cart_update.php" method="post">';
                            echo '<input type="hidden" name="product_code" value="' . $item['MASACH'] . '">';
                            echo '<input type="hidden" name="product_qty" value="1">';
                            echo '<input type="hidden" name="type" value="add">';
                            echo '<input type="hidden" name="flag" value="true">';
                            echo '<input type="hidden" name="return_url" value="' . base64_encode($_SERVER['REQUEST_URI']) . '">';
                            echo '<button type="submit" class="add-to-cart">Thêm vào giỏ</button>';
                        echo '</form>';
                    echo '</div>';
                echo '</div>';
                }
            }            
        ?>  
    </div>

    <h3 class="section-title">SÁCH CÙNG TÁC GIẢ</h3>
    <div class="book-grid">
      <?php
           $sql = "SELECT S.MATACGIA FROM SACH S JOIN TACGIA TG ON S.MATACGIA = TG.MATACGIA WHERE MASACH = '$id'";
            $authur = executePreparedSingleResult($sql);
            $matheloai = $authur['MATACGIA'];

            $sql = "SELECT * FROM SACH WHERE MATACGIA = '$matheloai' AND MASACH != '$id' LIMIT 5";
            $result = executeResults($sql);
            if ($result == null) {
                echo '<p>Không tìm thấy sách.</p>';
            }
            else {
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
                        //echo '<button class="add-to-cart">Thêm vào giỏ</button>';
                        echo '<form action="page/cart_update.php" method="post">';
                            echo '<input type="hidden" name="product_code" value="' . $item['MASACH'] . '">';
                            echo '<input type="hidden" name="product_qty" value="1">';
                            echo '<input type="hidden" name="type" value="add">';
                            echo '<input type="hidden" name="flag" value="true">';
                            echo '<input type="hidden" name="return_url" value="' . base64_encode($_SERVER['REQUEST_URI']) . '">';
                            echo '<button type="submit" class="add-to-cart">Thêm vào giỏ</button>';
                        echo '</form>';
                    echo '</div>';
                echo '</div>';
                }
            }            
        ?>
    </div>
  </div>
</div>
