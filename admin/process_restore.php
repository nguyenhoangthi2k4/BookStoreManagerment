<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Kiểm tra xem file đã được chọn chưa
        if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['backup_file']['tmp_name'];            

            // Đường dẫn đến file sao lưu
            $backupDir = '../backups/';

            if (!file_exists($backupDir)) {
                mkdir($backupDir, 0777, true);
            }

             // Đặt tên file sao lưu
            $backupFile = $backupDir . $_FILES['backup_file']['name'];

            if (move_uploaded_file($fileTmpPath, $backupFile)) {
                // Thông tin cơ sở dữ liệu
                $dbHost = 'localhost';
                $dbUser = 'root';
                $dbPass = 'vertrigo';
                $dbName = 'qlsach';

                // Câu lệnh mysql để phục hồi dữ liệu
                $mysqlPath = '..\\..\\..\\Mysql\\bin\\mysql.exe';
                $command = "$mysqlPath -h$dbHost -u$dbUser -p\"$dbPass\" $dbName < \"$backupFile\"";

                // Thực thi lệnh và kiểm tra kết quả
                system($command, $output);
                if ($output === 0) {
                    echo "<h2>Phục hồi dữ liệu thành công!</h2>";
                } else {
                    echo "<h2>Phục hồi dữ liệu thất bại!</h2>";
                }
            }
        }
    }
?>