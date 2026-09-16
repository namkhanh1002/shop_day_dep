<?php
//    require_once('views/index.php');    gọi câu mới xuất hiện giao diện được

require_once('./model/show_thanhtoan.php');

/**
 * 
 */
class showthanhtoan
{
    var $thanhtoan_controller;

    function __construct()
    {
        $this->thanhtoan_controller = new thanhtoan();
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

        $data_user = $this->thanhtoan_controller->chitiet_donhang($tendangnhap);

        $data_loaisanpham = $this->thanhtoan_controller->loaisanpham();

        $data_sanpham = array();
        $coupon_message = null;
        $default_discount = 0;
        if (isset($_SESSION['sanpham']) && $_SESSION['sanpham']) {
            $first_product = reset($_SESSION['sanpham']);
            $default_discount = $this->thanhtoan_controller->giatri_khuyenmai($first_product['idSP']);
        }

        if (isset($_GET['remove_coupon'])) {
            unset($_SESSION['ma_giam_gia']);
            $coupon_message = ['type' => 'info', 'text' => 'Đã bỏ mã giảm giá.'];
        }

        if (isset($_POST['apply_coupon'])) {
            $coupon_code = trim((string) ($_POST['coupon_code'] ?? ''));
            $coupon = $coupon_code === '' ? null : $this->thanhtoan_controller->tim_ma_giam_gia($coupon_code);

            if ($coupon) {
                $_SESSION['ma_giam_gia'] = [
                    'code' => strtoupper($coupon_code),
                    'name' => $coupon['loaiKM'],
                    'discount' => (float) $coupon['giatriKM']
                ];
                $coupon_message = ['type' => 'success', 'text' => 'Áp dụng mã giảm giá thành công.'];
            } else {
                $coupon_message = ['type' => 'error', 'text' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.'];
            }
        }

        $_SESSION['giatriKM'] = isset($_SESSION['ma_giam_gia']['discount'])
            ? (float) $_SESSION['ma_giam_gia']['discount']
            : $default_discount;

        require_once('views/index.php');
    }
}
