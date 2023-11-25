<?php
require_once("./config/db.class.php");

class Image
{
    //Khai báo biến
    public $name;
    public $extension;
    public $path;
    public $imageable_id;
    public $imageable_type;
    public $created_at;
    public $updated_at;

    // Constructor
    public function __construct(
        $name,
        $extension,
        $path,
        $imageable_id,
        $imageable_type,
        $created_at,
        $updated_at
    ) {
        $this->name = $name;
        $this->extension = $extension;
        $this->path = $path;
        $this->imageable_id = $imageable_id;
        $this->imageable_type = $imageable_type;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function updateAvatarUser($id)
    {
        $db = new Db();
        $sql = "UPDATE images SET name='$this->name', extension='$this->extension', path='$this->path',
        imageable_id='$this->imageable_id', imageable_type='$this->imageable_type' , updated_at='$this->updated_at'
        WHERE imageable_type = 'AppModelsUser' AND imageable_id ='$id' ";
        $result = $db->query_execute($sql);
        return $result;
    }


      //Check xem user co avatar hay chua 
    public static function checkAvatar($id){
        $db = new Db();
        $sql = "SELECT * FROM images WHERE imageable_id ='$id' and imageable_type  = 'App\Models\User' ";
        $result = $db->select_to_array($sql);
        return !empty($result);
    }

    // Thêm mới avatar 
    public function addAvatarUser()
    { 
        $db = new Db();
        $sql = "INSERT INTO images (name, extension, path, imageable_id, imageable_type, created_at, updated_at)
        VALUES 
        ('$this->name', '$this->extension', '$this->path', '$this->imageable_id', '$this->imageable_type', '$this->created_at', '$this->updated_at')";
        $result = $db->query_execute($sql);
        return $result;
    }

    

     
}
