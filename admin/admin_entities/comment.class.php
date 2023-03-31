<?php
    require_once("../../config/db.class.php");
class Comment
{
    public $the_comment;
    public $post_id;
    public $user_id;
    public $created_at;
    public $updated_at;


    public function __construct($the_comment, $post_id, $user_id, $created_at, $updated_at)
    {
        $this->the_comment = $the_comment;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Lấy danh sách category từ mysql
    public static function ListComments($start, $limit) {
        $db = new Db();
        $sql = "SELECT * FROM comments LIMIT $start, $limit";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM comments";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

    // Lấy ra tên người bình luận 
    public static function getUserName($user_id){
        $db = new Db();
        $sql = "SELECT users.name  FROM users 
                WHERE  id = '$user_id' " ;
        $result = $db->select_to_array($sql);
        return reset($result)["name"]; // Lấy ra user đầu tiên
    }

    // Lấy đường dẫn hình ảnh người bình luận
      public static function getCommentPathImg($user_id){
        $db = new Db();
        // Lấy ảnh user 
        $sql = "SELECT images.path  FROM images
                WHERE   $user_id  =  imageable_id AND  imageable_type LIKE '%User'" ;
        $result = $db->select_to_array($sql);
        return reset($result)["path"]; // Lấy ra phần tử đầu tiên
    }

    // Lấy bình luận của bài viết từ id bài viết 
    public static function getCommentPost($post_id){
        $db = new Db();
        $sql = "SELECT * FROM comments WHERE post_id = '$post_id' ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy tên người comments bài viết 
    public static function getNameUser($user_id){
        $db = new Db();
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $result = $db->select_to_array($sql);
        return reset($result)["name"];
    }

    //lấy ra thông tin của 1 bài viết cụ thể
    public static function GetPostById($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = $db->select_to_array($sql);
        return reset($result)["slug"];
    }


}

?>