<?php
require_once('ketnoi.php');

class donhang
{
    var $conn;

    function __construct()
    {
        $connect_obj = new ketnoi();
        $this->conn = $connect_obj->connect;
    }

    function loaisanpham()
    {
        $result = $this->conn->query("SELECT * FROM loaisanpham LIMIT 0, 4");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function danhsach_cua_user($idUser)
    {
        $stmt = $this->conn->prepare(
            "SELECT h.idhoadon, h.tongtien, h.trangthai, h.soluongmua, h.ngaymua,
                    s.idSP, s.idLoaiSP, s.tenSP, s.anh1
             FROM hoadon h
             INNER JOIN sanpham s ON s.idSP = h.idSP
             WHERE h.idUser = ?
             ORDER BY h.ngaymua DESC, h.idhoadon DESC"
        );
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }

    function chitiet_cua_user($idhoadon, $idUser)
    {
        $stmt = $this->conn->prepare(
            "SELECT h.idhoadon, h.tongtien, h.trangthai, h.soluongmua, h.ngaymua,
                    s.idSP, s.idLoaiSP, s.tenSP, s.anh1
             FROM hoadon h
             INNER JOIN sanpham s ON s.idSP = h.idSP
             WHERE h.idhoadon = ? AND h.idUser = ?
             LIMIT 1"
        );
        $stmt->bind_param("ii", $idhoadon, $idUser);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data ?: null;
    }
}
