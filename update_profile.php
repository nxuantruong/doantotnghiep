<?php
include('inc/connect.php');
session_start(); // Đảm bảo bạn đã khởi động phiên

$adminid = $_SESSION['id'];

if (isset($_POST['name'])) {
    // Lấy dữ liệu từ form
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $gender = mysqli_real_escape_string($connect, $_POST['gender']);
    $birthdate = mysqli_real_escape_string($connect, $_POST['birthdate']);
    
    // Xử lý tệp avatar
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatar = $_FILES['avatar'];
        $avatarPath = 'uploads/' . basename($avatar['name']); // Đường dẫn lưu tệp

        // Di chuyển tệp đến thư mục mong muốn
        if (move_uploaded_file($avatar['tmp_name'], $avatarPath)) {
            $avatarSql = ", avatar = '$avatarPath'"; // Thêm vào câu truy vấn
        } else {
            $avatarSql = ""; // Không cập nhật avatar
        }
    } else {
        $avatarSql = ""; // Không cập nhật avatar
    }

    // Câu truy vấn cập nhật
    $query = "UPDATE taikhoan SET ten = '$name', address = '$address', gender = '$gender', birthdate = '$birthdate' $avatarSql WHERE id = $adminid";
    
    // Thực hiện câu truy vấn
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        header("Location: info.php?msg=update_fail");
    }
}
?>
