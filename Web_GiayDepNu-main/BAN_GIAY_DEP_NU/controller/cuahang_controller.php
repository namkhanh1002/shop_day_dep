<?php
//    require_once('views/index.php');    gọi câu mới xuất hiện giao diện được

require_once('./model/show_cuahang.php');

/**
 * 
 */
class showcuahang
{
    var $cuahang_controller;

    function __construct()
    {
        $this->cuahang_controller = new cuahang();
    }

    public function list()
    {
        $data_sanphamcuahang = $this->cuahang_controller->sanpham_cuahang();
        if (isset($_GET['id'])) {
            $idLoaiSP = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            if ($idLoaiSP) {
                $data_sanphamcuahang = $this->cuahang_controller->sanpham_cuahangtheoid($idLoaiSP);
            }
        } else {
            $idLoaiSP = null;
        }
        $data_loaisanpham = $this->cuahang_controller->loaisanpham();

        $color = $this->cuahang_controller->color();

        $size = $this->cuahang_controller->size();


        if (isset($_GET['idmau'])) {
            $idmau = filter_input(INPUT_GET, 'idmau', FILTER_VALIDATE_INT);

            if ($idmau) {
                $data_sanphamcuahang = $this->cuahang_controller->chonsanpham_mau($idmau);
            }
        } else {
            $idmau = null;
        }

        if (isset($_GET['idsize'])) {
            $idsize = filter_input(INPUT_GET, 'idsize', FILTER_VALIDATE_INT);

            if ($idsize) {
                $data_sanphamcuahang = $this->cuahang_controller->chonsanpham_size($idsize);
            }
        } else {
            $idsize = null;
        }

        if (isset($_POST['a']) && isset($_POST['b'])) {
            $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_INT);
            $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_INT);

            if ($a !== false && $b !== false && $a < $b) {
                $data_sanphamcuahang = $this->cuahang_controller->chonsanpham_gia($a, $b);
            }
        } else {
            $a = null;
            $b = null;
        }


        // chọn sản phẩm có khuyến mãi
        if (isset($_GET['gtkm'])) {
            $gtkm = filter_input(INPUT_GET, 'gtkm', FILTER_VALIDATE_FLOAT);

            if ($gtkm !== false) {
                $data_sanphamcuahang = $this->cuahang_controller->chonsanpham_km($gtkm);
            }
        } else {
            $gtkm = null;
        }

        require_once('views/index.php');
    }


    public function list1()
    {
        $data_loaisanpham = $this->cuahang_controller->loaisanpham();

        $color = $this->cuahang_controller->color();
        $size = $this->cuahang_controller->size();


        if (isset($_POST['timkiem_sp'])) {
            $timkiem_sp = trim((string) filter_input(INPUT_POST, 'timkiem_sp'));
            $data_sanphamcuahang = $this->cuahang_controller->timkiem_sp($timkiem_sp);
        } else {
            $data_sanphamcuahang = $this->cuahang_controller->sanpham_cuahang();
        }

        if (isset($_POST['a']) && isset($_POST['b'])) {
            $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_INT);
            $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_INT);

            if ($a !== false && $b !== false && $a < $b) {
                $data_sanphamcuahang = $this->cuahang_controller->chonsanpham_gia($a, $b);
            }
        } else {
            $a = null;
            $b = null;
        }


        require_once('views/index.php');
    }
}
