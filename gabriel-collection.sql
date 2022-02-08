# ************************************************************
# Sequel Ace SQL dump
# Version 20025
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.37)
# Database: gabriel-collection
# Generation Time: 2022-02-08 12:09:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cat_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cat_types`;

CREATE TABLE `cat_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `breed_name` varchar(255) NOT NULL DEFAULT '',
  `country_of_origin` varchar(255) NOT NULL DEFAULT '',
  `fluffiness_rating` enum('0','1','2','3','4','5') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cat_types` WRITE;
/*!40000 ALTER TABLE `cat_types` DISABLE KEYS */;

INSERT INTO `cat_types` (`id`, `breed_name`, `country_of_origin`, `fluffiness_rating`, `image`)
VALUES
	(1,'Sphynx','Canada','0','https://ae01.alicdn.com/kf/Hda3b838392e74c31bf117ba8c768b6b1g/Cat-Clothes-Winter-Warm-Handmade-Soft-Cats-Knitted-Sweater-Jumper-Sphynx-Cat-Hoodies-Pullover-Sphinx-Kitten.jpg_Q90.jpg_.webp'),
	(2,'Siberian Forest Cat','Russia','4','https://i.imgur.com/yW9lNhf.jpg?1'),
	(3,'Ragdoll','US','4','https://cdn-prd.content.metamorphosis.com/wp-content/uploads/sites/2/2020/12/shutterstock_268007813-1.jpg'),
	(4,'Persian','Iran','5','https://s36537.pcdn.co/wp-content/uploads/2018/11/persian-cat-face.jpg.webp'),
	(5,'Bengal','US','1','https://www.animalshq.com/wp-content/uploads/2021/05/Why-are-Bengal-cats-so-expensive-15-5-1.jpg');

/*!40000 ALTER TABLE `cat_types` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
