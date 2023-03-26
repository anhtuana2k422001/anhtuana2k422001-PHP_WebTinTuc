<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/category.class.php");
require_once("../admin_entities/tags.class.php");
require_once("../admin_handle/handle.php");


//$categories  = Category::list_category();

// Khởi tạo biến lưu trữ thông báo lỗi
$message = "";

// Kiểm tra các giá trị được gửi lên từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra tiêu đề
    if (empty($_POST["title"])) {
        $message = "Vui lòng nhập tiêu đề bài viết";
    }

    // Kiểm tra slug
    else if (empty($_POST["slug"])) {
        $message = "Vui lòng nhập slug";
    }

    // Kiểm tra danh mục
    else if (empty($_POST["category"])) {
        $message = "Vui lòng chọn danh mục";
    }

    // Kiểm tra mô tả
    else if (empty($_POST["description"])) {
        $message = "Vui lòng nhập mô tả";
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
    <!-- <style>
		.imageuploadify{
			margin: 0;
			max-width: 100%;
		}
	</style> -->



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
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">


                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" value='' name="title" required class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

                                            <!-- Hiển thị thông báo lỗi -->
                                            <?php if (isset($message) && !empty($message)) : ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php endif; ?>

                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Slug - liên kết</label>
                                            <input type="text" value='' name="slug" required class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">

                                            <!-- Hiển thị thông báo lỗi -->
                                            <?php if (isset($message) && !empty($message)) : ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php endif; ?>

                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea required name="excerpt" class="form-control" id="inputProductDescription" rows="3"></textarea>


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
                                                                <option value=" ">Chọn danh mục bài viết</option>
                                                                <?php
                                                                $cates = Category::ListCategorie();
                                                                foreach ($cates as $item) {
                                                                    echo "<option value=" . $item["id"] . ">" . $item["name"] . "</option>";
                                                                }
                                                                ?>
                                                            </select> 
                                                            <!-- Hiển thị thông báo lỗi -->
                                                            <?php if (isset($message) && !empty($message)) : ?>
                                                                <p class="text-danger"><?php echo $message; ?></p>
                                                            <?php endif; ?> 
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
                                            <input id="thumbnail" require name="thumbnail" type="file" id="file">

                                            @error('thumbnail')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
                                            <textarea name="body" id="post_content" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                            <script>
                                                tinymce.init({
                                                    selector: 'textarea',
                                                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                                                });
                                            </script>

                                            <!-- Hiển thị thông báo lỗi -->
                                            <?php if (isset($message) && !empty($message)) : ?>
                                                <p class="text-danger"><?php echo $message; ?></p>
                                            <?php endif; ?>

                                        </div>

                                        <button class="btn btn-primary" type="submit">Thêm bài viết</button>

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
    @endsection

    @section("script")
    <!-- <script src="{{ asset('admin_dashboard_assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script> -->
    <script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <script>
        $(document).ready(function() {
            // $('#image-uploadify').imageuploadify();

            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            tinymce.init({
                selector: '#post_content',
                // plugins: 'advlist autolink lists link image media charmap print preview hr anchor pagebreak',
                plugins: 'advlist autolink lists link image media charmap preview anchor pagebreak',
                toolbar_mode: 'floating',
                height: '500',

                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
                toolbar_mode: 'floating',

                image_title: true,
                automatic_uploads: true,

                images_upload_handler: function(blobinfo, success, failure) {
                    let formData = new FormData();
                    let _token = $("input[name='_token']").val();
                    let xhr = new XMLHttpRequest();
                    xhr.open('post', "{{ route('admin.upload_tinymce_image') }}");
                    xhr.onload = () => {
                        if (xhr.status !== 200) {
                            failure("Http Error: " + xhr.status);
                            return
                        }
                        let json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != 'string') {
                            failure("Invalid JSON: " + xhr.responseText);
                            return
                        }
                        success(json.location);

                    }

                    formData.append('_token', _token);
                    formData.append('file', blobinfo.blob(), blobinfo.filename());
                    xhr.send(formData);
                }

            });

            setTimeout(() => {
                $(".general-message").fadeOut();
            }, 5000);

        });
    </script>

    <script>
        $(document).on('change', '.inputPostTitle', (e) => {
            e.preventDefault();

            let $this = e.target;

            let csrf_token = $($this).parents("form").find("input[name='_token']").val();
            let titlePost = $($this).parents("form").find("input[name='title']").val();

            let formData = new FormData();
            formData.append('_token', csrf_token);
            formData.append('title', titlePost);

            $.ajax({
                url: "{{ route('admin.posts.to_slug') }}",
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        $('.slugPost').val(data.message);

                    } else {
                        alert("Bị lỗi khi nhập title !")
                    }
                }
            })
        })
    </script>
    <!--end wrapper-->

    <!--start switcher-->
    <?php include_once("../admin_layouts/switcher.php"); ?>
    <!--end switcher-->

    <!-- Bootstrap JS -->
    <?php include_once("../admin_layouts/js.php"); ?>

    <?php include_once("../admin_layouts/chart.php"); ?>
</body>

</html>