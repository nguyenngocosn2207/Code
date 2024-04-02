
<?php 
      //controller điều phối đến những view khác nhau dựa vào 1 biến
     //  đặt tên là $act
     $act="sanpham";
     if(isset($_GET['act']))
     {
        $act=$_GET['act'];// sanphamkhuyenmai
     }
     switch($act){
        case 'sanpham': 
             include_once "./View/sanpham.php";
             break;
        case 'sanphamkhuyenmai' :
            include_once "./View/sanpham.php";
            break;
        case 'sanphamchitiet' :
            include_once "./View/sanphamchitiet.php";
            break;
        case 'timkiem' :
             include_once "./View/sanpham.php";
            break;
     }
      ?>