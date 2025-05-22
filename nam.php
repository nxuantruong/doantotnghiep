
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('inc/head.php')?>
</head>

<body class="sb-nav-fixed">
<?php include('inc/header.php')?>
    <div id="layoutSidenav">
    <?php include('inc/menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-6 mt-4">
                        <div class="card-header">
                        <form method="POST" action="" class="register-form" id="register-form">
                        <div class="row" style="justify-content:space-around !important">
                        <div class="col-3">
                            <input type="text" class="form-control" value="Chọn năm muốn xem" disabled/>
                        </div>
                        <div class="col-4">
                            <select  class="form-select" name="ngay" required >
                            <option value="2022" selected >2022</option>
                            <option value="2021"  >2021</option>
                            <option value="2020"  >2020</option>
                             <option value="2023"  >2023</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success" name="thongke" >
                                Xem
                            </button>
                        </div>
                    </div>
                </form>
                            
                        </div>
                        <div class="card-body mt-4">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                    <th>STT</th>
                                        <th>Tên</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                if(isset($_POST['thongke'])){
                                    $ngay = $_POST['ngay'];
                                    $idad = $_SESSION['id'];
       $sumctcd = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
       FROM chitieucodinh
       WHERE taikhoan_id = $idad AND Year(ngay) = '{$ngay}'
       ");
       $artinhctcd= mysqli_fetch_array($sumctcd);
       $sumctps = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
       FROM chitieuphatsinh
       WHERE taikhoan_id = $idad AND Year(ngay) = '{$ngay}'
       ");
       $artinhctps= mysqli_fetch_array($sumctps);
       $sumtnc = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
       FROM thunhapchinh
       WHERE taikhoan_id = $idad AND Year(ngay) = '{$ngay}'
       ");
       $artinhtnc= mysqli_fetch_array($sumtnc);
       $sumtnp = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
       FROM thunhapphu
       WHERE taikhoan_id = $idad AND Year(ngay) = '{$ngay}'
       ");
       $artinhtnp= mysqli_fetch_array($sumtnp);
       $sumktk = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
       FROM khoantietkiem
       WHERE taikhoan_id = $idad AND Year(ngay) = '{$ngay}'
       ");
       $artinhktk= mysqli_fetch_array($sumktk);
                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td>Thu nhập chính</td>
                                        <td> <?php echo number_format($artinhtnc['tongtien']) ?> VND </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Thu nhập phụ</td>
                                        <td> <?php echo number_format($artinhtnp['tongtien']) ?> VND </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Chi tiêu cố định</td>
                                        <td> <?php echo number_format($artinhctcd['tongtien']) ?> VND </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Chi tiêu phát sinh</td>
                                        <td> <?php echo number_format($artinhctps['tongtien']) ?> VND </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Khoản tiết kiệm</td>
                                        <td> <?php echo number_format($artinhktk['tongtien']) ?> VND </td>
                                    </tr>
                                    <?php  echo "<h4>Thống kê, báo cáo năm ".$ngay; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('inc/footer.php')?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>