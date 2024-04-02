<?php
    class hanghoa{
        function getHangHoa()
        {
            $db=new connect();
            $select="select * from hanghoa";
            $result=$db->getList($select);
            return $result;
        }
        //phương thức insert
        function insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota)
        {
            $db=new connect();
            $query="insert into hanghoa(mahh,tenhh,maloai,dacbiet,soluotxem,ngaylap,mota) 
            values (Null,'$tenhh',$maloai,$dacbiet,$slx,'$ngaylap','$mota')";
            $result=$db->exec($query);
            return $result;
        }
        // lấy thông tin 1 sản phẩm
        function getHangHoaID($id)
        {
            $db=new connect();
            $select="select * from hanghoa where mahh=$id";
            $result=$db->getInstance($select);
            return $result;
        }
        // phương thức update
        function updateHangHoa($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota)
        {
            $db=new connect();
            $query="update hanghoa 
            set tenhh='$tenhh',maloai=$maloai,dacbiet=$dacbiet,soluotxem=$slx,ngaylap='$ngaylap',mota='$mota' 
            where mahh=$mahh";
            $result=$db->exec($query);
            return $result;
        }
    }
?>