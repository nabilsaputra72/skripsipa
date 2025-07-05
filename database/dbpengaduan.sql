-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 11:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapenduduk`
--

CREATE TABLE `datapenduduk` (
  `nik` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datapenduduk`
--

INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES
('1111111111111111', 'c050421005@mahasiswa.poliban.ac.id', '2025-04-29 04:35:11'),
('2222222222222222', 'nabilsaputra736@gmail.com', '2025-04-29 05:24:47'),
('4444444444444444', 'nabilsaputra736@gmail.com', '2025-04-22 07:37:19'),
('6301292183281728', 'c050421005@mahasiswa.poliban.ac.id', '2025-06-17 04:21:02'),
('6371053007030005', 'abangudin736@gmail.com', '2025-05-19 03:54:36'),
('7777777777777777', 'c050421005@mahasiswa.poliban.ac.id', '2025-04-23 10:26:57'),
('9999999999999999', 'abangudin736@gmail.com', '2025-05-13 15:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `file_pendukung`
--

CREATE TABLE `file_pendukung` (
  `id_file` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `file_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_pendukung`
--

INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES
(20, 31, 'uploads/file_1746458524.png', 'image/png'),
(21, 32, 'uploads/file_1746501525.jpg', 'image/jpeg'),
(22, 33, 'uploads/file_1746504576.jpg', 'image/jpeg'),
(23, 34, 'uploads/file_1746592233.jpg', 'image/jpeg'),
(24, 36, 'uploads/file_1746609106.jpg', 'image/jpeg'),
(25, 37, 'uploads/file_1746609117.jpg', 'image/jpeg'),
(26, 39, 'uploads/file_1746667587.jpg', 'image/jpeg'),
(30, 43, 'uploads/file_1747191589.pdf', 'application/pdf'),
(31, 44, 'uploads/file_1747623440.jpg', 'image/jpeg'),
(32, 46, 'uploads/file_1747733374.jpeg', 'image/jpeg'),
(33, 47, 'uploads/file_1747735697.jpg', 'image/jpeg'),
(34, 48, 'uploads/file_1747793120.jpg', 'image/jpeg'),
(35, 49, 'uploads/file_1747793437.jpg', 'image/jpeg'),
(36, 50, 'uploads/file_1747800159.png', 'image/png'),
(37, 51, 'uploads/file_1747801284.jpg', 'image/jpeg'),
(38, 52, 'uploads/file_1748225300_0.jpg', 'image/jpeg'),
(39, 53, 'uploads/file_1748421960_0.pdf', 'application/pdf'),
(40, 54, 'uploads/file_1750127101_0.png', 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang_jasa`
--

CREATE TABLE `jenis_barang_jasa` (
  `id_jenis_barang_jasa` int(11) NOT NULL,
  `jenis_barang_jasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_barang_jasa`
--

INSERT INTO `jenis_barang_jasa` (`id_jenis_barang_jasa`, `jenis_barang_jasa`) VALUES
(1, 'Barang'),
(2, 'Jasa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tuntutan`
--

CREATE TABLE `jenis_tuntutan` (
  `id_jenis_tuntutan` int(11) NOT NULL,
  `tuntutan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_tuntutan`
--

INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES
(1, 'Pengembalian Uang'),
(2, 'Penggantian Barang dan/atau Jasa yang Sejenis atau Setara Nilainya'),
(3, 'Perawatan Kesehatan'),
(4, 'Pemberian Santunan'),
(5, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten_kota`
--

CREATE TABLE `kabupaten_kota` (
  `id_kabupaten_kota` int(11) NOT NULL,
  `nama_kabupaten_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten_kota`
--

INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES
(1, 'Kota Banjarmasin'),
(2, 'Kota Banjarbaru'),
(3, 'Kabupaten Banjar'),
(4, 'Kabupaten Barito Kuala'),
(5, 'Kabupaten Tanah Laut'),
(6, 'Kabupaten Tanah Bumbu'),
(7, 'Kabupaten Kotabaru'),
(8, 'Kabupaten Hulu Sungai Utara'),
(9, 'Kabupaten Hulu Sungai Selatan'),
(10, 'Kabupaten Hulu Sungai Tengah'),
(11, 'Kabupaten Tapin'),
(12, 'Kabupaten Tabalong'),
(13, 'Kabupaten Balangan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pengaduan`
--

CREATE TABLE `kategori_pengaduan` (
  `id_kategori_pengaduan` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pengaduan`
--

INSERT INTO `kategori_pengaduan` (`id_kategori_pengaduan`, `kategori`) VALUES
(1, 'Harus Segera Diselesaikan'),
(2, 'Prioritas'),
(3, 'Pengaduan Biasa'),
(6, 'Belum Ditentukan');

-- --------------------------------------------------------

--
-- Table structure for table `kepuasan`
--

CREATE TABLE `kepuasan` (
  `id_kepuasan` int(11) NOT NULL,
  `id_nik` varchar(16) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `nilai` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepuasan`
--

INSERT INTO `kepuasan` (`id_kepuasan`, `id_nik`, `id_pengaduan`, `nilai`, `komentar`, `tanggal`) VALUES
(1, '6371053007030005', 48, 2, 'Sangat memuaskan, respond cepat terhadap pengaduan yang di laporkan', '2025-05-21 04:07:04'),
(2, '6371053007030005', 49, 1, 'Sangat membantu', '2025-05-21 04:26:51'),
(3, '6371053007030005', 44, 1, 'testing', '2025-06-16 03:46:55'),
(4, '6371053007030005', 46, 5, 'testing lagi', '2025-06-16 03:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_nik` varchar(16) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL DEFAULT current_timestamp(),
  `id_kabupaten_kota` int(11) NOT NULL,
  `nama_pelapor` varchar(225) NOT NULL,
  `no_telp_pelapor` varchar(20) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_pelaku_usaha` text NOT NULL,
  `no_telp_pelaku_usaha` varchar(15) NOT NULL,
  `id_jenis_barang_jasa` int(11) NOT NULL,
  `id_kategori_pengaduan` int(11) NOT NULL DEFAULT 6,
  `isi_laporan` text NOT NULL,
  `kerugian_masyarakat` text NOT NULL,
  `id_jenis_tuntutan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `disetujui_kabid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES
(31, '1111111111111111', '2025-05-05 17:22:04', 7, 'nabil', '+6287855279973', 'pt. sewangi', 'Jl. Jend Sudirman No.1 Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin, Kalimantan Selatan 70123, Indonesia', '1223131321', 1, 2, 'barang palsu', 'dua juta', 1, 1, 0),
(32, '1111111111111111', '2025-05-06 05:18:44', 4, 'Asri', '+6287855279973', 'pt. sewangi', 'jalan hasan basri', '1223131321', 1, 1, 'pelaku usaha melakukan kekerasan dan penipuan', 'lima juta', 1, 1, 1),
(33, '1111111111111111', '2025-05-06 06:09:36', 10, 'suhat', '+6287855279973', 'laili toko', 'Sultan adam', '32232131', 1, 1, 'pelaku usaha melakukan kekerasan dan penipuan', '5 juta 5.000.000', 1, 1, 1),
(34, '1111111111111111', '2025-05-07 06:30:33', 1, 'ngab', '+6287855279973', 'pt. sewangi', 'Jl. Jend Sudirman No.1 Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin, Kalimantan Selatan 70123, Indonesia', '1223131321', 1, 1, 'penipuan', 'lima juta', 5, 7, 1),
(35, '1111111111111111', '2025-05-07 10:59:39', 13, 'ngab', '+6287855279973', 'laili toko', 'Sultan adam', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 2, 1, 0),
(36, '1111111111111111', '2025-05-07 11:11:46', 11, 'ngab', '+6287855279973', 'laili toko', 'jalan hasan basri', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0),
(37, '1111111111111111', '2025-05-07 11:11:57', 11, 'ngab', '+6287855279973', 'laili toko', 'jalan hasan basri', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0),
(38, '2222222222222222', '2025-05-07 16:15:25', 3, 'edo', '+6267367267', 'nazmi toko', 'sewangi', '387238723', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0),
(39, '1111111111111111', '2025-05-08 03:26:27', 7, 'saep', '+6287855279973', 'pt. sewangi', 'Perumahan LDS Asri No.A11 Kelayan Tim. Kec. Banjarmasin Sel. Kota Banjarmasin, Kalimantan Selatan 70235, Indonesia', '1223131321', 1, 2, 'pelaku tidak menuruti akad dan mengirimkan barang palsu', 'kerugian materi Rp. 2.000.000,00', 1, 1, 0),
(43, '9999999999999999', '2025-05-14 04:59:49', 4, 'Putra', '+62827871671672', 'Alfamart Handil Bakti', 'Handil Bakti', '893289328923', 1, 1, 'Produk makanan yang saya beli ternyata sudah kadaluarsa, setelah dikonsumsi saya mengalami keracunan dan harus dirawat di rumah sakit.', 'Kerugian berupa kesehatan terancam akibat produk kadaluarsa.', 3, 6, 1),
(44, '6371053007030005', '2025-05-19 04:57:20', 1, 'Nabil', '+6287855279973', 'Alfamart Handil Dalam', 'Handil Bakti', '893289328923', 1, 1, 'Susu yang saya beli di toko tersebut ternyata telah kadaluwarsa, yang menyebabkan anak saya mengalami sakit, dan harus dilarikan ke rumah sakit', 'Kerugian uang dan kerugian kesehatan', 2, 7, 1),
(46, '6371053007030005', '2025-05-20 11:29:34', 4, 'Arif', '+6287855279973', 'Alfamart Handil Luar', 'Handil Bakti', '893289328923', 1, 2, 'Barang palsu tidak sesuai dengan yang di pasarkan', 'kerugian uang dengan jumlah 3 juta', 1, 7, 1),
(47, '6371053007030005', '2025-05-20 12:08:17', 13, 'Arif nabil', '+6287855279973', 'Alfamart Handil Tengah', 'Handil Bakti', '893289328923', 1, 2, 'Garansi tidak bisa di claim', 'kerugian materil berupa uang', 1, 1, 0),
(48, '6371053007030005', '2025-05-21 04:05:19', 7, 'Arif nabil saputra', '+6287855279973', 'Alfamart Handil Tenggara', 'Handil Bakti', '893289328923', 1, 2, 'Barang palsu, tidak sesuai dengan yang ditampilkan di toko', 'kerugian materil berupa uang senilai 8 juta', 1, 7, 1),
(49, '6371053007030005', '2025-05-21 04:10:37', 12, 'Arif nabil saputra lagi', '+6287855279973', 'Alfamart Handil Selatan', 'Handil Bakti', '893289328923', 2, 2, 'Garansi tidak bisa dilakukan, pelaku usaha tidak mau bertanggung jawab', 'Kerugian sosial yang sangat merugikan bagi saya pribadi', 2, 7, 1),
(50, '6371053007030005', '2025-05-21 06:02:39', 1, 'Arif nabil saputra', '+6287855279973', 'Alfamart Handil Bakti', 'Jl. hasan Basri Komp. Unlam', '893289328923', 1, 2, 'Barang palsu, tidak sesuai degan promosi yang dibaerikan sehingga merugikan dari segi pemakaian', 'Kerugian uag senilai delapan juta', 2, 7, 1),
(51, '6371053007030005', '2025-05-21 06:21:24', 4, 'Arif nabil', '+6287855279973', 'Alfamart Handil Dalam', 'Jl. hasan Basri Komp. Unlam', '893289328923', 1, 2, 'Susu yang saya beli pada alfamart tersebut sudah kadaluwarsa, dan menyebabkan anak saya terganggu kesehatannya', 'Saya mengalami gangguan kesehatan dan kerugian materi senilai satu juta', 2, 7, 1),
(52, '6371053007030005', '2025-05-26 04:08:20', 1, 'Saputra Nabil', '+6287855279973', 'Alfamart Banjarmasin Utara', 'Jl. hasan Basri Komp. Unlam', '893289328923', 1, 2, 'Saya memberli barang, lalu saya ingin mengklaim garansi karena adanay kecacatan pada barang yang syaa beli tersebut tetapi pelaku usaha tidak ingin bertanggung jawab atas hal itu, pdahal sudah ada perjajian bisa di klaim garansi', 'Kerugian materil sejumlah dua juta', 2, 1, 1),
(53, '6371053007030005', '2025-05-28 10:46:00', 2, 'Arif nabil', '+6287855279973', 'Alfamart Handil Barat Daya', 'Handil Bakti', '893289328923', 2, 3, 'Garansi tidak bisa di klaim, menghina saya', 'Kerugian uang senilai 500 ribu', 1, 7, 1),
(54, '6301292183281728', '2025-06-17 04:25:01', 4, 'Saya Nabil', '+6287855279973', 'Arif Cosmetics', 'Jl. Jend Sudirman No.1 Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin, Kalimantan Selatan 70123, Indonesia', '083287282732', 1, 1, 'Cosmetics yang saya beli ternyata barang abal abal, dan ketika saya beli sudah kadaluwarsa, dan sekarang menyebabkan kulit saya iritsi dan kesehatan saya menurun, hal sangat merugikan saya dari segi materi dan kesehatan.', 'Kerugian uang senilai 500 ribu dan kesehatan saya terancam', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `role_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `role_name`, `role_level`) VALUES
(1, 'Admin', 0),
(2, 'Kabid', 1),
(3, 'Super Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_pengaduan`
--

CREATE TABLE `status_pengaduan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pengaduan`
--

INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES
(1, 'Diterima'),
(2, 'Diverifikasi'),
(3, 'Diproses'),
(4, 'Diklarifikasi'),
(5, 'Mediasi'),
(6, 'Diteruskan ke BPSK'),
(7, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pegawai`, `username`, `password`, `role_id`) VALUES
(2, 'Admin', 'admin', '$2y$10$Cg3Vq1ys.AYA8NKbOTXcrOd6wS01.2V46tfl3YWbwatzKaYKR1mtK', 1),
(4, 'Nabil', 'nabilsuperadmin', '$2y$10$tLvbKp1mz9MY6rne87LXEuOuh10K/uTqfMb4Zh5hOvtm9OkHrFde6', 3),
(5, 'Nabil', 'nabilkabid', '$2y$10$jIeUcS7g1eKNoFqWFYlrbeHDE8y79.YspS9rvty1C5bProZfZXHbq', 2),
(6, 'Super', 'superadmin', '$2y$10$La6EqL9F2BgKbd4kNwwjRehDnGLMsTFhJHO.Za.LBZRlb.3Zr24QK', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapenduduk`
--
ALTER TABLE `datapenduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `file_pendukung`
--
ALTER TABLE `file_pendukung`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `jenis_barang_jasa`
--
ALTER TABLE `jenis_barang_jasa`
  ADD PRIMARY KEY (`id_jenis_barang_jasa`);

--
-- Indexes for table `jenis_tuntutan`
--
ALTER TABLE `jenis_tuntutan`
  ADD PRIMARY KEY (`id_jenis_tuntutan`);

--
-- Indexes for table `kabupaten_kota`
--
ALTER TABLE `kabupaten_kota`
  ADD PRIMARY KEY (`id_kabupaten_kota`);

--
-- Indexes for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  ADD PRIMARY KEY (`id_kategori_pengaduan`);

--
-- Indexes for table `kepuasan`
--
ALTER TABLE `kepuasan`
  ADD PRIMARY KEY (`id_kepuasan`),
  ADD KEY `id_nik` (`id_nik`),
  ADD KEY `id_nik_2` (`id_nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_nik` (`id_nik`),
  ADD KEY `id_kabupaten_kota` (`id_kabupaten_kota`),
  ADD KEY `id_jenis_barang_jasa` (`id_jenis_barang_jasa`),
  ADD KEY `id_kategori_pengaduan` (`id_kategori_pengaduan`),
  ADD KEY `id_jenis_tuntutan` (`id_jenis_tuntutan`),
  ADD KEY `status` (`id_status`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_pendukung`
--
ALTER TABLE `file_pendukung`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jenis_barang_jasa`
--
ALTER TABLE `jenis_barang_jasa`
  MODIFY `id_jenis_barang_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_tuntutan`
--
ALTER TABLE `jenis_tuntutan`
  MODIFY `id_jenis_tuntutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kabupaten_kota`
--
ALTER TABLE `kabupaten_kota`
  MODIFY `id_kabupaten_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  MODIFY `id_kategori_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kepuasan`
--
ALTER TABLE `kepuasan`
  MODIFY `id_kepuasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_pengaduan`
--
ALTER TABLE `status_pengaduan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_pendukung`
--
ALTER TABLE `file_pendukung`
  ADD CONSTRAINT `file_pendukung_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);

--
-- Constraints for table `kepuasan`
--
ALTER TABLE `kepuasan`
  ADD CONSTRAINT `kepuasan_ibfk_1` FOREIGN KEY (`id_nik`) REFERENCES `datapenduduk` (`nik`);

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_nik`) REFERENCES `datapenduduk` (`nik`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_kabupaten_kota`) REFERENCES `kabupaten_kota` (`id_kabupaten_kota`),
  ADD CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`id_jenis_barang_jasa`) REFERENCES `jenis_barang_jasa` (`id_jenis_barang_jasa`),
  ADD CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`id_kategori_pengaduan`) REFERENCES `kategori_pengaduan` (`id_kategori_pengaduan`),
  ADD CONSTRAINT `pengaduan_ibfk_5` FOREIGN KEY (`id_jenis_tuntutan`) REFERENCES `jenis_tuntutan` (`id_jenis_tuntutan`),
  ADD CONSTRAINT `pengaduan_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `status_pengaduan` (`id_status`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
