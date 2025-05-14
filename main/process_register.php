<?php
	include_once('../config.php');
	include_once('../dbprocess.php');

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$username = trim($_POST["username"] ?? '');
		$password = $_POST["password"] ?? '';
		$password_confirm = $_POST["confirm_password"] ?? '';
		$email = trim($_POST["email"] ?? '');
		$name = trim($_POST["name"] ?? '');
		$phone = trim($_POST["phone"] ?? '');
		$address = trim($_POST["address"] ?? '');
		$birthday = $_POST["ngaysinh"] ?? '';
		$gender = $_POST["gioitinh"] ?? '';
		$date = $_POST["ngaysinh"] ?? '';
		$role = 2; // Quyền mặc định: Khách hàng

		if ($username && $password && $password_confirm && $email && $name && $phone && $address && $birthday && $gender !== '') {
			if ($password !== $password_confirm) {
				header("Location: ../index.phpaction=register&error=confirm");
				exit();
			}
			//check email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../index.php?action=register&error=email");
				exit();
			}
			//check sdt
			if (!preg_match('/^0[13579][0-9]{8}$/', $phone)) {
				header("Location: ../index.php?action=register&error=phone");
				exit();
			}

			// Kiểm tra username đã tồn tại
			$sql = 'SELECT COUNT(*) AS total FROM ACCOUNT WHERE USERNAME = "'.$username.'"';
			$check = executePreparedSingleResult($sql);
			if ($check && $check['total'] > 0) {
				header("Location: ../index.php?action=register&error=exists");
				exit();
			}

			// Mã hóa mật khẩu
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			// Thêm vào ACCOUNT
			$sqlAcc = 'INSERT INTO ACCOUNT (USERNAME, PASSWORD, TENTAIKHOAN, QUYEN) VALUES ("'.$username.'","'.$hashedPassword.'","'.$name.'","'.$role.'")';
            execute($sqlAcc);
			// Thêm vào KHACHHANG
			$sqlKH = 'INSERT INTO KHACHHANG (TENKHACHHANG, DIACHI, SDT, USERNAME, EMAIL, NGAYSINH) VALUES ("'.$name.'","'.$address.'","'.$phone.'","'.$username.'","'.$email.'", "'.$date.'")';
            execute($sqlKH);
			header("Location: ../index.php");
			exit();
		} else {
			header("Location: ../index.php?action=register&error=missing");
			exit();
		}
	} else {
		header("Location: ../index.php");
		exit();
	}
?>
