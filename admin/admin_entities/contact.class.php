<?php
require_once("../../config/db.class.php"); 

class Contact
{
    //Khai báo biến 
    public $first_name;
    public $last_name;
    public $email;
    public $subject;
    public $message; 
    public $created_at;
    public $updated_at;

    // Constructor
    public function __construct(
        $first_name,
        $last_name,
        $email,
        $subject,
        $message, 
        $created_at,
        $updated_at
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message; 
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
   
    // Lấy ra tất cả bài viế 
    public static function ListContacts($start, $limit)
    {
        $db = new Db();
        $sql = "SELECT *  FROM contacts LIMIT $start, $limit";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //lấy ra số lượng bài viết để phân trang
    public static function GetTotalRecords(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total_records FROM contacts";
        $result = $db->query_execute($sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total_records'];
        return $total_records;
    }

     
}