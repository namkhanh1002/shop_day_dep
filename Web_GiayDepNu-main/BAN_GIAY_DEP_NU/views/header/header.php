  <div class="header-middle"><!--header-middle-->

    <div class="row row_header">



      <div class="col-sm-6" style="color: gray;">
        <div class="dropdown" style="float:left;">
          <button class="dropbtnn">TD Shop <i class="fa fa-caret-down"></i></button>
          <i class="fa fa-caret-down"></i>
          <div class="dropdown-content" style="left:0;">
            <a href="?action=gioithieu">Giới thiệu cửa hàng</a>
            <a href="#lienhe">Thông tin liên hệ</a>
            <a href="#">Gửi phản hồi</a>
          </div>
        </div>
        <div class="shop-contact-info">
          <span class="kedoc">|</span>
          <span><b>Open:</b> <?php echo $_SESSION['time'] ?? ''; ?></span>
          <span><b>Mail:</b> <?php echo $_SESSION['mail_1'] ?? ''; ?></span>
          <span><b>Phone:</b> (+84) <?php echo $_SESSION['phone_1'] ?? ''; ?></span>
        </div>
      </div>



      <div class="col-sm-6">
        <div class="shop-menu pull-right">
          <ul class="nav navbar-nav">

            <li>
              <div class="dropdown22 account-menu" tabindex="0">
                <i class="fa fa-user img_user" title="Tài Khoản">


                  <?php if (isset($_SESSION['tendangnhap'])) {

                    echo 'Chào ' . $_SESSION['tendangnhap'];
                  } else {
                    echo '&emsp;Đăng nhập / Đăng ký';
                  }
                  ?>



                </i>
                <div class="dropdown-content22">
                  <!-- <a class="aacount" href="#"><center><span>Đăng nhập</span></center></a>-->
                  <ul>
                    <?php if (isset($_SESSION['tendangnhap'])) { ?>
                      <li></li>
                      <li><a class="aacount" href="?action=donhangcuatoi"><i class="fa fa-list-alt"></i><span>Đơn hàng của tôi</span></a></li>
                      <li><a class="aacount" style="margin-left: -40px;" href="?action=taikhoan&ten=<?php echo $_SESSION['tendangnhap']; ?>"><span>Tài khoản</span></a></li><br>
                      <li><a class="aacount" href="?action=dangxuat" onclick="TBdangxuat()"><span>Đăng xuất</span></a></li>

                      <?php if (($_SESSION['admin'] ?? false) || ($_SESSION['banhang'] ?? false)) { ?>
                        <li>
                          <a class="aacount" href="admin/?action=trangchu"><span>Trang quản lý</span></a>
                        </li>
                      <?php }
                    } else { ?>
                      <li><b class="hd_kh">Tài khoản TD Shop</b></li>
                      <li><a class="aacount" href="?action=dangnhap#arrival"><i class="fa fa-sign-in"></i><span>Đăng nhập</span></a></li>
                      <li><a class="aacount" href="?action=dangnhap#popular"><i class="fa fa-user-plus"></i><span>Đăng ký</span></a></li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>



    </div>



  </div>




  <div class="header-bottom"><!--header-bottom-->
    <div class="container">
      <div class="row">
        <div class="col-sm-8 header-nav-column">

          <div class="mainmenuu pull-left">
            <ul class="nav navbar-nav collapse navbar-collapse">


              <li><a href="?action=trangchu" class="active">
                  <div class="btn-group">
                    <img src="public/image/wang.jpg" alt="TD Shop logo" title="Về trang chủ">
                    <span class="brand-wordmark">TD <small>SHOP</small></span>
                  </div>
                </a></li>
              <li class="dropdown"><a href="?action=cuahang1">Cửa Hàng</a></li>

              <!-- lấy action là id loại sản phẩm -->

              <li class="catalog-nav">
                <a href="?action=cuahang1">Danh mục <i class="fa fa-angle-down"></i></a>
                <ul class="catalog-nav-menu">
              <?php if (isset($data_loaisanpham)) {
                foreach ($data_loaisanpham as $value) {  ?>
                  <li class="dropdown"><a href="?action=cuahang&id=<?= $value['idLoaiSP'] ?>" style="font-size: 15px;"><?= $value['tenLSP'] ?></a></li>
              <?php }
              } ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <form method="POST" action="?action=cuahang1">
          <div class="col-sm-4 header-actions-column">
            <div class="search_box pull-right">


              <input type="text" placeholder="Search By Name" name="timkiem_sp">&ensp;
              <button type="submit"><i class="fa fa-search"></i></button>

              <?php if (isset($_SESSION['tendangnhap'])) { ?>
                <a class="order-quick-link" href="?action=donhangcuatoi" title="Đơn hàng của tôi">
                  <i class="fa fa-truck"></i><span>Đơn hàng</span>
                </a>
              <?php } ?>

              <?php $cart_count = 0;
              foreach (($_SESSION['sanpham'] ?? []) as $cart_item) {
                $cart_count += (int) ($cart_item['soluong'] ?? 0);
              } ?>
              <a id="a1" href="?action=giohang&act=list" aria-label="Giỏ hàng">
                <i class="fa fa-shopping-cart" title="Giỏ Hàng Của Bạn"></i><span class="cart-count"><?php echo $cart_count; ?></span>
              </a>

            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- end header bottom -->

  <!-- /header -->


  <script>
    function TBdangxuat() {
      alert("Bạn muốn đăng xuất?");
    }

    document.addEventListener('DOMContentLoaded', function() {
      var accountMenu = document.querySelector('.account-menu');
      if (!accountMenu) return;

      var trigger = accountMenu.querySelector(':scope > .img_user');
      if (trigger) {
        trigger.addEventListener('click', function(event) {
          event.preventDefault();
          event.stopPropagation();
          accountMenu.classList.toggle('is-open');
        });
      }

      document.addEventListener('click', function(event) {
        if (!accountMenu.contains(event.target)) {
          accountMenu.classList.remove('is-open');
        }
      });
    });
  </script>
