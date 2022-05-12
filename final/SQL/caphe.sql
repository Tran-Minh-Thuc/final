-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 05:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caphe`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`roleid`, `rolename`) VALUES
(1, 'Admin tổng'),
(2, 'Nhân viên đơn');

-- --------------------------------------------------------

--
-- Table structure for table `ct_chucvu`
--

CREATE TABLE `ct_chucvu` (
  `roleid` int(11) NOT NULL,
  `privilegeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_chucvu`
--

INSERT INTO `ct_chucvu` (`roleid`, `privilegeid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 7),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ct_donhang`
--

CREATE TABLE `ct_donhang` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productcost` int(11) NOT NULL,
  `orderamount` int(11) NOT NULL,
  `producttotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorydescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`categoryid`, `categoryname`, `categorydescription`) VALUES
(1, 'Cà phê', NULL),
(2, 'Trà', NULL),
(3, 'Bánh ngọt', NULL),
(4, 'Kem', NULL),
(5, 'Soda', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `ordertotal` int(11) NOT NULL,
  `promoid` int(11) NOT NULL,
  `orderafterpromo` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `ordernote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `customerid` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`customerid`, `fullname`, `email`, `password`, `phonenumber`, `address`, `gender`) VALUES
(3, 'Mục Mục Hạ', 'mmh@sgu.edu.vn', '123', '0123456789', '273', 'Nu'),
(4, 'Ninh Ngân', 'nn@gmail.com', '123', '0370000002', '200 ADV', 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `promoid` int(11) NOT NULL,
  `promotitle` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `promodesciption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`promoid`, `promotitle`, `promodesciption`, `starttime`, `endtime`) VALUES
(1, '20KTHANG3', 'Giảm 20.000 VNĐ tổng hóa đơn nếu hóa đơn đạt tối thiểu 120.000 VNĐ', '2022-03-13 12:34:40', '2022-03-13 12:34:40'),
(2, '40KTHANG3', 'Giảm 40.000 VNĐ tổng hóa đơn nếu hóa đơn đạt tối thiểu 150.000 VNĐ', '2022-03-13 12:34:40', '2022-03-13 12:34:40'),
(3, '50KTHANG3', 'Giảm 50.000 VNĐ tổng hóa đơn nếu hóa đơn đạt tối thiểu 170.000 VNĐ', '2022-03-13 12:34:40', '2022-03-13 12:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `staffid` bigint(20) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `roleID` int(11) NOT NULL,
  `staffsalary` int(11) NOT NULL,
  `staffstartdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`staffid`, `fullname`, `email`, `password`, `phonenumber`, `address`, `gender`, `roleID`, `staffsalary`, `staffstartdate`) VALUES
(5, 'Công Tôn Mục', 'ctm@gmail.com', '123', '0370000001', '200 ADV', 'Nam', 1, 10000000, '2022-03-13 10:51:59'),
(6, 'Vương Kha', 'vk@gmail.com', '123', '0370000002', '200 ADV', 'Nữ', 2, 3000000, '2022-03-13 10:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `quyenhan`
--

CREATE TABLE `quyenhan` (
  `privilegeid` int(11) NOT NULL,
  `privilegename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilegedescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyenhan`
--

INSERT INTO `quyenhan` (`privilegeid`, `privilegename`, `privilegedescription`) VALUES
(1, 'Thêm sản phẩm', 'Thêm mới một sản phẩm'),
(2, 'Sửa sản phẩm', 'Sửa thông tin một sản phẩm'),
(3, 'Xóa sản phẩm', 'Xóa một sản phẩm'),
(4, 'Thêm danh mục', NULL),
(5, 'Sửa danh mục', NULL),
(6, 'Xóa danh mục', NULL),
(7, 'Thêm đơn hàng', NULL),
(8, 'Sửa đơn hàng', NULL),
(9, 'Xóa đơn hàng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productdesciption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `productcost` int(11) NOT NULL,
  `productimage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `promoid` int(11) DEFAULT NULL,
  `is_promo` bit(1) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`productid`, `productname`, `productdesciption`, `productcost`, `productimage`, `quantity`, `statusid`, `promoid`, `is_promo`, `categoryid`) VALUES
(1, 'Bạc xỉu đá', 'Đây là bạc xỉu đá', 25000, 'caphe-bacxiuda.jpg', 10000, 1, NULL, b'0', 1),
(2, 'Phin sữa đá', 'Đây là phin sữa đá', 25000, 'caphe-phinsuada.jpg', 10000, 1, NULL, b'0', 1),
(3, 'Trà thạch vải', 'Đây là trà thạch vải', 35000, 'tra-thachvai.jpg', 10000, 1, NULL, b'0', 2),
(4, 'Trà thạch đào', 'Đây là trà thạch đào', 35000, 'tra-thachdao.jpg', 10000, 1, NULL, b'0', 2),
(5, 'Bánh phô mai chocolate', 'Đây là bánh phô mai chocolate', 25000, 'banhngot-cheesecakechocolate.jpg', 10000, 1, NULL, b'0', 3),
(6, 'Bánh phô mai trà xanh', 'Đây là bánh phô mai trà xanh', 25000, 'banhngot-cheesecakematcha.jpg', 10000, 1, NULL, b'0', 3),
(7, 'Soda phúc bồn tử', 'Đây là soda phúc bồn tử', 23000, 'soda-phucbontu.jpg', 10000, 1, NULL, b'0', 5),
(8, 'Soda việt quất', 'Đây là soda việt quất', 23000, 'soda-vietquat.jpg', 10000, 1, NULL, b'0', 5),
(9, 'Kem dâu', 'Đây là kem dâu', 30000, 'kem-dau.jpg', 10000, 1, NULL, b'0', 4),
(10, 'Kem dừa', 'Đây là kem dừa', 30000, 'kem-dua.jpg', 10000, 1, NULL, b'0', 4);

-- --------------------------------------------------------

--
-- Table structure for table `slideanh`
--

CREATE TABLE `slideanh` (
  `slideid` int(11) NOT NULL,
  `slidedescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slideimage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slidelink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `newid` int(11) NOT NULL,
  `newname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newdescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `statusid` int(11) NOT NULL,
  `statusname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statusdescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`statusid`, `statusname`, `statusdescription`) VALUES
(1, 'Còn hàng', NULL),
(2, 'Hết hàng', NULL),
(3, 'Chờ xác nhận', NULL),
(4, 'Đang xử lý', NULL),
(5, 'Đang vận chuyển', NULL),
(6, 'Hoàn thành', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `ct_chucvu`
--
ALTER TABLE `ct_chucvu`
  ADD PRIMARY KEY (`roleid`,`privilegeid`),
  ADD KEY `RoleID` (`roleid`),
  ADD KEY `PrivilegeID` (`privilegeid`);

--
-- Indexes for table `ct_donhang`
--
ALTER TABLE `ct_donhang`
  ADD PRIMARY KEY (`orderid`,`productid`),
  ADD KEY `ProductID` (`productid`),
  ADD KEY `OrderID` (`orderid`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `CustomerID` (`customerid`),
  ADD KEY `PromoID` (`promoid`),
  ADD KEY `OrderStatus` (`statusid`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`promoid`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`staffid`),
  ADD KEY `RoleID` (`roleID`);

--
-- Indexes for table `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`privilegeid`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `PromoID` (`promoid`),
  ADD KEY `ProductCate` (`categoryid`),
  ADD KEY `ProductStatus` (`statusid`),
  ADD KEY `CategoryID` (`categoryid`);

--
-- Indexes for table `slideanh`
--
ALTER TABLE `slideanh`
  ADD PRIMARY KEY (`slideid`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`newid`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`statusid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `promoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `staffid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quyenhan`
--
ALTER TABLE `quyenhan`
  MODIFY `privilegeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slideanh`
--
ALTER TABLE `slideanh`
  MODIFY `slideid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `newid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_chucvu`
--
ALTER TABLE `ct_chucvu`
  ADD CONSTRAINT `ct_chucvu_ibfk_2` FOREIGN KEY (`roleid`) REFERENCES `chucvu` (`roleid`),
  ADD CONSTRAINT `ct_chucvu_ibfk_3` FOREIGN KEY (`privilegeid`) REFERENCES `quyenhan` (`privilegeid`);

--
-- Constraints for table `ct_donhang`
--
ALTER TABLE `ct_donhang`
  ADD CONSTRAINT `ct_donhang_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `sanpham` (`productid`),
  ADD CONSTRAINT `ct_donhang_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `donhang` (`orderid`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`customerid`) REFERENCES `khachhang` (`customerid`),
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`promoid`) REFERENCES `khuyenmai` (`promoid`),
  ADD CONSTRAINT `donhang_ibfk_5` FOREIGN KEY (`statusid`) REFERENCES `trangthai` (`statusid`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `chucvu` (`roleid`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`promoid`) REFERENCES `khuyenmai` (`promoid`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`statusid`) REFERENCES `trangthai` (`statusid`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`categoryid`) REFERENCES `danhmuc` (`categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
