-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table db_pendaftaran.berkas: ~9 rows (approximately)
INSERT INTO `berkas` (`id_berkas`, `id_user`, `id_pendaftaran`, `ijazah`, `kk`, `ktp`, `pas_foto`, `created_at`, `updated_at`) VALUES
	(6, 11, 12, 'berkas/_11_20250613_132020/ijazah/NyQwoRxWK2rZQJcN0OFLb72SMpnFqif5uVTmTsDv.pdf', 'berkas/_11_20250613_132020/kk/dByfCRWxFZHZbu8WUC515zvuNEL54lSITUBKEuWn.pdf', 'berkas/_11_20250613_132020/ktp/cbu4fGnAi8n6G5lC9jOtapSWkgemYHqWLO1dRuBi.pdf', 'berkas/_11_20250613_132020/pas_foto/2pYaPcq0DXyG6DYu0PN2053QRBCYQ5uXcwOb8lyj.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(7, 8, 9, 'berkas/_8_20250613_140605/ijazah/JDi5MY3bo8Sn5qWZT3ud7GbFGePprXmwP7cPgqqL.pdf', 'berkas/_8_20250613_140605/kk/OeU2dJNw00cZJIc9nrZIMPnfc6lY7UO2Lvn8du2B.pdf', 'berkas/_8_20250613_140605/ktp/p0DXOXrqPXVTCoiKi5UPXiIp2xaYXPPVsMfsQkfo.pdf', 'berkas/_8_20250613_140605/pas_foto/hRJOtKBNlM6IHLE1QlDvuTMX0D79G3pf7jtkXViy.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(8, 6, 7, 'berkas/_6_20250613_145736/ijazah/Z91ZNoVPjg6I16IMpRIatOitVzFAhXxPrRk0iul0.pdf', 'berkas/_6_20250613_145736/kk/4j8DWCihbWJWTHBr6LcgIiGIf5F0LFnCQkDXfpYE.pdf', 'berkas/_6_20250613_145736/ktp/TihI4AaaIsm7D6KI6g0iMFKuhybGgIzaFnHbaQla.pdf', 'berkas/_6_20250613_145736/pas_foto/FESe73CT35r2lYWewIUs6LJuSxeldPcTLuem1ltz.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(9, 7, 8, 'berkas/_7_20250613_145939/ijazah/lvxuSwOxSJ3NPgljziHkRP6XlwMFUX19Z9DRmsnc.pdf', 'berkas/_7_20250613_145939/kk/zgAuG08vQI2mbAUXnNqyPBDAH4Jnyn22gp1HtIj5.pdf', 'berkas/_7_20250613_145939/ktp/6doobBg6eH7WcBoDVan5muBiKu2XUSBiRAHezKvJ.pdf', 'berkas/_7_20250613_145939/pas_foto/RCkBQF56OuJq2lMOCw1gTHUreF46ky0ShjGY1lNk.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(10, 9, 10, 'berkas/_9_20250613_150424/ijazah/ZEvE065CEhA14uyPqfEsqTr5ZxiiM67LEmHnj8ie.pdf', 'berkas/_9_20250613_150424/kk/mRpJsjuhP77TncijRJHSHOWgZER9BsudakhZiCx0.pdf', 'berkas/_9_20250613_150424/ktp/XBA63r1PyidJ2oaceBh837rrq9j9k98hMTqDG8kv.pdf', 'berkas/_9_20250613_150424/pas_foto/1jctgHTesh56khLEdpecOO5dUt9i7lly8YMCHWFl.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(11, 10, 11, 'berkas/_10_20250613_150615/ijazah/SyqbJellj39Img8wfGu7Pwf6VTxC9xd712OfwvqQ.pdf', 'berkas/_10_20250613_150615/kk/T4aHsxiDbhpTf8LoV257snamY9OTfHNFtWyK1hsq.pdf', 'berkas/_10_20250613_150615/ktp/yesZWj1gYl8nhd4Z8ewfXl3ddeNDR6TuQsdcyAfV.pdf', 'berkas/_10_20250613_150615/pas_foto/ecmerClFAoNGDcftKcVZEhjcBTAorsYi23icVKqC.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(12, 12, 13, 'berkas/_12_20250613_150803/ijazah/CyGgSiGr50VFCetAu4qkCjDU0cCxcFSxcXyCrTre.pdf', 'berkas/_12_20250613_150803/kk/CsoWup1q1NawXNEYOwPhe9hM8ZptKWJ5TX9rHP2m.pdf', 'berkas/_12_20250613_150803/ktp/lL9uVpdcpVotZGc8qphBukUtHe1RvYGFNbRFAqf3.pdf', 'berkas/_12_20250613_150803/pas_foto/eXBjpWOQtFBPHYsdM0XjXoQWXfYS5Uco39cMTe8u.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(13, 13, 14, 'berkas/_13_20250613_150944/ijazah/okqeqkwc1F5pX0xGXAZxPLSenickFpTp7DNMdSFl.pdf', 'berkas/_13_20250613_150944/kk/FGwwYlYuVmzCmsjZdwHZMbUI7pZvrFA6KqMpxXT1.pdf', 'berkas/_13_20250613_150944/ktp/j6OPIuLjIJFfBNPBYMqeRJbOvmfu9GwdQaMQfH1g.pdf', 'berkas/_13_20250613_150944/pas_foto/sICd8rpmbld3z5RDeNCIj0OrdJKE1itBMJ3x0it8.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14'),
	(14, 14, 15, 'berkas/_14_20250613_151934/ijazah/Y24TdLDx5nu9eGWAuNtGGNtzQBUiyOxgeZhs0bAA.pdf', 'berkas/_14_20250613_151934/kk/q6ROdD6SfxGrLINS6GSEp0H7bjLOj8dkY4EjupzN.pdf', 'berkas/_14_20250613_151934/ktp/iGuQX1v3hXfMkLT2COTn8f8qEQkaKge5JMZAQZ9T.pdf', 'berkas/_14_20250613_151934/pas_foto/GrE2sCJAosOmZhbWVvhvSB7JHje7NOlKPtBNDHfY.jpg', '2025-06-14 13:24:14', '2025-06-14 13:24:14');

-- Dumping data for table db_pendaftaran.failed_jobs: ~0 rows (approximately)

-- Dumping data for table db_pendaftaran.laporan: ~1 rows (approximately)
INSERT INTO `laporan` (`id_laporan`, `periode`, `jumlah_peserta`, `omset`, `created_at`, `updated_at`) VALUES
	(7, '2025-06', 10, 23600000, '2025-06-14 06:26:58', '2025-06-14 06:26:58');

-- Dumping data for table db_pendaftaran.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_03_04_163818_create_admins_table', 1),
	(6, '2025_03_04_222540_add_role_to_users_table', 2),
	(7, '2025_05_03_115034_add_timestamps_to_peserta_table', 3),
	(8, '2025_05_03_115034_ModifyTimestampsInPesertaTable', 4);

-- Dumping data for table db_pendaftaran.paket: ~14 rows (approximately)
INSERT INTO `paket` (`id_paket`, `nama_paket`, `jurusan`, `biaya`, `informasi_program`, `materi`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
	(1, '6 Bulan', 'Administrasi Bisnis', 4800000, 'Kursus selama 5 bulan, magang 1 bulan\nSenin s.d Jumat\nJadwal : 08.15 s.d 12.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nDesain Grafis\nDigital Marketing\nAkuntansi Dasar dan Perpajakan\nBahasa Inggris\nKesekretariatan\nMotivasi dan Pengembangan Diri\nUji Kompetensi dan CLCP', 'Mempersiapkan diri di berbagai peran di dunia kerja, baik di bidang manajemen, pemasaran, atau keuangan. Fungsi-fungsi tersebut meliputi pengembangan keterampilan, pemahaman mendalam tentang cara bisnis beroperasi, dan kemampuan menganalisis pola dalam data bisnis.\r\nFokus pada manajemen perkantoran dan pengadministrasian.', 'paket_gambar/2025/05/13/6 ADM BISNIS.jpg', '2025-05-11 21:35:27', '2025-06-05 15:57:49'),
	(2, '6 Bulan', 'Akuntansi dan Perpajakan', 4800000, 'Kursus selama 5 bulan, magang 1 bulan\nSenin s.d Jum\'at\nJadwal 08.00 s.d 12.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nPersamaan Akuntansi\nAkuntansi Keuangan dan Perpajakan\nMotivasi dan Pengembangan Diri\nUji Kompetensi CLCP', 'Mememahami strategi untuk perencanaan perpajakan masa depan yang berasal dari data pembayaran pajak serta menjadi bahan penilaian kinerja perusahaan selama periode sebelumnya.\r\nBijak mengevaluasi efisiensi perpajakan dari strategi bisnis yang diusulkan.', 'paket_gambar\\2025\\05\\13\\6 AKUNTANSI.jpg', '2025-05-12 18:43:38', '2025-06-05 15:46:55'),
	(3, '6 Bulan', 'Web Programming', 7150000, 'Kursus selama 5 bulan, magang 1 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 12.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nWeb Programming Dasar (Pengantar HTML, CSS, Bootstrap)\nWeb Programming Lanjutan (PHP, MySQL)\nMotivasi dan Pengembangan Diri\nUji Kompentensi CLCP', 'Terampil di bidang IT yang dibutuhkan Industri, e-commerce maupun digital. Terampil membangun website atau aplikasi sesuai dengan kebutuhan.\r\nweb programming bisa membuka kesempatan karir di berbagai industri dan memungkinkan untuk bekerja secara fleksibel, baik dari rumah maupun secara freelance.', 'paket_gambar\\2025\\05\\13\\6 WEB PROGRAMMING.jpg', '2025-05-25 23:39:20', '2025-06-05 15:53:06'),
	(4, '6 Bulan', 'Teknik Sipil', 7150000, 'Kursus selama 5 bulan, magang 1 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 12.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nAutoCAD\nSketchup\nRAB\nDesain Interior\nMotivasi dan Pengembangan Diri\nUji Kompentensi CLCP', 'Terampil merancang, mendokumentasikan, dan menganalisis desain konstruksi dengan lebih efisien dan presisi. Membantu meningkatkan kualitas gambar teknik, mempersingkat waktu pengerjaan, dan meningkatkan komunikasi antar tim.\r\nMemodelkan struktur rancangan 2D dan 3D', 'paket_gambar\\2025\\05\\13\\6 TEKNIK SIPIL.jpg', '2025-05-26 00:13:53', '2025-06-07 13:21:04'),
	(5, '3 Bulan', 'APDIG (Aplikasi Perkantoran + Desain Grafis + Digital Marketing)', 3500000, 'Kursus selama 3 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 12.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nDesain Grafis\nDigital Marketing\nMotivasi dan Pengembangan Diri', 'Fokus pada skill yang digunakan di perkantoran, mengasah seni desain dan keterampilan pemasaran secara digital', 'paket_gambar\\2025\\05\\13\\3 APDIG.jpg', '2025-05-26 00:15:12', '2025-06-05 15:44:53'),
	(6, '3 Bulan', 'APDING (Aplikasi Perkantoran + Digital Marketing + Bahasa Inggris)', 3500000, 'Kursus selama 3 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 16.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nDigital Marketing\nBahasa Inggris\nMotivasi dan Pengembangan Diri', 'Terampil dalam skill perkantoran dan fasih berbahasa inggris. Melakukan pemasaran secara digital dan akurat.', 'paket_gambar\\2025\\05\\13\\3 APDING.jpg', '2025-05-26 00:16:07', '2025-06-05 15:44:56'),
	(7, '3 Bulan', 'APDENG (Aplikasi Perkantoran + Desain Grafis + Bahasa Inggris)', 3500000, 'Kursus selama 3 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 16.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nDesain Grafis\nBahasa Inggris\nMotivasi dan Pengembangan Diri', 'Terampil di bidang perkantoran dan bahasa inggris. serta mengasah seni yang berteknologi', 'paket_gambar\\2025\\05\\13\\3 APDENG.jpg', '2025-05-26 00:17:09', '2025-06-05 15:44:16'),
	(8, '3 Bulan', 'APSI (Aplikasi Perkantoran + Akuntansi dan Perpajakan)', 3500000, 'Kursus selama 3 bulan\nSenin s.d Jum\'at\nJadwal : 08.00 s.d 16.00\nBersertifikat', 'Computer Administrasi\nSpeed Typing\nAkuntansi Perpajakan\nMotivasi dan Pengembangan Diri', 'Terfokus pada perkantoran yang dapat menganlisis perpajakan dan perhitungan pada bisnis perusahaan', 'paket_gambar\\2025\\05\\13\\3 APSI.jpg', '2025-05-26 00:18:18', '2025-06-05 15:46:14'),
	(9, 'Reguler', 'Administrasi Perkantoran', 1400000, '16x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Jumat\nJadwal Fleksibel : 08.15, 10.00 dan 14.00\nBersertifikat', 'Microsoft Office Word\nMicrosoft Office Excel\nMicrosoft Office Power Point', 'Mahir dalam bidang Perkantoran pembuatan surat, menguasai rumus excel, kreasi persentase menarik', 'paket_gambar\\2025\\05\\13\\course-1.jpg', '2025-05-26 00:18:44', '2025-06-05 15:58:01'),
	(10, 'Reguler', 'Desain Grafis', 2100000, '14x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Jumat\nJadwal Fleksibel : 08.15, 10.00 dan 14.00\nBersertifikat', 'Corel Draw\nPhotoshop', 'Desain menggunakan CorelDraw fokus dibidang percetakan dan platfom sosial media.', 'paket_gambar\\2025\\05\\13\\course-2.jpg', '2025-05-26 00:19:14', '2025-06-05 15:58:15'),
	(11, 'Reguler', 'AutoCAD', 2100000, '16x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Sabtu\nJadwal Fleksibel : 08.15, 10.00, 14.00, 16.00, dan 19.00\nBersertifikat', 'Aplikasi CAD\nDesain 2 dan 3 Dimensi', 'Fokus dalam teknik pembuatan gambar desain bangunan, mesin, peta, elektro, utilitas, dan instalasi', 'paket_gambar\\2025\\05\\13\\course-3.jpg', '2025-05-26 00:21:06', '2025-06-05 15:58:34'),
	(12, 'Reguler', 'Web Programming', 2800000, '24x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Sabtu\nJadwal Fleksibel : 08.15, 10.00 dan 14.00\nBersertifikat', 'HTML\nCSS\nBootstrap\nPHP\nFramework', 'Bertujuan pembuatan website, aplikasi berbasis web', 'paket_gambar\\2025\\05\\13\\course-4.jpg', '2025-05-26 00:21:35', '2025-06-05 15:58:51'),
	(13, 'Reguler', 'Video Editing', 2100000, '14x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Jumat\nJadwal Fleksibel : 08.15, 10.00 dan 14.00\nBersertifikat', 'Adobe Premier\nColor Tone\nPengambilan video', 'Mahir dalam pembuatan Content, manipulasi, vlog youtube, blender, color tone', 'paket_gambar\\2025\\05\\13\\course-5.jpg', '2025-05-26 00:22:09', '2025-06-05 15:58:58'),
	(14, 'Reguler', 'Digital Marketing', 1400000, '14x Pertemuan (1x pertemuan 2 jam)\nSenin s.d Jumat\nJadwal Fleksibel : 08.15, 10.00 dan 14.00\nBersertifikat', 'CEO\nBranding\nPemasaran Digital', 'Fokus marketing melalui digital, pencarian ceo dengan teknologi masa kini', 'paket_gambar\\2025\\05\\13\\course-6.jpg', '2025-05-26 00:22:34', '2025-06-05 15:59:51');

-- Dumping data for table db_pendaftaran.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table db_pendaftaran.pembayaran: ~16 rows (approximately)
INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `metode_bayar`, `jumlah_bayar`, `bukti_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(8, 12, 'Transfer', 1050000.00, NULL, 'Lunas', '2025-06-12 23:20:56', '2025-06-13 01:37:51'),
	(9, 12, 'Tunai', 1050000.00, NULL, 'Lunas', '2025-06-12 23:23:07', '2025-06-13 01:38:07'),
	(10, 9, 'Tunai', 2000000.00, NULL, 'Lunas', '2025-06-12 23:52:50', '2025-06-13 01:36:58'),
	(11, 7, 'Transfer', 2900000.00, NULL, 'Lunas', '2025-06-13 00:57:58', '2025-06-13 01:36:44'),
	(12, 8, 'Transfer', 2000000.00, NULL, 'Lunas', '2025-06-13 01:01:11', '2025-06-13 01:36:31'),
	(13, 10, 'Transfer', 2000000.00, NULL, 'Lunas', '2025-06-13 01:05:20', '2025-06-13 01:36:04'),
	(14, 11, 'Tunai', 700000.00, NULL, 'Lunas', '2025-06-13 01:06:40', '2025-06-13 01:35:08'),
	(15, 13, 'Tunai', 1400000.00, NULL, 'Lunas', '2025-06-13 01:08:19', '2025-06-13 01:34:43'),
	(16, 13, 'Tunai', 1400000.00, NULL, 'Lunas', '2025-06-13 01:08:45', '2025-06-13 01:34:56'),
	(17, 14, 'Transfer', 1800000.00, NULL, 'Lunas', '2025-06-13 01:10:03', '2025-06-13 01:34:08'),
	(18, 14, 'Tunai', 600000.00, NULL, 'Lunas', '2025-06-13 01:10:22', '2025-06-13 01:34:21'),
	(19, 16, 'Transfer', 1050000.00, NULL, 'Lunas', '2025-06-13 01:21:18', '2025-06-13 01:30:03'),
	(20, 15, 'Tunai', 2900000.00, NULL, 'Lunas', '2025-06-13 01:21:47', '2025-06-13 01:25:12'),
	(21, 16, 'Tunai', 1050000.00, NULL, 'Lunas', '2025-06-13 01:22:08', '2025-06-13 01:33:55'),
	(22, 15, 'Transfer', 850000.00, NULL, 'Lunas', '2025-06-13 01:23:03', '2025-06-13 01:25:27'),
	(23, 15, 'Transfer', 850000.00, NULL, 'Lunas', '2025-06-13 01:24:08', '2025-06-13 01:25:49');

-- Dumping data for table db_pendaftaran.pendaftaran: ~12 rows (approximately)
INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_peserta`, `id_paket`, `status`, `created_at`, `updated_at`) VALUES
	(7, 8, 5, 'sukses', '2025-06-12 00:21:26', '2025-06-12 00:21:26'),
	(8, 9, 9, 'menunggu', '2025-06-12 00:42:43', '2025-06-12 00:42:43'),
	(9, 10, 8, 'sukses', '2025-06-12 00:45:47', '2025-06-12 00:45:47'),
	(10, 11, 6, 'menunggu', '2025-06-12 00:49:03', '2025-06-12 00:49:03'),
	(11, 12, 10, 'sukses', '2025-06-12 00:52:51', '2025-06-12 00:52:51'),
	(12, 13, 12, 'sukses', '2025-06-12 00:57:11', '2025-06-12 00:57:11'),
	(13, 14, 13, 'sukses', '2025-06-12 01:05:26', '2025-06-12 01:05:26'),
	(14, 15, 1, 'sukses', '2025-06-12 01:11:49', '2025-06-12 01:11:49'),
	(15, 16, 4, 'sukses', '2025-06-12 01:13:35', '2025-06-12 01:13:35'),
	(16, 17, 14, 'sukses', '2025-06-12 01:19:46', '2025-06-12 01:19:46'),
	(17, 18, 13, 'sukses', '2025-06-12 01:22:28', '2025-06-12 01:22:28'),
	(18, 19, 15, 'menunggu', '2025-06-12 01:24:33', '2025-06-12 01:24:33');

-- Dumping data for table db_pendaftaran.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table db_pendaftaran.peserta: ~12 rows (approximately)
INSERT INTO `peserta` (`id_peserta`, `id_user`, `nama_peserta`, `nik_ktp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pendidikan`, `no_wa`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `tempat_tinggal`, `created_at`, `updated_at`) VALUES
	(8, 6, 'Hasrul Muhammad', '1324564567657687', 'Padang', '2003-12-10', 'Laki-laki', 'Islam', 'S1', '089978776656', 'Jl. Lubuk Buaya', 'Koto tangah', 'Koto Tangah', 'Padang', 'Sumatera Barat', 'Kost', '2025-06-12 00:21:26', '2025-06-12 00:21:26'),
	(9, 7, 'Nadia Situmorang', '1234567489504985', 'Kabanjahe', '2007-03-01', 'Perempuan', 'Islam', 'SMA', '089977668876', 'Jl. Batang kabung', 'Batang Kabung', 'Bungus', 'Padang', 'Sumatera Barat', 'Kost', '2025-06-12 00:42:43', '2025-06-12 00:42:43'),
	(10, 8, 'Sarah Faradiba', '1356789876787686', 'Padang', '2001-10-09', 'Perempuan', 'Islam', 'S1-Akuntansi', '085454667765', 'Lubuk Buaya', 'Koto Tangah', 'Lubuk Buaya', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 00:45:47', '2025-06-12 00:45:47'),
	(11, 9, 'Pristy Febrianty', '1234578902347897', 'Pekanbaru', '2003-02-24', 'Perempuan', 'Katholik', 'SMA', '089977665567', 'Jl. Cendrawasih', 'Air Tawar', 'Padang Utara', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 00:49:03', '2025-06-12 00:49:03'),
	(12, 10, 'Putri Aisyah Atria', '1123467832456787', 'Pasaman Barat', '2005-09-09', 'Perempuan', 'Islam', 'SMA', '086677564435', 'Tunggul Hitam', 'Hitam', 'Tunggul', 'Padang', 'Sumatera Barat', 'Kost', '2025-06-12 00:52:51', '2025-06-12 00:52:51'),
	(13, 11, 'Raja Inal Siregar', '1909878909090909', 'Pasaman Barat', '2000-10-15', 'Laki-laki', 'Islam', 'SMK', '086677667766', 'Lubuk Begalung', 'Lubeg', 'Lubeg', 'Padang', 'Sumatera Barat', 'Kost', '2025-06-12 00:57:11', '2025-06-12 00:57:11'),
	(14, 12, 'Indah Khairunisah', '1345278987678965', 'Padang', '1997-08-17', 'Perempuan', 'Islam', 'S1-Sistem Informasi', '089977665533', 'Padang', 'Padang', 'Padang', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:05:26', '2025-06-12 01:05:26'),
	(15, 13, 'Zidan Putra Cahyana', '1455289786909878', 'Palembang', '2005-02-09', 'Laki-laki', 'Islam', 'SMA', '082233445566', 'Seberang Padang', 'Palinggam', 'Padang Selatan', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:11:49', '2025-06-12 01:11:49'),
	(16, 14, 'Susan Paramitha', '1322675453678765', 'Jakarta', '2002-04-15', 'Perempuan', 'Islam', 'S1', '089977664432', 'Padang', 'Padang', 'Padang', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:13:35', '2025-06-12 01:13:35'),
	(17, 14, 'Susan Paramitha', '1322675453678765', 'Jakarta', '2002-04-15', 'Laki-laki', 'Islam', 'S1', '089977664432', 'Padang', 'Padang', 'Padang', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:19:46', '2025-06-12 01:19:46'),
	(18, 11, 'Raja Inal Siregar', '1909878909090909', 'Pasaman Barat', '2000-10-15', 'Laki-laki', 'Islam', 'SMK', '086677564435', 'Lubuk Begalung', 'Lubeg', 'Lubeg', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:22:28', '2025-06-12 01:22:28'),
	(19, 7, 'Nadia Situmorang', '1234534532465765', 'Kabanjahe', '2007-09-12', 'Laki-laki', 'Islam', 'SMA', '089977668876', 'Tunggul Hitam', 'Tunggul', 'Hitam', 'Padang', 'Sumatera Barat', 'Bersama Orang Tua', '2025-06-12 01:24:33', '2025-06-12 01:24:33');

-- Dumping data for table db_pendaftaran.statuspeserta: ~0 rows (approximately)

-- Dumping data for table db_pendaftaran.user: ~0 rows (approximately)

-- Dumping data for table db_pendaftaran.users: ~13 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'test@gmail.com', '$2y$12$9/pxFkVmRtkh/P2GRri.CeB5V/98OjbY8snlkuwfQpZKoJHQCOVpu', 'user', '2025-03-04 03:26:08', '2025-03-04 03:26:08'),
	(2, 'Admin', 'admin@gmail.com', '$2y$12$LZlWM/6qjwLXZ95ItN23TeBN0OlBTCI/YGK4NuA4SXK36Do5eLXgi', 'admin', '2025-03-08 02:05:58', '2025-03-08 02:05:58'),
	(3, 'leader', 'leader@gmail.com', '$2y$12$rBjg.RYzI.9oCm96nQ1N3eSBVioUIctmf0ITRh9uIGATswIKgbf1e', 'leader', '2025-06-03 06:36:22', '2025-06-03 06:36:22'),
	(4, 'peserta', 'peserta@gmail.com', '$2y$12$gUuvMsIyypdoP9GOPaxktO7xWm1DKrum7Rm7WtMxIuRqyssHPHGJ.', 'user', '2025-06-08 13:48:33', '2025-06-08 13:48:33'),
	(6, 'Hasrul Muhammad', 'hasrul@gmail.com', '$2y$12$j93dIjPbG0LTLQkwAfjYV.XXVser5eTRMUlTkglLlO1Moo0R6luqa', 'user', '2025-06-12 00:19:01', '2025-06-12 00:19:01'),
	(7, 'Nadia Situmorang', 'nadia@gmail.com', '$2y$12$eDZQsmmKBqSIhPc8Bq43sORcB1KOsNw31mdbj4HnbghrRyo.xzA0i', 'user', '2025-06-12 00:40:39', '2025-06-12 00:40:39'),
	(8, 'Sarah Faradiba', 'sarah@gmail.com', '$2y$12$BIesFMUlAd/e7OlVBJR7ou/OsCnXUWszhGYbwlWSZlQeYZquwMULC', 'user', '2025-06-12 00:44:20', '2025-06-12 00:44:20'),
	(9, 'Pristy Febrianty', 'pristy@gmail.com', '$2y$12$wEM1QLbg4/1nq7OmNDKvJOycg/OKjnJeW5PkRAliRXZef.QUU3c1y', 'user', '2025-06-12 00:47:18', '2025-06-12 00:47:18'),
	(10, 'Putri Aisyah Atria', 'putri@gmail.com', '$2y$12$bpTMYpVDnKoABI3/rO53tO3C3vOO6eBAha38sNd/jXTlGQkWbnmr.', 'user', '2025-06-12 00:51:22', '2025-06-12 00:51:22'),
	(11, 'Raja Inal Siregar', 'raja@gmail.com', '$2y$12$f.sByB1LnMtDrJRXDjYRjOswbYHQlLJbnqg7A/Bw3MeKALj0f1N5m', 'user', '2025-06-12 00:54:57', '2025-06-12 00:54:57'),
	(12, 'Indah Khairunisah', 'indah@gmail.com', '$2y$12$822/eET6U3gqntRzZ9YZaOIxmWW2Iv7/c4abK.Pmri9GEUXAp1mU2', 'user', '2025-06-12 01:03:48', '2025-06-12 01:03:48'),
	(13, 'Zidan Putra Cahyana', 'zidan@gmail.com', '$2y$12$kGQWSiYAGtBS10TKaAx7beYg2gR08Bn5l3ei9RtSKyQGM4Su3ndPm', 'user', '2025-06-12 01:10:30', '2025-06-12 01:10:30'),
	(14, 'Susan Paramitha', 'susan@gmail.com', '$2y$12$ldqx2OGuaGCn8n91AESqUOVd5wUe5yndTgqWszlpbrR2pMo1pv9MS', 'user', '2025-06-12 01:12:23', '2025-06-12 01:12:23');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
