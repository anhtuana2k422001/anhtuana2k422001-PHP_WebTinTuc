<?php
    require_once("./config/db.class.php");
class User
{
    public $id;
    public $name;
    public $email;
    public $email_verified_at;
    public $password;

    public function __construct($id, $name, $email, $email_verified_at, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->email_verified_at = $email_verified_at;
        $this->password = $password;
    }

    // Đăng ký tài khoản  -- Lưu user
    public function save(){
    }

    // Lấy danh sách user từ mysql
    public static function list_users() {
        $db = new Db();
        $sql = "SELECT * FROM users";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function login($email , $password) {
        $db = new Db();
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'" ;
        $result = $db->select_to_array($sql);
        return $result;
    }
}

?>