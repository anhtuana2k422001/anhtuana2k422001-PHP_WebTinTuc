<?php
require_once("../../config/db.class.php"); 

class Post
{
    //Khai báo biến
    public $title;
    public $slug;
    public $excerpt;
    public $body;
    public $user_id;
    public $category_id;
    public $views;
    public $approved;
    public $created_at;
    public $updated_at;

    // Constructor
    public function __construct(
        $title,
        $slug,
        $excerpt,
        $body,
        $user_id,
        $category_id,
        $views,
        $approved,
        $created_at,
        $updated_at
    ) {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->views = $views;
        $this->approved = $approved;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
   
    // Lấy ra tất cả bài viế 
    public static function ListPosts($start, $limit)
    {
        $db = new Db();
        $sql = "SELECT *  FROM posts LIMIT $start, $limit";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM posts";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

    //lấy ra thông tin của 1 bài viết cụ thể
    public static function GetPostById($id){
        $db = new Db();
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = $db->select_to_array($sql);
        return reset($result);
    }

    public static function getPostPathImg($post_id)
    {
        $db = new Db();
        $sql = "SELECT images.path  FROM images
                    WHERE  imageable_id = '$post_id' AND  imageable_type LIKE '%Post'";
        $result = $db->select_to_array($sql);
        return reset($result)["path"]; // Lấy ra phần tử đầu tiên
    }
}