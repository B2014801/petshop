-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2023 lúc 03:29 PM
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
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `id_binhluan` int(100) NOT NULL,
  `id_sanpham` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `noidung` varchar(300) NOT NULL,
  `ngay_binhluan` datetime NOT NULL,
  `so_sao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`id_binhluan`, `id_sanpham`, `id_taikhoan`, `noidung`, `ngay_binhluan`, `so_sao`) VALUES
(46, 9, 54, 'ưng ý', '2023-04-20 19:53:11', 5),
(47, 9, 41, 'chất lượng cao!!!', '2023-04-20 20:02:07', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_sanpham` int(11) NOT NULL,
  `soluong_sanpham` int(11) NOT NULL,
  `gia_sp_lucmua` varchar(100) NOT NULL,
  `tam_tinh` varchar(100) NOT NULL,
  `id_donhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_sanpham`, `soluong_sanpham`, `gia_sp_lucmua`, `tam_tinh`, `id_donhang`) VALUES
(32, 2, '13720000', '27.440.000', 206),
(33, 1, '19000000', '19.000.000', 206),
(32, 2, '13720000', '27.440.000', 207),
(33, 1, '19000000', '19.000.000', 207);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `ngay_dathang`, `ngay_giao`, `tong_tien`, `id_taikhoan`, `trangthai_donhang`, `hinhthuc_thanhtoan`, `hien_thi`) VALUES
(206, '2022-05-20', '2023-04-23', '46.440.000', 52, 1, 'khi nhận hàng', 0),
(207, '2022-04-20', '2022-04-23', '46.440.000', 52, 0, 'khi nhận hàng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(100) NOT NULL,
  `id_taikhoan` int(100) NOT NULL,
  `id_sanpham` int(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `id_taikhoan`, `id_sanpham`, `soluong`) VALUES
(109, 36, 16, 1),
(129, 49, 20, 3),
(130, 41, 20, 1),
(134, 41, 11, 5),
(136, 49, 26, 1),
(138, 49, 10, 1),
(140, 49, 27, 1),
(141, 52, 32, 2),
(144, 52, 33, 1);

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
(1, 'CHÓ PHỐC SÓC', 'chó cảnh', 'socminiparkty.jpg'),
(2, 'CHÓ CORGI CHÂN LÙN', 'chó cảnh', 'cho-corgi.jpg'),
(3, 'CHÓ ALASKA', 'chó cảnh', 'banchoalaska154_JxRCzK7L.jpg'),
(4, 'CHÓ POODLE', 'chó cảnh', 'poddle.jpg'),
(5, 'MÈO ANH LÔNG NGẮN', 'mèo cảnh', 'meo-anh-long-ngan-2.jpg'),
(6, 'MÈO ANH LÔNG DÀI', 'mèo cảnh', 'meo-anh-long-dai.jpg'),
(7, 'MÈO HIMALAYA', 'mèo cảnh', 'meo-himalaya.jpg'),
(8, 'MÈO RAGDOLL', 'mèo cảnh', 'ragradoll.jpeg'),
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

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensp`, `hinhanhsp`, `giasp`, `soluongsp`, `motasp`, `tinhtrangsp`, `id_hieusanpham`, `giam_gia`) VALUES
(9, 'Mèo Anh lông ngắn xám', '1680142090_meo-anh-long-ngan-2.jpg', '12.000.000', 0, '', 1, 5, 7),
(10, 'Mèo Anh lông dài trắng', '1680141379_phocsoc.jpg', '12.000.000', 26, '', 1, 6, 50),
(11, 'Chó Phốc Sóc Bò Sữa', '1680140586_socbosua.jpg', '7.000.000', 35, '', 1, 1, 0),
(19, 'Chó Phốc Sóc Teacup', '1680140405_teacup-phoc-soc_0.jpg', '14.000.000', 40, '', 1, 1, 12),
(27, 'Chó Phốc Sóc vàng cam', '1680142557_soc-vang-cam.jpg', '12.000.000', 30, 'là', 1, 1, 0),
(28, 'Chó Phốc Sóc mặt gấu vàng', '1680141362_socvang.jpg', '25.000.000', 10, 'là giống chó dễ thương', 1, 1, 4),
(29, 'Chó Phốc Sóc đen tuyền', '1680141446_cho-phoc-soc-den.jpg', '9.000.000', 14, '', 1, 1, 3),
(30, 'Chó Phốc Sóc mini party', '1680141503_socminiparkty.jpg', '12.000.000', 6, '', 1, 1, 0),
(31, 'Chó Phốc Sóc Màu Lông Kem', '1680141546_cho-phoc-soc-mau-long-kem-1024x576.jpg', '12.000.000', 24, '', 1, 1, 0),
(32, 'Chó Phốc Sóc xám', '1680141643_socxam.jpg', '14.000.000', 0, '', 1, 1, 2),
(33, 'Chó Phốc Sóc mặt gấu vjp', '1680271292_cho-phoc-soc-mat-gau-vjp.jpg', '19.000.000', 2, '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `vaitro` varchar(10) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`id_taikhoan`, `hoten`, `email`, `matkhau`, `vaitro`, `diachi`, `hinhanh`, `so_dien_thoai`) VALUES
(41, 'user', 'user@gmail.com', 'trung1234', 'user', 'bình thuỷ, cần thơ', 'trung.jpg', '09250811'),
(52, 'admin', 'admin@gmail.com', 'trung1234', 'admin', 'bình thuỷ, cần thơ', '', '09250811'),
(54, 'Thanh', 'user2@gmail.com', 'trung1234', 'user', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthai`
--

CREATE TABLE `tbl_trangthai` (
  `id_trangthai` int(11) NOT NULL,
  `ten_trangthai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trangthai`
--

INSERT INTO `tbl_trangthai` (`id_trangthai`, `ten_trangthai`) VALUES
(0, 'chưa duyệt'),
(1, 'đã duyệt'),
(2, 'đang giao'),
(3, 'đã giao');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`id_binhluan`);

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
-- Chỉ mục cho bảng `tbl_trangthai`
--
ALTER TABLE `tbl_trangthai`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `id_binhluan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `tbl_hieusanpham`
--
ALTER TABLE `tbl_hieusanpham`
  MODIFY `id_hieusanpham` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
