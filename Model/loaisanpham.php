<?php
class loaisanpham 
{
    // phương thức lấy ra tất cả loại
    function getLoaiHangHoang(){
        //b1: kết nói với dư liệu
        $db= new connect();

    //b2: can lấy  cái gì thì truy vấn cái đó
    $select="select a.maloai, a.tenloai from loai a";
    $result=$db ->getList($select);
    return $result; // lất được dữ liệu
    }
}
?>