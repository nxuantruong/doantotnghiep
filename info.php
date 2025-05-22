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
                  <?php

                     // Sử dụng prepared statements để bảo mật
                     $idad = $_SESSION['id'];
                    $idad = mysqli_real_escape_string($connect, $idad); // Bảo mật đầu vào
                    $infosql = mysqli_query($connect, "SELECT * FROM taikhoan WHERE id = '$idad'");
                    $data = mysqli_fetch_assoc($infosql);


                     
                     
                     ?>
                  <div class="container-fluid px-4">
                        <h2 class="mt-4">Cập nhật thông tin cá nhân</h2>
                        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($data['ten']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($data['address']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Giới tính</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="male" <?php echo ($data['gender'] == 'male') ? 'selected' : ''; ?>>Nam</option>
                                    <option value="female" <?php echo ($data['gender'] == 'female') ? 'selected' : ''; ?>>Nữ</option>
                                    <option value="other" <?php echo ($data['gender'] == 'other') ? 'selected' : ''; ?>>Khác</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($data['birthdate']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>                                
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
               </div>
            </main>
            <?php include('inc/footer.php')?>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
      <?php 
         if (isset($_GET['msg'])) {?>
      <script>
         function Redirect() {
         window.location = 'index.php';
         }
         alert('Đăng nhập thành công !') 
         Redirect()
      </script>
      <?php } ?>
   </body>
</html>