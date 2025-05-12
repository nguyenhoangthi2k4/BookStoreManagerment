<?php
include_once '../dbprocess.php';

// Lấy thông tin từ form
$masach = $_POST['masach'];

// Ép kiểu giá gốc về kiểu số
$giagoc = $_POST['giagoc'];
if(isset($giagoc) && !is_numeric($giagoc)){ 
    echo "<script>alert('Lỗi nhập giá gốc!');</script>";
    echo "<script>window.location.href = '../index.php?do=update_book'</script>";
    exit();
}
// Cập nhật giá sách trong cơ sở dữ liệu
$sql = "UPDATE SACH SET GIAGOC = '$giagoc' WHERE MASACH = '$masach'";
execute($sql);

// Kiểm tra xem có lỗi không
if (mysqli_affected_rows($conn) > 0) {
    header("Location: ../index.php?do=update_book");
}
?>