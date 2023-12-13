-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2023 lúc 02:20 PM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `tenquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
