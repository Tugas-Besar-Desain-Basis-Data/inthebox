-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 03:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_inthebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id` int(11) NOT NULL,
  `varian_satu` varchar(255) NOT NULL DEFAULT 'kosong',
  `varian_dua` varchar(255) NOT NULL,
  `varian_tiga` varchar(255) NOT NULL,
  `stok` int(30) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id`, `varian_satu`, `varian_dua`, `varian_tiga`, `stok`, `id_barang`) VALUES
(43, 'S', 'Hitam', 'rrt', 4, 50),
(44, 'S', 'Hitam', 'rrt', 1, 51),
(45, 'S', 'Hitam', 'yyy', 1, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_BARANG` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `FK_ID_BARANG` FOREIGN KEY (`id_barang`) REFERENCES `barang_dagang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
