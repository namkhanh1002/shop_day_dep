<?php
//    require_once('views/index.php');    gọi câu mới xuất hiện giao diện được

require_once('./model/hoanthanhdonhang.php');

/**
 * 
 */
class hoanthanhdonhang
{
    var $hoanthanhdonhang_controller;

    function __construct()
    {
        $this->hoanthanhdonhang_controller = new hoanthanh_donhang();
    }

    public function list()
    {
        if (!isset($_SESSION['tendangnhap'])) {
            header('location: ?action=dangnhap');
            exit;
        }

        if (empty($_SESSION['sanpham'])) {
            header('Location: ?action=giohang&act=list');
            exit;
        }

        $tendangnhap = $_SESSION['tendangnhap'];
        $data_user = $this->hoanthanhdonhang_controller->chitiet_donhang($tendangnhap);
        if (!$data_user) {
            header('Location: ?action=dangxuat');
            exit;
        }
        $idUser = $data_user['idUser'];
        $data_loaisanpham = $this->hoanthanhdonhang_controller->loaisanpham();

        if (!isset($_SESSION['donhang_da_tao'])) {
            foreach ($_SESSION['sanpham'] as $key => $value) {
                $idSP = $value['idSP'];
                $tongtien = $value['Dongia'] * $value['soluong'];
                $giatriKM = (float) ($_SESSION['giatriKM'] ?? 0);
                $tongtien = $tongtien - ($tongtien * $giatriKM / 100);
                $soluongmua = $value['soluong'];

                $ngaymua = date("Y-m-d");

                $this->hoanthanhdonhang_controller->gui_donhang_choadmin($idUser, $idSP, $tongtien, $soluongmua, $ngaymua);
                $this->hoanthanhdonhang_controller->cap_nhat_ton_kho($idSP, $soluongmua);
            }
            $_SESSION['donhang_da_tao'] = true;
        }

        require_once('views/index.php');
    }

    public function huy_session()
    {
        if (isset($_SESSION['sanpham'])) {
            unset($_SESSION['sanpham']);
            unset($_SESSION['ma_giam_gia']);
            unset($_SESSION['giatriKM']);      // thêm  để hủy sesion
            unset($_SESSION['tongtien_KM']);   // thêm  để hủy sesion
            unset($_SESSION['tongtien']);         // thêm  để hủy sesion
            unset($_SESSION['donhang_da_tao']);
            echo "<script language='javascript'>";
            echo "location.href='?action=trangchu';</script>";
        }
    }
}
