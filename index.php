<?php
    session_start();
    //include_once "config.php";
?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">
    <!-- Import Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Import CSS -->
    <link rel="stylesheet" href="style/mystyle.css">

    <title>Website Bán sách số 1 - VN</title>
</head>
<body>
    <header>
        <?php include "page/header.php"; ?>
    </header>
    <nav></nav>
    <main>
        <?php include "page/backup.php" ?>
    </main>

    <footer class="footer">
        <?php include "page/footer.php"; ?>
    </footer>
</body>
</html>
