# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.6.27)
# Схема: timetable
# Время создания: 2016-08-04 12:17:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы couriers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `couriers`;

CREATE TABLE `couriers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `couriers` WRITE;
/*!40000 ALTER TABLE `couriers` DISABLE KEYS */;

INSERT INTO `couriers` (`id`, `fio`)
VALUES
	(1,'Иванов'),
	(2,'Петров'),
	(3,'Сидоров'),
	(4,'Фролов'),
	(5,'Соколов'),
	(6,'Орлов'),
	(7,'Королёв'),
	(8,'Семёнов'),
	(9,'Соловьёв'),
	(10,'Крылов');

/*!40000 ALTER TABLE `couriers` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_duration_index` (`duration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`id`, `name`, `duration`)
VALUES
	(1,'Санкт-Петербург',4),
	(2,'Уфа',8),
	(3,'Нижний Новгород',10),
	(4,'Владимир',12),
	(5,'Кострома',14),
	(6,'Екатеринбург',16),
	(7,'Ковров',6),
	(8,'Воронеж',7),
	(9,'Самара',20),
	(10,'Астрахань',22);

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы timetable
# ------------------------------------------------------------

DROP TABLE IF EXISTS `timetable`;

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `date_start` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timetable_region_id_index` (`region_id`),
  KEY `timetable_courier_id_index` (`courier_id`),
  KEY `timetable_date_start_index` (`date_start`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;

INSERT INTO `timetable` (`id`, `region_id`, `courier_id`, `date_start`)
VALUES
	(1,10,1,1470258000),
	(2,1,1,1469826000),
	(3,5,1,1472245200),
	(4,1,3,1470258000),
	(5,7,3,1433106000),
	(6,2,2,1436389200),
	(7,3,3,1443042000),
	(8,4,4,1445547600),
	(9,5,6,1449608400),
	(10,6,7,1470258000),
	(11,7,8,1453237200),
	(12,10,10,1470258000),
	(13,10,9,1460408400),
	(14,6,7,1457298000),
	(15,6,3,1454965200),
	(16,5,4,1453150800),
	(17,7,7,1466542800),
	(18,5,1,1466024400),
	(19,4,4,1457384400),
	(20,5,9,1470862800),
	(21,3,3,1457384400),
	(22,4,8,1470258000),
	(23,10,3,1470862800),
	(24,10,3,1433710800),
	(25,1,6,1470258000),
	(26,1,8,1473800400);

/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
