
<div class="layout">
  <div class="center book-detail">
    <div class="book-top">
        <div class="book-box book-preview">



            <?php
                include_once('dbprocess.php');
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM SACH S JOIN TACGIA TG ON S.MATACGIA = TG.MATACGIA WHERE MASACH = '$id'";
                    $book = executePreparedSingleResult($sql); // lấy 1 dòng

                    if ($book != null) {
                        echo '<div class="book-info">';
                            echo '<h2>' . $book['TENSACH'] . '</h2>';
                            echo '<img src="' . $book['ANHBIA'] . '" style="max-width: 200px;">';
                            echo '<p><strong>Tác giả:</strong> ' . $book['TENTACGIA'] . '</p>';
                            echo '<div class="price"><p><strong>Giá:</strong> ' . number_format($book['GIAGOC'], 0, ',', '.') . 'đ</p></div>';
                            echo '<p><strong>Mô tả:</strong><br>' . nl2br($book['NOIDUNG']) . '</p>';
                            echo '<a href="index.php" class="btn btn-secondary mt-3">← Quay lại danh sách</a>';
                            echo '<div class="detail-buttons">';
                                echo '<button>TRÍCH ĐOẠN</button>';
                                echo '<button>MỤC LỤC</button>';
                            echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<p>Không tìm thấy sách.</p>';
                    }
                }
            ?>
    

    <h3 class="section-title">SÁCH CÙNG DANH MỤC</h3>
    <div class="book-grid">
        <?php foreach ($related_books as $item): ?>
            <div class="book-box">
                <img src="uploads/<?= $item['cover'] ?>">
                <h4><?= $item['title'] ?></h4>
                <p><?= $item['author'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <h3 class="section-title">SÁCH CÙNG TÁC GIẢ</h3>
    <div class="book-grid">
      <?php foreach ($author_books as $item): ?>
        <div class="book-box">
            <img src="uploads/<?= $item['cover'] ?>">
            <h4><?= $item['title'] ?></h4>
            <p><?= $item['author'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
