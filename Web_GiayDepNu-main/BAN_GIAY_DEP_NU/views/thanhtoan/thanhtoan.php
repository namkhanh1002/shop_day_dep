<?php
$view_user = [];
if (isset($data_user) && is_array($data_user)) {
	$view_user = $data_user;
}
$data_user = array_merge([
	'idUser' => '',
	'ho' => '',
	'ten' => '',
	'email' => '',
	'sodienthoai' => '',
	'diachi' => ''
], $view_user);
?>

<!-- trang checkout -->


<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Thanh Toán</h2>
				</div>
			</div>
		</div>
	</div>
</div>



<section id="cart_items" style="margin-top: -50px; margin-bottom: -50px;">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
	</div>
</section>



<section class="pages checkout section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="main-input single-cart-form padding60">
					<div class="log-title">
						<h3><strong>Chi tiết hóa đơn</strong></h3>
					</div>
					<div class="custom-input">
						<form action="?action=hoanthanhdonhang&idUser=<?php echo $data_user['idUser']; ?>" method="post">
							<input type="text" name="NguoiNhan" placeholder="Người nhận" required value="<?php echo $data_user['ho'] . ' ' . $data_user['ten']; ?>" />
							<input type="email" name="Email" placeholder="Địa chỉ Email.." required value="<?php echo $data_user['email']; ?>" />
							<input type="text" name="SDT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10" value="<?php echo $data_user['sodienthoai']; ?>" />
							<input type="text" name="DiaChi" placeholder="Đại chỉ giao hàng" required value="<?php echo $data_user['diachi']; ?>" />
							<br>
							<div class="submit-text">
								<button type="submit">Thanh toán</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="padding60">
					<div class="log-title">
						<h3><strong>Hóa đơn</strong></h3>
					</div>
					<div class="cart-form-text pay-details table-responsive">
						<div class="coupon-box">
							<div class="coupon-box__heading">
								<i class="fa fa-ticket"></i>
								<div><strong>Mã giảm giá</strong><small>Nhập mã TD + mã chương trình, ví dụ: TD3</small></div>
							</div>
							<form class="coupon-form" method="post" action="?action=thanhtoan">
								<input type="text" name="coupon_code" placeholder="Nhập mã giảm giá" value="<?php echo isset($_SESSION['ma_giam_gia']['code']) ? htmlspecialchars($_SESSION['ma_giam_gia']['code'], ENT_QUOTES, 'UTF-8') : ''; ?>" autocomplete="off">
								<button type="submit" name="apply_coupon" value="1">Áp dụng</button>
							</form>
							<?php if (!empty($coupon_message)) { ?>
								<p class="coupon-message is-<?php echo $coupon_message['type']; ?>"><?php echo htmlspecialchars($coupon_message['text'], ENT_QUOTES, 'UTF-8'); ?></p>
							<?php } ?>
							<?php if (isset($_SESSION['ma_giam_gia'])) { ?>
								<div class="coupon-active"><span><i class="fa fa-check"></i> <?php echo htmlspecialchars($_SESSION['ma_giam_gia']['code'], ENT_QUOTES, 'UTF-8'); ?> · -<?php echo (float) $_SESSION['ma_giam_gia']['discount']; ?>%</span><a href="?action=thanhtoan&remove_coupon=1">Bỏ mã</a></div>
							<?php } ?>
						</div>
						<table>
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<td>Thành Tiền</td>
								</tr>
							</thead>
							<tbody>

								<tr>
									<th><?php foreach (($_SESSION['sanpham'] ?? []) as $key => $value) { ?>
											<?php echo $value['tenSP']; ?>
											<?php echo "SL: " . $value['soluong'] . '<br>'; ?>
										<?php } ?>
									</th>
									<td>
										<?php echo ($_SESSION['tongtien'] ?? 0) . '.000 USD<br>'; ?>
									</td>
								</tr>

								<tr>
									<th>Giảm Giá</th> <!-- lấy a trên địa chỉ rồi inner join với bảng khuyễn mã để lấy giá trị khuyến mãi -->
									<td><?php echo ($_SESSION['giatriKM'] ?? 0) . '%'; ?></td>
								</tr>
								<tr>
									<th>Vat</th>
									<td>0 VNĐ</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Tổng</th>
									<td>
										<?php
										if (($_SESSION['giatriKM'] ?? 0) != 0) {
											$_SESSION['tongtien_KM'] = ($_SESSION['tongtien'] ?? 0) - (($_SESSION['tongtien'] ?? 0) * ($_SESSION['giatriKM'] ?? 0) / 100);
											echo $_SESSION['tongtien_KM'];
										} else {
											echo $_SESSION['tongtien'] ?? 0;
										}
										?>.000 VNĐ
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
