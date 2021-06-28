-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 03:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblembur`
--

-- --------------------------------------------------------

--
-- Table structure for table `bag_keuangan`
--

CREATE TABLE `bag_keuangan` (
  `NIK_keuangan` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `telp` text NOT NULL,
  `rekening` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `det_honor`
--

CREATE TABLE `det_honor` (
  `id_dethonor` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` int(1) NOT NULL,
  `tarif` varchar(11) NOT NULL,
  `jml_jam` decimal(3,0) NOT NULL,
  `jml_uang_lembur` varchar(11) NOT NULL,
  `uang_makan` varchar(11) NOT NULL,
  `jml_uang_lembur+makan` varchar(11) NOT NULL,
  `PPh_pasal21` varchar(11) NOT NULL,
  `jml_honor-pajak` varchar(11) NOT NULL,
  `rekening` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form_lembur`
--

CREATE TABLE `form_lembur` (
  `id` int(7) NOT NULL,
  `NIK` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_lembur`
--

INSERT INTO `form_lembur` (`id`, `NIK`, `nama`, `tanggal`, `jam_mulai`, `jam_selesai`, `keterangan`) VALUES
(1, 2189651, 'Febiola Selvia Mulyadi', '2021-06-10', '17:00:00', '20:00:00', 'Input Data Mahasiswa Baru Program Studi Teknik Informatika dan Teknik Geomatika');

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id_honor` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_lembur` decimal(3,0) NOT NULL,
  `istirahat` int(7) NOT NULL,
  `jml_jam_lembur` decimal(3,0) NOT NULL,
  `uang_makan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK_karyawan` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `telp` char(13) NOT NULL,
  `rekening` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK_karyawan`, `nama`, `unit`, `telp`, `rekening`) VALUES
(2189651, 'Febiola Selvia Mulyadi', 'Tata Usaha', '085836372114', '0987584612');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `tarif` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kepala_unit`
--

CREATE TABLE `kepala_unit` (
  `NIK_kepala` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `telp` char(13) NOT NULL,
  `rekening` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_unit`
--

INSERT INTO `kepala_unit` (`NIK_kepala`, `nama`, `unit`, `telp`, `rekening`) VALUES
(1467351, 'Fahrurzaky Nur Pratama', 'Tata Usaha', '081234567384', '0374572918');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Kepala Unit'),
(2, 'Bagian Keuangan'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role_id`, `is_active`) VALUES
('Fahrurzaky01', 'fahrurzaky01', 1, 1),
('FebiolaSelvia18', 'febiolaselvia18', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bag_keuangan`
--
ALTER TABLE `bag_keuangan`
  ADD PRIMARY KEY (`NIK_keuangan`);

--
-- Indexes for table `det_honor`
--
ALTER TABLE `det_honor`
  ADD PRIMARY KEY (`id_dethonor`);

--
-- Indexes for table `form_lembur`
--
ALTER TABLE `form_lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIK_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kepala_unit`
--
ALTER TABLE `kepala_unit`
  ADD PRIMARY KEY (`NIK_kepala`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
