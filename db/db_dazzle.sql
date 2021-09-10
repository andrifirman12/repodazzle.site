-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 03.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dazzle`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id` int(11) NOT NULL,
  `id_konten` varchar(12) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id`, `id_konten`, `gambar`, `waktu`) VALUES
(172, 'SPE0725', 'img/desain/idul fitri 1442H.png9358.png', '2021-05-19 12:29:41'),
(193, 'PRO0316', 'img/desain/cropped-1366-768-860642.png6122.png', '2021-05-21 18:39:45'),
(411, 'RTE2748', 'img/desain/cropped-1366-768-658198 [R4164].png', '2021-05-26 04:28:51'),
(412, 'RTE2748', 'img/desain/cropped-1366-768-850020 [R8265].jpg', '2021-05-26 04:28:51'),
(413, 'RTE2748', 'img/desain/cropped-1366-768-665353 [R8275].png', '2021-05-26 04:28:51'),
(475, 'PLA0908', 'img/desain/kc [R8506].png', '2021-05-30 08:22:03'),
(476, 'PLA0908', 'img/desain/kc [R7003].png', '2021-06-04 04:10:48'),
(485, 'BBC5826', 'img/desain/iWJBRzz [R2329].jpg', '2021-06-11 09:25:26'),
(486, 'BBC5826', 'img/desain/Pab9wBE [R4961].jpg', '2021-06-11 09:25:26'),
(487, 'CDX1105', 'img/desain/190c5b75b9de92baad2ec6b5626a904c--batman-wallpaper-hd-wallpaper [R3417].jpg', '2021-06-12 16:47:17'),
(488, 'CDX1105', 'img/desain/122589 [R9596].jpg', '2021-06-12 16:47:17'),
(489, 'CDX1105', 'img/desain/cool_storm_trooper [R5127].jpg', '2021-06-12 16:47:18'),
(490, 'CDX1105', 'img/desain/Assassins-Creed-Syndicate-video-game-hoodies [R2615].jpg', '2021-06-12 16:47:18'),
(492, 'TES1307', 'img/desain/190c5b75b9de92baad2ec6b5626a904c--batman-wallpaper-hd-wallpaper [R2612].jpg', '2021-06-14 08:57:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instagram`
--

CREATE TABLE `tb_instagram` (
  `id` int(11) NOT NULL,
  `ig_username` varchar(30) DEFAULT NULL,
  `ig_password` varchar(20) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_instagram`
--

INSERT INTO `tb_instagram` (`id`, `ig_username`, `ig_password`, `access_token`, `status`) VALUES
(9, 'IG 1', 'rahasia', 'IGQVJYVkFMa2VKaFFUM3YyTEE4TUxfQTh5SnljSHNnNjVOczB4WUUzTUVzNzNhUlZAFTDRNdU8tZAmdaZAVdxRXJEQmgxOUk5WmJlX0hCOGpMQVhHVmJpUXpKRlgwQ21SbWZAWQzFNWDZAXUG1YZAWh3UndVbgZDZD', 'Digunakan'),
(10, 'IG 2', 'rahasia2', 'sadsd', 'Tidak Digunakan'),
(11, 'asdd', 'asdads', 'vxv', 'Tidak Digunakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `id_konten` varchar(12) DEFAULT NULL,
  `id_user` varchar(12) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `id_konten`, `id_user`, `komentar`, `waktu`) VALUES
(187, 'PRO0316', 'AND4823', 'siji', '2021-05-10 02:16:09'),
(188, 'PRO0316', 'AND4823', 'loro', '2021-05-17 13:41:06'),
(189, 'PRO0316', 'AND4823', 'telu', '2021-05-17 13:41:13'),
(190, 'PRO0316', 'AND4823', 'papat', '2021-05-17 13:42:07'),
(191, 'PRO0316', 'AND4823', '', '2021-05-17 13:42:07'),
(192, 'PRO0316', 'AND4823', 'limo', '2021-05-17 13:42:31'),
(193, 'PRO0316', 'AND4823', 'pitu', '2021-05-17 13:43:24'),
(194, 'PRO0316', 'AND4823', 'songo', '2021-05-17 13:45:06'),
(195, 'PRO0316', 'AND4823', 'aa', '2021-05-17 13:46:28'),
(196, 'SPE0725', 'AND4823', 'siji', '2021-05-19 12:31:14'),
(197, 'SPE0725', 'AND4823', 'loro', '2021-05-19 12:31:14'),
(198, 'SPE0725', 'AND4823', '', '2021-05-19 12:31:14'),
(199, 'SPE0725', 'AND4823', 'telu', '2021-05-19 12:31:14'),
(200, 'SPE0725', 'ARW1230', 'papat', '2021-05-19 12:32:03'),
(201, 'SPE0725', 'ARW1230', 'limo', '2021-05-19 12:32:03'),
(202, 'SPE0725', 'ARW1230', 'enem', '2021-05-19 12:32:03'),
(203, 'SPE0725', 'ARW1230', 'rolo', '2021-05-19 12:32:03'),
(204, 'SPE0725', 'ARW1230', 'adasd', '2021-05-19 12:32:03'),
(205, 'SPE0725', 'ADH5950', 'barang sesuai di toko', '2021-05-19 12:35:40'),
(209, 'PLA0908', 'JAC0118', 'HELLO', '2021-05-23 11:06:39'),
(210, 'PLA0908', 'AND4823', 'hii', '2021-05-23 11:06:57'),
(211, 'PLA0908', 'JAC0118', 'HELLO 2', '2021-05-23 11:07:16'),
(212, 'PLA0908', 'JAC0118', 'qqq', '2021-05-23 11:07:16'),
(213, 'PLA0908', 'AND4823', 'www', '2021-05-23 11:19:31'),
(214, 'PLA0908', 'JAC0118', 'ad', '2021-05-23 11:21:11'),
(215, 'PLA0908', 'JAC0118', 'wowowo', '2021-05-23 11:44:51'),
(216, 'PLA0908', 'JAC0118', 'jacob hi', '2021-05-23 12:02:05'),
(217, 'PLA0908', 'AND4823', 'andri hi', '2021-05-23 12:01:08'),
(218, 'PLA0908', 'JAC0118', '123', '2021-05-23 12:02:05'),
(219, 'PLA0908', 'AND4823', '456', '2021-05-23 12:01:08'),
(220, 'PLA0908', 'JAC0118', 'awawawaw', '2021-05-23 12:02:05'),
(221, 'TES0508', 'AND4823', 'siji', '2021-05-23 12:05:10'),
(222, 'TES0508', 'JAC0118', 'loro', '2021-05-23 12:10:32'),
(223, 'TES0508', 'AND4823', 'telu', '2021-05-23 12:05:10'),
(224, 'TES0508', 'JAC0118', 'akw', '2021-05-23 13:25:14'),
(225, 'TES0508', 'JAC0118', 'dada', '2021-05-23 13:25:14'),
(226, 'TES0508', 'AND4823', 'papat', '2021-05-23 13:25:52'),
(227, 'TES0508', 'JAC0118', 'asdasd', '2021-05-23 13:25:14'),
(228, 'TES0508', 'JAC0118', 'awa', '2021-05-23 13:27:55'),
(229, 'TES0508', 'JAC0118', 'awaw', '2021-05-23 13:27:55'),
(230, 'PLA0908', 'AND4823', ';k;k', '2021-05-24 02:16:52'),
(235, 'PLA0908', 'AND4823', 'asdda', '2021-05-24 20:49:14'),
(236, 'PLA0908', 'AND4823', 'dsf', '2021-05-26 08:42:55'),
(237, 'PLA0908', 'AND4823', 'dfsfdk', '2021-05-26 08:42:55'),
(238, 'PLA0908', 'AND4823', 'dslffl', '2021-05-26 08:42:55'),
(239, 'PLA0908', 'AND4823', 'cek komentar', '2021-05-26 15:01:02'),
(244, 'PRO0316', 'AND4823', 'asdasd', '2021-05-28 08:10:25'),
(245, 'PLA0908', 'AND4823', 'kok dihapus', '2021-05-28 08:17:39'),
(248, 'PLA0908', 'AND4823', 'hiii', '2021-05-28 17:55:03'),
(249, 'RTE2748', 'AND4823', 'aww', '2021-05-30 13:44:05'),
(250, 'BBC5826', 'AND4823', 'ji', '2021-05-31 21:14:38'),
(251, 'CDX1105', 'AND4823', 'cvcv', '2021-05-31 21:15:31'),
(253, 'DZC1234', 'JAC0118', 'loro', '2021-06-01 11:49:34'),
(254, 'DZC1234', 'JAC0118', 'telu', '2021-06-01 11:49:34'),
(255, 'BBC5826', 'AND4823', 'papat', '2021-06-01 11:49:57'),
(256, 'BBC5826', 'AND4823', 'limo', '2021-06-02 16:17:29'),
(257, 'BBC5826', 'AND4823', 'jasjas', '2021-06-03 04:57:14'),
(266, 'CDX1105', 'AND4823', 'ihjihi', '2021-06-12 21:47:08'),
(267, 'TES1307', 'AND4823', 'YOO', '2021-06-14 09:35:18'),
(268, 'BBC5826', 'AND4823', 'U can be the BEST', '2021-06-14 11:04:54'),
(269, 'TES1307', 'AND4823', 'koadsw', '2021-06-14 13:57:16'),
(270, 'TES1307', 'AND4823', 'sdad', '2021-06-14 13:57:16'),
(271, 'TES1307', 'AND4823', 'kjxzc', '2021-06-14 13:57:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konten`
--

CREATE TABLE `tb_konten` (
  `id` varchar(12) NOT NULL,
  `judul` varchar(70) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `desainer` varchar(70) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `konten` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_konten`
--

INSERT INTO `tb_konten` (`id`, `judul`, `kategori`, `desainer`, `tgl_upload`, `status`, `konten`) VALUES
('BBC5826', 'bbccvccvx', 'Non Promo', 'Jacub Johannes The', '2021-06-03', '<h5><span class=\"right badge badge-primary\">Done</span></h5>', 'Tulis Konten Disini...'),
('BFG5806', 'bfgjfjhg', 'Non Promo', 'Arwan Ahimsa', '2021-06-15', '<h5><span class=\"right badge bg-purple\">Working</span></h5>', 'Tulis Konten Disini...'),
('CDX1105', 'cdxczxczcv', 'Promo', 'Arwan Ahimsa', '2021-06-01', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', '<table class=\"table table-bordered\"><tbody><tr><td>DSFSFD</td><td>SDFSDF</td></tr><tr><td>SDFSF</td><td>DSF</td></tr></tbody></table>Tulis Konten Disini...'),
('CXV1254', 'cxvxcvcxv', 'Promo', 'Jacub Johannes The', '2021-06-01', '<h5><span class=\"right badge badge-warning\">Revision</span></h5>', 'Tulis Konten Disini...'),
('DSF1244', 'dsffdsxcvxv', 'Non Promo', 'Jacub Johannes The', '2021-06-01', '<h5><span class=\"right badge badge-primary\">Done</span></h5>', 'Tulis Konten Disini...'),
('DZC1234', 'dzcdsfdsfdfs', 'Promo', 'Jacub Johannes The', '2021-06-01', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...dfdffd'),
('PLA0908', 'Playstation 5', 'Promo', 'Arwan Ahimsa', '2021-05-19', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'sdfsdf'),
('PRO0316', 'RAMADHAN', 'Promo', 'Jacub Johannes The', '2021-04-26', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...'),
('RTE2748', 'rtertetert', 'Promo', 'Jacub Johannes The', '2021-05-26', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...sadadssaerersdfsdfsdfghggh'),
('SDA4703', 'sdasadads', 'Non Promo', 'Jacub Johannes The', '2021-06-08', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...'),
('SPE0725', 'Spesial Natal', 'Promo', 'Jacub Johannes The', '2021-05-22', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', '<p>sdasdsdadasdadssadasdzxzxcczcxasdad</p>'),
('TES0213', 'Test Test', 'Non Promo', 'Junus Siswadi', '2021-05-24', '<h5><span class=\"right badge badge-primary\">Done</span></h5>', 'Tulis Konten Disini...cffghghh'),
('TES0508', 'Tes Chat', 'Promo', 'Arwan Ahimsa', '2021-04-25', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...'),
('TES1307', 'Test Test', 'Non Promo', 'Jacub Johannes The', '2021-06-14', '<h5><span class=\"right badge badge-success\">Uploaded</span></h5>', 'Tulis Konten Disini...llllldfdfdf'),
('TES5208', 'Test Test', 'Non Promo', 'Jacub Johannes The', '2021-05-29', '<h5><span class=\"right badge bg-purple\">Working</span></h5>', 'Tulis Konten Disini...'),
('VBB5755', 'vbbcvcb', 'Promo', 'Junus Siswadi', '2021-06-08', '<h5><span class=\"right badge badge-dark\">Pending</span></h5>', 'Tulis Konten Disini...'),
('ZCZ4052', 'zczxczxc', 'Non Promo', 'Arwan Ahimsa', '2021-05-29', '<h5><span class=\"right badge badge-primary\">Done</span></h5>', 'Tulis Konten Disini...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `jenis_aksi` varchar(50) DEFAULT NULL,
  `aksi` text DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notifikasi`, `id_user`, `jenis_aksi`, `aksi`, `waktu`) VALUES
(210, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`ZCZ4052`)\"><u>zczxczxc</u></span> Telah Ditambah', '2021-05-29 00:40:38'),
(211, 'AND4823', 'Mengubah User', 'User `ADH5950` Telah Diubah', '2021-05-29 00:44:41'),
(212, 'AND4823', 'Tambah User', '`Desainer` Baru Ditambahkan', '2021-05-29 00:46:27'),
(213, 'AND4823', 'Tambah User', '`Admin` Baru Ditambahkan', '2021-05-29 00:47:31'),
(214, 'AND4823', 'Tambah User', '`Admin` Baru Ditambahkan', '2021-05-29 00:49:03'),
(215, 'AND4823', 'Menghapus User', 'Seorang `Admin` Telah Dihapus ', '2021-05-29 00:50:56'),
(216, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DCD5050`)\"><u>dcdczczczcx</u></span> Telah Diubah ', '2021-05-29 00:51:37'),
(217, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES5208`)\"><u>Test Test</u></span> Telah Ditambah', '2021-05-29 00:51:58'),
(218, 'AND4823', 'Menghapus Konten', 'Konten `dcdczczczcx` Telah Dihapus ', '2021-05-29 00:52:31'),
(219, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diupload ', '2021-05-29 00:54:40'),
(220, 'AND4823', 'Menghapus Desain', ' `img/desain/kc [R4974].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Dihapus ', '2021-05-29 00:55:03'),
(221, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> ', '2021-05-29 00:55:03'),
(222, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diubah ', '2021-05-29 00:55:03'),
(223, 'AND4823', 'Menambah User', '`Desainer` Baru Ditambahkan', '2021-05-29 01:02:27'),
(224, 'AND4823', 'Mengubah User', 'User `AND0319` Telah Diubah', '2021-05-29 01:02:27'),
(225, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diupload ', '2021-05-29 20:24:37'),
(226, 'AND4823', 'Menghapus Desain', ' `img/desain/kc [R6859].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Dihapus ', '2021-05-29 20:24:37'),
(227, 'AND4823', 'Menghapus Desain', ' `img/desain/kc [R6859].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Dihapus ', '2021-05-29 20:24:37'),
(228, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diupload ', '2021-05-29 20:25:01'),
(229, 'AND4823', 'Menghapus Desain', ' `img/desain/kc [R5776].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Dihapus ', '2021-05-29 20:25:01'),
(230, 'JAC0118', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diupload ', '2021-05-30 02:10:39'),
(231, 'JAC0118', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diupload ', '2021-05-30 20:21:56'),
(232, 'JAC0118', 'Menghapus Desain', ' `img/desain/kc [R7919].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Dihapus ', '2021-05-30 20:21:56'),
(233, 'JAC0118', 'Menghapus Desain', ' `img/desain/kc [R5668].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Dihapus ', '2021-05-30 20:21:56'),
(234, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diubah ', '2021-05-30 20:39:52'),
(235, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diubah ', '2021-05-30 20:40:26'),
(236, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`RTE2748`)\"><u>rtertetert</u></span> ', '2021-05-30 20:44:05'),
(237, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Ditambah', '2021-06-01 02:10:53'),
(238, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DZC1234`)\"><u>dzcdsfdsfdfs</u></span> Telah Ditambah', '2021-06-01 02:12:21'),
(239, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DSF1244`)\"><u>dsffdsxcvxv</u></span> Telah Ditambah', '2021-06-01 02:12:21'),
(240, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CXV1254`)\"><u>cxvxcvcxv</u></span> Telah Ditambah', '2021-06-01 02:12:21'),
(241, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Ditambah', '2021-06-01 02:12:21'),
(242, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DZC1234`)\"><u>dzcdsfdsfdfs</u></span> Telah Diubah ', '2021-06-01 02:13:16'),
(243, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Ditambah', '2021-06-01 02:57:59'),
(244, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Ditambah', '2021-06-01 02:57:59'),
(245, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(246, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES0213`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(247, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(248, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DSF1244`)\"><u>dsffdsxcvxv</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(249, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(250, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-01 03:40:57'),
(251, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> ', '2021-06-01 04:14:38'),
(252, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> ', '2021-06-01 04:15:31'),
(253, 'JAC0118', 'Komentar', '`Jacub Johannes The` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-01 18:47:29'),
(254, 'JAC0118', 'Komentar', '`Jacub Johannes The` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`DZC1234`)\"><u>dzcdsfdsfdfs</u></span> ', '2021-06-01 18:49:34'),
(255, 'JAC0118', 'Komentar', '`Jacub Johannes The` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`DZC1234`)\"><u>dzcdsfdsfdfs</u></span> ', '2021-06-01 18:49:34'),
(256, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> ', '2021-06-01 18:49:57'),
(257, 'AND4823', 'Menambah User', '`Desainer` Baru Ditambahkan', '2021-06-02 23:10:59'),
(258, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> ', '2021-06-02 23:17:29'),
(259, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 00:39:42'),
(260, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 00:40:26'),
(261, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diubah ', '2021-06-03 00:40:26'),
(262, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 00:40:26'),
(263, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 00:40:26'),
(264, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(265, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(266, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DSF1244`)\"><u>dsffdsxcvxv</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(267, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(268, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`RTE2748`)\"><u>rtertetert</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(269, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diubah ', '2021-06-03 01:25:48'),
(270, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 01:27:37'),
(271, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 04:05:11'),
(272, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 04:05:11'),
(273, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diubah ', '2021-06-03 04:08:33'),
(274, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diubah ', '2021-06-03 04:08:57'),
(275, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`ZCZ4052`)\"><u>zczxczxc</u></span> Telah Diubah ', '2021-06-03 04:10:00'),
(276, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diubah ', '2021-06-03 04:10:00'),
(277, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES0213`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-03 04:10:39'),
(278, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DSF1244`)\"><u>dsffdsxcvxv</u></span> Telah Diubah ', '2021-06-03 04:10:39'),
(279, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-03 04:11:06'),
(280, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> ', '2021-06-03 11:57:14'),
(281, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-03 19:12:58'),
(282, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diupload ', '2021-06-04 16:10:34'),
(283, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-04 16:16:11'),
(284, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-04 16:16:11'),
(285, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-05 23:47:34'),
(286, 'JAC0118', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-05 23:54:15'),
(287, 'JAC0118', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-05 23:55:03'),
(288, 'JAC0118', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-05 23:55:03'),
(289, 'DAN0217', 'Komentar', '`Jose R. Hanna` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-06 00:16:33'),
(290, 'JAC0118', 'Komentar', '`Jacub Johannes The` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-06 01:02:09'),
(291, 'JAC0118', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-06 01:02:09'),
(292, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-06 01:04:13'),
(293, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-06 01:04:25'),
(294, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-09 01:16:12'),
(295, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-09 01:18:28'),
(296, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 01:18:28'),
(297, 'AND4823', 'Menghapus Desain', ' `img/desain/MESIN PENEPUNG KAYU 1 [R8365].png` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Dihapus ', '2021-06-09 01:18:28'),
(298, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO0316`)\"><u>RAMADHAN</u></span> Telah Diubah ', '2021-06-09 04:57:34'),
(299, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`RTE2748`)\"><u>rtertetert</u></span> Telah Diubah ', '2021-06-09 04:59:56'),
(300, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES0508`)\"><u>Tes Chat</u></span> Telah Diubah ', '2021-06-09 04:59:56'),
(301, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diubah ', '2021-06-09 04:59:56'),
(302, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-09 05:00:18'),
(303, 'AND4823', 'Menambah User', '`Admin Sosial Media` Baru Ditambahkan', '2021-06-09 14:25:51'),
(304, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PRO3000`)\"><u>promo ifinix</u></span> Telah Ditambah', '2021-06-09 14:28:41'),
(305, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(306, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(307, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(308, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(309, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(310, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diupload ', '2021-06-09 14:38:43'),
(311, 'AND4823', 'Menghapus Desain', ' `img/desain/moon-1366x768-clouds-sky-full-hd-1519 [R9431].jpg` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Dihapus ', '2021-06-09 14:38:43'),
(312, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-09 14:38:43'),
(313, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-09 14:41:16'),
(314, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diubah ', '2021-06-09 14:42:11'),
(315, 'AND4823', 'Menghapus Desain', ' `img/desain/mobile-suit-gundam-wallpapers-25987-2390058 [R7492].jpg` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Dihapus ', '2021-06-10 13:36:49'),
(316, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> ', '2021-06-10 13:36:49'),
(317, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Diubah ', '2021-06-10 13:36:49'),
(318, 'AND4823', 'Menghapus Desain', ' `img/desain/Mobile-Suit-Gundam-Japanese-anime_1366x768 [R4349].jpg` Pada Konten <span class=\"text-primary\" onclick=\"detailKonten(`1W25812`)\"><u>1w2sadasd</u></span> Telah Dihapus ', '2021-06-10 13:36:49'),
(319, 'AND4823', 'Menghapus Konten', 'Konten `1w2sadasd` Telah Dihapus ', '2021-06-11 18:46:11'),
(320, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diupload ', '2021-06-11 21:25:14'),
(321, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diupload ', '2021-06-11 21:25:14'),
(322, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`SDA4703`)\"><u>sdasadads</u></span> Telah Ditambah', '2021-06-13 04:46:05'),
(323, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diupload ', '2021-06-13 04:47:08'),
(324, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diupload ', '2021-06-13 04:47:08'),
(325, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diupload ', '2021-06-13 04:47:08'),
(326, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diupload ', '2021-06-13 04:47:08'),
(327, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> ', '2021-06-13 04:47:08'),
(328, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`DZC1234`)\"><u>dzcdsfdsfdfs</u></span> Telah Diubah ', '2021-06-14 15:12:22'),
(329, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`PLA0908`)\"><u>Playstation 5</u></span> Telah Diubah ', '2021-06-14 15:12:22'),
(330, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`SPE0725`)\"><u>Spesial Natal</u></span> Telah Diubah ', '2021-06-14 15:12:22'),
(331, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> ', '2021-06-14 16:35:18'),
(332, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`PRO3000`)\"><u>promo ifinix</u></span> Telah Diupload ', '2021-06-14 16:35:46'),
(333, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES5208`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-14 17:38:01'),
(334, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> ', '2021-06-14 18:04:54'),
(335, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`CDX1105`)\"><u>cdxczxczcv</u></span> Telah Diubah ', '2021-06-14 18:07:11'),
(336, 'AND4823', 'Upload Desain', 'Desain <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diupload ', '2021-06-14 20:57:16'),
(337, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> ', '2021-06-14 20:57:16'),
(338, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> ', '2021-06-14 20:57:16'),
(339, 'AND4823', 'Komentar', '`Andri Firman Nurvianto` Mengomentari <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> ', '2021-06-14 20:57:16'),
(340, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-14 20:57:16'),
(341, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`TES1307`)\"><u>Test Test</u></span> Telah Diubah ', '2021-06-14 20:57:16'),
(342, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`VBB5755`)\"><u>vbbcvcb</u></span> Telah Ditambah', '2021-06-14 20:57:45'),
(343, 'AND4823', 'Menambah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BFG5806`)\"><u>bfgjfjhg</u></span> Telah Ditambah', '2021-06-14 20:57:45'),
(344, 'AND4823', 'Menghapus Konten', 'Konten `promo ifinix` Telah Dihapus ', '2021-06-14 20:57:45'),
(345, 'AND4823', 'Mengubah Konten', 'Konten <span class=\"text-primary\" onclick=\"detailKonten(`BBC5826`)\"><u>bbccvccvx</u></span> Telah Diubah ', '2021-06-14 20:57:45'),
(346, 'AND4823', 'Menambah User', '`CopyWriter` Baru Ditambahkan', '2021-06-14 20:58:33'),
(347, 'AND4823', 'Mengubah User', 'User `SPO5846` Telah Diubah', '2021-06-14 20:58:33'),
(348, 'AND4823', 'Mengubah User', 'User `SPO5846` Telah Diubah', '2021-06-14 20:58:33'),
(349, 'AND4823', 'Menghapus User', 'Seorang `Desainer` Telah Dihapus ', '2021-06-14 20:58:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(10) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `avatar`, `nama`, `email`, `password`, `role`, `last_login`) VALUES
('ADH5950', 'img/avatar/09155950.jpg', 'Adhi Utomo Jusman', 'andrifirman1210@gmail.com', 'rahasia', 'CopyWriter', '2021-06-06 00:23:08'),
('AND0319', 'img/avatar/28200319.png', 'Andri Firmazxczczc', 'kamikazeboy41@gmail.com', 'admin123', 'Pegawai Toko', '0000-00-00 00:00:00'),
('AND4823', 'img/avatar/14034823.png', 'Andri Firman Nurvianto', 'andrifirman1210@gmail.com', 'admin123', 'Admin', '2021-06-15 18:45:08'),
('ARW1230', 'img/avatar/09161230.jpg', 'Arwan Ahimsa', 'admin@gmail.com', 'rahasia', 'Desainer', NULL),
('DAN0217', 'img/avatar/09160417.jpg', 'Jose R. Hanna', 'admin@gmail.com', 'rahasia123', 'Admin Sosial Media', '2021-06-06 00:17:14'),
('JAC0118', 'img/avatar/09160118.png', 'Jacub Johannes The', 'sakatagintoki318@gmail.com', 'rahasia', 'Desainer', '2021-06-13 21:55:20'),
('JOS0449', 'img/avatar/09160742.jpg', 'Junus Siswadi', 'admin@gmail.com', 'rahasia', 'Desainer', NULL),
('SPO1716', 'img/avatar/02181716.png', 'Spongebob', 'andrifirman1210@gmail.com', 'admin123', 'Desainer', '2021-06-15 18:45:08'),
('SPO2719', 'img/avatar/09092719.png', 'Spongebob', 'sakatagintoki318@gmail.com', 'admin123', 'Admin Sosial Media', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konten` (`id_konten`);

--
-- Indeks untuk tabel `tb_instagram`
--
ALTER TABLE `tb_instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konten` (`id_konten`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_konten`
--
ALTER TABLE `tb_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT untuk tabel `tb_instagram`
--
ALTER TABLE `tb_instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `tb_gambar_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `tb_konten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `tb_konten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD CONSTRAINT `tb_notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
