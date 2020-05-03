-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 03:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `name_apps` varchar(255) NOT NULL,
  `codeby` varchar(255) NOT NULL,
  `size_label` char(5) NOT NULL COMMENT 'WxH (cm)',
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`name_apps`, `codeby`, `size_label`, `updated_at`) VALUES
('Medications Management Assets', 'acakdadu', '8x3', '2020-03-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `kode_obat` int(10) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `e_code` text NOT NULL,
  `d_code` text NOT NULL COMMENT 'link',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`kode_obat`, `nama_obat`, `e_code`, `d_code`, `created_at`) VALUES
(11000325, 'FITOCARE M KAYU PUTIH 30 ML', '1.png', 'http://google.com', '2020-05-02 00:00:00'),
(11000326, 'FITOCARE M KAYU PUTIH 50 ML', '1.png', 'http://google.com', '2020-05-02 00:00:00'),
(11000327, 'FITOCARE M.TELON BAYI 30 ML', '1.png', 'http://google.com', '2020-05-02 00:00:00'),
(12004841, 'SANMOL 125MG/5ML SYR 60 ML', '1.png', 'http://google.com', '2020-05-02 00:00:00'),
(12004842, 'SANMOL 60MG/0.6ML DROP 15 ML', '1.png', 'http://google.com', '2020-05-02 00:00:00'),
(13019662, 'PARAMEX TAB@200', '1.png', 'http://google.com', '2020-05-02 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`kode_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `kode_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13019663;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
