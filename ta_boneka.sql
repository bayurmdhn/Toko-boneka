-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 07:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_boneka`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` text NOT NULL,
  `foto_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `email_admin`, `password_admin`, `foto_admin`) VALUES
(1, 'bayu', 'admin', 'admin@gmail.com', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Bear Mantel (SNI)'),
(5, 'BTS (SNI)'),
(6, 'Bear Jojon'),
(7, 'Doraemon (SNI)'),
(8, 'Hello Kitty '),
(9, 'Panda (SNI)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` text NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL,
  `foto_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telp_pelanggan`, `foto_pelanggan`) VALUES
(1, 'tono', 'tono@gmail.com', 'tonohartono', '087334223445', 'foto.jpg'),
(2, 'bayu', 'bayu@gmail.com', 'bayu', '087334223445', 'bayu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kode_pembayaran` varchar(255) NOT NULL,
  `tipe_pembayaran` varchar(50) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `batas_pembayaran` datetime NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_ongkir` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` enum('Pending','Dikemas','Dikirim','Selesai','Dibatalkan') NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `telp_penerima` varchar(20) NOT NULL,
  `catatan_pembelian` text NOT NULL,
  `kecamatan_penerima` varchar(100) NOT NULL,
  `tipe_kota_penerima` varchar(20) NOT NULL,
  `kota_penerima` varchar(100) NOT NULL,
  `provinsi_penerima` varchar(100) NOT NULL,
  `kode_pos_penerima` varchar(10) NOT NULL,
  `ekspedisi_pengiriman` varchar(50) NOT NULL,
  `paket_pengiriman` varchar(50) NOT NULL,
  `estimasi_pengiriman` varchar(10) NOT NULL,
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `batas_pembayaran`, `total_belanja`, `total_ongkir`, `total_pembelian`, `status_pembelian`, `nama_penerima`, `alamat_penerima`, `telp_penerima`, `catatan_pembelian`, `kecamatan_penerima`, `tipe_kota_penerima`, `kota_penerima`, `provinsi_penerima`, `kode_pos_penerima`, `ekspedisi_pengiriman`, `paket_pengiriman`, `estimasi_pengiriman`, `resi_pengiriman`) VALUES
(1, 1, '2021-01-01 21:34:47', '2021-01-02 21:33:56', 80000, 20000, 100000, 'Pending', 'Bayu', 'ewrtyhujk,hmnbaegrn', '089966532345', 'sdgfhgjkyrtereadfcgv', 'Muntilan', 'kecamatan', 'Magelang', 'Jawa Tengah', '55362', 'POS Indonesia', 'Reguler', '3-5 hari', '3467654323456789'),
(2, 1, '2021-01-22 11:10:21', '2021-01-23 11:10:21', 55000, 46000, 101000, 'Pending', 'Sutris', 'jl. mangga 2', '08977665667', '', 'luwu barat', 'Kabupaten', 'Bangka', 'Bangka Belitung', '33212', 'Jalur Nugraha Ekakurir (JNE)', 'OKE', '7-8', ''),
(3, 1, '2021-01-22 11:15:30', '2021-01-23 11:15:30', 55000, 54000, 109000, 'Pending', 'Sutris', 'dsfgh', '08977665667', 'dfgh', 'edfg', 'Kabupaten', 'Pulang Pisau', 'Kalimantan Tengah', '74811', 'Citra Van Titipan Kilat (TIKI)', 'REG', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `jumlah_pembelian`) VALUES
(1, 1, 8, 'rangga merah api', 60000, 200, 1),
(2, 1, 7, 'buku tulis', 10000, 100, 2),
(3, 2, 7, 'Boneka BTS ', 55000, 500, 1),
(4, 3, 7, 'Boneka BTS ', 55000, 500, 1),
(5, 1, 5, 'edfgh', 80000, 2000, 2);

--
-- Triggers `tb_pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tb_pembelian_detail` FOR EACH ROW UPDATE tb_produk SET stok_produk = stok_produk - new.jumlah_pembelian WHERE tb_produk.id_produk = new.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_pengaturan` varchar(100) NOT NULL,
  `isi_pengaturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `berat_produk`, `stok_produk`, `foto_produk`) VALUES
(5, 4, 'Boneka Beruang Mantel', 120000, 'Boneka Beruang Mantel bulu SNI. \r\nBahan : Isi dakron, bulu rasfur\r\nUkuran : 70 cm', 1000, 8, 'IMG-20190925-WA0003.jpg'),
(7, 5, 'Boneka BTS ', 55000, 'Boneka BTS dengan berbagai bentuk. sudah SNI jadi aman untuk para penggemar BTS, Ukuran 40 cm', 500, 10, '20190713_063150.png'),
(8, 7, 'Boneka Doraemon ', 155000, 'Boneka Doraemon SNI. bahan aman, lembut, dengan isi dafron. Ukuran 80cm', 2500, 10, '20190713_134822.png'),
(9, 6, 'Boneka Beruang Jojon', 180000, 'Boneka Beruang dengan model pakean jojon. lucu, besar, dan lembut. aman untuk kado ulang tahun orang tersayang. Ukuran 1meter', 3500, 10, '20190713_151700.png'),
(10, 8, 'Boneka Hello Kitty ', 160000, 'Boneka hello kitty yang keren, lucu, besar dan lembut dengan ukuran 1meter, bahan isi dafron, kain rasfur.', 3500, 10, '20190713_141449.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `testimoni` text NOT NULL,
  `tanggal_testimoni` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `id_pembelian`, `testimoni`, `tanggal_testimoni`) VALUES
(1, 1, 'RECOMMENDED!!!!. bonekanya bagus. kualitas bonekanya memuaskan. respon cepat good lah pokoknya', '2021-01-19 02:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `tanggal_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulasan`, `id_pembelian`, `id_produk`, `ulasan`, `tanggal_ulasan`) VALUES
(1, 1, 8, 'Produk Bagus Lembut dan berkualitas ', '2021-01-24 05:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `tb_pembelian` (`id_pembelian`);

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`);

--
-- Constraints for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`),
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_2` FOREIGN KEY (`id_pembelian`) REFERENCES `tb_pembelian` (`id_pembelian`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `tb_pembelian` (`id_pembelian`);

--
-- Constraints for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `tb_ulasan_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `tb_pembelian` (`id_pembelian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
