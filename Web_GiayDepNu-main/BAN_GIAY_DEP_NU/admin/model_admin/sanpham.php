<?php
require_once('ketnoi.php');

class sanpham
{
    var $conn;

    function __construct()
    {
        $connect_obj = new ketnoi();
        $this->conn = $connect_obj->connect;
    }

    // Lấy tất cả sản phẩm để phân trang
    function phantrang()
    {
        $query = "SELECT * FROM sanpham";
        return $this->conn->query($query);
    }

    // Tìm kiếm để phân trang
    function phantrang_timkiem($timkiem_sp)
    {
        $timkiem_sp = $this->conn->real_escape_string($timkiem_sp);
        $query = "SELECT * FROM sanpham WHERE tenSP LIKE '%$timkiem_sp%'";
        return $this->conn->query($query);
    }

    // Lấy tất cả sản phẩm
    function all_them()
    {
        $query = "SELECT * FROM sanpham";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Lấy danh sách có giới hạn
    function all($batdau, $gioihan)
    {
        $batdau = (int)$batdau;
        $gioihan = (int)$gioihan;

        $query = "SELECT * FROM sanpham ORDER BY soluong LIMIT $batdau, $gioihan";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Tìm kiếm sản phẩm có giới hạn
    function timkiem_sp($timkiem_sp, $batdau, $gioihan)
    {
        $timkiem_sp = $this->conn->real_escape_string($timkiem_sp);
        $batdau = (int)$batdau;
        $gioihan = (int)$gioihan;

        $query = "SELECT * FROM sanpham 
                  WHERE tenSP LIKE '%$timkiem_sp%' 
                  LIMIT $batdau, $gioihan";

        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Tìm 1 sản phẩm theo id
    function find($id)
    {
        $id = (int)$id;

        $query = "SELECT * FROM sanpham
                  INNER JOIN color ON sanpham.idcolor = color.idcolor
                  INNER JOIN size ON sanpham.idsize = size.idsize
                  WHERE sanpham.idSP = $id";

        $result = $this->conn->query($query);
        if ($result) {
            return $result->fetch_assoc();
        }

        return null;
    }

    // Cập nhật sản phẩm
    function update($idSP, $idKM, $idLoaiSP, $idcolor, $idsize, $tenSP, $Dongia, $anh1, $anh2, $anh3, $ngaynhap, $mota, $soluong)
    {
        $idSP = (int)$idSP;
        $idKM = $this->conn->real_escape_string($idKM);
        $idLoaiSP = $this->conn->real_escape_string($idLoaiSP);
        $idcolor = $this->conn->real_escape_string($idcolor);
        $idsize = $this->conn->real_escape_string($idsize);
        $tenSP = $this->conn->real_escape_string($tenSP);
        $Dongia = $this->conn->real_escape_string($Dongia);
        $anh1 = $this->conn->real_escape_string($anh1);
        $anh2 = $this->conn->real_escape_string($anh2);
        $anh3 = $this->conn->real_escape_string($anh3);
        $ngaynhap = $this->conn->real_escape_string($ngaynhap);
        $mota = $this->conn->real_escape_string($mota);
        $soluong = $this->conn->real_escape_string($soluong);

        $query = "UPDATE sanpham SET 
                    idKM = '$idKM',
                    idLoaiSP = '$idLoaiSP',
                    idcolor = '$idcolor',
                    idsize = '$idsize',
                    tenSP = '$tenSP',
                    Dongia = '$Dongia',
                    anh1 = '$anh1',
                    anh2 = '$anh2',
                    anh3 = '$anh3',
                    ngaynhap = '$ngaynhap',
                    mota = '$mota',
                    soluong = '$soluong'
                  WHERE idSP = '$idSP'";

        $result = $this->conn->query($query);

        if ($result == true) {
            header('Location: ?action=sanpham');
            exit();
        }
    }

    // Thêm sản phẩm mới
    function insert($idKM, $idLoaiSP, $idcolor, $idsize, $tenSP, $Dongia, $anh1, $anh2, $anh3, $ngaynhap, $mota, $soluong)
    {
        $idKM = $this->conn->real_escape_string($idKM);
        $idLoaiSP = $this->conn->real_escape_string($idLoaiSP);
        $idcolor = $this->conn->real_escape_string($idcolor);
        $idsize = $this->conn->real_escape_string($idsize);
        $tenSP = $this->conn->real_escape_string($tenSP);
        $Dongia = $this->conn->real_escape_string($Dongia);
        $anh1 = $this->conn->real_escape_string($anh1);
        $anh2 = $this->conn->real_escape_string($anh2);
        $anh3 = $this->conn->real_escape_string($anh3);
        $ngaynhap = $this->conn->real_escape_string($ngaynhap);
        $mota = $this->conn->real_escape_string($mota);
        $soluong = $this->conn->real_escape_string($soluong);

        $query = "INSERT INTO sanpham 
                    (idKM, idLoaiSP, idcolor, idsize, tenSP, Dongia, anh1, anh2, anh3, ngaynhap, mota, soluong)
                  VALUES 
                    ('$idKM', '$idLoaiSP', '$idcolor', '$idsize', '$tenSP', '$Dongia', '$anh1', '$anh2', '$anh3', '$ngaynhap', '$mota', '$soluong')";

        $result = $this->conn->query($query);

        if ($result == true) {
            header('Location: ?action=sanpham');
            exit();
        } else {
            header('Location: ?action=them_sanpham_giaodien');
            exit();
        }
    }

    // Nếu thêm vào sản phẩm đã có thì cập nhật số lượng
    function insert_trung($idSP, $soluong_them)
    {
        $idSP = (int)$idSP;
        $soluong_them = (int)$soluong_them;

        $query = "UPDATE sanpham SET soluong = '$soluong_them' WHERE idSP = '$idSP'";
        $result = $this->conn->query($query);

        if ($result == true) {
            header('Location: ?action=sanpham');
            exit();
        } else {
            header('Location: ?action=them_sanpham_giaodien');
            exit();
        }
    }

    // Xóa sản phẩm
    function delete($id)
    {
        $id = (int)$id;

        $query = "DELETE FROM sanpham WHERE idSP = '$id'";
        $result = $this->conn->query($query);

        if ($result == true) {
            echo "<script>location.href='?action=sanpham';</script>";
        } else {
            echo "<script>location.href='?action=sanpham';</script>";
        }
    }

    // Lấy khuyến mãi
    function khuyenmai()
    {
        $query = "SELECT * FROM khuyenmai";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Lấy màu
    function mau()
    {
        $query = "SELECT * FROM color";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Lấy size
    function size()
    {
        $query = "SELECT * FROM size";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Lấy loại sản phẩm
    function loaisp()
    {
        $query = "SELECT * FROM loaisanpham";
        $result = $this->conn->query($query);

        $data = array();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Thêm số lượng sản phẩm
    public function them_soluong($idSP, $soluong_them)
    {
        $idSP = (int)$idSP;
        $soluong_them = (int)$soluong_them;

        $query = "UPDATE sanpham SET soluong = '$soluong_them' WHERE idSP = '$idSP'";
        $result = $this->conn->query($query);

        if ($result == true) {
            header('Location: ?action=sanpham');
            exit();
        } else {
            header('Location: ?action=sanpham');
            exit();
        }
    }
}
?>