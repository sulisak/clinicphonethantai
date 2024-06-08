-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2018 at 07:35 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `units` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `code`, `product`, `price`, `units`) VALUES
(1, '373343328-9', 'Crab - Meat', 46, 'PGH'),
(2, '476988663-2', 'Chicken - Wieners', 37, 'TPVG'),
(3, '986716735-X', 'Flower - Commercial Bronze', 23, 'UBND'),
(4, '304731212-5', 'Bulgar', 100, 'NXPI'),
(5, '268711160-0', 'Milk - Buttermilk', 35, 'SSYS'),
(6, '203075759-4', 'Veal - Heart', 40, 'EOT'),
(7, '513220011-7', 'Soup - Knorr, Veg / Beef', 60, 'TSRO'),
(8, '719168560-3', 'Squash - Sunburst', 30, 'LHCG'),
(9, '532894227-2', 'Arizona - Green Tea', 56, 'BFO'),
(10, '784923698-X', 'Dill - Primerba, Paste', 78, 'CFRX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
