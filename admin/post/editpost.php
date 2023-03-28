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
    $post = Post::GetPostById($id);

    // Lấy danh sách từ khóa 
    $tags  = Tags::getTagsPost($id);

    if (!$post)
        header("Location: /404.php");
}

// Khởi tạo biến lưu trữ thông báo lỗi
$message = "";

// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

// Kiểm tra các giá trị được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $title = $_POST['title']; // lấy password người dùng
    $slug = $_POST['slug']; // lấy password người dùng
    $excerpt = $_POST['excerpt']; // lấy password người dùng
    $body = $_POST['body']; // lấy password người dùng

    // lấy id của account đang đăng nhập
    $emailLogin = $_SESSION['email'];
    $getUserId = User::getUserbyEmail($emailLogin);
    $user_id = $getUserId['id'];

    $category_id = $_POST['category_id']; //
    $view = 0;
    $approved = 1;
    $created_at = $timestamp;
    $updated_at = $timestamp;

    $newPost = new Post($title, $slug, $excerpt, $body, $user_id, $category_id, $view, $approved, $created_at, $updated_at);

    //Update các thuộc tính trong bảng posts
    $newPost->update($id);

    // Kiểm tra nếu người dùng chọn ảnh mới thì thực hiện update hình ảnh
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $name = $_FILES['thumbnail']['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $extension;
        $path = "images/" . $file_name;
        $imageable_id = $id;
        $imageable_type = 'App\Models\Post';
        $thumbnail = $_FILES['thumbnail'];
        $file_destination = $_SERVER['DOCUMENT_ROOT'] . '/storage/images/' . $file_name;
        move_uploaded_file($thumbnail['tmp_name'], $file_destination);
        $editImg = new Image($name, $extension, $path, $imageable_id, $imageable_type, $created_at, $updated_at);
        $editImg->update($id);
    }
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
                    <div class="breadcrumb-title pe-3">Bài viết</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Sửa bài viết: <?php echo $post['title'] ?></h5>
                        <hr />
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
                                                <input type="text" value='<?php echo $post['title'] ?>' name="title" required class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

                                                <!-- Hiển thị thông báo lỗi -->
                                                <?php if (isset($message) && !empty($message)) : ?>
                                                    <p class="text-danger"><?php echo $message; ?></p>
                                                <?php endif; ?>

                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug - liên kết</label>
                                                <input type="text" value='<?php echo $post['slug'] ?>' name="slug" required class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">

                                                <!-- Hiển thị thông báo lỗi -->
                                                <?php if (isset($message) && !empty($message)) : ?>
                                                    <p class="text-danger"><?php echo $message; ?></p>
                                                <?php endif; ?>

                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Mô tả</label>
                                                <textarea required name="excerpt" class="form-control" id="inputProductDescription" rows="3"><?php echo $post['excerpt'] ?></textarea>

                                                <!-- Hiển thị thông báo lỗi -->
                                                <?php if (isset($message) && !empty($message)) : ?>
                                                    <p class="text-danger"><?php echo $message; ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Danh mục bài viết</label>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="p-3 rounded">
                                                            <div class="mb-3">

                                                                <select name="category_id" required class="single-select">
                                                                    <?php
                                                                    $cate = Category::GetCategory($post["category_id"]);
                                                                    echo "<option value=" . $cate["id"] . ">" . $cate["name"] . "</option>";
                                                                    $cates = Category::ListCategorie();
                                                                    foreach ($cates as $item) {
                                                                        if ($item["name"] != $cate["name"])
                                                                            echo "<option value=" . $item["id"] . ">" . $item["name"] . "</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                                <!-- <p class="text-danger">==> Còn lỗi sai, select còn chưa đúng</p> -->

                                                                <p class="text-danger"><?php echo htmlentities($message); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Từ khóa</label>
                                                <input type="text" class="form-control" <?php foreach ($tags as $tag) : ?> value="<?php echo $tag["name"] ?>" <?php endforeach ?> name="tags" data-role="tagsinput">
                                            </div>

                                            <!-- <input id="image-uploadify" name="thumbnail" type="file" id="file" accept="image/*" multiple> -->
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label for="inputProductDescription" class="form-label">Hình ảnh bài viết</label>
                                                                <input id="thumbnail" name="thumbnail" type="file" onchange="previewImage(event)" />

                                                                <!-- Hiển thị thông báo lỗi -->
                                                                <?php if (isset($message) && !empty($message)) : ?>
                                                                    <p class="text-danger"><?php echo $message; ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 text-center">
                                                        <img id="preview" style="width: 100%; border-radius: 16px;" src="<?php echo HandleAdmin::getPathImg($post["id"]) ?>" class="img-responsive" alt="All thumbnail">
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

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
                                                <textarea name="body" id="post_content" class="form-control" id="inputProductDescription" rows="3"><?php echo $post['body'] ?></textarea>
                                                <!-- Hiển thị thông báo lỗi -->
                                                <?php if (isset($message) && !empty($message)) : ?>
                                                    <p class="text-danger"><?php echo $message; ?></p>
                                                <?php endif; ?>
                                                <script>
                                                    tinymce.init({
                                                        selector: 'textarea',
                                                        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                                                    });
                                                </script>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <input name="approved" <?php echo $post['approved'] ? 'checked' : ''; ?> class="form-check-input" type="checkbox" id="flexSwitchChecked">
                                                    <label class="form-check-label <?php echo $post['approved'] ? 'text-success' : 'text-warning'; ?>" for="flexSwitchChecked">
                                                        <?php echo $post['approved'] ? 'Đã phê duyệt' : 'Chưa phê duyệt'; ?>
                                                    </label>
                                                    <!-- <p class="text-danger">==> Còn lỗi sai, select còn chưa đúng</p> -->
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit" name="edit">Sửa bài viết</button>

                                            <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_post_{{ $post->id }}').submit();" href="#">Xóa bài viết</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <form id="delete_post_{{ $post->id }}" action="{{ route('admin.posts.destroy', $post) }}" method="post">
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