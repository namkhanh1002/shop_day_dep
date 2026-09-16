<section class="order-page">
    <div class="order-page__hero">
        <span>MY ORDERS</span>
        <h1>Đơn hàng của tôi</h1>
        <p>Theo dõi trạng thái và xem lại từng sản phẩm bạn đã đặt.</p>
    </div>

    <div class="container order-page__content">
        <?php if (empty($data_donhang)) { ?>
            <div class="order-empty">
                <i class="fa fa-shopping-bag"></i>
                <h2>Bạn chưa có đơn hàng nào</h2>
                <p>Hãy khám phá bộ sưu tập để chọn đôi giày yêu thích.</p>
                <a class="btn" href="?action=cuahang1">Khám phá cửa hàng</a>
            </div>
        <?php } else { ?>
            <div class="order-page__head">
                <div><span>ORDER HISTORY</span><h2>Lịch sử mua sắm</h2></div>
                <p><?php echo count($data_donhang); ?> đơn hàng</p>
            </div>
            <div class="order-list">
                <?php foreach ($data_donhang as $donhang) { ?>
                    <article class="order-card">
                        <img src="admin/public_admin/image/sanpham/<?php echo htmlspecialchars($donhang['anh1'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($donhang['tenSP'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="order-card__product">
                            <span class="order-id">Đơn #<?php echo $donhang['idhoadon']; ?></span>
                            <h3><?php echo htmlspecialchars($donhang['tenSP'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p>Ngày đặt: <?php echo htmlspecialchars($donhang['ngaymua'], ENT_QUOTES, 'UTF-8'); ?> · SL: <?php echo (int) $donhang['soluongmua']; ?></p>
                        </div>
                        <div class="order-card__status">
                            <span class="order-status <?php echo (int) $donhang['trangthai'] === 1 ? 'is-approved' : 'is-pending'; ?>">
                                <i class="fa <?php echo (int) $donhang['trangthai'] === 1 ? 'fa-check' : 'fa-clock-o'; ?>"></i>
                                <?php echo (int) $donhang['trangthai'] === 1 ? 'Đã xác nhận' : 'Chờ xác nhận'; ?>
                            </span>
                            <strong><?php echo $donhang['tongtien']; ?>.000 USD</strong>
                        </div>
                        <a class="order-card__link" href="?action=chitietdonhang&id=<?php echo $donhang['idhoadon']; ?>">Chi tiết <i class="fa fa-arrow-right"></i></a>
                    </article>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
