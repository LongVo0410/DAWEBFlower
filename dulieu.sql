-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2024 at 03:27 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

DROP TABLE IF EXISTS `dangky`;
CREATE TABLE IF NOT EXISTS `dangky` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `signup_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `otp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `activate_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `name`, `email`, `password`, `phone`, `signup_time`, `otp`, `activate_code`, `status`, `admin_status`) VALUES
(88, 'Dagia', 'longspin0110@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0364964897', '0000-00-00 00:00:00', '06583', 'oj7a9m328fnh4b92cil1ekdg', '0', 0),
(76, 'Longg', 'longvo0410@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0364964895', '2024-10-01 17:35:46', '31297', 'ldhf69bg2km6ejao14ic268n', '1', 1),
(77, 'David', 'longvo04100000@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '0364964897', '2024-10-01 17:36:05', '54318', 'ldhf69bg2km6ejao14ic268n', '0', 0),
(84, 'Long', '123@gmail.com', '123123', '', '0000-00-00 00:00:00', '', '', '1', 1),
(85, 'Long', '123@gmail.com', '11', '', '0000-00-00 00:00:00', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `danhmuc_id` int NOT NULL AUTO_INCREMENT,
  `danhmuc_ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_ten`) VALUES
(9, 'Kaka'),
(2, 'Hoa mười giờ'),
(8, 'ConCu'),
(7, 'Hoa hồng'),
(5, 'Hoa tú1'),
(6, 'dada'),
(10, 'Gucci');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `ten_sanpham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ma_sanpham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gia_sanpham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soluong_sanpham` int NOT NULL,
  `hinhanh_sanpham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tomtat_sanpham` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `noidung_sanpham` text COLLATE utf8mb4_general_ci NOT NULL,
  `tinhtrang_sanpham` int NOT NULL,
  `danhmuc_id` int NOT NULL,
  PRIMARY KEY (`id_sanpham`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `ten_sanpham`, `ma_sanpham`, `gia_sanpham`, `soluong_sanpham`, `hinhanh_sanpham`, `tomtat_sanpham`, `noidung_sanpham`, `tinhtrang_sanpham`, `danhmuc_id`) VALUES
(19, 'Hoa', '123', '123', 123, '1727991817_1727991817_hoa1.jpg', '123', '123', 1, 5),
(18, 'HC', '11A', '123AS', 123, '1728031708_hoa5.jpg', '123', '123', 2, 8),
(20, 'Mama kêu gọi', '124', '2589', 5, '1728071261_hoa7.jpg', '123', '123', 1, 7),
(21, 'Mama kêu gọi', '124', '2589', 5, '1728071302_hoa3.jpg', '123', '123', 1, 8),
(22, 'Mama kêu gọi', '124', '2589', 5, '1728071450_hoa3.jpg', '123123', '123123', 1, 8),
(23, 'Hoa cẩm tú cầu', '897', '1000đ', 1, '1728147326_be-love.jpg', 'Hoa cho Phương', 'Hoa cho Phương', 1, 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
