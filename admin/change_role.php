<?php
// Kết nối CSDL
include_once("../dbprocess.php");

// Nhận dữ liệu từ form
$username = $_POST['username'];

    // Lấy quyền hiện tại
$sql = "SELECT * FROM ACCOUNT WHERE USERNAME = '$username'";
$result = executePreparedSingleResult($sql);

if ($result != null) {
    $current = $result['QUYEN'];
    $newRole = $current == 1 ? 2 : 1;

    // Cập nhật quyền
    $update_sql = "UPDATE ACCOUNT SET QUYEN = $newRole WHERE USERNAME = '$username'";
    execute($update_sql);

    echo $newRole;
} 
else { echo -2;
}

echo '<script>alert("Cập nhật quyền thành công");</script>';
echo '<script>window.location.href = "../index.php?do=account_manager";</script>';
?>
