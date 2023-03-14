<?php
    require_once("./config/db.class.php");
class Tags
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
    public static function list_tag() {
        $db = new Db();
        $sql = "SELECT * FROM tags";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy danh sách tags của một bài viết 
    public static function getTagsPost($post_id){
        $db = new Db();
        $sql = "SELECT * FROM tags, posts, post_tag WHERE post_id = '$post_id' 
        AND tags.id = post_tag.tag_id AND  posts.id = post_tag.post_id";
        $result = $db->select_to_array($sql);
        return $result;
    }

}

?>