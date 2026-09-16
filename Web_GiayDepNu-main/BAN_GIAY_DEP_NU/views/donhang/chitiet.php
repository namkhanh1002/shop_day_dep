<section class="order-page">
    <div class="order-page__hero order-page__hero--small">
        <span>ORDER #<?php echo $data_donhang['idhoadon']; ?></span>
        <h1>Chi tiết đơn hàng</h1>
        <p>Thông tin sản phẩm và tiến trình xử lý đơn hàng của bạn.</p>
    </div>

    <div class="container order-page__content">
        <a class="order-back" href="?action=donhangcuatoi"><i class="fa fa-arrow-left"></i> Quay lại đơn hàng của tôi</a>
        <div class="order-detail-grid">
            <section class="order-detail-card">
                <span class="order-id">SẢN PHẨM ĐÃ ĐẶT</span>
                <div class="order-detail-product">
                    <img src="admin/public_admin/image/sanpham/<?php echo htmlspecialchars($data_donhang['anh1'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($data_donhang['tenSP'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div><h2><?php echo htmlspecialchars($data_donhang['tenSP'], ENT_QUOTES, 'UTF-8'); ?></h2><p>Số lượng: <?php echo (int) $data_donhang['soluongmua']; ?></p><a href="?action=chitietmathang&id=<?php echo $data_donhang['idSP']; ?>&idLoaiSP=<?php echo $data_donhang['idLoaiSP']; ?>">Xem sản phẩm</a></div>
                </div>
                <div class="order-detail-total"><span>Tổng thanh toán</span><strong><?php echo $data_donhang['tongtien']; ?>.000 USD</strong></div>
            </section>
            <aside class="order-tracking">
                <span class="order-id">THEO DÕI ĐƠN HÀNG</span>
                <h2><?php echo (int) $data_donhang['trangthai'] === 1 ? 'Đơn đã được xác nhận' : 'Đơn đang chờ xác nhận'; ?></h2>
                <p>Ngày đặt: <?php echo htmlspecialchars($data_donhang['ngaymua'], ENT_QUOTES, 'UTF-8'); ?></p>
                <ol class="tracking-steps <?php echo (int) $data_donhang['trangthai'] === 1 ? 'is-approved' : ''; ?>">
                    <li class="is-done"><i class="fa fa-check"></i><div><strong>Đặt hàng thành công</strong><small>Đơn hàng đã được ghi nhận.</small></div></li>
                    <li class="<?php echo (int) $data_donhang['trangthai'] === 1 ? 'is-done' : 'is-current'; ?>"><i class="fa <?php echo (int) $data_donhang['trangthai'] === 1 ? 'fa-check' : 'fa-clock-o'; ?>"></i><div><strong>Xác nhận đơn hàng</strong><small><?php echo (int) $data_donhang['trangthai'] === 1 ? 'Cửa hàng đã xác nhận đơn.' : 'Cửa hàng đang kiểm tra đơn.'; ?></small></div></li>
                    <li class="<?php echo (int) $data_donhang['trangthai'] === 1 ? 'is-current' : ''; ?>"><i class="fa fa-truck"></i><div><strong>Chuẩn bị giao hàng</strong><small><?php echo (int) $data_donhang['trangthai'] === 1 ? 'Đơn sẽ được chuẩn bị để giao.' : 'Cập nhật sau khi đơn được xác nhận.'; ?></small></div></li>
                </ol>
            </aside>
        </div>
    </div>
</section>
