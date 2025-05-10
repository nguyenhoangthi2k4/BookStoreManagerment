<div class="layout">
  <div class="center book-detail">
    <div class="book-top">
      <div class="book-box book-preview">
        <img src="uploads/<?= $book['cover'] ?>" alt="">
        <button class="buy-button">Mua Sách</button>
      </div>
      <div class="book-info">
        <h2><?= $book['title'] ?></h2>
        <div class="price"><?= number_format($book['price']) ?> đ</div>
        <p><strong>Tác giả:</strong> <?= $book['author'] ?></p>
        <p><strong>Thể loại:</strong> <?= $book['category_name'] ?></p>
        <p><strong>Số trang:</strong> <?= $book['pages'] ?></p>
        <p><strong>Năm xuất bản:</strong> <?= $book['year'] ?></p>
        <div class="detail-buttons">
          <button>TRÍCH ĐOẠN</button>
          <button>MỤC LỤC</button>
        </div>
      </div>
    </div>

    <div class="book-description">
      <?= nl2br($book['description']) ?>
    </div>

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

  <div class="right">
    <!-- Có thể thêm sách nổi bật hoặc giỏ hàng rút gọn -->
  </div>
</div>
