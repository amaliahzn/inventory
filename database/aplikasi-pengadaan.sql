-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 03:02 AM
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
-- Database: `aplikasi-pengadaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `asets`
--

CREATE TABLE `asets` (
  `id_aset` varchar(128) NOT NULL,
  `kode_aset` varchar(128) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `kondisi` varchar(128) DEFAULT 'Baik',
  `status_aset` varchar(50) DEFAULT NULL,
  `umur_ekonomis` int(11) DEFAULT NULL,
  `cara_perolehan` varchar(128) DEFAULT NULL,
  `jenis_aset` varchar(128) DEFAULT 'Berwujud',
  `qr_code` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `harga` varchar(150) NOT NULL,
  `stok_minimal` varchar(15) NOT NULL,
  `stok` int(15) NOT NULL,
  `barang_keluar` int(11) NOT NULL,
  `sisa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_kategori`, `nama_satuan`, `kd_barang`, `nama_barang`, `keterangan`, `harga`, `stok_minimal`, `stok`, `barang_keluar`, `sisa`) VALUES
(36, 'Komponen', 'Unit', 'BR00001', 'AC 250V 10A. CONSENT YSCTT-04C', 'Current test terminal blok for 4p', '', '4', 0, 0, 0),
(37, 'Komponen', 'Unit', 'BR00002', 'AC 250V 10A. CONSENT YSPTT-04C', 'Voltage test terminal blok for 4p', '', '4', 0, 0, 0),
(38, 'Komponen', 'Unit', 'BR00003', 'AC 250V 10A. PLUG', 'Current test terminal blok for 4p', '', '1', 0, 0, 0),
(39, 'Komponen', 'Unit', 'BR00004', 'AC 250V 10A. PLUG', 'Voltage test terminal blok for 4p', '', '1', 0, 0, 0),
(40, 'Komponen', 'Unit', 'BR00005', 'Control Transformer, CTR-3P, 150VA, 3 Ph, 50/60Hz', 'Primer:480 Vac(Delta), Sekunder:100/57,8 Vac(Star)', '', '3', 0, 0, 0),
(41, 'Material', 'Meter', 'BR00006', 'NYY 1X300 (SP) SQMM', '', '', '10', 0, 0, 0),
(42, 'Komponen', 'Unit', 'BR00007', 'NSYCVF85M230PF - EXHAUST FAN 230V 125 x 125', '', '', '1', 0, 0, 0),
(43, 'Komponen', 'Unit', 'BR00008', 'NSYCAG125LPF EXHAUST GRILLE 125 x 125', '', '', '1', 0, 0, 0),
(44, 'Material', 'Rol', 'BR00009', 'NYAF 1 x 1,5 mm2 BL', 'Kabel', '', '1', 0, 0, 0),
(45, 'Material', 'Rol', 'BR00010', 'NYAF 1 x 1,5 mm2 YL', 'Kabel', '', '3', 0, 0, 0),
(46, 'Material', 'Rol', 'BR00011', 'NYAF 1 x 35 mm2 BK', 'kabel', '', '1', 0, 0, 0),
(47, 'Peralatan', 'Pcs', 'BR00012', 'KTS011-F - Mechanical Thermostat NO', '', '', '2', 0, 0, 0),
(48, 'Peralatan', 'Pcs', 'BR00013', 'XF-20060-MBL-2 (8\') AC-Axial Blower Fan Fort \'KOTAK\'', '', '', '2', 0, 0, 0),
(49, 'Peralatan', 'Pcs', 'BR00014', 'CZ-7124 Micro Switch', '', '', '4', 0, 0, 0),
(50, 'Peralatan', 'Pcs', 'BR00015', 'Protected with Metal Cover for Fan 200 x 200', '', '', '2', 0, 0, 0),
(51, 'Peralatan', 'Pcs', 'BR00016', 'LED Lamp T5 5watt (30 cm)', '', '', '4', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `no_invoice` varchar(110) NOT NULL,
  `nama_supplier` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangkeluar`
--

INSERT INTO `barangkeluar` (`id_barangkeluar`, `kd_transaksi`, `no_invoice`, `nama_supplier`, `tanggal`, `keterangan`) VALUES
(13, 'OUT-2024-00001', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-08-05', ''),
(14, 'OUT-2024-00002', '24072904', 'PT. Sinar Elektronika', '2024-08-06', ''),
(15, 'OUT-2024-00003', '05889/GD/07/2024', 'PT. Cakra Lima', '2024-08-06', ''),
(16, 'OUT-2024-00004', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-08-07', ''),
(17, 'OUT-2024-00005', '24070040', 'PT. Sinarmonas Industries', '2024-08-08', 'Kabel'),
(18, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', ''),
(19, 'OUT-2024-00007', 'gfh', 'PT. Fortindo Sukses Makmur', '2024-09-04', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar_detail`
--

CREATE TABLE `barangkeluar_detail` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `no_invoice` varchar(110) NOT NULL,
  `nama_supplier` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `nama_satuan` varchar(15) DEFAULT NULL,
  `nama_kategori` varchar(15) DEFAULT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangkeluar_detail`
--

INSERT INTO `barangkeluar_detail` (`id`, `kd_transaksi`, `no_invoice`, `nama_supplier`, `tanggal`, `kd_barang`, `nama_barang`, `nama_satuan`, `nama_kategori`, `jumlah`) VALUES
(18, 'OUT-2024-00001', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-08-05', '', 'AC 250V 10A. CONSENT YSCTT-04C', 'Unit', 'Komponen', '4'),
(19, 'OUT-2024-00001', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-08-05', '', 'AC 250V 10A. CONSENT YSPTT-04C', 'Unit', 'Komponen', '4'),
(20, 'OUT-2024-00001', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-08-05', '', 'AC 250V 10A. PLUG', 'Unit', 'Komponen', '1'),
(21, 'OUT-2024-00001', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-08-05', '', 'AC 250V 10A. PLUG', 'Unit', 'Komponen', '1'),
(22, 'OUT-2024-00002', '24072904', 'PT. Sinar Elektronika', '2024-08-06', '', 'Control Transformer, CTR-3P, 150VA, 3 Ph, 50/60Hz', 'Unit', 'Komponen', '3'),
(23, 'OUT-2024-00003', '05889/GD/07/2024', 'PT. Cakra Lima', '2024-08-06', '', 'NYY 1X300 (SP) SQMM', 'Meter', 'Material', '500'),
(24, 'OUT-2024-00004', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-08-07', '', 'NSYCAG125LPF EXHAUST GRILLE 125 x 125', 'Unit', 'Material', '1'),
(25, 'OUT-2024-00004', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-08-07', '', 'NSYCVF85M230PF - EXHAUST FAN 230V 125 x 125', 'Unit', 'Komponen', '1'),
(26, 'OUT-2024-00005', '24070040', 'PT. Sinarmonas Industries', '2024-08-08', '', 'NYAF 1 x 1,5 mm2 BL', 'Rol', 'Material', '1'),
(27, 'OUT-2024-00005', '24070040', 'PT. Sinarmonas Industries', '2024-08-08', '', 'NYAF 1 x 1,5 mm2 YL', 'Rol', 'Material', '3'),
(28, 'OUT-2024-00005', '24070040', 'PT. Sinarmonas Industries', '2024-08-08', '', 'NYAF 1 x 35 mm2 BK', 'Unit', 'Material', '1'),
(29, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', '', 'KTS011-F - Mechanical Thermostat NO', 'Pcs', 'Peralatan', '2'),
(30, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', '', 'XF-20060-MBL-2 (8\') AC-Axial Blower Fan Fort \'KOTAK\'', 'Pcs', 'Peralatan', '2'),
(31, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', '', 'CZ-7124 Micro Switch', 'Pcs', 'Peralatan', '2'),
(32, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', '', 'CZ-7124 Micro Switch', 'Pcs', 'Peralatan', '4'),
(33, 'OUT-2024-00006', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-08-09', '', 'LED Lamp T5 5watt (30 cm)', 'Pcs', 'Peralatan', '4'),
(34, 'OUT-2024-00007', 'gfh', 'PT. Fortindo Sukses Makmur', '2024-09-04', '', 'LED Lamp T5 5watt (30 cm)', 'Pcs', 'Peralatan', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `no_invoice` varchar(110) NOT NULL,
  `nama_supplier` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`id_barangmasuk`, `kd_transaksi`, `no_invoice`, `nama_supplier`, `tanggal`, `keterangan`) VALUES
(20, 'IN-2024-00016', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-07-15', 'test terminal box'),
(21, 'IN-2024-00017', '24072904', 'PT. Sinar Elektronika', '2024-07-29', 'Control'),
(22, 'IN-2024-00018', '05889/GD/07/2024', 'PT. Cakra Lima', '2024-07-25', 'Material'),
(24, 'IN-2024-00019', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-07-03', ''),
(25, 'IN-2024-00020', '24070040', 'PT. Sinarmonas Industries', '2024-07-02', 'Kabel'),
(26, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', 'Supply Peralatan'),
(27, 'IN-2024-00022', 'aaaa', 'PT. Fortindo Sukses Makmur', '2024-09-04', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk_detail`
--

CREATE TABLE `barangmasuk_detail` (
  `id` int(11) NOT NULL,
  `kd_transaksi` varchar(50) NOT NULL,
  `no_invoice` varchar(110) NOT NULL,
  `nama_supplier` varchar(110) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `nama_satuan` varchar(15) DEFAULT NULL,
  `nama_kategori` varchar(15) DEFAULT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangmasuk_detail`
--

INSERT INTO `barangmasuk_detail` (`id`, `kd_transaksi`, `no_invoice`, `nama_supplier`, `tanggal`, `kd_barang`, `nama_barang`, `nama_satuan`, `nama_kategori`, `jumlah`) VALUES
(92, 'IN-2024-00016', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-07-15', '', 'AC 250V 10A. CONSENT YSCTT-04C', 'Unit', 'Komponen', '4'),
(93, 'IN-2024-00016', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-07-15', '', 'AC 250V 10A. CONSENT YSPTT-04C', 'Unit', 'Komponen', '4'),
(94, 'IN-2024-00016', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-07-15', '', 'AC 250V 10A. PLUG', 'Unit', 'Komponen', '1'),
(95, 'IN-2024-00016', 'KT-07-15-24', 'PT. Kortech Anugerah Indonesia', '2024-07-15', '', 'AC 250V 10A. PLUG', 'Unit', 'Komponen', '1'),
(96, 'IN-2024-00017', '24072904', 'PT. Sinar Elektronika', '2024-07-29', '', 'Control Transformer, CTR-3P, 150VA, 3 Ph, 50/60Hz', 'Unit', 'Komponen', '3'),
(97, 'IN-2024-00018', '05889/GD/07/2024', 'PT. Cakra Lima', '2024-07-25', '', 'NYY 1X300 (SP) SQMM', 'Meter', 'Material', '500'),
(98, 'IN-2024-00019', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-07-03', '', 'NSYCVF85M230PF - EXHAUST FAN 230V 125 x 125', 'Unit', 'Komponen', '1'),
(99, 'IN-2024-00019', '003/SJ-TLI/VII/2024', 'PT. Terang Listrik Indonesia', '2024-07-03', '', 'NSYCAG125LPF EXHAUST GRILLE 125 x 125', 'Unit', 'Komponen', '1'),
(100, 'IN-2024-00020', '24070040', 'PT. Sinarmonas Industries', '2024-07-02', '', 'NYAF 1 x 1,5 mm2 BL', 'Rol', 'Material', '1'),
(101, 'IN-2024-00020', '24070040', 'PT. Sinarmonas Industries', '2024-07-02', '', 'NYAF 1 x 1,5 mm2 YL', 'Rol', 'Material', '3'),
(102, 'IN-2024-00020', '24070040', 'PT. Sinarmonas Industries', '2024-07-02', '', 'NYAF 1 x 35 mm2 BK', 'Rol', 'Material', '1'),
(103, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', '', 'KTS011-F - Mechanical Thermostat NO', 'Pcs', 'Peralatan', '2'),
(104, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', '', 'XF-20060-MBL-2 (8\') AC-Axial Blower Fan Fort \'KOTAK\'', 'Pcs', 'Peralatan', '2'),
(105, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', '', 'Protected with Metal Cover for Fan 200 x 200', 'Pcs', 'Peralatan', '2'),
(106, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', '', 'CZ-7124 Micro Switch', 'Pcs', 'Peralatan', '4'),
(107, 'IN-2024-00021', 'DN/2406/2554', 'PT. Fortindo Sukses Makmur', '2024-06-27', '', 'LED Lamp T5 5watt (30 cm)', 'Pcs', 'Peralatan', '4');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(5) DEFAULT NULL,
  `nama_kategori` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `kode_kategori`, `nama_kategori`, `updated_at`) VALUES
(10, 'KT001', 'Komponen', '2024-08-06 19:11:36'),
(11, 'KT002', 'Material', '2024-08-06 19:11:41'),
(13, 'KT003', 'Peralatan', '2024-08-07 14:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_aset`
--

CREATE TABLE `lokasi_aset` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_aset`
--

INSERT INTO `lokasi_aset` (`id_lokasi`, `nama_lokasi`, `updated_at`) VALUES
(1, 'Head Office', '2021-11-04 13:08:25'),
(2, 'Produksi', '2021-11-04 13:08:40'),
(3, 'Gudang', '2021-11-04 13:08:49'),
(4, 'Laboratorium', '2021-11-04 13:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `nama_pengaju` varchar(110) NOT NULL,
  `kd_pengadaan` varchar(50) NOT NULL,
  `tgl_permintaan` varchar(155) NOT NULL,
  `tgl_dibutuhkan` varchar(155) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status_pengadaan` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `nama_pengaju`, `kd_pengadaan`, `tgl_permintaan`, `tgl_dibutuhkan`, `keterangan`, `status_pengadaan`) VALUES
(31, 'Ahsan', 'PA-010-2024', '2024-08-03', '2024-08-17', 'Perbaikan komponen', 'DiTolak'),
(30, 'Badri', 'PA-009-2024', '2024-08-03', '2024-08-09', 'Proyek PT.Givaudan', 'Diproses'),
(22, 'Ahsan', 'PA-001-2024', '2024-08-03', '2024-08-10', 'Proyek A ', 'Menunggu'),
(23, 'Zafar', 'PA-002-2024', '2024-08-03', '2024-08-10', 'Proyek Z', 'Menunggu'),
(24, 'Hana', 'PA-003-2024', '2024-08-03', '2024-08-17', 'Proyek H', 'Menunggu'),
(25, 'Nagi', 'PA-004-2024', '2024-08-03', '2024-08-17', 'Proyek N', 'Menunggu'),
(26, 'Doha', 'PA-005-2024', '2024-08-03', '2024-08-09', 'Proyek D', 'Menunggu'),
(27, 'Amalia', 'PA-006-2024', '2024-08-03', '2024-08-07', 'Proyek M', 'Menunggu'),
(37, 'Ahsan', 'PA-013-2024', '2024-07-30', '2024-08-14', 'Material kurang', 'Disetujui'),
(29, 'Ahsan', 'PA-008-2024', '2024-08-01', '2024-08-05', 'test genset', 'Selesai'),
(38, 'Zafar', 'PA-014-2024', '2024-08-01', '2024-08-11', 'test komponen', 'Menunggu'),
(36, 'Badri', 'PA-012-2024', '2024-08-01', '2024-08-10', 'tambah busbar', 'Menunggu'),
(35, 'Zafar', 'PA-011-2024', '2024-07-05', '2024-07-20', 'Supply Kabel', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_detail`
--

CREATE TABLE `pengadaan_detail` (
  `id` int(11) NOT NULL,
  `kd_pengadaan` varchar(50) NOT NULL,
  `nama_pengaju` varchar(110) NOT NULL,
  `tgl_permintaan` varchar(50) NOT NULL,
  `tgl_dibutuhkan` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status_pengadaan` varchar(15) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan_detail`
--

INSERT INTO `pengadaan_detail` (`id`, `kd_pengadaan`, `nama_pengaju`, `tgl_permintaan`, `tgl_dibutuhkan`, `keterangan`, `status_pengadaan`, `kd_barang`, `nama_barang`, `nama_satuan`, `nama_kategori`, `jumlah`) VALUES
(1, 'PA-001-2024', 'jens', '2024-07-24', '2024-07-25', 'as', 'Diproses', 'BR00006', 'Kertas Foto', 'Pack', 'ATK', '5'),
(2, 'PA-001-2024', 'jens', '2024-07-24', '2024-07-25', 'as', 'Diproses', 'BR00006', 'kertas A4', 'Pack', 'ATK', '50'),
(3, 'PA-002-2024', 'SDAS', '2024-07-25', '2024-07-26', 'DSASD', 'Menunggu', 'BR00006', 'kertas A4', 'Pack', 'ATK', '2'),
(13, 'PA-010-2024', 'Hana', '2024-08-01', '2024-08-17', 'material habis', 'Menunggu', '', 'Kabel F', 'Meter', 'Komponen', '6'),
(14, 'PA-007-2024', 'dsfF', '2024-08-02', '2024-08-10', 'sDF', 'Menunggu', '', 'Panel Z', 'Lot', 'Komponen', '4'),
(6, 'PA-009-2024', 'Dzk', '2024-08-02', '2024-08-09', 'proyek b', 'Selesai', 'BR00001', 'Panel Z', '', '', '6'),
(7, 'PA-009-2024', 'Dzk', '2024-08-02', '2024-08-09', 'proyek b', 'Selesai', 'BR00001', 'Kabel H', '', '', '6'),
(8, 'PA-008-2024', 'sDFSD', '2024-08-02', '2024-08-02', 'SDFS', 'Menunggu', 'BR00001', 'Panel Z', '', '', '5'),
(9, 'PA-009-2024', 'Dzk', '2024-08-02', '2024-08-09', 'proyek b', 'Selesai', 'BR00001', 'Panel Z', '', '', '7'),
(10, 'PA-003-2024', 'hgj', '2024-08-02', '2024-08-23', 'proyek a', 'Menunggu', 'BR00001', 'Kabel H', '', '', '6'),
(15, 'PA-004-2024', 'Nagi', '2024-08-03', '2024-08-17', 'Proyek N', 'Menunggu', '', 'Kabel F', 'Meter', 'Material', '5'),
(16, 'PA-005-2024', 'Doha', '2024-08-03', '2024-08-09', 'Proyek D', 'Menunggu', '', 'Panel B', 'Unit', 'Komponen', '1'),
(17, 'PA-006-2024', 'Amalia', '2024-08-03', '2024-08-07', 'Proyek M', 'Menunggu', '', 'Panel Z', 'Unit', 'Komponen', '2'),
(18, 'PA-008-2024', 'Ahsan', '2024-08-01', '2024-08-05', 'Kurang material kabel', 'Menunggu', '', 'Kabel F', 'Unit', 'Material', '2'),
(19, 'PA-014-2024', 'Rozy', '2024-08-01', '2024-08-10', 'Kurang', 'Menunggu', '', 'Panel Z', 'Unit', 'Komponen', '4'),
(20, 'PA-011-2024', 'Zafar', '2024-07-05', '2024-07-20', 'Supply Kabel', 'Diproses', '', 'NYAF 1 x 35 mm2 BK', 'Rol', 'Material', '2'),
(21, 'PA-011-2024', 'Zafar', '2024-07-05', '2024-07-20', 'Supply Kabel', 'Diproses', '', 'NSYCVF85M230PF - EXHAUST FAN 230V 125 x 125', 'Rol', 'Material', '1'),
(22, 'PA-011-2024', 'Zafar', '2024-07-05', '2024-07-20', 'Supply Kabel', 'Diproses', '', 'NYAF 1 x 1,5 mm2 BL', 'Meter', 'Material', '300'),
(23, 'PA-011-2024', 'Zafar', '2024-07-05', '2024-07-20', 'Supply Kabel', 'Diproses', '', 'NYY 1X300 (SP) SQMM', 'Meter', 'Material', '100');

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_penghapusan` int(11) NOT NULL,
  `id_aset` varchar(128) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `faktor` text DEFAULT NULL,
  `tgl_penghapusan` date DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(100) NOT NULL,
  `kd_amprah` varchar(150) DEFAULT NULL,
  `nama` varchar(20) NOT NULL,
  `ruang` varchar(20) NOT NULL,
  `kd_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `nama_kategori` varchar(110) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status_kasubag` int(11) NOT NULL,
  `status_kabag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `kd_amprah`, `nama`, `ruang`, `kd_barang`, `nama_barang`, `nama_kategori`, `nama_satuan`, `jumlah`, `tgl_permintaan`, `status_kasubag`, `status_kabag`) VALUES
(118, 'TRX-AB00014', 'Administrator', '', 'BR00006', 'Kertas Foto', 'ATK', 'Pack', 2, '2024-04-04', 0, 0),
(108, 'TRX-AB00005', 'heri munandar', 'IT', 'BR00006', 'Kertas Foto', 'ATK', 'Pack', 10, '2020-11-14', 1, 1),
(109, 'TRX-AB00006', 'heri munandar', 'IT', 'BR00004', 'Map', 'ATK', 'Lusin', 50, '2024-03-26', 2, 1),
(112, 'TRX-AB00009', 'heri munandar', 'IT', 'BR00006', 'Kertas Foto', 'ATK', 'Pack', 40, '2024-03-27', 1, 1),
(113, 'TRX-AB00005', 'heri munandar', 'IT', 'BR00006', 'Kertas Foto', 'ATK', 'Pack', 10, '2020-11-14', 1, 1),
(114, 'TRX-AB00010', 'heri munandar', 'IT', 'BR00006', 'Kertas Foto', 'ATK', 'Pack', 25, '2024-03-29', 0, 1),
(115, 'TRX-AB00011', 'heri munandar', 'IT', 'BR00006', 'Kertas Foto', 'ATK', 'lusin', 2, '2024-03-31', 1, 1),
(117, 'TRX-AB00014', 'Administrator', '', 'BR00006', 'kertas A4', 'ATK', 'Pack', 2, '2024-04-04', 0, 0),
(116, 'TRX-AB00012', 'heri munandar', 'IT', 'BR00004', 'Kertas Foto', 'ATK', 'lusin', 1, '2024-04-02', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `keterangan`) VALUES
(3, 'Unit', 'Unit Barang'),
(5, 'lusin', 'satuan lusin'),
(6, 'Lot', 'Satuan Panel'),
(7, 'Meter', 'Satuan Kabel'),
(12, 'Rol', '1 Rol = 100 Meter'),
(13, 'Pcs', 'pieces');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kd_supplier` varchar(11) NOT NULL,
  `nama_supplier` varchar(110) NOT NULL,
  `no_hape` varchar(15) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `keterangan` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kd_supplier`, `nama_supplier`, `no_hape`, `alamat`, `keterangan`) VALUES
(5, 'SPL00003', 'PT Arkananta', '086734568001', 'Depok', 'Supplier kabel'),
(6, 'SPL00004', 'PT. Kortech Anugerah Indonesia', '02184984137', 'Jl. Raya Hankara Ruko Sentra Bisnis No.7, Jatiwama, Pd. Melati,Bekasi.', 'Supply Terminal Box'),
(7, 'SPL00005', 'PT. Sinar Elektronika', '0215482347', 'Jl Raya Kebayoran Lama No.271, Jakarta 12210', 'Supply Control'),
(8, 'SPL00006', 'PT. Cakra Lima', '0216903993', 'Jl. Pinangsia Timur, Jakarta Barat 11110', 'Distributor and General Trade'),
(9, 'SPL00007', 'PT. Terang Listrik Indonesia', '081290483872', 'Wisma Intan Wijaya 7th Floor Unit 8, Jl. Arjuna Selatan No. 75 Rt.002, Rw.012, Kebon Jeruk, Jakarta Barat, 11530', 'Proyek A'),
(10, 'SPL00008', 'PT. Sinarmonas Industries', '0215919109', 'Jl. Palem Manis Raya, Ds. Gandasari. Kec.Jatiuwung, Tangerang, 15137.', 'Supply Kabel'),
(11, 'SPL00009', 'PT. Fortindo Sukses Makmur', '02122520681', 'Komp. Pergudangan Prima Center 1 Ext Blok F No.12 Rt.009. Rw.002, Kedaung, Kali Angke, Cengkareng, Jakarta Barat.', 'Supply Peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `ruangan` varchar(45) NOT NULL,
  `role` enum('1','2','3','4') DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `jabatan`, `ruangan`, `role`, `foto`) VALUES
(18, 'Ahsan', 'ahsan123', '3d68b18bd9042ad3dc79643bde1ff351', 'Manajer Pembelian', '', '2', NULL),
(19, 'Zafar', 'zafar123', '3b8eb8d23ad703b5575ae585d39caf9f', 'Staf Pembelian', '', '2', NULL),
(20, 'Amar (Admin)', 'amar123', 'd01b8c6ea1a64ba2510df7cee1e4d604', 'Admin Gudang', '', '1', '63c3aa0a66fbecf73e640ab88afb15c3.png'),
(21, 'Tanto', 'tanto123', 'fa6c90ead4d4870321f99eed967c01dc', 'Direktur', '', '3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`id_barangkeluar`);

--
-- Indexes for table `barangkeluar_detail`
--
ALTER TABLE `barangkeluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id_barangmasuk`);

--
-- Indexes for table `barangmasuk_detail`
--
ALTER TABLE `barangmasuk_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan_detail`
--
ALTER TABLE `pengadaan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `barangkeluar_detail`
--
ALTER TABLE `barangkeluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `barangmasuk_detail`
--
ALTER TABLE `barangmasuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lokasi_aset`
--
ALTER TABLE `lokasi_aset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pengadaan_detail`
--
ALTER TABLE `pengadaan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id_penghapusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asets`
--
ALTER TABLE `asets`
  ADD CONSTRAINT `asets_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asets_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_aset` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD CONSTRAINT `penghapusan_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `asets` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
