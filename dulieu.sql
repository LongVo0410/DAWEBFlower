-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2024 at 05:30 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`id`, `name`, `email`, `password`, `phone`, `signup_time`, `otp`, `activate_code`, `status`, `admin_status`) VALUES
(76, 'Longg', 'longvo04100000@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '036496489', '2024-10-01 17:17:16', '31297', 'ldhf69bg2km6ejao14ic268n', '1', 0),
(77, 'DADA', 'longvo04100000@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '0364964897', '2024-10-01 17:10:35', '54318', 'ldhf69bg2km6ejao14ic268n', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `danhmuc_id` int NOT NULL AUTO_INCREMENT,
  `danhmuc_ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_ten`) VALUES
(2, 'Hoa mười giờ'),
(7, 'Hoa hồng'),
(5, 'Hoa tú1'),
(6, 'dada');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
