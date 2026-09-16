<?php
//MODEL CHO TÀI KHOẢN NGƯỜI DÙNG
require_once('ketnoi.php');
/**
 * 
 */
class dangnhap_dangky
{
    var $conn;

    function __construct()
    {
        $connect_obj = new ketnoi();
        $this->conn = $connect_obj->connect;
    }

    function dangky_model($ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap, $matkhau)
    {
        // Check duplicate username/email
        $check_stmt = $this->conn->prepare("SELECT idUser FROM user WHERE tendangnhap=? OR email=?");
        $check_stmt->bind_param("ss", $tendangnhap, $email);
        $check_stmt->execute();
        $check = $check_stmt->get_result();
        $check_stmt->close();
        if ($check->num_rows > 0) {
            echo "<script>alert('Tên đăng nhập hoặc email đã tồn tại'); location.href='?action=dangnhap';</script>";
            return;
        }

        $matkhau = password_hash($matkhau, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO user (ho, ten, email, diachi, gioitinh, sodienthoai, tendangnhap, matkhau, idQuyen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 3)");
        $stmt->bind_param("ssssssss", $ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap, $matkhau);
        $result = $stmt->execute();

        if ($result) {
            echo "<script>location.href='?action=dangnhap';</script>";
        } else {
            echo "<script>alert('ĐĂNG KÝ KHÔNG THÀNH CÔNG'); location.href='?action=trangchu';</script>";
        }
        $stmt->close();
    }


    function dangnhap_model($tendangnhap, $matkhau)
    {
        $stmt = $this->conn->prepare("SELECT idUser, idQuyen, tendangnhap, matkhau FROM user WHERE tendangnhap=?");
        $stmt->bind_param("s", $tendangnhap);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row && password_verify($matkhau, $row['matkhau'])) {
            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['tendangnhap'] = $row['tendangnhap'];
            $_SESSION['admin'] = ($row['idQuyen'] == 1);
            $_SESSION['banhang'] = ($row['idQuyen'] == 2);
            $_SESSION['thoigian_bd'] = time();

            echo "<script language='javascript'>location.href='?action=trangchu';</script>";
        } else {
            echo "<script language='javascript'>alert('Đăng nhập thất bại'); location.href='?action=dangnhap';</script>";
        }
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




    function taikhoan($tendangnhap)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE tendangnhap = ?");
        $stmt->bind_param("s", $tendangnhap);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $data;
    }



    function suataikhoan($idUser, $ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap)
    {



        $stmt = $this->conn->prepare("UPDATE user SET ho=?, ten=?, email=?, diachi=?, gioitinh=?, sodienthoai=?, tendangnhap=? WHERE idUser=?");
        $stmt->bind_param("sssssssi", $ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap, $idUser);
        $result = $stmt->execute();
        $stmt->close();

        if ($result == true) {
            header('Location: ?action=taikhoan');
        }
    }


    function suamk($idUser, $matkhau_moi)
    {
        if (empty($idUser) || !is_numeric($idUser)) {
            return false;
        }
        $hash = password_hash($matkhau_moi, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE user SET matkhau=? WHERE idUser=?");
        $stmt->bind_param("si", $hash, $idUser);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
