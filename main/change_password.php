<div class="container my-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Đổi mật khẩu</h3>
    <form method="POST" action="main/process_change_password.php">
        <div class="mb-3">
            <label for="old_password" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" id="old_password" name="old_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Xác nhận</button>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3 text-center"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </form>
</div>