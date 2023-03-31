<?php
require_once("./entities/comments.class.php");
require_once("./entities/tags.class.php");
require_once("./handle/handle.php");
    $start = microtime(true); // Lưu thời gian bắt đầu tải trang
    // Tạm dừng thực thi mã trong 0.1 giây
    usleep(100000);
    $end = microtime(true); // Lưu thời gian kết thúc tải trang
    $total_time = $end - $start; // Tính thời gian tải trang bằng cách trừ thời gian kết thúc với thời gian bắt đầu
    $title = ' Kết quả tìm kiếm';
    $title_t = 'Kết quả tìm kiếm theo';
    $timeSearch = " " . number_format($total_time, 3) . " giây"; // giữ  số thập phân
    // Sao danh sách chép bài viết tìm kiếm theo từ khóan nhận từ index
    $postCatgory = $postSeach;

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="_token" content="{{ csrf_token()}}" />
    <link rel="icon" type="image/png" href="./public/kcnew/frontend/img/image_iconLogo.png" sizes="160x160">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <!-- Import CSS  -->
    <?php include_once("./main_layout/css.php"); ?>
</head>

<body class="boxed" data-bg-img="./public/kcnew/frontend/img/bg_website.png">
    <?php include_once("./main_layout/header.php"); ?>
    <!-- Code Container  -->
    <div class="wrapper">

        <!-- Main Breadcrumb Start -->
        <div class="container">
            <div class="main--breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="javascript:;" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
                        <li class="active"><span><?php echo  $title_t ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main Breadcrumb End -->

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            <div class="container">
                 <!-- Post Items Title End -->
                <div class="row">
                    <div class="main--content col-md-8" data-sticky-content="true">
                        <!-- Post Items Title Start -->
                        <div class="post--items-title" data-ajax="tab">
                            <h2 class="h4"><?php  echo  count($postCatgory)  .  $title  . $timeSearch  ?> <span style="color: black; background-color: #f7f201;" class="h4"><?php echo $keySearch ?></span></h2>
                                       
                        </div>
                        <!-- Post Items Title End -->
                        <div class="sticky-content-inner">
                            <div class="post--item post--single post--title-largest pd--30-0">
                                <?php if(! count($postCatgory)) : ?>
                                    <p class="lead">Không thấy kết quả tìm kiếm nào!</p>
                                <?php endif; ?>

                                <?php foreach($postCatgory as $post) : ?>
                                <div class="block-21 d-flex animate-box post">
                                    <a href="<?php echo $post["slug"]?>" class="blog-img" style="background-image: url(<?php echo Handle::getPathImg($post["id"])?>);"></a>
                                    <div class="text">
                                        <h3 class="heading"><a href="<?php echo $post["slug"]?>"><?php echo $post["title"]?></a></h3>
                                        <p class="excerpt"><?php echo $post["excerpt"]?></p>
                                        </p>
                                        <div class="meta">
                                            <div><a class="date" href="javascript:;"><span class="icon-calendar"></span><?php echo Handle::formatDate($post["created_at"])?></a></div>
                                            <div><a href="javascript:;"><span class="icon-user2"></span><?php echo Post::getNameAuthor($post["user_id"])?></a></div>
                                            <div class="comments-count"><a href="<?php echo $post["slug"]?>#comments_all"><span class="icon-chat"></span><?php echo COUNT(Comment::getCommentPost($post["id"])) ?></a></div>
                                            <div><a href="javascript:;"><span><i class="fa fm fa-eye"></i></span><?php echo $post["views"]?></a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                                <!-- phân trang -->
                                <!-- {{$posts->links() }} -->
                            </div>
                        </div>
                    </div>
                    <!-- SIDEBAR: start -->
                    <!-- Main Sidebar Start -->
                    <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                        <div class="sticky-content-inner">

                            <!-- Widget Start -->
                            <?php include_once("./main_layout/slide_post/outstanding_posts.php"); ?> 
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <?php include_once("./main_layout/slide_post/vote.php"); ?> 
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <?php include_once("./main_layout/slide_post/banner.php"); ?> 
                            <!-- Widget End -->
                        </div>
                    </div>
                    <!-- Main Sidebar End -->
                </div>
            </div>
        </div>

        <!-- Main Content Section End -->
    </div>
    <!-- Import Footer -->
    <?php include_once("./main_layout/footer.php"); ?>
    <!-- Import JS  -->
    <?php include_once("./main_layout/js.php"); ?>

</body>

</html>