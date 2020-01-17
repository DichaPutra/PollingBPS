-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2020 at 01:08 PM
-- Server version: 10.2.30-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6050234_polling`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `path` varchar(450) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `stats` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `nama`, `path`, `kategori`, `stats`) VALUES
(1, 'Bromo', 'images/background/bromo.jpg', 'bawaan', 'tidak aktif'),
(2, 'Surabaya', 'images/background/surabaya.jpg', 'bawaan', 'tidak aktif'),
(3, 'Suramadu', 'images/background/suramadu.jpg', 'bawaan', 'tidak aktif'),
(4, 'Abstrac', 'images/background/abstrac.jpg', 'bawaan', 'tidak aktif'),
(5, 'Bendera', 'images/background/bendera.jpg', 'bawaan', 'tidak aktif'),
(6, 'Imlek', 'images/background/imlek.jpg', 'bawaan', 'tidak aktif'),
(7, 'Infinite Blue', 'images/background/infinite-blue.jpg', 'bawaan', 'tidak aktif'),
(8, 'Masjid', 'images/background/masjid.jpg', 'bawaan', 'tidak aktif'),
(9, 'Natal', 'images/background/natal.jpg', 'bawaan', 'tidak aktif'),
(10, 'Nelayan', 'images/background/nelayan.jpg', 'bawaan', 'tidak aktif'),
(11, 'Polcadot', 'images/background/polcadot.jpg', 'bawaan', 'aktif'),
(12, 'Polygonal', 'images/background/polygonal.jpg', 'bawaan', 'tidak aktif'),
(13, 'Pura', 'images/background/pura.jpg', 'bawaan', 'tidak aktif'),
(14, 'Sawah', 'images/background/sawah.jpg', 'bawaan', 'tidak aktif'),
(15, 'Tahun Baru', 'images/background/tahunbaru.jpg', 'bawaan', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `idkonten` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`idkonten`, `type`, `text`) VALUES
(1, 'lokasi', 'Provinsi Jawa Timur'),
(2, 'judul', 'POLLING PELAYANAN STATISTIK TERPADU'),
(3, 'subjudul', 'Pendapat Pengunjung Terhadap Pelayanan di PST (Pelayanan Statistik Terpadu) Badan Pusat Statistik Provinsi Jawa Timur'),
(4, 'indikator', 'Berikan pendapat anda mengenai layanan yang kami berikan berdasarkan indikator kepuasan pelanggan berikut:');

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE `polling` (
  `idpolling` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `polling` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling`
--

INSERT INTO `polling` (`idpolling`, `waktu`, `polling`) VALUES
(1, '2018-12-17 19:31:10', 'sangat puas'),
(2, '2018-12-17 19:31:13', 'puas'),
(3, '2018-12-17 19:31:19', 'tidak puas'),
(4, '2018-12-17 19:31:28', 'tidak puas'),
(5, '2019-01-03 07:13:57', 'tidak puas'),
(6, '2019-01-03 07:14:00', 'sangat puas'),
(7, '2019-01-03 07:14:03', 'puas'),
(8, '2019-01-03 07:14:08', 'sangat puas'),
(9, '2019-01-08 14:49:56', 'tidak puas'),
(10, '2019-01-08 14:49:59', 'sangat puas'),
(11, '2019-01-08 14:50:02', 'puas'),
(12, '2019-01-08 14:50:06', 'sangat puas'),
(13, '2019-05-20 12:03:04', 'tidak puas'),
(14, '2019-05-20 12:03:09', 'puas'),
(15, '2019-05-20 12:03:16', 'sangat puas'),
(16, '2019-07-19 23:38:05', 'tidak puas'),
(17, '2019-07-19 23:38:09', 'sangat puas'),
(18, '2019-07-19 23:38:12', 'puas'),
(19, '2019-07-19 23:38:15', 'sangat puas'),
(20, '2019-09-20 20:18:17', 'tidak puas'),
(21, '2019-09-20 20:18:21', 'sangat puas'),
(22, '2019-09-20 20:18:28', 'tidak puas'),
(23, '2019-09-20 20:18:31', 'puas'),
(24, '2019-09-20 20:18:34', 'sangat puas'),
(25, '2019-09-20 20:18:38', 'sangat puas'),
(26, '2020-01-02 10:49:55', 'tidak puas'),
(27, '2020-01-02 10:49:58', 'sangat puas'),
(28, '2020-01-02 10:50:01', 'puas'),
(29, '2020-01-02 10:50:05', 'puas'),
(30, '2020-01-02 10:50:09', 'sangat puas'),
(31, '2020-01-02 10:50:13', 'puas');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `tanggal` int(20) NOT NULL,
  `bulan` int(20) NOT NULL,
  `tahun` int(20) NOT NULL,
  `tidakpuas` int(4) UNSIGNED DEFAULT NULL,
  `puas` int(4) UNSIGNED DEFAULT NULL,
  `sangatpuas` int(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`tanggal`, `bulan`, `tahun`, `tidakpuas`, `puas`, `sangatpuas`) VALUES
(2, 1, 2020, 1, 3, 2),
(3, 1, 2019, 1, 1, 2),
(8, 1, 2019, 1, 1, 2),
(17, 12, 2018, 2, 1, 1),
(19, 7, 2019, 1, 1, 2),
(20, 5, 2019, 1, 1, 1),
(20, 9, 2019, 2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `runningtext`
--

CREATE TABLE `runningtext` (
  `id` int(10) UNSIGNED NOT NULL,
  `informasi` varchar(450) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `runningtext`
--

INSERT INTO `runningtext` (`id`, `informasi`, `tanggal`) VALUES
(7, 'BPS Jatim', '2015-07-09'),
(8, 'percobaan menambahkan suatu running text', '2018-12-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`idkonten`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `polling`
--
ALTER TABLE `polling`
  ADD PRIMARY KEY (`idpolling`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`tanggal`,`bulan`,`tahun`);

--
-- Indexes for table `runningtext`
--
ALTER TABLE `runningtext`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `idkonten` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `polling`
--
ALTER TABLE `polling`
  MODIFY `idpolling` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `runningtext`
--
ALTER TABLE `runningtext`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
