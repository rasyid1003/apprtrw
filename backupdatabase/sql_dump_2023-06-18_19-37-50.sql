CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `tb_anggota_ibfk_1` (`id_pend`),
  KEY `id_kk` (`id_kk`),
  CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_anggota (id_anggota, id_kk, id_pend, hubungan) VALUES ('18', '6', '37', 'Kepala Keluarga');
INSERT INTO tb_anggota (id_anggota, id_kk, id_pend, hubungan) VALUES ('20', '6', '37', 'Anak');
INSERT INTO tb_anggota (id_anggota, id_kk, id_pend, hubungan) VALUES ('21', '6', '37', 'Orang Tua');

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL,
  PRIMARY KEY (`id_datang`),
  KEY `pelapor` (`pelapor`),
  CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_datang (id_datang, nik, nama_datang, jekel, tgl_datang, pelapor) VALUES ('6', 'Lorem officia tempor', 'Provident adipisci ', 'PR', '1988-08-13', '27');

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_kk (id_kk, no_kk, kepala, desa, rt, rw, kec, kab, prov) VALUES ('6', '1234555', 'Tempor cupiditate pr', 'Delectus voluptates', 'Facil', 'Asper', 'Eaque laboriosam co', 'Cum fugit sunt dol', 'Laudantium iste non');
INSERT INTO tb_kk (id_kk, no_kk, kepala, desa, rt, rw, kec, kab, prov) VALUES ('7', 'Et corrupti occaeca', 'Do eiusmod nulla nis', 'Consequatur rerum la', 'Facil', 'Aliqu', 'Vel qui aut commodo ', 'Placeat voluptatem', 'Dolorem eum ut deser');

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL,
  `ibu` varchar(30) NOT NULL,
  PRIMARY KEY (`id_lahir`),
  KEY `id_kk` (`id_kk`),
  CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_lahir (id_lahir, nama, tgl_lh, jekel, id_kk, ibu) VALUES ('9', 'Velit et Nam volupt', '2005-04-22', 'PR', '6', 'dddd');
INSERT INTO tb_lahir (id_lahir, nama, tgl_lh, jekel, id_kk, ibu) VALUES ('10', 'In quisquam eum sequ', '2016-12-06', 'LK', '6', 'Sunt quis nostrud ex');
INSERT INTO tb_lahir (id_lahir, nama, tgl_lh, jekel, id_kk, ibu) VALUES ('11', 'Voluptatibus hic sus', '1970-06-18', 'LK', '6', 'Commodo eaque qui id');
INSERT INTO tb_lahir (id_lahir, nama, tgl_lh, jekel, id_kk, ibu) VALUES ('13', 'Cupidatat nostrum vo', '1974-05-18', 'LK', '6', 'Id eius occaecat rer');

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mendu`),
  KEY `id_pdd` (`id_pdd`),
  CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_mendu (id_mendu, id_pdd, tgl_mendu, sebab) VALUES ('3', '14', '2023-05-26', 'gila');
INSERT INTO tb_mendu (id_mendu, id_pdd, tgl_mendu, sebab) VALUES ('4', '29', '2023-06-01', 'gila');
INSERT INTO tb_mendu (id_mendu, id_pdd, tgl_mendu, sebab) VALUES ('5', '30', '2023-06-01', 'gila');

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  PRIMARY KEY (`id_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('14', 'In nisi autem sunt ', 'Voluptatem consequat', 'Iusto sint qui ', '2023-08-18', 'LK', 'Quia magna corr', 'Reru', 'Pers', 'Ex rem mollit p', 'Cerai Mati', 'Architecto nulla ut ', 'Meninggal');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('19', 'Ex cum dignissimos a', 'Qui impedit ducimus', 'Ipsum omnis und', '2012-02-04', 'PR', 'Quibusdam illum', 'Veli', 'Cons', 'Incididunt dele', 'Cerai Mati', 'Nam error exercitati', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('21', 'Omnis deserunt nostr', 'Proident quam sed a', 'Qui cum veniam ', '1972-01-21', '', 'Et deserunt et ', 'Omni', 'Enim', 'Soluta deserunt', 'Cerai Hidup', 'Nemo maxime sed veli', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('22', 'Natus vel et fugiat', 'Maiores recusandae ', 'Fugit doloremqu', '1996-05-12', 'PR', 'Rerum ea minim ', 'Quis', 'Cons', 'Vero in eum ali', '- Pilih -', 'Corrupti dolore qua', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('23', 'Voluptatem lorem ne', 'Commodo et perferend', 'Odit exercitati', '2011-11-26', 'PR', 'Sit aut id culp', 'Pers', 'Nost', 'Nostrum provide', 'Belum', 'Est est laudantium ', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('24', 'Nemo Nam enim volupt', 'Molestias voluptates', 'Tempora esse et', '2014-06-15', 'LK', 'Reprehenderit v', 'Volu', 'Enim', 'Praesentium atq', 'Sudah', 'Tenetur dolorem et d', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('25', 'Tempora ab ea mollit', 'Rem delectus est m', 'Non itaque volu', '1981-08-15', '', 'Beatae quo reru', 'Cons', 'Cons', 'Magni nesciunt ', '- Pilih -', 'Quaerat in cupidatat', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('27', 'Amet incidunt sed ', 'Cupidatat sunt nihi', 'Earum animi nul', '1976-03-20', 'PR', 'Ipsam id molest', 'Reic', 'Fugi', 'Ut nisi proiden', 'Cerai Mati', 'Fugiat voluptatibus', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('29', 'Lorem optio molesti', 'Quisquam commodo ali', 'Aliquip iste ma', '1970-01-08', 'PR', 'Suscipit dolor ', 'Mole', 'Non ', 'Pariatur Magna ', '- Pilih -', 'Voluptatem suscipit ', 'Meninggal');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('30', 'Unde exercitationem ', 'Qui esse quia aut te', 'Nulla sequi sit', '2010-02-18', 'LK', 'Ut qui quod qua', 'Esse', 'Labo', 'Esse vel magna ', 'Sudah', 'Adipisicing placeat', 'Meninggal');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('36', 'Repellendus Autem p', 'Quos et nulla sapien', 'Delectus nemo s', '2001-05-27', '', 'Molestiae qui u', 'Non ', 'Eius', 'Molestiae lauda', 'Cerai Mati', 'Qui non fugiat accu', '');
INSERT INTO tb_pdd (id_pend, nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, status) VALUES ('37', 'Ut aliqua Tempor ni', 'Assumenda labore exc', 'In officiis omn', '1997-09-06', 'LK', 'Libero minim un', 'Illo', 'Aper', 'Qui exercitatio', 'Sudah', 'Minima officia neces', 'Ada');

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tb_pengguna (id_pengguna, nama_pengguna, username, password, level) VALUES ('1', 'rasyid', 'admin', 'admin', 'Administrator');
INSERT INTO tb_pengguna (id_pengguna, nama_pengguna, username, password, level) VALUES ('3', 'benk', 'admin2', 'admin2', 'Kaur Pemerintah');

CREATE TABLE `tb_pengu` (
  `id_pengu` int(20) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pengu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tb_pengu (id_pengu, judul, isi, tanggal) VALUES ('6', 'Optio assumenda nul', 'Quia sunt quae qui s', '1997-10-24');
INSERT INTO tb_pengu (id_pengu, judul, isi, tanggal) VALUES ('7', 'Saepe est sed in ut ', 'Qui proident volupt', '1984-12-24');
INSERT INTO tb_pengu (id_pengu, judul, isi, tanggal) VALUES ('8', 'Enim est excepteur d', 'A dolor in quod labo', '1972-11-05');

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_pdd` (`id_pdd`),
  CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `tb_setting` (
  `id` int(11) DEFAULT NULL,
  `halaman_judul` varchar(255) NOT NULL,
  `deskripsi_judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tb_setting (id, halaman_judul, deskripsi_judul) VALUES ('', 'sadasdas', 'fsfefesfesf');
INSERT INTO tb_setting (id, halaman_judul, deskripsi_judul) VALUES ('', 'sadasdas', 'fsfefesfesf');
INSERT INTO tb_setting (id, halaman_judul, deskripsi_judul) VALUES ('', 'Eu sunt et corrupti', 'Aspernatur non sit e');
INSERT INTO tb_setting (id, halaman_judul, deskripsi_judul) VALUES ('', 'Commodi maiores iste', 'Culpa ea quos placea');

CREATE TABLE `tb_siskam` (
  `id_siskam` int(5) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `nama` text NOT NULL,
  `hari` enum('SENIN','SELASA','RABU','KAMIS','JUMAT','SABTU','MINGGU') NOT NULL,
  `jaga` text NOT NULL,
  `rt` varchar(255) NOT NULL,
  PRIMARY KEY (`id_siskam`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tb_siskam (id_siskam, id_pdd, nama, hari, jaga, rt) VALUES ('30', '37', '', 'MINGGU', 'Ipsa labore consequ', '25');
INSERT INTO tb_siskam (id_siskam, id_pdd, nama, hari, jaga, rt) VALUES ('31', '37', '', 'SELASA', 'Dolore minim Nam con', '23');
INSERT INTO tb_siskam (id_siskam, id_pdd, nama, hari, jaga, rt) VALUES ('32', '37', '', 'SABTU', 'Aut est non nisi ut', '19');

