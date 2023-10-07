-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 30, 2023 lúc 01:44 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmaufall2023`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `bill_name` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `bill_address` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `bill_tel` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `bill_email` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1.thanh toán trực tiêp, 2.Chuyển khoản, 3.Than toán online',
  `ngaydathang` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `total` int NOT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0.Đơn hàng mới 1.Đang xử lý, 2.Đang giao hàng, 3.Giao hàng thành công',
  `receive_name` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `receive_address` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `receive_tel` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(1, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '11:21:17 30/09/2023', 1200, 0, NULL, NULL, NULL),
(2, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:14:09 30/09/2023', 1200, 0, NULL, NULL, NULL),
(3, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:17:04 30/09/2023', 1200, 0, NULL, NULL, NULL),
(4, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:18:12 30/09/2023', 1200, 0, NULL, NULL, NULL),
(5, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:18:31 30/09/2023', 1200, 0, NULL, NULL, NULL),
(6, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:18:47 30/09/2023', 1200, 0, NULL, NULL, NULL),
(7, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:21:43 30/09/2023', 1200, 0, NULL, NULL, NULL),
(8, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:22:20 30/09/2023', 1200, 0, NULL, NULL, NULL),
(9, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:22:45 30/09/2023', 1200, 0, NULL, NULL, NULL),
(10, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:22:48 30/09/2023', 1200, 0, NULL, NULL, NULL),
(11, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:23:10 30/09/2023', 1200, 0, NULL, NULL, NULL),
(12, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:23:26 30/09/2023', 1200, 0, NULL, NULL, NULL),
(13, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:23:34 30/09/2023', 1200, 0, NULL, NULL, NULL),
(14, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:23:53 30/09/2023', 1200, 0, NULL, NULL, NULL),
(15, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:24:02 30/09/2023', 1200, 0, NULL, NULL, NULL),
(16, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:24:11 30/09/2023', 1200, 0, NULL, NULL, NULL),
(17, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:24:44 30/09/2023', 1200, 0, NULL, NULL, NULL),
(18, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:25:32 30/09/2023', 1200, 0, NULL, NULL, NULL),
(19, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:25:43 30/09/2023', 1200, 0, NULL, NULL, NULL),
(20, 'Phan Lê Anh Tuấn', '', '', 'sutten2004@gmail.com', 1, '01:25:52 30/09/2023', 1200, 0, NULL, NULL, NULL),
(21, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:26:25 30/09/2023', 3399, 0, NULL, NULL, NULL),
(22, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 2, '01:27:10 30/09/2023', 3399, 0, NULL, NULL, NULL),
(23, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:27:22 30/09/2023', 3399, 0, NULL, NULL, NULL),
(24, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:28:17 30/09/2023', 3399, 0, NULL, NULL, NULL),
(25, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:28:48 30/09/2023', 3399, 0, NULL, NULL, NULL),
(26, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:30:19 30/09/2023', 3399, 0, NULL, NULL, NULL),
(27, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:30:35 30/09/2023', 3399, 0, NULL, NULL, NULL),
(28, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:31:39 30/09/2023', 3399, 0, NULL, NULL, NULL),
(29, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:31:56 30/09/2023', 3399, 0, NULL, NULL, NULL),
(30, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:32:45 30/09/2023', 3399, 0, NULL, NULL, NULL),
(31, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:33:08 30/09/2023', 3399, 0, NULL, NULL, NULL),
(32, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:33:20 30/09/2023', 3399, 0, NULL, NULL, NULL),
(33, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:34:04 30/09/2023', 3399, 0, NULL, NULL, NULL),
(34, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:34:42 30/09/2023', 3399, 0, NULL, NULL, NULL),
(35, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0123456789', 'sutten2004@gmail.com', 1, '01:35:22 30/09/2023', 3399, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `iduser` int NOT NULL,
  `idpro` int NOT NULL,
  `ngaybinhluan` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(3, 'kkk', 1, 10, '11:33:09 28/09/2023'),
(4, 'dd', 1, 8, '11:39:12 28/09/2023'),
(5, 'gà', 1, 8, '11:46:56 28/09/2023'),
(6, 'gà', 1, 10, '12:43:49 28/09/2023'),
(7, 'kkkk', 6, 15, '12:46:07 28/09/2023'),
(8, 'Sp tố lắm', 6, 16, '12:57:01 28/09/2023'),
(10, 'Giá này quá đắt :((', 7, 15, '11:35:13 29/09/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idpro` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 2),
(2, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 3),
(3, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 4),
(4, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 5),
(5, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 6),
(6, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 7),
(7, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 8),
(8, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 9),
(9, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 10),
(10, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 11),
(11, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 12),
(12, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 13),
(13, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 14),
(14, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 15),
(15, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 16),
(16, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 17),
(17, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 18),
(18, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 19),
(19, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 20),
(20, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 21),
(21, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 21),
(22, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 21),
(23, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 22),
(24, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 22),
(25, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 22),
(26, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 23),
(27, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 23),
(28, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 23),
(29, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 24),
(30, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 24),
(31, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 24),
(32, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 25),
(33, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 25),
(34, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 25),
(35, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 26),
(36, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 26),
(37, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 26),
(38, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 27),
(39, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 27),
(40, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 27),
(41, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 28),
(42, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 28),
(43, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 28),
(44, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 29),
(45, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 29),
(46, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 29),
(47, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 30),
(48, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 30),
(49, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 30),
(50, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 31),
(51, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 31),
(52, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 31),
(53, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 32),
(54, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 32),
(55, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 32),
(56, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 33),
(57, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 33),
(58, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 33),
(59, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 34),
(60, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 34),
(61, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 34),
(62, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 35),
(63, 8, 16, 'anh-ga-ran.jpg', 'gà', '999.00', 1, 999, 35),
(64, 8, 17, 'product_47b3a5ad05724c418f05b358e3d61493.webp', 'iPhone 12 Pro Max', '1200.00', 1, 1200, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Máy lạnh'),
(2, 'Tivi'),
(3, 'Tủ Lạnh'),
(4, 'Điện Thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `price` double(10,2) DEFAULT '0.00',
  `img` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb3_unicode_520_ci,
  `luotxem` int DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(7, 'gà', 999.00, 'anh-ga-ran.jpg', '<p>444</p>', 231, 2),
(8, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 888, 4),
(9, 'gà', 999.00, 'anh-ga-ran.jpg', '<p>444</p>', 0, 2),
(10, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 1111, 4),
(11, 'gà', 999.00, 'anh-ga-ran.jpg', '<p>444</p>', 0, 2),
(12, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 94, 4),
(13, 'gà', 999.00, 'anh-ga-ran.jpg', '<p>444</p>', 342, 2),
(14, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 0, 4),
(15, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 94, 4),
(16, 'gà', 999.00, 'anh-ga-ran.jpg', '<p>444</p>', 342, 2),
(17, 'iPhone 12 Pro Max', 1200.00, 'product_47b3a5ad05724c418f05b358e3d61493.webp', '<p>iPhone&nbsp;</p>', 0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `user` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `name`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(6, 'kh1', '', '111111', 'k@gmail.com', NULL, NULL, 0),
(7, 'Lily', '', '111111', 'sutten2004@gmail.com', NULL, NULL, 1),
(8, 'kh2', 'Phan Lê Anh Tuấn', '111111', 'sutten2004@gmail.com', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_taikhoan` (`iduser`),
  ADD KEY `fk_cart_sanpham` (`idpro`),
  ADD KEY `fk_cart_bill` (`idbill`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cart_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cart_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
