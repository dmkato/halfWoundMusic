-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: May 31, 2017 at 07:54 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_giovanmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `addressID` int(11) NOT NULL,
  `street` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `zipCode` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`addressID`, `street`, `city`, `zipCode`, `country`) VALUES
(0, '264 Harrison Blvd', 'Corvallis', '97330', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `name` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`name`, `location`, `description`) VALUES
('Fender', 'Corona, California', 'Probably the most famous name in guitars'),
('Gibson', 'Nashville', 'Gibson Guitar Corporation'),
('testBrand', 'Corvallis, OR', 'A little company that doesn\'t exist');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `productID` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(64) NOT NULL,
  `subCategory` varchar(64) DEFAULT NULL,
  `restockDate` char(8) DEFAULT NULL,
  `brandName` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productID`, `stock`, `name`, `description`, `price`, `category`, `subCategory`, `restockDate`, `brandName`) VALUES
(0, 1, '62 Reissue Jazzmaster', '1962 Reissue Fender Jazzmaster in sunburst', '1120.99', 'guitar', 'electric', NULL, 'Fender'),
(5, 9, 'Gibson Les Paul', 'solid body electric', '2000.00', 'guitar', 'electric', NULL, 'Gibson');

-- --------------------------------------------------------

--
-- Table structure for table `Purchase`
--

CREATE TABLE `Purchase` (
  `transactionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Purchase`
--

INSERT INTO `Purchase` (`transactionID`, `productID`, `quantity`) VALUES
(0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `reviewID` int(11) NOT NULL,
  `numStars` int(11) NOT NULL,
  `reviewText` varchar(512) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`reviewID`, `numStars`, `reviewText`, `userID`, `productID`) VALUES
(0, 4, 'This guitar is pretty good', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `transactionID` int(11) NOT NULL,
  `purchaseDate` char(8) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`transactionID`, `purchaseDate`, `userID`) VALUES
(0, '5/10/17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `addressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `email`, `password`, `lastname`, `firstname`, `addressID`) VALUES
(0, 'testUser@testmail.com', 'insecurePassword', 'Smith', 'John', 0),
(1, 'mjones@gmail.com', 'fa392007b117da9b7de02020c9205bab', 'jones', 'mike', 0),
(2, 'jbat@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 0),
(3, 'testuser@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 0),
(5, 'sam@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'sam', 'white', 0),
(6, 'jstein@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'john', 'stein', 0),
(7, 'ghj@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'gh', 'ghj', 0),
(8, 'amay@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'april', 'may', 0),
(9, 'smcduck@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'scrouge', 'mcduck', 0),
(10, 'gstein@gmail.com', 'f1c06bb400656f146da09feb13868adc', 'gertrude', 'stein', 0),
(11, 'asdfgh', 'f1c06bb400656f146da09feb13868adc', 'asd', 'asdfg', 0),
(12, 'o;iho;ih', 'f1c06bb400656f146da09feb13868adc', 'yu', 'p;ioh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`addressID`),
  ADD UNIQUE KEY `street` (`street`);

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `brandName` (`brandName`);

--
-- Indexes for table `Purchase`
--
ALTER TABLE `Purchase`
  ADD PRIMARY KEY (`productID`,`transactionID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `addressID` (`addressID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`brandName`) REFERENCES `Brand` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `Purchase`
--
ALTER TABLE `Purchase`
  ADD CONSTRAINT `Purchase_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `Product` (`productID`),
  ADD CONSTRAINT `Purchase_ibfk_2` FOREIGN KEY (`transactionID`) REFERENCES `Transaction` (`transactionID`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `Product` (`productID`) ON DELETE CASCADE;

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`) ON DELETE CASCADE;;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`addressID`) REFERENCES `Address` (`addressID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
