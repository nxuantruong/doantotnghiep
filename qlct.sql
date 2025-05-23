-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 04:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlct`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitieucodinh`
--

CREATE TABLE `chitieucodinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `sotien` decimal(10,0) DEFAULT NULL,
  `diengiai` varchar(500) NOT NULL,
  `ngay` varchar(250) NOT NULL,
  `thoigian` varchar(250) NOT NULL,
  `loaichitieucodinh_id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitieucodinh`
--

INSERT INTO `chitieucodinh` (`id`, `ten`, `sotien`, `diengiai`, `ngay`, `thoigian`, `loaichitieucodinh_id`, `taikhoan_id`) VALUES
(1, 'Ăn sáng', 150000, 'bánh mì', '2032-03-24', '00:35', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `chitieuphatsinh`
--

CREATE TABLE `chitieuphatsinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `sotien` decimal(10,0) DEFAULT NULL,
  `diengiai` varchar(500) NOT NULL,
  `ngay` varchar(250) NOT NULL,
  `thoigian` varchar(250) NOT NULL,
  `loaichitieuphatsinh_id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoantietkiem`
--

CREATE TABLE `khoantietkiem` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `sotien` decimal(10,0) DEFAULT NULL,
  `diengiai` varchar(500) NOT NULL,
  `ngay` varchar(250) NOT NULL,
  `thoigian` varchar(250) NOT NULL,
  `loaitietkiem_id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoantietkiem`
--

INSERT INTO `khoantietkiem` (`id`, `ten`, `sotien`, `diengiai`, `ngay`, `thoigian`, `loaitietkiem_id`, `taikhoan_id`) VALUES
(1, 'Hikei', 6120000, 'vay lãi', '2025-05-14', '20:50', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `loaichitieucodinh`
--

CREATE TABLE `loaichitieucodinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaichitieucodinh`
--

INSERT INTO `loaichitieucodinh` (`id`, `ten`) VALUES
(1, 'Ăn uống'),
(3, 'Con cái'),
(6, 'Tiền nhà');

-- --------------------------------------------------------

--
-- Table structure for table `loaichitieuphatsinh`
--

CREATE TABLE `loaichitieuphatsinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaichitieuphatsinh`
--

INSERT INTO `loaichitieuphatsinh` (`id`, `ten`) VALUES
(1, 'Mua sắm'),
(2, 'Du lịch'),
(3, 'Quà cáp'),
(4, 'Giải trí'),
(5, 'Xã hội'),
(6, 'Làm đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `loaithunhapchinh`
--

CREATE TABLE `loaithunhapchinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithunhapchinh`
--

INSERT INTO `loaithunhapchinh` (`id`, `ten`) VALUES
(1, 'Lương'),
(7, 'Tiền thưởng');

-- --------------------------------------------------------

--
-- Table structure for table `loaithunhapphu`
--

CREATE TABLE `loaithunhapphu` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithunhapphu`
--

INSERT INTO `loaithunhapphu` (`id`, `ten`) VALUES
(2, 'Tiền lãi'),
(3, 'Tiền tặng');

-- --------------------------------------------------------

--
-- Table structure for table `loaitietkiem`
--

CREATE TABLE `loaitietkiem` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitietkiem`
--

INSERT INTO `loaitietkiem` (`id`, `ten`) VALUES
(1, 'Gửi ngân hàng'),
(3, 'Bỏ heo đất');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(250) NOT NULL,
  `taikhoan` varchar(250) NOT NULL,
  `matkhau` varchar(250) NOT NULL,
  `avatar` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ten`, `taikhoan`, `matkhau`, `avatar`, `address`, `gender`, `birthdate`) VALUES
(1, 'Bảo Trinh 23', 'baotrinh', '123456', 'uploads/batman-the-dark-knight-minimal-ac-1080x1920.jpg', 'Hà Nội 1', 'male', '2002-06-02'),
(4, 'Ngô Xuân Trường', 'truong2309', '123456', 'uploads/2.webp', 'hà nội', 'male', '2004-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `thunhapchinh`
--

CREATE TABLE `thunhapchinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(250) NOT NULL,
  `sotien` decimal(10,0) NOT NULL,
  `diengiai` varchar(500) NOT NULL,
  `ngay` varchar(250) NOT NULL,
  `thoigian` varchar(250) NOT NULL,
  `loaithunhapchinh_id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thunhapchinh`
--

INSERT INTO `thunhapchinh` (`id`, `ten`, `sotien`, `diengiai`, `ngay`, `thoigian`, `loaithunhapchinh_id`, `taikhoan_id`) VALUES
(1, 'Tiền lương tháng 9', 10000000, 'abc', '2024-10-03', '15:50', 1, 1),
(7, 'Lương tháng 5', 10000000, 'No', '2025-05-17', '16:28', 1, 4),
(8, 'Lương tháng 6', 1111111, 'no', '2025-05-17', '16:29', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `thunhapphu`
--

CREATE TABLE `thunhapphu` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `sotien` decimal(10,0) DEFAULT NULL,
  `diengiai` varchar(500) NOT NULL,
  `ngay` varchar(250) NOT NULL,
  `thoigian` varchar(250) NOT NULL,
  `loaithunhapphu_id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thunhapphu`
--

INSERT INTO `thunhapphu` (`id`, `ten`, `sotien`, `diengiai`, `ngay`, `thoigian`, `loaithunhapphu_id`, `taikhoan_id`, `status`) VALUES
(1, 'Lãi ngân hàng tháng 5', 100000, 'không có', '2025-05-21', '22:39', 2, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitieucodinh`
--
ALTER TABLE `chitieucodinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaichitieucodinh_id` (`loaichitieucodinh_id`),
  ADD KEY `taikhoan_id` (`taikhoan_id`);

--
-- Indexes for table `chitieuphatsinh`
--
ALTER TABLE `chitieuphatsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaichitieuphatsinh_id` (`loaichitieuphatsinh_id`),
  ADD KEY `taikhoan_id` (`taikhoan_id`);

--
-- Indexes for table `khoantietkiem`
--
ALTER TABLE `khoantietkiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitietkiem_id` (`loaitietkiem_id`),
  ADD KEY `taikhoan_id` (`taikhoan_id`);

--
-- Indexes for table `loaichitieucodinh`
--
ALTER TABLE `loaichitieucodinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaichitieuphatsinh`
--
ALTER TABLE `loaichitieuphatsinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaithunhapchinh`
--
ALTER TABLE `loaithunhapchinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaithunhapphu`
--
ALTER TABLE `loaithunhapphu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaitietkiem`
--
ALTER TABLE `loaitietkiem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thunhapchinh`
--
ALTER TABLE `thunhapchinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaithunhapchinh_id` (`loaithunhapchinh_id`),
  ADD KEY `taikhoan_id` (`taikhoan_id`);

--
-- Indexes for table `thunhapphu`
--
ALTER TABLE `thunhapphu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaithunhapphu_id` (`loaithunhapphu_id`),
  ADD KEY `taikhoan_id` (`taikhoan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitieucodinh`
--
ALTER TABLE `chitieucodinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chitieuphatsinh`
--
ALTER TABLE `chitieuphatsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoantietkiem`
--
ALTER TABLE `khoantietkiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaichitieucodinh`
--
ALTER TABLE `loaichitieucodinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loaichitieuphatsinh`
--
ALTER TABLE `loaichitieuphatsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loaithunhapchinh`
--
ALTER TABLE `loaithunhapchinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loaithunhapphu`
--
ALTER TABLE `loaithunhapphu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaitietkiem`
--
ALTER TABLE `loaitietkiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thunhapchinh`
--
ALTER TABLE `thunhapchinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thunhapphu`
--
ALTER TABLE `thunhapphu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitieucodinh`
--
ALTER TABLE `chitieucodinh`
  ADD CONSTRAINT `chitieucodinh_ibfk_1` FOREIGN KEY (`loaichitieucodinh_id`) REFERENCES `loaichitieucodinh` (`id`),
  ADD CONSTRAINT `chitieucodinh_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `chitieuphatsinh`
--
ALTER TABLE `chitieuphatsinh`
  ADD CONSTRAINT `chitieuphatsinh_ibfk_1` FOREIGN KEY (`loaichitieuphatsinh_id`) REFERENCES `loaichitieuphatsinh` (`id`),
  ADD CONSTRAINT `chitieuphatsinh_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `khoantietkiem`
--
ALTER TABLE `khoantietkiem`
  ADD CONSTRAINT `khoantietkiem_ibfk_1` FOREIGN KEY (`loaitietkiem_id`) REFERENCES `loaitietkiem` (`id`),
  ADD CONSTRAINT `khoantietkiem_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `thunhapchinh`
--
ALTER TABLE `thunhapchinh`
  ADD CONSTRAINT `thunhapchinh_ibfk_1` FOREIGN KEY (`loaithunhapchinh_id`) REFERENCES `loaithunhapchinh` (`id`),
  ADD CONSTRAINT `thunhapchinh_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `thunhapphu`
--
ALTER TABLE `thunhapphu`
  ADD CONSTRAINT `thunhapphu_ibfk_1` FOREIGN KEY (`loaithunhapphu_id`) REFERENCES `loaithunhapphu` (`id`),
  ADD CONSTRAINT `thunhapphu_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
