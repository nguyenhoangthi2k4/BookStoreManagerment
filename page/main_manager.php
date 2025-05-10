<div class="layout manager-layout">
    <!-- Cột trái -->
    <div class="left">
        <aside class="menu">            
            <ul class="list-unstyled">
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Sản phẩm
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="admin.php?do=add_products" class="link-dark rounded">Nhập sách</a></li>
                            <li><a href="#" class="link-dark rounded">Kho sách</a></li>
                            <li><a href="#" class="link-dark rounded">Cập nhật khuyến mãi</a></li>
                            <li><a href="#" class="link-dark rounded">Nhà cung cấp</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Đơn đặt hàng
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="#" class="link-dark rounded">Đơn hàng</a></li>
                            <li><a href="#" class="link-dark rounded">Đơn đã giao</a></li>
                            <li><a href="#" class="link-dark rounded">Tổng đơn hàng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Thông báo
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="#" class="link-dark rounded">Phản hồi của khách</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Tài khoản
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="#" class="link-dark rounded">Thông tin tài khoản của người dùng</a></li>
                            <li><a href="#" class="link-dark rounded">Thông tin cá nhân</a></li>
                            <li><a href="index.php?do=logout" class="link-dark rounded">Thoát tài khoản</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </aside>
    </div>
  <!-- Cột giữa -->
    <div class="center">
        <h2>📘 Trang quản lý</h2>

        <div class="card action-card">
            <h3>🎯 Các chức năng</h3>
            <div class="action-buttons">
                <button>➕ Nhập sách</button>
                <button>📝 Cập nhật giá</button>
                <button>🎯 Cập nhật khuyến mãi</button>
                <button>📦 Sao lưu dữ liệu</button>
            </div>
        </div>

        <div class="card stat-card">
            <h3>📊 Thống kê nhanh</h3>
            <div class="stats-grid">
                <div class="stat-box">
                    <h4>🔥 Bán chạy</h4>
                    <ul>
                        <li>Đắc Nhân Tâm – 1200 lượt</li>
                        <li>Nhà giả kim – 875 lượt</li>
                    </ul>
                </div>
                <div class="stat-box">
                    <h4>💰 Doanh thu hôm nay</h4>
                    <p class="big-money">5.600.000đ</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột phải -->
    <div class="right">
        <div class="card">
            <h3>📈 Tổng quan</h3>
            <p>Sách tồn kho: <strong>143</strong></p>
            <p>Sách sắp hết: <strong>8</strong></p>
            <p>Giao dịch hôm nay: <strong>58</strong></p>
        </div>
    </div>
</div>
