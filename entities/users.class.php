<?php
    require_once("./config/db.class.php");
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
    public static function list_users() {
        $db = new Db();
        $sql = "SELECT * FROM users";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy ra 1 thông tin đăng nhập tài khoản để đăng nhập
    public static function login($email , $password) {
        $db = new Db();
        $result[] = NULL;

        $sql = "SELECT * FROM users WHERE email = '$email' " ;
        $result =   ($db->select_to_array($sql)); // Lấy phần tử đầu tiên
        // Kiểm tra verify mật khẩu
        if (password_verify($password, $result[0]["password"])) 
            return true;
        else 
            return false;
    }

    // Đăng ký tài khoản, lưu thông tin người dùng vào database
    public function register(){
        $db = new Db();
        // thêm user vào CSDL
        $sql = "INSERT INTO users (name, email, email_verified_at, password, status, role_id, remember_token, created_at, updated_at) VALUES
        ('$this->name','$this->email','$this->email_verified_at','$this->password','$this->status','$this->role_id', '$this->remember_token','$this->created_at','$this->updated_at')";
        $result = $db->query_execute($sql);
        return $result;
    }

    // Tạo oken cho user
    public static function generateRememberToken($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    }

    //Lấy thông tin 1 người dùng
    public static function getUser($email){
        $db = new Db();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $db->select_to_array($sql);
        return reset($result);
    }

    // Lấy danh sách admin từ mysql
    public static function list_admin() {
        $db = new Db();
        $sql = "SELECT * FROM users WHERE role_id = 2";
        $result = $db->select_to_array($sql);
        return $result;
    }

     //Lấy thông tin 1 admin
     public static function getAdmin($email){
        $db = new Db();
         
        $sql = "SELECT * FROM users WHERE email = '$email' AND role_id = 2";
        $result = $db->select_to_array($sql);
        return reset($result);
    }

    // Lấy ra 1 thông tin đăng nhập tài khoản để đăng nhập admin
    public static function loginAdmin($email , $password) {
        $db = new Db();
        $result[] = NULL;

        $sql = "SELECT * FROM users WHERE email = '$email' AND role_id = 2";
 
        $result =   ($db->select_to_array($sql)); // Lấy phần tử đầu tiên
        // Kiểm tra verify mật khẩu
        if (password_verify($password, $result[0]["password"])) 
            return true;
        else 
            return false;
    }

    // Lấy hình ảnh của tài khoản
    public static function getUserPathImg($user_id){
        $db = new Db();
        // Lấy ảnh user 
        $sql = "SELECT images.path  FROM images
                WHERE   $user_id  =  imageable_id AND  imageable_type LIKE '%User'" ;
        $result = $db->select_to_array($sql);
        if (empty($result)) 
            return null; // Trả về null nếu không tìm thấy ảnh user
        return reset($result)["path"]; // Lấy ra phần tử đầu tiên

    }

    public function update($id)
    {
        $db = new Db();
        $sql = "UPDATE users SET name='$this->name', email='$this->email'   
        WHERE id='$id'";
        $result = $db->query_execute($sql);
        return $result;
    }

     
}

?>