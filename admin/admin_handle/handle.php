<?php
    require_once("../admin_entities/post.class.php");

class HandleAdmin
{
    // Hàm định dạng ngày tháng năm 
    public static function formatDate($date)
    {
        $result =  date_create_from_format('Y-m-d H:i:s', $date)->format('d/m/Y');
        return $result;
    }
       
    // Hàm trả về đường dẫn hình ảnh 
    public static function getPathImg($post_id){
        $result = "../../storage/" . Post::getPostPathImg($post_id);
        return $result;
    }
 
}

?>