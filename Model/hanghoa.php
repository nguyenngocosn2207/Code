<?php
class hanghoa
{
    //Phương thức hiện thị sản phẩm new

    function getHangHoaNew()
    {
        //B1: kết nối  đc với dữ liệu
        $db = new connect();
        // B2:lấy cái gì thì truy vấn cái đó
        $select = "select DISTINCT  a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac 
        from hanghoa a,cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau ORDER by a.mahh DESC LIMIT 8";
        // B3 ai thưc hiện câu lệnh select ?   query,pt này nằm trong connect cụ thể là pt
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    function getHangHoaSale()
    {
        //  B1: kết nối đc với dữ liệu
        $db = new connect();
        //  B2: Cần lấy cái gì thì truy vấn cai đó
        $select = "select  DISTINCT a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac ,b.giamgia
        from hanghoa a,cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia!=0 ORDER by a.mahh DESC LIMIT 4";
        //  B3: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ tể là pt
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaALL()
    {
        //B1: kết nối  đc với dữ liệu
        $db = new connect();
        // B2:lấy cái gì thì truy vấn cái đó
        $select = "select DISTINCT  a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac 
        from hanghoa a,cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau ORDER by a.mahh DESC";
        // B3 ai thưc hiện câu lệnh select ?   query,pt này nằm trong connect cụ thể là pt
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    function getHangHoaALLSale()
    {
        //  B1: kết nối đc với dữ liệu
        $db = new connect();
        //  B2: Cần lấy cái gì thì truy vấn cai đó
        $select = "SELECT  DISTINCT a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac ,b.giamgia
        from hanghoa a,cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia!=0 ORDER by a.mahh DESC ";
        //  B3: ai thực thi câu lệnh select? query, pt này nằm trong connect cụ tể là pt
        $result = $db->getList($select);
        return $result;
    }
 
    function getHangHoaTheoLoai($loaihanghoa)
    {
        //B1: kết nối  đc với dữ liệu
        $db = new connect();
        // B2:lấy cái gì thì truy vấn cái đó
        $select = "select DISTINCT  a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, d.maloai
        from hanghoa a,cthanghoa b, mausac c ,loai d
        WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau AND d.maloai=a.maloai and d.maloai=$loaihanghoa ORDER by a.mahh DESC ";
        // B3 ai thưc hiện câu lệnh select ?   query,pt này nằm trong connect cụ thể là pt
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    // phương thức  lấy  thông tin  của 1 san phẩm 
    function getHangHoaId($id)
    {
        $db=new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia from hanghoa a, cthanghoa b 
        WHERE a.mahh=b.idhanghoa and a.mahh=$id";
        $result = $db->getInstance($select);
        return $result; // lấy được dữ liệu về
    }
    // phuong thức lấy màu
    function getHangHoaMau($id)
    {
        $db=new connect();
        $select = "select DISTINCT b.idmau,b.mausac from  cthanghoa a ,mausac b
        WHERE a.idmau=b.idmau and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    //phương thức lấy size
    function getHangHoaSize($id)
    {
        $db=new connect();
        $select = "select DISTINCT b.idsize,b.size from  cthanghoa a ,sizenon b
        WHERE a.idsize=b.idsize and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    function getHangHoaHinh($id)
    {
        $db=new connect();
        $select = "select  DISTINCT  a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result; // lấy được dữ liệu về
    }
    function getHangHoaIdMauSize($id,$mau,$size)
    {
        $db=new connect();
        $select = "select DISTINCT a.hinh from cthanghoa a,mausac b, sizenon c 
        WHERE a.idmau=b.idmau and a.idsize=c.idsize and a.idhanghoa='$id' and b.mausac='$mau' and c.size='$size'";
        $result=$db->getInstance($select);
        return $result;
    }
    function getHangHoaTenMau($idmau)
    {
        $db=new connect();
        $select = "SELECT a.mausac FROM mausac a WHERE a.idmau=$idmau";
        $result=$db->getInstance($select);
        return $result;
    }
    function getSubTotal()
    {
        $subtotal=0;
        foreach ($_SESSION['cart'] as $key => $item){
            $subtotal+=$item['thanhtien'];

        }
        $subtotal=number_format($subtotal,2);
        return $subtotal;

        
    }
    function selectTimKiem($tenhh,$start,$limit)
    {
        $db=new connect();
        $select = "SELECT a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac 
        FROM hanghoa a,cthanghoa b,mausac c 
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau  and b.giamgia=0 and a.tenhh
        like '%$tenhh%' ORDER BY a.mahh desc limit ".$start.",".$limit ;
        $result=$db->getList($select);
        return $result;
    }
    
    
    
    
    

}
