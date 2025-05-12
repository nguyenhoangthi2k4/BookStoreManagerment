<?php
include_once("../dbprocess.php");

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM SACH WHERE TENSACH LIKE '%$keyword%'";
    $sachs = executeResults($sql);

    if (count($sachs) > 0) {
        foreach ($sachs as $item) {
            echo '<div class="book-box">';
                echo '<a href="index.php?id=' . $item['MASACH'] . '">';
                    echo '<img src="' . $item['ANHBIA'] . '" alt="' . $item['TENSACH'] . '">';
                    echo '<h3>' . $item['TENSACH'] . '</h3>';
                echo '</a>';                
            echo '</div>';
        }
    } else {
        echo "<p>Không tìm thấy sách nào.</p>";
    }
}
?>
