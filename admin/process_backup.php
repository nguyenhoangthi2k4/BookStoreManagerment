<?php
    // Sao lưu dữ liệu
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tạo tên file sao lưu
        $backupDir = '../backups/';
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0777, true);
        }
        $backupFile = $backupDir . 'backup_' . date('Y-m-d_H-m-s') . '.sql';

        // Thông tin cơ sở dữ liệu
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = 'vertrigo'; 
        $dbName = 'qlsach';

        // Câu lệnh mysqldump
        $mysqldumpPath = '..\\..\\..\\Mysql\\bin\\mysqldump.exe';
        $command = "$mysqldumpPath -h$dbHost -u$dbUser -p\"$dbPass\" $dbName > \"$backupFile\"";

        // Thực thi lệnh và kiểm tra kết quả
        system($command, $output);
        if ($output === 0) {
            echo "<h2 class='success'>Sao lưu thành công!</h2>";
        } else {
            echo "<h2 class='error'>Sao lưu thất bại!</h2>";
        }
    }
?>