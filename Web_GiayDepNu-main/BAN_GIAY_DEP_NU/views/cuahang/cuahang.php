<?php
$data_loaisanpham = isset($data_loaisanpham) && is_array($data_loaisanpham) ? $data_loaisanpham : [];
$color = isset($color) && is_array($color) ? $color : [];
$size = isset($size) && is_array($size) ? $size : [];
$data_sanphamcuahang = isset($data_sanphamcuahang) ? $data_sanphamcuahang : [];
?>

<div class="cuahang shop-hero">
    <span class="shop-kicker">TD SHOP / COLLECTION</span>
    <h1>Chọn đôi giày của bạn</h1>
    <p>Những thiết kế được chọn lọc cho phong cách mỗi ngày.</p>
</div>

<section id="cart_items" style="margin-top: -50px; margin-bottom: -50px;">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">HOME</a></li>
                <li class="active"> </li>
            </ol>
        </div>
    </div>
</section>

<div class="container cn2 shop-catalog">
    <div class="row">

        <div class="col-sm-3">
            <div class="left-sidebar shop-filters">
                <div class="catalog-filter-heading">
                    <span>DISCOVER</span>
                    <p>Chọn kiểu dáng phù hợp với bạn</p>
                </div>

                <h2>Thể Loại</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                    <?php foreach ($data_loaisanpham as $value) {  ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="?action=cuahang&id=<?= $value['idLoaiSP'] ?>">
                                        <?= $value['tenLSP'] ?>
                                    </a>
                                </h4>
                            </div>
                        </div>

                    <?php } ?>


                </div>

            </div>




            <div class="chongia shop-price-filter">
                <div class="catalog-filter-heading">
                    <span>REFINE RESULTS</span>
                    <p>Lọc nhanh theo màu, size và mức giá</p>
                </div>
                <div class="chongia2">

                    <div class="dropdown shop-filter-dropdown">
                        <button class="dropbtn">Màu</button>
                        <div class="dropdown-content shop-filter-menu" style="left:0;">

                            <div class="container shop-filter-options">
                                <?php foreach ($color as $value) {   ?>
                                    <div class="col-sm-2">
                                        <a href="?action=cuahang&idmau=<?= $value['idcolor'] ?>" class="acolor">
                                            <?php echo $value['color']; ?></a>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="dropdown shop-filter-dropdown">
                        <button class="dropbtn">Size</button>
                        <div class="dropdown-content shop-filter-menu" style="left:-50px;">

                            <div class="container shop-filter-options">
                                <?php foreach ($size as $value) {   ?>
                                    <div class="col-sm-2">
                                        <a href="?action=cuahang&idsize=<?= $value['idsize'] ?>" class="acolor">
                                            <?php echo $value['size']; ?></a>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>



                    <!-- giá -->
                    <br>
                    <br>


                </div>
                <h4 class="price-filter-title">Khoảng giá</h4>
                <div>

                    <form method="POST" action="?action=cuahang1">
                        <div class="" style="padding: 5px;">

                            <label>Chọn giá bắt đầu: </label>
                            <select name="a">
                                <option value="100">100.000 USD</option>
                                <option value="200">200.000 USD</option>
                                <option value="300">300.000 USD</option>
                                <option value="400">400.000 USD</option>
                                <option value="500">500.000 USD</option>
                                <option value="600">600.000 USD</option>
                                <option value="700">700.000 USD</option>
                                <option value="800">800.000 USD</option>
                                <option value="900">900.000 USD</option>
                                <option value="1000">1.000.000 USD</option>
                            </select>

                            <br>
                            <br>

                            <label>Chọn giá Kết thúc: </label>
                            <select name="b">
                                <option value="100">100.000 USD</option>
                                <option value="200">200.000 USD</option>
                                <option value="300">300.000 USD</option>
                                <option value="400">400.000 USD</option>
                                <option value="500">500.000 USD</option>
                                <option value="600">600.000 USD</option>
                                <option value="700">700.000 USD</option>
                                <option value="800">800.000 USD</option>
                                <option value="900">900.000 USD</option>
                                <option value="1000">1.000.000 USD</option>
                            </select>

                            <br>
                            <br>
                            <center>
                                <input type="submit" value="Tìm Kiếm">
                            </center>

                        </div>
                    </form>
                </div>
                <!-- giá -->
            </div>

            <br>
            <br>



        </div> <!-- div thứ 3 -->






        <div class="col-sm-9 padding-right c_cn2 shop-results">
            <!-- hiển thị sản phẩm -->

            <div class="features_items shop-product-panel"><!--features_items-->
                <div class="shop-results-head">
                    <div>
                        <span>THE COLLECTION</span>
                        <h2>TD SHOP COLLECTION</h2>
                    </div>
                    <form class="catalog-search" method="POST" action="?action=cuahang1">
                        <label class="sr-only" for="catalog-search-input">Tìm sản phẩm</label>
                        <input id="catalog-search-input" type="search" name="timkiem_sp" placeholder="Tìm tên sản phẩm...">
                        <button type="submit" aria-label="Tìm sản phẩm"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <h2 class="title text-center">TD SHOP COLLECTION</h2>

                <?php foreach ($data_sanphamcuahang as $value) { ?>

                    <div class="col-sm-3">
                        <div class="single-product shop-product-card">
                            <div class="product-f">
                                <a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>"><img src="admin/public_admin/image/sanpham/<?php echo $value['anh1'] ?>" alt="<?php echo $value['tenSP'] ?>" class="img-products" /></a>
                                <div class="actions-btn">
                                    <a href="?action=giohang&act=add_giohang&id=<?= $value['idSP'] ?>" title="Thêm vào giỏ hàng">
                                        <center><i style="font-size: 30px;color:black;" class="fa fa-shopping-cart"></i></center>
                                    </a>
                                    <a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>" data-toggle="modal">
                                        <center><i style="font-size: 20px;" class="fa fa-eye"></i></center>
                                    </a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <p><a href="?action=chitietmathang&id=<?= $value['idSP'] ?>&idLoaiSP=<?= $value['idLoaiSP'] ?>">
                                        <center> <?php echo $value['tenSP'] ?></center>
                                    </a></p>
                                <center>size: <?php echo $value['size'] ?> </center>
                                <center>Màu: <?php echo $value['color'] ?> </center>
                                <center><span class="stock-label <?php echo $value['soluong'] > 0 ? 'is-stocked' : 'is-empty'; ?>"> <?php echo $value['soluong'] > 0 ? 'Còn hàng' : 'Hết hàng'; ?> </span></center>
                                <center>Khuyến mãi: <?php echo "<b class='km_km'>" . $value['giatriKM'] . "%</b>" ?> </center>
                                <span>
                                    <center>
                                        <?php if ($value['giatriKM'] != 0) {
                                            echo " <strike><i>" . $value['Dongia'] . ".000 USD</i></strike><br> ";
                                            echo " <i class='fa fa-arrow-right'></i> ";
                                            echo $value['Dongia'] - ($value['Dongia'] * $value['giatriKM'] / 100) . ".000 USD";
                                        } else {
                                            echo "<br>";
                                            echo $value['Dongia'] . ".000 USD";
                                        }
                                        ?>
                                    </center>
                                </span>



                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div><!--features_items-->

            <!-- 
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                    -->
        </div>


    </div> <!-- div row -->

</div>


<br>
<br>
<br>
<br>
<br>
<style>
    b.km_km {
        color: red;
    }

    strike i {
        color: black;
        font-weight: normal;
    }
</style>
