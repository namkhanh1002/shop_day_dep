<?php
require_once('ketnoi.php');

/**
 * 
 */
class hoanthanh_donhang
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



  function gui_donhang_choadmin($idUser, $idSP, $tongtien, $soluongmua, $ngaymua)
  {
    $stmt = $this->conn->prepare("INSERT INTO hoadon (idUser, idSP, tongtien, soluongmua, ngaymua) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiis", $idUser, $idSP, $tongtien, $soluongmua, $ngaymua);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
  }

  function cap_nhat_ton_kho($idSP, $soluongmua)
  {
    $stmt = $this->conn->prepare("UPDATE sanpham SET soluong = soluong - ? WHERE idSP = ?");
    $stmt->bind_param("ii", $soluongmua, $idSP);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
  }
}
