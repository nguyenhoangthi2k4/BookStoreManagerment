<?php
// Kết nối CSDL
include_once("../dbprocess.php");

// Nhận dữ liệu từ form
$username = $_POST['username'];

    // Lấy trạng thái hiện tại
$sql = "SELECT * FROM ACCOUNT WHERE USERNAME = '$username'";
$result = executePreparedSingleResult($sql);

if ($result != null) {
    $current = $result['KHOA_TK'];
    $newStatus = $current == 1 ? 0 : 1;

    // Cập nhật trạng thái
    $update_sql = "UPDATE ACCOUNT SET KHOA_TK = $newStatus WHERE USERNAME = '$username'";
    execute($update_sql);

    echo $newStatus;
} 
else { echo -1;
}

echo '<script>alert("Cập nhật trạng thái thành công");</script>';
echo '<script>window.location.href = "../index.php?do=account_manager";</script>';

?>
