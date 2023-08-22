/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - palletcraft
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`palletcraft` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `palletcraft`;

/*Table structure for table `carousel` */

DROP TABLE IF EXISTS `carousel`;

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `carousel` */

insert  into `carousel`(`id`,`photo`) values 
(2,'banner1.jpg'),
(3,'banner3.jpg'),
(4,'banner2.jpg');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`id`,`user_id`,`product_id`,`quantity`) values 
(1,9,1,4),
(3,9,4,6),
(4,9,12,2),
(7,20,43,1),
(8,20,67,1),
(9,19,28,1),
(10,19,67,1),
(11,19,51,1),
(12,21,51,3),
(41,16,51,1),
(42,16,63,3),
(64,22,38,1),
(116,48,38,1),
(121,37,37,1);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`cat_slug`) values 
(2,'Packages','Packages'),
(3,'Plant Stand','Plant Stand'),
(4,'Home Decoration','Home Decoration');

/*Table structure for table `chair_color` */

DROP TABLE IF EXISTS `chair_color`;

CREATE TABLE `chair_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(200) NOT NULL,
  `shape` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` double NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chair_color` */

insert  into `chair_color`(`id`,`color`,`shape`,`photo`,`price`) values 
(1,'Natural','Round-Chair ','round chair natural.jpg',200),
(2,'Mahogany','Round-Chair ','round chair mahony.jpg',200),
(3,'Maple','Round-Chair ','round chair mapple.jpg',200),
(4,'Black','Round-Chair ','round chair black.jpg',200),
(5,'Gray','Round-Chair ','round chair gray.jpg',200),
(6,'White','Round-Chair ','round chair white.jpg',200),
(8,'Natural','Square-Chair ','saquare chair natural.jpg',200),
(9,'Mahogany','Square-Chair ','saquare chair mahogany.jpg',200),
(10,'Maple','Square-Chair ','saquare chair mapple.jpg',200),
(11,'Black','Square-Chair ','saquare chair black.jpg',200),
(12,'Gray','Square-Chair ','saquare chair gray.jpg',200),
(13,'White','Square-Chair ','saquare chair white.jpg',200);

/*Table structure for table `chair_height` */

DROP TABLE IF EXISTS `chair_height`;

CREATE TABLE `chair_height` (
  `id` int(11) NOT NULL,
  `height` varchar(200) NOT NULL,
  `shape` varchar(200) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `chair_height` */

insert  into `chair_height`(`id`,`height`,`shape`,`photo`,`price`) values 
(1,'Dining-Table-Chair(18-inches,45-50cm,1.5ft)','Round-Chair ','round chair natural.jpg',700),
(2,'Dining-Table-Chair(18-inches,45-50cm,1.5ft)','Round-Chair ','round chair natural.jpg',700),
(3,'Desk-Chair-Height(18-inches,45-50cm,1.5ft)','Round-Chair ','round chair natural.jpg',700),
(4,'Bar-Chair-Height(30-inches,76cm,2.5ft)','Round-Chair ','round chair natural.jpg',700),
(5,'Counter-Chair-Height(24-inches,61cm,2ft)','Round-Chair ','round chair natural.jpg',700),
(6,'Bench-Height(18-inches,45-50cm,1.5ft)','Round-Chair ','round chair natural.jpg',700),
(7,'Dining-Table-Chair(18-inches,45-50cm,1.5ft)','Round-Chair ','round chair natural.jpg',700),
(8,'Desk-Chair-Height(18-inches,45-50cm,1.5ft)','Square-Chair ','saquare chair natural.jpg',700),
(9,'Bar-Chair Height-(30-inches,76cm,2.5ft)','Square-Chair ','saquare chair natural.jpg',700),
(10,'Counter-Chair-Height(24-inches,61cm,2ft)','Square-Chair ','saquare chair natural.jpg',700),
(11,'Bench-Height-(18-inches,45-50cm,1.5ft)','Square-Chair ','saquare chair natural.jpg',700),
(12,'Desk-Chair-Height(18-inches,45-50cm,1.5ft)','Square-Chair ','saquare chair natural.jpg',700),
(13,'Dining-Table-Chair(18-inches,45-50cm,1.5ft)','Square-Chair ','saquare chair natural.jpg',700);

/*Table structure for table `customization_order` */

DROP TABLE IF EXISTS `customization_order`;

CREATE TABLE `customization_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `ordertype` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `total_price` double NOT NULL,
  `downpayment` double NOT NULL,
  `dateDelivered1` varchar(255) NOT NULL,
  `order_received1` varchar(255) NOT NULL,
  `order_status` text NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customization_order` */

insert  into `customization_order`(`id`,`user_id`,`name`,`confirmation`,`detail`,`color`,`quantity`,`ordertype`,`province`,`town`,`barangay`,`total_price`,`downpayment`,`dateDelivered1`,`order_received1`,`order_status`,`order_date`) values 
(13,55,'Plant Stand','AWJDERH1','1-Layer,layer-1-with-3-platform','Natural',1,'delivery','0133','013313','013313030',800,240,'2023-02-08 09:54:01am','2023-02-14 02:44:35am','completed','2023-02-08 09:54:01'),
(14,55,'Chair','7NVZQHOL','Round-Chair,Standard-size','Natural',1,'delivery','0155','015537','015537004',1900,570,'2023-02-08 10:06:38am','2023-02-13 07:14:55pm','completed','2023-02-08 10:06:38'),
(15,55,'Table','SZ6XWDY','Coffee-Table','Mahogany',1,'delivery','0129','012928','012928027',1200,360,'2023-02-08 10:10:12am','2023-02-14 02:37:59am','completed','2023-02-08 10:10:12'),
(16,55,'Plant Stand','Q24SSIH','1-Layer,layer-1-with-3-platform','Mahogany',1,'delivery','0133','013313','013313030',800,240,'2023-02-09 07:45:45pm','2023-02-09 07:45:45pm','pending','2023-02-09 07:45:45'),
(17,55,'Chair','YHZSZO3','Round-Chair,Dining-Table-Chair(18-inches,45-50cm,1.5ft)','Black',1,'pickup','1401',NULL,NULL,1400,420,'2023-02-13 06:12:15pm','2023-02-09 07:46:01pm','completed','2023-02-09 07:46:01'),
(18,55,'Table','V7TW5ZTN','1000','Mahogany',1,'pickup','1401',NULL,NULL,1200,360,'2023-02-13 06:28:42pm','2023-02-09 07:46:46pm','completed','2023-02-09 07:46:46'),
(19,55,'Plant Stand','XTNGBT16','4-Layers,16-Platform','Black',1,'pickup','1401',NULL,NULL,1700,510,'2023-02-13 06:18:14pm','2023-02-09 09:00:18pm','completed','2023-02-09 09:00:18'),
(20,55,'Plant Stand','PTUGTDUG','1-Layer,layer-1-with-3-platform','Mahogany',1,'pickup','1401',NULL,NULL,800,240,'2023-02-14 02:44:10am','2023-02-13 08:05:17pm','completed','2023-02-13 08:05:17'),
(21,55,'Chair','B1C3CDFH','Round-Chair,Desk-Chair-Height(18-inches,45-50cm,1.5ft)','Maple',1,'delivery','0314','031417','031417020',1400,420,'2023-02-13 08:05:36pm','2023-02-13 08:05:36pm','pending','2023-02-13 08:05:36');

/*Table structure for table `customize_chair_shape` */

DROP TABLE IF EXISTS `customize_chair_shape`;

CREATE TABLE `customize_chair_shape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shape` varchar(200) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_chair_shape` */

insert  into `customize_chair_shape`(`id`,`shape`,`photo`,`price`) values 
(1,'Round-Chair ','round chair natural.jpg',1200),
(2,'Square-Chair ','saquare chair natural.jpg',1200);

/*Table structure for table `customize_flatform_quantity` */

DROP TABLE IF EXISTS `customize_flatform_quantity`;

CREATE TABLE `customize_flatform_quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flatform_quantity` varchar(100) NOT NULL,
  `layer` varchar(100) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_flatform_quantity` */

insert  into `customize_flatform_quantity`(`id`,`flatform_quantity`,`layer`,`photo`,`price`) values 
(4,'4-Platform','1-Layer','layer 1 with 3 platform.png',80),
(5,'layer-1-with-3-platform','1-Layer','layer 1 with 6 platforms.png',100),
(6,'layer-1-with-8-platforms','1-Layer','layer 1 with 8 platforms.png',120),
(7,'layer-2-with-6-platforms','2-Layer','layer 2 with 6 platforms.png',140),
(8,'layer-2-with-9-platforms','2-Layer','layer 2 with 9platforms.png',160),
(9,'layer-2-with-13-platforms','2-Layer','layer 2 with 13 platforms.png',180),
(10,'layer-2-with-15-platforms','2-Layer','layer 2 with 15 platforms.png',200),
(11,'layer-3-with-12-platforms','3-Layer','layer 3 with 12 platforms.png',220),
(12,'layer-3-with-16-platforms','3-Layer','layer 3 with 16 platforms.png',240),
(13,'layer-3-with-18-platforms','3-Layer','layer 3 with 18 platforms.png',260),
(14,'14-Platform','4-Layers','',280),
(15,'16-Platform','4-Layers','layer 4 - 16 plat natural.jpg',300);

/*Table structure for table `customize_ps_color` */

DROP TABLE IF EXISTS `customize_ps_color`;

CREATE TABLE `customize_ps_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(200) NOT NULL,
  `flatform_quantity` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_ps_color` */

insert  into `customize_ps_color`(`id`,`color`,`flatform_quantity`,`photo`,`price`) values 
(1,'Natural','layer-1-with-3-platform','layer 1 - 3 plat natural.jpg',200),
(2,'Mahogany','layer-1-with-3-platform','layer 1 - 3 plat mahogany.jpg',200),
(6,'Maple','layer-1-with-3-platform','layer 1 - 3 plat maple.jpg',200),
(10,'Black','layer-1-with-3-platform','layer 1 - 3 plat black.jpg',200),
(11,'Gray','layer-1-with-3-platform','layer 1 - 3 plat gray.jpg',200),
(12,'White','layer-1-with-3-platform','layer 1 - 3 plat white.jpg',200),
(13,'Natural','layer-1-with-8-platforms','layer 1 - 8  plat natural.jpg',200),
(14,'Mahogany','layer-1-with-8-platforms','layer 1 - 8  plat mahogany.jpg',200),
(15,'Maple','layer-1-with-8-platforms','layer 1 - 8  plat maple.jpg',200),
(16,'Black','layer-1-with-8-platforms','layer 1 - 8  plat black.jpg',200),
(17,'Gray','layer-1-with-8-platforms','layer 1 - 8 plat gray.jpg',200),
(18,'White','layer-1-with-8-platforms','layer 1 - 8 plat white.jpg',200),
(19,'Natural','layer-2-with-6-platforms','',200),
(20,'Mahogany','layer-2-with-6-platforms','',200),
(21,'Maple','layer-2-with-6-platforms','',200),
(22,'Black','layer-2-with-6-platforms','',200),
(23,'Gray','layer-2-with-6-platforms','',200),
(24,'White','layer-2-with-6-platforms','',200),
(25,'Natural','layer-2-with-9-platforms','layer 2 - 9 plat natural.jpg',200),
(26,'Mahogany','layer-2-with-9-platforms','layer 2 - 9 plat mahogany.jpg',200),
(27,'Maple','layer-2-with-9-platforms','layer 2 - 9 plat mapple.jpg',200),
(28,'Black','layer-2-with-9-platforms','layer 2 - 9 plat black.jpg',200),
(29,'Gray','layer-2-with-9-platforms','layer 2 - 9 plat white.jpg',200),
(30,'White','layer-2-with-9-platforms','layer 2 - 9 plat white.jpg',200),
(31,'Natural','layer-2-with-13-platforms','layer 2 - 13 plat natural.jpg',200),
(32,'Mahogany','layer-2-with-13-platforms','layer 2 - 13 plat mahogany.jpg',200),
(33,'Maple','layer-2-with-13-platforms','layer 2 - 13 plat mapple.jpg',200),
(34,'Black','layer-2-with-13-platforms','layer 2 - 13 plat black.jpg',200),
(35,'Gray','layer-2-with-13-platforms','layer 2 - 13 plat gray.jpg',200),
(36,'White','layer-2-with-13-platforms','layer 2 - 13 plat white.jpg',200),
(37,'Natural','layer-2-with-15-platforms','layer 2 - 15 plat natural.jpg',200),
(38,'Mahogany','layer-2-with-15-platforms','layer 2 - 15plat mahogany.jpg',200),
(39,'Maple','layer-2-with-15-platforms','layer 2 - 15plat mapple.jpg',200),
(40,'Black','layer-2-with-15-platforms','layer 2 - 15 plat black.jpg',200),
(41,'Gray','layer-2-with-15-platforms','layer 2 - 15 plat gray.jpg',200),
(42,'White','layer-2-with-15-platforms','layer 2 - 15plat white.jpg',200),
(43,'Natural','layer-3-with-12-platforms','',200),
(44,'Mahogany','layer-3-with-12-platforms','',200),
(45,'Maple','layer-3-with-12-platforms','',200),
(46,'Black','layer-3-with-12-platforms','',200),
(47,'Gray','layer-3-with-12-platforms','',200),
(48,'White','layer-3-with-12-platforms','',200),
(49,'Natural','layer-3-with-16-platforms','layer 3 - 16 plat natural.jpg',200),
(50,'Mahogany','layer-3-with-16-platforms','layer 3 - 16 plat mahogany.jpg',200),
(51,'Maple','layer-3-with-16-platforms','layer 3 - 16 plat maple.jpg',200),
(52,'Black','layer-3-with-16-platforms','layer 3 - 16 plat black.jpg',200),
(53,'Gray','layer-3-with-16-platforms','layer 3 - 16 plat gray.jpg',200),
(54,'White','layer-3-with-16-platforms','layer 2 - 15plat white.jpg',200),
(55,'Natural','layer-3-with-18-platforms','layer 3 - 18 plat natural.jpg',200),
(56,'Mahogany','layer-3-with-18-platforms','layer 3 - 18 plat mahogany.jpg',200),
(57,'Maple','layer-3-with-18-platforms','layer 3 - 18 plat maple.jpg',200),
(58,'Black','layer-3-with-18-platforms','layer 3 - 18 plat black.jpg',200),
(59,'Gray','layer-3-with-18-platforms','layer 3 - 18 plat gray.jpg',200),
(60,'White','layer-3-with-18-platforms','layer 3 - 16 plat white.jpg',200),
(61,'Natural','16-Platform','layer 4 - 16 plat natural.jpg',200),
(62,'Mahogany','16-Platform','layer 4 - 16 plat mahogany.jpg',200),
(63,'Maple','16-Platform','layer 4 - 16 plat mapple.jpg',200),
(64,'Black','16-Platform','layer 4 - 16 plat black.jpg',200),
(65,'Gray','16-Platform','layer 4 - 16 plat gray.jpg',200),
(66,'White','16-Platform','layer 4 - 16 plat white.jpg',200);

/*Table structure for table `customize_ps_layer` */

DROP TABLE IF EXISTS `customize_ps_layer`;

CREATE TABLE `customize_ps_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layer` text NOT NULL,
  `photo` varbinary(250) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_ps_layer` */

insert  into `customize_ps_layer`(`id`,`layer`,`photo`,`price`) values 
(1,'1-Layer','Layer 1.png',500),
(2,'2-Layer','layer 2.png',700),
(3,'3-Layer','layer 3.png',800),
(4,'4-Layers','llallallllallallllal.png',1200);

/*Table structure for table `customize_table_shape` */

DROP TABLE IF EXISTS `customize_table_shape`;

CREATE TABLE `customize_table_shape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_shape` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_table_shape` */

insert  into `customize_table_shape`(`id`,`table_shape`,`photo`,`price`) values 
(1,'round','round table natural.jpg',1000),
(2,'square','Table Natural.jpg',1000);

/*Table structure for table `details` */

DROP TABLE IF EXISTS `details`;

CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `details` */

insert  into `details`(`id`,`sales_id`,`product_id`,`quantity`) values 
(1,1,38,1),
(2,2,37,1),
(3,3,37,1),
(4,4,37,1),
(5,5,37,1),
(6,6,37,1),
(7,7,66,1),
(8,8,67,1),
(9,11,36,3),
(10,12,50,5),
(11,13,66,5),
(12,18,52,3),
(13,19,66,5),
(14,20,51,4),
(15,4,50,5),
(16,5,50,10),
(17,6,52,5),
(18,7,37,5);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `pallet_quantity` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`name`,`description`,`slug`,`price`,`p_quantity`,`pallet_quantity`,`photo`,`date_view`,`counter`) values 
(36,2,'4 Chairs and a Table brown Pallet ','<p>A Garden Pallet with one table and 4 chairs in the color of mahogany.&nbsp;Good for your garden and also for your Veranda.</p>\r\n\r\n<p><strong>Type:</strong>&nbsp;Outdoor<br />\r\n<strong>Color: </strong>Mahogany</p>\r\n','4-chairs-and-table-brown-pallet',7000,100,10,'2-chairs_1672392918.png','2023-02-08',2),
(37,2,'1 Square Table with 4 square chair','<p>A simple table sets for outdoor places made out of pallets</p>\r\n\r\n<p><strong>Type:</strong>&nbsp;Outdoor</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n','1-square-table-4-square-chair',2500,280,1510,'3-chairs_1672392413.png','2023-02-09',1),
(38,2,'Long bench chair and Long dinning table','<p>Here is our complete garden set completely made out of repurposed wooden pallets: chair, table, stool, and bench</p>\r\n\r\n<p><strong>Type:</strong>&nbsp;Outdoor</p>\r\n\r\n<p><strong>Color:</strong> Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','long-bench-chair-and-long-dinning-table',5000,20,20,'4-chair-1-table_1672392421.png','2023-02-04',1),
(39,2,'Garden Dining Set','<p>Pallet Wood Garden Dining Set with 4 chairs and a table just the right size for fun lunches with the family or intimate evening dining for two.</p>\r\n\r\n<p><strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','garden-dining-set',3500,40,1020,'garden-dining-set_1672392429.png','2023-02-04',1),
(40,2,'Garden Pallet Table & Chairs','<p>Garden Pallet Table &amp; Chairs Pallet Benches, Pallet Chairs &amp; StoolsPallet Desks &amp; Pallet Tables</p>\r\n\r\n<p><strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(14x14x31)</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','garden-pallet-table-chairs',2500,10,10,'garden-pallet-table-chairs_1672392438.png','2023-01-12',2),
(50,3,'3 Layered Plant stand Pallet','<p>A simple but elegant plant stand made out of pallets.<br />\r\n<strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Color:</strong> White</p>\r\n','3-layered-plant-stand-pallet',2500,185,10,'plant-stand-3_1672392355.png','2023-02-08',8),
(51,3,'5 Layered tower design plant stand ','<p>Plant stand that can be in the outdoor and outdoor.<br />\r\n<strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n','5-layered-tower-design-plant-stand',1000,100,10,'plant-stand-4_1672392364.png','2023-02-08',2),
(52,3,'Three steps Plant stand','<p>Simple pallet design like a stairs plant stand.<br />\r\n<strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','three-steps-plant-stand',1000,106,10,'plant-stand-5_1672392372.png','2023-02-08',2),
(59,3,'3 Layer plantstand','<p>3 Layer plantstand with a Natural Color<br />\r\n<strong>Type:</strong> Indoor/Outdoor</p>\r\n','3-layer-plantstand',1000,250,960,'plant-stand-1_1672392339.png','2023-01-30',1),
(64,4,'Pallet Wall Shelve ','<p>6 Pallet wall shelves design goods for indoor<br />\r\n<strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n','pallet-wall-shelve',2500,100,10,'home-deco-2_1672392075.png','2023-02-08',1),
(66,4,'Cross Pallet Home decoration','<p>Home decoration cross design for indoor decoration.<br />\r\n<strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Rustic&nbsp;</p>\r\n','cross-pallet-home-decoration',1500,100,10,'home-deco-1_1672392065.png','2023-02-08',2),
(67,4,'Wall home decoration Shelves','<p>Simple home decoration shelves. It&#39;s good for displaying picture frames, and small vases.<br />\r\n<strong>Type:</strong> Indoor</p>\r\n','wall-home-decoration-shelves',1000,10,10,'home-deco-5_1672392092.png','2023-02-08',1),
(72,4,'Pallet Stairs wall design ','<p>3 layer pallets wall design&nbsp;</p>\r\n\r\n<p><strong>Type:</strong> Indoor</p>\r\n\r\n<p>&nbsp;</p>\r\n','pallet-stairs-wall-design',500,10,10,'home-deco-4_1672392085.png','2023-01-30',1),
(77,4,'Wall mounted Shelve','<p>Wall shelving for displays like vases, pictures, etc.<br />\r\n<strong>Type:&nbsp;</strong>Indoor<br />\r\n&nbsp;</p>\r\n','wall-mounted-shelve',1300,10,10,'pallet_1672392100.png','2023-02-08',1),
(80,4,'Nabiii','<p>Nabiii</p>\r\n','nabiii',1000,20,20,'','0000-00-00',0);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `ordertype` varchar(50) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `dateDelivered` varchar(100) NOT NULL DEFAULT 'current_timestamp()',
  `order_received` varchar(100) NOT NULL DEFAULT 'current_timestamp()',
  `order_status` text NOT NULL,
  `sales_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`id`,`user_id`,`confirmation`,`ordertype`,`province`,`city`,`barangay`,`dateDelivered`,`order_received`,`order_status`,`sales_date`) values 
(1,55,'56DTBSD4','pickup',NULL,NULL,NULL,'2023-02-08 07:31:26am','2023-02-08 07:31:26am','pending','2023-02-08'),
(2,55,'TNC524HW','pickup',NULL,NULL,NULL,'2023-02-08 07:33:04am','2023-02-08 07:33:04am','pending','2023-02-08'),
(3,55,'QUBREZEV','pickup',NULL,NULL,NULL,'2023-02-08 07:33:42am','2023-02-08 07:33:42am','pending','2023-02-08'),
(4,55,'KN32KIUU','pickup',NULL,NULL,NULL,'2023-02-08 07:40:08am','2023-02-08 07:40:08am','pending','2023-02-08'),
(5,55,'WUHJSDSE','pickup',NULL,NULL,NULL,'2023-02-08 07:40:45am','2023-02-08 07:40:45am','pending','2023-02-08'),
(6,55,'F6J1D3X','delivery','0133','013313','013313030','2023-02-08 09:33:07am','2023-02-08 09:33:07am','pending','2023-02-08'),
(7,55,'6D7R61KY','delivery','0133','013313','013313030','2023-02-09 08:17:59pm','2023-02-09 08:17:59pm','pending','2023-02-09');

/*Table structure for table `stock_list` */

DROP TABLE IF EXISTS `stock_list`;

CREATE TABLE `stock_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` text NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `stock_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock_list` */

insert  into `stock_list`(`id`,`material_name`,`quantity`,`stock_date`) values 
(1,'Pallet','1000','2022-09-30 00:00:00');

/*Table structure for table `stockin_history` */

DROP TABLE IF EXISTS `stockin_history`;

CREATE TABLE `stockin_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `stock_quantity` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stockin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stockin_history` */

insert  into `stockin_history`(`id`,`name`,`stock_quantity`,`status`,`date_stockin`) values 
(1,'Pallet',1000,'Stock In','2023-02-13 00:00:00'),
(2,'Pallet',1000,'Stock In','2023-02-13 00:00:00'),
(3,'Pallet',1000,'Stock In','2023-02-13 00:00:00');

/*Table structure for table `stockout_history` */

DROP TABLE IF EXISTS `stockout_history`;

CREATE TABLE `stockout_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customid` int(11) NOT NULL,
  `materials_name` text NOT NULL,
  `stockout_quantity` int(20) NOT NULL,
  `source` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stockout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stockout_history` */

insert  into `stockout_history`(`id`,`customid`,`materials_name`,`stockout_quantity`,`source`,`status`,`date_stockout`) values 
(1,0,'1 Square Table with 4 square chair',10,'1 Square Table with 4 square chair','Stock Out','2023-02-13'),
(2,0,'Pallet',10,'1 Square Table with 4 square chair','Stock Out','2023-02-13'),
(3,0,'Pallet',10,'1 Square Table with 4 square chair','Stock Out','2023-02-13'),
(4,0,'Pallet',10,'Garden Dining Set','Stock Out','2023-02-13'),
(5,0,'Pallet',10,'Long bench chair and Long dinning table','Stock Out','2023-02-14'),
(6,0,'Pallet',500,'Garden Dining Set','Stock Out','2023-02-14');

/*Table structure for table `system_info` */

DROP TABLE IF EXISTS `system_info`;

CREATE TABLE `system_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `system_info` */

insert  into `system_info`(`id`,`name`,`description`) values 
(1,'About Us\r\n','<h1><strong>About us</strong></h1>\r\n\r\n<p><strong><a href=\"https://scontent.fcrk1-3.fna.fbcdn.net/v/t1.6435-9/150954357_428518594869141_4634394968612893506_n.jpg?_nc_cat=101&amp;ccb=1-7&amp;_nc_sid=174925&amp;_nc_eui2=AeHko-tvoCtEpeEzQOQ8h1DE2eUQOu3Y6NLZ5RA67djo0pxmoUitBRU_BaTd9A5qllULwn0Pdp-pfGNtSdJ7G-Yu&amp;_nc_ohc=S7eAKhwLJxwAX8AaueT&amp;_nc_oc=AQkeJWRefQI6CfX970lI_X8Mn4M-1QtGcRA-YaGr96o-w6xZUaBAtTa7CUYMIHbGJvw&amp;_nc_ht=scontent.fcrk1-3.fna&amp;oh=00_AfBatgybL9qfDOouJdGjOjW5UtThzTVNxhUep6w0KqowmQ&amp;oe=63E4C57C\" target=\"_top\"><img alt=\"\" src=\"https://scontent.fcrk1-3.fna.fbcdn.net/v/t1.6435-9/150954357_428518594869141_4634394968612893506_n.jpg?_nc_cat=101&amp;ccb=1-7&amp;_nc_sid=174925&amp;_nc_eui2=AeHko-tvoCtEpeEzQOQ8h1DE2eUQOu3Y6NLZ5RA67djo0pxmoUitBRU_BaTd9A5qllULwn0Pdp-pfGNtSdJ7G-Yu&amp;_nc_ohc=S7eAKhwLJxwAX8AaueT&amp;_nc_oc=AQkeJWRefQI6CfX970lI_X8Mn4M-1QtGcRA-YaGr96o-w6xZUaBAtTa7CUYMIHbGJvw&amp;_nc_ht=scontent.fcrk1-3.fna&amp;oh=00_AfBatgybL9qfDOouJdGjOjW5UtThzTVNxhUep6w0KqowmQ&amp;oe=63E4C57C\" style=\"border-style:solid; border-width:0px; float:left; height:380px; margin-left:10px; margin-right:10px; width:380px\" /></a></strong>&nbsp;<big>My Story why Pallet?</big></p>\r\n\r\n<p><big>To all consumers of products out of pallet thank you to all of you. just want to share &quot;THE JOURNEY OF PALLET the palettes/palochina are imported woods overlay of various impoted goods, machines, chemicals. after the goods are being delivered. The pallet is just thrown away or in other words garbage. most of the palettes are very dirty, there is mud, grease, paint, uneven size, there is wide, there is thin, there is short, there are cracks, there are also holes, Which is nailed, rough, different colors there&#39;s white, orange, black, brown, light brown and so on. Those pallet were dirty, ugly to look at. garbage, no one pays attention, it&#39;s piled up somewhere, then the value of him as a base is over. But if it is used again, being polished. it will be used on things that the person who took and noticed palettes have even more to use of these. it&#39;s just that the holes can&#39;t be removed. the nails, and other things from the previous ones that is used pallet is my story, i could also somewhat your story. You thought you were okay after your purpose was gone, after you were used it was piled up somewhere. being ignored, because it has been used. and because you&#39;re dirty it&#39;s not like the old young boy, handsome, beautiful. lots of holes because of the nails. promises that has not been fulfilled, more cuts because of your unpleasant experiences. you thought life was over. it&#39;s okay now, you have already done what you think is your purpose. but guesss what, if the pallet went in the right hand, there are more plans to use in it. just like our lives, our lives are broken, dirty, fragmented, Lot of holes, broken cuts overload in the MIGHTY HAND OF THE LORD THERE IS AN EVEN GREATER PURPOSE IN LIFE THAN YOU THINK. GOD WILL USE OUR MESSY LIFE INTO A MESSAGE OF HOPE, OUR BROKENESS INTO A BEAUTIFUL MASTERPIECE, our un noticed story into &quot;HIS.TORY.&quot; give your life to the AUTHOR AND ARCHITECT of LIFE, i will make sure you will be amazed how God will turn your life for HIS glory.&nbsp;</big></p>\r\n'),
(2,'Facts & Tips','<h1><strong>FACTS &amp; TIPS</strong></h1>\r\n\r\n<p><big><strong>Facts about Pallets</strong></big></p>\r\n\r\n<p><big>- Did you know? Over 70% of all wooden are now recycled - a much higher recycling rate than for aluminium, paper, or plastic</big></p>\r\n\r\n<p><big>- Pallets Support the 3R concept of Reduce, Reuse and Recycle.</big></p>\r\n\r\n<p><big>- Millions of pallets go into a landfill every year, rather than continuing this wasteful practice, Many in the DIY world have been converting perfectly good wood from pallets into new useful items. Pallet upcyclings started gaining popularity in the last decade and has now become a growing obsession for crafty folks everywhere.</big></p>\r\n\r\n<p><big><strong>TIPS</strong></big></p>\r\n\r\n<p><big>Many factors are considered when selecting kitchen cabinets; one that is most commonly considered is whether the pallet crafts are reasonable, long-lasting, and easily maintainable. Typically for house furniture or outside furniture, people prefer taking the pallets apart to cleaning them with a high-pressure cleaner. Still, for cleaning and maintaining your pallet crafts, you can use these methods and keep your pallet wood crafts preserved for a long:</big></p>\r\n\r\n<h3><img alt=\"\" src=\"https://img.freepik.com/premium-photo/close-up-cleaning-home-wood-table-sanitizing-kitchen-table-surface-with-disinfectant-antibacterial-spray-bottle-washing-surfaces-with-towel-gloves_124463-1626.jpg?w=740\" style=\"float:left; height:332px; margin-left:6px; margin-right:6px; width:500px\" /></h3>\r\n\r\n<p><big><strong>1</strong>.<strong>Use Dish Detergent</strong></big></p>\r\n\r\n<p><big>Another good practice is to use natural and organic products. For example, you can also use lime juice or olive oil, leaving you with a refreshing smell and natural polish. It will help keep the pallet crafts clean without getting damaged by harsh products.</big></p>\r\n\r\n<p><big>If necessary, use detergent. If you have a stain on the wood, you can remove it with water and a mild dish detergent. After rinsing with a damp cloth containing only water, wipe with a soft dry cloth. There are numerous natural cleaning products available if you prefer to use them. For example, lime juice can be used to clean effectively and leave a pleasant odor. Olive oil is not as effective as a natural polisher, but it will make your furniture shine</big></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><img alt=\"\" src=\"https://i.pinimg.com/564x/42/fd/5a/42fd5a7795a103fd2db6dcf170445477.jpg\" style=\"float:left; height:375px; margin-left:6px; margin-right:6px; width:500px\" /></strong></h3>\r\n\r\n<p><big><strong>2. Oil the Pallets</strong>&nbsp;</big></p>\r\n\r\n<p><big>If you want to maintain and preserve your furniture for a long time, you can always rely on the power of oil. Oil furniture like chairs and benches is typical to give them a new look and make them look less worn out. Oiling your&nbsp;pallet crafts will enhance their resistance to grease and&nbsp;moisture. Keep in mind to use pallet-friendly nontoxic material for cleaning. You can use nontoxic oils like the food-grade mineral oil to keep things healthy. Oiling will give your pallet crafts a fresh look and preserve them&nbsp;over a more extended period against the harsh&nbsp;environment of the kitchen.</big></p>\r\n\r\n<p><big>Repair scratches Cover up minor blemishes with liquid polish. If the damage is too visible to be repaired with polishes or touch-up sticks, you should consider painting your furniture. Of course, if you insist on keeping it. Painting a piece of damaged furniture will give it new life and many more years of service.</big></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>3. Keep the dust away</strong></big></p>\r\n\r\n<p><big>A downside to using pallet wood for making pallet crafts is high maintenance. You will need to clean it regularly to keep the dust away because dust can also damage the look of the pallet crafts. Pallets can quickly accumulate dust, and as dull as it may sound, you must dust them off frequently. If the dust accumulates on the pallets, it will scratch the surface of the wood. For this purpose, you can use lambswool dusters or soft clothes like cotton or microfibers that won&rsquo;t mark the wood while cleaning.</big></p>\r\n\r\n<h3><img alt=\"\" src=\"https://i.pinimg.com/564x/e3/fb/e3/e3fbe3ca147ea2c00517c4f1bc29d304.jpg\" style=\"float:left; height:281px; margin-left:6px; margin-right:6px; width:500px\" /></h3>\r\n\r\n<h3><big><strong>4.Cover Scratches Immediately</strong></big></h3>\r\n\r\n<p><big>Scratches are harmful to pallet wood crafts because they will accumulate dust, grease, bacteria, and moisture very quickly, which damages the pallet crafts. If you see any scratches forming on the wood surface, cover them immediately by using wood polish. Using wood polish will give you a protective layer over the wood surface to prevent any scratches or other harmful materials from accumulating on the surface. But if the scratches are too prominent to go away using polish, you can also use paint. Painting the pallet crafts will give them an entirely new look and make them look fresh while protecting them against damage. This way, you can make your pallet wood crafts last longer.</big></p>\r\n\r\n<p><big>Remove dust on a regular basis. It is tedious, but it is extremely beneficial to your furniture. Dusting your furniture on a daily basis will protect it from airborne particles. If you leave particles on the wood for too long, they will form a layer of dust that will scratch the surface. To avoid this, always wear soft cloth-like cotton T-shirts or microfibers. Because they effectively attract and hold dust, lambswool dusters are ideal for ornate carvings or hard-to-reach areas. The key to dusting is to use dusters that will not scratch the furniture. Stick to gentle dusters like feather duster, terry towels, or cotton T-shirts.</big></p>\r\n\r\n<h3><img alt=\"\" src=\"https://i.pinimg.com/564x/0d/7f/26/0d7f266a123ed1b6fffca11a24cc8a26.jpg\" style=\"float:left; height:350px; margin-left:6px; margin-right:6px; width:500px\" /></h3>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp; <big>5.Wax the Wood </big></strong></p>\r\n\r\n<p><big>Waxing furniture is a common practice for preserving it over longer terms and making it look fresh. It is usually used to seal the paint and is famous for crafts. Make sure to clean your pallet crafts using fine wool and apply the wax with minimum pressure. One of the advantages of waxing is that it can be reapplied whenever necessary and does not require any expertise. Pallet crafts are finished with varnish for naturally glossy, as a time goes by it is normally fading so all you need to do is to retouch it again For outdoor pallet crafts avoid soaking it into the</big> water.</p>\r\n'),
(3,'Policies/ Term & Services','<h1><strong>TERMS OF SERVICE </strong></h1>\r\n\r\n<h3><strong>INTRODUCTION</strong></h3>\r\n\r\n<ul>\r\n	<li>1.1 Welcome to the Pallet Crafts platform (the &quot;Site&quot;). The &quot;Services&quot; we provide or make available include (a) the Site, (b) the services provided by the Site and by Pallet Crafts client software made available through the Site, and (c) all information, linked pages, features, data, text, images, photographs, graphics, music, sounds, video (including live streams), messages, tags, content, programming, software, application services (including, without limitation, any mobile application services) or other materials made available through the Site or its related services (&quot;Content&quot;). Any new features added to or augmenting the Services are also subject to these Terms of Service. These Terms of Service govern your use of Services provided by Pallet Crafts.</li>\r\n	<li>1.2 Pallet Crafts reserves the right to change, modify, suspend or discontinue all or any part of this Site or the Services at any time or upon notice as required by local laws. Pallet Crafts may release certain Services or their features in a beta version, which may not work correctly or in the same way the final version may work, and we shall not be held liable in such instances. Pallet Crafts may also impose limits on certain features or restrict your access to parts of or the entire, Site or Services in its sole discretion and without notice or liability.</li>\r\n	<li>1.3 Pallet Crafts reserves the right to refuse to provide access to the Site or Services or to allow you to open an Account for any reason.</li>\r\n</ul>\r\n\r\n<h1><strong>PRIVACY</strong></h1>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>2.1 <strong>When you give it to us or permit us to obtain it</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>When you sign up for or use Pinterest, you voluntarily share certain information, including your name, email address, phone number, photos, Pins, comments, and any other information you give us. You can also share your precise location using your device settings or pictures. We will still use your IP address, which is used to approximate your Site, even if you don&#39;t choose to share your precise location. You will also have the option to share other information about yourself, such as your gender, age, and preferred language.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>2.2<strong> </strong><strong>We also get technical information when you use Pallet Crafts</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>When you use a website, mobile application, or other Internet services, specific Internet and electronic network activity information gets created and logged automatically. It is also true when you use Pallet Crafts. Log data. When you use Pallet Crafts, our servers record information (&quot;log data&quot;), including information your browser automatically sends whenever you visit a website or your mobile app automatically sends when you&#39;re using it.</p>\r\n\r\n<h1><strong>PAYMENTS AND RETURN POLICIES </strong></h1>\r\n\r\n<h2><strong>PURCHASE AND PAYMENTS</strong></h2>\r\n\r\n<ul>\r\n	<li>3. Pallet Crafts supports one or more of the following payment methods in each country it operates: <em><strong>(i) G-cash</strong></em> Customers must pay at least 30% of the purchased items using the G-cash payment method. <em><strong>(ii) Cash on Delivery (COD)</strong></em> Pallet Crafts provides COD services. Buyers may pay the 30% down payments directly upon receipt of the purchased item and the remaining upon receiving the item.</li>\r\n</ul>\r\n\r\n<h1><strong>CANCELLATION,RETURN, AND REDUND </strong></h1>\r\n\r\n<p>Pallet Crafts does not allow the cancellation, return and refund process because the materials used are not refundable.</p>\r\n'),
(4,'Contact Info','<p><strong>ADDRESS:</strong></p>\r\n\r\n<p>San Mateo, Binmeckeg Sison Pangasinan</p>\r\n\r\n<p><strong>CONTACT NO:</strong></p>\r\n\r\n<p>09455068220</p>\r\n\r\n<p><strong>EMAIL:</strong></p>\r\n\r\n<p>palletcraft27@gmail.com</p>\r\n'),
(5,'Navigation name','<p><strong>PalletCraft</strong></p>\r\n'),
(6,'sidebar','<h1><strong><a href=\"https://scontent.fcrk1-3.fna.fbcdn.net/v/t1.6435-9/150954357_428518594869141_4634394968612893506_n.jpg?_nc_cat=101&amp;ccb=1-7&amp;_nc_sid=174925&amp;_nc_eui2=AeHko-tvoCtEpeEzQOQ8h1DE2eUQOu3Y6NLZ5RA67djo0pxmoUitBRU_BaTd9A5qllULwn0Pdp-pfGNtSdJ7G-Yu&amp;_nc_ohc=S7eAKhwLJxwAX8AaueT&amp;_nc_oc=AQkeJWRefQI6CfX970lI_X8Mn4M-1QtGcRA-YaGr96o-w6xZUaBAtTa7CUYMIHbGJvw&amp;_nc_ht=scontent.fcrk1-3.fna&amp;oh=00_AfBatgybL9qfDOouJdGjOjW5UtThzTVNxhUep6w0KqowmQ&amp;oe=63E4C57C\" target=\"_top\"><img alt=\"\" src=\"https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.6435-9/74170514_171504740570529_4860851794416238592_n.jpg?_nc_cat=107&amp;ccb=1-7&amp;_nc_sid=174925&amp;_nc_eui2=AeF2zq1g77RhhQGeGC6ooib04QDwFCoYaGfhAPAUKhhoZ4zfxvHrkNpOyEY8hy6AX9WIhxBxOB-g6_NNpiISMH9F&amp;_nc_ohc=_xM3xQbOxocAX8s5h6o&amp;_nc_ht=scontent.fcrk1-1.fna&amp;oh=00_AfBA-VXCIt9Lzer6QSIM504IQYTR-Obkto9Eb0vBuWI-rg&amp;oe=63E4DBEC\" style=\"border-style:solid; border-width:1px; height:250px; margin:3px; width:250px\" /></a></strong>&nbsp;</h1>\r\n\r\n<p><big>Russel Rivera is a 33 y/o, married, adventurous, and a businessman who loves to create a handcraft pallet. He is the owner of the pallet and print shop. His hobbies are customizing and recycling pallets. He is also a pastor in their community</big></p>\r\n\r\n<p>&nbsp;</p>\r\n');

/*Table structure for table `table_color` */

DROP TABLE IF EXISTS `table_color`;

CREATE TABLE `table_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(200) NOT NULL,
  `table_shape` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_color` */

insert  into `table_color`(`id`,`color`,`table_shape`,`photo`,`price`) values 
(1,'Natural','round','round table natural.jpg',200),
(2,'Mahogany','round','round table mahogany.jpg',200),
(3,'Maple','round','round table maple.jpg',200),
(4,'Black','round','round table black.jpg',200),
(5,'Gray','round','round table gray.jpg',200),
(6,'White','round','round table white.jpg',200),
(13,'Natural','square','Table Natural.jpg',200),
(14,'Mahogany','square','Table Mahogany.jpg',200),
(15,'Maple','square','Table Mapple.jpg',200),
(16,'Black','square','Table Black.jpg',200),
(17,'Gray','square','Table Gray.jpg',200),
(18,'White','square','Table White.jpg',200);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`type`,`firstname`,`lastname`,`address`,`contact_info`,`gender`,`date_of_birth`,`photo`,`status`,`activate_code`,`reset_code`,`created_on`) values 
(1,'admin@admin.com','$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS',1,'Admin','Owner','','','','','g.jpg',1,'','','2018-05-01'),
(13,'jirahventura@gmail.com','$2y$10$ZkTjYBDSvFiteIC/D3rYueud0Z313TgPP1QUDnyZ3/tOBWS7yg7Dq',0,'Jirah','Ventura','','0999999999','','','2521.jpg',1,'','','2022-08-16'),
(19,'customer@customer.com','$2y$10$reMuV3dbBrpa9h3C5OJGmuk7VJmCb6i3d3vQJyE/LM3uzt75V2Fqi',0,'Gary','Berganio','','0911111112','','','241083045_122791126771631_1960350427611025501_n.jpg',1,'','','2022-08-18'),
(20,'testuser@gmail.com','$2y$10$0ZKAruJio4uwrXmC08wDeezFN3KUYGo2wFL2KlOkBSAs6X1t81k4S',0,'Leriza May','Villasista','','1233234234','','','',1,'','','2022-08-18'),
(21,'villasistalucy@gmail.com','$2y$10$qydGl0cFjmkSAGVUH3pQKusMTQ3bHiqZGDXfQdTCxQKN7rUYMMPcm',0,'Lucy','Villasista','','09452241662','','','',1,'','','2022-08-19'),
(22,'Sencho@gmail.com','$2y$10$eQR6jfBgGVT6fEEHlHcO0.jDK2svqS1No7GCkggPnOgoIEAVh3iZy',0,'Sencho','Cho','','09458171954','','','',1,'','','2022-10-04'),
(23,'Snow@gmail.com','$2y$10$UKFSb9NlaOneh/p9gQZKZeLSwvDWKeL4ELVbxD8i9s3F8kPCabg3O',0,'Snow','Mira','','09452107862','','','',1,'','','2022-10-19'),
(37,'rhemzmadrona@gmail.com','$2y$10$WcO2z2XD5MyomOe6z54T3Okaoa9C56iED0wodKWXEFoBZv82dsywO',2,'Rhemz','Madrona','','09458171954','','','',1,'QlMsawy9e5WF','8I3polu9ZkXMKQ7','2022-11-24'),
(38,'rhonaree08@gmail.com','$2y$10$eh9NGBP/0NR3hkTDN4u8HOKyRzNAGflpcO0oONNgOvz18iKBvSlcm',0,'Rhonaree','Madrona','','09458171954','','','',1,'nxyECqDoY53l','','2022-11-24'),
(55,'remeniomadrona.bsit.ucu@gmail.com','$2y$10$UGovy4eqpNavilvFAqHV0uIaAyU/c2m4zsJH48wEu5bVBRaPNrFU.',0,'Kaye','De Vera','Tabtabungao, rosario la union','09458171954','female','2000-02-06','',1,'AQoHVEROpTPb','','2023-02-06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
