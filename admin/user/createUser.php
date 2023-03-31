<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/role.class.php");
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
    $email = $_POST['email']; // lấy password người dùng
    $email_verified_at = $timestamp; // lấy password người dùng
    $password = $_POST['password']; // lấy password người dùng
    $repassword = $_POST['repassword']; // lấy password người dùng
    $status = 1; // lấy password người dùng
    $role_id = $_POST['role_id']; // lấy password người dùng
    $remember_token = User::generateRememberToken(16); // lấy password người dùng
    $created_at = $timestamp;
    $updated_at = $timestamp;

    if ($password !== $repassword) {
        $errors[] = "Password and Re-Password do not match.";
    } else {
        $newUser = new User($name, $email, $email_verified_at, $password, $status, $role_id, $remember_token, $created_at, $updated_at);
        $newUser->add();
        header('Location: listuser.php');
    }
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
    <title>Quản trị - Sửa người dùng</title>
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
                <div class="breadcrumb-title pe-3">Tài khoản</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới tài khoản</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Thêm tài khoản mới</h5>
                    <hr />
                    <form   method="POST" enctype="multipart/form-data">
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="input_name" class="form-label">Họ Tên</label>
                                            <input name="name" type="text" require class="form-control" id="input_name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_email" class="form-label">Email</label>
                                            <input name="email" type="email" require class="form-control" id="input_email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_password" class="form-label">Mật khẩu</label>
                                            <input name="password" type="password" require class="form-control" id="input_password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_password" class="form-label">Nhập lại mật khẩu</label>
                                            <input name="repassword" type="password" require class="form-control" id="input_password">
                                            <?php echo empty($errors)? "" : $errors?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_image" class="form-label">Ảnh đai diện</label>
                                            <input name="image" type="file" require class="form-control" id="input_image" onchange="previewImage()">
                                            <img id="preview_image" src="" alt="" width="200">
                                            <script>
                                                function previewImage() {
                                                    var preview = document.querySelector('#preview_image');
                                                    var file = document.querySelector('#input_image').files[0];
                                                    var reader = new FileReader();

                                                    reader.addEventListener("load", function() {
                                                        preview.src = reader.result;
                                                    }, false);

                                                    if (file) {
                                                        reader.readAsDataURL(file);
                                                    }
                                                }
                                            </script>

                                        </div>



                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Quyền tài khoản</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="p-3 rounded">
                                                        <div class="mb-3">
                                                            <select name="role_id" require class="single-select">
                                                                <option value=" ">Chọn quyền người dùng</option>
                                                                <?php
                                                                $roles = Roles::ListRole();
                                                                foreach ($roles as $item) {
                                                                    echo "<option value=" . $item["id"] . ">" . $item["name"] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Thêm tài khoản mới</button>
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