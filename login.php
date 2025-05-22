<?php
include('inc/connect.php');
if (isset($_SESSION['taikhoan'])) {
  header("Location: index.php");
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đăng nhập</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
   
    <body class="bg-gray">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 ">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Quản Lý Chi Tiêu</h3></div>
                                    <div class="card-body">
                                        <form action="checklogin.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="" name="taikhoan" required />
                                                <label for="inputEmail">Tài khoản</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="" name="matkhau" required />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <?php if (isset($_GET['fail'])){ ?>
                                            <div class="alert alert-danger">
                                                <strong>Sai tài khoản hoặc mật khẩu !</strong>
                                            </div>
                                            <?php }  ?> 
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" style="margin:0px auto !important" type="submit" name="login">Đăng nhập</button>
                                            <a class="btn btn-primary" style="margin : 0px auto !important" href="singup.php"> Đăng ký</a>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <?php 
                    if (isset($_GET['msg'])) {?>
                        <script>
                        function Redirect() {
                        window.location = 'index.php';
                        }
                        alert('Đăng ký thành công !') 
                        Redirect()
                    </script>
                   <?php } ?>
    </body>
</html>
