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
                            <li><a href="index.php?do=add_book" class="link-dark rounded">Nhập sách</a></li>
                            <!-- <li><a href="#" class="link-dark rounded">Kho sách</a></li> -->
                            <li><a href="index.php?do=update_book" class="link-dark rounded">Cập nhật</a></li>
                            <li><a href="index.php?do=discount" class="link-dark rounded">Khuyến mãi</a></li>
                            <li><a href="#" class="link-dark rounded">Nhà cung cấp</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Thống kế
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
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dữ liệu
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="#" class="link-dark rounded">Sao lưu</a></li>
                            <li><a href="#" class="link-dark rounded">Phục hồi</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Tài khoản
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a href="#" class="link-dark rounded">Thông tin tài khoản </a></li>
                            <li><a href="index.php?do=logout" class="link-dark rounded">Thoát tài khoản</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </aside>
    </div>
  <!-- Cột giữa -->
    <div class="center">
    <?php
        if (isset($_GET['do'])) {
            $do = $_GET['do'];
            switch ($do) {
                case 'add_book':
                    include "admin/add_book.php";
                    break;
                case 'update_book':
                    include "admin/update_book.php";
                    break;
                case 'discount':
                    include "admin/discount.php";
                    break; 
                default:
                    include "admin/add_book.php";
                    break;
            }
        } else {
            echo "<h1>Chức năng này chưa được cập nhật</h1>";
        }    
    ?>
    </div>
</div>
