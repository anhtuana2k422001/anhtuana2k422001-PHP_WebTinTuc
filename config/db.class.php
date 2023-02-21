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
        }
        // xử lý lỗi nêu không kết nối đươc tới CSDL
        if(self::$connection==false){
            // xử lý ghi ghi file tại đây
            return false;
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