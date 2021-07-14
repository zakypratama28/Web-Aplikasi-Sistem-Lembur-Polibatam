-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 06:25 PM
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
  `id_dethonor` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tarif` varchar(11) NOT NULL,
  `tggl` date DEFAULT NULL,
  `jml_jam` decimal(3,0) NOT NULL,
  `jml_uang_lembur` varchar(11) NOT NULL,
  `uang_makan` varchar(11) NOT NULL,
  `jml_uang_lembur_makan` varchar(11) NOT NULL,
  `PPh_pasal21` varchar(11) NOT NULL,
  `jml_honor_pajak` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `det_honor`
--

INSERT INTO `det_honor` (`id_dethonor`, `username`, `kategori`, `tarif`, `tggl`, `jml_jam`, `jml_uang_lembur`, `uang_makan`, `jml_uang_lembur_makan`, `PPh_pasal21`, `jml_honor_pajak`) VALUES
(1, 'Fahrurzaky01', '0', '300000', '2021-02-28', '6', '100000', '50000', '150000', '120000', '150000'),
(3, 'Fahrurzaky01', '872654', '3000000', '2020-02-25', '8', '100000', '50000', '150000', '40000', '700000'),
(4, 'FebiolaSelvia18', 'I', '250', '2020-02-22', '6', '8', '9', '18', '200000', '90000');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_lembur`
--

INSERT INTO `form_lembur` (`id`, `username`, `tanggal`, `jam_mulai`, `jam_selesai`, `keterangan`) VALUES
(2, 'FebiolaSelvia18', '2020-05-05', '18:00:00', '21:00:00', 'input nilai'),
(3, 'beatrice', '2021-01-10', '15:00:00', '19:00:00', 'sesi');

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id_honor` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_lembur` decimal(3,0) NOT NULL,
  `istirahat` int(7) NOT NULL,
  `jml_jam_lembur` decimal(3,0) NOT NULL,
  `uang_makan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id_honor`, `username`, `kegiatan`, `tanggal`, `jam_lembur`, `istirahat`, `jml_jam_lembur`, `uang_makan`) VALUES
(3, 'Fahrurzaky01', 'camping', '2021-06-05', '3', 1, '6', 50000),
(4, 'Fahrurzaky01', 'Audit Internal', '2021-06-01', '6', 2, '12', 100000),
(5, 'Fahrurzaky01', 'pekerjaan tes komisuoning panel surya', '2020-02-28', '8', 1, '7', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `input_lembur`
--

CREATE TABLE `input_lembur` (
  `nik` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ket` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `input_lembur`
--

INSERT INTO `input_lembur` (`nik`, `nama`, `jurusan`, `tanggal`, `jam_mulai`, `jam_selesai`, `ket`) VALUES
(101, 'Jonson', 'informatika', '2021-07-06', '14:30:00', '17:00:00', 'lembur audit'),
(102, 'eko', 'elektro', '2021-06-04', '13:00:00', '17:00:00', 'audit'),
(103, 'doni', 'mesin', '2021-02-06', '16:00:00', '19:00:00', 'programing');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `username` varchar(50) NOT NULL,
  `NIK_kepala` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`username`, `NIK_kepala`) VALUES
('FebiolaSelvia18', 0);

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
  `NIK_kepala` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_unit`
--

INSERT INTO `kepala_unit` (`NIK_kepala`) VALUES
(1467351);

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
  `is_active` int(11) NOT NULL DEFAULT 0,
  `NIK` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `rekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role_id`, `is_active`, `NIK`, `nama`, `unit`, `telp`, `rekening`) VALUES
('beatrice', '1234', 2, 1, '9876', 'Betris', 'Keuangan', '0897', '9876'),
('Fahrurzaky01', 'Fahrurzaky01', 1, 1, '331190', 'zaky', 'Kepala Unit', '0896', '1038'),
('FebiolaSelvia18', 'Febiolaselvia18', 3, 1, '331180', 'febi', 'Karyawan', '0852', '9013');

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
  ADD PRIMARY KEY (`id_dethonor`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `form_lembur`
--
ALTER TABLE `form_lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id_honor`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `input_lembur`
--
ALTER TABLE `input_lembur`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`username`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `det_honor`
--
ALTER TABLE `det_honor`
  MODIFY `id_dethonor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_lembur`
--
ALTER TABLE `form_lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `det_honor`
--
ALTER TABLE `det_honor`
  ADD CONSTRAINT `det_honor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `form_lembur`
--
ALTER TABLE `form_lembur`
  ADD CONSTRAINT `form_lembur_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `honor`
--
ALTER TABLE `honor`
  ADD CONSTRAINT `honor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
