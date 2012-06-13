-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2012 at 08:21 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aset_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_brg` int(11) DEFAULT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `keterangan_brg` text,
  `status_brg` enum('Y','T') DEFAULT 'T',
  `kode_ruang` varchar(5) NOT NULL,
  PRIMARY KEY (`kode_brg`),
  KEY `kode_ruang` (`kode_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `kode_brg`, `nama_brg`, `merk`, `ukuran`, `jumlah`, `harga_satuan`, `total_biaya`, `keterangan_brg`, `status_brg`, `kode_ruang`) VALUES
(1, 'A0123', 'meja praktikum', 'meubeul', 'M', 5, 20000, 1000000, NULL, 'Y', 'LAB01'),
(2, 'A0125', 'Tabung Reaksi', 'Pharmacy', 'M', 5, 150000, 750000, 'Kosong', 'Y', 'LAB01'),
(3, 'A0127', 'Pipet', 'cingcuy', 'S', 5, 15000, 75000, 'Pipet baru untuk mengganti yang lama', 'T', 'LAB01'),
(4, 'B0112', 'Palu', 'Champ', 'M', 5, 25000, 125000, 'palu untuk memecahkan batu', 'T', 'LAB02');

-- --------------------------------------------------------

--
-- Table structure for table `pembukuan`
--

CREATE TABLE IF NOT EXISTS `pembukuan` (
  `id_pembukuan` int(11) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_pembukuan`),
  KEY `no_sk` (`no_sk`),
  KEY `kd_brg` (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembukuan`
--

INSERT INTO `pembukuan` (`id_pembukuan`, `no_sk`, `kd_brg`, `kondisi`, `alasan`, `keterangan`) VALUES
(1, '10/SK.HPS/DPH/2012', 'A0123', 'Bagus', 'Pertimbangan Ekonomis', NULL),
(2, '10/SK.HPS/DPH/2012', 'A0125', 'Rusak Berat', 'Pertimbangan Teknis', 'ganti baru');

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE IF NOT EXISTS `rawat` (
  `id_rawat` int(11) NOT NULL,
  `tgl_rwt` date DEFAULT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `kd_ruang` varchar(5) NOT NULL,
  `jumlah_rwt` int(11) DEFAULT NULL,
  `biaya_rwt` int(11) DEFAULT NULL,
  `total_biaya_rwt` int(11) DEFAULT NULL,
  `keterangan_rwt` text,
  PRIMARY KEY (`id_rawat`),
  KEY `kd_brg` (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat`
--

INSERT INTO `rawat` (`id_rawat`, `tgl_rwt`, `kd_brg`, `nm_brg`, `kd_ruang`, `jumlah_rwt`, `biaya_rwt`, `total_biaya_rwt`, `keterangan_rwt`) VALUES
(1, '2012-06-06', 'A0127', 'Pipet', 'LAB01', 5, 20000, 100000, 'Buat Beli Alat pembersih'),
(2, '2012-06-04', 'B0112', 'Palu', 'LAB02', 3, 50000, 150000, 'buat ganti gagangnya');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `id_ruang` int(11) NOT NULL,
  `kd_ruang` varchar(5) NOT NULL,
  `nm_ruang` varchar(30) NOT NULL,
  `keterangan_rg` text,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `kd_ruang`, `nm_ruang`, `keterangan_rg`) VALUES
(1, 'LAB01', 'Laboratorium Hidro Kimia', 'Laboratorium untuk penelitian yang berhubungan dengan air'),
(2, 'LAB02', 'Laboratorium Bebatuan', 'Laboratorium untuk penelitian bebatuan yang berada di dekat perairan');

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE IF NOT EXISTS `sk` (
  `id_sk` int(11) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tgl_sk` date NOT NULL,
  `keterangan_sk` text,
  PRIMARY KEY (`no_sk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`id_sk`, `no_sk`, `tgl_sk`, `keterangan_sk`) VALUES
(1, '10/SK.HPS/DPH/2012', '2012-05-23', 'penghapusan barang'),
(2, '17/SK.HPS/KDH/2012', '2012-06-04', 'Penghapusan Barang yang sudah Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hindaka'),
(2, 'SuperAdmin', '1b3231655cebb7a1f783eddf27d254ca', 'hindaka2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kode_ruang`) REFERENCES `ruangan` (`kd_ruang`) ON UPDATE CASCADE;

--
-- Constraints for table `pembukuan`
--
ALTER TABLE `pembukuan`
  ADD CONSTRAINT `pembukuan_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kode_brg`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembukuan_ibfk_2` FOREIGN KEY (`no_sk`) REFERENCES `sk` (`no_sk`) ON UPDATE CASCADE;

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `rawat_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kode_brg`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
