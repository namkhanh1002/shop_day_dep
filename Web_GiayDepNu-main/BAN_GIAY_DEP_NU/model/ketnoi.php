<?php

/**
 * 
 */
class ketnoi
{
    var $connect;

    function __construct()
    {
        //các thông số cần thiết kết nối database
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wang_luxury";

        //tạo kết nối với cơ sở dữ liệu
        $this->connect = new mysqli($host, $username, $password, $dbname);

        //kiểm tra kết nối
        if ($this->connect->connect_error) {
            die("Lỗi khi kết nối đến server: " . $this->connect->connect_error);
        }

        $this->connect->set_charset('utf8');
    }
}
