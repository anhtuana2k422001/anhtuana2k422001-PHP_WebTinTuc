<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/category.class.php");
require_once("../admin_entities/tags.class.php");
require_once("../admin_entities/user.class.php");
require_once("../admin_entities/images.class.php");
require_once("../admin_handle/handle.php");

//$categories  = Category::list_category();
session_start();

if (!isset($_GET["id"])) {
    // dẫn tới trang not found
    header("Location: /404.php");
} else {
    $id = $_GET["id"];
    $cate = Category::GetCategory($id);
    if (!$cate)
        header("Location: /404.php");
}

// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

// Kiểm tra các giá trị được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $name = $_POST['name']; 
    $slug = $_POST['slug'];  
    $created_at = $timestamp;
     
    $updated_at = $timestamp;

    $editCate = new Category($name, $slug, $user_id ,$created_at , $updated_at);

    //Update các thuộc tính trong bảng posts
    $editCate->update($id);
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
    <title>Quản trị - Sửa danh mục </title>
    <?php include_once("../admin_layouts/css.php"); ?>
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
                    <div class="breadcrumb-title pe-3">Danh mục bài viết</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Sửa danh mục : <?php echo $cate["name"] ?></h5>
                        <hr />
                        <form  method="POST">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Tên danh mục</label>
                                                <input type="text" value='<?php echo $cate["name"] ?>' name="name" required class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug - danh mục</label>
                                                <input type="text" value='<?php echo $cate["slug"] ?>' name="slug" required class="form-control" id="inputProductTitle" placeholder="Nhập slug">
                                            </div>

                                            <button class="btn btn-primary" type="submit">Sửa danh mục</button>

                                            <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_category_{{ $category->id }}').submit();" href="#">Xóa danh mục</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <form id="delete_category_{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="post">
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