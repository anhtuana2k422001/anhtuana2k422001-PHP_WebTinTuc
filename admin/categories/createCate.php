<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/category.class.php");
require_once("../admin_entities/tags.class.php");
require_once("../admin_entities/user.class.php");
require_once("../admin_entities/images.class.php");
require_once("../admin_handle/handle.php");
 
session_start();

// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // lấy password người dùng
    $slug = $_POST['slug']; // lấy password người dùng
    
    // lấy id của account đang đăng nhập
    $emailLogin = $_SESSION['email'];
    $getUserId = User::getUserbyEmail($emailLogin);
    $user_id = $getUserId['id'];

    $created_at = $timestamp;
    $updated_at = $timestamp;

    $newCate = new Category($name, $slug, $user_id, $created_at, $updated_at);

    $newCate->add();
    
    header('Location: listcategories.php');
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
    <title>Quản trị - Sửa danh mục</title>
    <?php include_once("../admin_layouts/css.php"); ?>


</head>

<body>
    <!--start page wrapper -->
    <div class="page-wrapper">
        <!--start header -->
        <?php include_once("../admin_layouts/header.php"); ?>
        <!--end header -->
        <!--navigation-->
        <?php include_once("../admin_layouts/nav.php"); ?>
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Danh mục bài viết</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php   ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới danh mục</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Thêm danh mục mới</h5>
                    <hr />
                    <form action="<?php   ?>" method="POST">


                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tên danh mục</label>
                                            <input type="text"   name="name" required class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

                                             
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Slug - danh mục</label>
                                            <input type="text"   name="slug" required class="form-control" id="inputProductTitle" placeholder="Nhập slug">

                                             
                                        </div>

                                        <button class="btn btn-primary" type="submit">Thêm danh mục</button>

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
    <!--end wrapper-->

    <!--start switcher-->
    <?php include_once("../admin_layouts/switcher.php"); ?>
    <!--end switcher-->

    <!-- Bootstrap JS -->
    <?php include_once("../admin_layouts/js.php"); ?>

    <?php include_once("../admin_layouts/chart.php"); ?>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</body>

</html>