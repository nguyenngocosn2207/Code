<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    case 'dangnhap_action':
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $user = $_POST['txtusername']; //thiennhan
            $pass = $_POST['txtpassword']; //132131
            $saltF = 'G234#!';
            $saltL = 'Ta78@#';
            $passnew = md5($saltF . $pass . $saltL);
            //controller yêu cầu  model truy vấn xem có  user đó hay không

            $kh = new user();
            $logkh = $kh->logKhachHang($user, $passnew);
            if ($logkh) {
                // nếu đăng nhập thàng công thì tạo sessionn để lưu trữ thông tin kh
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
                echo '<script>alert("Đăng Nhập Thành Công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home">';
            } else {
                echo '<script>alert("Đăng Nhập Không Thành Công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangnhap">';
            }
        }
        break;
    case 'dangxuat':
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home" >';
        break;
}
