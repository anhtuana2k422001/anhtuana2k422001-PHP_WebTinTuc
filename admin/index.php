<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" type="image/png" href="./kcnew/frontend/img/image_iconLogo.png"  sizes="160x160">
	<!--plugins-->
	<link href="./admin_dashboard_assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="./admin_dashboard_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="./admin_dashboard_assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="./admin_dashboard_assets/css/pace.min.css" rel="stylesheet" />
	<script src="./admin_dashboard_assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="./admin_dashboard_assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="./admin_dashboard_assets/css/app.css" rel="stylesheet">
	<link href="./admin_dashboard_assets/css/icons.css" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="./admin_dashboard_assets/css/dark-theme.css" />
    <link rel="stylesheet" href="./admin_dashboard_assets/css/semi-dark.css" />
    <link rel="stylesheet" href="./admin_dashboard_assets/css/header-colors.css" />
    <link rel="stylesheet" href="./admin_dashboard_assets/css/my-style.css" />
    <title>Trang quản trị </title>
</head>

<body>

    <!-- @if(Session::has('success'))
        <div class="general-message alert alert-info">{{ Session::get('success</div>
    @endif

    @if(Session::has('error'))
        <div class="general-message alert alert-danger">{{ Session::get('error</div>
    @endif -->

	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
        <?php include_once("./admin_layouts/header.php"); ?> 
		<!--end header -->
		<!--navigation-->
	    <?php include_once("./admin_layouts/nav.php"); ?> 
		<!--end navigation-->
		<!--start page wrapper -->
        <?php include_once("./admin_layouts/wrapper.php"); ?> 
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. Tất cả các quyền.</p>
		</footer>
	</div>
	<!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr/>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr/>
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="./admin_dashboard_assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="./admin_dashboard_assets/js/jquery.min.js"></script>
	<script src="./admin_dashboard_assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="./admin_dashboard_assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="./admin_dashboard_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="./admin_dashboard_assets/js/app.js"></script>


    <!--  Biểu đồ  -->
    <script src="./admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./admin_dashboard_assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="./admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="./admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="./admin_dashboard_assets/js/index.js"></script>
`
    <script>
            $(document).ready(function () {
                // Biểu đồ
            var ctx = document.getElementById("chart1").getContext('2d');
            
            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#6078ea');  
                gradientStroke1.addColorStop(1, '#17c5ea'); 
                
            var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#ff8359');
                gradientStroke2.addColorStop(1, '#ffdf40');
            
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: ['16/06/2022', '17/06/2022', '18/06/2022', '19/06/2022', '20/06/2022', '21/06/2022', '22/06/2022'],
                    datasets: [{
                        label: 'Lượt xem',
                        data: [ 10, 13, 9,16, 10, 12,15],
                        borderColor: gradientStroke1,
                        backgroundColor: gradientStroke1,
                        hoverBackgroundColor: gradientStroke1,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 0
                    }, {
                        label: 'Bình luận',
                        data: [ 8, 14, 19, 12, 7, 18, 8],
                        borderColor: gradientStroke2,
                        backgroundColor: gradientStroke2,
                        hoverBackgroundColor: gradientStroke2,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 0
                    }]
                    },
                    
                    options:{
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        display: false,
                        labels: {
                            boxWidth:8
                        }
                        },
                        tooltips: {
                        displayColors:false,
                        },	
                    scales: {
                        xAxes: [{
                            barPercentage: .5
                        }]
                        }
                    }
                });
                    });
    
    </script>
</body>

</html>