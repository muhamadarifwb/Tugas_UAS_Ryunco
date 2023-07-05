-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 08:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ryunco`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(14, 32, 'T-SHIRT MEMPHISORIGINS GEIKO Slide 2', 'IMG_20230704_1344572.jpg', '2023-07-04 19:41:55'),
(15, 33, 'Tshirt Nekosamurai SLIDE2', 'IMG_20230704_1344573.jpg', '2023-07-05 05:25:08'),
(16, 34, 'TSHIRT BALINESE CELULUK SLIDE2', 'IMG_20230704_1344574.jpg', '2023-07-05 05:30:15'),
(17, 36, 'Jeans Black Ripped SLIDE2', 'JEANS_SIZE.jpg', '2023-07-05 05:39:04'),
(18, 37, 'Jeans Denimitup', 'JEANS_SIZE1.jpg', '2023-07-05 05:43:25'),
(19, 38, 'Jeans - Uprise Denim SLIDE2', 'JEANS_SIZE2.jpg', '2023-07-05 05:46:11'),
(20, 39, 'JEANS LODENIM', 'JEANS_SIZE3.jpg', '2023-07-05 05:48:02'),
(21, 40, 'JACKET MEMPHIS SUKAJAN  - KIYOMIZU SLIDE2', 'JACKET_SIZE.jpg', '2023-07-05 05:53:40'),
(22, 41, 'JACKET SUKAJAN - NEKOSAMURAI SLIDE2', 'JACKET_SIZE2.jpg', '2023-07-05 05:56:29'),
(23, 42, 'JACKET VARSITY - EAST TIGER  BLACK slide2', 'JACKET_SIZE3.jpg', '2023-07-05 06:00:27'),
(24, 43, 'JACKET VARSITY - KAMIKAZE SLIDE2', 'JACKET_SIZE4.jpg', '2023-07-05 06:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telephon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(17, 0, 10, 'Muhamad Arif WB', '17200095@bsi.ac.id', '0895378942596', 'jl. jalan', '04072023ZR2BW5V3', '2023-07-04 00:00:00', 100000, 'Konfirmasi', 100000, '1111222233334444', 'Muhamad Arif WB', 'IMG_20230704_134457.jpg', 1, '05-07-23', 'Bank BCA', '2023-07-04 21:52:54', '2023-07-05 04:41:32'),
(18, 0, 10, 'Muhamad Arif WB', '17200095@bsi.ac.id', '0895378942596', 'jl. jalan', '05072023DMCJ6XF8', '2023-07-05 00:00:00', 100000, 'Konfirmasi', 100000, '1111222233334444', 'Muhamad Arif WB', 'IMG_20230704_1344571.jpg', 1, '05-07-23', 'Bank BCA', '2023-07-05 06:48:50', '2023-07-05 04:53:06'),
(19, 0, 10, 'Muhamad Arif WB', '17200095@bsi.ac.id', '0895378942596', 'jl. jalan', '05072023P1WSGUDZ', '2023-07-05 00:00:00', 100000, 'Konfirmasi', 100000, '1111222233334444', 'Muhamad Arif WB', '20602.jpg', 1, '05-07-23', 'Bank BCA', '2023-07-05 06:56:02', '2023-07-05 04:59:47'),
(20, 0, 10, 'Muhamad Arif WB', '17200095@bsi.ac.id', '0895378942596', 'jl. jalan', '05072023PCWXTJZI', '2023-07-05 00:00:00', 100000, 'Konfirmasi', 100000, '1111222233334444', 'Muhamad Arif WB', '206021.jpg', 1, '05-07-23', 'Bank BCA', '2023-07-05 07:03:30', '2023-07-05 05:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(20, 'tshirt', 'Tshirt', 1, '2023-07-04 19:40:07'),
(21, 'jeans', 'Jeans', 2, '2023-07-04 19:40:14'),
(22, 'jacket', 'Jacket', 3, '2023-07-04 19:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telephone`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(2, 'Ryunco Store', 'Harga Bintang 5 Kualitas Bintang 1', 'ryunco.gmail.com', 'www.ryunco.com', 'Ryunco Store', 'Ryunco Store', '', 'jalan jalan', 'www.facebook.com', '@ryunco', 'Ini Toko Baju', '206022.jpg', '206023.jpg', '1111222233334444', '2023-07-04 19:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telephon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telephon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(10, 0, 'Pending', 'Muhamad Arif WB', '17200095@bsi.ac.id', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0895378942596', 'jl. jalan', '2023-07-04 18:58:24', '2023-07-04 16:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_diskon` bigint(20) DEFAULT NULL,
  `tanggal_mulai_diskon` date DEFAULT NULL,
  `tanggal_selesai_diskon` date DEFAULT NULL,
  `stok_minimal` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `harga_beli`, `harga_diskon`, `tanggal_mulai_diskon`, `tanggal_selesai_diskon`, `stok_minimal`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(32, 13, 20, 'TS01', 'T-SHIRT MEMPHISORIGINS GEIKO', 't-shirt-memphisorigins-geiko-ts01', '<p>Ini Tshirt</p>', 'Tshirt MEMPHISORIGINS GEIKO', 100000, 90000, NULL, NULL, NULL, 1, 100, 'BAJU11.jpg', 167, 'L XL', 'publish', '2023-07-04 21:41:34', '2023-07-04 19:41:34'),
(33, 13, 20, 'TS02', 'Tshirt Nekosamurai', 'tshirt-nekosamurai-ts02', '<p><strong>TSHIRT NEKOSAMURAI</strong></p><p>BAHAN : COMBED 24S<br />WARNA : CREAM<br /><br />SIZE : S, M, L, XL, XXL<br /><br />ALL SIZE READY STOCK...</p>', 'TSHIRT NEKOSAMURAI', 120000, 100000, NULL, NULL, NULL, 1, 100, 'BAJU2.jpg', 167, 'S, M, L, XL, XXL', 'publish', '2023-07-05 07:24:37', '2023-07-05 05:24:37'),
(34, 13, 20, 'TS03', 'TSHIRT BALINESE CELULUK', 'tshirt-balineseceluluk-ts03', '<p><strong>TSHIRT BALINESE&nbsp;CELULUK</strong></p><p>BRAND : MPHS OG</p><p>TYPE : CELULUK T-SHIRT</p><p>COL : OLIVE</p><p>SIZE :S - M - L - XL - XXL</p><p>&nbsp;</p>', 'TSHIRT BALINESE CELULUK', 120000, 100000, NULL, NULL, NULL, 1, 100, 'BAJU3.jpg', 167, 'S - M - L - XL - XXL', 'publish', '2023-07-05 07:29:49', '2023-07-05 05:29:49'),
(35, 13, 20, 'TS04', 'TSHIRT - UESUGI KENSHIN', 'tshirt-uesugi-kenshin-ts04', '<p><strong>TSHIRT - UESUGI KENSHIN</strong></p><p>Available size S,M,L,XL,XXL</p><p>Material : Cotton Combed 30s + Plastisol Ink</p>', 'TSHIRT - UESUGI KENSHIN', 1250000, 105000, NULL, NULL, NULL, 1, 100, 'BAJU4.jpg', 167, 'S - M - L - XL - XXL', 'publish', '2023-07-05 07:33:06', '2023-07-05 05:33:06'),
(36, 13, 21, 'JNS01', 'Jeans Black  Ripped', 'jeans-black-ripped-jns01', '<p>Bahan : BAJATEX PREMIUM Bahan streach,lembut nyaman untuk penampilan sehari&quot; ( BERKUALITAS DISTRO) Model sobek lutut tambalan ( TIDAK TEMBUS ) size : Tersedia _28,Lingkar pinggang ( 78cm) panjang celana (97cm) _29,LP ( 79cm ) PJ (98cm) _30,LP ( 81cm ) PJ (99cm) _31,LP ( 83cm ) PJ (99cm) _32,LP ( 85cm ) PJ (102cm) _33,LP ( 87cm ) PJ (105cm)</p>', 'JEANS BLACK RIPPED', 150000, 140000, NULL, NULL, NULL, 1, 50, 'JEANS1.jpg', 167, 'S - M - L - XL - XXL', 'publish', '2023-07-05 07:36:29', '2023-07-05 05:36:29'),
(37, 13, 21, 'JNS02', 'Jeans Denimitup', 'jeans-denimitup-jns02', '<p><em>Ripped jeans</em>&nbsp;pertama yaitu dari&nbsp;<em>brand lokal</em>&nbsp;Denimitup. Celana&nbsp;<em>jeans</em>&nbsp;ini terbuat dari 98%&nbsp;<em>cotton</em>&nbsp;dan 2%&nbsp;<em>elastane</em>&nbsp;yang membuat celana ini nyaman ketika digunakan. Ukuran dari celana ini&nbsp;<em>skinyfit</em>, jadi sangat cocok untuk pria yang ingin tampil trendi.</p>', 'Jeans Ripped Denimitup', 200000, 100000, NULL, NULL, NULL, 1, 10, 'JEANS2.jpg', 350, '', 'publish', '2023-07-05 07:43:05', '2023-07-05 05:43:05'),
(38, 13, 21, 'JNS03', 'Jeans - Uprise Denim', 'jeans-uprise-denim-jns03', '<p><em>Ripped jeans</em>&nbsp;yang dibuat menggunakan bahan&nbsp;<em>full cotton denim</em>, dan memiliki&nbsp;<em>cutting</em>&nbsp;<em>skinny fit</em>&nbsp;yang membuat celana ini menjadi lebih modis dan trendi. Selain itu, celana&nbsp;<em>ripped jeans</em>&nbsp;dari&nbsp;<em>brand</em>&nbsp;Uprise Denim memiliki varian warna yang menarik dan model yang kekinian.&nbsp;</p>', 'Jeans Uprise Denim', 250000, 200000, NULL, NULL, NULL, 1, 5, 'JEANS3.jpg', 350, '', 'publish', '2023-07-05 07:45:47', '2023-07-05 05:45:47'),
(39, 13, 21, 'JNS04', 'JEANS LODENIM', 'jeans-lodenim-jns04', '<p>Lodenim merupakan&nbsp;<em>brand</em>&nbsp;lokal yang berasal dari Tangerang, Banten. Memproduksi dan menjual&nbsp;<em>ripped jeans</em>&nbsp;dengan berbagai macam pilihan yang sangat menarik dan keren. Terbuat dari bahan&nbsp;<em>denim high quality</em>&nbsp;sehingga membuat&nbsp;<em>jeans</em>&nbsp;ini tidak mudah rusak dan tahan lama.</p>', 'JEANS LODENIM', 500000, 250000, NULL, NULL, NULL, 1, 3, 'JEANS4.jpg', 350, '', 'publish', '2023-07-05 07:47:48', '2023-07-05 05:47:48'),
(40, 13, 22, 'JKT01', 'JACKET MEMPHIS SUKAJAN  - KIYOMIZU', 'jacket-memphis-sukajan-kiyomizu-jkt01', '<p><strong>JACKET MEMPHIS SUKAJAN &nbsp;- KIYOMIZU</strong></p><p>Available size S,M,L,XL,XXL<br />Material :<br />-Soft Satin Material<br />-full embroidery design (Bordir)</p>', 'JACKET MEMPHIS SUKAJAN  - KIYOMIZU', 500000, 100000, NULL, NULL, NULL, 1, 666, 'JACKETS1.jpg', 750, 'S - M - L - XL - XXL', 'publish', '2023-07-05 07:53:21', '2023-07-05 05:53:21'),
(41, 13, 22, 'JKT02', 'JACKET SUKAJAN  - NEKOSAMURAI', 'jacket-sukajan-nekosamurai-jkt02', '<p><strong>JACKET SUKAJAN &nbsp;- NEKOSAMURAI</strong></p><p>Available size S,M,L,XL,XXL<br />Material :<br />-Soft Satin Material<br />-full embroidery design (Bordir)</p>', 'JACKET SUKAJAN  - NEKOSAMURAI', 750000, 100000, NULL, NULL, NULL, 1, 1000, 'JACKETS2.jpg', 750, 'S - M - L - XL - XXL', 'publish', '2023-07-05 07:55:55', '2023-07-05 05:56:11'),
(42, 13, 22, 'JKT03', 'JACKET VARSITY - EAST TIGER  BLACK', 'jacket-varsity-east-tiger-black-jkt03', '<p><strong>JACKET VARSITY - EAST TIGER &nbsp;BLACK</strong></p><p>RARE ITEM &amp; LIMITED EDITION</p><p>BRAND : MPHS TYPE : EAST TIGER VARSITY JACKET</p><p>COL : BLACK</p><p>SIZE : S - M - L - XL - XXL</p><p>&nbsp;</p>', 'JACKET VARSITY - EAST TIGER  BLACK', 850000, 200000, NULL, NULL, NULL, 1, 2, 'JACKETS3.jpg', 750, 'S - M - L - XL - XXL', 'publish', '2023-07-05 08:00:10', '2023-07-05 06:00:10'),
(43, 13, 22, 'JKT04', ' JACKET  VARSITY - KAMIKAZE (LIMITED EDITION) ', 'jacket-varsity-kamikaze-limited-edition-jkt04', '<p><strong>&nbsp;JACKET &nbsp;VARSITY - KAMIKAZE (LIMITED EDITION)&nbsp;</strong></p><p>Material :</p><p>&nbsp;</p><ul><li>Cotton Fleece</li><li>Synthetic Leather -Twilting Furing</li><li>Full Emboidery Design</li><li>Black Twilting Furing</li></ul>', ' JACKET  VARSITY - KAMIKAZE (LIMITED EDITION) ', 1050000, 250000, NULL, NULL, NULL, 1, 5, 'JACKETS4.jpg', 750, 'S - M - L - XL - XXL', 'publish', '2023-07-05 08:03:31', '2023-07-05 06:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'Bank bang TUT Akar kulang Kaling', '123456789101', 'Bang TUT', '', '2023-07-01 12:05:00'),
(3, 'BANK KPK', '1111222233334444', 'SetNov', '', '2023-07-01 14:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(19, 0, 10, '04072023ZR2BW5V3', 32, 100000, 1, 100000, '2023-07-04 00:00:00', '2023-07-04 19:52:54'),
(20, 0, 10, '05072023DMCJ6XF8', 32, 100000, 1, 100000, '2023-07-05 00:00:00', '2023-07-05 04:48:50'),
(21, 0, 10, '05072023P1WSGUDZ', 32, 100000, 1, 100000, '2023-07-05 00:00:00', '2023-07-05 04:56:02'),
(22, 0, 10, '05072023PCWXTJZI', 32, 100000, 1, 100000, '2023-07-05 00:00:00', '2023-07-05 05:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(13, 'muhamad arif wibowo', 'm.arifwibowo@gmail.com', 'muhamadarifwb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '2023-07-04 19:21:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
