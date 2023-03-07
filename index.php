<?php 
    require_once("./entities/users.class.php"); 

    $title = "Website Tin Tức";

     
    //
     
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $email_cookie = $_COOKIE['username']; // lấy email người dùng 
        $password_cookie = $_COOKIE['password']; // lấy password người dùng
        $user = User::getUser($_COOKIE['username']); // lấy thông tin 1 user thông qua email
        //kiểm tra thông tin tài khoản
        $checkLogin = User::login($_COOKIE['username'], $_COOKIE['password']);
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

    <!-- Code Content  -->
    <?php include_once("./main_layout/content.php"); ?> 
    

    <!-- Import Footer -->
    <?php include_once("./main_layout/footer.php"); ?> 

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
    <!-- Import JS  -->
    <?php include_once("./main_layout/js.php"); ?> 
</body>
</html>

