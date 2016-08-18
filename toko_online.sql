-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2016 at 12:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `tbl_biaya_kirim` (
`id_biaya` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`id_biaya`, `nama_kota`, `biaya`) VALUES
(1, 'Yogyakarta', 5000),
(2, 'Magelang', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE IF NOT EXISTS `tbl_chat` (
`id_chat` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pesan` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id_chat`, `user`, `waktu`, `pesan`, `id_user`) VALUES
(1, 'Kevin', '2016-02-23 03:29:20', 'test komentar', 27),
(2, 'Administrator', '2016-02-23 03:39:46', 'Jawab pesan', 1),
(3, 'Kevin', '2016-02-23 04:05:10', 'barangnya bagus min', 27),
(4, 'Administrator', '2016-02-23 04:15:31', 'hallo all member', 1),
(5, 'Kevin', '2016-02-24 15:54:48', 'gan warna merah ada tdk gan', 27),
(6, 'Administrator', '2016-02-24 16:06:15', 'produk yg mana bro', 1),
(7, 'Kevin', '2016-02-24 16:09:45', 'yang costum batik', 27),
(8, 'Administrator', '2016-02-24 16:10:09', 'ooh masih belum ada gan', 1),
(9, 'Kevin', '2016-02-24 16:14:02', 'yang costum batik', 27),
(10, 'Kevin', '2016-02-24 16:15:51', 'tanya gan', 27),
(11, 'Administrator', '2016-02-24 16:16:15', 'iyo gan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detil_order`
--

CREATE TABLE IF NOT EXISTS `tbl_detil_order` (
`id_detil_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jml_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detil_order`
--

INSERT INTO `tbl_detil_order` (`id_detil_order`, `id_produk`, `jml_order`, `id_order`) VALUES
(1, 14, 1, 2),
(2, 8, 1, 2),
(3, 10, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
`id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Aksesoris'),
(2, 'Gitar'),
(3, 'Replika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE IF NOT EXISTS `tbl_komentar` (
`id_komentar` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_komen` date NOT NULL,
  `isi_komentar` text NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `nama_lengkap`, `email`, `tgl_komen`, `isi_komentar`, `id_produk`) VALUES
(1, 'Markus', 'master.been@gmail.com', '2016-03-01', 'numpang tanya gan', 11),
(2, 'Markus', 'master.been@gmail.com', '2016-03-01', 'klo ongkos kirim sampe jakarta berapa ya\r\n', 11),
(7, 'syarifuddin', 'syarifudin09@gmail.com', '2016-03-07', 'tanya gan yg warna merah ada tidak ya', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE IF NOT EXISTS `tbl_level` (
`id_level` int(3) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
`id_member` int(11) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_registrasi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `nama_member`, `no_telp`, `email`, `alamat`, `tgl_registrasi`) VALUES
(1, 'Administrator', '', '', '', '2015-12-01'),
(2, 'Decepticon', '089668341753', 'master.been@gmail.com', 'Sariharjo ngaglik sleman', '2015-10-01'),
(3, 'Nemo', '089668341754', '', 'Jl.Kaliurang Km 9', '2015-10-05'),
(4, 'Kevin', '089668431753', 'minion@gmail.com', 'Bekasi Barat', '2015-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
`id_menu` int(3) NOT NULL,
  `menu_nama` varchar(100) NOT NULL,
  `menu_uri` varchar(100) NOT NULL,
  `menu_allowed` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `menu_nama`, `menu_uri`, `menu_allowed`) VALUES
(1, 'Kategori', 'admin/kategori/index', '+1+'),
(2, 'Profil', 'admin/profil/index', '+1+'),
(3, 'Pengguna', 'admin/pengguna/index', '+1+'),
(4, 'Posting', 'admin/posting/index', '+1+2+'),
(5, 'Galeri', 'admin/galeri/index', '+1+2+'),
(6, 'Forum', 'admin/forum/index', '+1+2+3+');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`id_order` int(11) NOT NULL,
  `no_order` varchar(10) NOT NULL,
  `tgl_order` date NOT NULL,
  `status_order` int(1) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `no_order`, `tgl_order`, `status_order`, `id_member`, `id_biaya`) VALUES
(2, 'NO-0000001', '2016-02-17', 1, 4, 1),
(3, 'NO-0000001', '2016-02-23', 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
`id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `no_transfer` varchar(30) NOT NULL,
  `jml_bayar` double NOT NULL,
  `tagihan` double NOT NULL,
  `metode` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `status_bayar` varchar(6) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_bayar`, `tgl_bayar`, `no_transfer`, `jml_bayar`, `tagihan`, `metode`, `image`, `permalink`, `status_bayar`, `id_order`) VALUES
(2, '2016-02-24', '999654321', 285000, 285000, 1, 'public/media/pembayaran/Dede_20160131_113124.jpg', '999654321', 'Lunas', 2),
(3, '2016-02-24', '1234342156', 335000, 335000, 1, 'public/media/pembayaran/IMG_20151022_090156.jpg', '1234342156', 'Lunas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE IF NOT EXISTS `tbl_produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `produk_sku` varchar(30) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `manufaktur` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `jml` int(3) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `produk_sku`, `permalink`, `image`, `harga`, `manufaktur`, `keterangan`, `jml`, `id_kategori`) VALUES
(1, 'FB Gibson Model', 'M001', 'FB-Gibson-Model', 'public/media/posts/22069157_main_zoom.jpeg', 60000, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<div>Spec Material :</div>\r\n<div>Top : Spruce</div>\r\n<div>Back-side : Meranti</div>\r\n<div>Body Dept : 2 13/16"-2 13/16" (70-70 mm)</div>\r\n<div>Finger board with nut : 1 7/8" (48 mm)</div>\r\n<div>Finger board : Rosewood</div>\r\n<div>Bridge rosewood</div>\r\n<div><br /></div>\r\n<div>Tunning keys : Classic Stile</div>', 0, 2),
(2, 'PRS Custom', 'M002', 'PRS-Custom', 'public/media/posts/image_d5b1481a-c9d4-4f1d-87ae-ac4cfe249ac6_1024x1024.jpg', 800000, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<p>Material Spec :<br /> Body : Solid Mahogany<br /> Neck : Mapel<br /> Top Body : Spruce<br /> F Board : Rosewood<br /> Tunning keys : Grover Crome<br /> Nut : Bone<br /> Binding body : Hard Plastic<br /> Electril EQ : LC Prener EQ</p>', 0, 2),
(3, 'Ibanes custom', 'M003', 'Ibanes-custom', 'public/media/posts/IBANEZ-Gitar-Akustik-Elektrik-[AEG10II-VS]-Vintage-Sunburst-SKU00913769_0.jpg', 200000, 'Administrator', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<div>Spec Material :</div>\r\n<div>Top : Spruce</div>\r\n<div>Back-side : Meranti</div>\r\n<div>Body Dept : 2 13/16"-2 13/16" (70-70 mm)</div>\r\n<div>Finger board with nut : 1 7/8" (48 mm)</div>\r\n<div>Finger board : Rosewood</div>\r\n<div>Bridge rosewood</div>\r\n<div><br /></div>\r\n<div>Tunning keys : Classic Stile</div>', 0, 2),
(4, 'Schecter Hellrai', 'M004', 'Schecter-Hellrai', 'public/media/posts/Schecter_Hellrai_503ef245c4151.jpg', 250000, 'admin', '<div>Material Speck :</div>\r\n<div>Body Top : Spruce</div>\r\n<div>Back Body : Mahogany Wood</div>\r\n<div>Fret Board : Rosewood</div>\r\n<div>Neck : Mahogany Wood</div>\r\n<div>Head Overlay : Rose Wood</div>\r\n<div>Inlays : Abalon Flower model</div>\r\n<div>Roset : Rose Wood- Spruce</div>\r\n<div>Bridge : Rose Wood</div>\r\n<div>Tunning Keys : Gold</div>\r\n<div>Body Binding : Abalon</div>\r\n<div>Electronik : Fishman isys +</div>', 0, 2),
(5, 'Custom Batik', 'M005', 'Custom-Batik', 'public/media/posts/BTK_001_75.JPG', 325000, 'Administrator', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<p>Material Spec :</p>\r\n<p>Body Top : spruce</p>\r\n<p>Back - side : Meranti</p>\r\n<p>Neck : mahogany Wood</p>\r\n<p>Finger board : rosewood</p>\r\n<p>Bridge : rosewood</p>\r\n<p>Finishing : top Batik</p>', 0, 2),
(6, 'Driyer Bass', 'A001', 'Driyer-Bass', 'public/media/posts/dryer_bass_80rb.jpg', 80000, 'A1', 'Driyer Bass', 10, 1),
(7, 'Capo gitar', 'A002', 'Capo-gitar', 'public/media/posts/capo_gtr_25rb.jpg', 25000, 'A2', 'Capo gitar', 48, 1),
(8, 'Bridge Gitar', 'A003', 'Bridge-Gitar', 'public/media/posts/bridge_gtr_150rb.jpg', 150000, 'A2', 'Bridge gitar', 22, 1),
(10, 'Gibson', 'M009', 'Gibson', 'public/media/posts/IMG_5578.jpg', 325000, 'Gibson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<p>Gibson custom Black</p>\r\n<p>Material Spec :</p>\r\n<p>Body : Mahogany Eood</p>\r\n<p>Neck : Mapel Wood</p>\r\n<p>Finger Board : Rosewood</p>\r\n<p>Bridge : Ibanez Edge3</p>\r\n<p>Pick Up : Saymour Duncan SH4</p>\r\n<p>Control : 1 Vol,1 tone, 2 togle Swicth</p>', 0, 2),
(11, 'Dryer gitar', 'A004', 'Dryer-gitar', 'public/media/posts/dryer_gtr_75rb1.jpg', 75000, 'A2', '<p>Driyer Gitar</p>', 10, 1),
(12, 'APX', 'W003', 'APX', 'public/media/posts/yamaha-cpx700-all.jpg', 1700000, 'Yamaha', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n<p>Nama Model : APX <br />Material Spec :<br /> Body : Mahogany Eood<br /> Neck : Mapel Wood<br /> Finger Board : Rosewood<br /> Part :<br /> Bridge : Ibanez Edge3<br /> Pick Up : Saymour Duncan SH4<br /> Control : 1 Vol,1 tone, 2 togle Swicth</p>', 0, 2),
(13, 'Pickup gitar', 'A005', 'Pickup-gitar', 'public/media/posts/pickup_gtr_300rb1.JPG', 300000, 'Pick', '<p>Pickup</p>', 94, 1),
(14, 'Tunner gitar', 'A006', 'Tunner-gitar', 'public/media/posts/tuner_gtr_130rb1.jpg', 130000, 'Tun', '<p>Tunner</p>', 12, 1),
(15, 'Yamaha Nilon Klasik', 'C 330 47', 'Custom-Yamaha-Nilon-Klasik', 'public/media/posts/C_330_472.JPG', 2500000, 'Yamaha Guitar', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Nama Model : C 330 47<br />Material Spec :<br /> Body : Mahogany Eood<br /> Neck : Mapel Wood<br /> Finger Board : Rosewood<br /> Part :<br /> Bridge : Ibanez Edge3<br /> Pick Up : Saymour Duncan SH4<br /> Control : 1 Vol,1 tone, 2 togle Swicth</p>', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `online` enum('1','0') NOT NULL DEFAULT '1',
  `id_member` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `avatar`, `email`, `id_level`, `status`, `online`, `id_member`) VALUES
(1, 'admin', 'admin', 'Administrator', '', '', 1, 1, '1', 1),
(2, 'operator1', 'operator1', 'Operator 1', '', '', 2, 1, '1', 6),
(29, 'member2', 'member2', 'Nemo', '', 'speedway037@gmail.com', 3, 1, '1', 3),
(27, 'member1', 'member1', 'Kevin', '', 'chombet_honda@yahoo.com', 3, 1, '1', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
 ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
 ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tbl_detil_order`
--
ALTER TABLE `tbl_detil_order`
 ADD PRIMARY KEY (`id_detil_order`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
 ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_detil_order`
--
ALTER TABLE `tbl_detil_order`
MODIFY `id_detil_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
