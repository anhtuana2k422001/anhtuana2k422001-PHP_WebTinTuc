<?php
    require_once("./config/db.class.php");
class Category
{
    public $name;
    public $slug;
    public $user_id;
    public $created_at;
    public $updated_at;


    public function __construct($name, $slug,  $user_id ,$created_at, $updated_at)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
       
    }

    // Lấy id categorey chưa phân loại
    public static function id_cate_unclassified()
    {
        $db = new Db();
        $sql = "SELECT categories.id  FROM categories
                WHERE name = 'Chưa phân loại' ";
        $result = $db->select_to_array($sql); 
        return reset($result)["id"]; // Lấy ra phần tử đầu tiên
    }

    // Lấy danh sách category từ mysql
    public static function list_category() {
        $id_un = Category::id_cate_unclassified();
        $db = new Db();
        $sql = "SELECT * FROM categories WHERE id != '$id_un' ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function getCategoryBySlug($slug_cate){
        $db = new Db();
        $sql = "SELECT * FROM categories WHERE slug = '$slug_cate' ";
        $result = $db->select_to_array($sql);
        return reset($result);
    }
 
}

?>