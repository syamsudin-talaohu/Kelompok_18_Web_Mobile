-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 12:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `pass_admin` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `foto`, `user_admin`, `pass_admin`, `level`, `nama`) VALUES
(4, 'sjr.jpg', 'admin', 'admin', '1', 'Admin syam'),
(6, '0d5e159404933b4185268a4d13c574ee.jpg', 'operator', 'operator', '2', 'Nopal'),
(7, 'agung1.png', 'admin123', 'admin123', '1', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id_bukti`, `id_pesan`, `file`) VALUES
(6, 13, 'WhatsApp Image 2023-01-26 at 13.32.12.jpeg'),
(7, 13, 'WhatsApp Image 2023-01-26 at 13.32.12.jpeg'),
(8, 14, 'WhatsApp Image 2023-01-26 at 13.32.12.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daerah`
--

CREATE TABLE `tbl_daerah` (
  `id_provinsi` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `nama_daerah` varchar(35) NOT NULL,
  `biaya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daerah`
--

INSERT INTO `tbl_daerah` (`id_provinsi`, `id_daerah`, `nama_daerah`, `biaya`) VALUES
(1, 1, 'Blitar', 0),
(2, 2, 'Semarang', 0),
(3, 3, 'Jakarta', 0),
(5, 4, 'Kota Sorong', 0),
(1, 5, 'Surabaya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id_hotel` int(11) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `ket_hotel` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id_hotel`, `hotel`, `harga`, `ket_hotel`, `foto`) VALUES
(2, 'Syam', 150000, '<p>Berpengalaman dibidang Pemrogrman WEB, UI/UX DESIGNER Desain rapih dan banyak customer yang puas</p>\r\n<p>&nbsp;</p>\r\n<div><br />\r\n<div><br />\r\n<h3 align=\"center\"><a href=\"https://api.whatsapp.com/send?phone=6281240383361\"> Kontak</a></h3>\r\n</div>\r\n<br />\r\n<div>&nbsp;</div>\r\n</div>', 'sjr.jpg'),
(3, 'Fandi', 200000, '<p>Instruktur Pemrograan Mobile, berpengalaman di UI/UX DESIGNER , desain rapih dan cepat selalu membuat customer merasa puas.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div><br />\r\n<h3 align=\"center\"><a href=\"https://api.whatsapp.com/send?phone=6282198358723\"> Kontak</a></h3>\r\n</div>', 'WhatsApp Image 2023-01-26 at 13.32.12.jpeg'),
(4, 'Nopal', 100000, '<p>DESIGNER HANDAL , berpengalaman khususnya di UI desainer , banyak testimoni dan customer yang telah berlangganan kepadanya</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div><br />\r\n<h3 align=\"center\"><a href=\"https://api.whatsapp.com/send?phone=6281354113041\"> Kontak</a></h3>\r\n</div>', 'WhatsApp Image 2023-01-24 at 15.12.19.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `ket_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nama_paket`, `harga_paket`, `ket_paket`) VALUES
(7, 'BASIC', 200000, '<p><span style=\"color: #ffff00;\">(DESIGN UI/UX BASIC)</span></p>\r\n<p><span style=\"color: #ffff00;\">TINJAUAN DAN REKOMENDASI DESAIN + SARAN PENINGKATAN TAMPILAN + ASSETS GAMBAR</span></p>'),
(8, 'STANDARD ', 400000, '<p><span style=\"color: #ffff00;\">(DESIGN UI/UX STANDARD) </span></p>\r\n<p><span style=\"color: #ffff00;\">DATABASE + ASSETS GAMBAR + SARAN DAN REKOMENDASI DESAIN + 5X REVISI + WIREFRAME DAN PROTOTIPE UI/UX</span></p>'),
(9, 'PREMIUM', 650000, '<p><span style=\"color: #ffff00;\">(DESIGN UI/UX PREMIUM)</span></p>\r\n<p><span style=\"color: #ffff00;\">SARAN REKOMENDASI DESAIN + FULL AKSES FILE ASSET + WIREFRAME PROTOTIPE UI/UX + UNLIMITED REVISI</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_tour` date NOT NULL,
  `status` char(2) NOT NULL DEFAULT 'S1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_user`, `id_paket`, `id_hotel`, `id_daerah`, `tgl_pesan`, `tgl_tour`, `status`) VALUES
(13, 35, 9, 2, 4, '2023-01-26', '2023-01-27', 'S1'),
(14, 36, 8, 4, 3, '2023-01-28', '2023-01-28', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa tengah'),
(3, 'Jawa Barat'),
(4, 'Jakarta'),
(5, 'Papua Barat'),
(6, 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_rek` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(1) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `foto`, `nama_user`, `email_user`, `no_hp`, `no_rek`, `nama_rek`, `username`, `password`, `tgl_lahir`, `jekel`, `alamat`) VALUES
(32, '', 'kopi', 'bdgbf', '12324', '1213333', 'zefefe', 'kopi', '12345', '2022-12-26', 'L', 'jsfnsbf'),
(33, '', 'aray', 'saasf', '3132123', '123123', 'dsfsaf', 'aray', '54321', '2023-01-03', 'P', 'dadsfa'),
(35, 'WhatsApp Image 2023-01-24 at 15.12.19.jpeg', 'nopal', 'nopal@gmail.com', '12345678', 'REMDVAKSNJAGD', 'Andi Nopal', 'nopal', '12345nopal', '2003-06-17', 'L', 'gor'),
(36, 'WhatsApp Image 2023-01-24 at 15.12.19.jpeg', 'Naufal', 'nopal06@gmail.com', '081354113041', 'NCJKCHJSCHSICS', 'Andi Nopal', 'nopal', 'JAKARTA2002', '2003-06-17', 'L', 'GOR'),
(37, 'syamm.jpg', 'shalehsyam', 'mshaleh@gmail.com', '081343135876', '12333', 'bangshaleh', 'shaleh', '247003', '2003-07-24', 'L', 'tamora');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `konten` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id`, `nama`, `konten`, `gambar`) VALUES
(4, 'LOGIN UI/UX DESIGN', '<p>DESIGN UI/UX LOGIN IN DESIGNkita</p>', 'html_css_tips-23-12-2022-0001.webp'),
(8, 'HOME UI/UX DESIGN', '<p>Tampilan Home DESIGNER BY DESIGNKITA</p>', 'InShot_20230128_170210490.jpg'),
(9, 'TRANSACTION UI/UX DESIGN', '<p>Tampilan Website Transaksi DESIGNER BY DESIGNKITA</p>', 'InShot_20230128_165752348.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  ADD PRIMARY KEY (`id_daerah`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_paket_2` (`id_paket`),
  ADD KEY `id_paket_3` (`id_paket`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD CONSTRAINT `tbl_bukti_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `tbl_pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_daerah`
--
ALTER TABLE `tbl_daerah`
  ADD CONSTRAINT `tbl_daerah_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tbl_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD CONSTRAINT `tbl_pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesan_ibfk_3` FOREIGN KEY (`id_hotel`) REFERENCES `tbl_hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesan_ibfk_4` FOREIGN KEY (`id_daerah`) REFERENCES `tbl_daerah` (`id_daerah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
