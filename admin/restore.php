<div class="admin-book restore">
  <div class="center">
    <div class="card">
        <h2>Phục hồi dữ liệu</h2>
        <p>Nhấn nút bên dưới để phục hồi toàn bộ dữ liệu sách, đơn hàng, người dùng.</p>
        <form class="form-grid" action="admin/process_restore.php" method="post" enctype="multipart/form-data">
            <lable>Chọn file sao lưu:
                <input type="file" name="backup_file" accept=".sql" required>
            </lable>
            <button type="submit">Tiến hành phục hồi</button>
            <div id="result"></div>
        </form>

        <script>
            // Thêm sự kiện cho form
            document.querySelector('.form-grid').addEventListener('submit', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của form
                const formData = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('result').innerHTML = data;
                })
            });
        </script>
    </div>
  </div>
</div>
