-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2021 at 01:00 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountlogin`
--

DROP TABLE IF EXISTS `accountlogin`;
CREATE TABLE IF NOT EXISTS `accountlogin` (
  `MaAC` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` int(11) DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `MaLoaiTaiKhoan` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaAC`),
  KEY `fk_ac_ltk` (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountlogin`
--

INSERT INTO `accountlogin` (`MaAC`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `BiXoa`, `MaKhachHang`, `MaLoaiTaiKhoan`) VALUES
(1, 'admin', 'admin', 'admin', 0, 0, 2),
(2, 'nbviet', 'nbviet', 'Nguyễn Bá Việt', 0, 6, 2),
(3, 'tdhieu', 'tdhieu', 'Trương Đình Hiếu', 0, 7, 2),
(4, 'vcminh', 'vcminh', 'Vo Cong Minh', 0, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdondathang`
--

DROP TABLE IF EXISTS `chitietdondathang`;
CREATE TABLE IF NOT EXISTS `chitietdondathang` (
  `MaChiTietDonDatHang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  PRIMARY KEY (`MaChiTietDonDatHang`),
  KEY `fk_ChiTietDonDatHang_DonDatHang1_idx` (`MaDonDatHang`),
  KEY `fk_ChiTietDonDatHang_SanPham1_idx` (`MaSanPham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `MaCTHD` int(11) NOT NULL AUTO_INCREMENT,
  `TenKhachHang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenSanPham` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaGoc` double DEFAULT NULL,
  `KhuyenMai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaCuoi` double DEFAULT NULL,
  `NgayLap` date NOT NULL,
  `MaHD` int(11) DEFAULT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaCTHD`),
  KEY `fk_cthd_hd` (`MaHD`),
  KEY `fk_cthd_kh` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`MaCTHD`, `TenKhachHang`, `TenSanPham`, `SoLuong`, `GiaGoc`, `KhuyenMai`, `GiaCuoi`, `NgayLap`, `MaHD`, `MaKH`, `MaSP`) VALUES
(1, 'Nguyễn Bá Việt', 'Điện thoại oppo neo 7', 10, 500000, 'Khuyên mãi 10k', 420000, '2021-07-14', 1, 6, 4),
(2, 'Nguyễn Bá Việt', 'Điện thoại oppo neo 7', 10, 500000, 'Khuyễn mãi 50k', 420000, '2021-07-13', 1, 6, 4),
(3, 'Nguyễn Bá Việt', 'Điện thoại oppo neo 7', 10, 500000, 'khuyến mãi 20%', 420000, '2021-07-12', 1, 6, 4),
(4, 'Nguyễn Bá Việt', 'Điện thoại oppo neo 7', 10, 500000, 'khuyến mãi 50k', 420000, '2021-07-11', 1, 6, 4),
(5, 'Nguyễn Bá Việt', 'Điện thoại oppo neo 7', 10, 500000, 'Khuyến mãi 75%', 420000, '2021-07-10', 1, 6, 4),
(17, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 14, 6, 5),
(18, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 15, 6, 5),
(19, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 16, 6, 5),
(20, 'Nguyễn Bá Việt', 'Điện thoại Nokia 8000 4G', 1, 380000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 280000, '2021-07-15', 17, 6, 9),
(21, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 18, 6, 5),
(22, 'Nguyễn Bá Việt', 'Điện thoại Nokia 8000 4G', 1, 380000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 280000, '2021-07-15', 18, 6, 9),
(23, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 19, 6, 5),
(24, 'Nguyễn Bá Việt', 'Điện thoại Nokia C20', 1, 480000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 380000, '2021-07-15', 19, 6, 7),
(25, 'Nguyễn Bá Việt', 'Điện thoại Nokia 8000 4G', 1, 380000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 280000, '2021-07-15', 19, 6, 9),
(26, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-15', 20, 6, 5),
(27, 'Nguyễn Bá Việt', 'Điện thoại Nokia 5.4', 1, 160000, '', 160000, '2021-07-16', 21, 6, 4),
(28, 'Trương Đình Hiếu', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-16', 22, 7, 5),
(29, 'Trương Đình Hiếu', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-16', 23, 7, 5),
(30, 'Trương Đình Hiếu', 'Điện thoại Nokia 5.4', 2, 160000, '', 320000, '2021-07-16', 24, 7, 4),
(31, 'Trương Đình Hiếu', 'Điện thoại Nokia C20', 1, 480000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 380000, '2021-07-16', 24, 7, 7),
(32, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 1, 180000, '', 180000, '2021-07-16', 25, 6, 5),
(33, 'Nguyễn Bá Việt', 'Điện thoại Nokia C20', 1, 480000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 380000, '2021-07-16', 25, 6, 7),
(34, 'Nguyễn Bá Việt', 'Điện thoại Nokia 5.4', 1, 160000, '', 160000, '2021-07-16', 26, 6, 4),
(35, 'Nguyễn Bá Việt', 'Điện thoại Nokia 3.4', 2, 180000, '', 360000, '2021-07-16', 26, 6, 5),
(36, 'Trương Đình Hiếu', 'Điện thoại Nokia 3.4', 2, 360000, '', 360000, '2021-07-16', 27, 7, 5),
(37, 'Trương Đình Hiếu', 'Điện thoại Nokia 8000 4G', 1, 380000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 280000, '2021-07-16', 28, 7, 9),
(38, 'Trương Đình Hiếu', 'Điện thoại Nokia 6300 4G', 2, 440000, '', 440000, '2021-07-16', 28, 7, 10),
(39, 'Trương Đình Hiếu', 'Điện thoại Nokia 6300 4G', 1, 220000, '', 220000, '2021-07-16', 29, 7, 10),
(40, 'Trương Đình Hiếu', 'Điện thoại Nokia 6300 4G', 1, 220000, '', 220000, '2021-07-16', 30, 7, 10),
(41, 'Trương Đình Hiếu', 'Điện thoại Nokia 6300 4G', 1, 220000, '', 220000, '2021-07-16', 32, 7, 10),
(42, 'Trương Đình Hiếu', 'Điện thoại Nokia 5.4', 1, 160000, '', 160000, '2021-07-16', 33, 7, 4),
(43, 'Trương Đình Hiếu', 'Điện thoại Nokia 3.4', 2, 360000, '', 360000, '2021-07-16', 33, 7, 5),
(44, 'Trương Đình Hiếu', 'Điện thoại Nokia C20', 2, 960000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 1720000, '2021-07-16', 34, 7, 7),
(45, 'Trương Đình Hiếu', 'Điện thoại Nokia 8000 4G', 2, 760000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 1320000, '2021-07-16', 34, 7, 9),
(46, 'Trương Đình Hiếu', 'Điện thoại Nokia 6300 4G', 2, 440000, '', 440000, '2021-07-16', 35, 7, 10),
(47, 'Trương Đình Hiếu', 'Điện thoại Nokia C20', 1, 480000, 'Giảm giá cho khách hàng mua nhiều sản phẩm', 380000, '2021-07-16', 36, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `congno`
--

DROP TABLE IF EXISTS `congno`;
CREATE TABLE IF NOT EXISTS `congno` (
  `MaCN` int(11) NOT NULL AUTO_INCREMENT,
  `SoTienNo` double DEFAULT NULL,
  `ThoiGianNo` datetime DEFAULT NULL,
  `MaKH` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaCN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE IF NOT EXISTS `dondathang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`MaDonDatHang`),
  KEY `fk_DonDatHang_TaiKhoan1_idx` (`MaTaiKhoan`),
  KEY `fk_DonDatHang_TinhTrang1_idx` (`MaTinhTrang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

DROP TABLE IF EXISTS `hangsanxuat`;
CREATE TABLE IF NOT EXISTS `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'Nokia', 'nokia.png', 0),
(2, 'OPPO', 'oppo.png', 0),
(3, 'Vivo', 'vivo.png', 0),
(4, 'XiaoMi', 'xiaomi.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `MaHD` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` int(11) NOT NULL,
  `TongGia` double NOT NULL,
  PRIMARY KEY (`MaHD`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `TongGia`) VALUES
(1, 1, 1200000),
(2, 0, 5000),
(3, 6, 60000),
(4, 6, 60000),
(5, 6, 80000),
(6, 6, 200000),
(7, 6, 200000),
(8, 6, 80000),
(9, 6, 80000),
(10, 6, 80000),
(11, 6, 200000),
(12, 6, 80000),
(13, 6, 280000),
(14, 6, 80000),
(15, 6, 80000),
(16, 6, 80000),
(17, 6, 180000),
(18, 6, 360000),
(19, 6, 740000),
(20, 6, 80000),
(21, 6, 80000),
(22, 7, 180000),
(23, 7, 180000),
(24, 7, 700000),
(25, 6, 280000),
(26, 6, 260000),
(27, 7, 180000),
(28, 7, 500000),
(29, 7, 220000),
(30, 7, 220000),
(31, 7, 220000),
(32, 7, 220000),
(33, 7, 340000),
(34, 7, 1320000),
(35, 7, 330000),
(36, 7, 290000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenKhachHang` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaKhachHang`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `DiaChi`, `DienThoai`, `Email`) VALUES
(6, 'Nguy?n Bá Vi?t12', 'hcm', '03397052777', 'nbviet.vn.com'),
(7, 'Trương Đình Hiếu', 'Đồng Nai', '0145986234', 'HTruong@gmail.com'),
(8, 'Võ Công Minh', 'TP HCM', '0334587956', 'vcminh@gamil.com'),
(9, 'Lỷ Nhần Quắn', 'TP HCM', '0334512548', 'phongthuong@gamil.com'),
(12, 'Trần Thị Thu Thảo', 'Đồng Nai', '339705278', 'ttth@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `khachhangkhuyenmai`
--

DROP TABLE IF EXISTS `khachhangkhuyenmai`;
CREATE TABLE IF NOT EXISTS `khachhangkhuyenmai` (
  `MaKH` int(11) NOT NULL,
  `MaKM` int(11) NOT NULL,
  PRIMARY KEY (`MaKH`,`MaKM`),
  KEY `fk_KHKM_KM` (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhangkhuyenmai`
--

INSERT INTO `khachhangkhuyenmai` (`MaKH`, `MaKM`) VALUES
(6, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `MaKM` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `TenKM` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SoTienKM` double DEFAULT NULL,
  `ThoiGianBD` datetime NOT NULL,
  `ThoiGianKT` datetime NOT NULL,
  PRIMARY KEY (`MaKM`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `Code`, `TenKM`, `SoTienKM`, `ThoiGianBD`, `ThoiGianKT`) VALUES
(1, 'GG20%', 'Giảm giá 20%', 0.2, '2021-07-10 10:45:53', '2021-07-20 10:45:53'),
(2, 'KHMN100K', 'Giảm giá cho khách hàng mua nhiều sản phẩm', 100000, '2021-07-10 10:45:53', '2021-07-20 10:45:53'),
(3, 'GG150K', 'Giảm giá 150000', 150000, '2021-07-10 10:45:53', '2021-07-20 10:45:53'),
(4, 'KHKM50%', 'khuyến mãi 50% cho khách hàng quen thuộc', 0.5, '2021-07-01 11:01:09', '2021-07-20 11:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `lichsugiaodich`
--

DROP TABLE IF EXISTS `lichsugiaodich`;
CREATE TABLE IF NOT EXISTS `lichsugiaodich` (
  `MaLS` int(11) NOT NULL AUTO_INCREMENT,
  `ThoiGianGD` datetime DEFAULT NULL,
  `NapTien` double DEFAULT NULL,
  `RutTien` double DEFAULT NULL,
  `MaTK` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaLS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MaLoaiSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Điện thoại cảm ứng', 0),
(2, 'Điện thoại phím', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE IF NOT EXISTS `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `phieuthu`
--

DROP TABLE IF EXISTS `phieuthu`;
CREATE TABLE IF NOT EXISTS `phieuthu` (
  `MaPT` int(11) NOT NULL AUTO_INCREMENT,
  `NgayLap` datetime DEFAULT NULL,
  `SoTienNop` double DEFAULT NULL,
  `MaKH` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaPT`),
  KEY `fk_pt_kh` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieuthu`
--

INSERT INTO `phieuthu` (`MaPT`, `NgayLap`, `SoTienNop`, `MaKH`) VALUES
(1, '2021-07-13 00:00:00', 100000, 6),
(2, '2021-07-13 00:00:00', 100000, 6),
(3, '2021-07-13 00:00:00', 100000, 6),
(4, '2021-07-13 00:00:00', 100000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuat`
--

DROP TABLE IF EXISTS `phieuxuat`;
CREATE TABLE IF NOT EXISTS `phieuxuat` (
  `MaPX` int(11) NOT NULL AUTO_INCREMENT,
  `NgayLap` datetime DEFAULT NULL,
  `SoTienMua` double DEFAULT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `SoTienTruocThanhToan` double DEFAULT NULL,
  `SoDuConLai` double DEFAULT NULL,
  PRIMARY KEY (`MaPX`),
  KEY `fk_px_kh` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieuxuat`
--

INSERT INTO `phieuxuat` (`MaPX`, `NgayLap`, `SoTienMua`, `MaKH`, `SoTienTruocThanhToan`, `SoDuConLai`) VALUES
(3, '2021-07-15 00:00:00', 6000000, 6, 50000, 40000),
(4, '2021-07-15 00:00:00', 60000, 6, 5010000, 4950000),
(5, '2021-07-15 00:00:00', 60000, 6, 5010000, 4950000),
(6, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(7, '2021-07-15 00:00:00', 200000, 6, 5010000, 4810000),
(8, '2021-07-15 00:00:00', 200000, 6, 5010000, 4810000),
(9, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(10, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(11, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(12, '2021-07-15 00:00:00', 200000, 6, 5010000, 4810000),
(13, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(14, '2021-07-15 00:00:00', 280000, 6, 5010000, 4730000),
(15, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(16, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(17, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(18, '2021-07-15 00:00:00', 180000, 6, 5010000, 4830000),
(19, '2021-07-15 00:00:00', 360000, 6, 5010000, 4650000),
(20, '2021-07-15 00:00:00', 740000, 6, 5010000, 4270000),
(21, '2021-07-15 00:00:00', 80000, 6, 5010000, 4930000),
(22, '2021-07-16 00:00:00', 80000, 6, 12100000, 12020000),
(23, '2021-07-16 00:00:00', 180000, 7, 12100000, 11920000),
(24, '2021-07-16 00:00:00', 180000, 7, 12100000, 11920000),
(25, '2021-07-16 00:00:00', 700000, 7, 12100000, 11400000),
(26, '2021-07-16 00:00:00', 280000, 6, 5010000, 4730000),
(27, '2021-07-16 00:00:00', 260000, 6, 5010000, 4750000),
(28, '2021-07-16 00:00:00', 180000, 7, 12100000, 11920000),
(29, '2021-07-16 00:00:00', 500000, 7, 12100000, 11600000),
(30, '2021-07-16 00:00:00', 220000, 7, 12100000, 11880000),
(31, '2021-07-16 00:00:00', 220000, 7, 12100000, 11880000),
(32, '2021-07-16 00:00:00', 220000, 7, 12100000, 11880000),
(33, '2021-07-16 00:00:00', 220000, 7, 12100000, 11880000),
(34, '2021-07-16 00:00:00', 340000, 7, 12100000, 11760000),
(35, '2021-07-16 00:00:00', 1320000, 7, 12100000, 10780000),
(36, '2021-07-16 00:00:00', 330000, 7, 10780000, 10450000),
(37, '2021-07-16 00:00:00', 290000, 7, 10450000, 10160000);

-- --------------------------------------------------------

--
-- Table structure for table `quycach`
--

DROP TABLE IF EXISTS `quycach`;
CREATE TABLE IF NOT EXISTS `quycach` (
  `MaQC` int(11) NOT NULL AUTO_INCREMENT,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaTien` int(11) DEFAULT NULL,
  `MaSP` int(11) NOT NULL,
  PRIMARY KEY (`MaQC`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quycach`
--

INSERT INTO `quycach` (`MaQC`, `SoLuong`, `GiaTien`, `MaSP`) VALUES
(1, 10, 160000, 4),
(2, 20, 152000, 4),
(3, 20, 144000, 4),
(4, 10, 178000, 5),
(5, 10, 171000, 5),
(6, 20, 165000, 5),
(7, 10, 480000, 7),
(8, 20, 432000, 7),
(9, 10, 300000, 8),
(10, 20, 450000, 8),
(11, 10, 380000, 9),
(12, 20, 300000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuongTon` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuocXem` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `imageSP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageSP2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`MaSanPham`),
  KEY `fk_SanPham_LoaiSanPham1_idx` (`MaLoaiSanPham`),
  KEY `fk_SanPham_HangSanXuat1_idx` (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocXem`, `MoTa`, `imageSP`, `imageSP2`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(4, 'Điện thoại Nokia 5.4', 'nokia-54-1.jpg', 160000, '2012-08-25 00:00:00', 14, 9, 25, 'Sau Nokia 5.3, HMD Global tiếp tục cho ra mắt chiếc điện thoại Nokia 5.4 với nhiều nâng cấp thiết kế, cấu hình cùng camera mạnh mẽ hứa hẹn sẽ làm hài lòng người sử dụng, ngay cả những người khó tính nhất.\r\nThiết kế nguyên khối bền bỉ chắc chắn\r\nMặc dù là một chiếc smartphone được sản xuất trong phân khúc giá tầm trung nhưng Nokia 5.4 không hề lỗi thời với lối thiết kế nguyên khối vô cùng cứng cáp, mặt lưng làm từ nhựa phủ bóng giả kính vô cùng sang trọng và bắt mắt.', 'nokia-54-112721-112705.jpg', 'nokia-54-112621-112617.jpg', 0, 1, 1),
(5, 'Điện thoại Nokia 3.4', 'nokia-34-1-1.jpg', 180000, '2012-05-01 00:00:00', 14, 6, 4, 'Nokia 3.4 sở hữu màn hình IPS LCD kích thước 6.39 inch độ phân giải HD+, màn hình có thiết kế theo kiểu đục lỗ đang là xu hướng, với một màn hình lớn thì bạn có thể tận dụng được tối đa khả năng hiển thị để phục vụ các nhu cầu như vui chơi, giải trí và làm việc.', 'nokia-34-075820-085849.jpg', 'nokia-34-075820-085853.jpg', 0, 1, 1),
(7, 'Điện thoại Nokia C20', 'nokia-c20-vang-1-1-org.jpg', 480000, '2012-09-12 00:00:00', 25, 2, 9, 'Nokia C20 được hoàn thiện từ chất liệu vỏ polycarbonate cứng cáp mang đến độ bền cao, bạn sẽ yên tâm hơn khi sử dụng hay mang đi trong mọi hoạt động hằng ngày.', 'nokia-c20-001.jpg', 'nokia-c20-003.jpg', 0, 1, 1),
(8, 'Điện thoại Nokia 2.4', 'nokia-24-xam-1-2-org.jpg', 300000, '2012-07-03 00:00:00', 30, 0, 8, 'Thiết kế mới, trẻ trung, năng động nhiều màu sắc\r\nNokia 2.4 mang ngôn ngữ thiết kế hoàn toàn khác với các thế hệ Nokia 2.2 hay Nokia 2.3 khi được trang bị mặt lưng 3D họa tiết phay xước độc đáo kết hợp cùng hiệu ứng chuyển đổi màu gradient đẹp mắt ấn tượng từ cái nhìn đầu tiên.', 'nokia-23-tgdd1.jpg', 'nokia-23-tgdd2.jpg', 0, 1, 1),
(9, 'Điện thoại Nokia 8000 4G', 'nokia-8000-4g-den-1-org.jpg', 380000, '2012-01-01 00:00:00', 24, 6, 14, 'Điểm nhấn phong cách\r\nChiếc điện thoại có khung và mặt lưng được làm từ nhựa với lớp vỏ sáng bóng như thủy tinh cao cấp và các màu sắc lấy cảm hứng từ đá quý, Nokia 8000 4G được thiết kế để tỏa sáng. Lớp hoàn thiện khung giữa mạ chrome sang trọng hoàn thiện vẻ ngoài.', 'nokia-8000-4g-252520-102507.jpg', 'nokia-8000-4g-252520-102558.jpg', 0, 2, 1),
(10, 'Điện thoại Nokia 6300 4G', 'nokia-6300-4g-1-1-org.jpg', 220000, '2012-08-15 00:00:00', 28, 7, 8, 'Giá trị cổ điển “hồi sinh”\r\nNokia 6300 4G vẫn mang dáng dấp của Nokia 6300 năm nào, chính là thiết kế cổ điển với những cải tiến mới hợp xu hướng người dùng. Tổng thể của chiếc máy nhỏ gọn cho việc cầm nằm chắc chắn và mang đến cảm giác thoải mái cho người dùng khi sử dụng.', 'nokia-6300-4g-095220-035233.jpg', 'nokia-6300-4g-094120-034121.jpg', 0, 2, 1),
(11, 'Điện thoại Nokia 210', 'nokia-210-den-1-org.jpg', 260000, '2012-09-01 00:00:00', 38, 3, 38, 'Màn hình:\r\n\r\nTFT LCD2.4\"65.536 màu\r\nSIM:\r\n\r\n2 SIM thườngHỗ trợ 2G\r\nDanh bạ:\r\n\r\n500 số\r\nThẻ nhớ:\r\n\r\nMicroSD, hỗ trợ tối đa 32 GB\r\nCamera sau:\r\n\r\n0.3 MP\r\nRadio FM:\r\n\r\nCó\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n1020 mAh', 'nokia-210-001.jpg', 'nokia-210-005.jpg', 0, 2, 1),
(12, 'Điện thoại Nokia 150 (2020)', 'nokia-150-2020-den-1-org.jpg', 260000, '2012-10-02 00:00:00', 20, 0, 0, 'Cấu hình Điện thoại Nokia 150 (2020)\r\n\r\nMàn hình:\r\n\r\nTFT LCD2.4\"65.536 màu\r\nSIM:\r\n\r\n2 SIM thườngHỗ trợ 2G\r\nDanh bạ:\r\n\r\n800 số\r\nThẻ nhớ:\r\n\r\nMicroSD, hỗ trợ tối đa 32 GB\r\nCamera sau:\r\n\r\nVGA (480 x 640 pixels)\r\nRadio FM:\r\n\r\nCó\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n1020 mAh', 'nokia-150-2020-274220-094259.jpg', 'nokia-150-2020-274520-094540.jpg', 0, 2, 1),
(13, 'Điện thoại Nokia 105 Single SIM', 'nokia-105-single-sim-2019-den-1-org.jpg', 920000, '2012-10-04 00:00:00', 10, 2, 14, 'Cấu hình Điện thoại Nokia 105 Single SIM\r\n\r\nMàn hình:\r\n\r\nTFT LCD1.77\"65.536 màu\r\nSIM:\r\n\r\n1 SIM thườngHỗ trợ 2G\r\nDanh bạ:\r\n\r\n2000 số\r\nRadio FM:\r\n\r\nCó\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n800 mAh', 'nokia-105-single-sim-2019-tgdd-1-1.jpg', 'nokia-105-single-sim-2019-tgdd-3-1.jpg', 0, 2, 1),
(14, 'Điện thoại Nokia 5310 (2020)', 'nokia-5310-2020-trang-1-org.jpg', 240000, '2012-09-25 00:00:00', 5, 5, 1, 'Cấu hình Điện thoại Nokia 5310 (2020)\r\n\r\nMàn hình:\r\n\r\nTFT LCD2.4\"\r\nSIM:\r\n\r\n2 SIM thườngHỗ trợ 2G\r\nDanh bạ:\r\n\r\n2000 số\r\nThẻ nhớ:\r\n\r\nMicroSD, hỗ trợ tối đa 32 GB\r\nCamera sau:\r\n\r\nVGA (480 x 640 pixels)\r\nRadio FM:\r\n\r\nCó\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n1200 mAh', 'nokia-5310-2020-den_926x522-800-resize.jpg', 'nokia-5310-2020_800x450.jpg', 0, 2, 1),
(15, 'Điện thoại OPPO A74', 'oppo-a74-xanh-duong-1-org.jpg', 270000, '2012-08-27 00:00:00', 19, 3, 3, 'Cấu hình Điện thoại OPPO A74\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 662\r\nRAM: 8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 'oppo-a74-4g-002.jpg', 'oppo-a74-4g-008.jpg', 0, 1, 2),
(16, 'Điện thoại OPPO Reno5', 'oppo-reno5-den-1-org.jpg', 190000, '2012-07-13 00:00:00', 50, 3, 5, 'Cấu hình Điện thoại OPPO Reno5\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n44 MP\r\nChip:\r\n\r\nSnapdragon 720G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4310 mAh50 W', 'oppo-reno5-180520-030502.jpg', 'oppo-reno5-231620-031631.jpg', 0, 1, 2),
(17, 'Điện thoại OPPO Find X3 Pro 5G', 'oppo-find-x3-pro-den-1-org.jpg', 180000, '2012-09-15 00:00:00', 60, 3, 2, 'Cấu hình Điện thoại OPPO Find X3 Pro 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.7\"Quad HD+ (2K+)\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 50 MP, 13 MP, 3 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 888\r\nRAM:\r\n\r\n12 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh65 W', 'oppo-find-x3-pro-5g-002.jpg', 'oppo-find-x3-pro-5g-008.jpg', 0, 1, 2),
(18, 'Điện thoại OPPO Reno5 5G', 'oppo-reno5-5g-den--org.jpg', 200000, '2012-09-14 00:00:00', 30, 30, 22, 'Cấu hình Điện thoại OPPO Reno5 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 765G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4300 mAh65 W', 'a22.jpg', 'a10.jpg', 0, 1, 2),
(19, 'Điện thoại OPPO Reno4 Pro', 'oppo-reno4-pro-trang-1-org.jpg', 110000, '2012-06-12 00:00:00', 19, 13, 24, 'Cấu hình Điện thoại OPPO Reno4 Pro\r\n\r\nMàn hình:\r\n\r\nAMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 720G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4000 mAh65 W', 'oppo-reno4-pro9.jpg', 'oppo-reno4-pro11.jpg', 0, 1, 2),
(20, 'Điện thoại OPPO A94', 'oppo-a94-den-11-org.jpg', 160000, '2012-07-12 00:00:00', 20, 12, 13, 'Cấu hình Điện thoại OPPO A94\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nMediaTek Helio P95\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4310 mAh30 W', 'oppo-a94-02.jpg', 'oppo-a94-01.jpg', 0, 1, 2),
(21, 'Điện thoại OPPO A74 5G', 'oppo-a74-5g-bac-4-org.jpg', 140000, '2012-08-17 00:00:00', 35, 12, 12, 'Cấu hình Điện thoại OPPO A74 5G\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 480 8 nhân 5G\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'oppo-a94-01.jpg', 'oppo-a94-3.jpg', 0, 1, 2),
(22, 'Điện thoại OPPO Reno4', 'oppo-reno4-xanh-duong-1-org.jpg', 500000, '2012-10-05 00:00:00', 24, 28, 30, 'Cấu hình Điện thoại OPPO Reno4\r\n\r\nMàn hình:\r\n\r\nAMOLED6.4\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\nChính 32 MP & Phụ cảm biến thông minh A.I\r\nChip:\r\n\r\nSnapdragon 720G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4015 mAh30 W', 'oppo-reno4-302420-1024532.jpg', 'oppo-reno4-302420-1024534.jpg', 0, 1, 2),
(23, 'Điện thoại OPPO A93', 'oppo-a93-den-4-org.jpg', 950000, '2012-10-07 00:00:00', 30, 2, 24, 'Cấu hình Điện thoại OPPO A93\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\nChính 16 MP & Phụ 2 MP\r\nChip:\r\n\r\nMediaTek Helio P95\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4000 mAh18 W', 'oppo-a93-270620-100645.jpg', 'oppo-a93-270720-100701.jpg', 0, 1, 2),
(24, 'Điện thoại OPPO A54', 'oppo-a54-den-5-org.jpg', 150000, '2012-10-08 00:00:00', 39, 2, 6, 'Cấu hình Điện thoại OPPO A54\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.5\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nMediaTek Helio P35\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'oppo-a54-4g-008.jpg', 'oppo-a54-4g-010.jpg', 0, 1, 2),
(25, 'Điện thoại OPPO A15s', 'oppo-a15s-xanh-1-org.jpg', 240000, '2012-09-07 00:00:00', 38, 2, 4, 'Cấu hình Điện thoại OPPO A15s\r\n\r\nMàn hình:\r\n\r\nLCD6.52\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio P35\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4230 mAh10 W', 'oppo-a15s-1.jpg', 'oppo-a15s-7.jpg', 0, 1, 2),
(26, 'Điện thoại Vivo Y53s', 'vivo-y53s-xanh-tim-1-org.jpg', 620000, '2012-10-07 00:00:00', 20, 12, 30, 'Cấu hình Điện thoại Vivo Y53s\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.58\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nMediaTek Helio G80\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 'vivo-y53s-001.jpg', 'vivo-y53s-02.jpg', 0, 1, 3),
(27, 'Điện thoại Vivo V21 5G', 'vivo-v21-5g-tim-hong-1-3-org.jpg', 223000, '2012-10-02 00:00:00', 20, 12, 3, 'Cấu hình Điện thoại Vivo V21 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.44\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n44 MP\r\nChip:\r\n\r\nMediaTek Dimensity 800U 5G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4000 mAh33 W', 'vivo-v21-5g-007.jpg', 'vivo-v21-5g-002.jpg', 0, 1, 3),
(28, 'Điện thoại Vivo V20 (2021)', 'vivo-v20-2021-xanh-hong-1-org.jpg', 300000, '2012-10-01 00:00:00', 10, 1, 2, 'Cấu hình Điện thoại Vivo V20 (2021)\r\n\r\nMàn hình:\r\n\r\nAMOLED6.44\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n44 MP\r\nChip:\r\n\r\nSnapdragon 730\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4000 mAh33 W', 'vivo-v20-2021-203721-063746.jpg', 'vivo-v20-2021-001.jpg', 0, 1, 3),
(29, 'Điện thoại Vivo Y72 5G', 'vivo-y72-5g-den-1-org.jpg', 320000, '2012-09-30 00:00:00', 10, 3, 2, 'Cấu hình Điện thoại Vivo Y72 5G\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.58\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nMediaTek Dimensity 700\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'vivo-y72-5g-001.jpg', 'vivo-y72-5g-007.jpg', 0, 1, 3),
(30, 'Điện thoại Vivo V20 SE', 'vivo-v20-se-xanh-duong-nhat-1-org.jpg', 625000, '2012-10-01 00:00:00', 4, 2, 1, 'Cấu hình Điện thoại Vivo V20 SE\r\n\r\nMàn hình:\r\n\r\nAMOLED6.44\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 10\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 665\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4100 mAh33 W', 'vivo-v20-se-022020-032021.jpg', 'vivo-v20-se-022020-032010.jpg', 0, 1, 3),
(31, 'Điện thoại Vivo Y51 (2020) ', 'vivo-y51-2020-tim-bac-4-org.jpg', 560000, '2012-10-05 00:00:00', 2, 6, 5, 'Cấu hình Điện thoại Vivo Y51 (2020)\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.58\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 662\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'vivo-y51-2020-293420-113419.jpg', 'vivo-y51-2020-291420-111458.jpg', 0, 1, 3),
(32, 'Điện thoại Xiaomi Redmi Note 10 8GB ', 'xiaomi-redmi-note-10-5g-bac-1-org.jpg', 410000, '2012-10-06 00:00:00', 3, 0, 0, 'Cấu hình Điện thoại Xiaomi Redmi Note 10 5G 8GB\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Dimensity 700\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'xiaomi-redmi-note-10-pro-mi-fan-festival-001.jpg', 'xiaomi-redmi-note-10-pro-mi-fan-festival-006.jpg', 0, 1, 4),
(33, 'Điện thoại Xiaomi Mi 11 5G', 'xiaomi-mi-11-xanhduong-1-org.jpg', 600000, '2012-10-06 00:00:00', 4, 0, 15, 'Cấu hình Điện thoại Xiaomi Mi 11 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.81\"Quad HD+ (2K+)\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 13 MP, 5 MP\r\nCamera trước:\r\n\r\n20 MP\r\nChip:\r\n\r\nSnapdragon 888\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4600 mAh55 W', 'xiaomi-mi-11-002.jpg', 'xiaomi-mi-11-121621-031604.jpg', 0, 1, 4),
(44, 'Điện thoại Xiaomi 11T 5G 128GB', 'xiaomi-11t-1-1.jpg', 10490000, '2021-11-14 19:18:33', 20, 1, 5, 'Cấu hình Điện thoại Xiaomi 11T 5G 128GB\r\n\r\nMàn hình:\r\n\r\nAMOLED6.67\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 8 MP, 5 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nMediaTek Dimensity 1200\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh67 W', 'xiaomi-11t-8.jpg', 'xiaomi-11t-11.jpg', 0, 1, 4),
(45, 'Điện thoại Xiaomi 11T Pro 5G', 'xiaomi-11t-pro-white-2-600x600.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại Xiaomi 11T Pro 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.67\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 8 MP, 5 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 888\r\nRAM:\r\n\r\n12 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh120 W', 'xiaomi-11t-pro-21.jpg', 'xiaomi-11t-pro-6.jpg', 0, 1, 4),
(46, 'Điện thoại Nokia 110 4G ', 'nokia-110-4g-1-org.jpg', 625000, '2012-10-05 00:00:00', 20, 12, 5, 'Cấu hình Điện thoại Nokia 110 4G\r\n\r\nMàn hình:\r\n\r\nTFT LCD1.8\"65.536 màu\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nDanh bạ:\r\n\r\n2000 số\r\nThẻ nhớ:\r\n\r\nMicroSD, hỗ trợ tối đa 32 GB\r\nCamera sau:\r\n\r\n0.08 MP\r\nRadio FM:\r\n\r\nFM không cần tai nghe\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n1020 mAh\r\n', 'nokia-110-4g1.jpg', 'nokia-110-4g8.jpg', 0, 2, 1),
(47, 'Điện thoại Nokia 110', 'nokia-110-2019-den-1-org.jpg', 850000, '2021-11-12 19:28:09', 21, 50, 2, 'Cấu hình Điện thoại Nokia 110\r\n\r\nMàn hình:\r\n\r\nTFT LCD1.77\"65.536 màu\r\nSIM:\r\n\r\n2 SIM thườngHỗ trợ 2G\r\nDanh bạ:\r\n\r\n500 số\r\nThẻ nhớ:\r\n\r\nMicroSD, hỗ trợ tối đa 32 GB\r\nCamera sau:\r\n\r\nQVGA (320 x 240 pixels)\r\nRadio FM:\r\n\r\nCó\r\nJack cắm tai nghe:\r\n\r\n3.5 mm\r\nPin:\r\n\r\n800 mAh', 'nokia-110-2019-5-1.jpg', 'nokia-110-2019-3-1.jpg', 0, 2, 1),
(48, 'Điện thoại OPPO Reno6 Z 5G', 'oppo-reno6-z-5g-bac-1-org.jpg', 9490000, '2021-11-17 19:31:23', 4, 28, 30, 'Cấu hình Điện thoại OPPO Reno6 Z 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nMediaTek Dimensity 800U 5G\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4310 mAh30 W', 'oppo-reno6-z-5g-03.jpg', 'reno6-z-5g-24.jpg', 0, 1, 2),
(49, 'Điện thoại OPPO Find X3 Pro 5G ', 'oppo-find-x3-pro-xanh-1-org.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại OPPO Find X3 Pro 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.7\"Quad HD+ (2K+)\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 50 MP, 13 MP, 3 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 888\r\nRAM:\r\n\r\n12 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh65 W', 'oppo-find-x3-pro-5g-002.jpg', 'oppo-find-x3-pro-5g-001.jpg', 0, 1, 2),
(50, 'Điện thoại OPPO A74 ', 'oppo-a74-den-1-org.jpg', 625000, '2012-10-01 00:00:00', 20, 12, 2, 'Cấu hình Điện thoại OPPO A74\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 662\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 'oppo-a74-14.jpg', 'oppo-a74-4g-007.jpg', 0, 1, 2),
(51, 'Điện thoại OPPO A74 5G', 'oppo-a74-5g-bac-1-org.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại OPPO A74 5G\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 480 8 nhân 5G\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'oppo-a74-5g-0001.jpg', 'oppo-a74-5g-3.jpg', 0, 1, 2),
(52, 'Điện thoại Xiaomi 11 Lite 5G NE', 'xiaomi-11-lite-5g-ne-1-1.jpg', 9450000, '2021-11-01 19:39:35', 20, 12, 300000, 'Cấu hình Điện thoại Xiaomi 11 Lite 5G NE\r\n\r\nMàn hình:\r\n\r\nAMOLED6.55\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 5 MP\r\nCamera trước:\r\n\r\n20 MP\r\nChip:\r\n\r\nSnapdragon 778G 5G 8 nhân\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4250 mAh33 W', 'xiaomi-11-lite-5g-ne-2.jpg', 'xiaomi-11-lite-5g-ne-1.jpg', 0, 1, 4),
(53, 'Điện thoại Xiaomi Redmi Note 10S', 'xiaomi-redmi-note-10s-trang-1-org.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại Xiaomi Redmi Note 10S\r\n\r\nMàn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n13 MP\r\nChip:\r\n\r\nMediaTek Helio G95\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 'xiaomi-redmi-note-10s-08.jpg', 'xiaomi-redmi-note-10s-07.jpg', 0, 1, 4),
(54, 'Điện thoại Xiaomi Redmi 7 (6GB/128GB)', 'xiaomi-redmi-10-trang-1-org.jpg', 625000, '2012-10-05 00:00:00', 20, 28, 30, 'Màn hình:\r\n\r\nIPS LCD6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G88 8 nhân\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'xiaomi-redmi-10-001.jpg', 'redmi-10-8.jpg', 0, 1, 4),
(55, 'Điện thoại Xiaomi 11T Pro 10G', 'xiaomi-11t-pro-1-2.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại Xiaomi 11T Pro 5G\r\n\r\nMàn hình:\r\n\r\nAMOLED6.67\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 8 MP, 5 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 888\r\nRAM:\r\n\r\n12 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n5000 mAh120 W', 'xiaomi-11t-pro-7.jpg', 'xiaomi-11t-pro-9.jpg', 0, 1, 4),
(56, 'Điện thoại Vivo C21Y 4GB', 'realme-c21y-xanh-1-org.jpg', 3990000, '2021-11-03 19:48:15', 20, 12, 30, 'Cấu hình Điện thoại Vivo C21Y 4GB\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.5\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nSpreadtrum T610 8 nhân\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 'realme-c21y-007.jpg', 'realme-c21y-001.jpg', 0, 1, 3),
(57, 'Điện thoại Vivo V21 (2021)', 'vivo-v20-2021-den-1-org.jpg', 14990000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại Vivo V21 (2021)\r\n\r\nMàn hình:\r\n\r\nAMOLED6.44\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n44 MP\r\nChip:\r\n\r\nSnapdragon 730\r\nRAM:\r\n\r\n8 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4000 mAh33 W', 'vivo-v20-2021-007.jpg', 'vivo-v20-2021-005.jpg', 0, 1, 3),
(58, 'Điện thoại Vivo Y21s 6GB', 'vivo-y21s-blue-gc-org.jpg', 5000000, '2012-10-05 00:00:00', 20, 12, 2, 'Cấu hình Điện thoại Vivo Y21s 6GB\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.51\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G80\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'vivo-y21s-6gb-3.jpg', 'vivo-y21s-6gb-13.jpg', 0, 1, 3),
(59, 'Điện thoại Vivo Y21s 4GB ', 'vivo-y21s-trang-1-1.jpg', 8500000, '2021-11-15 19:18:33', 21, 50, 2, 'Cấu hình Điện thoại Vivo Y21s 4GB\r\n\r\nMàn hình:\r\n\r\nIPS LCD6.51\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G80\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh18 W', 'vivo-y21s-5.jpg', 'vivo-y21s-7.jpg', 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamkhuyenmai`
--

DROP TABLE IF EXISTS `sanphamkhuyenmai`;
CREATE TABLE IF NOT EXISTS `sanphamkhuyenmai` (
  `MaSP` int(11) NOT NULL,
  `MaKM` int(11) NOT NULL,
  PRIMARY KEY (`MaSP`,`MaKM`),
  KEY `fk_spkm_km` (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanphamkhuyenmai`
--

INSERT INTO `sanphamkhuyenmai` (`MaSP`, `MaKM`) VALUES
(14, 1),
(7, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTK` int(11) NOT NULL AUTO_INCREMENT,
  `SoDu` double DEFAULT NULL,
  `MaKH` int(11) NOT NULL,
  PRIMARY KEY (`MaTK`),
  KEY `fk_taikhoan_khachhang` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `SoDu`, `MaKH`) VALUES
(1, 5010000, 6),
(2, 10160000, 7),
(3, 5000000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

DROP TABLE IF EXISTS `tinhtrang`;
CREATE TABLE IF NOT EXISTS `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTinhTrang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Đặt hàng'),
(2, 'Đang giao hàng'),
(3, 'Thanh toán'),
(4, 'Hủy');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountlogin`
--
ALTER TABLE `accountlogin`
  ADD CONSTRAINT `fk_ac_ltk` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`);

--
-- Constraints for table `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `fk_ChiTietDonDatHang_DonDatHang1` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ChiTietDonDatHang_SanPham1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `fk_cthd_kh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_DonDatHang_TaiKhoan1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DonDatHang_TinhTrang1` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khachhangkhuyenmai`
--
ALTER TABLE `khachhangkhuyenmai`
  ADD CONSTRAINT `fk_KHKM_KH` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKhachHang`),
  ADD CONSTRAINT `fk_KHKM_KM` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`);

--
-- Constraints for table `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD CONSTRAINT `fk_pt_kh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `fk_px_kh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_SanPham_HangSanXuat1` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SanPham_LoaiSanPham1` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD CONSTRAINT `fk_spkm_km` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`),
  ADD CONSTRAINT `fk_spkm_sp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_khachhang` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKhachHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
