<?php
require_once('./model/dangnhap.php');

/**
 * 
 */
class dangnhap_dangky_controller
{
   var $dangnhap_dangky_model;

   function __construct()
   {
      $this->dangnhap_dangky_model = new dangnhap_dangky();
   }


   public function dangky()
   {
      $ho = filter_input(INPUT_POST, 'ho_dk');
      $ten = filter_input(INPUT_POST, 'ten_dk');
      $email = filter_input(INPUT_POST, 'email_dk');
      $diachi = filter_input(INPUT_POST, 'diachi_dk');
      $gioitinh = filter_input(INPUT_POST, 'gioitinh_dk');
      $sodienthoai = filter_input(INPUT_POST, 'sdt_dk');

      $tendangnhap = filter_input(INPUT_POST, 'tendangnhap_dk');
      $mk_dk = filter_input(INPUT_POST, 'matkhau_dk');
      $matkhau = $mk_dk;

      $this->dangnhap_dangky_model->dangky_model($ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap, $matkhau);
   }

   public function dangnhap()
   {
      $tendangnhap = filter_input(INPUT_POST, 'tendangnhap_dn');
      $mk_dn = filter_input(INPUT_POST, 'matkhau_dn');
      $matkhau = $mk_dn;

      $this->dangnhap_dangky_model->dangnhap_model($tendangnhap, $matkhau);
   }

   public function dangxuat()
   {
      if (isset($_SESSION['tendangnhap'])) {
         unset($_SESSION['idUser'], $_SESSION['tendangnhap'], $_SESSION['admin'], $_SESSION['banhang'], $_SESSION['matkhau'], $_SESSION['thoigian_bd']);
      }
      header('Location: ?action=trangchu');
      exit;
   }

   public function taikhoan()
   {

      if (!isset($_SESSION['tendangnhap'])) {
         header('Location: ?action=dangnhap');
         exit;
      }

      $data_loaisanpham = $this->dangnhap_dangky_model->loaisanpham();
      $tendangnhap = $_SESSION['tendangnhap'];
      $data_taikhoan = $this->dangnhap_dangky_model->taikhoan($tendangnhap);

      // sửa mật khẩu

      $mk_nhap = filter_input(INPUT_POST, 'matkhau');
      $mk_moi = filter_input(INPUT_POST, 'matkhaumoi');

      $idUser  = filter_input(INPUT_POST, 'idUser');

      // chỗ nàu cho hiện m$loi       echo $data_taikhoan['ten'];

      $mess = null;
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mk_nhap !== null) {
         if (!is_array($data_taikhoan) || !password_verify($mk_nhap, $data_taikhoan['matkhau'])) {
            $mess = false;
         } else {
            $mess = true;
            $result = $this->dangnhap_dangky_model->suamk($idUser, $mk_moi);
            if (!$result) {
               $mess = 'error';
            }
         }
      }




      require_once('views/index.php');
   }


   public function suataikhoan()
   {
      $ho = filter_input(INPUT_POST, 'ho');
      $ten = filter_input(INPUT_POST, 'ten');
      $email = filter_input(INPUT_POST, 'email');
      $diachi = filter_input(INPUT_POST, 'diachi');
      $gioitinh = filter_input(INPUT_POST, 'gioitinh');
      $sodienthoai = filter_input(INPUT_POST, 'sodienthoai');
      $tendangnhap = filter_input(INPUT_POST, 'tendangnhap');
      $matkhau = filter_input(INPUT_POST, 'matkhau');

      $idUser = filter_input(INPUT_POST, 'idUser');

      $this->dangnhap_dangky_model->suataikhoan($idUser, $ho, $ten, $email, $diachi, $gioitinh, $sodienthoai, $tendangnhap);
      exit;

      require_once('views/index.php');
   }
}
