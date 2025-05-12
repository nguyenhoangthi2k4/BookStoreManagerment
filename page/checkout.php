<?php
    session_start();
    include_once("../config.php");
    include_once("../dbprocess.php");

    // Kiểm tra giỏ hàng
    if (!isset($_SESSION['products']) || count($_SESSION['products']) == 0) {
        header("Location: ../index.php?status=empty");
        exit;
    }

    // Kiểm tra khách hàng đã đăng nhập
    if (!isset($_SESSION['username'])) {
        header("Location: ../main/login.php?status=not_logged_in");
        exit;
    }

    $makhachhang = $_SESSION['user_id'];
    $ngaylap = date("Y-m-d");
    $tongtien = 0;

    foreach ($_SESSION["products"] as $item) {
        $tongtien += $item["price"] * $item["qty"];
    }

    // Lưu vào bảng HOADON (không cần MAHOADON vì auto_increment)
    $sqlInsertHD = "INSERT INTO HOADON (NGAYLAP, THANHTIEN, MAKHACHHANG) VALUES ('$ngaylap', '$tongtien', '$makhachhang')";
    $mahoadon = executeInsert($sqlInsertHD); 
    // Lưu chi tiết hóa đơn
    foreach ($_SESSION["products"] as $item) {
        $masach = $item["code"];
        $soluong = $item["qty"];
        $dongia = $item["price"];
        $sqlInsertCT = "INSERT INTO CTHOADON (MAHOADON, MASACH, SOLUONGMUA, DONGIABAN) 
                        VALUES ('$mahoadon', '$masach', '$soluong', '$dongia')";
        execute($sqlInsertCT);
    }

    // Xóa giỏ hàng
    unset($_SESSION["products"]);

    // Chuyển hướng
    header("Location: ../index.php?status=success");
    exit;
?>