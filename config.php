<?php
    $servername = "localhost";
    $username = "root";    
    $password = "vertrigo";
    $database = "qlsach";

    $conn = new mysqli($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        exit();
    }
?>