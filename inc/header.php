<?php include('inc/connect.php'); 
$adminid = $_SESSION['id'];

$query = "SELECT ten, avatar FROM taikhoan WHERE id = '$adminid'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);
print_r($user);

if (empty($_SESSION['taikhoan'])) {
  header("Location: login.php");
}?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">QUẢN LÝ CHI TIÊU</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <p style="color:white;margin-top:15px">Website quản lý chi tiêu thu nhập gia đình</p>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" style="width: 30px; height: 30px; border-radius: 50%;">
                    Xin chào, <?php echo htmlspecialchars($_SESSION['ten']); ?>                </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="info.php">Cập nhật thông tin</a></li>
                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>