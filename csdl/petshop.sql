-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 16, 2023 lúc 05:06 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_taikhoan` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `ten_admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_taikhoan`, `email`, `matkhau`, `admin_status`, `ten_admin`) VALUES
(1, 'admin@gmail.com', '1234', 1, 'trung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `id_binhluan` int(100) NOT NULL,
  `id_sanpham` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `noidung` varchar(300) NOT NULL,
  `ngay_binhluan` date NOT NULL,
  `so_sao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`id_binhluan`, `id_sanpham`, `id_taikhoan`, `noidung`, `ngay_binhluan`, `so_sao`) VALUES
(18, 10, 41, 'tốt', '2023-03-12', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong_sanpham` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `gia_sp_lucmua` varchar(100) NOT NULL,
  `tam_tinh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(1, 'chó cảnh'),
(2, 'mèo cảnh'),
(3, 'phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `ngay_dathang` date NOT NULL,
  `ngay_giao` date NOT NULL,
  `tong_tien` varchar(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `trangthai_donhang` int(100) NOT NULL,
  `hinhthuc_thanhtoan` varchar(100) NOT NULL,
  `hien_thi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `tongtien` int(200) NOT NULL,
  `id_sanpham` int(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `id_taikhoan`, `tongtien`, `id_sanpham`, `soluong`) VALUES
(109, 36, 0, 16, 1),
(116, 41, 0, 11, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hieusanpham`
--

CREATE TABLE `tbl_hieusanpham` (
  `id_hieusanpham` int(100) NOT NULL,
  `tenhieusp` varchar(200) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `anhhieusanpham` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hieusanpham`
--

INSERT INTO `tbl_hieusanpham` (`id_hieusanpham`, `tenhieusp`, `tendanhmuc`, `anhhieusanpham`) VALUES
(1, 'CHÓ PHỐC SÓC', 'chó cảnh', 'phocsoc.jpg'),
(2, 'CHÓ CORGI CHÂN LÙN', 'chó cảnh', 'anh-cho-Corgi-1247x1496.jpg'),
(3, 'CHÓ ALASKA', 'chó cảnh', 'alaska.jpg'),
(4, 'CHÓ POODLE', 'chó cảnh', 'poodle.jpg'),
(5, 'MÈO ANH LÔNG NGẮN', 'mèo cảnh', 'anh-meo-Anh-long-ngan-4.jpg'),
(6, 'MÈO ANH LÔNG DÀI', 'mèo cảnh', 'anh-meo-Anh-long-dai-2.jpg'),
(7, 'MÈO HIMALAYA', 'mèo cảnh', 'anh-meo-Himalaya-2.png'),
(8, 'MÈO RAGDOLL', 'mèo cảnh', 'anh-meo-Ragoll-5-1247x1280.jpg'),
(14, 'thức ăn cho chó', 'phụ kiện', 'thucancho.jpg'),
(15, 'thức ăn cho mèo', 'phụ kiện', 'thucanmeo.jpg'),
(16, ' Vòng cổ, Dây Dắt, Rọ Mõm', 'phụ kiện', 'vongco.jpg'),
(17, ' Sữa Tắm, Khăn Tắm, Nước Hoa', 'phụ kiện', 'suatam.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `hinhanhsp` varchar(50) NOT NULL,
  `giasp` varchar(100) NOT NULL,
  `soluongsp` int(11) NOT NULL,
  `motasp` tinytext NOT NULL,
  `tinhtrangsp` int(11) NOT NULL,
  `id_hieusanpham` int(100) NOT NULL,
  `giam_gia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensp`, `masp`, `hinhanhsp`, `giasp`, `soluongsp`, `motasp`, `tinhtrangsp`, `id_hieusanpham`, `giam_gia`) VALUES
(9, 'Mèo', 'm01', 'anh-meo-anh-long-ngan-822929228899-1247x956.jpg', '12.000.000', 0, 'mèo', 0, 5, 7),
(10, 'Mèo', 'm0123', 'anh-meo-Anh-long-dai-2.jpg', '12.000.000', 2, '', 0, 6, 50),
(11, 'Chó', 'C02', 'anh-cho-phoc-soc-mini.jpg', '13.000.000', 3, 'ham', 0, 1, 0),
(19, 'mẹc', '', 'anh-cho-Corgi-1247x1496.jpg', '14.000.000', 2, '', 0, 1, 8),
(20, 'chó sóc lùn', '', 'poodle.jpg', '12.900.000', 7, 'ăn nhiều', 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`id_taikhoan`, `tenkhachhang`, `email`, `matkhau`, `diachi`, `hinhanh`, `so_dien_thoai`) VALUES
(41, 'trung', 'tennguoidungtaotaikhoan@gmail.com', 'trung1234', 'ctu', 'cantho.jpg', '092508');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`id_binhluan`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `tbl_hieusanpham`
--
ALTER TABLE `tbl_hieusanpham`
  ADD PRIMARY KEY (`id_hieusanpham`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `id_binhluan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `tbl_hieusanpham`
--
ALTER TABLE `tbl_hieusanpham`
  MODIFY `id_hieusanpham` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
