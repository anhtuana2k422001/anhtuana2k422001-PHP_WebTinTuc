<?php
    require_once("./entities/post.class.php");
    require_once("./entities/users.class.php");

class Handle
{
    // Hàm định dạng ngày tháng năm 
    public static function formatDate($date)
    {
        $result =  date_create_from_format('Y-m-d H:i:s', $date)->format('d/m/Y');
        return $result;
    }
       
    // Hàm trả về đường dẫn hình ảnh bài viết
    public static function getPathImg($post_id){
        $result = "../storage/" . Post::getPostPathImg($post_id);
        return $result;
    }

    // Hàm trả về đường dẫn hình ảnh của user
    public static function getUserPathImg($user_id){
        $imgPath = User::getUserPathImg($user_id);
        if($imgPath == null)
            return "../storage/placeholders/user_placeholder.jpg";
        else
            return "../storage/" .  $imgPath;
    }







 
}

?>