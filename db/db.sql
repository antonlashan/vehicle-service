# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.25)
# Database: auto_service
# Generation Time: 2016-07-31 16:36:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table config
# ------------------------------------------------------------

CREATE TABLE `config` (
  `type` varchar(20) NOT NULL DEFAULT '',
  `label` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`type`, `label`, `description`, `price`)
VALUES
	('DIFF_OIL_PER_LTR','Differential Oil','Differential Oil per ltr',32.50),
	('GEAR_OIL_PER_LTR','Gear Oil','Gear Oil per ltr',12.50),
	('GREASE_PER_NIPPLE','Grease Charge','Grease Charge per Nipple',80.00);

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer
# ------------------------------------------------------------

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`)
VALUES
	(1,'Lashan Fernando','antonlashan@gmail.com','0775186150','JOHN \"GULLIBLE\" DOE\r\nCENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY\r\n421 E DRACHMAN\r\nTUCSON AZ 85705-7598\r\nUSA'),
	(2,'Suraj Fernando','suraj@gmail.com','12345685','Cecilia Chapman\r\n711-2880 Nulla St.\r\nMankato Mississippi 96522'),
	(3,'Sunimal Perera','sunimal@gmail.com','0775345697','Iris Watson\r\nP.O. Box 283 8562 Fusce Rd.\r\nFrederick Nebraska 20620'),
	(4,'Sunimal Perera','sunimal@gmail.com','0775345697','Iris Watson\r\nP.O. Box 283 8562 Fusce Rd.\r\nFrederick Nebraska 20620');

/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filter
# ------------------------------------------------------------

CREATE TABLE `filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `filter` WRITE;
/*!40000 ALTER TABLE `filter` DISABLE KEYS */;

INSERT INTO `filter` (`id`, `type`, `name`, `price`)
VALUES
	(1,2,'LX470',750.00);

/*!40000 ALTER TABLE `filter` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lubrication
# ------------------------------------------------------------

CREATE TABLE `lubrication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `engine_oil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table migration
# ------------------------------------------------------------

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1468926819),
	('m130524_201442_init',1468927078);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oil
# ------------------------------------------------------------

CREATE TABLE `oil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oil` WRITE;
/*!40000 ALTER TABLE `oil` DISABLE KEYS */;

INSERT INTO `oil` (`id`, `type`, `name`, `price`)
VALUES
	(1,1,'Caltex 4L',500.00),
	(2,1,'Caltex 2L',300.00),
	(3,1,'Caltex 1L',200.00);

/*!40000 ALTER TABLE `oil` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table registration
# ------------------------------------------------------------

CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(15) NOT NULL DEFAULT '',
  `vehicle_model_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_model_id` (`vehicle_model_id`),
  KEY `customer_id` (`customer_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;

INSERT INTO `registration` (`id`, `vehicle_no`, `vehicle_model_id`, `customer_id`, `created_at`, `created_by`, `updated_at`, `updated_by`)
VALUES
	(1,'BAD-1433',1,1,'2016-07-31 17:04:49',3,'2016-07-31 17:05:27',3),
	(2,'CAB-2376',2,4,'2016-07-31 17:06:38',3,'2016-07-31 20:45:57',3);

/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table service
# ------------------------------------------------------------

CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `registration_id` (`registration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user
# ------------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Lashan','Fernando','c3zgB5wJ96ZqaHqkM40sM2f4XNX66F0c','$2y$13$EVBRYZ6wEo6y5rUiNMtCM.Q90uBud43A1bYi7l.RJj53kx5y1Fy82',NULL,'antonlashan@gmail.com',1,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'Staff',NULL,'8ZtYW9ta2oAgV1BRvZefwc4BEuWhUvQW','$2y$13$mu4J5siYYLUW1HMHgkvjHOP23Kb3urVh98U1PMG6PqW3L4eA9FfuS',NULL,'antonlashan2@gmail.com',2,10,'2016-07-19 17:32:45','2016-07-19 17:32:45');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle
# ------------------------------------------------------------

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;

INSERT INTO `vehicle` (`id`, `name`)
VALUES
	(1,'Car'),
	(2,'Van');

/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle_model
# ------------------------------------------------------------

CREATE TABLE `vehicle_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `model` varchar(20) NOT NULL DEFAULT '',
  `no_of_nipples` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vehicle_model` WRITE;
/*!40000 ALTER TABLE `vehicle_model` DISABLE KEYS */;

INSERT INTO `vehicle_model` (`id`, `vehicle_id`, `model`, `no_of_nipples`)
VALUES
	(1,1,'FB 15',NULL),
	(2,1,'N16',3),
	(3,1,'Toyota IST',2);

/*!40000 ALTER TABLE `vehicle_model` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
