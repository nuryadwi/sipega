-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sipega
CREATE DATABASE IF NOT EXISTS `db_sipega` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sipega`;

-- Dumping structure for table db_sipega.tb_departemen
CREATE TABLE IF NOT EXISTS `tb_departemen` (
  `id_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `departemen_name` varchar(100) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_departemen: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_departemen` DISABLE KEYS */;
INSERT INTO `tb_departemen` (`id_departemen`, `departemen_name`, `create_at`, `update_at`) VALUES
	(1, 'Pemerintahan', '2020-05-20 00:00:00', '2020-05-30 13:36:00'),
	(2, 'penilai', '2020-09-04 17:21:44', '2020-09-04 17:21:38'),
	(3, 'admin', '2020-09-04 17:22:17', '2020-09-04 17:22:20'),
	(9, 'Kesejahteraan', '2020-05-31 02:08:54', '2020-08-16 14:17:58'),
	(10, 'Pelayanan', '2020-05-31 02:09:01', '2020-08-16 14:18:00'),
	(11, 'Keuangan', '2020-05-31 02:14:03', '2020-08-16 14:18:02'),
	(12, 'Tata Usaha dan Umum', '2020-05-31 02:14:42', '2020-08-16 14:18:04'),
	(14, 'Perencanaan', '2020-05-31 02:18:27', '2020-08-16 14:18:06');
/*!40000 ALTER TABLE `tb_departemen` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_jabatan
CREATE TABLE IF NOT EXISTS `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_name` varchar(50) NOT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`),
  KEY `id_departemen` (`id_departemen`),
  CONSTRAINT `tb_jabatan_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `tb_departemen` (`id_departemen`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_jabatan: ~12 rows (approximately)
/*!40000 ALTER TABLE `tb_jabatan` DISABLE KEYS */;
INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan_name`, `id_departemen`, `create_at`, `update_at`) VALUES
	(1, 'Staff', 2, '2020-09-04 17:22:46', '2020-09-04 17:22:48'),
	(2, 'Staff', 3, '2020-09-04 17:23:21', '2020-09-04 17:23:23'),
	(5, 'Staff', 14, '2020-05-31 02:41:28', '2020-08-16 14:19:03'),
	(6, 'Staff', 12, '2020-05-31 02:41:38', '2020-08-16 14:19:05'),
	(7, 'Staff', 11, '2020-05-31 02:41:44', '2020-08-16 14:19:08'),
	(8, 'Staff', 10, '2020-05-31 02:41:51', '2020-08-16 14:19:06'),
	(9, 'Staff', 9, '2020-05-31 02:41:59', '2020-08-16 14:19:10'),
	(10, 'Staff', 1, '2020-05-31 02:42:04', '2020-08-16 14:19:12'),
	(11, 'Ka. Sie', 14, '2020-05-31 02:42:21', '2020-08-16 14:19:14'),
	(12, 'Ka. Sie', 12, '2020-05-31 02:42:25', '2020-08-16 14:19:24'),
	(13, 'Ka. Sie', 11, '2020-05-31 02:42:31', '2020-08-16 14:19:26'),
	(14, 'Ka. Sie', 10, '2020-05-31 02:42:33', '2020-08-16 14:19:28'),
	(15, 'Ka. Sie', 9, '2020-05-31 02:42:36', '2020-08-16 14:19:30'),
	(16, 'Ka. Sie', 1, '2020-05-31 02:42:39', '2020-08-16 14:19:32');
/*!40000 ALTER TABLE `tb_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_konfigurasi
CREATE TABLE IF NOT EXISTS `tb_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT,
  `name_app` varchar(200) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `metatext` varchar(200) DEFAULT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `pimpinan` varchar(200) DEFAULT NULL,
  `sekretaris` varchar(200) DEFAULT NULL,
  `about` text,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_sipega.tb_konfigurasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_konfigurasi` DISABLE KEYS */;
INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `name_app`, `logo`, `phone`, `alamat`, `email`, `keywords`, `metatext`, `instansi`, `pimpinan`, `sekretaris`, `about`, `update_at`) VALUES
	(1, 'SIPEGA', 'logo-instansi.png', '0811-2651-333', 'Plebengan, Sidomulyo, Bambanglipuro, Bantul', 'desa.sidomulyo@bantulkab.go.id', NULL, NULL, 'KANTOR KELURAHAN DESA SIDOMULYO', 'LURAH', 'SEKRETARIS', 'Sistem Pendukung Keputusan Penerima Tunjangan                                                                                                                                                                                                                                                                                                                                                                                                                                          ', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_konfigurasi` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_menu: ~19 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`menu_id`, `title`, `url`, `icon`, `is_main_menu`, `is_active`, `create_at`) VALUES
	(1, 'dashboard', 'dashboard', NULL, 0, 0, '2020-07-29 15:34:30'),
	(2, 'Kelola Pengguna', '', 'ti-user', 0, 1, '2020-05-27 20:30:00'),
	(3, 'Level Pengguna', 'userlevel', '', 2, 1, '2020-05-29 16:28:15'),
	(4, 'Pengguna', 'users', '', 2, 1, '2020-05-29 16:30:45'),
	(5, 'Kelola Menu', 'menu', 'ti-menu-alt', 0, 1, '2020-05-29 19:57:44'),
	(6, 'Master Data', '', 'ti-wallet', 0, 1, '2020-05-30 09:27:04'),
	(7, 'Data Jabatan', 'jabatan', '', 6, 1, '2020-05-30 09:31:01'),
	(8, 'Departemen', 'departemen', '', 6, 1, '2020-05-30 10:32:40'),
	(9, 'Profil', 'profile', '', 0, 0, '2020-05-31 07:26:05'),
	(10, 'Settings', 'settings', '', 0, 0, '2020-06-01 17:36:41'),
	(11, 'Data Master', '', 'ti-harddrives', 0, 0, '2020-06-03 07:49:20'),
	(12, 'Data Pegawai', 'pegawai', '', 11, 1, '2020-06-03 07:57:45'),
	(13, 'SKP', 'skp', 'ti-layout', 0, 1, '2020-06-03 09:15:49'),
	(15, 'Tugas Masuk', '', 'ti-import', 0, 1, '2020-06-18 12:59:27'),
	(16, 'Kelola SKP', 'kelola_skp', 'ti-agenda', 0, 1, '2020-06-19 11:46:26'),
	(17, 'Tugas Jabatan', 'tugasmasuk_jabatan', '', 15, 1, '2020-06-23 13:08:11'),
	(18, 'Tugas Tambahan', 'tugasmasuk_tambahan', '', 15, 1, '2020-06-23 13:08:43'),
	(22, 'Input Tugas', 'input_tugas', 'ti-write', 0, 1, '2020-06-26 11:05:27'),
	(23, 'download file tugas skp', 'download_file_tugas_skp', '', 0, 0, '2020-07-28 06:28:54'),
	(24, 'Kelola Capaian Kerja', 'capaian_kerja', 'ti-bar-chart-alt', 0, 0, '2020-07-28 16:45:58'),
	(25, 'Penilaian Perilaku', 'nilai_perilaku', 'ti-agenda', 0, 1, '2020-08-05 15:15:41'),
	(26, 'Capaian Kerja', 'capaian_kerja', 'ti-stats-up', 0, 1, '2020-08-09 20:31:02'),
	(27, 'Nilai Prestasi Pegawai', 'nilai_prestasi', 'ti-medall', 0, 1, '2020-08-11 06:17:37'),
	(28, 'Capaian Kinerja Pegawai', 'pegawai_capaian', 'ti-bar-chart-alt', 0, 1, '2020-08-11 10:35:09'),
	(29, 'Prestasi Pegawai', 'pegawai_prestasi', 'ti-medall', 0, 1, '2020-08-11 10:37:42'),
	(30, 'Setting Periode', 'periode', 'ti-calendar', 0, 1, '2020-09-01 00:44:11');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_nilai_capaian
CREATE TABLE IF NOT EXISTS `tb_nilai_capaian` (
  `id_nilai_capaian` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nilai_skp` float DEFAULT NULL,
  `nilai_tugas_tambahan` float DEFAULT NULL,
  `nilai_capaian_kerja` float DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_capaian`),
  KEY `user_id` (`user_id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_nilai_capaian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  CONSTRAINT `tb_nilai_capaian_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_nilai_capaian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai_capaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_capaian` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_nilai_perilaku
CREATE TABLE IF NOT EXISTS `tb_nilai_perilaku` (
  `id_nilai_perilaku` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pelayanan` float NOT NULL,
  `integritas` float NOT NULL,
  `komitmen` float NOT NULL,
  `disiplin` float NOT NULL,
  `kerjasama` float NOT NULL,
  `kepemimpinan` float DEFAULT '0',
  `jumlah` float NOT NULL,
  `nilai_perilaku` float NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  PRIMARY KEY (`id_nilai_perilaku`),
  KEY `user_id` (`user_id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_nilai_perilaku_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  CONSTRAINT `tb_nilai_perilaku_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_nilai_perilaku: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai_perilaku` DISABLE KEYS */;
INSERT INTO `tb_nilai_perilaku` (`id_nilai_perilaku`, `user_id`, `pelayanan`, `integritas`, `komitmen`, `disiplin`, `kerjasama`, `kepemimpinan`, `jumlah`, `nilai_perilaku`, `id_tahun`, `create_at`) VALUES
	(2, 3, 99, 88, 90, 89, 80, 0, 446, 89.2, 1, '2020-09-03');
/*!40000 ALTER TABLE `tb_nilai_perilaku` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_nilai_prestasi
CREATE TABLE IF NOT EXISTS `tb_nilai_prestasi` (
  `id_nilai_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nilai_capaian` float DEFAULT NULL,
  `nilai_perilaku` float DEFAULT NULL,
  `nilai_prestasi_kerja` float DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_prestasi`),
  KEY `user_id` (`user_id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_nilai_prestasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  CONSTRAINT `tb_nilai_prestasi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_nilai_prestasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_nilai_prestasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_prestasi` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_roles
CREATE TABLE IF NOT EXISTS `tb_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_roles` DISABLE KEYS */;
INSERT INTO `tb_roles` (`role_id`, `role_name`, `description`, `create_at`, `update_at`) VALUES
	(1, 'Administrator', 'administrator', '2020-05-30 12:30:00', '2020-05-30 12:30:00'),
	(2, 'Penilai', 'Pejabat Penilai', '2020-05-30 12:40:00', '2020-09-03 17:06:26'),
	(3, 'Pegawai', 'Pegawai', '2020-05-30 12:49:00', '2020-05-30 12:50:00');
/*!40000 ALTER TABLE `tb_roles` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_role_permission
CREATE TABLE IF NOT EXISTS `tb_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `tb_role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_roles` (`role_id`),
  CONSTRAINT `tb_role_permission_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `tb_menu` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_role_permission: ~35 rows (approximately)
/*!40000 ALTER TABLE `tb_role_permission` DISABLE KEYS */;
INSERT INTO `tb_role_permission` (`id`, `role_id`, `menu_id`) VALUES
	(2, 1, 2),
	(4, 1, 3),
	(5, 1, 4),
	(14, 1, 5),
	(21, 1, 6),
	(22, 1, 7),
	(24, 1, 9),
	(25, 1, 8),
	(26, 1, 10),
	(30, 2, 9),
	(31, 2, 10),
	(37, 2, 11),
	(39, 3, 9),
	(43, 3, 13),
	(46, 2, 4),
	(47, 2, 16),
	(48, 2, 15),
	(58, 3, 22),
	(59, 2, 18),
	(60, 2, 17),
	(61, 2, 23),
	(62, 2, 24),
	(63, 2, 1),
	(64, 2, 25),
	(65, 2, 26),
	(66, 2, 27),
	(67, 3, 28),
	(68, 3, 29),
	(69, 1, 1),
	(70, 3, 1),
	(71, 2, 2);
/*!40000 ALTER TABLE `tb_role_permission` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_setting` DISABLE KEYS */;
INSERT INTO `tb_setting` (`setting_id`, `setting_name`, `value`) VALUES
	(1, 'Tampil Menu', 1);
/*!40000 ALTER TABLE `tb_setting` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_skp
CREATE TABLE IF NOT EXISTS `tb_skp` (
  `skp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kegiatan` text,
  `kuantitas` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kualitas` int(3) NOT NULL DEFAULT '0',
  `waktu` int(5) DEFAULT '0',
  `biaya` float NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `realisasi` int(11) DEFAULT '0',
  `total_hitung` float DEFAULT NULL,
  `nilai_capaian_skp` float DEFAULT '0',
  `kualitas_re` int(5) NOT NULL DEFAULT '0',
  `waktu_re` int(5) NOT NULL DEFAULT '0',
  `id_tahun` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`skp_id`),
  KEY `user_id` (`user_id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_skp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  CONSTRAINT `tb_skp_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_sipega.tb_skp: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_skp` DISABLE KEYS */;
INSERT INTO `tb_skp` (`skp_id`, `user_id`, `kegiatan`, `kuantitas`, `satuan`, `kualitas`, `waktu`, `biaya`, `tanggal`, `status`, `realisasi`, `total_hitung`, `nilai_capaian_skp`, `kualitas_re`, `waktu_re`, `id_tahun`, `create_at`) VALUES
	(11, 3, 'menyiapkan laporan', '1', 'laporan', 100, 12, 0, '2020-09-01', 0, 1, 266, 88.6667, 90, 12, 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_skp` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_skp_realisasi
CREATE TABLE IF NOT EXISTS `tb_skp_realisasi` (
  `id_skp_realisasi` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skp_id` int(11) NOT NULL,
  `output` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_skp_realisasi`),
  KEY `skp_id` (`skp_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_skp_realisasi_ibfk_1` FOREIGN KEY (`skp_id`) REFERENCES `tb_skp` (`skp_id`),
  CONSTRAINT `tb_skp_realisasi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_skp_realisasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_skp_realisasi` DISABLE KEYS */;
INSERT INTO `tb_skp_realisasi` (`id_skp_realisasi`, `user_id`, `skp_id`, `output`, `tanggal`, `file`, `waktu_mulai`, `waktu_selesai`, `create_at`) VALUES
	(1, 3, 11, 1, '2020-09-02', 'no-file', '07:28:00', '09:28:00', '2020-09-01 07:28:54');
/*!40000 ALTER TABLE `tb_skp_realisasi` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_tahun
CREATE TABLE IF NOT EXISTS `tb_tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` char(5) NOT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_tahun: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_tahun` DISABLE KEYS */;
INSERT INTO `tb_tahun` (`id_tahun`, `tahun`, `periode_start`, `periode_end`) VALUES
	(1, '2020', '2020-01-10', '2020-12-10'),
	(2, '2021', '2021-01-10', '2021-12-10');
/*!40000 ALTER TABLE `tb_tahun` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_tugas_tambahan_staff
CREATE TABLE IF NOT EXISTS `tb_tugas_tambahan_staff` (
  `id_tambahan` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kegiatan` varchar(250) DEFAULT NULL,
  `keterangan` text,
  `pemberi_tugas` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `output` int(11) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tambahan`),
  KEY `user_id` (`user_id`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_tugas_tambahan_staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  CONSTRAINT `tb_tugas_tambahan_staff_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_tugas_tambahan_staff: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tugas_tambahan_staff` DISABLE KEYS */;
INSERT INTO `tb_tugas_tambahan_staff` (`id_tambahan`, `user_id`, `tanggal`, `kegiatan`, `keterangan`, `pemberi_tugas`, `file`, `waktu_mulai`, `waktu_selesai`, `output`, `satuan`, `create_at`, `id_tahun`) VALUES
	(1, 3, '2020-09-02', 'Kunjungan kerja ke pemda', NULL, 'Lurah', 'no-file', '09:34:00', '12:35:00', 1, 'kegiatan', '2020-09-01 07:30:55', 1);
/*!40000 ALTER TABLE `tb_tugas_tambahan_staff` ENABLE KEYS */;

-- Dumping structure for table db_sipega.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `display_name` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `born_date` date NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `gender` enum('L','P') DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_roles` (`role_id`),
  CONSTRAINT `tb_users_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sipega.tb_users: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`user_id`, `role_id`, `email`, `password`, `nip`, `nik`, `last_login`, `create_at`, `update_at`, `banned`, `display_name`, `active`, `phone`, `full_name`, `born_date`, `images`, `id_jabatan`, `deleted`, `gender`, `address`) VALUES
	(1, 1, 'admin@admin.com', '$2y$04$bs8yZWigc.fKFBm1sXwJWO2Y1JOhwBtDttXWpzRl67ZpeTc3cbMXS', '1300016056', '34083912839121', '2020-09-04 01:11:29', '2020-05-06 18:02:21', '2020-05-09 10:00:56', 0, 'admin', 1, '085727651561', 'admin admininstrator', '2020-05-04', 'profile_admin.jpg', 2, 0, 'L', 'Bantul, Yogyakarta'),
	(2, 2, 'penilai@simpeg.com', '$2y$04$aZ8ewfpDTKzZFegB.JybSeWcCsFfbj3qALJRkZgnS1x.bPiOZcSe6', '1300016058', '12345678', '2020-09-04 01:31:41', '2020-05-09 09:42:48', '2020-06-01 07:14:18', 0, 'Penilai', 1, '087665566111', 'Penilai', '1975-05-07', 'profile_operator.png', 1, 0, 'L', 'Jogjakarta'),
	(3, 3, 'files.yadi@gmail.com', '$2y$04$2eN006i0mmXEkPnPtnMlJ..j7ONma.XpMPITUYdyD6oGHji.Op3XS', '1300016058', '232123123', '2020-09-04 01:25:37', '2020-06-03 08:00:35', '2020-08-16 14:23:35', 0, 'Dwi', 1, '08766556655', 'Dwi Nurhadi', '1996-06-03', 'profile_dwi.jpg', 10, 0, 'L', '<p>Jl. Samas km 5</p>'),
	(4, 3, 'sujiman@gmail.com', '$2y$04$ef8s9S3cVHaJ2yZYcfff2einJjC1sNF4hTD6ri06fgYQLZgJPuSoK', '1300016054', NULL, NULL, '2020-07-29 15:33:06', '2020-07-29 15:35:42', 0, 'sujiman', 1, NULL, 'sujiman', '2020-07-29', 'user.png', 6, 1, NULL, NULL),
	(5, 3, 'test@gmail.com', '$2y$04$9yuuqEtf/teaKbphxR1Rp.R5pTxYILiJuQv4TRnXeoIhG9aI0yAUu', '12345678', NULL, NULL, '2020-08-22 04:15:07', NULL, 1, 'Test', 1, NULL, 'Test test', '1995-08-22', 'user.png', 6, 0, NULL, NULL);
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
