-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 04:31 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` varchar(15) NOT NULL,
  `NoMeter` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `KodeTarif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NoMeter`, `Nama`, `Alamat`, `KodeTarif`) VALUES
('2', 2, '2', '2', 'T003'),
('pl001', 1234, 'udin', 'cicurug', 'T001'),
('pl002', 2147483647, 'Mumun', 'cicurug', 'T001');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `IdBayar` varchar(15) NOT NULL,
  `IdTagihan` varchar(15) NOT NULL,
  `Tanggal` date NOT NULL,
  `BulanBayar` int(11) NOT NULL,
  `TotalBayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`IdBayar`, `IdTagihan`, `Tanggal`, `BulanBayar`, `TotalBayar`) VALUES
('1', 't002', '2019-02-01', 1, 0),
('b001', 't001', '2019-02-22', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `IdPenggunaan` varchar(15) NOT NULL,
  `Bulan` varchar(10) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `MeterAwal` int(11) NOT NULL,
  `MeterAkhir` int(11) NOT NULL,
  `JumlahMeter` int(11) DEFAULT NULL,
  `IdPelanggan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`IdPenggunaan`, `Bulan`, `Tahun`, `MeterAwal`, `MeterAkhir`, `JumlahMeter`, `IdPelanggan`) VALUES
('1', '1', 1, 4000, 6000, 2000, 'pl001'),
('2', '2', 2, 2, 2, 0, 'pl001'),
('3', '3', 3, 2000, 5000, 3000, 'pl001'),
('4', '4', 4, 4, 4, 0, 'pl001'),
('pg001', 'Januari', 2019, 3127, 5678, 0, 'pl001');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `IdTagihan` varchar(15) NOT NULL,
  `IdPenggunaan` varchar(15) NOT NULL,
  `JumlahTagihan` int(11) NOT NULL,
  `BiayaAdmin` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`IdTagihan`, `IdPenggunaan`, `JumlahTagihan`, `BiayaAdmin`, `Status`) VALUES
('t001', 'pg001', 0, 0, 'sudah dibayar'),
('t002', 'pg001', 0, 0, 'sudah dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `KodeTarif` varchar(15) NOT NULL,
  `Daya` int(11) NOT NULL,
  `TarifPerKWH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`KodeTarif`, `Daya`, `TarifPerKWH`) VALUES
('', 0, 0),
('1', 1, 1),
('3', 3, 3),
('T001', 900, 10000),
('T002', 1200, 20000),
('T003', 3000, 60000),
('T004', 450, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `HakAkses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `HakAkses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`),
  ADD KEY `KodeTarif` (`KodeTarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`IdBayar`),
  ADD KEY `IdTagihan` (`IdTagihan`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`IdPenggunaan`),
  ADD KEY `IdPelanggan` (`IdPelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`IdTagihan`),
  ADD KEY `IdPenggunaan` (`IdPenggunaan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`KodeTarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`KodeTarif`) REFERENCES `tarif` (`KodeTarif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`IdTagihan`) REFERENCES `tagihan` (`IdTagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`IdPenggunaan`) REFERENCES `penggunaan` (`IdPenggunaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
