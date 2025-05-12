<?php
    include_once "dbprocess.php";  
?>

<div class="add-book">
    <div class="center">
        <div class="card">
            <h2>Nhập sách mới</h2>
            <form class="form-grid" action="admin/process_add_book.php" method="post" enctype="multipart/form-data">
                <label>Mã sách:
                    <input type="text" name="masach" required>
                </label>
                <label>Tên sách:
                    <input type="text" name="tensach" required>
                </label>
                <label>Nhà xuất bản:
                    <?php 
                        $sNhaXuatBan = "SELECT * FROM nhaxuatban";
                        $resultNhaXuatBan = executeResults($sNhaXuatBan);
                        if ($resultNhaXuatBan != null) {
                            echo '<select name="nhaxuatban">';
                            echo '<option value="">Chọn nhà xuất bản</option>';
                            foreach ($resultNhaXuatBan as $item) {
                                echo '<option value="' . $item['MANXB'] . '">' . $item['TENNXB'] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<p>Không tìm thấy nhà xuất bản.</p>';
                        }
                    ?>
                <label>Tác giả:
                    <?php 
                        $sTagia = "SELECT * FROM tacgia";
                        $resultTagia = executeResults($sTagia);
                        if ($resultTagia != null) {
                            echo '<select name="tacgia">';
                            echo '<option value="">Chọn tác giả</option>';
                            foreach ($resultTagia as $item) {
                                echo '<option value="' . $item['MATACGIA'] . '">' . $item['TENTACGIA'] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<p>Không tìm thấy tác giả.</p>';
                        }
                    ?>
                </label>
                <label>Thể loại:
                    <?php 
                        $sTheloai = "SELECT * FROM theloai";
                        $resultTheloai = executeResults($sTheloai);
                        if ($resultTheloai != null) {
                            echo '<select name="theloai">';
                            echo '<option value="">Chọn thể loại</option>';
                            foreach ($resultTheloai as $item) {
                                echo '<option value="' . $item['MATHELOAI'] . '">' . $item['TENTHELOAI'] . '</option>';
                            }
                            echo '</select>';
                        } else {
                            echo '<p>Không tìm thấy thể loại.</p>';
                        }
                    ?>
                </label>
                <label>Số lượng:
                    <input type="number" name="soluong" min="1">
                </label>
                <label>Giá bán (VNĐ):
                    <input type="number" name="giagoc" min="0">
                </label>
                <label>Ảnh bìa:
                    <input type="file" name="anhbia">
                </label>
                <label>Nội dung:
                    <input type="text" name="noidung" required>
                </label>
                <button type="submit">Lưu</button>
            </form>
        </div>
    </div>
</div>
