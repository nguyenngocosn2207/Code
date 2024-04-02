<?php
class page
{   //phương thức tính ra số trang

    function findPage($count,$limit)//14,8
    {
        $page=(($count%$limit)==0?$count/$limit:ceil($count/$limit));
        return$page;//2
    }
    // phương thức tính start dựa vào URL, tức là trang hiện tại 
    // tạo 1 biến chứa trang hiện tại, tên là page
    function findStart($limit)
    {
        if(!isset($_GET['page'])||$_GET['page']==1)
        {
            $start=0;
        }
        else
        {
            $start=($_GET['page']-1)*$limit;//8
        }
        return $start;//8
    }

}
?>