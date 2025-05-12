<?php
include_once '../dbprocess.php';

if (isset($_GET['masach'])) {
    $masach = $_GET['masach'];
    $sql = "SELECT * FROM SACH WHERE MASACH = '$masach'";
    $result = executePreparedSingleResult($sql); // Lấy 1 dòng duy nhất
    if ($result != null) {
        echo $result['GIAGOC'];
    } else {
        echo "Không tìm thấy";
    }
}
?>
