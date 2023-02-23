<?php
    require_once("./config/db.class.php");

    Class Post{
        //khai bao bien
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
        public function __construct($title, $slug, $excerpt, $body, $user_id, $category_id, $views, $approved, $created_at, $updated_at)
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

        //Lay danh sach 5 bai viet moi nhat tu 5 danh muc khac nhau
        public static function list_post()
        {
            $db = new Db();
            $sql = "SELECT *
            FROM posts
            WHERE category_id IN (
                SELECT DISTINCT category_id
                FROM posts
            )  
            ORDER BY created_at DESC
            ";
            $result = $db->select_to_array($sql);
            return $result;
        }

    }
