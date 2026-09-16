<?php
require_once('ketnoi.php');

/**
 * 
 */
class mathang
{
    var $conn;

    function __construct()
    {
        $connect_obj = new ketnoi();
        $this->conn = $connect_obj->connect;
    }


    function details_hang($id)  //đang
    {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE idSP = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data;
    }

    function loaisanpham()  //đang
    {
        $query = "SELECT * from loaisanpham";
        $result = $this->conn->query($query);

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    function layten_loaisanpham($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM loaisanpham WHERE idLoaiSP = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data;
    }

    function getcolor($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM color INNER JOIN sanpham ON color.idcolor = sanpham.idcolor WHERE idSP = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data;
    }

    function getsize($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM size INNER JOIN sanpham ON size.idsize = sanpham.idsize WHERE idSP = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data;
    }






    function sanpham_cuahangtheoid($idLoaiSP)  //đang
    {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE idLoaiSP = ?");
        $stmt->bind_param("i", $idLoaiSP);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }



    //hiển thị sản phẩm liên quan
    function sanphamlienquan($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM sanpham WHERE idLoaiSP = ? LIMIT 0,4");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();
        return $data;
    }



    //GÓp ý

    function them_gopy($idSP, $email, $noidung)
    {
        $stmt = $this->conn->prepare("INSERT INTO gopy(idSP, email, noidung) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $idSP, $email, $noidung);
        $stmt->execute();
        $stmt->close();
    }

    function xem_gopy()
    {
        $query = "SELECT * FROM gopy";
        $result = $this->conn->query($query);

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
