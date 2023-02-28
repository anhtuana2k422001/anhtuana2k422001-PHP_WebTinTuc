<?php
require_once("../entities/users.class.php"); // Import entities classs users 
include_once("../session.php");

//$admins = User::list_users(); // Lấy danh sách admins
if (isset($_COOKIE['username']) || isset($_SESSION['nameAdmin'])) header("Location: ../admin/index.php");
//Kiểm tra đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['username']; // lấy email admin 
	$password = $_POST['password']; // lấy password admin
	$admin = User::getAdmin($email); // lấy thông tin 1 admin thông qua email

	// Mã hóa mật khẩu người dùng nhập vào
	// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	// echo $hashed_password;

	$checkLogin = User::loginAdmin($email, $password); // Trả về true, false
	if ($checkLogin) {
		// xử lý dữ liệu ở đây
		//Lưu cookie
		//Kiểm tra checkbox đã được check chưa
		if (isset($_POST['loginkeeping']) && $_POST['loginkeeping']) {
			setcookie("username", $email, time() + (86400 * 7), '/'); // 86400 bằng 1 ngày, nhân 7
			setcookie("password", $password, time() + (86400 * 7), '/'); //nghĩa là cookie lưu 7 ngày

		}

		// lưu giá trị của trường form vào session  
		$_SESSION['nameAdmin'] = $admin["name"];

		//header("Location: ../admin/index.php");
		header("Location: ./test.php");
	} else {
		// If invalid, display an error message
		$error_message = "<font color='red'>Bạn nhập sai tài khoản hoặc mật khẩu!</font>";
		$_SESSION['notice'] = $error_message;
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="./login/css/style.css">


</head>

<body class="img js-fullheight" style="background-image: url(./login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome to Admin</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center"> </h3>
						<form action="#" class="signin-form" method="post">
							<div class="form-group">
								<input type="email" id="username" name="username" class="form-control" placeholder="Mymail@mail.com" required>
							</div>
							<div class="form-group">
								<input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
							</div>
						</form>
						<p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
						<div class="social d-flex text-center">
							<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
							<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="./login/js/jquery.min.js"></script>
	<script src="./login/js/popper.js"></script>
	<script src="./login/js/bootstrap.min.js"></script>
	<script src="./login/js/main.js"></script>

</body>

</html>