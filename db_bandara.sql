/*
SQLyog Trial v11.31 (32 bit)
MySQL - 10.1.19-MariaDB : Database - db_bandara
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_bandara` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_bandara`;

/*Table structure for table `catatan_mutu` */

DROP TABLE IF EXISTS `catatan_mutu`;

CREATE TABLE `catatan_mutu` (
  `id_catatan` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `status_cm` int(3) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `lokasi_simpan` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `entry_date` datetime DEFAULT NULL,
  `id_metode` int(3) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_catatan`),
  KEY `id_metode` (`id_metode`),
  KEY `status_cm` (`status_cm`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `catatan_mutu_ibfk_2` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  CONSTRAINT `catatan_mutu_ibfk_3` FOREIGN KEY (`status_cm`) REFERENCES `status_cm` (`id_status_cm`),
  CONSTRAINT `catatan_mutu_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `catatan_mutu` */

insert  into `catatan_mutu`(`id_catatan`,`judul`,`status_cm`,`masa_berlaku`,`lokasi_simpan`,`file`,`keterangan`,`entry_date`,`id_metode`,`id_admin`) values (3,'catatan 1',1,'2017-08-31','ruang arsip','Appendix B - Indemnity Form -general-version_pg17.doc','','2017-08-31 14:34:46',1,7),(4,'catatan 2',1,'2017-09-06','ruang arsip','Table of Contents.docx','','2017-08-31 14:35:57',1,7),(5,'catatan 3 ',1,'2017-08-30','ruang arsip','English.docx','','2017-08-31 16:20:51',2,7),(6,'catatan 4',1,'2017-09-30','ruang arsip','How to prevent us from cyber criminal.docx','','2017-09-01 19:07:59',1,7),(7,'catatan 5',2,'2017-09-30','ruang arsip','8563461.jpg','','2017-09-01 19:08:22',2,7);

/*Table structure for table `metode` */

DROP TABLE IF EXISTS `metode`;

CREATE TABLE `metode` (
  `id_metode` int(3) NOT NULL,
  `metode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_metode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `metode` */

insert  into `metode`(`id_metode`,`metode`) values (1,'Pengalihan '),(2,'Pemusnahan');

/*Table structure for table `regulator` */

DROP TABLE IF EXISTS `regulator`;

CREATE TABLE `regulator` (
  `id_regulator` int(3) NOT NULL AUTO_INCREMENT,
  `regulator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_regulator`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `regulator` */

insert  into `regulator`(`id_regulator`,`regulator`) values (1,'DJU '),(2,'Angkasa Pura 1'),(3,'Pemerintah'),(4,'kementrian liingkungan'),(5,'kemkominfo');

/*Table structure for table `revisi` */

DROP TABLE IF EXISTS `revisi`;

CREATE TABLE `revisi` (
  `id_revisi` int(3) NOT NULL AUTO_INCREMENT,
  `revisi` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_revisi`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `revisi` */

insert  into `revisi`(`id_revisi`,`revisi`) values (0,0),(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);

/*Table structure for table `status_cm` */

DROP TABLE IF EXISTS `status_cm`;

CREATE TABLE `status_cm` (
  `id_status_cm` int(3) NOT NULL,
  `status_cm` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_status_cm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_cm` */

insert  into `status_cm`(`id_status_cm`,`status_cm`) values (1,'Aktif'),(2,'Pasif');

/*Table structure for table `status_dokumen` */

DROP TABLE IF EXISTS `status_dokumen`;

CREATE TABLE `status_dokumen` (
  `id_status_dokumen` int(3) NOT NULL,
  `status_dokumen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_dokumen` */

insert  into `status_dokumen`(`id_status_dokumen`,`status_dokumen`) values (0,'Pengajuan GM'),(1,'Revisi'),(2,'Setuju'),(3,'Baru'),(4,'Di Unit Terkait');

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) DEFAULT NULL,
  `unit` int(3) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date_user` datetime DEFAULT NULL,
  `tipe` tinyint(1) DEFAULT NULL,
  KEY `tipe` (`tipe`),
  KEY `unit` (`unit`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`unit`) REFERENCES `unit` (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`nama_admin`,`unit`,`username`,`password`,`date_user`,`tipe`) values (7,'yogapermana',1,'yogapermana','123','2017-08-16 09:03:27',0),(8,'yudhypratama',2,'yudhypratama55','567','2017-08-16 09:04:01',1),(9,'savioroomy',3,'roomy.mendes123','fretelin','2017-08-16 09:04:31',1),(32,'Ibnu',2,'ibnu','ibnu','0000-00-00 00:00:00',1),(33,'Rizki Saputra',2,'rizki123','rizki','0000-00-00 00:00:00',1);

/*Table structure for table `tb_dokumen_baru` */

DROP TABLE IF EXISTS `tb_dokumen_baru`;

CREATE TABLE `tb_dokumen_baru` (
  `id_dokumen` int(3) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `jenis_dokumen` int(10) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi` int(3) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_admin` (`id_admin`),
  KEY `jenis_dokumen` (`jenis_dokumen`),
  KEY `id_keterangan` (`keterangan`),
  KEY `status` (`status`),
  KEY `revisi` (`revisi`),
  CONSTRAINT `tb_dokumen_baru_ibfk_5` FOREIGN KEY (`jenis_dokumen`) REFERENCES `tb_jenis_dokumen` (`id_jenis_dokumen`),
  CONSTRAINT `tb_dokumen_baru_ibfk_7` FOREIGN KEY (`status`) REFERENCES `status_dokumen` (`id_status_dokumen`),
  CONSTRAINT `tb_dokumen_baru_ibfk_8` FOREIGN KEY (`revisi`) REFERENCES `revisi` (`id_revisi`),
  CONSTRAINT `tb_dokumen_baru_ibfk_9` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tb_dokumen_baru` */

insert  into `tb_dokumen_baru`(`id_dokumen`,`kode`,`nama_dokumen`,`jenis_dokumen`,`keterangan`,`revisi`,`file`,`status`,`catatan`,`entry_date`,`id_admin`) values (18,'I01','pemeliharaan Xray',1,'',1,'Assessment Details (Degree)_pg11_15.docx',1,'catatan 1,catatan 2','2017-09-01 17:42:22',7);

/*Table structure for table `tb_jenis_dokumen` */

DROP TABLE IF EXISTS `tb_jenis_dokumen`;

CREATE TABLE `tb_jenis_dokumen` (
  `id_jenis_dokumen` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenis_dokumen` */

insert  into `tb_jenis_dokumen`(`id_jenis_dokumen`,`jenis_dokumen`) values (1,'Intruksi Kerja'),(3,'pedoman'),(4,'prosedur'),(5,'Manual'),(6,'Loca');

/*Table structure for table `tb_nomer` */

DROP TABLE IF EXISTS `tb_nomer`;

CREATE TABLE `tb_nomer` (
  `id_nomer` int(3) NOT NULL AUTO_INCREMENT,
  `nomer` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_nomer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nomer` */

insert  into `tb_nomer`(`id_nomer`,`nomer`) values (1,'UU'),(2,'PP'),(3,'PM'),(4,'SKEP DJU'),(5,'SKEP AP'),(6,'SKEP-AP2');

/*Table structure for table `tb_peraturan` */

DROP TABLE IF EXISTS `tb_peraturan`;

CREATE TABLE `tb_peraturan` (
  `id_peraturan` int(3) NOT NULL AUTO_INCREMENT,
  `nomer` int(3) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tahun` int(10) DEFAULT NULL,
  `regulator` int(3) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_peraturan`),
  KEY `id_admin` (`id_admin`),
  KEY `regulator` (`regulator`),
  KEY `nomer` (`nomer`),
  CONSTRAINT `tb_peraturan_ibfk_3` FOREIGN KEY (`nomer`) REFERENCES `tb_nomer` (`id_nomer`),
  CONSTRAINT `tb_peraturan_ibfk_5` FOREIGN KEY (`regulator`) REFERENCES `regulator` (`id_regulator`),
  CONSTRAINT `tb_peraturan_ibfk_6` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_peraturan` */

insert  into `tb_peraturan`(`id_peraturan`,`nomer`,`judul`,`tahun`,`regulator`,`file`,`entry_date`,`masa_berlaku`,`id_admin`) values (1,4,'Peraturan Baru OTBAN ',2017,1,'ENGLISH.pptx','2017-08-28 10:27:19','2018-07-31',8),(2,4,'Peraturan Baru OTBAN ',2017,1,'Table of Contents.docx','2017-08-29 15:04:34','2017-08-30',8);

/*Table structure for table `unit` */

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id_unit` int(3) NOT NULL AUTO_INCREMENT,
  `unit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `unit` */

insert  into `unit`(`id_unit`,`unit`) values (1,'Quality Management Section '),(2,'Application Operation & Support Section'),(3,'Airport Technology , Network Operation'),(4,'Airport Readiness Section ');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
