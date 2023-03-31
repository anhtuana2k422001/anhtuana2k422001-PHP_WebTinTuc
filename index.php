<?php
require_once("./entities/post.class.php");
require_once("./entities/category.class.php");


// Lấy URL hiện tại
$url = $_SERVER['REQUEST_URI']; // Lấy URL đầy đủ của trang hiện tại
$matches = explode('/', $url); // Tách URL thành các phần bằng dấu "/"
$slugEnd = end($matches); // Lấy phần cuối cùng của URL, chính là "slug"


// Phần Quyên
// if(isset($_SESSION['role']) && $matches=="admin" ){
//     if($_SESSION['role'] == 2 || $_SESSION['role'] == 3)
//     {

//     }else{
//         header('Location: /error.php');
//     }
// }

// if($matches[1]=="admin"){
    // header('Location: /error.php');
    // return require 'views/login.php';
// }

$keySearch = "Chưa nhập từ khóa";
// Xử lý tìm kiếm
if (isset($_POST['search'])) {
    $keySearch = $_POST['search'];
}
$postSeach = Post::ListPostSearch($keySearch);


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
elseif ($url == '/tim-kiem' ) {
    // Trang chủ
    return require 'views/search.php';
} 
elseif ($url == '/dang-nhap') {
    return require 'views/login.php';
} 
elseif ($url == '/tai-khoan-cua-toi') {
    return require 'views/profile.php';
}
elseif ($url == '/tin-tuc-moi-nhat') {
    return require 'views/newspost.php';
}  
elseif ($url == '/tin-nong') {
    return require 'views/hotpost.php';
}
elseif ($url == '/xem-nhieu-nhat') {
    return require 'views/viewspost.php';
}     
elseif ($Category)  {
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



