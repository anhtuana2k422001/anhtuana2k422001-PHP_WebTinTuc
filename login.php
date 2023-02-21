<?php
require_once("./entities/users.class.php"); // Import db entities
$users = User::list_users();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    html,
    body {
        width: 100%;
    }

    input {
        color: white;
    }

    .box {
        text-align: center;
        background: #181818;
        width: 400px;
        height: auto;
        padding: 25px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 20px 0px #000;
    }

    .box h1 {
        color: #fff;
    }

    .box input[type="password"],
    .box input[type="text"] {
        background: none;
        outline: none;
        width: 210px;
        height: 40px;
        border-radius: 40px;
        padding: 0px 15px;
        margin: 15px 0px;
        border: solid 2px #002cff;
        transition: 1s;
    }

    .box input[type="password"]:focus,
    .box input[type="text"]:focus {
        width: 320px;
        border-color: chartreuse;
        transition: 1s;
        color: white;
    }

    .box input[type="submit"] {
        background: none;
        outline: none;
        width: 160px;
        height: 40px;
        border-radius: 40px;
        margin: 15px 0px;
        border: solid 2px #002cff;
        color: #fff;
        font-size: 18px;
        transition: 1s;
    }

    .box input[type="submit"]:hover {
        background: #002cff;
        transition: 1s;
    }

    .groub_name {
        text-align: center;
    }
</style>

<?php 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(User::login($username, $password )){
        // xử lý dữ liệu ở đây
            header("Location: /index.php");
            // lưu giá trị của trường form vào session  
            $_SESSION['username'] = $_POST['username'];
        }
        else
            header("Location: login.php");
        exit;
      }
?>

<body>

    <h1 class="groub_name">NHÓM 7 - HỒ ANH TUẤN - VÕ ANH QUÂN</h1>
    <form method="post" class="box">
        <H1>ĐĂNG NHẬP TÀI KHOẢN</H1>
        <input name="username" type="text" placeholder="Tài Khoản">
        <input name="password" type="password" placeholder="Mật khẩu">
        <input type="submit" value="ĐĂNG NHẬP">
    </form>
</body>

</html>