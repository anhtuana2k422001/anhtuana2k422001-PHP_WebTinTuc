<?php
require_once("./config/db.class.php");


class Post
{
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
    public function __construct(
        $title,
        $slug,
        $excerpt,
        $body,
        $user_id,
        $category_id,
        $views,
        $approved,
        $created_at,
        $updated_at
    ) {
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
    public static function new_post_category($limit)
    {
        $id = Post::id_cate_unclassified(); // Lấy id danh mục chưa phân loại
        $db = new Db();
        $sql = "SELECT p1.*
        FROM posts p1
        INNER JOIN (
            SELECT MAX(created_at) AS max_created_at, category_id
            FROM posts
            WHERE category_id != '$id'
            GROUP BY category_id
        ) p2 ON p1.category_id = p2.category_id AND p1.created_at = p2.max_created_at
        ORDER BY p1.created_at DESC  LIMIT $limit ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy tên category id của bài viết
    public static function getNameCategory($category_id)
    {
        $db = new Db();
        $sql = "SELECT categories.name  FROM categories
                    WHERE id = '$category_id' ";
        $result = $db->select_to_array($sql);
        return reset($result)["name"]; // Lấy ra phần tử đầu tiên
    }

    // Lấy ra bài viết từ slug
    public static function getPosttoID($post_slug)
    {
        $db = new Db();
        $sql = "SELECT *  FROM posts
                    WHERE  slug = '$post_slug' ";
        $result = $db->select_to_array($sql);
        return reset($result); // Lấy ra phần tử đầu tiên
    }
   
    // Lấy đường dẫn hình ảnh của bài viết 
    public static function getPostPathImg($post_id)
    {
        $db = new Db();
        $sql = "SELECT images.path  FROM images
                    WHERE  imageable_id = '$post_id' AND  imageable_type LIKE '%Post'";
        $result = $db->select_to_array($sql);
        return reset($result)["path"]; // Lấy ra phần tử đầu tiên
    }


    // Lấy tên tác giả của bài viết 
    public static function getNameAuthor($user_id)
    {
        $db = new Db();
        $sql = "SELECT users.name  FROM users
                    WHERE  id = '$user_id' ";
        $result = $db->select_to_array($sql);
        return reset($result)["name"];
    }

    // Lấy danh sách bài viết theo id category
    public static function ListPostToCategory($id_category)
    {
        $db = new Db();
        $sql = "SELECT *  FROM posts
                    WHERE  posts.category_id = '$id_category' ";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy ra bài viết nổi bật
    public static function ListPostOutstanding()
    {
        $db = new Db();
        $sql = "SELECT *  FROM posts LIMIT 7";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy danh sách bài viết mới nhất 
    public static function ListNewsPost(){
        $db = new Db();
        $sql = "SELECT *  FROM posts  ORDER BY created_at DESC LIMIT 30";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Lấy danh sách bài viết hot nhất -- nhiều bình luận
    public static function ListHotPost(){
        $db = new Db();
        $sql = "SELECT posts.id, posts.title, posts.slug, posts.excerpt, posts.body,
        posts.user_id, posts.category_id, posts.views, posts.approved, posts.created_at,
        posts.updated_at,
         COUNT(comments.id) as num_comments
        FROM posts
        JOIN comments ON posts.id = comments.post_id
        GROUP BY posts.id
        ORDER BY num_comments DESC LIMIT 30";
        $result = $db->select_to_array($sql);
        return $result;
    }

     // Lấy danh sách bài viết nhiều lượt xem nhất
     public static function ListViewsPost(){
        $db = new Db();
        $sql = "SELECT *  FROM posts  ORDER BY views DESC LIMIT 30";
        $result = $db->select_to_array($sql);
        return $result;
    }


    // Lấy danh sách 1 bài viết theo từ khóa tìm kiếm
    public static function ListPostSearch($key){
        $db = new Db();
        $keyPost = '%' . $key . '%'; // Tạo chuỗi từ khóa tìm kiếm
        $sql = "SELECT * FROM posts WHERE title LIKE '$keyPost'";
        $result = $db->select_to_array($sql);
        return $result;
    }



}
