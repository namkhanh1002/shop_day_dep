<?php
$data_loaisanpham = isset($data_loaisanpham) && is_array($data_loaisanpham) ? $data_loaisanpham : [];
$data_sanphamtrangchu = isset($data_sanphamtrangchu) && is_array($data_sanphamtrangchu) ? $data_sanphamtrangchu : [];
require_once('./views/slider/slider.php');
?>

<section class="home-intro" aria-label="TD Shop">
    <div class="home-intro__inner">
        <span class="home-eyebrow">TD SHOP / CURATED FOR YOU</span>
        <h2>Mỗi bước chân, một dấu ấn riêng</h2>
        <p>Khám phá những thiết kế được chọn lọc cho phong cách tự tin và thanh lịch mỗi ngày.</p>
    </div>
    <div class="home-benefits">
        <div><i class="fa fa-diamond"></i><span>Chọn lọc tinh tế<small>Thiết kế dẫn đầu xu hướng</small></span></div>
        <div><i class="fa fa-truck"></i><span>Giao hàng nhanh<small>Đóng gói chỉn chu, an toàn</small></span></div>
        <div><i class="fa fa-heart-o"></i><span>Hỗ trợ tận tâm<small>Đồng hành cùng phong cách của bạn</small></span></div>
    </div>
</section>

<section class="home-category-section">
    <div class="home-section-heading">
        <span>SHOP BY STYLE</span>
        <h2>Chọn phong cách yêu thích</h2>
        <p>Tìm đôi giày hoàn thiện diện mạo của bạn.</p>
    </div>
<div class="home-categories">

    <?php foreach ($data_loaisanpham as $value) {  ?>

        <div class="col-sm-3">
            <div class="single-product home-category-card">
                <div class="product-f">
                    <a href="?action=cuahang&id=<?php echo $value['idLoaiSP'] ?>">
                        <img src="admin/public_admin/image/loaisanpham/<?php echo $value['hinhanh'] ?>" alt="<?php echo $value['tenLSP'] ?>">
                    </a>
                    <div class="actions-btnn">
                        <span><?php echo $value['tenLSP'] ?></span><i class="fa fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>

    <?php }  ?>

</div>
</section>





<section class="khuyenmai home-promo">
    <div class="col-sm-12">
        <h2>Khuyến Mãi Hấp Dẫn Lên Đến 50%</h2>
        <center><button type="button" class="btn btn-outline-warning"><a href="?action=cuahang&gtkm=30">Mua Ngay</a></button> </center>
    </div>

</section>











<section class="home-featured-section">
<div class="container cn2">
    <div class="row">



        <div class="col-sm-12 c_cn2">
            <!-- hiển thị sản phẩm -->

            <div class="features_items"><!--features_items-->

                <h2 class="title text-left" id="makm">SẢN PHẨM NỔI BẬT
                    <a href="?action=cuahang1" class="pull-right" id="textid">Xem tất cả >></a>
                </h2>

                <?php foreach ($data_sanphamtrangchu as $value) {  ?>

                    <div class="col-sm-3">
                        <div class="single-product home-product-card">
                            <div class="product-f">
                                <a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>"><img src="admin/public_admin/image/sanpham/<?php echo $value['anh1'] ?>" alt="<?php echo $value['tenSP'] ?>" class="img-products" /></a>
                                <div class="actions-btn">
                                    <a href="?action=giohang&act=add_giohang&id=<?= $value['idSP'] ?>"><i style="font-size: 25px; text-align: center;" class="fa fa-shopping-cart"></i></a>
                                    <a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>" data-toggle="modal"><i style="font-size: 25px; text-align: center;" class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <p><a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>">
                                        <center> <?php echo $value['tenSP'] ?> </center>
                                    </a></p>
                                <span>
                                    <center><?php echo $value['Dongia'] . ".000 USD" ?></center>
                                </span>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>


            <a href="?action=cuahang1">
                <button type="button" class="btn btn-secondary btn-lg btn-block">Xem thêm nhiều sản phẩm hơn</button>
            </a>








        </div>


    </div> <!-- div row -->
</div> <!-- div container -->
</section>




<!-- ?php>// require_once('./views/sanphammoinhat/sanphammoinhat.php');  ?>  -->
