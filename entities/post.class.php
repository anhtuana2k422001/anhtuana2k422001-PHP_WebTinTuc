<?php
    require_once("./config/db.class.php");

    Class Post{
        //Khai báo biến
        public $title;
        public $slug;
        public $excerpt;
        public $body;
        public $user_id;
        public $category_id;
        public $views;
        public $approved;
        public $created_at;
        public $updated_at;

        // Constructor
        public function __construct($title, $slug, $excerpt, $body, $user_id, 
        $category_id, $views, $approved, $created_at, $updated_at)
        {
            $this->title = $title;
            $this->slug = $slug;
            $this->excerpt = $excerpt;
            $this->body = $body;
            $this->user_id = $user_id;
            $this->category_id = $category_id;
            $this->views = $views;
            $this->approved = $approved;
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

        //Lấy danh sách bài viết mới nhất theo từng danh mục 
        public static function new_post_category()
        {
            $id = Post::id_cate_unclassified(); // Lấy id danh mục chưa phân loại
            $db = new Db();
            $sql = "SELECT * FROM posts 
            WHERE category_id IN (
                SELECT DISTINCT category_id
                FROM posts
                WHERE category_id != '$id'
            ) ORDER BY created_at DESC ";
            $result = $db->select_to_array($sql);
            return $result;
        }

        // Lấy tên category theo id post
        public static function getNameCategory($category_id)
        {
            $db = new Db();
            $sql = "SELECT categories.name  FROM categories
                    WHERE id = '$category_id' ";
            $result = $db->select_to_array($sql); 
            return reset($result)["name"]; // Lấy ra phần tử đầu tiên
        }

        // Lấy tên image của bài viết 
        public static function getPostImage($post_id){
            $db = new Db();
            $sql = "SELECT images.name  FROM images
                    WHERE  imageable_id = '$post_id' AND  imageable_type LIKE '%Post'" ;
            $result = $db->select_to_array($sql);
            return reset($result)["name"]; // Lấy ra phần tử đầu tiên
        }

         // Lấy đường dẫn hình ảnh của bài viết 
        public static function getPostPathImg($post_id){
            $db = new Db();
            $sql = "SELECT images.path  FROM images
                    WHERE  imageable_id = '$post_id' AND  imageable_type LIKE '%Post'" ;
            $result = $db->select_to_array($sql);
            return reset($result)["path"]; // Lấy ra phần tử đầu tiên
        }


        // Lấy tên tác giả của bài viết 
        public static function getNameAuthor($user_id){
            $db = new Db();
            $sql = "SELECT users.name  FROM users
                    WHERE  id = '$user_id' " ;
            $result = $db->select_to_array($sql);
            return reset($result)["name"]; 
        }

        // Lấy danh sách bài viết theo id category
        public static function ListPostToCategory($id_category){
            $db = new Db();
            $sql = "SELECT *  FROM posts
                    WHERE  category_id = '$id_category' ";
            $result = $db->select_to_array($sql);
            return $result; 
        }

        // Lấy ra bài viết nổi bật
        public static function ListPostOutstanding(){
            $db = new Db();
            $sql = "SELECT *  FROM posts LIMIT 7";
            $result = $db->select_to_array($sql);
            return $result; 
        }

    }
?>