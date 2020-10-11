-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 08:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshowroomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Email`, `Password`, `Phone`, `Address`) VALUES
(1, '', 'mm@gmail.com', '1234', '1234', 'asd'),
(2, '', 'hh@gmail.com', '1234', '1234', 'zdxfftygui'),
(3, 'aa', 'aa@gmail.com', '1234', '1234', 'wefedf'),
(4, 'a', 'a@gmail.com', 'a', '1212', 'sdcadc'),
(5, 'q', 'q@gmail.com', 'q', '13121', 'sdfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(9, 'Nissan', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Address`, `Phone`, `Email`, `Password`) VALUES
(6, 'a', 'xsdfkjnsdkjf', '1', 'a@gmail.com', 'a'),
(7, 'dd', 'Mdy', '0912345', 'dd@gmail.com', '1234'),
(8, 'ww', 'ygn', '1234', 'ww@gmail.com', '1234');

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
('OR-000001', '6', 200, 1);

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
('OR-000001', 200, 200, 0, 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(11) NOT NULL,
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
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `BrandID`, `Maker`, `Fuel`, `Price`, `Quantity`, `Img1`, `Img2`, `Img3`, `Img4`, `Img5`, `Img6`, `Img7`, `kilometrage`, `ModelYear`, `PurchaseID`, `Color`, `Direction`, `EnginePower`, `Transmission`, `Description`, `Status`) VALUES
(6, 'RX8', '3', 'Mazda', '92', '200', 9, 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', '0', '2009', '', '-', 'Left', '120', 'sdfdsf', ' sdfsfasfasdfasfea ef asdfawf wef af awefaef waef aef awef', 'Active'),
(7, 'Probox', '2', 'Japan', '92', '80', 20, 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', 'ProductImage/_showroom.jpg', '0', '2005', '', '-', 'Left', '120', 'sdfasdas fasdf s fd asf dsdf a', 'sd fasf asdf af asdf asf asdf asdf asdf asdf asf asdf asdf asf  asdf asdfsrrger gwe e err werrergsfARRGSGAWFEW', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `PurchaseDate` varchar(50) NOT NULL,
  `PurchaseQuantity` varchar(50) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `GovTax` varchar(50) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL,
  `NetAmount` varchar(50) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE IF NOT EXISTS `purchasedetail` (
  `PurchaseID` int(11) NOT NULL,
  `ProductID` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `DeliveryOption` varchar(30) NOT NULL,
  `PaymentOption` varchar(30) NOT NULL,
  `DeliveryPhone` varchar(30) NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `CardNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleorder`
--

INSERT INTO `saleorder` (`SaleOrderID`, `SaleDate`, `CustomerID`, `TotalAmount`, `TotalQuantity`, `Status`, `PaymentPlan`, `DeliveryOption`, `PaymentOption`, `DeliveryPhone`, `DeliveryAddress`, `CardNo`) VALUES
('OR-000001', '2018-01-22', '6', '200', 1, 'Approved', 'Full', 'Others', 'COD', '2352523', 'sfsdfgsdv  dfgsdg dsfg s dsfg sdf sfdfg sfg s gfdsg sdfg', 'Paid with COD');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `saleorder`
--
ALTER TABLE `saleorder`
  ADD PRIMARY KEY (`SaleOrderID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
