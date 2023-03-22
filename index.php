<?php
require_once("./entities/post.class.php");
require_once("./entities/category.class.php");
// Lấy URL hiện tại
$url = $_SERVER['REQUEST_URI'];
// biểu thức chính quy "/^/([a-zA-Z0-9-_]+)$/" sẽ khớp với tất cả các đường dẫn URL có dạng "/{slug}". 
// Biến $matches sẽ lưu trữ giá trị của {slug} trong phần tử thứ nhất của mảng.
// preg_match('/^\/([a-zA-Z0-9\-_]+)$/', $url, $matches);
// preg_match('/^\/([a-zA-Z0-9\-_]+)(\/[a-zA-Z0-9\-_]+)*$/', $url, $matches);
// preg_match('/^\/danh-muc\/([a-zA-Z0-9\-_]+)$/', $url, $matches_cate);

$url = $_SERVER['REQUEST_URI']; // Lấy URL đầy đủ của trang hiện tại
$matches = explode('/', $url); // Tách URL thành các phần bằng dấu "/"
$slugEnd = end($matches); // Lấy phần cuối cùng của URL, chính là "slug"

$postDetail = Post::getPosttoID($slugEnd);
$Category = Category::getCategoryBySlug($slugEnd);

if($slugEnd == '/'){    
    // Trang 404 nếu không tìm thấy trang
    return require 'error.php';
}

if(COUNT($matches)>2){
    header('Location: /error.php');
}

// Tạo điều kiện cho các trang
if ($url == '/' ) {
    // Trang chủ
    return require 'views/home.php';
} 
elseif ($url == '/login') {
    return require 'views/login.php';
} 
elseif ($url == '/profile') {
    return require 'views/profile.php';
} 
elseif ($Category) {
    return require 'views/categorypost.php';
} 
elseif($postDetail){
        return require 'views/post.php';
}
else {
    header('Location: /error.php');
}

// Kết thúc session
// session_destroy();
?>



