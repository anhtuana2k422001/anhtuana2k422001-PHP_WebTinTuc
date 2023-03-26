<?php 
    require_once("./entities/post.class.php");
    require_once("./entities/comments.class.php");
    require_once("./entities/tags.class.php");
    require_once("./handle/handle.php");
    // Lấy ra comments của bài viết
    $comments = Comment::getCommentPost($postDetail["id"]); 
    
    // Lấy ra danh sách từ khóa của bài viết 
    $tagPosts = Tags::getTagsPost($postDetail["id"]);

    // Lấy ra danh sách bài viết tương tự nhau cùng chung danh mục
    $postTheSames = Post::ListPostToCategory($postDetail["category_id"]);
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
    <style>
            .post--body.post--content {
                color: black;
                font-family: "Source Sans Pro", sans-serif;
                font-size: 18px;
            }

            .text.capitalize {
                text-transform: capitalize !important;
            }

            .author-info,
            .post-time {
                margin: 0;
                font-size: 14px !important;
                text-align: right;
            }
        </style>
</head>

<body class="boxed" data-bg-img="./public/kcnew/frontend/img/bg_website.png">
    <?php include_once("./main_layout/header.php"); ?>
    <!-- Code Container  -->
    <div class="wrapper">

        <div class="global-message info d-none"></div>

        <!-- Main Breadcrumb Start -->
        <div class="container">
            <div class="main--breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
                        <li><a href="javascript:;" class="btn-link"><?php echo Post::getNameCategory($postDetail["category_id"]) ?></a></li>
                        <li class="active"><span><?php echo $postDetail["title"] ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main Breadcrumb End -->

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <!-- Post Item Start -->
                            <div class="post--item post--single post--title-largest pd--30-0">
                                <div class="post--cats">
                                    <ul class="nav">
                                        <li><span><i class="fa fa-folder-open-o"></i></span></li>
                                            <?php foreach($tagPosts as $tagPost) : ?>
                                            <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}"><?php echo  $tagPost["name"] ?></a></li>
                                            <?php endforeach ?>
                                    </ul>
                                </div>

                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li class="text capitalize"><a href="#"><?php echo Handle::formatDate($postDetail["created_at"])?><a></li>
                                        <li><a href="#"><?php echo Post::getNameAuthor($postDetail["user_id"]) ?></a></li>
                                        <li><span><i class="fa fm fa-eye"></i><?php echo $postDetail["views"] ?></span></li>
                                        <li><a href="#comments_all"><i class="fa fm fa-comments-o"></i><?php echo COUNT($comments); ?></a></li>
                                    </ul>

                                    <div class="title">
                                        <h2 class="post_title h4"><?php echo $postDetail["title"] ?></h2>
                                    </div>
                                </div>
                                <div class="post--body post--content">
                                    <p class="description">
                                        <?php echo $postDetail["body"] ?>
                                    </p>
                                </div>
                            </div>
                            <!-- Post Item End -->

                            <!-- Advertisement Start -->
                            <div class="ad--space pd--20-0-40">
                                <p class="author-info">Người viết:  <?php echo Post::getNameAuthor($postDetail["user_id"]) ?></p>
                                <p class="post-time">Thời gian: <?php echo Handle::formatDate($postDetail["created_at"])?></p>
                            </div>
                            <!-- Advertisement End -->

                            <!-- Post Tags Start -->
                            <div class="post--tags">
                                <ul class="nav">
                                    <li><span><i class="fa fa-tags"></i> Từ khóa </span></li>
                                    <?php foreach($tagPosts as $tagPost) : ?>
                                        <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}"><?php echo $tagPost["name"]?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <!-- Post Tags End -->

                            <!-- Post Social Start -->
                            <div class="post--social pbottom--30">
                                <span class="title"><i class="fa fa-share-alt"></i> Chia sẻ </span>

                                <!-- Social Widget Start -->
                                <div class="social--widget style--4">
                                    <ul class="nav">
                                        <li><a href="javascript:"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="javascript:"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="javascript:"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="javascript:"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="javascript:"><i class="fa fa-rss"></i></a></li>
                                        <li><a href="javascript:"><i class="fa fa-youtube-play"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Social Widget End -->
                            </div>
                            <!-- Post Social End -->


                            <!-- Comment List Start -->
                            <div id="comments_all"  class="comment--list pd--30-0">
                                <!-- Post Items Title Start -->
                                <div class="post--items-title">
                                    <h2 class="h4"><span  class="post_count_comment h4"><?php echo COUNT($comments); ?> </span > bình luận</h2>
                                    <i class="icon fa fa-comments-o"></i>
                                </div>
                                <!-- Post Items Title End -->

                                <ul class="comment--items nav">
                                   <?php foreach($comments as $comment) : ?>
                                    <li>
                                        <!-- Comment Item Start -->
                                        <div class="comment--item clearfix">
                                            <div class="comment--img float--left">
                                                <!-- <img style="border-radius: 50%; margin: auto; background-size: cover ;  width: 68px; height: 68px;   background-image: url({{ $comment->user->image ?  asset('storage/' . $comment->user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }})" alt=""> -->
                                            </div>
                                            <div class="comment--info">
                                                <div class="comment--header clearfix">
                                                    <p class="name"><?php echo Comment::getNameUser($comment["user_id"])?></p>
                                                    <p class="date"><?php echo  date_create_from_format('Y-m-d H:i:s', $comment["created_at"])->format('d/m/Y') ?></p>
                                                    <a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
                                                </div>
                                                <div class="comment--content">
                                                    <p><?php echo $comment["the_comment"]?></p>
                                                    <p class="star">
                                                        <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i>Trả lời</a></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Comment Item End -->
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <!-- Comment List End -->

                            <!-- Comment Form Start -->
                            <div class="comment--form pd--30-0">
                                <!-- Post Items Title Start -->
                                <div class="post--items-title">
                                    <h2 class="h4">Viết bình luận</h2>
                                    <i class="icon fa fa-pencil-square-o"></i>
                                </div>
                                <!-- Post Items Title End -->

                                <div class="comment-respond">
                                    <x-blog.message :status="'success'" />
                                    <?php  if(isset($_SESSION['username'])) : ?>
                                    <!-- <form method="POST" action="{{ route('posts.add_comment', $post )}}"> -->
                                    <form onsubmit="return false;" autocomplete="off" method="POST">
                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <textarea name="the_comment" id="message" cols="30" rows="5" class="form-control" placeholder="Đánh giá bài viết này"></textarea>
                                            </div>
                                        </div>
                                        <small style="color: red; font-size: 14px;" class="comment_error"> </small>
                                        <div class="form-group">
                                            <input id="input_comment" type="submit" value="Bình luận" class="send-comment-btn btn btn-primary">
                                        </div>
                                    </form>
                                    <?php endif ?>

                                    <?php  if(!isset($_SESSION['username'])) : ?>
                                    <p class="h4">
                                        <a href="/login.php">Đăng nhập</a> hoặc
                                        <a href="/login.php#toregister">Đăng ký</a> để bình luận bài viết
                                    </p>
                                    <?php endif ?>

                                </div>

                            </div>
                            <!-- Comment Form End -->

                            <!-- Post Related Start -->
                            <div class="post--related ptop--30">
                                <!-- Post Items Title Start -->
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">Có thể bạn cũng thích</h2>
                                </div>
                                <!-- Post Items Title End -->

                                <!-- Post Items Start -->
                                <div class="post--items post--items-2" data-ajax-content="outer">
                                    <ul class="nav row" data-ajax-content="inner">
                                        <?php
                                        $i = 0;
                                         foreach($postTheSames as $post) : ?>
                                         <?php if($i<5): ?>
                                        <li class="col-sm-12 pbottom--30">
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    <a href="<?php echo $post["slug"]?>" class="thumb">
                                                        <img src="<?php echo Handle::getPathImg($post["id"]) ?>" alt="">
                                                    </a>

                                                    <div class="post--info">

                                                        <div class="title">
                                                            <h3 class="h4">
                                                                <a href="<?php echo $post["slug"]?>" class="btn-link"><?php echo $post["title"] ?></a>
                                                            </h3>
                                                            <p style="font-size:16px">
                                                                <span><?php echo $post["excerpt"] ?></span>
                                                            </p>
                                                        </div>

                                                        <ul style="padding-top:10px" class="nav meta ">
                                                            <li><a href="javascript:;"><?php echo Post::getNameAuthor($post["user_id"])?></a>
                                                            </li>
                                                            <li><a href="javascript:;"><?php echo Handle::formatDate($post["created_at"])?></a></li>
                                                            <li><a href="javascript:;"><i class="fa fm fa-comments"></i><?php echo COUNT(Comment::getCommentPost($post["id"])) ?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Post Item End -->
                                        </li>
                                        <?php endif ?>
                                        <?php $i++;  endforeach ?>

                                    </ul>

                                    <!-- Preloader Start -->
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                    <!-- Preloader End -->
                                </div>
                                <!-- Post Items End -->
                            </div>
                            <!-- Post Related End -->

                        </div>
                    </div>
                    <!-- Main Content End -->

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

<script>
    setTimeout(() => {
        $(".global-message").fadeOut();
    }, 5000)
  
</script>


</html>