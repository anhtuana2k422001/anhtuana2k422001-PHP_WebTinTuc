<?php
require_once("../../config/db.class.php");
class Category
{
    public $name;
    public $slug;
    public $user_id;
    public $created_at;
    public $updated_at;


    public function __construct($name, $slug,  $user_id, $created_at, $updated_at)
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
    public static function ListCategories($start, $limit)
    {
        $db = new Db();
        $sql = "SELECT * FROM categories LIMIT $start, $limit ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //Lấy danh sách danh mục bài viết
    public static function ListCategorie()
    {
        $db = new Db();
        $sql = "SELECT * FROM categories ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords()
    {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM categories";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

    //Hiển thị thông tin tác giả
    public static function GetCategory($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = $db->select_to_array($sql);
        return reset($result);
    }

    public function add()
    {
        $db = new Db();
        $sql = "INSERT INTO categories (name, slug, user_id, created_at, updated_at)
        VALUES 
        ('$this->name', '$this->slug', '$this->user_id', '$this->created_at', '$this->updated_at')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function update($id)
    {
        $db = new Db();
        $sql = "UPDATE categories SET name='$this->name', slug='$this->slug' ,
        updated_at='$this->updated_at'
        WHERE id='$id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
