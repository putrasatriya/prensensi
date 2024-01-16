/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_absensi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_absensi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_absensi`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id_karyawan`,`nama`,`jenis_kelamin`,`jabatan`,`nohp`,`alamat`) values 
(1,'Nindyo Dewanto, S.H., M.Hum.','pria','Kepala Bagian Hukum','0816670380','Perum Potorono Asri III No. 4, Potorono, Banguntapan, Bantul, Daerah Istimewa Yogyakarta'),
(2,'Astama Izqi Winata, S.H.','pria','Perancang Peraturan Perundang-','n/a','n/a'),
(3,'Zico Ostaki, S.H., M.H.','pria','Kepala Sub Bagian Perundang-un','081228001455','Perum Wikrokerten JL. Kokosan No 171 RT 10, Banguntapan, Bantul, Daerah Istimewa Yogyakarta'),
(4,'Dina Febriana Darmastuti. S.H.','wanita','Perancang Peraturan Perundang-','08121564630','Kadipaten Lor No. 27 RT/RW 21/26 Kadipaten, Kraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta'),
(5,'Mahawati, S.H.','wanita','Analis Peraturan Perundang-und','085728380699','Komplang JL.Mulia IV Mo.12 RT/RW 03/26 Kadipiro, Banjarsari, Kota Surakarta, Jawa Tengah'),
(6,'Puspita Ramadhani Aisyah Alkis. S.H.','wanita','Perancang Peraturan Perundang-','085747858446','JL.Aru No/ 974 RT/RW 4/7 Magelang Utara Kota Magelang Jawa Tengah'),
(7,'Fandi Nur Rohman, S.H.','pria','Analis Peraturan Perundang-und','n/a','n/a'),
(8,'Saverius Vanny Noviandri P. Manaan, S.H.','pria','Kepala Sub Bagian Bantuan Huku','081328430050','Kweden Dk Kweden RT 02 RW Trienggo, Bantul, Bantul, Daerah Istimewa Yogyakarta'),
(9,'Kharisma Ratuprima Semadaria, S.H.','wanita','Analis Advokasi Hukum','085642277224','RT/RW 11/Jaranan, Banguntapan, Bantul, Daerah Istimewa Yogyakarta '),
(10,'Dziki Haqqi Aufa, S.H.','pria','Analisis Advokasi Hukum','082225343538','Kalibening RT/RW 03/04, Kebondalem, Jambu, Kabupaten Semarang, Jawa Tengah'),
(11,'Yuyun Arini Widyaningsih, S.I.P.','wanita','Analis Perlindungan Hak-Hak ','085799586279','Karang RT/RW 01/15 Tegalgede, Karanganyar, Karanganyar, Jawa Tengah'),
(12,'Canggih Muhammad Ridwan, A.Md.','pria','Penyusun Bahan Bantuan Hukum','082133302688','Bening, Nganggring RT/RW 01/03 Girikerto, Turi, Sleman, Daerah Istimewa Yogyakarta'),
(13,'Mulyani','wanita','Pengolah Data Laporan KAS','08157950543','Jengkelingan RT/RW 05/21 Sidoarum, Godean, Sleman, Daerah Istimewa Yogyakarta'),
(14,'Rahmat Setiabudi Sokonagoro, S.H., LL.M.','pria','Kepala Sub Bagian Dokumentasi ','08127972939','KP. Ponggalan UH VII/306F RT/RW 21/07 Giwangan, Umbulharjo, Yogyakarta, Daerah Istimewa Yogyakarta'),
(15,'Sri Ngatiah, A.Md.','wanita','Analis Perencanaan Evaluasi Da','081578469376','Seroja 4/361 RT/RW 10/22 Condongcatur, Depok, Sleman, Daerah Istimewa Yogyakarta '),
(16,'Adriyanti, S.E.','wanita','Bendahara','0822136000150','Ganjuran RT/RW 01/019 Sidorejo, Godean, Sleman, Daerah Istimewa Yogyakarta'),
(17,'Muh. Ari Wardani, S.H.','pria','Pengelola Informasi Produk Huk','n/a','Perumahan Tamanan Nyaman C2 DK. Glagah Lor RT/RW 001/000 Tamanan, Banguntapan, Bantul, Daerah Istime');

/*Table structure for table `kehadiran` */

DROP TABLE IF EXISTS `kehadiran`;

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL,
  PRIMARY KEY (`id_kehadiran`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `kehadiran` */

insert  into `kehadiran`(`id_kehadiran`,`id_karyawan`,`tanggal`,`jam_datang`,`jam_pulang`) values 
(11,1,'2021-03-31','08:39:00','20:40:00'),
(12,2,'2021-03-31','08:41:00','20:41:00'),
(13,4,'2021-04-02','13:12:00','19:24:00'),
(14,13,'2021-04-02','13:19:00','13:21:00'),
(17,6,'2021-04-17','11:34:00','12:35:00'),
(18,1,'2021-12-14','21:08:00','21:08:00'),
(19,1,'2021-12-14','22:21:00','16:21:00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`username`,`password`,`level`) values 
(0,'Satria Yunanta','Satria','satria123','admin'),
(1,'Nindyo Dewanto, S.H., M.Hum.','Nindyo Dewanto','pegawai','pegawai'),
(2,'Zico Ostaki, S.H., M.H.	','Zico Ostaki, S.H., M.H.	','pegawai','pegawai'),
(3,'Dina Febriana Darmastuti. S.H.	','Dina Febriana Darmastuti. S.H.	','pegawai','pegawai'),
(4,'Mahawati, S.H.	','Mahawati, S.H.	','pegawai','pegawai'),
(5,'Astama Izqi Winata, S.H.	','Astama Izqi Winata, S.H.	','pegawai','pegawai'),
(6,'Puspita Ramadhani Aisyah Alkis. S.H.	','Puspita Ramadhani Aisyah Alkis. S.H.	','pegawai','pegawai'),
(7,'Fandi Nur Rohman, S.H.	','Fandi Nur Rohman, S.H.	','pegawai','pegawai'),
(8,'Saverius Vanny Noviandri P. Manaan, S.H.	','Saverius Vanny Noviandri P. Manaan, S.H.	','pegawai','pegawai'),
(9,'Kharisma Ratuprima Semadaria, S.H.	','Kharisma Ratuprima Semadaria, S.H.	','pegawai','pegawai'),
(10,'Dziki Haqqi Aufa, S.H.	','Dziki Haqqi Aufa, S.H.	','pegawai','pegawai'),
(11,'Yuyun Arini Widyaningsih, S.I.P.	','Yuyun Arini Widyaningsih, S.I.P.	','pegawai','pegawai'),
(12,'Canggih Muhammad Ridwan, A.Md.	','Canggih Muhammad Ridwan, A.Md.	','pegawai','pegawai'),
(13,'Mulyani','Mulyani','pegawai','pegawai'),
(14,'Rahmat Setiabudi Sokonagoro, S.H., LL.M.	','Rahmat Setiabudi Sokonagoro, S.H., LL.M.	','pegawai','pegawai'),
(15,'Sri Ngatiah, A.Md.	','Sri Ngatiah, A.Md.	','pegawai','pegawai'),
(16,'Adriyanti, S.E.	','Adriyanti, S.E.	','pegawai','pegawai'),
(17,'Muh. Ari Wardani, S.H.	','Muh. Ari Wardani, S.H.	','pegawai','pegawai');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
