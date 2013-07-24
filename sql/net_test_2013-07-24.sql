# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: net_test
# Generation Time: 2013-07-24 09:06:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_idcinfo
# ------------------------------------------------------------

CREATE TABLE `tb_idcinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_ip` char(15) NOT NULL,
  `login_name` varchar(45) NOT NULL,
  `login_passwd` varchar(45) NOT NULL,
  `idc_name` varchar(45) NOT NULL,
  `online_time` date NOT NULL,
  `offline_time` date DEFAULT NULL,
  `port` varchar(45) NOT NULL,
  `basedir` int(10) NOT NULL,
  `idc_status` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `INDEX` (`server_ip`,`online_time`,`offline_time`,`idc_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_netinfo
# ------------------------------------------------------------

CREATE TABLE `tb_netinfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `alias` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `index` (`name`,`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_nettest
# ------------------------------------------------------------

CREATE TABLE `tb_nettest` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `test_time` int(10) DEFAULT NULL,
  `src_ip` char(15) DEFAULT NULL,
  `dst_ip` char(15) DEFAULT NULL,
  `lost_packet` int(3) DEFAULT NULL,
  `min_connect` float(10,3) DEFAULT NULL,
  `avg_connect` float(10,3) DEFAULT NULL,
  `max_connect` float(10,3) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `network` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index` (`test_time`,`src_ip`,`dst_ip`,`lost_packet`,`min_connect`,`avg_connect`,`max_connect`,`province`,`network`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
