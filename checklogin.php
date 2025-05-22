<?php
include('inc/connect.php');
if(isset($_POST['login'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau  = $_POST['matkhau'];
    $query = "SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      header("Location: login.php?fail=1");
    } 
    else {
      $row = mysqli_fetch_array($result);
      if ($matkhau != $row['matkhau']) {
        header("Location: login.php?fail=1");
      }
      else{
        header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $taikhoan;
      $_SESSION['id'] = $row['id'];
      $_SESSION['ten'] = $row['ten'];
      }
    }
    }
    if(isset($_POST['singup'])){
      $hoten = $_POST['hoten'];
      $taikhoan = $_POST['taikhoan'];
      $matkhau  = $_POST['matkhau'];
      $check = "SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'";
      $excute = mysqli_query($connect, $check);
      $row = mysqli_num_rows($excute);
      if($row > 0)
      {
          header("Location: singup.php?fail=2");
      }else{
        $query = "INSERT INTO taikhoan ( `ten`,`taikhoan`, `matkhau`) 
        VALUES ( '{$hoten}', '{$taikhoan}', '{$matkhau}') ";
        $result = mysqli_query($connect, $query);
        if ($result) {
          header("Location: login.php?msg=1");
        } 
        else {
            header("Location: singup.php?fail=2");
        }
      }
}
   ?> 
 
