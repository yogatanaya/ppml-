/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.9-MariaDB : Database - db_bandara
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
  `id_cm` int(3) NOT NULL,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `status_cm` int(3) DEFAULT NULL,
  `masa_simpan` int(3) DEFAULT NULL,
  `lokasi_simpan` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `id_metode` int(3) DEFAULT NULL,
  `id_admin` int(3) DEFAULT NULL,
  KEY `id_admin` (`id_admin`),
  KEY `id_metode` (`id_metode`),
  KEY `status_cm` (`status_cm`),
  KEY `id_cm` (`id_cm`),
  CONSTRAINT `catatan_mutu_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  CONSTRAINT `catatan_mutu_ibfk_2` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  CONSTRAINT `catatan_mutu_ibfk_3` FOREIGN KEY (`status_cm`) REFERENCES `status_cm` (`id_status_cm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `catatan_mutu` */

insert  into `catatan_mutu`(`id_cm`,`nama_dokumen`,`judul`,`status_cm`,`masa_simpan`,`lokasi_simpan`,`file`,`id_metode`,`id_admin`) values (0,'pedoman_A','qqq',1,1,'ruang arsip','37040-Lecture 3 Conceptual Model I.ppt',1,2);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `regulator` */

insert  into `regulator`(`id_regulator`,`regulator`) values (1,'DJU '),(2,'Angkasa Pura 1'),(3,'Pemerintah');

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

insert  into `status_dokumen`(`id_status_dokumen`,`status_dokumen`) values (1,'Revisi'),(2,'Setuju'),(3,'Baru');

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date_user` datetime DEFAULT NULL,
  `tipe` tinyint(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_admin`),
  KEY `tipe` (`tipe`),
  KEY `unit` (`unit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`nama_admin`,`unit`,`username`,`password`,`date_user`,`tipe`) values (1,'yogatanaya','Quality Management Section','yogatanaya','123','2017-07-10 11:43:50',0),(2,'ekaarthaputra','Application Operation & Support Section','eka','321','2017-07-10 11:44:21',1),(3,'yudhypratama','Airport Technology & Network Support Section','yudhy','456','2017-07-10 11:44:41',1);

/*Table structure for table `tb_dokumen_baru` */

DROP TABLE IF EXISTS `tb_dokumen_baru`;

CREATE TABLE `tb_dokumen_baru` (
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `jenis_dokumen` int(10) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `revisi` int(3) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  KEY `id_admin` (`id_admin`),
  KEY `jenis_dokumen` (`jenis_dokumen`),
  KEY `id_keterangan` (`keterangan`),
  KEY `status` (`status`),
  CONSTRAINT `tb_dokumen_baru_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  CONSTRAINT `tb_dokumen_baru_ibfk_5` FOREIGN KEY (`jenis_dokumen`) REFERENCES `tb_jenis_dokumen` (`id_jenis_dokumen`),
  CONSTRAINT `tb_dokumen_baru_ibfk_7` FOREIGN KEY (`status`) REFERENCES `status_dokumen` (`id_status_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_dokumen_baru` */

insert  into `tb_dokumen_baru`(`nama_dokumen`,`jenis_dokumen`,`keterangan`,`revisi`,`file`,`status`,`id_admin`,`unit`) values ('pedoman_A',3,'',NULL,'92302-',2,2,''),('manualA',5,'',1,'22139-',2,2,'');

/*Table structure for table `tb_jenis_dokumen` */

DROP TABLE IF EXISTS `tb_jenis_dokumen`;

CREATE TABLE `tb_jenis_dokumen` (
  `id_jenis_dokumen` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenis_dokumen` */

insert  into `tb_jenis_dokumen`(`id_jenis_dokumen`,`jenis_dokumen`) values (1,'Intruksi Kerja'),(3,'pedoman'),(4,'prosedur'),(5,'Manual');

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
  `nomer` int(3) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tahun` int(10) DEFAULT NULL,
  `regulator` int(3) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  KEY `id_admin` (`id_admin`),
  KEY `regulator` (`regulator`),
  KEY `nomer` (`nomer`),
  CONSTRAINT `tb_peraturan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  CONSTRAINT `tb_peraturan_ibfk_3` FOREIGN KEY (`nomer`) REFERENCES `tb_nomer` (`id_nomer`),
  CONSTRAINT `tb_peraturan_ibfk_5` FOREIGN KEY (`regulator`) REFERENCES `regulator` (`id_regulator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_peraturan` */

insert  into `tb_peraturan`(`nomer`,`judul`,`tahun`,`regulator`,`file`,`id_admin`,`unit`) values (2,'no10',2011,3,'86320-Lecture 8 SD.ppt',2,''),(4,'qqq',2012,1,'7408-Lecture 11 Visibility.ppt',2,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
