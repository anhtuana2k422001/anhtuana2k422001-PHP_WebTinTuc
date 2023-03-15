<?php
require_once("../admin_entities/post.class.php");
require_once("../admin_entities/category.class.php");
require_once("../admin_entities/tags.class.php");
require_once("../admin_handle/handle.php");

$categories  = Category::list_category();


if(!isset($_GET["id"])){
    // dẫn tới trang not found
    header("Location: /404.php");
}
else{
    $id = $_GET["id"];
    $post = Post::GetPostById($id);

    // Lấy danh sách từ khóa 
    $tags  = Tags::getTagsPost($id);

    if(!$post)
        header("Location: /404.php");
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
		.imageuploadify{
			margin: 0;
			max-width: 100%;
		}
	</style>
	<script src="https://cdn.tiny.cloud/1/5nk94xe9fcwk22fkp6gou9ymszwidnujnr2mu3n3xe2biap3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
                        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
                                                <input type="text" value='<?php echo $post['title'] ?>' name="title" required class="inputPostTitle form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">

                                                <p class="text-danger">{{ $message }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Slug - liên kết</label>
                                                <input type="text" value='<?php echo $post['slug'] ?>' name="slug" required class="slugPost form-control" id="inputProductTitle" placeholder="Nhập slug">

                                                <p class="text-danger">{{ $message }}</p>
                                           
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Mô tả</label>
                                                <textarea required name="excerpt" class="form-control" id="inputProductDescription" rows="3"><?php echo $post['excerpt'] ?></textarea>
                                                
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Danh mục bài viết</label>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="p-3 rounded">
                                                            <div class="mb-3">
                                                                <select name="category_id" required class="single-select">
                                                                    <?php foreach( $categories as $key => $category ) : ?>
                                                                        <option <?php  $post["category_id"] === $key ? 'selected' : '' ?> value="<?php echo $key ?>"><?php echo $category["name"] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>

                                                                <p class="text-danger">==> Còn lỗi sai, select còn chưa đúng</p>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Từ khóa</label>
                                                <input type="text" class="form-control" <?php foreach($tags as $tag) : ?> value="<?php echo $tag["name"] ?>" <?php endforeach?> name="tags" data-role="tagsinput">
                                            </div>

                                            <!-- <input id="image-uploadify" name="thumbnail" type="file" id="file" accept="image/*" multiple> -->
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label for="inputProductDescription" class="form-label">Hình ảnh bài viết</label>
                                                                <input id="thumbnail" name="thumbnail" type="file" id="file" value="">
                                                            
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 text-center">
                                                        <img style="width: 100%; border-radius: 16px;" src="<?php echo HandleAdmin::getPathImg($post["id"])?>" class="img-responsive" alt="All thumbnail">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Nội dung bài viết</label> 
                                                <textarea name="body" id="post_content" class="form-control" id="inputProductDescription" rows="3"><?php echo $post['body'] ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <input name="approved" {{  $post->approved ? 'checked' : '' }} class="form-check-input" type="checkbox" id="flexSwitchChecked">
                                                    <label class="form-check-label {{  $post->approved ? 'text-success' : 'text-warning' }}" for="flexSwitchChecked">
                                                        {{ $post->approved ? 'Đã phê duyệt' : 'Chưa phê duyệt' }}
                                                    </label>
                                                    <p class="text-danger">==> Còn lỗi sai, select còn chưa đúng</p>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Sửa bài viết</button>

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