<?php 
    require_once("./entities/users.class.php"); 
    $title = "Website Tin Tức";

    // Lấy thời gian 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $day = date("d", time()) ;
    $month= date("m", time()) ;
    $year= date("Y", time()) ;
    // Định dạng thời gian theo định dạng Thứ
    $time_day = strftime('%A', time());

    // Chuyển đổi các chuỗi tiếng Anh sang tiếng Việt
    $time_day = str_replace(array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                    array('Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'),
                    $time_day);
    // Hiển thị kết quả
    $time = "Hôm nay (" . $time_day  . ", Ngày".  $day ." Tháng" . $month . " Năm " .  $year . ")";

    //
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $email_cookie = $_COOKIE['username']; // lấy email người dùng 
        $password_cookie = $_COOKIE['password']; // lấy password người dùng
        $user = User::getUser($email_cookie); // lấy thông tin 1 user thông qua email
        //kiểm tra thông tin tài khoản
        $checkLogin = User::login($email_cookie, $password_cookie);
        if ($checkLogin) {
            $_SESSION['username'] = $user["name"];
             
        } 
    }
?>
 
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="_token" content="{{ csrf_token()}}" />
	<link rel="icon" type="image/png" href="./public/kcnew/frontend/img/image_iconLogo.png"  sizes="160x160">
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    
    <!-- Import CSS  -->
    <?php include_once("./main_layout/css.php"); ?> 

</head>
<body class="boxed" data-bg-img="./public/kcnew/frontend/img/bg_website.png">
   
    <!-- Import Header -->
    <?php include_once("./main_layout/header.php"); ?> 

<<<<<<< HEAD
    <!-- Code Content  -->
    <?php include_once("./main_layout/content.php"); ?> 
    
=======
    <!-- Code Container  -->
>>>>>>> 3f419e0695fc8480cfaa4ebe1ffd09c2f80b0d7f

    <!-- Import Footer -->
    <?php include_once("./main_layout/footer.php"); ?> 

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
    <!-- Import JS  -->
    <?php include_once("./main_layout/js.php"); ?> 
</body>
</html>

