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
		$role = 2; // Quyền mặc định: Khách hàng
		$status = 1; // 1 = đang hoạt động

		if ($username && $password && $password_confirm && $email && $name && $phone && $address && $birthday && $gender !== '') {
			if ($password !== $password_confirm) {
				header("Location: register.php?error=confirm");
				exit();
			}

			// Kiểm tra username đã tồn tại
			$sql = 'SELECT COUNT(*) AS total FROM ACCOUNT WHERE USERNAME = " '.$username.' " ';
			$check = executePreparedSingleResult($sql);
			if ($check && $check['total'] > 0) {
				header("Location: register.php?error=exists");
				exit();
			}

			// Mã hóa mật khẩu
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			// Thêm vào ACCOUNT
			$sqlAcc = 'INSERT INTO ACCOUNT (USERNAME, PASSWORD, TENTAIKHOAN, QUYEN, KHOA_TK) VALUES ("'.$username.'","'.$hashedPassword.'","'.$name.'","'.$role.'","'.$status.'")';
            execute($sqlAcc);
			// Thêm vào KHACHHANG
			$sqlKH = 'INSERT INTO KHACHHANG (TENKHACHHANG, DIACHI, SDT, USERNAME, EMAILEMAIL) VALUES ("'.$name.'","'.$address.'","'.$phone.'","'.$username.'","'.$email.'")';
            execute($sqlKH);
			header("Location: ../index.php");
			exit();
		} else {
			header("Location: register.php?error=missing");
			exit();
		}
	} else {
		header("Location: register.php");
		exit();
	}
?>
