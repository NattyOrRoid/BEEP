-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 07:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `custusername` varchar(100) NOT NULL,
  `custfname` varchar(250) NOT NULL,
  `custidno` varchar(50) NOT NULL,
  `custhpnumber` varchar(50) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `custaddress1` varchar(50) NOT NULL,
  `custaddress2` varchar(50) NOT NULL,
  `custaddress3` varchar(50) NOT NULL,
  `custaddress4` varchar(50) NOT NULL,
  `custpassword` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custusername`, `custfname`, `custidno`, `custhpnumber`, `custemail`, `custaddress1`, `custaddress2`, `custaddress3`, `custaddress4`, `custpassword`, `code`, `active`) VALUES
(1, 'User', 'Guy', '!11111111', '11111111', 'user@hotmail.com', 'User', 'User', 'User', 'User', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `orderID` int(50) NOT NULL,
  `custID` int(50) NOT NULL,
  `serviceID` int(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` int(50) NOT NULL,
  `itemquantity` int(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(50) NOT NULL,
  `custID` int(50) NOT NULL,
  `serviceID` int(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` int(50) NOT NULL,
  `itemquantity` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL,
  `deliveryfee` int(50) NOT NULL DEFAULT 3,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerID` int(11) NOT NULL,
  `runnerfname` varchar(250) NOT NULL,
  `runneridno` varchar(50) NOT NULL,
  `runnerusername` varchar(100) NOT NULL,
  `runnerhpnumber` varchar(50) NOT NULL,
  `runneremail` varchar(100) NOT NULL,
  `licensereg` varchar(50) NOT NULL,
  `runnervehiclemodel` varchar(100) NOT NULL,
  `runnervehicleplatenumber` varchar(50) NOT NULL,
  `runnercity` varchar(50) NOT NULL,
  `runnerbanktype` varchar(50) NOT NULL,
  `runnerbankaccountnumber` varchar(50) NOT NULL,
  `runnerpassword` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runnerID`, `runnerfname`, `runneridno`, `runnerusername`, `runnerhpnumber`, `runneremail`, `licensereg`, `runnervehiclemodel`, `runnervehicleplatenumber`, `runnercity`, `runnerbanktype`, `runnerbankaccountnumber`, `runnerpassword`, `code`, `active`) VALUES
(1, 'Speed', '120', 'Runner', '222222222222222222', 'runner@hotmail.us', '', 'FZ150i', 'WX123', 'Kuantan', 'volvo', '22222222222222222222222222222', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `spID` varchar(50) NOT NULL,
  `servicetype` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` int(11) NOT NULL,
  `itemimage` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `spID` int(11) NOT NULL,
  `spusername` varchar(100) NOT NULL,
  `sphpnumber` varchar(30) NOT NULL,
  `spemail` varchar(100) NOT NULL,
  `spcompanyname` varchar(100) NOT NULL,
  `regno` varchar(250) NOT NULL,
  `spaddress1` varchar(50) NOT NULL,
  `spaddress2` varchar(50) NOT NULL,
  `spaddress3` varchar(50) NOT NULL,
  `spaddress4` varchar(50) NOT NULL,
  `spbanktype` varchar(50) NOT NULL,
  `spbankaccountnumber` varchar(50) NOT NULL,
  `sppassword` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`spID`, `spusername`, `sphpnumber`, `spemail`, `spcompanyname`, `regno`, `spaddress1`, `spaddress2`, `spaddress3`, `spaddress4`, `spbanktype`, `spbankaccountnumber`, `sppassword`, `code`, `active`) VALUES
(1, 'SP', '33333333333333333333333333333', 'sp@hotmail.us', 'SP', 'NA123', 'SP', 'SP', 'SP', 'SP', 'Maybank', '333333333333333333333333333333333', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingID` int(50) NOT NULL,
  `orderID` int(50) NOT NULL,
  `custID` int(50) NOT NULL,
  `serviceID` int(50) NOT NULL,
  `runnerID` int(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`spID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `orderID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `spID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackingID` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
