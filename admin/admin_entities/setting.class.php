<?php
require_once("../../config/db.class.php");
class About
{
    public $about_first_text;
    public $about_second_text;
    public $about_first_image;
    public $about_second_image;
    public $about_our_mission;
    public $about_our_vision;
    public $about_services;
    public $created_at;
    public $updated_at;


    public function __construct($about_first_text, $about_second_text,  $about_first_image, $about_second_image, $about_our_mission, $about_our_vision, $about_services, $created_at, $updated_at)
    {
        $this->about_first_text = $about_first_text;
        $this->about_second_text = $about_second_text;
        $this->about_first_image = $about_first_image;
        $this->about_second_image = $about_second_image;
        $this->about_our_mission = $about_our_mission;
        $this->about_our_vision = $about_our_vision;
        $this->about_services = $about_services;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    // Lấy danh sách category từ mysql
    public static function ListAbout()
    {
        $db = new Db();
        $sql = "SELECT * FROM settings ";
        $result = $db->select_to_array($sql);
        return reset($result);
 
    }

    public static function getAboutPathImg1($id)
    {
        $db = new Db();
        $sql = "SELECT settings.about_first_image  FROM settings WHERE id='$id'";
        $result = $db->select_to_array($sql);
        return reset($result)["about_first_image"]; // Lấy ra phần tử đầu tiên
    }

    public static function getAboutPathImg2($id)
    {
        $db = new Db();
        $sql = "SELECT settings.about_second_image  FROM settings WHERE id='$id'";
        $result = $db->select_to_array($sql);
        return reset($result)["about_second_image"]; // Lấy ra phần tử đầu tiên
    }

    public function update()
    {
        $db = new Db();
        $sql = "UPDATE settings SET 
            about_first_text = '$this->about_first_text',
            about_second_text = '$this->about_second_text',
            about_first_image = '$this->about_first_image',
            about_second_image = '$this->about_second_image',
            about_our_mission = '$this->about_our_mission',
            about_our_vision = '$this->about_our_vision',
            about_services = '$this->about_services',
            
            updated_at='$this->updated_at'";
        $result = $db->query_execute($sql);
        return $result;
    }
     
}
