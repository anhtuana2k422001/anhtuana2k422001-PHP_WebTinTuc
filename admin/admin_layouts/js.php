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