<?php
class connect
{
    //Thôc Tính 
    var $db = null;
    //Hàm tạo được gọi khi tao một đối tượng
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=shopbannon';
        $user = 'root';
        $pass = ''; //nếu xài xamp,wamp,laragon thì $pass='';
        //Kết nối dựa vào class PDO
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            echo "";
        } catch (\Throwable $th) {
            //throw $th;
            echo "kết nối Không Thành Công";
            echo $th;
        }
    }
    //Phương thức truy vấn trả về nhiều row
    function getlist($select)
    {
        $results= $this->db->query($select);// $this->db->query(select* form hanghoa);
        return $results;//trả về 1 table

    }
    //phương thức truy vấn trả về 1 row
    function getInstance($select)
    {
        $results=$this->db->query($select);//$this->db->query(select* from hanghoa);
        $result=$results->fetch();// $result là arr chỉ chứa 1 dòng [mahh:1,tehh:giày...]
        return $result;


    }
    //câu lệnh insert,update,delete ai làm ? exec
    function exec($query)
    {
        $results=$this->db->exec($query);
        return $results;
    }
    //dùng prepare
    function execp($query)
    {
        $statement=$this->db->prepare($query);
        return $statement;
    }
}
