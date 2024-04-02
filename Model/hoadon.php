<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $date = new DateTime('now');
        $ngay= $date->format('Y-m-d');
        $db= new connect();
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0)";
        $db->exec($query);
        $select = "select masohd from hoadon order by masohd desc limit 1";
        $mahd=$db->getInstance($select);
        return $mahd[0];
    }
    function insertCTHoaDon($masohd,$mahh,$soluongmua,$mausac,$size,$thanhtien)
    {
        $db= new connect();
        $query ="insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang) values('$masohd','$mahh','$soluongmua','$mausac','$size','$thanhtien',0)";
        $db->exec($query);
    }
    function updateHoaDonTongTien($masohd,$makh,$tongtien)
    {
        $db= new connect();
        $query="update hoadon set tongtien=$tongtien WHERE masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    function selectThongTinKHHD($masohd)
    {
        $db= new connect();
        $select ="select b.masohd,b.ngaydat,a.tenkh,a.diachi,a.sodienthoai, b.tongtien
        from khachhang a ,hoadon b WHERE a.makh=b.makh AND b.masohd=$masohd ";
        $result=$db->getInstance($select);

        return $result;

    }
    function selectThongTinHHD($masohd)
    {
        $db= new connect();
        $select ="select DISTINCT a.tenhh,c.mausac,c.size,b.dongia,c.soluongmua 
        from hanghoa a, cthanghoa b, cthoadon c WHERE a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
    
        $result=$db->getlist($select);
        return $result;
        
    }
}
?>