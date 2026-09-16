<?php
require_once('./model/giohang.php');

/**
 * 
 */
class giohang_controller
{
    var $giohang_controller;

    function __construct()
    {
        $this->giohang_controller = new giohang();
    }
    public function list_giohang()    // okie
    {
        $data_loaisanpham = $this->giohang_controller->loaisanpham();
        $count = 0;
        if (isset($_SESSION['sanpham'])) {
            foreach ($_SESSION['sanpham'] as $value) {
                $count += $value['soluong'];
            }
        }
        require_once('views/index.php');
    }





    function add_giohang()
    {
        $id = $_GET['id'];
        $data = $this->giohang_controller->chitiet_sp($id);

        if (!$data) {
            header('Location:?action=cuahang');
            exit;
        }

        if ($data['soluong'] <= 0) {
            header('Location:?action=cuahang&error=het_hang');
            exit;
        }

        $count = 0;
        if (isset($_SESSION['sanpham'][$id])) {
            $arr = $_SESSION['sanpham'][$id];
            if ($arr['soluong'] >= $data['soluong']) {
                header('Location:?action=giohang&act=list_giohang&error=vuot_ton_kho');
                exit;
            }
            $arr['soluong'] = $arr['soluong'] + 1;
            $arr['soluong_kho'] = $data['soluong'] - $arr['soluong'];
            $arr['thanhtien'] = $arr['soluong'] * $arr["Dongia"];
            $_SESSION['sanpham'][$id] = $arr;
        } else {
            $arr['idSP'] = $data['idSP'];
            $arr['tenSP'] = $data['tenSP'];
            $arr['Dongia'] = $data['Dongia'];
            $arr['soluong'] = 1;
            $arr['soluong_kho'] = $data['soluong'] - 1;
            $arr['thanhtien'] = $data['Dongia'];
            $arr['anh1'] = $data['anh1'];
            $_SESSION['sanpham'][$id] = $arr;
        }

        foreach ($_SESSION['sanpham'] as $value) {
            $count += $value['thanhtien'];
        }

        header('Location:?action=giohang&act=list_giohang');
        exit;
    }











    function update_giohang()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id || !isset($_SESSION['sanpham'][$id])) {
            header('Location:?action=giohang&act=list');
            exit;
        }
        $arr = $_SESSION['sanpham'][$id];
        $data = $this->giohang_controller->chitiet_sp($id);

        if (!$data) {
            unset($_SESSION['sanpham'][$id]);
            header('Location:?action=giohang&act=list');
            exit;
        }

        if ($arr['soluong'] >= $data['soluong']) {
            header('Location:?action=giohang&act=list_giohang&error=vuot_ton_kho');
            exit;
        }

        $arr['soluong'] = $arr['soluong'] + 1;
        $arr['soluong_kho'] = $data['soluong'] - $arr['soluong'];
        $arr['thanhtien'] = $arr['soluong'] * $arr["Dongia"];
        $_SESSION['sanpham'][$id] = $arr;
        header('Location:?action=giohang&act=list_giohang');
        exit;
    }

    function update_giohang_tru()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id || !isset($_SESSION['sanpham'][$id])) {
            header('Location:?action=giohang&act=list');
            exit;
        }
        $arr = $_SESSION['sanpham'][$id];
        $arr['soluong'] = $arr['soluong'] - 1;
        $arr['soluong_kho'] = $arr['soluong_kho'] + 1;
        $arr['thanhtien'] = $arr['soluong'] * $arr["Dongia"];

        if ($arr['soluong'] <= 0) {
            unset($_SESSION['sanpham'][$id]);
        } else {
            $_SESSION['sanpham'][$id] = $arr;
        }
        header('Location:?action=giohang&act=list_giohang');
        exit;
    }










    /// Xóa giỏ hàng

    function delete_cart()      //okie
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id || !isset($_SESSION['sanpham'][$id])) {
            header('Location: ?action=giohang&act=list');
            exit;
        }
        $arr = $_SESSION['sanpham'][$id];
        if ($arr['soluong'] == 1) {
            unset($_SESSION['sanpham'][$id]);
        } else {
            $arr['soluong'] = $arr['soluong'] - 1;
            $arr['thanhtien'] = $arr['soluong'] * $arr["Dongia"];
            $_SESSION['sanpham'][$id] = $arr;
        }
        header('Location: ?action=giohang&act=list_giohang');
        exit;
    }



    function deleteall_cart()       // okie
    {
        unset($_SESSION['sanpham']);
        unset($_SESSION['thanhtien']);  // thêm  để hủy sesion
        unset($_SESSION['tongtien']);      // thêm  để hủy sesion
        unset($_SESSION['giatriKM'], $_SESSION['ma_giam_gia'], $_SESSION['tongtien_KM'], $_SESSION['donhang_da_tao']);
        header('Location: ?action=giohang&act=list_giohang');
        exit;
    }
}
