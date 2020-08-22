-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 04:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumbways`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_tb`
--

CREATE TABLE `brand_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tb`
--

INSERT INTO `brand_tb` (`id`, `name`) VALUES
(1, 'Yamaha'),
(2, 'Yamaha '),
(3, 'Yamaha '),
(4, 'Kawasaki');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`id`, `name`, `address`, `phone`) VALUES
(1, 'naruto', 'jl. halat', 80989444),
(2, 'sasuke', 'jl. utama', 80989442),
(3, 'sakura', 'jl. laksana', 80989441),
(4, 'rock lee', 'jl. amaliun', 80989440);

-- --------------------------------------------------------

--
-- Table structure for table `motorcycle_tb`
--

CREATE TABLE `motorcycle_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `specification` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motorcycle_tb`
--

INSERT INTO `motorcycle_tb` (`id`, `name`, `brand_id`, `Image`, `Color`, `specification`, `stock`) VALUES
(1, 'Yamaha New R15 - 155 VVA', 1, '1.png', 'blue', 'cilinder 155.1cc', 5),
(2, 'Yamaha MT25 Matte', 2, '2.png', 'white', 'cilinder 250cc', 4),
(3, 'Yamaha MT15', 3, '3.png', 'black', 'cilinder 150cc', 2),
(4, 'Kawasaki Ninja 250 VIN 2019', 4, '4.png', 'red', 'cilinder 250cc', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_tb`
--
ALTER TABLE `brand_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motorcycle_tb`
--
ALTER TABLE `motorcycle_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_tb`
--
ALTER TABLE `brand_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `motorcycle_tb`
--
ALTER TABLE `motorcycle_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motorcycle_tb`
--
ALTER TABLE `motorcycle_tb`
  ADD CONSTRAINT `motorcycle_tb_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
