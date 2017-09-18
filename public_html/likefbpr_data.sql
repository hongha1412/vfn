-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 05, 2017 lúc 12:32 PM
-- Phiên bản máy phục vụ: 5.6.36-cll-lve
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `likefbpr_data2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ACCOUNT`
--

CREATE TABLE `ACCOUNT` (
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vnd` varchar(32) CHARACTER SET utf8 NOT NULL,
  `toida` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id` int(10) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sdt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `level` text NOT NULL,
  `kichhoat` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `avt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about` varchar(255) CHARACTER SET utf8 NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `macode` varchar(264) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `BLOCK`
--

CREATE TABLE `BLOCK` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `thoigian` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CAMXUC`
--

CREATE TABLE `CAMXUC` (
  `id` int(10) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(260) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `camxuc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Gift_LIKE`
--

CREATE TABLE `Gift_LIKE` (
  `id` int(11) NOT NULL,
  `magift` text NOT NULL,
  `time` text NOT NULL,
  `user` text NOT NULL,
  `menhgia` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `LOG_BUY`
--

CREATE TABLE `LOG_BUY` (
  `id` int(10) NOT NULL,
  `nguoiadd` varchar(50) NOT NULL,
  `goi` varchar(2) NOT NULL,
  `loaivip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idvip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `LOG_CARD`
--

CREATE TABLE `LOG_CARD` (
  `id` int(11) NOT NULL,
  `nguoinhan` text NOT NULL,
  `time` text NOT NULL,
  `mathe` text NOT NULL,
  `seri` text NOT NULL,
  `menhgia` text NOT NULL,
  `loaithe` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `LOG_GIFT`
--

CREATE TABLE `LOG_GIFT` (
  `id` int(10) NOT NULL,
  `nguoinhan` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `menhgia` varchar(32) NOT NULL,
  `magift` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL DEFAULT '11',
  `text` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `text`, `time`) VALUES
(1, 'Server Like Đã Hoạt Động Lại Bình Thường .', '1504583134');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `token2`
--

CREATE TABLE `token2` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokencmt`
--

CREATE TABLE `tokencmt` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokenpage`
--

CREATE TABLE `tokenpage` (
  `id` int(11) NOT NULL,
  `idfb` varchar(32) NOT NULL,
  `ten` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `VIP`
--

CREATE TABLE `VIP` (
  `id` int(10) NOT NULL,
  `idfb` bigint(21) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) NOT NULL,
  `goi` varchar(2) CHARACTER SET utf8 NOT NULL,
  `time` int(10) NOT NULL,
  `solike` int(11) NOT NULL DEFAULT '0',
  `limitpost` int(11) NOT NULL DEFAULT '0',
  `chuthich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vipcmt`
--

CREATE TABLE `vipcmt` (
  `id` int(10) NOT NULL,
  `idfb` bigint(21) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) NOT NULL,
  `noidung` text NOT NULL,
  `goi` varchar(2) NOT NULL,
  `time` int(10) NOT NULL,
  `socmt` int(11) NOT NULL DEFAULT '0',
  `limitpost` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vipshare`
--

CREATE TABLE `vipshare` (
  `id` int(10) NOT NULL,
  `idfb` bigint(21) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) NOT NULL,
  `goi` varchar(2) CHARACTER SET utf8 NOT NULL,
  `time` int(10) NOT NULL,
  `soshare` int(11) NOT NULL DEFAULT '0',
  `limitpost` int(11) NOT NULL DEFAULT '0',
  `chuthich` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `BLOCK`
--
ALTER TABLE `BLOCK`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `CAMXUC`
--
ALTER TABLE `CAMXUC`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Gift_LIKE`
--
ALTER TABLE `Gift_LIKE`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `LOG_BUY`
--
ALTER TABLE `LOG_BUY`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `LOG_CARD`
--
ALTER TABLE `LOG_CARD`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `LOG_GIFT`
--
ALTER TABLE `LOG_GIFT`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `token2`
--
ALTER TABLE `token2`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokencmt`
--
ALTER TABLE `tokencmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokenpage`
--
ALTER TABLE `tokenpage`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `VIP`
--
ALTER TABLE `VIP`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vipcmt`
--
ALTER TABLE `vipcmt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vipshare`
--
ALTER TABLE `vipshare`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `BLOCK`
--
ALTER TABLE `BLOCK`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `CAMXUC`
--
ALTER TABLE `CAMXUC`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `Gift_LIKE`
--
ALTER TABLE `Gift_LIKE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `LOG_BUY`
--
ALTER TABLE `LOG_BUY`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `LOG_CARD`
--
ALTER TABLE `LOG_CARD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `LOG_GIFT`
--
ALTER TABLE `LOG_GIFT`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `token2`
--
ALTER TABLE `token2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tokencmt`
--
ALTER TABLE `tokencmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tokenpage`
--
ALTER TABLE `tokenpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `VIP`
--
ALTER TABLE `VIP`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `vipcmt`
--
ALTER TABLE `vipcmt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `vipshare`
--
ALTER TABLE `vipshare`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
