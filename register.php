<?php 
    require_once("./entities/users.class.php"); // Import entities classs users 
    $users = User::list_users(); // Lấy danh sách userss

    // Đặt múi giờ theo múi giờ việt nam
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date("Y-m-d H:i:s", time()) ;

    // Random token
    $token = User::generateRememberToken(10);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $userName = $_POST['usernamesignup']; // lấy password người dùng
        $email = $_POST['emailsignup']; // lấy password người dùng
        $password = $_POST['passwordsignup']; // lấy password người dùng
        $passwordConfirm = $_POST['passwordsignup_confirm']; // lấy password người dùng
        $email_verified_at =   $timestamp;
        $status = 1;
        $role_id = 1; //Phần quyền --> Mặc định quyền thành viên tham gia 
        $remember_token  = $token;
        $created_at = $timestamp;
        $updated_at = $timestamp;
        
        // Mã hóa mật khẩu người dùng nhập vào
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Khởi tạo đối tượng user
        $newUser = new User($userName, $email, $email_verified_at, $hashed_password, $status, $role_id, $remember_token, $created_at, $updated_at);

         // Lưu vào cơ sở dữ liệu
         $result = $newUser-> register();
         if(!$result)
            //  truy vấn lỗi
             header("Location: register.php?failure");
         else
             header("Location: login.php");

      }
?>