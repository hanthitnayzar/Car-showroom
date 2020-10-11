-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 11:14 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carshowroomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Email`, `Password`, `Phone`, `Address`) VALUES
(1, '', 'mm@gmail.com', '1234', '1234', 'asd'),
(2, '', 'hh@gmail.com', '1234', '1234', 'zdxfftygui'),
(3, 'aa', 'aa@gmail.com', '1234', '1234', 'wefedf'),
(4, 'a', 'a@gmail.com', 'a', '1212', 'sdcadc'),
(5, 'q', 'q@gmail.com', 'q', '13121', 'sdfdfd'),
(6, 'harry', 'hein@gmail.com', '1234', '1234', 'ygn'),
(7, 'kane', 'kane@gmail.com', '1234', '018888', 'Mandalay');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `BrandID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `BrandName`, `Status`) VALUES
(2, 'toyota', 'Active'),
(3, 'Mazda', 'Active'),
(4, 'a', 'Active'),
(5, 'abc', 'Active'),
(7, 'cc', 'InActive'),
(8, 'Ford', 'Active'),
(9, 'Nissan', 'Active'),
(10, 'Mazda 2', 'Active'),
(11, 'Chevrolet', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Address`, `Phone`, `Email`, `Password`) VALUES
(6, 'a', 'xsdfkjnsdkjf', '1', 'a@gmail.com', 'a'),
(7, 'dd', 'Mdy', '0912345', 'dd@gmail.com', '1234'),
(8, 'ww', 'ygn', '1234', 'ww@gmail.com', '1234'),
(9, 'Gh', 'ygn', '1234', 'gh@gmail.com', '1234'),
(10, 'Hein Thit', 'ygn', '0155555', 'hein@gmail.com', '1234'),
(11, 'Han Zar', 'Taunggyi', '0177777', 'HZ@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `SaleOrderID` varchar(30) NOT NULL,
  `ProductID` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`SaleOrderID`, `ProductID`, `Price`, `Quantity`) VALUES
('OR-000001', '6', 200, 1),
('OR-000002', '7', 80, 1),
('OR-000003', '9', 0, 1),
('OR-000004', '10', 70000, 3),
('OR-000005', '10', 70000, 1),
('OR-000006', '10', 70000, 1),
('OR-000007', '10', 70000, 1),
('OR-000008', '10', 70000, 1),
('OR-000009', '10', 70000, 1),
('OR-000010', '9', 600, 1),
('OR-000011', '9', 600, 2),
('OR-000012', '9', 600, 2),
('OR-000013', '9', 600, 2),
('OR-000014', '10', 70000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `OrderID` varchar(30) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `NetAmount` int(11) NOT NULL,
  `PendingAmount` int(11) NOT NULL,
  `PaymentPlan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`OrderID`, `TotalAmount`, `NetAmount`, `PendingAmount`, `PaymentPlan`) VALUES
('OR-000001', 200, 200, 0, 'Full'),
('OR-000002', 80, 80, 0, 'Full'),
('OR-000003', 0, 0, 0, 'Half'),
('OR-000004', 210000, 210000, 0, 'Full'),
('OR-000005', 70000, 70000, 0, 'Full'),
('OR-000006', 70000, 70000, 0, 'Full'),
('OR-000007', 70000, 70000, 0, 'Full'),
('OR-000008', 70000, 70000, 0, 'Full'),
('OR-000009', 70000, 70000, 0, 'Full'),
('OR-000010', 600, 600, 0, 'Full'),
('OR-000011', 1200, 1200, 0, 'Full'),
('OR-000012', 1200, 1200, 0, 'Full'),
('OR-000013', 1200, 1200, 0, 'Full'),
('OR-000014', 70000, 70000, 0, 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `BrandID` varchar(50) NOT NULL,
  `Maker` varchar(50) NOT NULL,
  `Fuel` varchar(255) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Img1` varchar(255) NOT NULL,
  `Img2` varchar(255) NOT NULL,
  `Img3` varchar(255) NOT NULL,
  `Img4` varchar(255) NOT NULL,
  `Img5` varchar(255) NOT NULL,
  `Img6` varchar(255) NOT NULL,
  `Img7` varchar(255) NOT NULL,
  `kilometrage` varchar(30) NOT NULL,
  `ModelYear` varchar(30) NOT NULL,
  `PurchaseID` varchar(30) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Direction` varchar(50) NOT NULL,
  `EnginePower` varchar(50) NOT NULL,
  `Transmission` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `BrandID`, `Maker`, `Fuel`, `Price`, `Quantity`, `Img1`, `Img2`, `Img3`, `Img4`, `Img5`, `Img6`, `Img7`, `kilometrage`, `ModelYear`, `PurchaseID`, `Color`, `Direction`, `EnginePower`, `Transmission`, `Description`, `Status`) VALUES
(6, 'RX8', '3', 'Mazda', '92', '200', 19, 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', '0', '2009', '', '-', 'Left', '120', 'sdfdsf', ' sdfsfasfasdfasfea ef asdfawf wef af awefaef waef aef awef', 'Active'),
(7, 'Probox', '2', 'Japan', '92', '80', 19, 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', '0', '2005', '', '-', 'Left', '120', 'sdfasdas fasdf s fd asf dsdf a', 'sd fasf asdf af asdf asf asdf asdf asdf asdf asf asdf asdf asf  asdf asdfsrrger gwe e err werrergsfARRGSGAWFEW', 'Active'),
(8, 'M 2', '3', 'Japan', 'Premium', '400', 1, 'ProductImage/_mazda1.png', 'ProductImage/_mazda2.png', 'ProductImage/_mazda3.png', 'ProductImage/_mazda4.png', 'ProductImage/_mazda8.jpg', 'ProductImage/_mazda7.jpg', 'ProductImage/_mazda6.jpg', '30000cc', '2011', '', 'red', 'left', '1.2', 'auto', 'good', 'Active'),
(9, 'T1', '2', 'Japan', '92', '600', 15, 'ProductImage/_Toyo1.jpg', 'ProductImage/_Toyo2.jpg', 'ProductImage/_Toyo3.jpg', 'ProductImage/_Toyo4.jpg', 'ProductImage/_Toyo7.jpg', 'ProductImage/_Toyo5.jpg', 'ProductImage/_Toyo8.jpg', '2000CC', '2014', '', 'grey', 'right', '3.2', 'auto5', 'srsrgwvewr', 'InActive'),
(10, 'C1', '11', 'US', '92', '70000', 15, 'ProductImage/_Chev1.jpeg', 'ProductImage/_Chev2.jpg', 'ProductImage/_Chev7.jpg', 'ProductImage/_Chev5.jpg', 'ProductImage/_Chev6.jpg', 'ProductImage/_Chev3.jpg', 'ProductImage/_Chev4.jpg', '30000cc', '2015', '', 'grey', 'left', '3.5', 'auto', 'welcome', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `PurchaseID` int(11) NOT NULL AUTO_INCREMENT,
  `PurchaseDate` varchar(50) NOT NULL,
  `PurchaseQuantity` varchar(50) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `GovTax` varchar(50) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL,
  `NetAmount` varchar(50) NOT NULL,
  `ProductID` int(11) NOT NULL,
  PRIMARY KEY (`PurchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE IF NOT EXISTS `purchasedetail` (
  `PurchaseID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  PRIMARY KEY (`PurchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saleorder`
--

CREATE TABLE IF NOT EXISTS `saleorder` (
  `SaleOrderID` varchar(20) NOT NULL,
  `SaleDate` varchar(50) NOT NULL,
  `CustomerID` varchar(20) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL,
  `TotalQuantity` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `PaymentPlan` text NOT NULL,
  `PaymentOption` varchar(30) NOT NULL,
  `DeliveryPhone` varchar(30) NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `CardNo` varchar(30) NOT NULL,
  PRIMARY KEY (`SaleOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleorder`
--

INSERT INTO `saleorder` (`SaleOrderID`, `SaleDate`, `CustomerID`, `TotalAmount`, `TotalQuantity`, `Status`, `PaymentPlan`, `PaymentOption`, `DeliveryPhone`, `DeliveryAddress`, `CardNo`) VALUES
('OR-000001', '2018-01-22', '6', '200', 1, 'Approved', 'Full', 'COD', '2352523', 'sfsdfgsdv  dfgsdg dsfg s dsfg sdf sfdfg sfg s gfdsg sdfg', 'Paid with COD'),
('OR-000002', '2018-01-25', '9', '80', 1, 'Pending', 'Full', 'MASTER', '', '', 'Paid with COD'),
('OR-000003', '2018-01-26', '', '0', 1, 'Pending', 'Half', 'MASTER', '', '', 'Paid with COD'),
('OR-000004', '2018-01-30', '', '210000', 3, 'Pending', 'Full', 'MYANPAY', '', '', 'Paid with COD'),
('OR-000005', '2018-01-30', '', '70000', 1, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000006', '2018-01-30', '', '70000', 1, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000007', '2018-01-30', '7', '70000', 1, 'Pending', 'Full', 'VISA', '', '', 'Paid with COD'),
('OR-000008', '2018-01-30', '7', '70000', 1, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000009', '2018-01-30', '7', '70000', 1, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000010', '2018-01-30', '6', '600', 1, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000011', '2018-02-01', '10', '1200', 2, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000012', '2018-02-02', '10', '1200', 2, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000013', '2018-02-02', '10', '1200', 2, 'Pending', 'Full', '', '', '', 'Paid with COD'),
('OR-000014', '2018-02-14', '11', '70000', 1, 'Pending', 'Full', 'VISA', '', '', 'Paid with COD');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SupplierID` int(11) NOT NULL AUTO_INCREMENT,
  `SupplierName` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierName`, `Address`, `Email`, `Password`, `Phone`) VALUES
(4, 'vv', 'sdfbn', 'vv@gmail.com', '111', '1234'),
(5, 'sdf', 'dfgh', 'aa@gmail.com', '1234', '1244'),
(6, 'bb', 'sdghk', 'b@gmail,com', '123', '4567'),
(7, 'Vc', 'sdfgh', 'Vc@gmail.com', '1234', '1234'),
(8, 'hh', 'sdfghj', 'hh@gmail.com', '1234', '1234'),
(9, 'mm', 'xfyf', 'mm@gmail.com', '1234', '1234'),
(10, 'kk', 'ygn', 'kk@gmail.com', '1234', ' '),
(11, 'kk', '', 'kk@gmail.com', '1234', '1234'),
(12, 'kk', 'ygn', 'dsfs', '1234', '1234'),
(13, 'kk', 'ygn', 'kk@gmail.com', '1234', '1234'),
(14, 'kk', 'ygn', 'kk@gmail.com', '1234', '1234'),
(15, 'hh', 'ygn', 'hh@gmail.com', '1234', '1234'),
(17, 'bbb', 'npt', 'bb@gmail.com', '1234', '1234'),
(18, 'bb', 'ygn', 'JJ@gmail.com', '1234', '1234'),
(19, 'gg', 'NPT', 'gg@gmail.com', '1234', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
