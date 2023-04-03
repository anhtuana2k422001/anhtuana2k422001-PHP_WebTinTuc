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

    // Lấy danh sách user từ mysql
    public static function ListUser( ) {
        $db = new Db();
        $sql = "SELECT * FROM users";
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

    //Lấy thông tin 1 người dùng bằng email
    public static function getUserbyEmail($email){
        $db = new Db();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $db->select_to_array($sql);
        return  reset($result);
    }
     
    public static function getUserPathImg($user_id)
    {
        $db = new Db();
        $sql = "SELECT images.path  FROM images
                    WHERE  imageable_id = '$user_id' AND  imageable_type LIKE '%User'";
        $result = $db->select_to_array($sql);
        return reset($result)["path"]; // Lấy ra phần tử đầu tiên
    }

    public function add()
    {
        $db = new Db();
        $sql = "INSERT INTO users (name, email, email_verified_at, password, status, role_id, remember_token, created_at, updated_at)
        VALUES 
        ('$this->name', '$this->email', '$this->email_verified_at', '$this->password', '$this->status', '$this->role_id'
        , '$this->remember_token', '$this->created_at', '$this->updated_at')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function generateRememberToken($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    }

    public function update($id)
    {
        $db = new Db();
        $sql = "UPDATE users SET name='$this->name', email='$this->email', role_id='$this->role_id',
         updated_at='$this->updated_at'
        WHERE id='$id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}

?>