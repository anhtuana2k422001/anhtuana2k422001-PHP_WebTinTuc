<?php
require_once("../admin_entities/user.class.php");
require_once("../admin_entities/images.class.php");
require_once("../admin_entities/role.class.php");
require_once("../admin_handle/handle.php");

//$categories  = Category::list_category();
session_start();

if (!isset($_GET["id"])) {
    // dẫn tới trang not found
    header("Location: /404.php");
} else {
    $id = $_GET["id"];
    $user = User::getUser($id);
    if (!$user)
        header("Location: /404.php");
}

// Đặt múi giờ theo múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = date("Y-m-d H:i:s", time());

// Kiểm tra các giá trị được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];

    $name = $_POST['name']; // lấy password người dùng
    $email = $_POST['email']; // lấy password người dùng
    $role_id = $_POST['role_id']; // lấy password người dùng
    $email_verified_at = $timestamp;
    $password = "";
    $status = "";
    $remember_token = "";
    $created_at = $timestamp;
    $updated_at = $timestamp;

    $editUser = new User($name, $email, $email_verified_at, $password, $status, $role_id, $remember_token , $created_at, $updated_at);

    //Update các thuộc tính trong bảng posts
    $editUser->update($id);

    // Kiểm tra nếu người dùng chọn ảnh mới thì thực hiện update hình ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $name = $_FILES['image']['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $extension;
        $path = "images/" . $file_name;
        $imageable_id = $id;
        $imageable_type = 'App\Models\User';
        $thumbnail = $_FILES['image'];
        $file_destination = $_SERVER['DOCUMENT_ROOT'] . '/storage/images/' . $file_name;
        move_uploaded_file($thumbnail['tmp_name'], $file_destination);
        $editImg = new Image($name, $extension, $path, $imageable_id, $imageable_type, $created_at, $updated_at);
        $editImg->update($id);
    }
    header('Location: listuser.php');
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
                    <div class="breadcrumb-title pe-3">Tài khoản</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Sửa tài khoản: <?php echo $user["name"] ?></h5>
                        <hr />
                        <form  method="POST" enctype="multipart/form-data">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="mb-3">
                                                <label for="input_name" class="form-label">Họ Tên</label>
                                                <input name="name" type="text" class="form-control" id="input_name" value='<?php echo $user["name"] ?>'>
                                            </div>

                                            <div class="mb-3">
                                                <label for="input_email" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="input_email" value='<?php echo $user["email"] ?>'>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="mb-3">
                                                        <label for="input_image" class="form-label">Ảnh đai diện</label>
                                                        <input name="image" type="file" class="form-control" id="input_image" onchange="previewImage(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="user_image">
                                                        <img id="preview" class="img_admn--user img-avatar" width="220px" height="220px" style="border-radius: 50%; margin: auto; background-size: cover ;  background-image: url(<?php echo HandleAdmin::getUserPathImg($user["id"]) ?>)" alt="">
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
                                                <label for="inputProductTitle" class="form-label">Quyền tài khoản</label>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="p-3 rounded">
                                                            <div class="mb-3">
                                                                <select name="role_id" required class="single-select">
                                                                <?php
                                                                    $role = Roles::GetRoles($user["role_id"]);
                                                                    echo "<option value=" . $role["id"] . ">" . $role["name"] . "</option>";
                                                                    $roles = Roles::ListRole();
                                                                    foreach ($roles as $item) {
                                                                        if ($item["name"] != $role["name"])
                                                                            echo "<option value=" . $item["id"] . ">" . $item["name"] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Sửa tài khoản</button>

                                            <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_user_{{ $user->id }}').submit();" href="#">Xóa tài khoản</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form id="delete_user_{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="post">
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