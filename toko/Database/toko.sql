-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 02:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'alvin', 'alvin', 'alvin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email_c` varchar(100) NOT NULL,
  `password_c` varchar(100) NOT NULL,
  `nama_c` varchar(100) NOT NULL,
  `telepon_c` varchar(30) NOT NULL,
  `alamat_c` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email_c`, `password_c`, `nama_c`, `telepon_c`, `alamat_c`) VALUES
(0, 'alvinryandana@gmail.com', 'alvin', 'alvin', '082335789633', 'WIGUNA SELATAN 15/ 20');

-- --------------------------------------------------------

--
-- Table structure for table `harga_ongkir`
--

CREATE TABLE `harga_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_ongkir`
--

INSERT INTO `harga_ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'Jakarta', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `hist`
--

CREATE TABLE `hist` (
  `id_hist` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `alamat_kirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hist`
--

INSERT INTO `hist` (`id_hist`, `id_customer`, `id_ongkir`, `tanggal`, `kota`, `tarif`, `total`, `alamat_kirim`) VALUES
(1, 0, 1, '2024-06-05', 'Jakarta', 50000, 55550000, 'WIGUNA SELATAN 15/ 20'),
(2, 0, 1, '2024-06-05', 'Jakarta', 50000, 18550000, 'WIGUNA SELATAN 15/ 20'),
(3, 0, 1, '2024-06-05', 'Jakarta', 50000, 74050000, 'WIGUNA SELATAN 15/ 20'),
(4, 3, 1, '2024-06-05', 'Jakarta', 50000, 18550000, 'WIGUNA SELATAN 15/ 20'),
(5, 3, 1, '2024-06-05', 'Jakarta', 50000, 37050000, 'WIGUNA SELATAN 15/ 20');

-- --------------------------------------------------------

--
-- Table structure for table `hist_produk`
--

CREATE TABLE `hist_produk` (
  `id_hist_produk` int(11) NOT NULL,
  `id_hist` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hist_produk`
--

INSERT INTO `hist_produk` (`id_hist_produk`, `id_hist`, `id_produk`, `nama`, `jumlah`, `subharga`, `harga`) VALUES
(1, 1, 1, 'Polygon Siskiu D7', 3, 0, 18500000),
(2, 2, 1, 'Polygon Siskiu D7', 1, 0, 18500000),
(3, 3, 1, 'Polygon Siskiu D7', 4, 74000000, 18500000),
(4, 4, 1, 'Polygon Siskiu D7', 1, 18500000, 18500000),
(5, 5, 1, 'Polygon Siskiu D7', 2, 37000000, 18500000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_contact`
--

CREATE TABLE `pesan_contact` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan_contact`
--

INSERT INTO `pesan_contact` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'Alvin Ryan Dana', 'alvinryandana@gmail.com', 'testing', 'pesan testing tolong bisa');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_p` varchar(100) NOT NULL,
  `harga_p` int(11) NOT NULL,
  `berat_p` int(11) NOT NULL,
  `foto_p` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_p`, `harga_p`, `berat_p`, `foto_p`, `deskripsi`) VALUES
(1, 'Polygon Siskiu D7', 18500000, 14200, 'MY22-SISKIU-D7-P-REV.01.jpg', 'Polygon Siskiu D7 adalah sepeda gunung yang dirancang untuk penggemar trail dan all-mountain. Frame aluminium ALX yang ringan namun kuat, dengan travel suspensi depan 140mm dan suspensi belakang 135mm, memberikan kenyamanan dan stabilitas di berbagai medan. Dilengkapi dengan drivetrain 1x12 Shimano SLX, memungkinkan perpindahan gigi yang halus dan presisi. Sistem pengereman hidrolik Shimano memastikan kontrol yang optimal. Roda 27,5 inci dengan ban tubeless-ready memberikan traksi yang baik dan mengurangi risiko kebocoran. Sepeda ini juga memiliki dropper seatpost untuk penyesuaian tinggi sadel saat berkendara di medan yang bervariasi.'),
(4, 'United Clovis 6', 14300000, 13500, 'image3.jpg', 'United Clovis 6 adalah pilihan tepat bagi pecinta sepeda gunung yang mencari keseimbangan antara performa dan harga. Dibangun dengan frame alloy yang ringan dan tangguh, sepeda ini dilengkapi dengan suspensi depan RockShox Recon dengan travel 120mm, memberikan kenyamanan di trek bergelombang. Drivetrain Shimano Deore 1x11-speed menawarkan efisiensi dan kemudahan dalam berkendara. Rem cakram hidrolik dari Shimano memastikan pengereman yang kuat dan responsif. Sepeda ini menggunakan roda 29 inci yang memberikan kecepatan lebih tinggi dan stabilitas di jalur lurus serta kemampuan melibas rintangan dengan lebih mudah.		  '),
(5, 'Thrill Ravage 3.0', 10800000, 13800, 'thrill_sepeda_gunung_mtb_thrill_ravage_al_3-0_27-5_inch_10_speed_garansi_sni_full01_qio87orh.jpg', 'Thrill Ravage 3.0 adalah sepeda gunung yang ideal untuk rider pemula hingga menengah. Dengan frame aluminium yang kuat dan desain yang agresif, sepeda ini siap menghadapi berbagai tantangan medan off-road. Suspensi depan Suntour XCR dengan travel 100mm membantu menyerap guncangan saat berkendara. Dilengkapi dengan drivetrain Shimano Alivio 2x9-speed, sepeda ini menawarkan fleksibilitas dalam berbagai kondisi medan. Rem cakram mekanis memberikan daya henti yang andal. Roda 27,5 inci memberikan keseimbangan antara kelincahan dan kestabilan, membuat sepeda ini cocok untuk berbagai jenis trek.'),
(6, 'Pacific Invert 500', 7200000, 14000, 'Sepeda-Gunung-Polygon-Siskiu-D7-2019-1-1600x1600.jpg', 'Pacific Invert 500 adalah sepeda gunung entry-level yang menawarkan fitur-fitur solid dengan harga yang terjangkau. Dibuat dengan frame aluminium yang kokoh, sepeda ini dilengkapi dengan suspensi depan Zoom dengan travel 80mm untuk kenyamanan berkendara. Drivetrain Shimano Tourney 3x7-speed memberikan opsi gigi yang cukup untuk beragam kondisi trek. Rem cakram mekanis menawarkan performa pengereman yang baik. Roda 26 inci cocok untuk rider yang mencari kelincahan dan kontrol lebih di trek yang sempit atau berliku.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `harga_ongkir`
--
ALTER TABLE `harga_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `hist`
--
ALTER TABLE `hist`
  ADD PRIMARY KEY (`id_hist`);

--
-- Indexes for table `hist_produk`
--
ALTER TABLE `hist_produk`
  ADD PRIMARY KEY (`id_hist_produk`);

--
-- Indexes for table `pesan_contact`
--
ALTER TABLE `pesan_contact`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `harga_ongkir`
--
ALTER TABLE `harga_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hist`
--
ALTER TABLE `hist`
  MODIFY `id_hist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hist_produk`
--
ALTER TABLE `hist_produk`
  MODIFY `id_hist_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesan_contact`
--
ALTER TABLE `pesan_contact`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
