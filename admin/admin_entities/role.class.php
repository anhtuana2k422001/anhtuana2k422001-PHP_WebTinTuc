<?php
    require_once("../../config/db.class.php"); 
class Roles
{
    public $name;
    public $created_at;
    public $updated_at;


    public function __construct($name ,$created_at, $updated_at)
    {
        $this->name = $name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Lấy danh sách category từ mysql
    public static function ListRoles($start, $limit) {
        $db = new Db();
        $sql = "SELECT * FROM roles LIMIT $start, $limit";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM roles";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

    // Lấy danh sách tags của một bài viết 
    public static function getTagsPost($post_id){
        $db = new Db();
        $sql = "SELECT * FROM tags, posts, post_tag WHERE post_id = '$post_id' 
        AND tags.id = post_tag.tag_id AND  posts.id = post_tag.post_id";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //Lấy thông tin 1 role
    public static function GetRoles($id){
        $db = new Db();
        $sql = "SELECT * FROM roles WHERE id = $id";
        $result = $db->select_to_array($sql);
        return  reset($result);
    }

}

?>