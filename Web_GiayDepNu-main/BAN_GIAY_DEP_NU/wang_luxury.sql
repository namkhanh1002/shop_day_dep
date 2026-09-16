-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 03:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wang_luxury`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idbanner` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idbanner`, `anh`) VALUES
(1, 'ban2.webp'),
(2, 'ban1.webp'),
(3, 'wang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idcolor`, `color`) VALUES
(1, 'đỏ'),
(2, 'vàng'),
(3, 'đen'),
(4, 'xám'),
(5, 'xanh'),
(6, 'nâu'),
(7, 'cam'),
(8, 'trắng'),
(9, 'hồng');

-- --------------------------------------------------------

--
-- Table structure for table `gopy`
--

CREATE TABLE `gopy` (
  `idgopy` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `ngaymua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `idUser`, `idSP`, `tongtien`, `trangthai`, `soluongmua`, `ngaymua`) VALUES
(20, 13, 115, 937, 1, 1, '2024-11-01'),
(22, 13, 111, 990, 1, 1, '2024-11-01'),
(24, 13, 109, 970, 1, 1, '2024-11-01'),
(25, 13, 109, 970, 1, 1, '2024-11-01'),
(26, 13, 116, 969, 1, 1, '2024-11-01'),
(27, 13, 116, 969, 1, 1, '2024-11-01'),
(29, 15, 117, 300, 1, 1, '2024-11-01'),
(30, 17, 81, 470, 1, 1, '2024-11-01'),
(31, 17, 81, 470, 1, 1, '2024-11-01'),
(32, 17, 131, 630, 1, 1, '2024-11-01'),
(33, 17, 86, 930, 1, 1, '2024-11-01'),
(34, 13, 115, 937, 0, 1, '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `idKM` int(11) NOT NULL,
  `loaiKM` varchar(255) NOT NULL,
  `giatriKM` float NOT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `ngayketthuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`idKM`, `loaiKM`, `giatriKM`, `ngaybatdau`, `ngayketthuc`) VALUES
(1, 'Không', 0, NULL, NULL),
(2, 'Sản Phẩm Mới', 20, NULL, NULL),
(3, 'Khuyến Mãi Đầu Năm', 30, NULL, NULL),
(4, 'Khuyến Mãi Cuối Năm', 30, NULL, NULL),
(5, 'Khuyến Mãi Đặc Biệt', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `mail_1` varchar(255) NOT NULL,
  `mail_2` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `donvi` varchar(255) NOT NULL,
  `phone_1` double NOT NULL,
  `phone_2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id`, `time`, `mail_1`, `mail_2`, `diachi`, `donvi`, `phone_1`, `phone_2`) VALUES
(1, '24/7', 'QuangHoangThuy@gmail.com', 'QHT@vku.udn.vn', 'HÀ NỘI', 'UNETI', 999999999, 666666666);

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoaiSP` int(11) NOT NULL,
  `tenLSP` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoaiSP`, `tenLSP`, `hinhanh`) VALUES
(1, 'Giày Thời Trang', 'trant.webp'),
(2, 'Dép Thời Trang', 'quang.webp'),
(3, 'Giày Học Sinh', 'wang.webp'),
(4, 'Dép Học Sinh', 'dquang.webp');

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `idQuyen` int(11) NOT NULL,
  `tenquyen` varchar(255) NOT NULL,
  `chitietquyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`idQuyen`, `tenquyen`, `chitietquyen`) VALUES
(1, 'admin', 'quản lý trang web'),
(2, 'banhang', 'Nhân viên bán hàng'),
(3, 'customer', 'khách hàng quen');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `idKM` int(11) NOT NULL,
  `idLoaiSP` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `Dongia` int(11) NOT NULL,
  `anh1` varchar(255) NOT NULL,
  `anh2` varchar(255) NOT NULL,
  `anh3` varchar(255) NOT NULL,
  `ngaynhap` date NOT NULL,
  `mota` varchar(255) NOT NULL,
  `soluong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `idKM`, `idLoaiSP`, `idcolor`, `idsize`, `tenSP`, `Dongia`, `anh1`, `anh2`, `anh3`, `ngaynhap`, `mota`, `soluong`) VALUES
(73, 4, 1, 2, 12, 'Luxury-01', 340, 'vàng1.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>Luxury-01</p>', 500),
(74, 2, 1, 2, 12, 'Luxury-X1', 550, 'vàng2.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>Luxury-X1</p>', 60),
(75, 2, 1, 2, 13, 'Luxury-G1', 750, 'vàng3.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>Luxury-G1</p>', 39),
(76, 2, 1, 2, 13, 'Luxury-M1', 560, 'vàng4.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>Luxury-M1</p>', 60),
(77, 3, 2, 2, 12, 'LXR-H2', 870, 'depvang1.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LXR-H2</p>', 115),
(78, 5, 1, 2, 12, 'LXR-K2', 425, 'vangg.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LXR-K2</p>', 76),
(79, 4, 2, 2, 13, 'LXR-NW', 210, 'depvang.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LXR-NW</p>', 99),
(80, 4, 2, 2, 13, 'LXR-MZ', 680, 'depvang4.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LXR-MZ</p>', 195),
(81, 4, 1, 1, 14, 'LUCCY-BR', 470, 'giaydo1.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LUCCY-BR</p>', 97),
(82, 5, 2, 1, 14, 'GBT-HF', 230, 'depdo.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>GBT-HF</p>', 67),
(83, 3, 1, 3, 19, 'BLACK-WH', 500, 'đen1.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>BLACK-WH</p>', 50),
(84, 4, 2, 3, 14, 'BAL-TC', 690, 'đen2.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>BAL-TC</p>', 69),
(85, 2, 1, 3, 14, 'TC05-RS', 500, 'giayden.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>TC05-RS</p>', 73),
(86, 4, 1, 3, 14, 'GADN-FM', 930, 'giayyden.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>GADN-FM</p>', 38),
(87, 2, 1, 8, 15, 'WITE-BLK', 1400, 'trang.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>WITE-BLK</p>', 60),
(88, 2, 1, 8, 15, 'TRG-KLF', 520, 'trang1.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>TRG-KLF</p>', 95),
(89, 3, 2, 8, 15, 'DEPWHIT', 330, 'deptrang.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>DEPWHIT</p>', 395),
(90, 3, 2, 9, 15, 'LUBAND', 450, 'hong.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LUBAND</p>', 766),
(91, 2, 2, 9, 16, 'UN-IN', 340, 'hongg.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>UN_IN</p>', 769),
(92, 1, 1, 9, 16, 'SUPER-PRT', 996, 'hongw.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>SUPER-PRT</p>', 195),
(93, 2, 1, 4, 16, 'QTW-DQ', 510, 'xam.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>QTW-DQ</p>', 95),
(94, 2, 1, 4, 16, 'SUNIC-VAN', 580, 'xam1.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p><strong>SUNIC-VAN</strong></p>', 152),
(95, 2, 1, 2, 17, 'FRC-LUBAN', 620, 'vagg.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>FRC-LUBAN</p>', 235),
(96, 5, 1, 4, 17, 'XAMCHI', 620, 'xag.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XAMCHI</p>', 295),
(97, 4, 1, 4, 17, 'XADEN', 490, 'xaam.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XEDEN</p>', 591),
(98, 2, 1, 4, 17, 'XAMVIP', 1000, 'xamt.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XAMVIP</p>', 58),
(99, 2, 1, 3, 17, 'LIMITED-V1', 990, 'đen41.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>LIMITED-V1</p>', 61),
(100, 2, 2, 7, 18, 'ORAN3', 440, 'cam42.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>ORAN3</p>', 213),
(101, 2, 2, 7, 18, 'CAMORAN', 480, 'camv42.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>CAMORAN</p>', 315),
(102, 2, 2, 7, 18, 'ORENX', 460, 'camm42.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>ORENX</p>', 152),
(103, 3, 2, 7, 18, 'CAZOM', 300, 'CAAM42.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>CAZOM</p>', 325),
(104, 4, 1, 5, 19, 'XANGOT', 740, 'XANH43.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XANGOT</p>', 156),
(105, 2, 1, 5, 19, 'XAZ43', 790, 'XAG43.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XAZ43</p>', 533),
(106, 2, 1, 5, 19, 'XDEF43', 870, 'XAC43.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XDEF43</p>', 651),
(107, 3, 2, 5, 19, 'XADE4', 740, 'XADE43.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XADE4</p>', 265),
(108, 2, 1, 6, 20, 'NAUV', 510, 'NAU44.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>NAUV</p>', 345),
(109, 1, 1, 6, 20, 'WANGDIOR', 970, 'DIOR44.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>WANGDIOR</p>', 449),
(110, 2, 2, 6, 20, 'NAUX44', 650, 'NAUX44.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>NAUX44</p>', 465),
(111, 1, 1, 3, 20, 'WANGYSSL', 990, 'YSL.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>WANGYSSL</p>', 85),
(112, 2, 2, 6, 21, 'NAUU45', 720, 'NAUU45.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>NAUU45</p>', 645),
(113, 2, 1, 1, 21, 'DO45', 890, 'N45.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>DO45</p>', 578),
(114, 4, 2, 1, 21, 'DOHOA45', 890, 'DO45M.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>DOHOA45</p>', 590),
(115, 1, 2, 1, 21, 'WANGRY7', 937, 'W45.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>WANGRY7</p>', 67),
(116, 1, 1, 8, 21, 'WANGV1P', 969, 'VIP.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>WANGV1P</p>', 66),
(117, 2, 3, 8, 11, 'BOUT', 300, 'HST.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>BOUT</p>', 155),
(118, 3, 3, 3, 11, 'VAND', 290, 'VAND.png', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>VAND</p>', 645),
(119, 4, 3, 8, 11, 'YEDA', 230, 'YEDA.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>YEDA</p>', 262),
(120, 3, 3, 8, 11, 'RD7663', 250, 'RD7663.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>RD7663</p>', 654),
(121, 4, 3, 1, 10, 'VAN34', 350, 'VAN.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>VAN34</p>', 659),
(122, 4, 4, 3, 10, 'DC34', 350, 'DC34.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>DC34</p>', 465),
(123, 3, 3, 9, 10, 'HONG34', 570, 'HONG34.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>HONG34</p>', 151),
(125, 2, 3, 8, 9, 'NY33', 650, 'NY33.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>NY33</p>', 345),
(126, 2, 3, 3, 9, 'FASSION', 660, 'FAS33.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>FASSION</p>', 156),
(127, 2, 3, 8, 9, 'STORE33', 450, 'STORE32.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>STORE33</p>', 154),
(128, 3, 3, 9, 9, 'MCA33', 650, 'MCA33.png', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>MCA33</p>', 152),
(129, 2, 3, 4, 8, 'XAM32', 260, 'XAM32.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XAM32</p>', 152),
(130, 3, 3, 1, 8, 'VDO32', 360, 'VDO32.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>VDO32</p>', 365),
(131, 3, 3, 8, 7, 'FFIFA31', 630, 'FFIA31.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>FFIFA31</p>', 164),
(132, 2, 3, 3, 7, 'BA31', 310, 'BA32.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>BA31</p>', 331),
(133, 2, 4, 3, 6, 'CS30', 300, 'CS30.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>CS30</p>', 150),
(134, 3, 4, 3, 6, 'CC30', 360, 'CC30.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>CC30</p>', 455),
(135, 3, 4, 9, 5, 'FV29', 290, 'FV29.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>FV29</p>', 150),
(136, 3, 4, 9, 5, 'STAR29', 260, 'STAR29.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>STAR29</p>', 650),
(137, 2, 4, 8, 4, 'VAN28', 290, 'van28.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>VAN28</p>', 290),
(138, 2, 4, 5, 4, 'XANH28', 280, 'XAN28.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>XANH28</p>', 260),
(139, 4, 4, 8, 3, 'KT27', 270, 'KT27.webp', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>KT27</p>', 150),
(140, 2, 4, 7, 2, 'KCAM26', 560, 'KCAM26.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>KCAM26</p>', 650),
(141, 4, 4, 2, 1, 'KANGHAI', 380, 'KANG35.jpg', 'trant.webp', 'w1.jpg', '2024-11-01', '<p>KANGHAI</p>', 156);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `idsize` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`idsize`, `size`) VALUES
(1, 25),
(2, 26),
(3, 27),
(4, 28),
(5, 29),
(6, 30),
(7, 31),
(8, 32),
(9, 33),
(10, 34),
(11, 35),
(12, 36),
(13, 37),
(14, 38),
(15, 39),
(16, 40),
(17, 41),
(18, 42),
(19, 43),
(20, 44),
(21, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `ho` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `tendangnhap` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `idQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `ho`, `ten`, `email`, `diachi`, `gioitinh`, `sodienthoai`, `tendangnhap`, `matkhau`, `idQuyen`) VALUES
(13, 'Trần Đăng', 'Quang', 'quang@gmail.com', 'Hà Nội', 'Nam', '0666666666', 'quang', '202cb962ac59075b964b07152d234b70', 1),
(15, 'Nghĩa', 'Hoàng', 'hoang@gmail.com', 'Hà Nội', 'nam', '0333333333', 'hoang', '202cb962ac59075b964b07152d234b70', 2),
(16, 'ADMIN', 'WANG LUXURY', 'admin@gmail.com', 'Hà Nội', 'nam', '0999999999', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(17, 'Tạ', 'Thúy', 'thuy@gmail.com', 'Hà Nội', 'Nữ', '0222222222', 'thuy', '202cb962ac59075b964b07152d234b70', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indexes for table `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`idgopy`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`idKM`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLoaiSP`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`idQuyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idLoaiSP` (`idLoaiSP`),
  ADD KEY `idKM` (`idKM`),
  ADD KEY `idcolor` (`idcolor`),
  ADD KEY `idsize` (`idsize`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idsize`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idQuyen` (`idQuyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gopy`
--
ALTER TABLE `gopy`
  MODIFY `idgopy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `idKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `idQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaiSP`) REFERENCES `loaisanpham` (`idLoaiSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`idsize`) REFERENCES `size` (`idsize`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`idcolor`) REFERENCES `color` (`idcolor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`idKM`) REFERENCES `khuyenmai` (`idKM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_CHARACTER_SET_CLIENT */;
