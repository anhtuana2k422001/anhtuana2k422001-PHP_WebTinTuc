<?php 
    require_once("./entities/users.class.php"); // Import entities classs users 
    $users = User::list_users(); // Lấy danh sách userss

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['username']; // lấy email người dùng 
        $password = $_POST['password']; // lấy password người dùng

        // Mã hóa mật khẩu người dùng nhập vào
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // echo $hashed_password;
        
        $checkLogin = User::login($email, $password ); // Trả về true, false
        if($checkLogin ){
            // xử lý dữ liệu ở đây
            header("Location: index.php");
            // lưu giá trị của trường form vào session  
            $_SESSION['username'] = $_POST['username'];
        }
        else
            header("Location: login.php");
        exit;
      }
?>
<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="./form/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="./form/css/style.css" />
		<link rel="stylesheet" type="text/css" href="./form/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
				<nav class="codrops-demos"></nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="post" autocomplete="on"> 
                                <h1>ĐĂNG NHẬP</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Email hoặc tài khoản </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Mật khẩu </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Lưu mật khẩu</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Đăng nhập" /> 
								</p>
                                <p class="change_link">
									Chưa có tài khoản ?
									<a href="#toregister" class="to_register">Tham gia với chúng tôi</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> ĐĂNG KÝ </h1> 
                                <!-- <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p> -->
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Email của bạn</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Mật khẩu của bạn </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Nhập lại mật khẩu </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Tiếp theo"/> 
								</p>
                                <p class="change_link">  
									Đã có tài khoản?
									<a href="#tologin" class="to_register"> Đi tới đăng nhập </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>