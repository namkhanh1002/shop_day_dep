<?php
require_once('./model/donhang.php');

class donhang_controller
{
    var $donhang_model;

    function __construct()
    {
        $this->donhang_model = new donhang();
    }

    private function require_login()
    {
        if (!isset($_SESSION['tendangnhap'], $_SESSION['idUser'])) {
            header('Location: ?action=dangnhap');
            exit;
        }
    }

    public function danh_sach()
    {
        $this->require_login();
        $data_loaisanpham = $this->donhang_model->loaisanpham();
        $data_donhang = $this->donhang_model->danhsach_cua_user((int) $_SESSION['idUser']);
        require_once('views/index.php');
    }

    public function chi_tiet()
    {
        $this->require_login();
        $idhoadon = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$idhoadon) {
            header('Location: ?action=donhangcuatoi');
            exit;
        }

        $data_loaisanpham = $this->donhang_model->loaisanpham();
        $data_donhang = $this->donhang_model->chitiet_cua_user($idhoadon, (int) $_SESSION['idUser']);
        if (!$data_donhang) {
            header('Location: ?action=donhangcuatoi');
            exit;
        }
        require_once('views/index.php');
    }
}
