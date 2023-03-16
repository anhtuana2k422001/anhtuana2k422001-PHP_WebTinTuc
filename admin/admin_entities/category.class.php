<?php
require_once("../../config/db.class.php"); 
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
    public static function ListCategories($start, $limit) {
        $db = new Db();
        $sql = "SELECT * FROM categories LIMIT $start, $limit ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM categories";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }
 
}

?>