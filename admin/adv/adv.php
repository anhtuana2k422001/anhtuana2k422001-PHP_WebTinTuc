<?php
// require_once("../admin_entities/setting.class.php");
// require_once("../admin_handle/handle.php");

$about = About::ListAbout();
$path = $about["about_first_image"];
$path2 = $about["about_second_image"];
// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

// Kiểm tra các giá trị được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $about_first_text = $_POST['about_first_text'];  
    $about_second_text = $_POST['about_second_text'];  
    $about_our_mission = $_POST['about_our_mission'];  
    $about_our_vision = $_POST['about_our_vision'];  
    $about_services = $_POST['about_services'];  
    $created_at = $timestamp;
    $updated_at = $timestamp;
    // Kiểm tra nếu người dùng chọn ảnh mới thì thực hiện update hình ảnh
    if (isset($_FILES['about_first_image']) && $_FILES['about_first_image']['error'] == 0) {
        $name = $_FILES['about_first_image']['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $extension;
        $newPath = "setting/" . $file_name;
        $thumbnail = $_FILES['about_first_image'];
        $file_destination = $_SERVER['DOCUMENT_ROOT'] . '/storage/setting/' . $file_name;
        move_uploaded_file($thumbnail['tmp_name'], $file_destination);
    }
    else{
        $newPath = $path;
    }
    if (isset($_FILES['about_second_image']) && $_FILES['about_second_image']['error'] == 0) {
        $name2 = $_FILES['about_second_image']['name'];
        $extension2 = pathinfo($name2, PATHINFO_EXTENSION);
        $file_name2 = uniqid() . '.' . $extension2;
        $newPath2 = "setting/" . $file_name2;
        $thumbnail2 = $_FILES['about_second_image'];
        $file_destination2 = $_SERVER['DOCUMENT_ROOT'] . '/storage/setting/' . $file_name2;
        move_uploaded_file($thumbnail2['tmp_name'], $file_destination2);
    }
    else{
        $newPath2 = $path2;
    }
    $about = new About($about_first_text, $about_second_text, $newPath, $newPath2, $about_our_mission, $about_our_vision, $about_services, $created_at, $updated_at);
    $about->update();
    header('Location: about.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" type="image/png" href="./kcnew/frontend/img/image_iconLogo.png" sizes="160x160">
    <!--plugins-->
    <title>Quản trị - Tất cả danh mục</title>
    <?php include_once("../admin_layouts/css.php"); ?>
    <style>
        .imageuploadify {
            margin: 0;
            max-width: 100%;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/ay1wga320sbuvneqpq9at398v0s3xkpr02tl89arjb1ncbtb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header -->
        <?php include_once("../admin_layouts/header.php"); ?>
        <!--end header -->
        <!--navigation-->
        <?php include_once("../admin_layouts/nav.php"); ?>
        <!--end navigation-->

        <!--start page Content Page -->
        <div class="page-wrapper">
        <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Chỉnh sửa quảng cáo</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Quảng cáo</h5>
					  <hr/>
					<form method="POST"  enctype="multipart/form-data" >
                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="row">
											<div class="col-md-8">
												<div class="mb-3">
													<label for="about_first_image" class="form-label">Ảnh quảng cáo 1</label>
													<input name="about_first_image" type="file" class="form-control text-center center-block well well-sm" id="about_first_image" onchange="previewImage(event)" >
												</div>
											</div>
											<div class="col-md-4">
												<div class="user_image p-2">
													<img id="preview" class="img-fluid img-thumbnail" src="<?php echo HandleAdmin::getAboutPathImg1($about["id"]) ?>" alt="">
                                                </div>
                                                <script>
                                                        function previewImage(event) {
                                                            var preview = document.getElementById('preview');
                                                            var file = event.target.files[0];
                                                            var reader = new FileReader();
                                                            reader.onload = function() {
                                                                preview.src = reader.result;
                                                            };
                                                            reader.readAsDataURL(file);
                                                        }
                                                    </script>
											</div>
										</div>

										<div class="row">
											<div class="col-md-8">
												<div class="mb-3">
													<label for="about_second_image" class="form-label">Ảnh quảng cáo 2</label>
													<input name="about_second_image" type="file" class="form-control text-center center-block well well-sm" id="about_second_image" onchange="previewImage2(event)" >
												</div>
											</div>
											<div class="col-md-4">
												<div class="user_image p-2">
													<img id="preview2" class="img-fluid img-thumbnail" src="<?php echo HandleAdmin::getAboutPathImg2($about["id"]) ?>" alt="">
                                                    
                                                </div>
                                                <script>
                                                        function previewImage2(event) {
                                                            var preview = document.getElementById('preview2');
                                                            var file = event.target.files[0];
                                                            var reader = new FileReader();
                                                            reader.onload = function() {
                                                                preview.src = reader.result;
                                                            };
                                                            reader.readAsDataURL(file);
                                                        }
                                                    </script>
                                                 
											</div>
										</div>
										<button class="btn btn-primary" type="submit">Cập nhật</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				  </div>
			  </div>
			</div>
        </div>
        <!--end page wrapper -->
        <?php include_once("../admin_layouts/footer.php"); ?>
    </div>
    <!--end wrapper-->

    <!--start switcher-->
    <?php include_once("../admin_layouts/switcher.php"); ?>
    <!--end switcher-->

    <!-- Bootstrap JS -->
    <?php include_once("../admin_layouts/js.php"); ?>

    <?php include_once("../admin_layouts/chart.php"); ?>
</body>

</html>