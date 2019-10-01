-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2019 pada 06.29
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penilaiankinerjaguru`
--
CREATE DATABASE IF NOT EXISTS `penilaiankinerjaguru` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `penilaiankinerjaguru`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_jawab`
--

DROP TABLE IF EXISTS `bank_jawab`;
CREATE TABLE IF NOT EXISTS `bank_jawab` (
`id` int(11) NOT NULL,
  `jawab` varchar(100) NOT NULL,
  `skor` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `bank_jawab`
--

INSERT INTO `bank_jawab` (`id`, `jawab`, `skor`) VALUES
(1, 'Kurang', '1'),
(2, 'Sedang', '2'),
(3, 'Baik', '3'),
(4, 'Istimewa', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_kategori`
--

DROP TABLE IF EXISTS `bank_kategori`;
CREATE TABLE IF NOT EXISTS `bank_kategori` (
`id` int(10) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `bank_kategori`
--

INSERT INTO `bank_kategori` (`id`, `kategori`) VALUES
(1, 'Pengembangan Kurikulum'),
(2, 'Kegiatan Pembelajaran yang Mendidik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_soal`
--

DROP TABLE IF EXISTS `bank_soal`;
CREATE TABLE IF NOT EXISTS `bank_soal` (
`id` int(10) NOT NULL,
  `kategori_id` varchar(100) NOT NULL,
  `soal` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `kategori_id`, `soal`) VALUES
(1, '2', 'Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya'),
(2, '1', 'Guru dapat menyusun silabus yang sesuai dengan kurikulum'),
(4, '1', 'Guru merancang rencana pembelajaran yang sesuai dengan silabus untuk membahas materi ajar tertentu agar peserta didik dapat mencapai kompetensi dasar yang ditetapkan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'Penilian Kinerja Guru'),
(2, 'site_description', 'Penilian Kinerja Guru'),
(3, 'site_keyword', 'PenilianKinerjaGuru, indonesia, surabaya'),
(4, 'forgot_password', '1'),
(5, 'signup_member', '1'),
(6, 'protocol', 'smtp'),
(7, 'smtp_host', 'ssl://smtp.googlemail.com'),
(8, 'smtp_user', 'rekyefin@gmail.com'),
(9, 'smtp_pass', ''),
(10, 'smtp_port', '465'),
(11, 'mailtype', 'html'),
(12, 'charset', 'utf-8'),
(13, 'newline', '\\r\\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `hp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Administrator', 'superadmin', 'admin@admin.com', '', 'default.jpg', '$2y$10$xP5rx.6d0AasybhMP23yVeMTGKehXum1f88FqO3oL8tP0m5H5369m', 1, 1, 1555463755),
(4, 'Guru 1', 'guru1', 'guru1@guru1.com', '', 'default.jpg', '$2y$10$VXL8dtAxV7w/HFjh6h61aOMk.Mdn9IXdHWmZFipHyosqeIRicjhym', 3, 1, 1569903545),
(5, 'Guru 2', 'guru2', 'guru2@guru2.com', '', 'default.jpg', '$2y$10$s/Inr87j0Q4UCumYxVvrpOeL1oqYaDOTVWs2RizT1hdgZH87Ta2sC', 3, 1, 1569903586);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_kategori`
--

DROP TABLE IF EXISTS `user_access_kategori`;
CREATE TABLE IF NOT EXISTS `user_access_kategori` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `user_access_kategori`
--

INSERT INTO `user_access_kategori` (`id`, `role_id`, `kategori_id`) VALUES
(15, 1, 1),
(16, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 3, 2),
(6, 3, 3),
(7, 2, 14),
(8, 1, 15),
(9, 1, 4),
(10, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_submenu`
--

DROP TABLE IF EXISTS `user_access_submenu`;
CREATE TABLE IF NOT EXISTS `user_access_submenu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data untuk tabel `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`id`, `role_id`, `submenu_id`) VALUES
(4, 1, 2),
(5, 1, 3),
(6, 1, 8),
(7, 1, 4),
(12, 1, 1),
(13, 1, 10),
(14, 1, 9),
(15, 1, 7),
(16, 1, 14),
(17, 1, 15),
(18, 1, 16),
(19, 1, 17),
(20, 1, 18),
(21, 1, 19),
(22, 1, 20),
(23, 1, 21),
(24, 1, 22),
(25, 1, 23),
(26, 1, 24),
(27, 1, 25),
(28, 1, 26),
(29, 1, 27),
(31, 1, 28),
(32, 1, 29),
(33, 1, 30),
(34, 1, 31),
(36, 3, 32),
(37, 3, 33),
(38, 4, 32),
(39, 4, 33),
(40, 1, 34),
(41, 1, 35),
(42, 1, 36),
(43, 1, 37),
(44, 1, 38),
(45, 1, 39),
(46, 1, 40),
(47, 1, 41),
(48, 1, 42),
(49, 1, 43),
(50, 1, 44),
(51, 1, 45),
(52, 1, 46),
(53, 1, 47),
(54, 1, 48),
(55, 1, 49),
(56, 1, 50),
(57, 1, 51),
(58, 1, 52),
(59, 1, 53),
(60, 1, 54),
(61, 1, 55),
(62, 1, 56),
(63, 1, 57),
(64, 1, 58),
(65, 1, 59),
(66, 1, 60),
(67, 1, 61),
(68, 5, 62),
(69, 5, 63),
(70, 5, 64),
(71, 5, 65),
(72, 5, 66),
(73, 5, 67),
(74, 5, 68),
(75, 5, 69),
(76, 1, 70),
(77, 1, 71),
(78, 1, 5),
(79, 2, 72),
(80, 1, 73),
(81, 1, 11),
(82, 1, 12),
(83, 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
`id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `icon`, `menu_id`, `menu`) VALUES
(1, 'fa fa-fw fa-wrench', 'admin', 'Admin'),
(2, 'fa fa-fw fa-users', 'user', 'User'),
(3, 'fa fa-fw fa-navicon', 'menu', 'Menu'),
(4, 'fa fa-fw fa-question', 'banksoal', 'BankSoal'),
(5, 'fa fa-fw fa-lock', 'lock', 'Lock');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kepala Sekolah'),
(3, 'Guru'),
(4, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `sort`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-fw fa-dashboard', 1, 0),
(2, 2, 'My Profile', 'user', 'fa fa-fw fa-user', 1, 1),
(3, 2, 'Edit Profile', 'user/edit', 'fa fa-fw fa-user', 1, 1),
(4, 3, 'Menu Management', 'menu', 'fa fa-fw fa-folder', 1, 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fa fa-fw fa-folder-open', 2, 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-secret', 1, 1),
(8, 2, 'Change Password', 'user/changepassword', 'fa fa-fw fa-key', 1, 1),
(9, 1, 'Users', 'admin/userlogin', 'fa fa-fw fa-users', 1, 1),
(10, 4, 'Kategori', 'banksoal/kategori', '', 1, 1),
(11, 4, 'Soal', 'banksoal/soal', '', 2, 1),
(12, 4, 'Jawab', 'banksoal/jawab', '', 3, 1),
(13, 5, 'Role', 'lock/role', '', 1, 1),
(14, 5, 'User', 'lock/user', '', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
`id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_setting`
--

DROP TABLE IF EXISTS `web_setting`;
CREATE TABLE IF NOT EXISTS `web_setting` (
`id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `is_active`) VALUES
(1, 'signup_member', 1),
(2, 'forgot_password', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_jawab`
--
ALTER TABLE `bank_jawab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_kategori`
--
ALTER TABLE `bank_kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_kategori`
--
ALTER TABLE `user_access_kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_jawab`
--
ALTER TABLE `bank_jawab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bank_kategori`
--
ALTER TABLE `bank_kategori`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_access_kategori`
--
ALTER TABLE `user_access_kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
