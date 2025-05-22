<?php
include('inc/connect.php');
$adminid = $_SESSION['id'];
// Thu nhập chính
if(isset($_POST['themtnc'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $query = "INSERT INTO thunhapchinh ( ten,sotien, diengiai,ngay,thoigian,loaithunhapchinh_id,taikhoan_id) 
    VALUES ( '{$ten}', '{$sotien}', '{$diengiai}', '{$ngay}', '{$thoigian}', '{$loai}','{$adminid}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: thunhapchinh.php?msg=1");
    } 
    else {
        header("Location: thunhapchinh.php?msg=2");
    }
}
if(isset($_POST['suatnc'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $id  = $_POST['id'];
    $query = "UPDATE `thunhapchinh` 
    SET `ten`='{$ten}',`sotien`='{$sotien}', `loaithunhapchinh_id`='{$loai}',`diengiai`='{$diengiai}', `ngay`='{$ngay}',`thoigian`='{$thoigian}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: thunhapchinh.php?msg=1");
    } 
    else {
        header("Location: thunhapchinh.php?msg=2");
    }
}
if(isset($_POST['xoatnc'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM thunhapchinh WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: thunhapchinh.php?msg=1");
}
// Thu nhập phụ
if(isset($_POST['themtnp'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $query = "INSERT INTO thunhapphu ( ten,sotien, diengiai,ngay,thoigian,loaithunhapphu_id,taikhoan_id) 
    VALUES ( '{$ten}', '{$sotien}', '{$diengiai}', '{$ngay}', '{$thoigian}', '{$loai}','{$adminid}') "; 
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: thunhapphu.php?msg=1");
    } 
    else {
        header("Location: thunhapphu.php?msg=2");
    }
}
if(isset($_POST['suatnp'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $id  = $_POST['id'];
    $query = "UPDATE `thunhapphu` 
     SET `ten`='{$ten}',`sotien`='{$sotien}', `loaithunhapphu_id`='{$loai}',`diengiai`='{$diengiai}', `ngay`='{$ngay}',`thoigian`='{$thoigian}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: thunhapphu.php?msg=1");
    } 
    else {
        header("Location: thunhapphu.php?msg=2");
    }
}
if (isset($_POST['xoatnp'])) {
    $id = $_POST['id'];
    
    // Lấy status hiện tại
    $query = "SELECT status FROM thunhapphu WHERE id = '{$id}'";
    $result = mysqli_query($connect, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['status'];

        // Cập nhật status dựa trên giá trị hiện tại
        if ($currentStatus == 0) {
            $updateQuery = "UPDATE thunhapphu SET status = -1 WHERE id = '{$id}'";
        } else if ($currentStatus == -1) {
            $updateQuery = "UPDATE thunhapphu SET status = 0 WHERE id = '{$id}'";
        }

        // Thực hiện cập nhật
        if (isset($updateQuery)) {
            $updateResult = mysqli_query($connect, $updateQuery);
            if ($updateResult) {
                header("Location: thunhapphu.php?msg=1");
            } else {
                header("Location: thunhapphu.php?msg=0"); // Thêm thông báo lỗi nếu cần
            }
        } else {
            // Nếu không có cập nhật nào cần thiết
            header("Location: thunhapphu.php?msg=0");
        }
    } else {
        // Trường hợp không tìm thấy bản ghi
        header("Location: thunhapphu.php?msg=0");
    }
}
// Chi tiêu cố định
if(isset($_POST['themctcd'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $query = "INSERT INTO chitieucodinh ( ten,sotien, diengiai,ngay,thoigian,loaichitieucodinh_id,taikhoan_id) 
    VALUES ( '{$ten}', '{$sotien}', '{$diengiai}', '{$ngay}', '{$thoigian}', '{$loai}','{$adminid}') "; 
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chitieucodinh.php?msg=1");
    } 
    else {
        header("Location: chitieucodinh.php?msg=2");
    }
}
if(isset($_POST['suactcd'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $id  = $_POST['id'];
    $query = "UPDATE `chitieucodinh` 
    SET `ten`='{$ten}',`sotien`='{$sotien}', `loaichitieucodinh_id`='{$loai}',`diengiai`='{$diengiai}', `ngay`='{$ngay}',`thoigian`='{$thoigian}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chitieucodinh.php?msg=1");
    } 
    else {
        header("Location: chitieucodinh.php?msg=2");
    }
}
if(isset($_POST['xoactcd'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM chitieucodinh WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: chitieucodinh.php?msg=1");
}
// Chi tiêu phát sinh
if(isset($_POST['themctps'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $query = "INSERT INTO chitieuphatsinh ( ten,sotien, diengiai,ngay,thoigian,loaichitieuphatsinh_id,taikhoan_id) 
    VALUES ( '{$ten}', '{$sotien}', '{$diengiai}', '{$ngay}', '{$thoigian}', '{$loai}','{$adminid}') "; 
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chitieuphatsinh.php?msg=1");
    } 
    else {
        header("Location: chitieuphatsinh.php?msg=2");
    }
}
if(isset($_POST['suactps'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $id  = $_POST['id'];
    $query = "UPDATE `chitieuphatsinh` 
    SET `ten`='{$ten}',`sotien`='{$sotien}', `loaichitieuphatsinh_id`='{$loai}',`diengiai`='{$diengiai}', `ngay`='{$ngay}',`thoigian`='{$thoigian}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chitieuphatsinh.php?msg=1");
    } 
    else {
        header("Location: chitieuphatsinh.php?msg=2");
    }
}
if (isset($_POST['xoactps'])) {
    $id = $_POST['id'];
    
    // Lấy status hiện tại
    $query = "SELECT status FROM chitieuphatsinh WHERE id = '{$id}'";
    $result = mysqli_query($connect, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['status'];

        // Cập nhật status dựa trên giá trị hiện tại
        if ($currentStatus == 0) {
            $updateQuery = "UPDATE chitieuphatsinh SET status = -1 WHERE id = '{$id}'";
        } else if ($currentStatus == -1) {
            $updateQuery = "UPDATE chitieuphatsinh SET status = 0 WHERE id = '{$id}'";
        }

        // Thực hiện cập nhật
        if (isset($updateQuery)) {
            $updateResult = mysqli_query($connect, $updateQuery);
            if ($updateResult) {
                header("Location: chitieuphatsinh.php?msg=1");
            } else {
                header("Location: chitieuphatsinh.php?msg=0");
            }
        } else {
            // Nếu không có cập nhật nào cần thiết
            header("Location: chitieuphatsinh.php?msg=0");
        }
    } else {
        // Trường hợp không tìm thấy bản ghi
        header("Location: chitieuphatsinh.php?msg=0");
    }
}
// Khoản tiết kiệm
if(isset($_POST['themktk'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $query = "INSERT INTO khoantietkiem ( ten,sotien, diengiai,ngay,thoigian,loaitietkiem_id,taikhoan_id) 
    VALUES ( '{$ten}', '{$sotien}', '{$diengiai}', '{$ngay}', '{$thoigian}', '{$loai}','{$adminid}') "; 
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khoantietkiem.php?msg=1");
    } 
    else {
        header("Location: khoantietkiem.php?msg=2");
    }
}
if(isset($_POST['suaktk'])){
    $ten = $_POST['ten'];
    $sotien  = $_POST['sotien'];
    $loai = $_POST['loai'];
    $diengiai  = $_POST['diengiai'];
    $ngay = $_POST['ngay'];
    $thoigian  = $_POST['thoigian'];
    $id  = $_POST['id'];
    $query = "UPDATE `khoantietkiem` 
    SET `ten`='{$ten}',`sotien`='{$sotien}', `loaitietkiem_id`='{$loai}',`diengiai`='{$diengiai}', `ngay`='{$ngay}',`thoigian`='{$thoigian}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khoantietkiem.php?msg=1");
    } 
    else {
        header("Location: khoantietkiem.php?msg=2");
    }
}
if(isset($_POST['xoaktk'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM khoantietkiem WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: khoantietkiem.php?msg=1");
}
// Loại chi tiêu cố định
if(isset($_POST['themlctcd'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO loaichitieucodinh (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: loaichitieucodinh.php?msg=1");
    } 
    else {
        header("Location: loaichitieucodinh.php?msg=2");
    }
}
if(isset($_POST['sualctcd'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `loaichitieucodinh` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: loaichitieucodinh.php?msg=1");
    } 
    else {
        header("Location: loaichitieucodinh.php?msg=2");
    }
}
if(isset($_POST['xoalctcd'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM chitieucodinh WHERE loaichitieucodinh_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: loaichitieucodinh.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM loaichitieucodinh WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: loaichitieucodinh.php?msg=1");
    }
}
// Loại chi tiêu phát sinh
if(isset($_POST['themlctps'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO loaichitieuphatsinh (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: loaichitieuphatsinh.php?msg=1");
    } 
    else {
        header("Location: loaichitieuphatsinh.php?msg=2");
    }
}
if(isset($_POST['sualctps'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `loaichitieuphatsinh` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: loaichitieuphatsinh.php?msg=1");
    } 
    else {
        header("Location: loaichitieuphatsinh.php?msg=2");
    }
}
if(isset($_POST['xoalctps'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM chitieuphatsinh WHERE loaichitieuphatsinh_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: loaichitieuphatsinh.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM loaichitieuphatsinh WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: loaichitieuphatsinh.php?msg=1");
    }
}
// Loại thu nhập phụ
if(isset($_POST['themltnp'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO loaithunhapphu (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: loaithunhapphu.php?msg=1");
    } 
    else {
        header("Location: loaithunhapphu.php?msg=2");
    }
}
if(isset($_POST['sualtnp'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `loaithunhapphu` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: loaithunhapphu.php?msg=1");
    } 
    else {
        header("Location: loaithunhapphu.php?msg=2");
    }
}
if(isset($_POST['xoaltnp'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM thunhapphu WHERE loaithunhapphu_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: loaithunhapphu.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM loaithunhapphu WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: loaithunhapphu.php?msg=1");
    }
}
// Loại thu nhập chính
if(isset($_POST['themltnc'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO loaithunhapchinh (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: loaithunhapchinh.php?msg=1");
    } 
    else {
        header("Location: loaithunhapchinh.php?msg=2");
    }
}
if(isset($_POST['sualtnc'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `loaithunhapchinh` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: loaithunhapchinh.php?msg=1");
    } 
    else {
        header("Location: loaithunhapchinh.php?msg=2");
    }
}
if(isset($_POST['xoaltnc'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM thunhapchinh WHERE loaithunhapchinh_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: loaithunhapchinh.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM loaithunhapchinh WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: loaithunhapchinh.php?msg=1");
    }
}
// Loại tiết kiệm
if(isset($_POST['themltk'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO loaitietkiem (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: loaitietkiem.php?msg=1");
    } 
    else {
        header("Location: loaitietkiem.php?msg=2");
    }
}
if(isset($_POST['sualtk'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `loaitietkiem` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: loaitietkiem.php?msg=1");
    } 
    else {
        header("Location: loaitietkiem.php?msg=2");
    }
}
if(isset($_POST['xoaltk'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM khoantietkiem WHERE loaitietkiem_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: loaitietkiem.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM loaitietkiem WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: loaitietkiem.php?msg=1");
    }
}




