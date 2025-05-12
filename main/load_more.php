<?php
include_once("../dbprocess.php");

if (isset($_POST['matl']) && isset($_POST['page'])) {
    $matl = $_POST['matl'];
    $page = intval($_POST['page']);
    $limit = 4; // Số lượng sách mỗi lần tải
    $offset = $page * $limit;

    $sql = "SELECT * FROM SACH WHERE MATHELOAI = '$matl' LIMIT $limit OFFSET $offset";
    $sachs = executeResults($sql);

    foreach ($sachs as $item) {
        echo '<div class="book-box">';
        echo '<div class="book-top">';
        echo '<a href="index.php?id=' . $item['MASACH'] . '">';
        echo '<img src="' . $item['ANHBIA'] . '" alt="' . $item['TENSACH'] . '">';
        echo '<h4>' . $item['TENSACH'] . '</h4>';
        echo '</a>';
        echo '</div>';
        echo '<div class="book-bottom">';
        echo '<p>Giá: ' . number_format($item['GIAGOC'], 0, ',', '.') . 'đ</p>';
        echo '<button class="add-to-cart">Thêm vào giỏ</button>';
        echo '</div>';
        echo '</div>';
    }
}
?>
