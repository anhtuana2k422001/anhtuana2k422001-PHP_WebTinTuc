<?php 
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

    <!-- Code Container  -->

    <!-- Import Footer -->
    <?php include_once("./main_layout/footer.php"); ?> 

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
    <!-- Import JS  -->
    <?php include_once("./main_layout/js.php"); ?> 
</body>
</html>

