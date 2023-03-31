<?php
    require_once("../admin_entities/post.class.php");
    require_once("../admin_entities/user.class.php");
    require_once("../admin_entities/setting.class.php");

class HandleAdmin
{
    // Hàm định dạng ngày tháng năm 
    public static function formatDate($date)
    {
        $result =  date_create_from_format('Y-m-d H:i:s', $date)->format('d/m/Y');
        return $result;
    }
       
    // Hàm trả về đường dẫn hình ảnh post
    public static function getPathImg($post_id){
        $result = "../../storage/" . Post::getPostPathImg($post_id);
        return $result;
    }

    // Hàm trả về đường dẫn hình ảnh user
    public static function getUserPathImg($user_id){
        $result = "../../storage/" . User::getUserPathImg($user_id);
        return $result;
    }

    // Hàm trả về đường dẫn hình ảnh setting
    public static function getAboutPathImg1($id){
        $result = "../../storage/" . About::getAboutPathImg1($id);
        return $result;
    }

    public static function getAboutPathImg2($id){
        $result = "../../storage/" . About::getAboutPathImg2($id);
        return $result;
    }

     
 
}

?>