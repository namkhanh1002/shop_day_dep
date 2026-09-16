<?php
$is_auth_page = in_array($_GET['action'] ?? '', ['dangnhap', 'quenmatkhau', 'laymatkhau_submit'], true);
if (isset($data_layout)) {
    foreach ($data_layout as $value) { ?>

        <?php
        $_SESSION['time'] = $value['time'];
        $_SESSION['mail_1'] = $value['mail_1'];
        $_SESSION['mail_2'] = $value['mail_2'];
        $_SESSION['phone_1'] = $value['phone_1'];
        $_SESSION['phone_2'] = $value['phone_2'];
        $_SESSION['donvi'] = $value['donvi'];
        $_SESSION['diachi'] = $value['diachi'];
        ?>

<?php }
} ?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TD Shop</title>

    <link href="public/css/bootstrap.min.css" rel="stylesheet"> <!-- bootstrap -->
    <link href="public/css/font-awesome.min.css" rel="stylesheet"> <!-- icon -->
    <link rel="stylesheet" type="text/css" href="public/css/main.css"> <!-- css -->
    <link rel="stylesheet" type="text/css" href="public/css/dangnhap.css"> <!-- css -->
    <link rel="stylesheet" type="text/css" href="public/css/style.css"> <!-- css -->
    <link rel="stylesheet" type="text/css" href="public/css/modern.css">
    <link rel="stylesheet" href="public/css/materialdesignicons.min.css"> <!-- css icon -->
    <link rel="stylesheet" href="public/css/error.css"> <!-- css trang error -->
    <link href="public/css/animate.css" rel="stylesheet"> <!-- css tự độgn -->

    <!-- JavaScript -->
    <script src="public/js/jquery.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/price-range.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/jquery.scrollUp.min.js"></script>
</head>

<body class="<?php echo $is_auth_page ? 'auth-page' : 'shop-page'; ?>">


    <?php if ($is_auth_page) { ?>
        <header class="auth-shell-header">
            <a class="auth-brand" href="?action=trangchu" aria-label="TD Shop trang chủ">
                <img src="public/image/wang.jpg" alt="TD Shop logo">
                <span>TD <small>SHOP</small></span>
            </a>
            <a class="auth-home-link" href="?action=trangchu"><i class="fa fa-arrow-left"></i> Về trang chủ</a>
        </header>
    <?php } else {
        require_once('header/header.php');
    } ?>


    <?php
    require_once('dieuhuong.php');
    ?>

    <?php if ($is_auth_page) { ?>
        <footer class="auth-shell-footer">TD Shop <span>•</span> Phong cách riêng mỗi ngày</footer>
    <?php } else {
        require_once('footer/footer.php');
    } ?>

    <?php if ($is_auth_page) { ?>
        <script>
            $(function() {
                var target = window.location.hash === '#popular' ? '#popular' : '#arrival';
                $('a[data-toggle="tab"][href="' + target + '"]').first().tab('show');
            });
        </script>
    <?php } ?>





</body>

</html>