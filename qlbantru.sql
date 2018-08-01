-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2014 at 05:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlbantru`
--

-- --------------------------------------------------------

--
-- Table structure for table `baomau`
--

CREATE TABLE IF NOT EXISTS `baomau` (
  `MACB` char(10) NOT NULL,
  `MALOP` char(10) NOT NULL,
  `NAMHOC` char(10) NOT NULL,
  `HOCKI` char(10) NOT NULL,
  PRIMARY KEY (`MACB`,`MALOP`,`NAMHOC`,`HOCKI`),
  KEY `FK_BAOMAU_BAOMAU2_LOP` (`MALOP`),
  KEY `FK_BAOMAU_BAOMAU3_NAMHOC` (`NAMHOC`),
  KEY `FK_BAOMAU_BAOMAU4_HOCKI` (`HOCKI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baomau`
--

INSERT INTO `baomau` (`MACB`, `MALOP`, `NAMHOC`, `HOCKI`) VALUES
('CB004', '1A1', '2010-2011', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `canbo`
--

CREATE TABLE IF NOT EXISTS `canbo` (
  `MACB` char(10) NOT NULL,
  `HOTEN` varchar(30) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH_CB` varchar(4) DEFAULT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `SDT` decimal(11,0) NOT NULL,
  `CHUCVU` varchar(30) NOT NULL,
  `PASS` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`MACB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canbo`
--

INSERT INTO `canbo` (`MACB`, `HOTEN`, `NGAYSINH`, `GIOITINH_CB`, `DIACHI`, `SDT`, `CHUCVU`, `PASS`) VALUES
('CB001', 'Nguyễn Văn A', '1960-12-20', 'Nam', 'Binh Minh', 1234567890, 'Quản lý', 'CB001'),
('CB002', 'Lê Văn B', '1960-06-05', 'Nam', 'Cần Thơ', 1234567940, 'Cán bộ', NULL),
('CB003', 'Trương Văn C', '1955-06-03', 'Nam', 'Bình Minh', 4567891230, 'GVCN', NULL),
('CB004', 'Hoài Thị D', '1970-06-16', 'Nữ', 'Đồng Tháp', 7896543210, 'Bảo mẫu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chunhiem`
--

CREATE TABLE IF NOT EXISTS `chunhiem` (
  `MACB` char(10) NOT NULL,
  `MALOP` char(10) NOT NULL,
  `NAMHOC` char(10) NOT NULL,
  `HOCKI` char(10) NOT NULL,
  PRIMARY KEY (`MACB`,`MALOP`,`NAMHOC`,`HOCKI`),
  KEY `FK_CHUNHIEM_CHUNHIEM2_LOP` (`MALOP`),
  KEY `FK_CHUNHIEM_CHUNHIEM3_NAMHOC` (`NAMHOC`),
  KEY `FK_CHUNHIEM_CHUNHIEM4_HOCKI` (`HOCKI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chunhiem`
--

INSERT INTO `chunhiem` (`MACB`, `MALOP`, `NAMHOC`, `HOCKI`) VALUES
('CB003', '1A2', '2010-2011', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `dangkyan`
--

CREATE TABLE IF NOT EXISTS `dangkyan` (
  `MAHS` char(10) NOT NULL,
  `NGAY` date NOT NULL,
  PRIMARY KEY (`MAHS`,`NGAY`),
  KEY `FK_DANGKYAN_DANGKYAN2_NGAY` (`NGAY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangkyan`
--

INSERT INTO `dangkyan` (`MAHS`, `NGAY`) VALUES
('1A101', '2014-05-07'),
('2A201', '2014-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `hoc`
--

CREATE TABLE IF NOT EXISTS `hoc` (
  `MAHS` char(10) NOT NULL,
  `MALOP` char(10) NOT NULL,
  `HOCKI` char(10) NOT NULL,
  `NAMHOC` char(10) NOT NULL,
  PRIMARY KEY (`MAHS`,`MALOP`,`HOCKI`,`NAMHOC`),
  KEY `FK_HOC_HOC2_LOP` (`MALOP`),
  KEY `FK_HOC_HOC3_HOCKI` (`HOCKI`),
  KEY `FK_HOC_HOC4_NAMHOC` (`NAMHOC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoc`
--

INSERT INTO `hoc` (`MAHS`, `MALOP`, `HOCKI`, `NAMHOC`) VALUES
('1A101', '1A1', 'I', '2013-2014'),
('2A201', '2A2', 'I', '2013-2014');

-- --------------------------------------------------------

--
-- Table structure for table `hocki`
--

CREATE TABLE IF NOT EXISTS `hocki` (
  `HOCKI` char(10) NOT NULL,
  PRIMARY KEY (`HOCKI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocki`
--

INSERT INTO `hocki` (`HOCKI`) VALUES
('I'),
('II');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE IF NOT EXISTS `hocsinh` (
  `MAHS` char(10) NOT NULL,
  `MAPH` char(10) NOT NULL,
  `HOTEN` varchar(30) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`MAHS`),
  KEY `FK_HOCSINH_R1_PHUHUYNH` (`MAPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`MAHS`, `MAPH`, `HOTEN`, `NGAYSINH`, `GIOITINH`) VALUES
('1A101', 'PH0003', 'Trương Văn Con Trai', '2005-02-01', 'Nam'),
('2A201', 'PH0002', 'Lê Văn Con Gái', '2005-10-10', 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphi`
--

CREATE TABLE IF NOT EXISTS `loaiphi` (
  `MAPHI` char(10) NOT NULL,
  `DIENGIAI` varchar(50) NOT NULL,
  PRIMARY KEY (`MAPHI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaiphi`
--

INSERT INTO `loaiphi` (`MAPHI`, `DIENGIAI`) VALUES
('LP0001', 'Phí Nội Trú');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `MALOP` char(10) NOT NULL,
  `TEN_LOP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`MALOP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MALOP`, `TEN_LOP`) VALUES
('1A1', NULL),
('1A2', NULL),
('2A1', NULL),
('2A2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE IF NOT EXISTS `monan` (
  `MAMON` char(10) NOT NULL,
  `TENMON` varchar(30) NOT NULL,
  PRIMARY KEY (`MAMON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MAMON`, `TENMON`) VALUES
('MA0001', 'Canh chua - Cá lóc kho'),
('MA0002', 'Thịt chưng hột vịt - rau sống');

-- --------------------------------------------------------

--
-- Table structure for table `namhoc`
--

CREATE TABLE IF NOT EXISTS `namhoc` (
  `NAMHOC` char(10) NOT NULL,
  PRIMARY KEY (`NAMHOC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namhoc`
--

INSERT INTO `namhoc` (`NAMHOC`) VALUES
('2010-2011'),
('2011-2012'),
('2012-2013'),
('2013-2014');

-- --------------------------------------------------------

--
-- Table structure for table `ngay`
--

CREATE TABLE IF NOT EXISTS `ngay` (
  `NGAY` date NOT NULL,
  `MAMON` char(10) NOT NULL,
  PRIMARY KEY (`NGAY`),
  KEY `FK_NGAY_R5_MONAN` (`MAMON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ngay`
--

INSERT INTO `ngay` (`NGAY`, `MAMON`) VALUES
('2014-05-07', 'MA0001'),
('2014-07-05', 'MA0002');

-- --------------------------------------------------------

--
-- Table structure for table `phieuchi`
--

CREATE TABLE IF NOT EXISTS `phieuchi` (
  `MAPC` char(10) NOT NULL,
  `MATP` char(10) NOT NULL,
  `TENPC` varchar(30) NOT NULL,
  `SOTIEN` decimal(10,0) NOT NULL,
  `NGAYCHI` date NOT NULL,
  PRIMARY KEY (`MAPC`),
  KEY `FK_PHIEUCHI_R3_THUCPHAM` (`MATP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieuchi`
--

INSERT INTO `phieuchi` (`MAPC`, `MATP`, `TENPC`, `SOTIEN`, `NGAYCHI`) VALUES
('PC0001', 'TP0001', 'Mua bạc hà', 100000, '2014-10-10'),
('PC0002', 'TP0002', 'Abc', 100000, '2013-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `phieuthu`
--

CREATE TABLE IF NOT EXISTS `phieuthu` (
  `MAPT` char(10) NOT NULL,
  `MAHS` char(10) NOT NULL,
  `TENPT` varchar(30) NOT NULL,
  `NGAYTHU` date NOT NULL,
  PRIMARY KEY (`MAPT`),
  KEY `FK_PHIEUTHU_R7_HOCSINH` (`MAHS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieuthu`
--

INSERT INTO `phieuthu` (`MAPT`, `MAHS`, `TENPT`, `NGAYTHU`) VALUES
('PT0001', '2A201', 'Phí Bán Trú', '2014-04-16'),
('PT0002', '1A101', 'Phí Bán Trú', '2010-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `phuhuynh`
--

CREATE TABLE IF NOT EXISTS `phuhuynh` (
  `MAPH` char(10) NOT NULL,
  `TENPH` varchar(30) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH_PH` varchar(4) DEFAULT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `SODT` decimal(11,0) NOT NULL,
  `VAITRO` varchar(10) NOT NULL,
  PRIMARY KEY (`MAPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phuhuynh`
--

INSERT INTO `phuhuynh` (`MAPH`, `TENPH`, `NGAYSINH`, `GIOITINH_PH`, `DIACHI`, `SODT`, `VAITRO`) VALUES
('PH0002', 'Lê Văn Mẹ', '1973-08-04', 'Nữ', 'Bình Minh', 7891235469, 'Mẹ'),
('PH0003', 'Trương Ông Nội', '1955-07-05', 'Nam', 'Đồng Tháp', 123789123, 'Ông nội');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtien`
--

CREATE TABLE IF NOT EXISTS `thanhtien` (
  `MAPT` char(10) NOT NULL,
  `MAPHI` char(10) NOT NULL,
  `SOTIEN` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MAPT`,`MAPHI`),
  KEY `FK_THANHTIE_THANHTIEN_LOAIPHI` (`MAPHI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhtien`
--

INSERT INTO `thanhtien` (`MAPT`, `MAPHI`, `SOTIEN`) VALUES
('PT0001', 'LP0001', 1000000),
('PT0002', 'LP0001', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `thucpham`
--

CREATE TABLE IF NOT EXISTS `thucpham` (
  `MATP` char(10) NOT NULL,
  `MAMON` char(10) NOT NULL,
  `TENTP` varchar(30) NOT NULL,
  PRIMARY KEY (`MATP`),
  KEY `FK_THUCPHAM_R4_MONAN` (`MAMON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thucpham`
--

INSERT INTO `thucpham` (`MATP`, `MAMON`, `TENTP`) VALUES
('TP0001', 'MA0001', 'Bạc hà'),
('TP0002', 'MA0002', 'Hột vịt');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baomau`
--
ALTER TABLE `baomau`
  ADD CONSTRAINT `FK_BAOMAU_BAOMAU2_LOP` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `FK_BAOMAU_BAOMAU3_NAMHOC` FOREIGN KEY (`NAMHOC`) REFERENCES `namhoc` (`NAMHOC`),
  ADD CONSTRAINT `FK_BAOMAU_BAOMAU4_HOCKI` FOREIGN KEY (`HOCKI`) REFERENCES `hocki` (`HOCKI`),
  ADD CONSTRAINT `FK_BAOMAU_BAOMAU_CANBO` FOREIGN KEY (`MACB`) REFERENCES `canbo` (`MACB`);

--
-- Constraints for table `chunhiem`
--
ALTER TABLE `chunhiem`
  ADD CONSTRAINT `FK_CHUNHIEM_CHUNHIEM2_LOP` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `FK_CHUNHIEM_CHUNHIEM3_NAMHOC` FOREIGN KEY (`NAMHOC`) REFERENCES `namhoc` (`NAMHOC`),
  ADD CONSTRAINT `FK_CHUNHIEM_CHUNHIEM4_HOCKI` FOREIGN KEY (`HOCKI`) REFERENCES `hocki` (`HOCKI`),
  ADD CONSTRAINT `FK_CHUNHIEM_CHUNHIEM_CANBO` FOREIGN KEY (`MACB`) REFERENCES `canbo` (`MACB`);

--
-- Constraints for table `dangkyan`
--
ALTER TABLE `dangkyan`
  ADD CONSTRAINT `FK_DANGKYAN_DANGKYAN2_NGAY` FOREIGN KEY (`NGAY`) REFERENCES `ngay` (`NGAY`),
  ADD CONSTRAINT `FK_DANGKYAN_DANGKYAN_HOCSINH` FOREIGN KEY (`MAHS`) REFERENCES `hocsinh` (`MAHS`);

--
-- Constraints for table `hoc`
--
ALTER TABLE `hoc`
  ADD CONSTRAINT `FK_HOC_HOC2_LOP` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `FK_HOC_HOC3_HOCKI` FOREIGN KEY (`HOCKI`) REFERENCES `hocki` (`HOCKI`),
  ADD CONSTRAINT `FK_HOC_HOC4_NAMHOC` FOREIGN KEY (`NAMHOC`) REFERENCES `namhoc` (`NAMHOC`),
  ADD CONSTRAINT `FK_HOC_HOC_HOCSINH` FOREIGN KEY (`MAHS`) REFERENCES `hocsinh` (`MAHS`);

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `FK_HOCSINH_R1_PHUHUYNH` FOREIGN KEY (`MAPH`) REFERENCES `phuhuynh` (`MAPH`);

--
-- Constraints for table `ngay`
--
ALTER TABLE `ngay`
  ADD CONSTRAINT `FK_NGAY_R5_MONAN` FOREIGN KEY (`MAMON`) REFERENCES `monan` (`MAMON`);

--
-- Constraints for table `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD CONSTRAINT `FK_PHIEUCHI_R3_THUCPHAM` FOREIGN KEY (`MATP`) REFERENCES `thucpham` (`MATP`);

--
-- Constraints for table `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD CONSTRAINT `FK_PHIEUTHU_R7_HOCSINH` FOREIGN KEY (`MAHS`) REFERENCES `hocsinh` (`MAHS`);

--
-- Constraints for table `thanhtien`
--
ALTER TABLE `thanhtien`
  ADD CONSTRAINT `FK_THANHTIE_THANHTIEN_LOAIPHI` FOREIGN KEY (`MAPHI`) REFERENCES `loaiphi` (`MAPHI`),
  ADD CONSTRAINT `FK_THANHTIE_THANHTIEN_PHIEUTHU` FOREIGN KEY (`MAPT`) REFERENCES `phieuthu` (`MAPT`);

--
-- Constraints for table `thucpham`
--
ALTER TABLE `thucpham`
  ADD CONSTRAINT `FK_THUCPHAM_R4_MONAN` FOREIGN KEY (`MAMON`) REFERENCES `monan` (`MAMON`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
