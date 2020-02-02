-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2020 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayojualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_barang` varchar(40) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `img_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(20) NOT NULL,
  `status` enum('Belum Terjual','Terjual') NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `created_at`, `nama_barang`, `deskripsi_barang`, `img_barang`, `harga_barang`, `status`, `id_kategori`, `id_user`) VALUES
(5, '2020-02-02 00:15:23', 'Jersey Timnas Indonesia', 'Kaos Timnas Indonesia', '0NpfChn48oQnNpI.jpeg', '150000', 'Belum Terjual', 4, 2),
(7, '2020-02-02 01:48:21', 'Meja Kantor Baru', 'Meja Kantor Baru', 'r3WqF34ibsTetYH.jpg', '1500000', 'Belum Terjual', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(2) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Elektronik & Gadget'),
(2, 'Makanan'),
(3, 'Properti'),
(4, 'Hobi & Olahraga'),
(5, 'Pakaian'),
(6, 'Kendaraan'),
(7, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_hp`) VALUES
(2, 'naufaal98', '21232f297a57a5a743894a0e4a801fc3', 'Muhammad Naufal', 'muhammad_naufal@hotmail.com', '087878787898'),
(12, 'bepe20', '0192023a7bbd73250516f069df18b500', 'Bambang Pamungkas', 'bepe@gmail.com', '0823672333434'),
(13, 'cristiano7', '482c811da5d5b4bc6d497ffa98491e38', 'Cristiano Ronaldo', 'cr7@email.com', '087878787898'),
(14, 'leomessi10', 'd41d8cd98f00b204e9800998ecf8427e', 'Lionel Messi', 'messi@gmail.com', '08236723454545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
