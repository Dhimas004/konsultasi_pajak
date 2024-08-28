

CREATE TABLE `data_pelayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelayanan` varchar(225) NOT NULL,
  `user` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('9', 'Tax Komplain', 'admin', '2024-05-28 22:16:57', '2024-07-26 15:11:54', '');
INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('10', 'Pendamping Perusahaaan', 'admin', '2024-05-28 22:17:56', '2024-07-23 15:08:38', '');
INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('11', 'Keberatan Pajak', 'admin', '2024-05-28 22:18:18', '', '');
INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('12', 'Pengadilan Pajak (Banding & Gugatan)', 'admin', '2024-05-28 22:18:24', '2024-07-23 15:08:50', '');
INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('13', 'Corporate Management', 'admin', '2024-05-28 22:18:31', '2024-07-23 15:08:09', '');
INSERT INTO `data_pelayanan` (`id`, `nama_pelayanan`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES ('16', 'Pendirian Ijin Usaha', 'admin', '2024-05-29 21:17:38', '2024-07-23 15:07:49', '');





CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `login` (`id`, `nama`, `nama_perusahaan`, `no_telepon`, `email`, `level`, `password`, `created_at`, `updated_at`) VALUES ('1', 'admin', 'admin', '082311563036', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-05-28 23:23:09', '2024-05-28 23:24:56');
INSERT INTO `login` (`id`, `nama`, `nama_perusahaan`, `no_telepon`, `email`, `level`, `password`, `created_at`, `updated_at`) VALUES ('2', 'client', 'client', '082311563036', 'client@gmail.com', 'client', '62608e08adc29a8d6dbc9754e659f125', '2024-05-28 23:29:43', '2024-07-28 21:03:26');
INSERT INTO `login` (`id`, `nama`, `nama_perusahaan`, `no_telepon`, `email`, `level`, `password`, `created_at`, `updated_at`) VALUES ('8', 'dhimas', 'PT IWS', '082311563036', 'dimas@gmail.com', 'client', '25f9e794323b453885f5181f1b624d0b', '2024-07-30 19:45:50', '');





CREATE TABLE `pelayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `id_data_pelayanan` int(11) NOT NULL,
  `estimasi_pengerjaan` varchar(225) NOT NULL,
  `status_transaksi` varchar(225) NOT NULL DEFAULT 'belum dibayar',
  `status_pengerjaan` varchar(255) NOT NULL DEFAULT 'belum selesai',
  `bukti_pembayaran` varchar(255) NOT NULL,
  `bukti_pembayaran_timestamp` timestamp NULL DEFAULT NULL,
  `dikerjakan_oleh` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('7', '2', '13', 'tahunan', 'pembayaran disetujui', 'sudah selesai', 'bukti_pembayaran_66705feb751b13.80139360.jpg', '2024-06-17 23:10:19', '1', '2024-06-16 11:44:56', '2024-06-29 22:55:33', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('9', '2', '13', 'tahunan', 'belum dibayar', 'belum selesai', '', '', '1', '2024-06-29 21:42:32', '2024-06-29 22:55:29', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('10', '2', '13', 'tahunan', 'belum dibayar', 'belum selesai', '', '', '1', '2024-07-01 09:13:18', '2024-07-07 20:03:21', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('11', '2', '13', 'tahunan', 'sudah dibayar', 'belum selesai', 'bukti_pembayaran_668a92ad9e1f89.22661184.png', '2024-07-07 20:05:49', '6', '2024-07-07 20:04:13', '2024-07-07 20:05:49', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('12', '2', '16', 'tahunan', 'batal', 'belum selesai', '', '', '1', '2024-07-27 23:52:19', '2024-07-28 00:00:29', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('13', '2', '13', 'tahunan', 'sudah dibayar', 'belum selesai', 'bukti_pembayaran_66a66c98ce3393.48037220.', '2024-07-28 23:06:48', '0', '2024-07-28 19:57:15', '2024-07-28 23:06:48', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('14', '2', '13', 'tahunan', 'batal', 'belum selesai', '', '', '0', '2024-07-28 22:06:34', '2024-07-28 22:54:18', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('15', '2', '13', 'tahunan', 'batal', 'belum selesai', '', '', '0', '2024-07-28 22:54:00', '2024-07-28 22:54:11', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('16', '2', '13', 'tahunan', 'belum dibayar', 'belum selesai', '', '', '0', '2024-07-30 19:33:14', '', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('17', '2', '13', 'bulanan', 'pembayaran disetujui', 'sudah selesai', 'bukti_pembayaran_66a8de2d83c182.28067096.jpg', '2024-07-30 19:35:57', '1', '2024-07-30 19:33:57', '2024-07-30 19:41:29', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('18', '8', '13', 'tahunan', 'belum dibayar', 'belum selesai', '', '', '0', '2024-07-31 23:30:27', '', '');
INSERT INTO `pelayanan` (`id`, `id_login`, `id_data_pelayanan`, `estimasi_pengerjaan`, `status_transaksi`, `status_pengerjaan`, `bukti_pembayaran`, `bukti_pembayaran_timestamp`, `dikerjakan_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES ('19', '2', '13', 'tahunan', 'pembayaran disetujui', 'sedang diproses', 'bukti_pembayaran_66b42268bd0f09.27160964.png', '2024-08-08 08:42:00', '1', '2024-08-08 08:41:11', '2024-08-08 08:42:32', '');





CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelayanan` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', '10', 'pendirian_perusahaan', 'pdf_668a91be5a3472.40043814.pdf', '2024-07-07 20:01:10', '2024-07-07 20:01:50', '');
INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', '12', 'idenditas_pendiri', 'pdf_66a525d2a039e7.61716919.pdf', '2024-07-27 23:52:34', '', '');
INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('3', '11', 'identitas_pengurus', 'pdf_66a63f7a74d075.78872520.pdf', '2024-07-28 19:54:18', '', '');
INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('4', '15', 'identitas_pengurus', '_66a669eb2a4ba0.92732019.', '2024-07-28 22:55:23', '', '');
INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('5', '17', 'identitas_pengurus', 'pdf_66a8ddf65c7970.45246115.pdf', '2024-07-30 19:35:02', '', '');
INSERT INTO `persyaratan` (`id`, `id_pelayanan`, `key`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES ('6', '19', 'identitas_pengurus', 'pdf_66b42237986955.21826461.pdf', '2024-08-08 08:41:11', '', '');





CREATE TABLE `persyaratan_data_pelayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_data_pelayanan` int(11) NOT NULL,
  `nama_persyaratan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('1', '13', 'Identitas Pengurus');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('2', '13', 'Akte Perusahaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('3', '13', 'Profil Bisnis');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('4', '9', 'NPWP');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('5', '9', 'Akte Perusahaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('6', '9', 'EFIN');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('7', '9', 'SPT 2 Tahun Terakhir');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('8', '13', 'Ijin Usaha');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('9', '16', 'Idenditas Pendiri');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('10', '16', 'Struktur Saham');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('11', '16', 'Struktur Pengurus');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('12', '16', 'Nama Usaha');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('13', '10', 'Surat Perintah Pemeriksaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('14', '10', 'Surat Kuasa');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('15', '10', 'NPWP');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('16', '10', 'Akte Perusahaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('17', '10', 'Ijin Usaha');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('18', '10', 'Profil Bisnis');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('19', '11', 'Surat Keterangan Pajak');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('20', '11', 'Surat Kuasa');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('21', '11', 'NPWP');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('22', '11', 'Akte Perusahaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('23', '11', 'Ijin Usaha');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('24', '11', 'Profil Bisnis');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('25', '12', 'Surat Keputusan Keberatan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('26', '12', 'Surat Ketetapan Pajak');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('27', '12', 'Surat Kuasa');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('28', '12', 'NPWP');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('29', '12', 'Akte Perusahaan');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('30', '12', 'Ijin Usaha');
INSERT INTO `persyaratan_data_pelayanan` (`id`, `id_data_pelayanan`, `nama_persyaratan`) VALUES ('31', '12', 'Profil Bisnis');



