<?php
require_once('ketnoi.php');

/**
 * 
 */
class Matkhau
{
  var $conn;

  function __construct()
  {
    $connect_obj = new ketnoi();
    $this->conn = $connect_obj->connect;
  }


  function loaisanpham()
  {
    $query = "SELECT * from loaisanpham limit 0,4";
    $result = $this->conn->query($query);

    $data = array();

    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

  function laymatkhau($email)
  {
    $mk = password_hash('12345', PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("UPDATE user SET matkhau = ? WHERE email = ?");
    $stmt->bind_param("ss", $mk, $email);
    $stmt->execute();
    $updated = $stmt->affected_rows > 0;
    $stmt->close();
    return $updated;
  }
}
