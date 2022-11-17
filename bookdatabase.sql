-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 10:41 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `RegNo` varchar(9) NOT NULL,
  `BookName` varchar(30) NOT NULL,
  `Edition` varchar(2) DEFAULT NULL,
  `YoP` varchar(4) DEFAULT NULL,
  `RPrice` varchar(3) DEFAULT NULL,
  `SPrice` varchar(4) DEFAULT NULL,
  `nameBook` varchar(255) DEFAULT NULL,
  `imgDir` varchar(255) DEFAULT NULL,
  `Author` varchar(30) DEFAULT NULL,
  `Review` varchar(30) DEFAULT NULL,
  `NumReviews` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `RegNumber` varchar(9) NOT NULL,
  `FirstName` varchar(25) DEFAULT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `Passwords` varchar(25) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `RenterRegNo` varchar(9) NOT NULL,
  `RBookName` varchar(30) NOT NULL,
  `ProviderRegNo` varchar(9) NOT NULL,
  `RePrice` varchar(3) NOT NULL,
  `RentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Reviewd` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requested`
--

CREATE TABLE `requested` (
  `ReqRegNo` varchar(9) NOT NULL,
  `ReqBookName` varchar(30) NOT NULL,
  `ReqAuthor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `BuyerRegNo` varchar(9) NOT NULL,
  `BBookName` varchar(30) NOT NULL,
  `SellerRegNo` varchar(9) NOT NULL,
  `SePrice` varchar(4) NOT NULL,
  `PurchaseDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`RegNo`,`BookName`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`RegNumber`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
  ADD PRIMARY KEY (`RenterRegNo`,`RBookName`,`ProviderRegNo`),
  ADD KEY `ProviderRegNo` (`ProviderRegNo`);

--
-- Indexes for table `requested`
--
ALTER TABLE `requested`
  ADD PRIMARY KEY (`ReqRegNo`,`ReqBookName`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`BuyerRegNo`,`BBookName`,`SellerRegNo`),
  ADD KEY `SellerRegNo` (`SellerRegNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `registered` (`RegNumber`) ON DELETE CASCADE;

--
-- Constraints for table `rented`
--
ALTER TABLE `rented`
  ADD CONSTRAINT `rented_ibfk_1` FOREIGN KEY (`RenterRegNo`) REFERENCES `registered` (`RegNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `rented_ibfk_2` FOREIGN KEY (`ProviderRegNo`) REFERENCES `books` (`RegNo`) ON DELETE CASCADE;

--
-- Constraints for table `requested`
--
ALTER TABLE `requested`
  ADD CONSTRAINT `requested_ibfk_1` FOREIGN KEY (`ReqRegNo`) REFERENCES `registered` (`RegNumber`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`BuyerRegNo`) REFERENCES `registered` (`RegNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`SellerRegNo`) REFERENCES `books` (`RegNo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
