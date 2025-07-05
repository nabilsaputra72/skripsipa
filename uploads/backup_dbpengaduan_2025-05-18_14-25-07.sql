#
# TABLE STRUCTURE FOR: datapenduduk
#

DROP TABLE IF EXISTS `datapenduduk`;

CREATE TABLE `datapenduduk` (
  `nik` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES ('1111111111111111', 'c050421005@mahasiswa.poliban.ac.id', '2025-04-29 04:35:11');
INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES ('2222222222222222', 'nabilsaputra736@gmail.com', '2025-04-29 05:24:47');
INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES ('4444444444444444', 'nabilsaputra736@gmail.com', '2025-04-22 07:37:19');
INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES ('7777777777777777', 'c050421005@mahasiswa.poliban.ac.id', '2025-04-23 10:26:57');
INSERT INTO `datapenduduk` (`nik`, `email`, `created_at`) VALUES ('9999999999999999', 'abangudin736@gmail.com', '2025-05-13 15:51:22');


#
# TABLE STRUCTURE FOR: file_pendukung
#

DROP TABLE IF EXISTS `file_pendukung`;

CREATE TABLE `file_pendukung` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `file_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_file`),
  KEY `id_pengaduan` (`id_pengaduan`),
  CONSTRAINT `file_pendukung_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (20, 31, 'uploads/file_1746458524.png', 'image/png');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (21, 32, 'uploads/file_1746501525.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (22, 33, 'uploads/file_1746504576.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (23, 34, 'uploads/file_1746592233.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (24, 36, 'uploads/file_1746609106.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (25, 37, 'uploads/file_1746609117.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (26, 39, 'uploads/file_1746667587.jpg', 'image/jpeg');
INSERT INTO `file_pendukung` (`id_file`, `id_pengaduan`, `file_path`, `file_type`) VALUES (30, 43, 'uploads/file_1747191589.pdf', 'application/pdf');


#
# TABLE STRUCTURE FOR: jenis_barang_jasa
#

DROP TABLE IF EXISTS `jenis_barang_jasa`;

CREATE TABLE `jenis_barang_jasa` (
  `id_jenis_barang_jasa` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_barang_jasa` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jenis_barang_jasa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jenis_barang_jasa` (`id_jenis_barang_jasa`, `jenis_barang_jasa`) VALUES (1, 'Barang');
INSERT INTO `jenis_barang_jasa` (`id_jenis_barang_jasa`, `jenis_barang_jasa`) VALUES (2, 'Jasa');


#
# TABLE STRUCTURE FOR: jenis_tuntutan
#

DROP TABLE IF EXISTS `jenis_tuntutan`;

CREATE TABLE `jenis_tuntutan` (
  `id_jenis_tuntutan` int(11) NOT NULL AUTO_INCREMENT,
  `tuntutan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis_tuntutan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES (1, 'Pengembalian Uang');
INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES (2, 'Penggantian Barang dan/atau Jasa yang Sejenis atau Setara Nilainya');
INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES (3, 'Perawatan Kesehatan');
INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES (4, 'Pemberian Santunan');
INSERT INTO `jenis_tuntutan` (`id_jenis_tuntutan`, `tuntutan`) VALUES (5, 'Lainnya');


#
# TABLE STRUCTURE FOR: kabupaten_kota
#

DROP TABLE IF EXISTS `kabupaten_kota`;

CREATE TABLE `kabupaten_kota` (
  `id_kabupaten_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kabupaten_kota` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kabupaten_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (1, 'Kota Banjarmasin');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (2, 'Kota Banjarbaru');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (3, 'Kabupaten Banjar');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (4, 'Kabupaten Barito Kuala');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (5, 'Kabupaten Tanah Laut');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (6, 'Kabupaten Tanah Bumbu');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (7, 'Kabupaten Kotabaru');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (8, 'Kabupaten Hulu Sungai Utara');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (9, 'Kabupaten Hulu Sungai Selatan');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (10, 'Kabupaten Hulu Sungai Tengah');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (11, 'Kabupaten Tapin');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (12, 'Kabupaten Tabalong');
INSERT INTO `kabupaten_kota` (`id_kabupaten_kota`, `nama_kabupaten_kota`) VALUES (13, 'Kabupaten Balangan');


#
# TABLE STRUCTURE FOR: kategori_pengaduan
#

DROP TABLE IF EXISTS `kategori_pengaduan`;

CREATE TABLE `kategori_pengaduan` (
  `id_kategori_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kategori_pengaduan` (`id_kategori_pengaduan`, `kategori`) VALUES (1, 'Harus Segera Diselesaikan');
INSERT INTO `kategori_pengaduan` (`id_kategori_pengaduan`, `kategori`) VALUES (2, 'Prioritas');
INSERT INTO `kategori_pengaduan` (`id_kategori_pengaduan`, `kategori`) VALUES (3, 'Pengaduan Biasa');
INSERT INTO `kategori_pengaduan` (`id_kategori_pengaduan`, `kategori`) VALUES (6, 'Belum Ditentukan');


#
# TABLE STRUCTURE FOR: kepuasan
#

DROP TABLE IF EXISTS `kepuasan`;

CREATE TABLE `kepuasan` (
  `id_kepuasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_nik` varchar(16) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kepuasan`),
  KEY `id_nik` (`id_nik`),
  CONSTRAINT `kepuasan_ibfk_1` FOREIGN KEY (`id_nik`) REFERENCES `datapenduduk` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: pengaduan
#

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
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
  `disetujui_kabid` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pengaduan`),
  KEY `id_nik` (`id_nik`),
  KEY `id_kabupaten_kota` (`id_kabupaten_kota`),
  KEY `id_jenis_barang_jasa` (`id_jenis_barang_jasa`),
  KEY `id_kategori_pengaduan` (`id_kategori_pengaduan`),
  KEY `id_jenis_tuntutan` (`id_jenis_tuntutan`),
  KEY `status` (`id_status`),
  CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_nik`) REFERENCES `datapenduduk` (`nik`),
  CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_kabupaten_kota`) REFERENCES `kabupaten_kota` (`id_kabupaten_kota`),
  CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`id_jenis_barang_jasa`) REFERENCES `jenis_barang_jasa` (`id_jenis_barang_jasa`),
  CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`id_kategori_pengaduan`) REFERENCES `kategori_pengaduan` (`id_kategori_pengaduan`),
  CONSTRAINT `pengaduan_ibfk_5` FOREIGN KEY (`id_jenis_tuntutan`) REFERENCES `jenis_tuntutan` (`id_jenis_tuntutan`),
  CONSTRAINT `pengaduan_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `status_pengaduan` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (31, '1111111111111111', '2025-05-05 17:22:04', 7, 'nabil', '+6287855279973', 'pt. sewangi', 'Jl. Jend Sudirman No.1 Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin, Kalimantan Selatan 70123, Indonesia', '1223131321', 1, 2, 'barang palsu', 'dua juta', 1, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (32, '1111111111111111', '2025-05-06 05:18:44', 4, 'Asri', '+6287855279973', 'pt. sewangi', 'jalan hasan basri', '1223131321', 1, 1, 'pelaku usaha melakukan kekerasan dan penipuan', 'lima juta', 1, 1, 1);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (33, '1111111111111111', '2025-05-06 06:09:36', 10, 'suhat', '+6287855279973', 'laili toko', 'Sultan adam', '32232131', 1, 1, 'pelaku usaha melakukan kekerasan dan penipuan', '5 juta 5.000.000', 1, 1, 1);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (34, '1111111111111111', '2025-05-07 06:30:33', 1, 'ngab', '+6287855279973', 'pt. sewangi', 'Jl. Jend Sudirman No.1 Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin, Kalimantan Selatan 70123, Indonesia', '1223131321', 1, 1, 'penipuan', 'lima juta', 5, 1, 1);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (35, '1111111111111111', '2025-05-07 10:59:39', 13, 'ngab', '+6287855279973', 'laili toko', 'Sultan adam', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 2, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (36, '1111111111111111', '2025-05-07 11:11:46', 11, 'ngab', '+6287855279973', 'laili toko', 'jalan hasan basri', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (37, '1111111111111111', '2025-05-07 11:11:57', 11, 'ngab', '+6287855279973', 'laili toko', 'jalan hasan basri', '1223131321', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (38, '2222222222222222', '2025-05-07 16:15:25', 3, 'edo', '+6267367267', 'nazmi toko', 'sewangi', '387238723', 1, 3, 'garansi tidak bisa dilakukan', 'satu juta', 1, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (39, '1111111111111111', '2025-05-08 03:26:27', 7, 'saep', '+6287855279973', 'pt. sewangi', 'Perumahan LDS Asri No.A11 Kelayan Tim. Kec. Banjarmasin Sel. Kota Banjarmasin, Kalimantan Selatan 70235, Indonesia', '1223131321', 1, 2, 'pelaku tidak menuruti akad dan mengirimkan barang palsu', 'kerugian materi Rp. 2.000.000,00', 1, 1, 0);
INSERT INTO `pengaduan` (`id_pengaduan`, `id_nik`, `tgl_pengaduan`, `id_kabupaten_kota`, `nama_pelapor`, `no_telp_pelapor`, `nama_toko`, `alamat_pelaku_usaha`, `no_telp_pelaku_usaha`, `id_jenis_barang_jasa`, `id_kategori_pengaduan`, `isi_laporan`, `kerugian_masyarakat`, `id_jenis_tuntutan`, `id_status`, `disetujui_kabid`) VALUES (43, '9999999999999999', '2025-05-14 04:59:49', 4, 'Putra', '+62827871671672', 'Alfamart Handil Bakti', 'Handil Bakti', '893289328923', 1, 1, 'Produk makanan yang saya beli ternyata sudah kadaluarsa, setelah dikonsumsi saya mengalami keracunan dan harus dirawat di rumah sakit.', 'Kerugian berupa kesehatan terancam akibat produk kadaluarsa.', 3, 2, 1);


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(128) NOT NULL,
  `role_level` int(11) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `roles` (`id_roles`, `role_name`, `role_level`) VALUES (1, 'Admin', 0);
INSERT INTO `roles` (`id_roles`, `role_name`, `role_level`) VALUES (2, 'Kabid', 1);
INSERT INTO `roles` (`id_roles`, `role_name`, `role_level`) VALUES (3, 'Super Admin', 2);


#
# TABLE STRUCTURE FOR: status_pengaduan
#

DROP TABLE IF EXISTS `status_pengaduan`;

CREATE TABLE `status_pengaduan` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (1, 'Diterima');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (2, 'Diverifikasi');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (3, 'Diproses');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (4, 'Diklarifikasi');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (5, 'Mediasi');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (6, 'Diteruskan ke BPSK');
INSERT INTO `status_pengaduan` (`id_status`, `status`) VALUES (7, 'Selesai');


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_ibfk_1` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `user` (`id_user`, `nama_pegawai`, `username`, `password`, `role_id`) VALUES (2, 'Admin', 'admin', '$2y$10$Cg3Vq1ys.AYA8NKbOTXcrOd6wS01.2V46tfl3YWbwatzKaYKR1mtK', 1);
INSERT INTO `user` (`id_user`, `nama_pegawai`, `username`, `password`, `role_id`) VALUES (4, 'Nabil', 'nabilsuperadmin', '$2y$10$tLvbKp1mz9MY6rne87LXEuOuh10K/uTqfMb4Zh5hOvtm9OkHrFde6', 3);
INSERT INTO `user` (`id_user`, `nama_pegawai`, `username`, `password`, `role_id`) VALUES (5, 'Nabil', 'nabilkabid', '$2y$10$jIeUcS7g1eKNoFqWFYlrbeHDE8y79.YspS9rvty1C5bProZfZXHbq', 2);
INSERT INTO `user` (`id_user`, `nama_pegawai`, `username`, `password`, `role_id`) VALUES (6, 'Super', 'superadmin', '$2y$10$La6EqL9F2BgKbd4kNwwjRehDnGLMsTFhJHO.Za.LBZRlb.3Zr24QK', 3);


