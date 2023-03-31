<?php
require_once("../admin_entities/comment.class.php");
require_once("../admin_entities/user.class.php");
require_once("../admin_entities/post.class.php");

// phân trang
$total_records = Comment::GetTotalRecords();

// Số bản ghi trên mỗi trang
$limit = 7;

// Lấy trang hiện tại từ biến $_GET, nếu không có thì mặc định là trang đầu tiên (1)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu của bản ghi trên trang hiện tại
$start = ($page - 1) * $limit;

// Tính số trang
$pages = ceil($total_records / $limit);

$comment = Comment::ListComments($start, $limit);
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
    <title>Quản trị - Tất cả bình luận</title>
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
                    <div class="breadcrumb-title pe-3">Bình luận</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tất cả bình luận</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm bình luận"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </div>
                            <div class="ms-auto"><a href="{{ route('admin.comments.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Thêm bình luận mới</a></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã bình luận</th>
                                        <th>Người tạo</th>
                                        <th>Nội dung bình luận</th>
                                        <th>Xem bình luận</th>
                                        <th>Ngày tạo</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comment as $item) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0 font-14"><?php echo $item["id"] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php $user = User::getUser($item["user_id"]);

                                                echo $user["name"] ?></td>
                                            <td><?php echo substr($item["the_comment"], 0, 40) . (strlen($item["the_comment"]) > 40 ? "..." : ""); ?>
                                            </td>
                                            <td>
                                                <a target="_blank" class="btn btn-primary btn-sm" href="http://localhost:3000/<?php echo Comment::GetPostById($item["post_id"])?>#comments_all">Xem bình luận</a>
                                            </td>
                                            <td><?php echo $item["created_at"] ?></td>

                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('admin.comments.edit', $comment)}}" class=""><i class='bx bxs-edit'></i></a>
                                                    <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $comment->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                                    <form method="post" action="{{ route('admin.comments.destroy', $comment) }}" id="delete_form_{{ $comment->id }}">
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <div>
                                <?php
                                if ($page > 1) {
                                    echo  "<button class='btn btn-secondary me-4  mt-2 mt-lg-0' onclick=\"location.href='?page=" . ($page - 1) . "'\">Trang trước</button>";
                                }
                                if ($page < $pages) {
                                    echo "<button class='btn btn-secondary mt-2 mt-lg-0' onclick=\"location.href='?page=" . ($page + 1) . "'\">Trang sau</button>";
                                }
                                ?>
                            </div>
                        </div>
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