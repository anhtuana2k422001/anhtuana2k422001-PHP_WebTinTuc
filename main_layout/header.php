<?php
require_once("./entities/category.class.php");
require_once("./entities/post.class.php");
require_once("./session.php");
// session_start();
$categories = Category::list_category(); // Lấy danh sách danh mục
$posts = Post::new_post_category(12); // Lay danh sach bai viet mới nhất
// Lấy thời gian 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$day = date("d", time()) ;
$month= date("m", time()) ;
$year= date("Y", time()) ;
// Định dạng thời gian theo định dạng Thứ
$time_day = strftime('%A', time());

// Chuyển đổi các chuỗi tiếng Anh sang tiếng Việt
$time_day = str_replace(array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                array('Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'),
                $time_day);
// Hiển thị kết quả
$time = "Hôm nay (" . $time_day  . ", Ngày ".  $day ." Tháng " . $month . " Năm " .  $year . ")";
?>
<header class="header--section header--style-3">
    <!-- Header Topbar Start -->
    <div class="header--topbar  bg--color-1">

        <div class="container">
            <div class="float--left float--xs-none text-xs-center">
                <!-- Header Topbar Info Start -->
                <ul class="header--topbar-info nav">
                    <li>
                        <a href="">
                            <!-- <img style="border-radius: 12px; height: 40px;" src="./public/kcnew/frontend/img/image_logo.png" alt="logo"> -->
                        </a>
                    </li>
                    <li><i class="fa fm fa-map-marker"></i>Hồ Chí Minh</li>
                    <li><i class="fa fm fa-mixcloud"></i>28<sup>0</sup> C</li>
                    <li style="text-transform: capitalize"><i class="fa fm fa-calendar"></i><?php echo $time ?></li>
                </ul>
                <!-- Header Topbar Info End -->
            </div>

            <div class="float--right float--xs-none text-xs-center">
                <!-- Header Topbar Action Start -->
                <ul class="header--topbar-action nav">
                    <!-- @guest -->
                    <li class="btn-cta">
                     

                        <?php
                            if (isset($_COOKIE['username']) || isset($_SESSION['username'])) {
                                echo "
                                        <a href='javascript:;'<?php ?>
                                            <i class='fa fm fa-user-o'></i>
                                            <span>". ($_SESSION['username']) ."</span> 
                                        </a>
                                    ";
                            } else {
                                echo "
                                        <a href='/dang-nhap'<?php ?>
                                            <i class='fa fm fa-user-o'></i>
                                            <span> Đăng nhập</span> 
                                        </a>
                                    ";
                            }
                         ?>
                    </li>
                    <!-- @endguest -->

                    <!-- @auth -->
                    <?php if(isset($_SESSION['role']))  : ?>
                        <li class="has-dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php 
                                    echo ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) ?
                                    '<li>
                                        <a href="/admin/">Admin - Dashbroad</a>
                                    </li>
                                    ' : ''
                                ?>
                                    <li>
                                    <a href="/tai-khoan-cua-toi">Tài khoản của tôi</a>
                                </li>    
                                <li>
                                    <a href="../views/logout.php">Đăng xuất
                                    <i class="fa fm fa-arrow-circle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif?>

                </ul>
                <!-- Header Topbar Action End -->


                <!-- Header Topbar Social Start -->
                <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                    <li><a href="https://www.facebook.com/people/Anh-Tuan/100007007238964"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-rss"></i></a></li>
                    <li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
                <!-- Header Topbar Social End -->
            </div>
        </div>
    </div>
    <!-- Header Topbar End -->

    <!-- Header Navbar Start -->
    <div class="header--navbar navbar bd--color-1 bg--color-0" data-trigger="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="headerNav" class="navbar-collapse collapse float--left">
                <!-- Header Menu Links Start -->
                <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                    <li>
                        <a href="/">
                            <i class="icon_home fa fa-home"></i>
                        </a>
                    </li>
                    <?php
                    $i = 0;
                    foreach ($categories as $category) {
                        echo "<li><a href='" . $category["slug"]."'>" . $category["name"] . "</a></li>";
                        $i++;
                        if ($i > 9)
                            break;
                    }
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trang<i
                                class="fa flm fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/about">Giới thiệu</a></li>
                            <li><a href="/lien-he">Liên hệ</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/tat-ca-danh-muc">
                            <span style="color: #ccc; margin-right: 10px;">Tất cả</span>
                            <img  width="17" class="icon-menu" src="https://static.vnncdn.net/v1/icon/menu-center.svg">
                        </a>
                    </li>
                </ul>
                <!-- Header Menu Links End -->
            </div>

            <!-- Header Search Form Start -->
            <form method="POST" action="tim-kiem" class="header--search-form float--right" data-form="validate">
                <input type="search" name="search" placeholder="Tìm kiếm tin tức..." class="header--search-control form-control"
                required>

                <button type="submit" class="header--search-btn btn"><i
                        class="header--search-icon fa fa-search"></i></button>
            </form>
            <!-- Header Search Form End -->
        </div>
    </div>
    <!-- Header Navbar End -->
</header>
<!-- Header Section End -->
<div id="page" class="wrapper">
    <!-- Posts Filter Bar Start -->
    <div class="posts--filter-bar style--3 hidden-xs">
        <div class="container">
            <ul class="nav">
                <li>
                    <a href="/tin-tuc-moi-nhat">
                        <i class="fa fa-star-o"></i>
                        <span>Tin tức mới nhất</span>
                    </a>
                </li>
            
                <li>
                    <a href="/tin-nong">
                        <i class="fa fa-fire"></i>
                        <span>Tin nóng</span>
                    </a>
                </li>
                <li>
                    <a href="/xem-nhieu-nhat">
                        <i class="fa fa-eye"></i>
                        <span>Xem nhiều nhất</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- News Ticker Start -->
    <div class="news--ticker">
        <div class="container">
            <div class="title">
                <h2>Tin mới cập nhật</h2>
            </div>

            <div class="news-updates--list" data-marquee="true">
                <ul class="nav">
                    <?php
                    foreach ($posts as $post) { ?>
                        <li>
                            <h3 class='h3'><a href="<?php echo $post["slug"]?>"><?php echo $post["title"]?></a></h3>
                        </li>
                    <?php }?>
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>