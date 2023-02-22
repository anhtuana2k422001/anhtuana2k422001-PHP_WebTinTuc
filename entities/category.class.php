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

    // Lấy danh sách category từ mysql
    public static function list_category() {
        $db = new Db();
        $sql = "SELECT * FROM categories";
        $result = $db->select_to_array($sql);
        return $result;
    }
}

?>