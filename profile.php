<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="_token" content="{{ csrf_token()}}" />
    <link rel="icon" type="image/png" href="./public/kcnew/frontend/img/image_iconLogo.png" sizes="160x160">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

    <!-- Import CSS  -->
    <?php include_once("./main_layout/css.php"); ?>

</head>

<body class="boxed" data-bg-img="./public/kcnew/frontend/img/bg_website.png">
    <?php include_once("./main_layout/header.php"); ?>
    <!-- Code Container  -->
    <div class="wrapper">

        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="main--breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang chủ</a></li>
                            <li class="active"><span>Tài khoản</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            <div class="container">
                <h3 class="page-header">Thông tin cá nhân</h3>
                <div class="row">

                    <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                        <!-- left column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="text-center">
                                <img style="    border: 4px solid #979993; border-radius: 50%; margin: auto; background-size: cover ;  width: 180px; height: 180px;   background-image: url()" alt="">
                                <div class="mb-3">
                                    <label for="input_image" class="form-label">Ảnh đai diện</label>
                                    <input style="background-color: #ffffff; color: black;" name="image" type="file" class="form-control text-center center-block well well-sm" id="input_image">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="border border-3 p-4 rounded">

                                            <div style="margin-bottom: 30px;" class="mb-3">
                                                <label for="input_name" class="form-label">Họ Tên</label>
                                                <input name="name" type="text" class="form-control" id="input_name" value='{{ old("name", $user->name ) }}'>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>

                                            <div style="margin-bottom: 30px;" class="mb-3">
                                                <label for="input_email" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="input_email" value='{{ old("email", $user->email) }}'>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Cập nhật</button>

                                            <a class="btn btn-danger" href="{{ route('home') }}">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Footer -->
    <?php include_once("./main_layout/footer.php"); ?>
    <!-- Import JS  -->
    <?php include_once("./main_layout/js.php"); ?>
</body>

</html>