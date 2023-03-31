<?php // IDEA;
//   Lớp xử lý kết nối và truy vấn cơ sơ dữ liệu
class Db
{
    // biến kết nối cơ cở dữ liêu 
    protected static $connection;
    // hàm khởi tạo kết nối
    public function connect(){
        // kết nối tới CSDL trong trườn hợp kết nối chưa được khởi tạo
        if(!isset(self::$connection)){
            // Lấy thông tin kết nối từ tập tin config.ini
            $config = parse_ini_file('config.ini');
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
            self::$connection->query("SET NAMES utf8"); // thiết lập bộ mã UTF-8
        }
        // xử lý lỗi nêu không kết nối đươc tới CSDL
        if(self::$connection==false){
            // xử lý ghi ghi file tại đây
            return false;
        }

           // Thiết lập bộ ký tự UTF-8
         if (!self::$connection->set_charset("utf8mb4")) {
            printf("Error loading character set utf8mb4: %s\n", self::$connection->error);
            exit();
        }
        return self::$connection;
    }

    // hàm thực hiện xử lý câu lệnh truy vấn
    public function query_execute($queryString){
        // khởi tạo kết nối
        $connection = $this->connect();
        // thực hiện excute truy vấn
        $connection->query("SET NAMES utf8");

        $result = $connection->query($queryString);
        // $connection->close(); // Mở kết nối 
        return $result;
    }

    // Hàm thực hiện trỏ vẻ mảng danh sách kết quả 
    public function select_to_array($queryString){
        $row = array();
        $result = $this->query_execute($queryString);
        if($result == false)
            return false;
        while($item = $result->fetch_assoc()){
            $row[] = $item;
        }
        return $row;
    }

    
}

?>