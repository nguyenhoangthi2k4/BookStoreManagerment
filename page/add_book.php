<div class="layout manager-layout">
    <div class="center">
        <div class="card">
            <h2>➕ Nhập sách mới</h2>
            <form class="form-grid">
                <label>Tên sách:
                    <input type="text" name="title" required>
                </label>
                <label>Tác giả:
                    <input type="text" name="author">
                </label>
                <label>Thể loại:
                    <input type="text" name="genre">
                </label>
                <label>Số lượng:
                    <input type="number" name="quantity" min="1">
                </label>
                <label>Giá bán (VNĐ):
                    <input type="number" name="price" min="0">
                </label>
                <label>Ảnh bìa:
                    <input type="file" name="cover">
                </label>
                <button type="submit">➕Thêm sách</button>
                <button type="submit">💾Lưu</button>
            </form>
        </div>
    </div>
</div>
