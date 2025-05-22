<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc/head.php') ?>
</head>
<body class="sb-nav-fixed">
    <?php include('inc/header.php') ?>
    <div id="layoutSidenav">
        <?php include('inc/menu.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $idad = $_SESSION['id'];
                    $sumctcd = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                    FROM chitieucodinh
                    WHERE taikhoan_id = $idad
                    ");
                    $artinhctcd= mysqli_fetch_array($sumctcd);
                    $sumctps = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                    FROM chitieuphatsinh
                    WHERE taikhoan_id = $idad
                    ");
                    $artinhctps= mysqli_fetch_array($sumctps);
                    $sumtnc = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                    FROM thunhapchinh
                    WHERE taikhoan_id = $idad
                    ");
                    $artinhtnc= mysqli_fetch_array($sumtnc);
                    $sumtnp = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                    FROM thunhapphu
                    WHERE taikhoan_id = $idad
                    ");
                    $artinhtnp= mysqli_fetch_array($sumtnp);
                    $sumktk = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                    FROM khoantietkiem
                    WHERE taikhoan_id = $idad
                    ");
                    $artinhktk= mysqli_fetch_array($sumktk);
             
             

                    $ttt =  $artinhktk['tongtien'] + $artinhtnc['tongtien'] + $artinhtnp['tongtien'];
                    $ttc =  $artinhctcd['tongtien'] + $artinhctps['tongtien'];
                    $sd = $ttt - $ttc;
                    $dates = [];
$incomeData = [];
$expenseData = [];

for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $dates[] = $date;

    // Tổng tiền thu cho ngày này
    $incomeQuery = "SELECT SUM(sotien) as 'tongtien' FROM thunhapchinh WHERE taikhoan_id = $idad AND DATE(ngay) = '$date'";
    $incomeResult = mysqli_query($connect, $incomeQuery);
    $incomeData[] = mysqli_fetch_assoc($incomeResult)['tongtien'] ?? 0;

    // Tổng tiền chi cho ngày này
    $expenseQuery = "SELECT SUM(sotien) as 'tongtien' FROM chitieucodinh WHERE taikhoan_id = $idad AND DATE(ngay) = '$date'";
    $expenseResult = mysqli_query($connect, $expenseQuery);
    $expenseData[] = mysqli_fetch_assoc($expenseResult)['tongtien'] ?? 0;
}
                    ?>
                    <div class="row mt-4">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng tiền thu: <strong><?php echo number_format($ttt) ?> VND</strong></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Tổng tiền chi: <strong><?php echo number_format($ttc) ?> VND</strong></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Số dư: <strong><?php echo number_format($sd) ?> VND</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 px-4">
                            <canvas style="max-height:400px !important;max-width:400px" width="400px" id="incomeExpenseChart"></canvas>
                        </div>
    
    
                           
                           <div class="col-md-8 px-4">
                           <canvas  style="max-width:1000px !important" id="weeklyChart"></canvas>
                        </div>
</div>

                </div>
            </main>
            <?php include('inc/footer.php') ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
        const incomeExpenseChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tổng tiền thu', 'Tổng tiền chi'],
                datasets: [{
                    label: 'VND',
                    data: [<?php echo $ttt; ?>, <?php echo $ttc; ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' VND';
                            }
                        }
                    }
                }
            }
        });

      
         
       
    <?php 
    if (isset($_GET['msg'])) { ?>
        <script>
            function Redirect() {
                window.location = 'index.php';
            }
            alert('Đăng nhập thành công!')
            Redirect()
        </script>
    <?php } ?>
</body>
</html>
