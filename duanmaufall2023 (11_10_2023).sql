-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 11, 2023 lúc 10:24 AM
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
  `iduser` int DEFAULT '0',
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

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(60, 40, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0774808219', 'sutten2004@gmail.com', 1, '01:51:24 07/10/2023', 499, 0, NULL, NULL, NULL),
(61, 40, 'Phan Lê Anh Tuấn', '424 Thái Hà', '0774808219', 'sutten2004@gmail.com', 1, '09:43:05 08/10/2023', 499, 0, NULL, NULL, NULL),
(62, 40, 'Phan Lê Anh Tuấn', '44 Cần Thơ', '0774808219', 'sutten2004@gmail.com', 1, '10:42:39 10/10/2023', 26246, 0, NULL, NULL, NULL),
(63, 40, 'Phan Lê Anh Tuấn', '44 Cần Thơ', '0774808219', 'sutten2004@gmail.com', 1, '10:46:52 10/10/2023', 26246, 0, NULL, NULL, NULL);

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
(10, 'Giá này quá đắt :((', 7, 15, '11:35:13 29/09/2023'),
(11, 'hình hài cốt vậy :))', 22, 78, '02:31:47 06/10/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idpro` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `price` int NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(32, 40, 86, 'tu-lanh-panason_multi_0_956_1020.png.webp', 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499, 1, 499, 60),
(33, 40, 86, 'tu-lanh-panason_multi_0_956_1020.png.webp', 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499, 1, 499, 61),
(34, 40, 141, 'action-button-iphone-15.jpeg', 'Iphone', 13123, 1, 13123, 62),
(35, 40, 136, 'action-button-iphone-15.jpeg', 'Iphone', 13123, 1, 13123, 62),
(36, 40, 141, 'action-button-iphone-15.jpeg', 'Iphone', 13123, 1, 13123, 63),
(37, 40, 136, 'action-button-iphone-15.jpeg', 'Iphone', 13123, 1, 13123, 63);

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
(3, 'Tủ Lạnh'),
(4, 'Điện Thoại'),
(31, 'Điều Hòa'),
(33, 'Tivi');

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
(104, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(131, 'Iphone', 13123.00, 'action-button-iphone-15.jpeg', '', 0, 1),
(132, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(133, 'Iphone', 13123.00, 'action-button-iphone-15.jpeg', '', 0, 1),
(134, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(135, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(136, 'Iphone', 13123.00, 'action-button-iphone-15.jpeg', '', 0, 1),
(137, 'Iphone', 13123.00, 'action-button-iphone-15.jpeg', '', 0, 1),
(138, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(139, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(140, 'Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV', 499.00, 'tu-lanh-panason_multi_0_956_1020.png.webp', '<h2>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV</h2><h3>Thiết kế phẳng tối giản, hiện đại</h3><p>Tủ Lạnh Panasonic Inverter 325 Lít NR-BV361BPKV sở hữu thiết kế phẳng, tràn viền tạo nên những đường nét tinh tế ấn tượng.</p><p>Cửa tủ lạnh được làm từ chất liệu thép không gỉ không những giúp sản phẩm có độ bền cao hơn mà còn mang đến nét đẹp đẳng cấp, phù hợp với mọi phong cách thiết kế của gia đình bạn.</p><p>Với dung tích 325L thì chiếc&nbsp;<a href=\"https://dienmaycholon.vn/tu-lanh-panasonic?u=cap-dong-mem\">tủ lạnh Panasonic ngăn đông mềm</a>&nbsp;này sẽ&nbsp;hoàn toàn&nbsp;phù hợp cho gia đình có từ 3-4 thành viên sử dụng để bảo quản thực phẩm.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/thiet-ke-phang-toi-gian-hien-dai.jpg\" alt=\"Thiết kế phẳng tối giản, hiện đại\"></figure><p><i>Thiết kế phẳng tối giản, hiện đại</i></p><h3>Công nghệ Blue Ag diệt khuẩn 99,99%</h3><p>Công nghệ Blue Ag ức chế sự phát triển của vi khuẩn bằng các ion bạc và đèn LED xanh giúp bảo quản thực phẩm sạch sẽ. Loại bỏ 99,99% vi khuẩn, nấu ăn lành mạnh từ những nguyên liệu sạch.</p><figure class=\"image\"><img src=\"https://cdn11.dienmaycholon.vn/filewebdmclnew/public/userupload/files/mtsp/dien-lanh/Panasonic-Inverter-325Lit-NR-BV361BPKV/cong-nghe-blue-ag-diet-khuan-99-99.jpg\" alt=\"Công nghệ Blue Ag diệt khuẩn 99,99%\"></figure><p><i>Công nghệ Blue Ag diệt khuẩn 99,99%</i></p>', 0, 3),
(141, 'Iphone', 13123.00, 'action-button-iphone-15.jpeg', '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `user` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_520_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8mb3_unicode_520_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `name`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(40, 'Lily', 'Phan Lê Anh Tuấn', '$2y$10$FkOJ/G/GN.oHKjfErSle.eQJgx4TZVpINPnkBbFRR5cvcHr6Va1f6', 'sutten2004@gmail.com', '44 Cần Thơ', '0774808219', 1),
(41, 'kh1', 'kk', '$2y$10$pVXSjAVBI5m4pxQp2.KFlOD0.5sOTscbN7HDDDjpPviF1.JKS5IGm', 'k@gmail.com', NULL, NULL, 0),
(42, 'tuancute', 'tuancute', '$2y$10$pVXSjAVBI5m4pxQp2.KFlOD0.5sOTscbN7HDDDjpPviF1.JKS5IGm', 'tuan@gmail.com', NULL, NULL, 0);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
