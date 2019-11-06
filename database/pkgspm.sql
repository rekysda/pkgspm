-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 08:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkgspm`
--
CREATE DATABASE IF NOT EXISTS `pkgspm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pkgspm`;

-- --------------------------------------------------------

--
-- Table structure for table `bank_jawab`
--

DROP TABLE IF EXISTS `bank_jawab`;
CREATE TABLE IF NOT EXISTS `bank_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawab` varchar(100) NOT NULL,
  `skor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_jawab`
--

INSERT INTO `bank_jawab` (`id`, `jawab`, `skor`) VALUES
(1, 'Kurang', '1'),
(2, 'Sedang', '2'),
(3, 'Baik', '3'),
(4, 'Istimewa', '4');

-- --------------------------------------------------------

--
-- Table structure for table `bank_kategori`
--

DROP TABLE IF EXISTS `bank_kategori`;
CREATE TABLE IF NOT EXISTS `bank_kategori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bank_kategori`
--

INSERT INTO `bank_kategori` (`id`, `kategori`) VALUES
(1, 'Kesetiaan'),
(2, 'Prestasi Kerja'),
(3, 'Tanggung Jawab'),
(4, 'Ketaatan'),
(5, 'Kejujuran'),
(6, 'Kerjasama'),
(7, 'Kedisiplinan'),
(8, 'Kepemimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `bank_penilaian`
--

DROP TABLE IF EXISTS `bank_penilaian`;
CREATE TABLE IF NOT EXISTS `bank_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` varchar(100) NOT NULL,
  `soal_id` varchar(100) NOT NULL,
  `user_asal` varchar(100) NOT NULL,
  `user_tujuan` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

DROP TABLE IF EXISTS `bank_soal`;
CREATE TABLE IF NOT EXISTS `bank_soal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_id` varchar(100) NOT NULL,
  `soal` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id`, `kategori_id`, `soal`) VALUES
(5, '1', 'Mentaati peraturan sekolah'),
(6, '1', 'Menjalankan kode etik sekolah'),
(7, '1', 'Menerima dan menjalankan tugas dengan senang hati'),
(8, '1', 'Hadir dan pulang tepat waktu'),
(9, '2', 'Sebagian besar siswa mencapai nilai ketuntasan minimal'),
(10, '2', 'Membawa siswa berprestasi dalam kejuaraan'),
(11, '2', 'Kreatif dalam proses belajar mengajar'),
(12, '2', 'Menjadi teladan bagi rekan kerja'),
(13, '2', 'Berprestasi dalam bidang penelitian atau kejuaraan guru'),
(14, '3', 'Menyelesaikan administrasi mengajar dengan lengkap dan benar'),
(15, '3', 'Menyelesaikan pekerjaan dengan tuntas'),
(16, '3', 'Mampu menjabarkan instruksi pimpinan dengan baik'),
(17, '3', 'Menanggung resiko pekerjaan dan keputusan yang diambil'),
(18, '4', 'Menerima tugas yang diberikan oleh pimpinan'),
(19, '4', 'Mengkomunikasikan masalah dengan baik dengan pimpinan'),
(20, '4', 'Bisa dipercaya dalam menerima tugas'),
(21, '5', 'Jujur dalam perkataan dan pengelolaan keuangan'),
(22, '5', 'Berani minta maaf jika berbuat salah'),
(23, '5', 'Rendah hati dan tidak sombong'),
(24, '6', 'Setia terhadap komitmen bersama'),
(25, '6', 'mampu beradaptasi dan diterima pimpinan, rekan sejawat, dan siswa'),
(26, '6', 'Menjadi pendengar yang baik'),
(27, '7', 'Hadir dan pulang tepat waktu'),
(28, '7', 'Masuk dan keluar kelas tepat waktu'),
(29, '7', 'Menyerahkan administrasi mengajar tepat waktu'),
(30, '7', 'Mentaati peraturan sekolah'),
(31, '8', 'Menjadi teladan bagi siswa dan rekan kerja'),
(32, '8', 'Memiliki sikap simpatik, sopan, bijaksana dan tidak emosional'),
(33, '8', 'Memotivasi siswa berperilaku baik');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'Penilaian Kinerja Guru'),
(2, 'site_description', 'Penilaian Kinerja Guru'),
(3, 'site_keyword', 'PenilaianKinerjaGuru, indonesia, surabaya'),
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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `hp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Administrator', 'superadmin', 'admin@admin.com', '', 'default.jpg', '$2y$10$xP5rx.6d0AasybhMP23yVeMTGKehXum1f88FqO3oL8tP0m5H5369m', 1, 1, 1555463755),
(4, 'Drs. Iman Santoso. MM', 'guru1', 'guru1@guru1.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1569903545),
(5, 'Nyoman Kusuma. BA.Shp', 'guru2', 'guru2@guru2.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1569903586),
(6, 'Kepala Sekolah', 'kepalasekolah', 'kepalasekolah@kepalasekolah.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1571026634),
(7, 'Drs. Ernol Iswahyudi. MM', 'guru3', 'guru3@guru3.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(8, 'Eko Purnomo. S.Pi, ANT-III', 'guru4', 'guru4@guru4.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(9, 'Eddy Sarno. ANT - III', 'guru5', 'guru5@guru5.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(10, 'M.Taufik. ATT-II,MM', 'guru6', 'guru6@guru6.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(11, 'Heri Wahyuni. SH, S.Pd', 'guru7', 'guru7@guru7.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(12, 'Drs.Dwi Wahyu Hidayat', 'guru8', 'guru8@guru8.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(13, 'Dra. Hj. Kuma?iyah', 'guru9', 'guru9@guru9.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(14, 'Drs. M. Munfasir, MM', 'guru10', 'guru10@guru10.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(15, 'Ir. Riswan Wahyudi, MT', 'guru11', 'guru11@guru11.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(16, 'Itensius Valentinus G.BA.Shp', 'guru12', 'guru12@guru12.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(17, 'Anugerah Budi Setiada, S.T.', 'guru13', 'guru13@guru13.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(18, 'Ainul Fitriyah, S.Pd.I, M.Fil', 'guru14', 'guru14@guru14.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(19, 'Hindri Mauludfiana, S.Pd', 'guru15', 'guru15@guru15.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(20, 'Subali, SH, MH', 'guru16', 'guru16@guru16.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(21, 'Drs. HM. Syahrir', 'guru17', 'guru17@guru17.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(22, 'Zulaikah, A.md, SE', 'guru18', 'guru18@guru18.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(23, 'Ikawati, S.Pd', 'guru19', 'guru19@guru19.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(24, 'Irwan Suryo Mulyono, S.Or', 'guru20', 'guru20@guru20.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(25, 'Fransiskus Asisi Riberu.ANT-I', 'guru21', 'guru21@guru21.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(26, 'H. Akhmad Munaji, ANT-III', 'guru22', 'guru22@guru22.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(27, 'Wiwik Indriyani, S.Pd', 'guru23', 'guru23@guru23.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(28, 'Djoko Darjatno, ATT-II', 'guru24', 'guru24@guru24.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(29, 'Pranomo, ANT-III', 'guru25', 'guru25@guru25.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(30, 'Oerip Soepartono, ANT-II', 'guru26', 'guru26@guru26.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(31, 'Sulton Edi Winarko, S.Pd', 'guru27', 'guru27@guru27.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(32, 'Tri Deswanto, SRE-I', 'guru28', 'guru28@guru28.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(33, 'Cynthia Ayu Iksani Putri,S.Pd', 'guru29', 'guru29@guru29.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(34, 'Edison Hasanatan P., M.Mar', 'guru30', 'guru30@guru30.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(35, 'Daryanto, ATT-II', 'guru31', 'guru31@guru31.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(36, 'Asrul Fiqi Febrianto ANT III', 'guru32', 'guru32@guru32.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(37, 'Supangat, S.Pd, MM', 'guru33', 'guru33@guru33.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(38, 'Kuncowati. ANT - II', 'guru34', 'guru34@guru34.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(39, 'Fandi Achmad ATT-III', 'guru35', 'guru35@guru35.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(40, 'Slamet Admodjo, SH, MPB-II', 'guru36', 'guru36@guru36.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(41, 'Sumari', 'guru37', 'guru37@guru37.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(42, 'Putut Djatmoko, ANT?II', 'guru38', 'guru38@guru38.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(43, 'Stevanus F.S.,S.ST.Pel,ANT-III', 'guru39', 'guru39@guru39.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(44, 'Fatin Raniahthifal Adiwijaya S.Pd', 'guru40', 'guru40@guru40.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(45, 'Nursiswa. ANT - I', 'guru41', 'guru41@guru41.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(46, 'MH. Thoyib Anis', 'guru42', 'guru42@guru42.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(47, 'Eko Juniarto. ATT - I', 'guru43', 'guru43@guru43.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(48, 'Brachmantiyo ATT - III', 'guru44', 'guru44@guru44.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(49, 'Yuni Nur hayati S.kom', 'guru45', 'guru45@guru45.com', '', 'default.jpg', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_kategori`
--

DROP TABLE IF EXISTS `user_access_kategori`;
CREATE TABLE IF NOT EXISTS `user_access_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user_access_kategori`
--

INSERT INTO `user_access_kategori` (`id`, `role_id`, `kategori_id`) VALUES
(17, 2, 1),
(18, 2, 3),
(19, 2, 4),
(20, 2, 5),
(21, 2, 6),
(22, 3, 6),
(23, 3, 8),
(24, 4, 8),
(25, 1, 1),
(26, 1, 2),
(27, 1, 3),
(28, 1, 5),
(29, 1, 4),
(30, 1, 6),
(31, 1, 7),
(32, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 3, 2),
(7, 2, 14),
(8, 1, 15),
(9, 1, 4),
(10, 1, 5),
(11, 4, 2),
(12, 2, 2),
(13, 4, 7),
(14, 3, 7),
(15, 2, 7),
(16, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_submenu`
--

DROP TABLE IF EXISTS `user_access_submenu`;
CREATE TABLE IF NOT EXISTS `user_access_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `user_access_submenu`
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
(83, 1, 13),
(84, 3, 2),
(86, 4, 2),
(87, 2, 2),
(88, 4, 16),
(89, 3, 16),
(90, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_user`
--

DROP TABLE IF EXISTS `user_access_user`;
CREATE TABLE IF NOT EXISTS `user_access_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asal_id` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=303 ;

--
-- Dumping data for table `user_access_user`
--

INSERT INTO `user_access_user` (`id`, `asal_id`, `tujuan_id`) VALUES
(18, 5, 5),
(20, 3, 3),
(21, 3, 4),
(22, 3, 5),
(26, 6, 4),
(27, 6, 5),
(28, 6, 6),
(29, 4, 4),
(30, 4, 5),
(31, 4, 46),
(32, 4, 25),
(33, 4, 15),
(34, 4, 9),
(35, 5, 8),
(36, 5, 46),
(37, 5, 26),
(38, 5, 16),
(39, 5, 10),
(40, 7, 7),
(41, 7, 10),
(42, 7, 44),
(43, 7, 27),
(44, 7, 17),
(46, 7, 11),
(47, 8, 8),
(49, 8, 42),
(50, 8, 28),
(51, 8, 18),
(52, 8, 12),
(53, 8, 13),
(54, 9, 9),
(55, 9, 14),
(56, 9, 40),
(57, 9, 29),
(58, 9, 19),
(59, 9, 12),
(60, 10, 10),
(61, 10, 16),
(62, 10, 38),
(63, 10, 30),
(64, 10, 20),
(65, 10, 14),
(66, 11, 11),
(67, 11, 18),
(68, 11, 36),
(69, 11, 31),
(70, 11, 21),
(71, 11, 19),
(72, 12, 12),
(73, 12, 20),
(74, 12, 34),
(75, 12, 32),
(76, 12, 22),
(77, 12, 21),
(78, 13, 13),
(79, 13, 22),
(80, 13, 32),
(81, 13, 33),
(82, 13, 23),
(83, 13, 20),
(84, 14, 14),
(86, 14, 24),
(87, 14, 30),
(88, 14, 34),
(89, 14, 25),
(90, 14, 22),
(91, 15, 15),
(92, 15, 26),
(93, 15, 28),
(94, 15, 35),
(95, 15, 24),
(96, 15, 23),
(97, 16, 16),
(98, 16, 28),
(99, 16, 26),
(100, 16, 36),
(101, 16, 27),
(102, 16, 24),
(103, 17, 17),
(104, 17, 30),
(105, 17, 24),
(106, 17, 37),
(107, 17, 28),
(108, 17, 34),
(109, 18, 18),
(110, 18, 32),
(111, 18, 22),
(112, 18, 28),
(113, 18, 38),
(114, 18, 35),
(115, 19, 19),
(116, 19, 34),
(117, 19, 20),
(118, 19, 39),
(119, 19, 29),
(120, 19, 36),
(121, 20, 20),
(122, 20, 36),
(123, 20, 18),
(124, 20, 40),
(125, 20, 30),
(126, 20, 37),
(127, 21, 21),
(128, 21, 38),
(129, 21, 16),
(130, 21, 41),
(131, 21, 31),
(132, 21, 39),
(133, 22, 22),
(134, 22, 40),
(135, 22, 14),
(136, 22, 42),
(137, 22, 32),
(138, 22, 38),
(139, 23, 23),
(140, 23, 42),
(141, 23, 12),
(142, 23, 43),
(143, 23, 33),
(144, 23, 4),
(145, 24, 24),
(146, 24, 44),
(147, 24, 10),
(148, 24, 45),
(149, 24, 34),
(150, 24, 5),
(151, 25, 25),
(152, 25, 46),
(153, 25, 8),
(154, 25, 44),
(155, 25, 4),
(156, 25, 7),
(157, 26, 26),
(158, 26, 48),
(159, 26, 5),
(160, 26, 46),
(161, 26, 7),
(162, 26, 8),
(163, 27, 27),
(164, 27, 4),
(165, 27, 49),
(166, 27, 47),
(167, 27, 5),
(168, 27, 15),
(169, 28, 28),
(170, 28, 7),
(171, 28, 47),
(172, 28, 48),
(173, 28, 8),
(174, 28, 16),
(175, 29, 29),
(176, 29, 9),
(177, 29, 45),
(178, 29, 49),
(179, 29, 10),
(180, 29, 17),
(181, 30, 30),
(182, 30, 11),
(184, 30, 43),
(185, 30, 4),
(186, 30, 9),
(187, 30, 18),
(188, 31, 31),
(189, 31, 13),
(190, 31, 41),
(191, 31, 5),
(192, 31, 11),
(193, 31, 25),
(194, 32, 32),
(195, 32, 15),
(196, 32, 39),
(197, 32, 7),
(198, 32, 12),
(199, 32, 26),
(200, 33, 33),
(201, 33, 17),
(202, 33, 37),
(203, 33, 8),
(204, 33, 13),
(205, 33, 27),
(206, 34, 34),
(207, 34, 19),
(208, 34, 35),
(209, 34, 9),
(210, 34, 14),
(211, 34, 28),
(212, 35, 35),
(213, 35, 21),
(214, 35, 33),
(215, 35, 10),
(216, 35, 36),
(217, 35, 29),
(218, 36, 36),
(219, 36, 23),
(220, 36, 31),
(221, 36, 11),
(222, 36, 35),
(223, 36, 40),
(224, 37, 37),
(225, 37, 25),
(226, 37, 29),
(227, 37, 12),
(228, 37, 38),
(229, 37, 41),
(230, 38, 38),
(231, 38, 29),
(232, 38, 27),
(233, 38, 13),
(234, 38, 37),
(235, 38, 42),
(236, 39, 39),
(237, 39, 27),
(238, 39, 25),
(239, 39, 14),
(240, 39, 40),
(241, 39, 43),
(242, 40, 40),
(243, 40, 31),
(244, 40, 23),
(245, 40, 15),
(246, 40, 39),
(247, 40, 44),
(248, 41, 41),
(249, 41, 33),
(250, 41, 21),
(251, 41, 16),
(252, 41, 42),
(253, 41, 45),
(254, 42, 42),
(255, 42, 35),
(256, 42, 19),
(257, 42, 17),
(258, 42, 41),
(259, 42, 46),
(260, 43, 43),
(261, 43, 37),
(262, 43, 17),
(263, 43, 18),
(264, 43, 4),
(265, 43, 47),
(266, 44, 44),
(267, 44, 39),
(268, 44, 15),
(269, 44, 19),
(270, 44, 7),
(271, 44, 48),
(272, 45, 45),
(273, 45, 41),
(274, 45, 13),
(276, 45, 20),
(277, 45, 9),
(278, 45, 49),
(279, 46, 46),
(280, 46, 43),
(281, 46, 11),
(282, 46, 21),
(283, 46, 49),
(284, 46, 30),
(285, 47, 47),
(286, 47, 45),
(287, 47, 48),
(288, 47, 22),
(289, 47, 32),
(290, 47, 31),
(291, 48, 48),
(292, 48, 47),
(293, 48, 49),
(294, 48, 46),
(295, 48, 23),
(296, 48, 33),
(297, 49, 49),
(298, 49, 44),
(299, 49, 43),
(300, 49, 24),
(301, 49, 45),
(302, 49, 47);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `icon`, `menu_id`, `menu`) VALUES
(1, 'fa fa-fw fa-wrench', 'admin', 'Admin'),
(2, 'fa fa-fw fa-users', 'user', 'User'),
(3, 'fa fa-fw fa-navicon', 'menu', 'Menu'),
(4, 'fa fa-fw fa-question', 'banksoal', 'BankSoal'),
(5, 'fa fa-fw fa-lock', 'lock', 'Lock'),
(6, 'fa fa-fw fa-users', 'cbt', 'CBT'),
(7, 'fa fa-fw fa-users', 'kuisioner', 'Kuisioner');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_sub_menu`
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
(14, 5, 'User', 'lock/user', '', 2, 1),
(15, 6, 'Penilaian', 'cbt/penilaian', '', 1, 1),
(16, 7, 'Penilaian', 'kuisioner/penilaian', '', 1, 1),
(17, 7, 'Laporan', 'kuisioner/laporan', '', 2, 1),
(18, 7, 'Hapus Penilaian', 'kuisioner/hapus', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

DROP TABLE IF EXISTS `web_setting`;
CREATE TABLE IF NOT EXISTS `web_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `name`, `is_active`) VALUES
(1, 'signup_member', 1),
(2, 'forgot_password', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
