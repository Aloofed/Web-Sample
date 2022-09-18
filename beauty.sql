-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 12:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `selmail` varchar(200) NOT NULL,
  `userID` int(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `Id` int(200) NOT NULL,
  `Pname` varchar(200) NOT NULL,
  `Pprice` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `total` int(200) NOT NULL,
  `stock` int(200) NOT NULL,
  `origstock` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comID` int(200) NOT NULL,
  `Id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `email` varchar(200) NOT NULL,
  `id` int(200) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `pic2` varchar(200) NOT NULL,
  `pic3` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `stock` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`email`, `id`, `pic`, `pic2`, `pic3`, `name`, `price`, `stock`) VALUES
('', 12, 'pexels-jess-bailey-designs-755992.jpg', 'pexels-rodnae-productions-8580757.jpg', 'pexels-valeria-boltneva-1961784.jpg', 'Sample Product', 500, 20),
('jethro@gmail.com', 13, 'pexels-walaa-dag-11883768.jpg', 'pexels-𝐕𝐞𝐧𝐮𝐬-𝐇𝐃-𝐌𝐚𝐤𝐞-𝐮𝐩-&-𝐏𝐞𝐫𝐟𝐮𝐦𝐞-2586073.jpg', 'pexels-𝐕𝐞𝐧𝐮𝐬-𝐇𝐃-𝐌𝐚𝐤𝐞-𝐮𝐩-&-𝐏𝐞𝐫𝐟𝐮𝐦𝐞-2629277.jpg', 'Another Sample', 500, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `autoID` int(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `id` int(200) NOT NULL,
  `rate` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `selmail` varchar(200) NOT NULL,
  `autoID` int(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `Id` int(200) NOT NULL,
  `Pname` varchar(200) NOT NULL,
  `Pprice` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `conpass` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `name`, `email`, `address`, `contact`, `pass`, `conpass`, `type`) VALUES
(1, 'Admin Admin', 'admin@gmail.com', 'St, Vicente Street, Bogo City Cebu', '09935345564', 'admin', 'admin', 'Admin'),
(2, 'Jake Lamela', 'jake@gmail.com', 'St, Vicente Street, Bogo City Cebu', '09935345564', 'jake', 'jake', 'Customer'),
(3, 'Jenny Yawi', 'jenny@gmail.com', 'Looc San Remigio Cebu', '09935345564', 'jenny', 'jenny', 'Customer'),
(20, 'Nana Mage', 'nana@gmail.com', 'Bogo City Cebu', '09999999999', '123', '', 'Seller'),
(22, 'Jethro Gwapo', 'jethro@gmail.com', 'Bogo City Cebu', '09999999999', '123', '', 'Seller'),
(23, 'Gumi Gumi', 'gumi@gmail.com', 'Bogo City Cebu', '09999999999', '123', '', 'Seller'),
(24, 'Gomo Gomo', 'gumi@gmail.com', 'Bogo City Cebu', '09999999999', '123', '', 'Seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`autoID`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`autoID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `autoID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `autoID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
