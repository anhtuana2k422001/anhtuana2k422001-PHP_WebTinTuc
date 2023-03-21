<?php
require_once("./entities/post.class.php");
// Lấy URL hiện tại
$url = $_SERVER['REQUEST_URI'];
// biểu thức chính quy "/^/([a-zA-Z0-9-_]+)$/" sẽ khớp với tất cả các đường dẫn URL có dạng "/{slug}". 
// Biến $matches sẽ lưu trữ giá trị của {slug} trong phần tử thứ nhất của mảng.
// preg_match('/^\/([a-zA-Z0-9\-_]+)$/', $url, $matches);
preg_match('/^\/([a-zA-Z0-9\-_]+)(\/[a-zA-Z0-9\-_]+)*$/', $url, $matches);

if(COUNT($matches)>2){
    header('Location: /error.php');
}

// Tạo điều kiện cho các trang
if ($url == '/') {
    // Trang chủ
    return require 'views/home.php';
} 
elseif ($url == '/login') {
    return require 'views/login.php';
} 
elseif ($url == '/contact') {
    return require 'views/home.php';
} 
elseif(isset($matches[1])){
    $slug = $matches[1];
    $postDetail = Post::getPosttoID($slug);
    if($postDetail)
        return require 'views/post.php';
    else
        return require 'error.php';
}
else {
    // Trang 404 nếu không tìm thấy trang
    return require 'error.php';
}

// Kết thúc session
// session_destroy();
?>



