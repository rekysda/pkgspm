-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 07:02 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
`id` int(11) NOT NULL,
  `jawab` varchar(100) NOT NULL,
  `skor` varchar(100) NOT NULL
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
`id` int(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bank_kategori`
--

INSERT INTO `bank_kategori` (`id`, `kategori`, `image`) VALUES
(1, 'Loyalitas', '200211044807.jpg'),
(2, 'Prestasi Kerja', '200211044816.jpg'),
(3, 'Tanggung Jawab', '200211044821.jpg'),
(4, 'Ketaatan', '200211044833.jpg'),
(5, 'Kejujuran', '200211044839.jpg'),
(6, 'Kerjasama', '200211044849.jpg'),
(7, 'Kedisiplinan', '200211044859.jpg'),
(8, 'Kepemimpinan', '200211044904.jpg'),
(9, 'Kompetensi', '200211044911.jpg'),
(10, 'Semangat', '200211044917.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank_penilaian`
--

DROP TABLE IF EXISTS `bank_penilaian`;
CREATE TABLE IF NOT EXISTS `bank_penilaian` (
`id` int(11) NOT NULL,
  `kategori_id` varchar(100) NOT NULL,
  `soal_id` varchar(100) NOT NULL,
  `user_asal` varchar(100) NOT NULL,
  `user_tujuan` varchar(100) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `tahunpenilaian` varchar(10) NOT NULL,
  `bulanpenilaian` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=304 ;

--
-- Dumping data for table `bank_penilaian`
--

INSERT INTO `bank_penilaian` (`id`, `kategori_id`, `soal_id`, `user_asal`, `user_tujuan`, `jawaban`, `role_id`, `tahunpenilaian`, `bulanpenilaian`) VALUES
(199, '1', '5', '4', '4', '4', '2', '2019', '12'),
(200, '1', '6', '4', '4', '2', '2', '2019', '12'),
(201, '1', '7', '4', '4', '3', '2', '2019', '12'),
(202, '1', '8', '4', '4', '4', '2', '2019', '12'),
(203, '2', '9', '4', '4', '1', '2', '2019', '12'),
(204, '2', '10', '4', '4', '1', '2', '2019', '12'),
(205, '2', '11', '4', '4', '1', '2', '2019', '12'),
(206, '2', '12', '4', '4', '1', '2', '2019', '12'),
(207, '2', '13', '4', '4', '1', '2', '2019', '12'),
(208, '3', '14', '4', '4', '1', '2', '2019', '12'),
(209, '3', '15', '4', '4', '1', '2', '2019', '12'),
(210, '3', '16', '4', '4', '1', '2', '2019', '12'),
(211, '3', '17', '4', '4', '1', '2', '2019', '12'),
(212, '4', '18', '4', '4', '1', '2', '2019', '12'),
(213, '4', '19', '4', '4', '1', '2', '2019', '12'),
(214, '4', '20', '4', '4', '1', '2', '2019', '12'),
(215, '5', '21', '4', '4', '1', '2', '2019', '12'),
(216, '5', '22', '4', '4', '1', '2', '2019', '12'),
(217, '5', '23', '4', '4', '1', '2', '2019', '12'),
(218, '6', '24', '4', '4', '1', '2', '2019', '12'),
(219, '6', '25', '4', '4', '1', '2', '2019', '12'),
(220, '6', '26', '4', '4', '1', '2', '2019', '12'),
(221, '7', '27', '4', '4', '1', '2', '2019', '12'),
(222, '7', '28', '4', '4', '1', '2', '2019', '12'),
(223, '7', '29', '4', '4', '1', '2', '2019', '12'),
(224, '7', '30', '4', '4', '1', '2', '2019', '12'),
(225, '8', '31', '4', '4', '1', '2', '2019', '12'),
(226, '8', '32', '4', '4', '1', '2', '2019', '12'),
(227, '8', '33', '4', '4', '1', '2', '2019', '12'),
(228, '9', '34', '4', '4', '1', '2', '2019', '12'),
(229, '9', '35', '4', '4', '1', '2', '2019', '12'),
(230, '9', '36', '4', '4', '1', '2', '2019', '12'),
(231, '9', '37', '4', '4', '1', '2', '2019', '12'),
(232, '9', '38', '4', '4', '1', '2', '2019', '12'),
(233, '10', '39', '4', '4', '4', '2', '2019', '12'),
(234, '1', '5', '3', '4', '4', '1', '2019', '11'),
(235, '1', '6', '3', '4', '3', '1', '2019', '11'),
(236, '1', '7', '3', '4', '4', '1', '2019', '11'),
(237, '1', '8', '3', '4', '1', '1', '2019', '11'),
(238, '2', '9', '3', '4', '1', '1', '2019', '11'),
(239, '2', '10', '3', '4', '1', '1', '2019', '11'),
(240, '2', '11', '3', '4', '1', '1', '2019', '11'),
(241, '2', '12', '3', '4', '1', '1', '2019', '11'),
(242, '2', '13', '3', '4', '1', '1', '2019', '11'),
(243, '3', '14', '3', '4', '1', '1', '2019', '11'),
(244, '3', '15', '3', '4', '1', '1', '2019', '11'),
(245, '3', '16', '3', '4', '1', '1', '2019', '11'),
(246, '3', '17', '3', '4', '1', '1', '2019', '11'),
(247, '4', '18', '3', '4', '1', '1', '2019', '11'),
(248, '4', '19', '3', '4', '1', '1', '2019', '11'),
(249, '4', '20', '3', '4', '1', '1', '2019', '11'),
(250, '5', '21', '3', '4', '1', '1', '2019', '11'),
(251, '5', '22', '3', '4', '1', '1', '2019', '11'),
(252, '5', '23', '3', '4', '1', '1', '2019', '11'),
(253, '6', '24', '3', '4', '1', '1', '2019', '11'),
(254, '6', '25', '3', '4', '1', '1', '2019', '11'),
(255, '6', '26', '3', '4', '1', '1', '2019', '11'),
(256, '7', '27', '3', '4', '1', '1', '2019', '11'),
(257, '7', '28', '3', '4', '1', '1', '2019', '11'),
(258, '7', '29', '3', '4', '1', '1', '2019', '11'),
(259, '7', '30', '3', '4', '1', '1', '2019', '11'),
(260, '8', '31', '3', '4', '1', '1', '2019', '11'),
(261, '8', '32', '3', '4', '1', '1', '2019', '11'),
(262, '8', '33', '3', '4', '1', '1', '2019', '11'),
(263, '9', '34', '3', '4', '1', '1', '2019', '11'),
(264, '9', '35', '3', '4', '1', '1', '2019', '11'),
(265, '9', '36', '3', '4', '1', '1', '2019', '11'),
(266, '9', '37', '3', '4', '1', '1', '2019', '11'),
(267, '9', '38', '3', '4', '1', '1', '2019', '11'),
(268, '10', '39', '3', '4', '1', '1', '2019', '11'),
(269, '1', '5', '3', '5', '2', '1', '2019', '10'),
(270, '1', '6', '3', '5', '3', '1', '2019', '10'),
(271, '1', '7', '3', '5', '3', '1', '2019', '10'),
(272, '1', '8', '3', '5', '3', '1', '2019', '10'),
(273, '2', '9', '3', '5', '1', '1', '2019', '10'),
(274, '2', '10', '3', '5', '1', '1', '2019', '10'),
(275, '2', '11', '3', '5', '1', '1', '2019', '10'),
(276, '2', '12', '3', '5', '1', '1', '2019', '10'),
(277, '2', '13', '3', '5', '1', '1', '2019', '10'),
(278, '3', '14', '3', '5', '1', '1', '2019', '10'),
(279, '3', '15', '3', '5', '1', '1', '2019', '10'),
(280, '3', '16', '3', '5', '1', '1', '2019', '10'),
(281, '3', '17', '3', '5', '1', '1', '2019', '10'),
(282, '4', '18', '3', '5', '1', '1', '2019', '10'),
(283, '4', '19', '3', '5', '1', '1', '2019', '10'),
(284, '4', '20', '3', '5', '1', '1', '2019', '10'),
(285, '5', '21', '3', '5', '1', '1', '2019', '10'),
(286, '5', '22', '3', '5', '1', '1', '2019', '10'),
(287, '5', '23', '3', '5', '1', '1', '2019', '10'),
(288, '6', '24', '3', '5', '1', '1', '2019', '10'),
(289, '6', '25', '3', '5', '1', '1', '2019', '10'),
(290, '6', '26', '3', '5', '1', '1', '2019', '10'),
(291, '7', '27', '3', '5', '1', '1', '2019', '10'),
(292, '7', '28', '3', '5', '1', '1', '2019', '10'),
(293, '7', '29', '3', '5', '1', '1', '2019', '10'),
(294, '7', '30', '3', '5', '1', '1', '2019', '10'),
(295, '8', '31', '3', '5', '1', '1', '2019', '10'),
(296, '8', '32', '3', '5', '1', '1', '2019', '10'),
(297, '8', '33', '3', '5', '1', '1', '2019', '10'),
(298, '9', '34', '3', '5', '1', '1', '2019', '10'),
(299, '9', '35', '3', '5', '1', '1', '2019', '10'),
(300, '9', '36', '3', '5', '1', '1', '2019', '10'),
(301, '9', '37', '3', '5', '1', '1', '2019', '10'),
(302, '9', '38', '3', '5', '1', '1', '2019', '10'),
(303, '10', '39', '3', '5', '1', '1', '2019', '10');

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

DROP TABLE IF EXISTS `bank_soal`;
CREATE TABLE IF NOT EXISTS `bank_soal` (
`id` int(10) NOT NULL,
  `kategori_id` varchar(100) NOT NULL,
  `soal` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

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
(33, '8', 'Memotivasi siswa berperilaku baik'),
(34, '9', 'Penguasaan Materi'),
(35, '9', 'Penguasaan Kelas'),
(36, '9', 'Cara Mengajar'),
(37, '9', 'Penampilan dan Performa'),
(38, '9', 'Bisa dipercaya dalam menerima tugas'),
(39, '10', 'Semangat Dalam Bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'Penilaian Kinerja Guru'),
(2, 'site_description', 'Penilaian Kinerja Guru'),
(3, 'site_keyword', 'PenilaianKinerjaGuru, indonesia, surabaya'),
(4, 'forgot_password', '0'),
(5, 'signup_member', '0'),
(6, 'protocol', 'smtp'),
(7, 'smtp_host', 'ssl://smtp.googlemail.com'),
(8, 'smtp_user', 'rekysmtp@gmail.com'),
(9, 'smtp_pass', ''),
(10, 'smtp_port', '465'),
(11, 'mailtype', 'html'),
(12, 'charset', 'utf-8'),
(13, 'newline', '\\r\\n'),
(14, 'tahunpenilaian', '2019'),
(15, 'bulanpenilaian', '10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `masakerja` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `hp`, `image`, `mapel`, `masakerja`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Administrator', 'superadmin', 'admin@admin.com', '', '1579312443062.jpg', '', '', '$2y$10$xP5rx.6d0AasybhMP23yVeMTGKehXum1f88FqO3oL8tP0m5H5369m', 1, 1, 1555463755),
(4, 'Drs. Iman Santoso. MM..', 'guru1', 'guru1@guru1.com', '', '200118025457.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1569903545),
(5, 'Nyoman Kusuma. BA.Shp', 'guru2', 'guru2@guru2.com', '', '200109031156.jpg', 'Fisika', '12', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1569903586),
(7, 'Drs. Ernol Iswahyudi. MM', 'guru3', 'guru3@guru3.com', '', '200118025512.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(8, 'Eko Purnomo. S.Pi, ANT-III', 'guru4', 'guru4@guru4.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(9, 'Eddy Sarno. ANT - III', 'guru5', 'guru5@guru5.com', '', '200118025603.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(10, 'M.Taufik. ATT-II,MM', 'guru6', 'guru6@guru6.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(11, 'Heri Wahyuni. SH, S.Pd', 'guru7', 'guru7@guru7.com', '', '200118025753.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(12, 'Drs.Dwi Wahyu Hidayat', 'guru8', 'guru8@guru8.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(13, 'Dra. Hj. Kumaiyah', 'guru9', 'guru9@guru9.com', '', '200118025846.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(14, 'Drs. M. Munfasir, MM', 'guru10', 'guru10@guru10.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(15, 'Ir. Riswan Wahyudi, MT', 'guru11', 'guru11@guru11.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(16, 'Itensius Valentinus G.BA.Shp', 'guru12', 'guru12@guru12.com', '', '200118025812.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(17, 'Anugerah Budi Setiada, S.T.', 'guru13', 'guru13@guru13.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(18, 'Ainul Fitriyah, S.Pd.I, M.Fil', 'guru14', 'guru14@guru14.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(19, 'Hindri Mauludfiana, S.Pd', 'guru15', 'guru15@guru15.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(20, 'Subali, SH, MH', 'guru16', 'guru16@guru16.com', '', '200118030030.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(21, 'Drs. HM. Syahrir', 'guru17', 'guru17@guru17.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(22, 'Zulaikah, A.md, SE', 'guru18', 'guru18@guru18.com', '', '200118030133.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(23, 'Ikawati, S.Pd', 'guru19', 'guru19@guru19.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(24, 'Irwan Suryo Mulyono, S.Or', 'guru20', 'guru20@guru20.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(25, 'Fransiskus Asisi Riberu.ANT-I', 'guru21', 'guru21@guru21.com', '', '200118030001.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(26, 'H. Akhmad Munaji, ANT-III', 'guru22', 'guru22@guru22.com', '', '200118025912.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(27, 'Wiwik Indriyani, S.Pd', 'guru23', 'guru23@guru23.com', '', '200118030121.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(28, 'Djoko Darjatno, ATT-II', 'guru24', 'guru24@guru24.com', '', '200118025829.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(29, 'Pranomo, ANT-III', 'guru25', 'guru25@guru25.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(30, 'Oerip Soepartono, ANT-II', 'guru26', 'guru26@guru26.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(31, 'Sulton Edi Winarko, S.Pd', 'guru27', 'guru27@guru27.com', '', '200118030044.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(32, 'Tri Deswanto, SRE-I', 'guru28', 'guru28@guru28.com', '', '200118030102.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(33, 'Cynthia Ayu Iksani Putri,S.Pd', 'guru29', 'guru29@guru29.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(34, 'Edison Hasanatan P., M.Mar', 'guru30', 'guru30@guru30.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(35, 'Daryanto, ATT-II', 'guru31', 'guru31@guru31.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(36, 'Asrul Fiqi Febrianto ANT III', 'guru32', 'guru32@guru32.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(37, 'Supangat, S.Pd, MM', 'guru33', 'guru33@guru33.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(38, 'Kuncowati. ANT - II', 'guru34', 'guru34@guru34.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(39, 'Fandi Achmad ATT-III', 'guru35', 'guru35@guru35.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(40, 'Slamet Admodjo, SH, MPB-II', 'guru36', 'guru36@guru36.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(41, 'Sumari', 'guru37', 'guru37@guru37.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(42, 'Putut Djatmoko, ANT?II', 'guru38', 'guru38@guru38.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(43, 'Stevanus F.S.,S.ST.Pel,ANT-III', 'guru39', 'guru39@guru39.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(44, 'Fatin Raniahthifal Adiwijaya S.Pd', 'guru40', 'guru40@guru40.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(45, 'Nursiswa. ANT - I', 'guru41', 'guru41@guru41.com', '', '200118025927.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(46, 'MH. Thoyib Anis', 'guru42', 'guru42@guru42.com', '', '200118025641.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(47, 'Eko Juniarto. ATT - I', 'guru43', 'guru43@guru43.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(48, 'Brachmantiyo ATT - III', 'guru44', 'guru44@guru44.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(49, 'Yuni Nur hayati S.kom', 'guru45', 'guru45@guru45.com', '', 'default.jpg', '', '', '$2y$10$opvyVfvlObMFp8BNudmE1OZ4TcSs1olSiiiwHSY/enYRn5rwj.1xW', 2, 1, 1573010426),
(50, 'Kepala Sekolah', 'kepsek', 'kepsek@kepsek.com', '', 'default.jpg', '', '', '$2y$10$SRA/Onzg7Jv6xe6u8KMfDeWUF2oEUZQwAc7L.Oya29PXggK5/0D5S', 1, 1, 1573440950),
(52, 'siswaxn1', 'siswaxn1', 'siswaxn1@siswaxn1.com', '', 'default.jpg', '', '', '$2y$10$57lnh5ejB5Yc2eojd./rOOjXxg2ByfHMUFa9A7b1yXBzFeqwZRqW2', 3, 1, 1574231694),
(53, 'siswaxn2', 'siswaxn2', 'siswaxn2@siswaxn2.com', '', 'default.jpg', '', '', '$2y$10$a/QOcvRbwzuyLd9YLbGxZOiDBmOLIEyENsq0nHkrvL2ZSvsVpR7ES', 3, 1, 1574231743),
(54, 'siswaxn3', 'siswaxn3', 'siswaxn3@siswaxn3.com', '', 'default.jpg', '', '', '$2y$10$b03R1osHrEraQihhVYSFYOQ4L75hSRei896H42ofVAEai1.Zo.3z2', 3, 1, 1574231760),
(55, 'siswaxn4', 'siswaxn4', 'siswaxn4@siswaxn4.com', '', 'default.jpg', '', '', '$2y$10$LbKYT0sL3dgx42zGYDAY7.RKspNE7OXQR5BWXrOqf.sY9VylP5Rlu', 3, 1, 1574231775),
(56, 'siswaxn5', 'siswaxn5', 'siswaxn5@siswaxn5.com', '', 'default.jpg', '', '', '$2y$10$MI8thrtg3pjKlj89jfR30.dtuGfU0eVRhGL7VgG12YJZ31km9v9n2', 3, 1, 1574231794),
(57, 'siswaxt1', 'siswaxt1', 'siswaxt1@siswaxt1.com', '', 'default.jpg', '', '', '$2y$10$t6MSVfyYDjLRkXwIKPZ3Qe0Fw8Vfs/HEVSUFMGO.UJmkrJ3MqiXpW', 3, 1, 1574231824),
(58, 'siswaxt2', 'siswaxt2', 'siswaxt2@siswaxt2.com', '', 'default.jpg', '', '', '$2y$10$Kum2TmDRjQm9Y6c7wE1BRe.m1b9mtoPXuTTKjj9kqaYsXYtFF71Cu', 3, 1, 1574231841),
(59, 'siswaxt3', 'siswaxt3', 'siswaxt3@gmail.com', '', 'default.jpg', '', '', '$2y$10$vJGH8COLJcPPB2lEBH0DCuZgFcDasSYGsjqdHm5R4WkYQystayI2W', 3, 1, 1574231868),
(60, 'siswaxt4', 'siswaxt4', 'siswaxt4@siswaxt4.com', '', 'default.jpg', '', '', '$2y$10$f1eN9WyQtjXQUy6hchKn4OYV1snjEInz9Y5x/IGS8Brp/hEg8WW36', 3, 1, 1574231885),
(61, 'siswaxt5', 'siswaxt5', 'siswaxt5@siswaxt5.com', '', 'default.jpg', '', '', '$2y$10$ziNP4Qj32t/4mUsGh/w4xeL664VTWrJ/xxuqjl39iCPcdPGkmXFQu', 3, 1, 1574231900),
(62, 'siswaxin1', 'siswaxin1', 'siswaxin1@siswaxin1.com', '', 'default.jpg', '', '', '$2y$10$frva8ZSzZnqhyIBSfx28HORyHQPB2UJ84SJdh48LIj.H2i2mUgQvW', 3, 1, 1574231926),
(63, 'siswaxin2', 'siswaxin2', 'siswaxin2@siswaxin2.com', '', 'default.jpg', '', '', '$2y$10$R8hAmtqqcKbwTFYRR5PEDOSz5yWUM7ykNYl.8kBQ5Oe20OK63vSSC', 3, 1, 1574231941),
(64, 'siswaxin3', 'siswaxin3', 'siswaxin3@siswaxin3.com', '', 'default.jpg', '', '', '$2y$10$YvXewJNtSYKMOHG/A4sgyu.j.ytTRjEBhFRaOli2LgWfpCzV2Oi4m', 3, 1, 1574231957),
(65, 'siswaxin4', 'siswaxin4', 'siswaxin4@siswaxin4.com', '', 'default.jpg', '', '', '$2y$10$B.u5HrpS9J5obC4SJ41v4.3pnoihJRGdedXDcMyCd7Rp0cK/Z9Nnm', 3, 1, 1574231972),
(66, 'siswaxin5', 'siswaxin5', 'siswaxin5@siswaxin5.com', '', 'default.jpg', '', '', '$2y$10$SgaVkUHQqZ5n82HlsUxSweZRBT2JvQSBPNa2IE/1zqoyDLsqLyHeC', 3, 1, 1574231988),
(67, 'siswaxit1', 'siswaxit1', 'siswaxit1@siswaxit1.com', '', 'default.jpg', '', '', '$2y$10$w8/3wyRkNS3mmJOL6Cpz5ehI.Bxk0rS1B1lz0h6vAOVkzGt0rRy/m', 3, 1, 1574232004),
(68, 'siswaxit2', 'siswaxit2', 'siswaxit2@siswaxit2.com', '', 'default.jpg', '', '', '$2y$10$YMUKaba09otsQP1Q6lhwhuvcJzl3bvcLfr.6Sw2BJ2NaKk/.L77iq', 3, 1, 1574232019),
(69, 'siswaxit3', 'siswaxit3', 'siswaxit3@siswaxit3.com', '', 'default.jpg', '', '', '$2y$10$gfWW.ruLoi8jrsOL8uZabureknKvvLnkDug6QCE9D9/p2mfRR8vXm', 3, 1, 1574232035),
(70, 'siswaxit4', 'siswaxit4', 'siswaxit4@siswaxit4.com', '', 'default.jpg', '', '', '$2y$10$HGbLijGspJpX2Efe78JXiOFpeaggxX6Uvi0A2buG5fN5wNEIzwt6a', 3, 1, 1574232052),
(71, 'siswaxit5', 'siswaxit5', 'siswaxit5@siswaxit5.com', '', 'default.jpg', '', '', '$2y$10$IT/nQHl4QQpnzLYV/YyUzOLFzv3d4E1shQlyWzCW.5WrJ9wBEGMX.', 3, 1, 1574232072),
(72, 'siswaxiin1', 'siswaxiin1', 'siswaxiin1@siswaxiin1.com', '', 'default.jpg', '', '', '$2y$10$u9aJiAhkJeOKWd8Omd15Hea4btK2ippgHekECziBBAcyGCEd1soYO', 3, 1, 1574232118),
(73, 'siswaxiin2', 'siswaxiin2', 'siswaxiin2@siswaxiin2.com', '', 'default.jpg', '', '', '$2y$10$EclhyKR8YtvTiEQ42BRIAePpsBd/y4wiTY1Zf6kl7sQEqf8ycwCgW', 3, 1, 1574232140),
(74, 'siswaxiin3', 'siswaxiin3', 'siswaxiin3@siswaxiin3.com', '', 'default.jpg', '', '', '$2y$10$6rMHBZpYKO9vlwHh/M0zeOOr592WLV92Fdsbk7lvXwsi3B6ESVzDq', 3, 1, 1574232159),
(75, 'siswaxiin4', 'siswaxiin4', 'siswaxiin4@siswaxiin4.com', '', 'default.jpg', '', '', '$2y$10$4tm7x5lJ6lCLUC10wNDtlOM3IQPJ6W6kr/M4st5mkB/R//G7QN5KS', 3, 1, 1574232176),
(76, 'siswaxiin5', 'siswaxiin5', 'siswaxiin5@siswaxiin5.com', '', 'default.jpg', '', '', '$2y$10$wANjy/6Laa0Fm9clOyjkcui.T/arWdg9HtPazU3dl9RylxvuUaise', 3, 1, 1574232194),
(77, 'siswaxiit1', 'siswaxiit1', 'siswaxiit1@siswaxiit1.com', '', 'default.jpg', '', '', '$2y$10$ZyrhsLUUcnqXXd2iamkbJOe8cuyKuD0tKdmERTpnTTokzRNjdkDsC', 3, 1, 1574232211),
(78, 'siswaxiit2', 'siswaxiit2', 'siswaxiit2@siswaxiit2.com', '', 'default.jpg', '', '', '$2y$10$L7cKXv.bKad8xiWi.QqFqeUaUS8YOvpdj6ukcrQKBvSiCg09Eo5vi', 3, 1, 1574232227),
(79, 'siswaxiit3', 'siswaxiit3', 'siswaxiit3@siswaxiit3.com', '', 'default.jpg', '', '', '$2y$10$i.1jw8Mky.0kgommMvQ2X.LDCiYENNLYtdR6cOmDo9ccxFtlT.xYy', 3, 1, 1574232245),
(80, 'siswaxiit4', 'siswaxiit4', 'siswaxiit4@siswaxiit4.com', '', 'default.jpg', '', '', '$2y$10$gZCmkP7Wm23DNCJDGcG7juCrPxb6A/alxPTlISBFHK7inha7yNPK.', 3, 1, 1574232262),
(81, 'siswaxiit5', 'siswaxiit5', 'siswaxiit5@siswaxiit5.com', '', 'default.jpg', '', '', '$2y$10$ctf/0PG8xBT2xHdgoVI1m.oG2Wkc9kZf/SfnKW40mL7r29JQVaVQ.', 3, 1, 1574232279);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_kategori`
--

DROP TABLE IF EXISTS `user_access_kategori`;
CREATE TABLE IF NOT EXISTS `user_access_kategori` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

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
(32, 1, 8),
(33, 3, 7),
(34, 3, 10),
(35, 2, 10),
(36, 1, 10),
(37, 1, 9),
(38, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
CREATE TABLE IF NOT EXISTS `user_access_menu` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
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
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
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
`id` int(11) NOT NULL,
  `asal_id` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=965 ;

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
(302, 49, 47),
(303, 50, 4),
(304, 50, 5),
(306, 50, 7),
(307, 50, 8),
(308, 50, 9),
(309, 50, 10),
(310, 50, 11),
(311, 50, 12),
(312, 50, 13),
(313, 50, 14),
(314, 50, 15),
(315, 50, 16),
(316, 50, 17),
(317, 50, 18),
(318, 50, 19),
(319, 50, 20),
(320, 50, 21),
(322, 50, 22),
(323, 50, 23),
(324, 50, 24),
(325, 50, 25),
(326, 50, 26),
(327, 50, 27),
(329, 50, 28),
(330, 50, 29),
(331, 50, 30),
(332, 50, 31),
(333, 50, 32),
(334, 50, 33),
(335, 50, 34),
(336, 50, 35),
(337, 50, 36),
(338, 50, 37),
(339, 50, 38),
(340, 50, 39),
(341, 50, 40),
(342, 50, 41),
(343, 50, 42),
(344, 50, 43),
(345, 50, 44),
(346, 50, 45),
(347, 50, 46),
(348, 50, 47),
(349, 50, 48),
(350, 51, 4),
(351, 52, 11),
(352, 52, 13),
(353, 52, 16),
(354, 52, 18),
(355, 52, 20),
(356, 52, 22),
(357, 52, 23),
(358, 52, 24),
(359, 52, 27),
(360, 52, 33),
(361, 52, 34),
(362, 52, 36),
(363, 52, 43),
(364, 52, 46),
(366, 52, 49),
(367, 53, 11),
(368, 53, 13),
(369, 53, 16),
(370, 53, 18),
(371, 53, 20),
(372, 53, 22),
(373, 53, 23),
(374, 53, 24),
(375, 53, 27),
(376, 53, 33),
(377, 53, 34),
(378, 53, 36),
(379, 53, 43),
(380, 53, 46),
(382, 53, 49),
(383, 54, 11),
(384, 54, 13),
(385, 54, 16),
(386, 54, 18),
(387, 54, 20),
(388, 54, 22),
(389, 54, 23),
(390, 54, 24),
(391, 54, 27),
(392, 54, 33),
(393, 54, 34),
(394, 54, 36),
(395, 54, 43),
(396, 54, 46),
(398, 54, 49),
(399, 55, 11),
(400, 55, 13),
(401, 55, 16),
(402, 55, 18),
(403, 55, 20),
(404, 55, 22),
(405, 55, 23),
(406, 55, 24),
(407, 55, 27),
(408, 55, 33),
(409, 55, 34),
(410, 55, 36),
(411, 55, 43),
(412, 55, 46),
(414, 55, 49),
(415, 56, 11),
(416, 56, 13),
(417, 56, 16),
(418, 56, 18),
(419, 56, 20),
(420, 56, 22),
(421, 56, 23),
(422, 56, 24),
(423, 56, 27),
(424, 56, 33),
(425, 56, 34),
(426, 56, 36),
(427, 56, 43),
(428, 56, 46),
(430, 56, 49),
(431, 57, 7),
(432, 57, 10),
(433, 57, 11),
(434, 57, 13),
(435, 57, 16),
(436, 57, 17),
(437, 57, 18),
(438, 57, 20),
(439, 57, 22),
(440, 57, 23),
(441, 57, 24),
(442, 57, 27),
(443, 57, 33),
(444, 57, 35),
(445, 57, 36),
(446, 57, 46),
(448, 57, 49),
(449, 58, 7),
(450, 58, 10),
(451, 58, 11),
(452, 58, 13),
(453, 58, 16),
(454, 58, 17),
(455, 58, 18),
(456, 58, 20),
(457, 58, 22),
(458, 58, 23),
(459, 58, 24),
(460, 58, 27),
(461, 58, 33),
(462, 58, 35),
(463, 58, 36),
(464, 58, 46),
(466, 58, 49),
(467, 59, 7),
(468, 59, 10),
(469, 59, 11),
(470, 59, 13),
(471, 59, 16),
(472, 59, 17),
(473, 59, 18),
(474, 59, 20),
(475, 59, 22),
(476, 59, 23),
(477, 59, 24),
(478, 59, 27),
(479, 59, 33),
(480, 59, 35),
(482, 59, 36),
(483, 59, 46),
(485, 59, 49),
(486, 60, 7),
(487, 60, 10),
(488, 60, 11),
(489, 60, 13),
(490, 60, 16),
(491, 60, 17),
(492, 60, 18),
(493, 60, 20),
(494, 60, 22),
(495, 60, 23),
(496, 60, 24),
(497, 60, 27),
(498, 60, 33),
(499, 60, 35),
(500, 60, 36),
(501, 60, 46),
(503, 60, 49),
(504, 61, 7),
(505, 61, 10),
(506, 61, 11),
(507, 61, 13),
(508, 61, 16),
(509, 61, 17),
(510, 61, 18),
(511, 61, 20),
(512, 61, 22),
(513, 61, 23),
(514, 61, 24),
(515, 61, 27),
(516, 61, 33),
(517, 61, 35),
(518, 61, 36),
(519, 61, 46),
(521, 61, 49),
(522, 62, 4),
(523, 62, 7),
(524, 62, 8),
(525, 62, 9),
(526, 62, 16),
(527, 62, 18),
(528, 62, 21),
(529, 62, 22),
(530, 62, 24),
(531, 62, 25),
(532, 62, 26),
(533, 62, 27),
(534, 62, 30),
(535, 62, 31),
(536, 62, 32),
(537, 62, 36),
(538, 62, 37),
(539, 62, 38),
(540, 62, 39),
(541, 62, 42),
(542, 62, 45),
(545, 63, 4),
(546, 63, 7),
(547, 63, 8),
(548, 63, 9),
(549, 63, 16),
(550, 63, 18),
(551, 63, 21),
(552, 63, 22),
(553, 63, 24),
(554, 63, 25),
(555, 63, 26),
(556, 63, 27),
(557, 63, 30),
(558, 63, 31),
(559, 63, 32),
(560, 63, 36),
(561, 63, 37),
(562, 63, 38),
(563, 63, 39),
(564, 63, 42),
(565, 63, 45),
(568, 64, 4),
(569, 64, 7),
(570, 64, 8),
(571, 64, 9),
(572, 64, 16),
(573, 64, 18),
(574, 64, 21),
(575, 64, 22),
(576, 64, 24),
(577, 64, 25),
(578, 64, 26),
(579, 64, 27),
(580, 64, 30),
(581, 64, 31),
(582, 64, 32),
(583, 64, 36),
(584, 64, 37),
(585, 64, 38),
(586, 64, 39),
(587, 64, 42),
(588, 64, 45),
(589, 65, 4),
(590, 65, 7),
(591, 65, 8),
(592, 65, 9),
(593, 65, 16),
(594, 65, 18),
(595, 65, 21),
(596, 65, 22),
(597, 65, 24),
(598, 65, 25),
(599, 65, 26),
(600, 65, 27),
(601, 65, 30),
(602, 65, 31),
(603, 65, 32),
(604, 65, 36),
(605, 65, 37),
(606, 65, 38),
(607, 65, 39),
(608, 65, 42),
(609, 65, 45),
(610, 66, 4),
(611, 66, 7),
(612, 66, 8),
(613, 66, 9),
(614, 66, 16),
(615, 66, 18),
(616, 66, 21),
(617, 66, 22),
(618, 66, 24),
(619, 66, 25),
(620, 66, 26),
(621, 66, 27),
(622, 66, 30),
(623, 66, 31),
(624, 66, 32),
(625, 66, 36),
(626, 66, 37),
(627, 66, 38),
(628, 66, 39),
(629, 66, 42),
(630, 66, 45),
(631, 67, 4),
(632, 67, 7),
(633, 67, 8),
(634, 67, 9),
(635, 67, 10),
(636, 67, 14),
(637, 67, 15),
(638, 67, 16),
(639, 67, 17),
(640, 67, 21),
(641, 67, 22),
(642, 67, 24),
(643, 67, 27),
(644, 67, 28),
(645, 67, 31),
(646, 67, 35),
(647, 67, 36),
(648, 67, 37),
(649, 67, 39),
(650, 67, 47),
(651, 68, 4),
(652, 68, 7),
(653, 68, 8),
(654, 68, 9),
(655, 68, 10),
(656, 68, 14),
(657, 68, 15),
(658, 68, 16),
(659, 68, 17),
(660, 68, 21),
(661, 68, 22),
(662, 68, 24),
(663, 68, 27),
(664, 68, 28),
(665, 68, 31),
(666, 68, 35),
(667, 68, 36),
(668, 68, 37),
(669, 68, 39),
(670, 68, 47),
(671, 69, 4),
(672, 69, 7),
(673, 69, 8),
(674, 69, 9),
(675, 69, 10),
(676, 69, 14),
(677, 69, 15),
(678, 69, 16),
(679, 69, 17),
(680, 69, 21),
(681, 69, 22),
(682, 69, 24),
(683, 69, 27),
(684, 69, 28),
(685, 69, 31),
(686, 69, 35),
(687, 69, 36),
(688, 69, 37),
(689, 69, 39),
(690, 69, 47),
(691, 70, 4),
(692, 70, 7),
(693, 70, 8),
(694, 70, 9),
(695, 70, 10),
(696, 70, 14),
(697, 70, 15),
(698, 70, 16),
(699, 70, 17),
(700, 70, 21),
(701, 70, 22),
(702, 70, 24),
(703, 70, 27),
(704, 70, 28),
(705, 70, 31),
(706, 70, 35),
(707, 70, 36),
(708, 70, 37),
(709, 70, 39),
(710, 70, 47),
(711, 71, 4),
(712, 71, 7),
(713, 71, 8),
(714, 71, 9),
(715, 71, 10),
(716, 71, 14),
(717, 71, 15),
(718, 71, 16),
(719, 71, 17),
(720, 71, 21),
(721, 71, 22),
(722, 71, 24),
(723, 71, 27),
(724, 71, 28),
(725, 71, 31),
(726, 71, 35),
(727, 71, 36),
(728, 71, 37),
(729, 71, 39),
(730, 71, 47),
(731, 72, 4),
(732, 72, 7),
(733, 72, 8),
(734, 72, 9),
(735, 72, 12),
(736, 72, 19),
(737, 72, 25),
(738, 72, 26),
(739, 72, 29),
(740, 72, 30),
(741, 72, 32),
(742, 72, 33),
(743, 72, 36),
(744, 72, 37),
(745, 72, 38),
(746, 72, 40),
(747, 72, 41),
(748, 72, 44),
(749, 72, 45),
(750, 72, 47),
(751, 73, 4),
(752, 73, 7),
(753, 73, 8),
(754, 73, 9),
(755, 73, 12),
(756, 73, 19),
(757, 73, 25),
(758, 73, 26),
(759, 73, 29),
(760, 73, 30),
(761, 73, 32),
(762, 73, 33),
(763, 73, 36),
(764, 73, 37),
(765, 73, 38),
(766, 73, 40),
(767, 73, 41),
(768, 73, 44),
(769, 73, 45),
(770, 73, 47),
(771, 74, 4),
(772, 74, 7),
(773, 74, 8),
(774, 74, 9),
(775, 74, 12),
(776, 74, 19),
(777, 74, 25),
(778, 74, 26),
(779, 74, 29),
(780, 74, 30),
(781, 74, 32),
(782, 74, 33),
(783, 74, 36),
(784, 74, 37),
(785, 74, 38),
(786, 74, 40),
(787, 74, 41),
(788, 74, 44),
(789, 74, 45),
(790, 74, 47),
(791, 75, 4),
(792, 75, 7),
(793, 75, 8),
(794, 75, 9),
(795, 75, 12),
(796, 75, 19),
(797, 75, 25),
(798, 75, 26),
(799, 75, 29),
(800, 75, 30),
(801, 75, 32),
(802, 75, 33),
(803, 75, 36),
(804, 75, 37),
(805, 75, 38),
(806, 75, 40),
(807, 75, 41),
(808, 75, 44),
(809, 75, 45),
(810, 75, 47),
(811, 76, 4),
(812, 76, 7),
(813, 76, 8),
(814, 76, 9),
(815, 76, 12),
(816, 76, 19),
(817, 76, 25),
(818, 76, 26),
(819, 76, 29),
(820, 76, 30),
(821, 76, 32),
(822, 76, 33),
(823, 76, 36),
(824, 76, 37),
(825, 76, 38),
(826, 76, 40),
(827, 76, 41),
(828, 76, 44),
(829, 76, 45),
(830, 76, 47),
(831, 77, 4),
(832, 77, 7),
(833, 77, 8),
(834, 77, 9),
(835, 77, 10),
(836, 77, 12),
(837, 77, 15),
(838, 77, 19),
(839, 77, 28),
(840, 77, 33),
(841, 77, 35),
(842, 77, 36),
(843, 77, 37),
(844, 77, 39),
(845, 77, 40),
(846, 77, 41),
(847, 77, 44),
(848, 77, 47),
(849, 78, 4),
(850, 78, 7),
(851, 78, 8),
(852, 78, 9),
(853, 78, 10),
(854, 78, 12),
(855, 78, 15),
(856, 78, 19),
(857, 78, 28),
(858, 78, 33),
(859, 78, 35),
(860, 78, 36),
(861, 78, 37),
(862, 78, 39),
(863, 78, 40),
(864, 78, 41),
(865, 78, 44),
(866, 78, 47),
(867, 79, 4),
(868, 79, 7),
(869, 79, 9),
(870, 79, 8),
(871, 79, 10),
(872, 79, 12),
(873, 79, 15),
(874, 79, 19),
(875, 79, 28),
(876, 79, 33),
(877, 79, 35),
(878, 79, 36),
(879, 79, 37),
(880, 79, 39),
(881, 79, 40),
(882, 79, 41),
(883, 79, 44),
(884, 79, 47),
(885, 80, 4),
(886, 80, 7),
(887, 80, 8),
(888, 80, 9),
(889, 80, 10),
(890, 80, 12),
(891, 80, 15),
(892, 80, 19),
(893, 80, 28),
(894, 80, 33),
(895, 80, 35),
(896, 80, 36),
(897, 80, 37),
(898, 80, 39),
(899, 80, 40),
(900, 80, 41),
(901, 80, 44),
(902, 80, 47),
(903, 81, 4),
(904, 81, 7),
(905, 81, 8),
(906, 81, 9),
(907, 81, 10),
(908, 81, 12),
(909, 81, 15),
(910, 81, 19),
(911, 81, 28),
(912, 81, 33),
(913, 81, 35),
(914, 81, 36),
(915, 81, 37),
(916, 81, 39),
(917, 81, 40),
(918, 81, 41),
(919, 81, 44),
(920, 81, 47),
(921, 50, 49),
(922, 3, 7),
(923, 3, 8),
(924, 3, 9),
(925, 3, 10),
(926, 3, 11),
(927, 3, 12),
(928, 3, 13),
(929, 3, 14),
(930, 3, 15),
(931, 3, 16),
(932, 3, 17),
(933, 3, 18),
(934, 3, 19),
(935, 3, 20),
(936, 3, 21),
(937, 3, 22),
(938, 3, 23),
(939, 3, 24),
(940, 3, 26),
(941, 3, 25),
(942, 3, 27),
(943, 3, 28),
(944, 3, 29),
(945, 3, 49),
(946, 3, 48),
(947, 3, 47),
(948, 3, 46),
(949, 3, 45),
(950, 3, 44),
(951, 3, 43),
(952, 3, 42),
(953, 3, 30),
(954, 3, 41),
(955, 3, 40),
(956, 3, 39),
(957, 3, 38),
(958, 3, 37),
(959, 3, 36),
(960, 3, 35),
(961, 3, 34),
(962, 3, 33),
(963, 3, 32),
(964, 3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
`id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL
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
`id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Pimpinan'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(18, 7, 'Hapus Penilaian', 'kuisioner/hapus', '', 3, 1),
(19, 1, 'Web Setting', 'admin/websetting', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
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
-- Table structure for table `web_setting`
--

DROP TABLE IF EXISTS `web_setting`;
CREATE TABLE IF NOT EXISTS `web_setting` (
`id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `web_setting`
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
-- Indexes for table `bank_penilaian`
--
ALTER TABLE `bank_penilaian`
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
-- Indexes for table `user_access_user`
--
ALTER TABLE `user_access_user`
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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bank_penilaian`
--
ALTER TABLE `bank_penilaian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `user_access_kategori`
--
ALTER TABLE `user_access_kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `user_access_user`
--
ALTER TABLE `user_access_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=965;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
