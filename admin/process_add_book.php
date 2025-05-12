<?php
include_once '../dbprocess.php';

// Lấy thông tin từ form
$masach = $_POST['masach'];
$tensach = $_POST['tensach'];
$nhaxuatban = $_POST['nhaxuatban'];
$tacgia = $_POST['tacgia'];
$theloai = $_POST['theloai'];
$giagoc = $_POST['giagoc'];
$soluong = $_POST['soluong'];
$noidung = $_POST['noidung'];

// Xử lý upload ảnh
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["anhbia"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["anhbia"]["tmp_name"]);
if ($check !== false) {
    // Kiểm tra kích thước ảnh
    if ($_FILES["anhbia"]["size"] > 500000) {
        echo "<script>alert('Xin lỗi, ảnh quá lớn.');</script>";
        echo "<script>window.location.href = '../index.php?do=add_book';</script>";
        exit;
    }
    // Kiểm tra định dạng ảnh
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Xin lỗi, chỉ cho phép định dạng JPG, JPEG, PNG.');</script>";
        echo "<script>window.location.href = '../index.php?do=add_book';</script>"; 
        exit;
    }
    // Di chuyển file ảnh vào thư mục uploads
    if (move_uploaded_file($_FILES["anhbia"]["tmp_name"], $target_file)) {
        // Thêm thông tin sách vào cơ sở dữ liệu
        $url = substr($target_file, 3);
        $sql = "INSERT INTO SACH (MASACH, TENSACH, MANXB, MATACGIA, MATHELOAI, GIAGOC, SOLUONGTON, ANHBIA, NOIDUNG) 
                VALUES ('$masach', '$tensach', '$nhaxuatban', '$tacgia', '$theloai', '$giagoc', '$soluong', '$url', '$noidung')";
        execute($sql);

        header("Location: ../index.php?do=add_book");
    } else {
        echo "<script>alert('Xin lỗi, đã xảy ra lỗi khi tải lên ảnh.');</script>";
        echo "<script>window.location.href = '../index.php?do=add_book';</script>";
    }
} 
else {
    echo "<script>alert('Xin lỗi, tệp không phải là hình ảnh.');</script>";
    echo "<script>window.location.href = '../index.php?do=add_book';</script>";
}
?>