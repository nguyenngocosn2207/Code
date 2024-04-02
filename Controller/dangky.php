<?php
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;

    case 'dangky_action':
        // nhận thông tin
        $tenkh = '';
        $diachi = '';
        $sodt = '';
        $user = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {

            $tenkh = $_POST['txttenkh'];
            $diachi = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $user = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            // ma hoá pass
            $saltF = 'G234#!';
            $saltL = 'Ta78@#';
            $passnew = md5($saltF . $pass . $saltL);


            // controller yêu cầu đem thông tin này lưu vào database? Model
            //Trước khi chèn cần kiểm tra username và email có tồn trong databse
            $kh = new user();
            $check = $kh->checkKhachHang($user, $email)->rowCount();
            if ($check >= 1) {
                echo '<script>alert("Username và email đã tồn tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangky">';
            } else {
                //insert vào database
                $iskh = $kh->insertKhachHang($tenkh, $user, $passnew, $email, $diachi, $sodt);
                if ($iskh !== false) {
                    echo '<script>alert("Đăng ký thàng công");</script>';
                    include_once "./View/home.php";
                } else {
                    echo '<script>alert("Đăng ký không thành công");</script>';
                    include_once "./View/registration.php";
                }
            }
        }


        break;
}
