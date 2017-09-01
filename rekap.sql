<?xml version="1.0" encoding="UTF-8"?>
<schemadesigner version="6.5">
<source>
<database charset="latin1" collation="latin1_swedish_ci">db_bandara</database>
</source>
<canvas zoom="100">
<tables>
<table name="tb_admin" view="colnames">
<left>0</left>
<top>0</top>
<width>120</width>
<height>197</height>
<sql_create_table>CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date_user` datetime DEFAULT NULL,
  `tipe` tinyint(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_admin`),
  KEY `tipe` (`tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="tb_dokumen_baru" view="colnames">
<left>157</left>
<top>266</top>
<width>150</width>
<height>180</height>
<sql_create_table>CREATE TABLE `tb_dokumen_baru` (
  `id_dokumen_baru` int(10) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `id_jenis_dokumen` int(10) DEFAULT NULL,
  `id_keterangan` int(10) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen_baru`),
  KEY `id_admin` (`id_admin`),
  KEY `jenis_dokumen` (`id_jenis_dokumen`),
  KEY `id_keterangan` (`id_keterangan`),
  CONSTRAINT `tb_dokumen_baru_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  CONSTRAINT `tb_dokumen_baru_ibfk_3` FOREIGN KEY (`id_jenis_dokumen`) REFERENCES `tb_jenis_dokumen` (`id_jenis_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="tb_jenis_dokumen" view="colnames">
<left>380</left>
<top>206</top>
<width>150</width>
<height>112</height>
<sql_create_table>CREATE TABLE `tb_jenis_dokumen` (
  `id_jenis_dokumen` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="tb_keterangan" view="colnames">
<left>644</left>
<top>76</top>
<width>128</width>
<height>112</height>
<sql_create_table>CREATE TABLE `tb_keterangan` (
  `id_keterangan` int(10) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keterangan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1</sql_create_table>
</table>
</tables>
</canvas>
</schemadesigner>