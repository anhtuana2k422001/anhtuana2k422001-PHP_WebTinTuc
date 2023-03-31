<?php
  require_once("../session.php");
  
// Lấy URL hiện tại
$url = $_SERVER['REQUEST_URI']; // Lấy URL đầy đủ của trang hiện tại
$matches = explode('/', $url); // Tách URL thành các phần bằng dấu "/"
$slugEnd = end($matches); // Lấy phần cuối cùng của URL, chính là "slug"


if($matches[1]=="admin")
    if(isset($_SESSION['role'])){
        if($_SESSION['role'] == 1)
            header('Location: /error.php');
        else
            if(isset($matches[2]) != "trang-quan-tri" )
                 header('Location: /admin/trang-quan-tri');
    }else{
        header('Location: /error.php');
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" type="image/png" href="./kcnew/frontend/img/image_iconLogo.png"  sizes="160x160">
	<!--plugins-->
    <?php include_once("./admin_layouts/css_index.php"); ?> 
    <title>Trang quản trị </title>
    <?php include_once("./admin_layouts/css.php"); ?>  
</head>

<body>

	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
        <?php include_once("./admin_layouts/header.php"); ?> 
		<!--end header -->
		<!--navigation-->
	    <?php include_once("./admin_layouts/nav.php"); ?> 
		<!--end navigation-->
		<!--start page Content wrapper -->
        <?php include_once("./admin_layouts/wrapper.php"); ?> 
		<!--end page wrapper -->
        <?php include_once("./admin_layouts/footer.php"); ?> 
	</div>
	<!--end wrapper-->

    <!--start switcher-->
    <?php include_once("./admin_layouts/switcher.php"); ?> 
    <!--end switcher-->

	<!-- Bootstrap JS -->
    <?php include_once("./admin_layouts/js_index.php"); ?> 

    <?php include_once("./admin_layouts/chart.php"); ?> 
</body>

</html>