-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 08:11 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_hoa_tuoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhkhuyenmai`
--

CREATE TABLE `chuongtrinhkhuyenmai` (
  `id` int(11) NOT NULL,
  `ten_km` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `phantramgiam` int(11) NOT NULL,
  `hinhanhkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhkhuyenmai`
--

INSERT INTO `chuongtrinhkhuyenmai` (`id`, `ten_km`, `mota`, `phantramgiam`, `hinhanhkm`) VALUES
(1, 'Khai trương', 'Khuyến mãi nhân dịp ngày khai trương của shop ', 30, 'khuyenmai2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Hoa Hồng'),
(2, 'Hoa Lily'),
(3, 'Hoa Baby'),
(4, 'Hoa Cẩm Tú Cầu'),
(5, 'Hoa Cúc Tana'),
(6, 'Hoa Đồng Tiền'),
(7, 'Hoa Hướng Dương'),
(8, 'Hoa Loa Kèn'),
(9, 'Hoa Mẫu Đơn'),
(10, 'Hoa Tulip');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL,
  `tongtien` float NOT NULL,
  `ghichu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmh` text NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `mota` text NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL,
  `true_false_km` int(1) NOT NULL,
  `khuyenmai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`id`, `tenmh`, `danhmuc_id`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `luotxem`, `luotmua`, `true_false_km`, `khuyenmai_id`) VALUES
(1, 'Ngôn ngữ tình yêu', 1, 'Bó hoa hồng xinh đẹp dành tặng cho nửa kia', 1900000, 2500000, 5, 'hoahong1.jpg', 0, 0, 1, 1),
(2, 'Tình yêu rực cháy', 1, 'Bó hoa hồng tươi xinh xắn giành tặng cho người yêu', 800000, 1500000, 2, 'hoahong2.jpg', 0, 0, 1, 1),
(3, 'Hương vị tình yêu', 1, 'Món quà ý nghĩa dành tặng cho người thương', 200000, 3500000, 1, 'hoahong3.jpg', 0, 0, 1, 1),
(4, 'Sắc màu yêu thương', 1, 'Đóa hoa hồng quyến rũ xinh đẹp, món quà ý nghĩa cho người yêu', 850000, 1000000, 1, 'hoahong4.jg', 0, 0, 1, 1),
(5, 'Chứng nhân tình yêu', 1, 'Đóa hoa hồng đỏ sang trọng giành cho phái đẹp', 1000000, 1800000, 2, 'hoahong5.jpg', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` int(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`, `diachi`) VALUES
(1, 'elkogarden@elko.com', '0763841190', '123', 'Elko Garden', 1, 1, 'admin.jpeg', '18 Ung Văn Khiêm, phường Đông Xuyên, TP Long Xuyên, An Giang.'),
(2, 'nhanvien1@elko.com', '0773669783', '123', 'Dương Thùy Linh', 2, 1, 'nhanvien1.jpeg', '27 Hà Hoàn Hổ, phường Đông Xuyên, TP Long Xuyên, An Giang'),
(3, 'nhanvien2@elko.com', '0328003077', '123', 'Lâm Huy', 2, 1, 'nhanvien2.jpeg', 'Chợ Mới, Long Xuyên, An Giang'),
(4, 'phungshop@gmail.com', '0345705630', '123', 'Lê Mỹ Phụng', 3, 1, 'khachhang1.jpeg', 'Seoul, Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `tenquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `tenquyen`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Customers');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_dh` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hdct_dh` (`donhang_id`),
  ADD KEY `dhct_sp` (`sanpham_id`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanloai` (`danhmuc_id`),
  ADD KEY `khuyenmai_id` (`khuyenmai_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanquyen` (`loai`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nguoidung_dh` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `dhct_sp` FOREIGN KEY (`sanpham_id`) REFERENCES `mathang` (`id`),
  ADD CONSTRAINT `hdct_dh` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `fk_danhmuc_mathang` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `fk_khuyenmai_mathang` FOREIGN KEY (`khuyenmai_id`) REFERENCES `chuongtrinhkhuyenmai` (`id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `phanquyen` FOREIGN KEY (`loai`) REFERENCES `quyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
