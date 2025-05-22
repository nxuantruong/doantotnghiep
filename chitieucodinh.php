
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
            <?php 
                $idad = $_SESSION['id'];
                $sumtt = mysqli_query($connect, "SELECT SUM(sotien) as 'tongtien' 
                FROM chitieucodinh
                WHERE taikhoan_id = $idad
                ");
                $artinhtt = mysqli_fetch_array($sumtt);
                ?>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách chi tiêu cố định <span style="font-size : 60%"> (Tổng tiền : <?php echo number_format($artinhtt['tongtien']) ?> VND) </span></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        <?php if (isset($_GET['msg'])){
                            if($_GET['msg'] == 1){ ?>
                             <div class="alert alert-success">
                                <strong>Thành công</strong>
                            </div>
                            <?php }  ?> 
                            <?php }  ?>   
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAdd">
                                Thêm mới
                            </button>
                             
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                <th>STT</th>
                                        <th>Tên khoản</th>
                                        <th>Loại chi tiêu cố định</th>
                                        <th>Số tiền</th>
                                        <th>Diễn giải</th>
                                        <th>Ngày</th>
                                        <th>Thời gian</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $idad = $_SESSION['id']; 
                                    $query = "SELECT a.*,b.ten as tenloai 
                                    FROM chitieucodinh as a,loaichitieucodinh as b
                                     WHERE a.loaichitieucodinh_id = b.id 
                                     AND a.taikhoan_id = $idad
                                     ORDER BY a.id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel".$arUser["id"] ;
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                    <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["ten"] ?></td>
                                        <td><?php echo $arUser["tenloai"] ?></td>
                                        <td><?php echo number_format($arUser['sotien']) ?> VND</td>
                                        <td><?php echo $arUser["diengiai"] ?></td>
                                        <td><?php echo date('d-m-Y',strtotime($arUser["ngay"])) ?></td>
                                        <td><?php echo $arUser["thoigian"] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Sửa
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelDel ?>">
                                                Xóa
                                            </button>
                                            
                                            <!--Dele-->
                                            <div class="modal fade" id="<?php echo $idModelDel ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Chi tiêu cố định : <?php echo $arUser["ten"] ?>
                                                            <form action="function.php" method="post">
                                                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                                <div class="modal-footer" style="margin-top: 20px">
                                                                    <button style="width:100px" type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Đóng
                                                                    </button>
                                                                    <button style="width:100px" type="submit" class="btn btn-danger" name="xoactcd"> Xóa</button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Dele-->
                                        </td>
                                        
                                    </tr>
                                    <!-- Modal Update-->
                                    <div class="modal fade" id="<?php echo $idModelEdit ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhập</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST" >
                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                        <div class="col">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Tên khoản:</label>
                                                                <input type="text" class="form-control" id="category-film" value="<?php echo $arUser["ten"] ?>" name="ten" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Loại chi tiêu cố định:</label>
                                                                    <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="loai" required>
                                                                        <?php
                                                                        $lspud = mysqli_query($connect, "SELECT * FROM loaichitieucodinh");
                                                                        while ($arLspud = mysqli_fetch_array($lspud, MYSQLI_ASSOC)) {
                                                                        if($arLspud['id'] == $arUser["loaichitieucodinh_id"]){   
                                                                    ?>
                                                                    <option value="<?php echo $arLspud['id'] ?>" selected ><?php echo $arLspud['ten'] ?></option>
                                                                    <?php } else{ ?>
                                                                        <option value="<?php echo $arLspud['id'] ?>" ><?php echo $arLspud['ten'] ?></option>
                                                                    <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Số tiền:</label>
                                                                <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["sotien"] ?>" name="sotien" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Diễn giải:</label>
                                                                    <input type="text" class="form-control" id="category-film" value="<?php echo $arUser["diengiai"] ?>" name="diengiai" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Ngày:</label>
                                                                <input type="date" class="form-control" id="category-film" value="<?php echo $arUser["ngay"] ?>" name="ngay" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Thời gian:</label>
                                                                    <input type="time" class="form-control" id="category-film" value="<?php echo $arUser["thoigian"] ?>" name="thoigian" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="suactcd">Lưu</button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    <?php $stt++;} ?>
                                    <!-- Modal Add-->
                                    <div class="modal fade" id="exampleModalAdd" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Tên khoản:</label>
                                                                <input type="text" class="form-control" id="category-film" name="ten" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Loại chi tiêu cố định:</label>
                                                                    <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="loai" required>
                                                                        <option value="" selected>Chọn loại chi tiêu cố định</option>
                                                                        <?php
                                                                        $lsp = mysqli_query($connect, "SELECT * FROM loaichitieucodinh");
                                                                        while ($arLsp = mysqli_fetch_array($lsp, MYSQLI_ASSOC)) {
                                                                        ?>
                                                                        <option value="<?php echo $arLsp['id'] ?>" ><?php echo $arLsp['ten'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Số tiền:</label>
                                                                <input type="number" class="form-control" id="category-film" name="sotien" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Diễn giải:</label>
                                                                    <input type="text" class="form-control" id="category-film" name="diengiai" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Ngày:</label>
                                                                <input type="date" class="form-control" id="category-film" name="ngay" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="category-film"
                                                                    class="col-form-label">Thời gian:</label>
                                                                    <input type="time" class="form-control" id="category-film" name="thoigian" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="themctcd">Lưu </button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    

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