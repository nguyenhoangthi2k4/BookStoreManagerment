<?php
// Nhận JSON
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'] ?? '';

if ($username === '') {
    echo json_encode(['success' => false]);
    exit;
}

// Kết nối CSDL
include_once("../dbprocess.php");

// Lấy trạng thái hiện tại
$sql = "SELECT KHOA_TK FROM ACCOUNT WHERE USERNAME = '$username'";
$result = executeResults($sql);

if (count($result) > 0) {
    $current = $result[0]['KHOA_TK'];
    $newStatus = $current == 1 ? 0 : 1;

    // Cập nhật trạng thái
    $update_sql = "UPDATE ACCOUNT SET KHOA_TK = $newStatus WHERE USERNAME = '$username'";
    execute($update_sql);

    echo json_encode(['success' => true, 'new_status' => $newStatus]);
} else {
    echo json_encode(['success' => false]);
}
?>
