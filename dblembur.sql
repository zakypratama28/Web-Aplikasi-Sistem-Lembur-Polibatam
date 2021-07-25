-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 08:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `form_lembur`
--

CREATE TABLE `form_lembur` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_lembur`
--

INSERT INTO `form_lembur` (`id`, `username`, `tanggal`, `jam_mulai`, `jam_selesai`, `keterangan`) VALUES
(33, 'Fahrurzaky01', '2021-07-22', '22:07:00', '04:13:00', 'gaming'),
(34, 'sal', '2021-07-23', '23:24:00', '04:30:00', 'oe'),
(35, 'dede', '2020-12-07', '16:39:00', '01:16:00', 'begadang'),
(36, 'dede', '2020-12-08', '16:35:00', '23:06:00', 'gaming'),
(37, 'dede', '2020-12-12', '07:58:00', '17:00:00', 'bersih'),
(39, 'mar', '2021-07-26', '00:29:00', '23:32:00', 'tinggal');

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id` int(11) NOT NULL,
  `jam_lembur` varchar(5) NOT NULL,
  `istirahat` varchar(2) NOT NULL,
  `total_lembur` varchar(5) NOT NULL,
  `uang_makan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id`, `jam_lembur`, `istirahat`, `total_lembur`, `uang_makan`) VALUES
(33, '6.10', '0', '6.10', '30000'),
(34, '5.10', '0', '5.10', '30000'),
(35, '8.616', '1', '7.616', '30000'),
(36, '6.516', '0', '6.516', '30000'),
(37, '9.033', '1', '8.033', '30000'),
(39, '23.05', '2', '21.05', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama`) VALUES
('EL', 'elektro'),
('IF', 'informatika'),
('MB', 'Manajemen Bisnis'),
('MS', 'Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `tarif`) VALUES
('I', 13000),
('II', 17000),
('III', 20000);

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
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `nama_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`nama_unit`) VALUES
('Tenaga Kebersihan'),
('Tenaga Pendidik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `NIK` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `rekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role_id`, `is_active`, `NIK`, `nama`, `jurusan`, `unit`, `kategori`, `telp`, `rekening`) VALUES
('beatrice', '1234', 2, 1, '66666', 'Beatrice', 'IF', 'Tenaga Pendidik', 'III', '8888', '9999'),
('dede', '123', 3, 0, '8765', 'eko sudarsono', 'EL', 'Tenaga Pendidik', 'III', '08527', '109721'),
('dewi', '123', 2, 1, '146744', 'santoso haryono', 'EL', 'Tenaga Pendidik', 'II', '8888', '9999'),
('eko', 'eko', 3, 1, '142019', 'Eko', 'MS', 'Tenaga Pendidik', 'III', '08726514', '919119'),
('Fahrurzaky01', 'Fahrurzaky01', 1, 1, '331190', 'zaky', 'IF', 'Tenaga Pendidik', 'I', '0896', '1038'),
('febi', 'febi', 3, 1, '4444', 'febi', 'IF', 'Tenaga Pendidik', 'II', '555555', '5555555555'),
('mar', 'mar', 3, 0, '8988', 'maryam', 'IF', 'Tenaga Kebersihan', 'I', '8888', '9999'),
('nugroho', '123', 1, 1, '8972', 'endang sutrisna', 'EL', 'Tenaga Pendidik', 'II', '081371', '109261'),
('rizky', '123', 2, 1, '33333', 'rizky', 'MB', 'Tenaga Pendidik', 'II', '080808', '109381'),
('sal', 'sal', 2, 1, '778899', 'arsal', 'MS', 'Tenaga Pendidik', 'II', '08961863', '9876'),
('santoso', '1234', 1, 1, '87654', 'santoso', 'MB', 'Tenaga Pendidik', 'I', '0876', '45678'),
('tama', 'tama', 1, 1, '43113', 'tama', 'MS', 'Tenaga Pendidik', 'I', '086829', '10963'),
('zul', 'zul', 3, 1, '51381', 'zul', 'MB', 'Tenaga Pendidik', 'III', '086152', '98546');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_lembur`
--
ALTER TABLE `form_lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_lembur_ibfk_1` (`username`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD KEY `id` (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD UNIQUE KEY `nama_unit` (`nama_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `jurusan` (`jurusan`),
  ADD KEY `user_ibfk_3` (`unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_lembur`
--
ALTER TABLE `form_lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_lembur`
--
ALTER TABLE `form_lembur`
  ADD CONSTRAINT `form_lembur_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `honor`
--
ALTER TABLE `honor`
  ADD CONSTRAINT `honor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `form_lembur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`unit`) REFERENCES `unit` (`nama_unit`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
