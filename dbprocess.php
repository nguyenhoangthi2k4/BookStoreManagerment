<?php
    include_once("config.php");

    // Hàm thực thi INSERT, UPDATE, DELETE
    function execute($sql) {
        global $conn;
        mysqli_query($conn, $sql);
    }

    // Hàm thực thi SELECT trả về 1 dòng
    function executePreparedSingleResult($sql) {
        global $conn;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    // Hàm SELECT nhiều dòng
    function executeResults($sql) {
        global $conn;
        $result = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function executeInsert($sql) {
        global $conn;
        mysqli_set_charset($conn, 'utf8');
        if (!mysqli_query($conn, $sql)) {
            die("Lỗi SQL: " . mysqli_error($conn));
        }
        return mysqli_insert_id($conn);
    }

?>
