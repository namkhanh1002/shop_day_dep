<?php
require_once('ketnoi.php');

/**
 * 
 */
class thanhtoan
{
  var $conn;

  function __construct()
  {
    $connect_obj = new ketnoi();
    $this->conn = $connect_obj->connect;
  }


  function loaisanpham()  //đang
  {
    $query = "SELECT * from loaisanpham limit 0,4";
    $result = $this->conn->query($query);

    $data = array();

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

  function chitiet_donhang($tendangnhap)
  {
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE tendangnhap = ?");
    $stmt->bind_param("s", $tendangnhap);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $data;
  }

  function chitiet_khuyenmai($tendangnhap)
  {
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE tendangnhap = ?");
    $stmt->bind_param("s", $tendangnhap);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $data;
  }


  function chitiet_sanpham($Dongia)
  {
    $stmt = $this->conn->prepare("SELECT * FROM sanpham INNER JOIN khuyenmai ON sanpham.idKM = khuyenmai.idKM WHERE Dongia = ?");
    $stmt->bind_param("i", $Dongia);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $data;
  }

  function giatri_khuyenmai($idSP)
  {
    $stmt = $this->conn->prepare("SELECT giatriKM FROM sanpham INNER JOIN khuyenmai ON sanpham.idKM = khuyenmai.idKM WHERE idSP = ?");
    $stmt->bind_param("i", $idSP);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $data ? (float) $data['giatriKM'] : 0;
  }

  function tim_ma_giam_gia($code)
  {
    $code = trim($code);
    $idKM = 0;
    if (preg_match('/^TD(\d+)$/i', $code, $matches)) {
      $idKM = (int) $matches[1];
    } elseif (ctype_digit($code)) {
      $idKM = (int) $code;
    }

    $stmt = $this->conn->prepare(
      "SELECT idKM, loaiKM, giatriKM FROM khuyenmai
       WHERE (idKM = ? OR LOWER(loaiKM) = LOWER(?))
         AND giatriKM > 0
         AND (ngaybatdau IS NULL OR ngaybatdau <= CURDATE())
         AND (ngayketthuc IS NULL OR ngayketthuc >= CURDATE())
       LIMIT 1"
    );
    $stmt->bind_param("is", $idKM, $code);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $data ?: null;
  }
}
