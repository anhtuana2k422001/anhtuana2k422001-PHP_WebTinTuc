<?php
    require_once("../../config/db.class.php"); 

class User
{
    public $name;
    public $email;
    public $email_verified_at;
    public $password;
    public $status;
    public $role_id;
    public $remember_token;
    public $created_at;
    public $updated_at;

    public function __construct($name, $email, $email_verified_at, $password, 
    $status, $role_id, $remember_token, $created_at, $updated_at)
    {
        $this->name = $name;
        $this->email = $email;
        $this->email_verified_at = $email_verified_at;
        $this->password = $password;
        $this->status = $status;
        $this->role_id = $role_id;
        $this->remember_token = $remember_token;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    // Lấy danh sách user từ mysql
    public static function ListUsers($start, $limit) {
        $db = new Db();
        $sql = "SELECT * FROM users LIMIT $start, $limit";
        $result = $db->select_to_array($sql);
        return $result;
    } 

    //Lấy thông tin 1 người dùng
    public static function getUser($id){
        $db = new Db();
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $db->select_to_array($sql);
        return  reset($result);
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM users";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

     

      

     
}

?>