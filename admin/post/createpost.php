<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/category.class.php");
require_once("../admin_entities/tags.class.php");
require_once("../admin_entities/user.class.php");
require_once("../admin_entities/images.class.php");
require_once("../admin_handle/handle.php");

session_start();


//$categories  = Category::list_category();

// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title']; // lấy password người dùng
    $slug = $_POST['slug']; // lấy password người dùng
    $excerpt = $_POST['excerpt']; // lấy password người dùng
    $body = $_POST['body']; // lấy password người dùng

    // lấy id của account đang đăng nhập
    $emailLogin = $_SESSION['email'];
    $getUserId = User::getUserbyEmail($emailLogin);
    $user_id = $getUserId['id'];

    $category_id = $_POST['category_id'];
    $view = 0;
    $approved = 1;
    $created_at = $timestamp;
    $updated_at = $timestamp;

    $newPost = new Post($title, $slug, $excerpt, $body, $user_id, $category_id, $view, $approved, $created_at, $updated_at);

    $newPost->add();
    $post_id = $newPost->getLastPostId();

    //
    //update hình ảnh post trong bảng images 
    $name = $_FILES['thumbnail']['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $file_name = uniqid() . '.' . $extension;
    $path = "images/" . $file_name;
    $imageable_id = $post_id;
    $imageable_type = 'App\Models\Post';

    if ($_FILES['thumbnail']['error'] == 0) {
        $thumbnail = $_FILES['thumbnail'];
        $file_destination = $_SERVER['DOCUMENT_ROOT'] . '/storage/images/' . $file_name;
        move_uploaded_file($thumbnail['tmp_name'], $file_destination);
    }
    $editImg = new Image($name, $extension, $path, $imageable_id, $imageable_type, $created_at, $updated_at);

    $editImg->add();
    header('Location: listposts.php');
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
    <title>Quản trị - Sửa bài viết</title>
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
                <div class="breadcrumb-title pe-3">Bài viết</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Thêm bài viết mới</h5>
                    <hr />
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" name="title" class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">



                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Slug - liên kết</label>
                                            <input type="text" name="slug" class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">



                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea name="excerpt" class="form-control" id="inputProductDescription" rows="3"></textarea>


                                            <!-- Hiển thị thông báo lỗi -->

                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Danh mục bài viết</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="p-3 rounded">
                                                        <div class="mb-3">
                                                            <select name="category_id" class="single-select">
                                                                <option value=" ">Chọn danh mục bài viết</option>
                                                                <?php
                                                                $cates = Category::ListCategorie();
                                                                foreach ($cates as $item) {
                                                                    echo "<option value=" . $item["id"] . ">" . $item["name"] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <!-- Hiển thị thông báo lỗi -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Từ khóa</label>
                                            <input type="text" class="form-control" name="tags" data-role="tagsinput">
                                        </div>

                                        <!-- <input id="image-uploadify" name="thumbnail" type="file" id="file" accept="image/*" multiple> -->
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Hình ảnh bài viết</label>
                                            <input id="thumbnail" name="thumbnail" type="file" id="file">


                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
                                            <textarea name="body" class="form-control" id="inputProductDescription" rows="3"></textarea>


                                            <!-- Hiển thị thông báo lỗi -->


                                        </div>

                                        <button class="btn btn-primary" type="submit" name="btnsubmit">Thêm bài viết</button>
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