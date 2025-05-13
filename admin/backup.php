<div class="admin-book backup">
  <div class="center">
    <div class="card">
        <h2>Sao lưu dữ liệu</h2>
        <p>Nhấn nút bên dưới để tạo bản sao lưu toàn bộ dữ liệu sách, đơn hàng, người dùng.</p>
        <form class="form-grid" action="admin/process_backup.php" method="post" enctype="multipart/form-data">
            <button type="submit">Tiến hành sao lưu</button>
			<div id="result"></div>
        </form>

		<script>
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
