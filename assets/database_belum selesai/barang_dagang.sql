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
-- Table structure for table `barang_dagang`
--

CREATE TABLE `barang_dagang` (
  `id_barang` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `detail_barang` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_dagang`
--

INSERT INTO `barang_dagang` (`id_barang`, `username`, `nama_toko`, `nama_barang`, `detail_barang`, `harga`, `kategori`, `jenis`, `photo`) VALUES
(46, 'jualan', 'belidong123', 'aaa', 'dsf', '54000', 'fashion', 'male', 0x4b616f73204d696e656372616674205365726965732033442042616a75204d696e65637261667420416e616b202034322e3030302e6a7067),
(47, 'jualan', 'belidong123', 'aaa', 'ss', '54000', 'fashion', 'male', 0x4b616f732042616a7520414e414b20414d4f4e4720555320414d4f554e472055532042414e59414b204d4f544946202846524545204e414d41292035342e3030302e6a7067),
(48, 'jualan', 'belidong123', 'aaa', 'ss', '54000', 'fashion', 'male', 0x4172726179),
(49, 'jualan', 'belidong123', 'gd', 'fdg', '54000', 'fashion', 'female', 0x4172726179),
(50, 'jualan', 'belidong123', 'gd', 'fdg', '54000', 'fashion', 'female', 0x4172726179),
(51, 'jualan', 'belidong123', 'aaaa', 'aa', '54000', 'fashion', 'male', 0x4172726179),
(52, 'jualan', 'belidong123', 'sss', 'ss', '54000', 'fashion', 'female', 0x4172726179);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_dagang`
--
ALTER TABLE `barang_dagang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `FK_USERNAME_BARANG` (`username`),
  ADD KEY `FK_TOKO` (`nama_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_dagang`
--
ALTER TABLE `barang_dagang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_dagang`
--
ALTER TABLE `barang_dagang`
  ADD CONSTRAINT `FK_TOKO_BARANG` FOREIGN KEY (`nama_toko`) REFERENCES `penjual` (`nama_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERNAME_BARANG` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
