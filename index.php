<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">
    <!-- Import Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

     <!-- Import Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Import CSS -->
    <link rel="stylesheet" href="style/mystyle.css">
    <link rel="stylesheet" href="style/mainstyle.css">
    
    <title>Website Bán sách số 1 - VN</title>
</head>
<body>
    <header>
        <?php include "page/header.php"; ?>        
    </header>

    <main>
        <?php 
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if (isset($_SESSION["username"]) && $_SESSION["quyen"] == 1) {
            // Quản trị viên
            include "page/main_manager.php";
        } elseif ($action == 'register') {
            include "main/register.php";
        } elseif ($action == 'change_password') {
            include "main/change_password.php";
        } elseif ($action == 'history') {
            include "main/history.php";
        } elseif (!empty($id)) {
            include "page/detail_book.php";
        } else {
            include "page/main_user.php";
        }

        ?>
    </main>

    <footer class="footer">
        <?php include "page/footer.php"; ?>
    </footer>

    <!-- Import Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- xử lý xoay -->
    <script>
        document.querySelectorAll('.btn-toggle').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
