<?php 
class binhluan{
    function insertBinhLuan($idkh,$idhanghoa,$content)
    {
        $db=new connect();
        $query="insert into comment(idcomment,idkh,idhanghoa,content,luotthich) values (NULL,$idkh,$idhanghoa,'$content',0)";
        $db->exec($query);
    }

    function selectBinhLuan($idhanghoa)
    {
        $db=new connect();
        $select="select a.username,b.content from khachhang a,comment b WHERE a.makh=idkh and b.idhanghoa=$idhanghoa";
        $result=$db->getList($select);
        return $result;
    }

}
?>