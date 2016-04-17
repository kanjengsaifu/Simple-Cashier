-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 11:16 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(4) NOT NULL auto_increment,
  `username` varchar(100) collate latin1_general_ci NOT NULL,
  `password` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_barang` varchar(225) collate latin1_general_ci NOT NULL,
  `harga` int(225) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(10) NOT NULL,
  PRIMARY KEY  (`kode_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `harga`, `diskon`, `stok`) VALUES
('BAT0002', 'batik', 12000, 0, 50),
('SPR0002', 'sprit', 4000, 0, 50),
('COL0002', 'cola', 25000, 5, 50),
('LAS0002', 'lasegar', 12000, 0, 50),
('FAN0002', 'fanta', 6000, 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(8) NOT NULL auto_increment,
  `no_rensi` varchar(225) collate latin1_general_ci NOT NULL,
  `tanggal_rensi` datetime NOT NULL,
  `total` int(8) NOT NULL,
  `jumlah_bayar` int(8) NOT NULL,
  `jumlah_kembali` int(8) NOT NULL,
  `kasir` int(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `no_rensi`, `tanggal_rensi`, `total`, `jumlah_bayar`, `jumlah_kembali`, `kasir`) VALUES
(1, '15111820001', '2015-11-18 09:11:28', 20000, 30000, 10000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(4) NOT NULL auto_increment,
  `username` varchar(225) collate latin1_general_ci NOT NULL,
  `password` varchar(225) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'kasir1', 'kasir1'),
(2, 'kasir2', 'kasir2'),
(3, 'kasir3', 'kasir3'),
(4, 'kasir4', 'kasir4');
