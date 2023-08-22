/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - u770605962_palletcraft
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u770605962_palletcraft` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `u770605962_palletcraft`;

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `banner` */

insert  into `banner`(`id`,`photo`) values 
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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

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
(111,37,77,2);

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
(2,'Packages','chair'),
(3,'Plant Stand','Plant stand'),
(4,'Home Decoration','Home decoration');

/*Table structure for table `customize_chair_height` */

DROP TABLE IF EXISTS `customize_chair_height`;

CREATE TABLE `customize_chair_height` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `height` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_chair_height` */

insert  into `customize_chair_height`(`id`,`height`,`price`) values 
(1,'Normal Height (18 inches)',250),
(2,'Hight Chair (28-32 inches)',250);

/*Table structure for table `customize_chair_order` */

DROP TABLE IF EXISTS `customize_chair_order`;

CREATE TABLE `customize_chair_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  `chair_shape` text NOT NULL,
  `chair_height` text NOT NULL,
  `chair_color` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `downpayment` double NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_chair_order` */

insert  into `customize_chair_order`(`id`,`user_id`,`name`,`confirmation`,`chair_shape`,`chair_height`,`chair_color`,`quantity`,`total_price`,`downpayment`,`status`,`order_date`) values 
(6,37,'Chair','KTSFYGRG','Square','Normal','Natural',1,700,210,3,'2022-12-09'),
(7,37,'Chair','G7AG5HZ1','Round','Normal','Mahogany',1,700,210,4,'2022-12-09'),
(8,37,'Chair','XDOW4NP','Square','Hight','Walnut',2,1400,210,1,'2022-12-09');

/*Table structure for table `customize_chair_shape` */

DROP TABLE IF EXISTS `customize_chair_shape`;

CREATE TABLE `customize_chair_shape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shape` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_chair_shape` */

insert  into `customize_chair_shape`(`id`,`shape`,`price`) values 
(1,'Round',250),
(2,'Square',250);

/*Table structure for table `customize_flatform_quantity` */

DROP TABLE IF EXISTS `customize_flatform_quantity`;

CREATE TABLE `customize_flatform_quantity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flatform_quantity` varchar(100) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_flatform_quantity` */

insert  into `customize_flatform_quantity`(`id`,`flatform_quantity`,`price`) values 
(1,'1',20),
(2,'2',40),
(3,'3',60),
(4,'4',80),
(5,'5',100),
(6,'6',120),
(7,'7',140),
(8,'8',160),
(9,'9',180),
(10,'10',200),
(11,'11',220),
(12,'12',240),
(13,'13',260),
(14,'14',280),
(15,'15',300);

/*Table structure for table `customize_order` */

DROP TABLE IF EXISTS `customize_order`;

CREATE TABLE `customize_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  `layer` varchar(255) NOT NULL,
  `flatform_quantity` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_price` double NOT NULL,
  `downpayment` double NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_order` */

insert  into `customize_order`(`id`,`user_id`,`name`,`confirmation`,`layer`,`flatform_quantity`,`color`,`quantity`,`total_price`,`downpayment`,`status`,`order_date`) values 
(23,37,'Plant Stand','546DFDNV','1','1','Natural',2,240,72,3,'2022-12-09'),
(24,37,'Plant Stand','7C4CP54','2','4','Walnut',1,480,144,1,'2022-12-09'),
(25,37,'Plant Stand','OVW3DFKI','3','7','Maple',2,640,192,4,'2022-12-09'),
(26,46,'Plant Stand','QANRHQ11','3','5','Walnut',1,600,180,1,'2022-12-15');

/*Table structure for table `customize_ps_color` */

DROP TABLE IF EXISTS `customize_ps_color`;

CREATE TABLE `customize_ps_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(200) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_ps_color` */

insert  into `customize_ps_color`(`id`,`color`,`price`) values 
(1,'Natural',200),
(2,'Mahogany',200),
(5,'Walnut',200),
(6,'Maple',200),
(7,'Cherry',200),
(8,'White Oak',200),
(9,'Pine',200),
(10,'Black',200),
(11,'Gray',200),
(12,'White',200);

/*Table structure for table `customize_ps_layer` */

DROP TABLE IF EXISTS `customize_ps_layer`;

CREATE TABLE `customize_ps_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layer` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_ps_layer` */

insert  into `customize_ps_layer`(`id`,`layer`,`price`) values 
(1,'1 Layer',20),
(2,'2 Layers',200),
(3,'3 Layers',300),
(4,'4 Layers',400),
(5,'5 layers',500),
(6,'6 layers',600),
(11,'7 Layers',700);

/*Table structure for table `customize_table_order` */

DROP TABLE IF EXISTS `customize_table_order`;

CREATE TABLE `customize_table_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  `table_shape` text NOT NULL,
  `table_color` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `downpayment` double NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_table_order` */

insert  into `customize_table_order`(`id`,`user_id`,`name`,`confirmation`,`table_shape`,`table_color`,`quantity`,`total_price`,`downpayment`,`status`,`order_date`) values 
(5,37,'Table','X5GWREH','Oval','Natural',1,500,150,4,'2022-12-09'),
(6,37,'Table','QAGJH1CL','Square','Maple',1,500,150,3,'2022-12-09'),
(7,37,'Table','GPQRGBEN','Oval','Natural',2,1000,150,1,'2022-12-09');

/*Table structure for table `customize_table_shape` */

DROP TABLE IF EXISTS `customize_table_shape`;

CREATE TABLE `customize_table_shape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_shape` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customize_table_shape` */

insert  into `customize_table_shape`(`id`,`table_shape`,`price`) values 
(1,'Rounded',300),
(2,'Oval',300),
(3,'Square',300),
(4,'Rectangular',300),
(5,'Octagonal (8 Sides)',350);

/*Table structure for table `details` */

DROP TABLE IF EXISTS `details`;

CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `details` */

insert  into `details`(`id`,`sales_id`,`product_id`,`quantity`) values 
(14,9,11,2),
(15,9,13,5),
(16,9,3,2),
(17,9,1,3),
(18,10,13,3),
(19,10,2,4),
(20,10,19,5),
(21,11,27,2),
(22,12,42,1),
(23,13,44,1),
(24,14,27,1),
(25,15,51,2),
(26,16,50,1),
(27,17,61,1),
(28,18,49,1),
(29,19,61,1),
(30,20,50,1),
(31,21,52,1),
(32,22,51,1),
(33,23,50,1),
(34,24,61,1),
(35,25,61,1),
(36,26,61,1),
(37,27,50,1),
(38,28,43,1),
(39,29,44,1),
(40,30,44,1),
(41,31,44,1),
(42,32,66,1),
(43,33,42,1),
(44,33,28,1),
(45,34,73,1),
(46,35,66,1),
(47,36,38,1),
(48,36,37,1),
(49,36,36,1),
(50,36,39,1),
(51,37,51,1),
(52,37,36,1),
(53,38,37,1),
(54,39,52,1),
(55,40,38,1),
(56,41,61,1),
(57,42,61,1),
(58,42,40,1),
(59,43,37,1),
(60,44,51,1),
(61,45,38,1),
(62,46,37,1),
(63,47,37,1),
(64,48,36,1),
(65,49,37,1),
(66,50,52,1),
(67,51,51,1),
(68,52,37,1),
(69,53,37,1),
(70,53,51,2),
(71,54,38,1),
(72,55,37,5),
(73,56,36,10),
(74,57,36,10),
(75,58,36,10),
(76,59,36,10),
(77,60,36,10),
(78,61,36,10),
(79,62,36,10),
(80,63,36,10),
(81,64,36,10),
(82,65,36,10),
(83,66,36,10),
(84,67,36,10),
(85,68,36,10),
(86,69,51,1),
(87,69,37,1),
(88,70,51,1),
(89,70,66,1),
(90,70,38,1),
(91,71,66,2),
(92,71,39,2),
(93,72,40,1),
(94,73,40,1),
(95,75,38,5),
(96,76,77,3),
(97,77,77,3),
(98,79,77,3),
(99,80,77,3),
(100,82,77,2),
(101,83,77,2),
(102,84,77,2),
(103,85,77,2),
(104,86,77,2),
(105,89,77,2),
(106,90,77,2),
(107,91,77,2),
(108,94,77,2),
(109,95,77,2),
(110,96,77,2),
(111,97,77,2),
(112,98,77,2),
(113,99,77,2),
(114,100,77,2),
(115,101,77,2),
(116,102,77,2),
(117,103,77,2);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `p_quantity` int(11) DEFAULT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`name`,`description`,`slug`,`price`,`p_quantity`,`photo`,`date_view`,`counter`) values 
(36,2,'2 Chairs','<p><strong>Type:</strong>&nbsp;Outdoor</p>\r\n\r\n<p><strong>Size:</strong>N/A<br />\r\n<br />\r\n<strong>Color: </strong>Natural</p>\r\n','2-chairs',1000,0,'pallet-craft-chair-design-10_1666834830.jpg','2022-11-30',54),
(37,2,'3 chairs','<p><strong>Type:</strong>&nbsp;Outdoor</p>\r\n\r\n<p><strong>Size:</strong>N/A</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n','3-chairs',2500,0,'pallet-craft-chair-design-11_1666835028.jpg','2022-12-14',5),
(38,2,'4 chair with 1 table','<p>Here is our complete garden set completely made out of repurposed wooden pallets: table, chair, stool and bench</p>\r\n\r\n<p><strong>Type:</strong>&nbsp;Outdoor</p>\r\n\r\n<p><strong>Quantity: </strong>One table with four&nbsp;chair</p>\r\n\r\n<p><strong>Color:</strong> Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','4-chair-1-table',2500,0,'pallet-craft-chair-design-12_1666835102.jpg','2022-12-14',52),
(39,2,'Garden Dining Set','<p>Pallet Wood Garden Dining Set with 4 chairs and a table just the right size for fun lunches with the family or intimate evening dining for two.</p>\r\n\r\n<p><strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(12x15x29)</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','garden-dining-set',2500,0,'pallet-craft-chair-design-13_1666835159.jpg','2022-12-15',1),
(40,2,'Garden Pallet Table & Chairs','<p>Garden Pallet Table &amp; Chairs Pallet Benches, Pallet Chairs &amp; StoolsPallet Desks &amp; Pallet Tables</p>\r\n\r\n<p><strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(14x14x31)</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','garden-pallet-table-chairs',2500,0,'pallet-craft-chair-design-14_1666835236.jpg','2022-12-14',1),
(50,3,'Plant Stand 3','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(20x45)</p>\r\n\r\n<p><strong>Quantity:</strong> 2</p>\r\n\r\n<p><strong>Color:</strong> White</p>\r\n','plant-stand-3',2500,0,'pallet-craft-plant-stand-design-1.jpg','2022-11-29',1),
(51,3,'Plant Stand 4','<p><strong>Type: </strong>Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(20x50)</p>\r\n\r\n<p><strong>Quantity:</strong> 2</p>\r\n\r\n<p><strong>Color: </strong>Natural</p>\r\n','plant-stand-4',2500,0,'pallet-craft-plant-stand-design-2.jpg','2022-12-15',1),
(52,3,'Plant Stand 5','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(50x30)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n\r\n<p>&nbsp;</p>\r\n','plant-stand-5',2500,0,'pallet-craft-plant-stand-design-3.jpg','2022-11-29',1),
(53,3,'Plant Stand 5','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(35x50)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n','plant-stand-5',2500,0,'pallet-craft-plant-stand-design-4.jpg','2022-09-26',2),
(56,3,'Plant Stand 2','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(20x35)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n','plant-stand-2',2500,0,'pallet-craft-plant-stand-design-7.jpg','0000-00-00',0),
(59,3,'Plant Stand 1','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(50x50)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;White</p>\r\n','plant-stand-1',2500,0,'pallet-craft-plant-stand-design-9.jpg','2022-09-26',4),
(63,3,'Plant Stand 7','<p><strong>Type:</strong> Indoor/Outdoor</p>\r\n\r\n<p><strong>Size:</strong>(8x15)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n','plant-stand-7',2500,0,'pallet-craft-plant-stand-design-12.jpg','2022-10-26',4),
(64,4,'Home Deco 2','<p><strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Size: </strong>( 6(inches)&nbsp;each side )</p>\r\n\r\n<p><strong>Quantity:&nbsp;</strong>3</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Natural</p>\r\n','home-deco-2',2500,0,'pallet-craft-home-decoration-design-2.jpg','2022-11-29',1),
(66,4,'Home Deco 1','<p><strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Size:</strong>(15x20) (inch)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Rustic&nbsp;</p>\r\n','home-deco-1',2500,0,'pallet-craft-home-decoration-design-4.jpg','2022-12-15',1),
(67,4,'Home Deco 5','<p><strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Size: </strong>25&nbsp;(inch)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Red Varnish&nbsp;</p>\r\n','home-deco-5',2500,0,'pallet-craft-home-decoration-design-5.jpg','2022-08-19',1),
(72,4,'Home Deco 4','<p><strong>Type:</strong> Indoor</p>\r\n\r\n<p><strong>Size:</strong>(30x25) (inch)</p>\r\n\r\n<p><strong>Color:</strong>&nbsp;Cyan, White</p>\r\n','home-deco-4',2500,0,'pallet-craft-home-decoration-design-10.jpg','0000-00-00',0),
(77,4,'Pallet','<p>pallet</p>\r\n','pallet',10,2,'pallet.png','2022-12-15',21);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `confirmation` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `sales_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`id`,`user_id`,`confirmation`,`status`,`sales_date`) values 
(27,16,'T466JGQ7',3,'2022-09-19'),
(36,22,'OX14Z3SP',4,'2022-11-02'),
(37,22,'42NY4DNU',4,'2022-11-05'),
(38,22,'F5KIVQ3',4,'2022-11-07'),
(39,22,'KV7ZTWVX',4,'2022-11-09'),
(40,22,'BUVYD5OR',0,'2022-11-10'),
(44,22,'5BC4JNK',1,'2022-11-22'),
(45,22,'GANY4LIQ',1,'2022-11-22'),
(46,22,'EG6UI6H',1,'2022-11-22'),
(47,22,'2ZEG5NO',1,'2022-11-22'),
(49,22,'L6FUKCXJ',1,'2022-11-22'),
(50,22,'AIOF37IL',1,'2022-11-22'),
(51,38,'A4S5KYXJ',1,'2022-11-24'),
(69,37,'BJE2V41E',3,'2022-12-08'),
(71,37,'NZEC3QTU',4,'2022-12-08'),
(72,37,'ONQ54X5C',1,'2022-12-09'),
(73,37,'H6LKFZYQ',1,'2022-12-09'),
(75,37,'5OFETP2',1,'2022-12-14'),
(99,37,'IBQQQ2FN',1,'2022-12-15');

/*Table structure for table `stock_list` */

DROP TABLE IF EXISTS `stock_list`;

CREATE TABLE `stock_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `stock_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock_list` */

insert  into `stock_list`(`id`,`name`,`quantity`,`stock_date`) values 
(1,'Pallet','100','2022-09-30 00:00:00'),
(2,'Pallet Nails','100','2022-09-30 00:00:00'),
(8,'Varnish','10','2022-10-29 00:00:00');

/*Table structure for table `stockin_history` */

DROP TABLE IF EXISTS `stockin_history`;

CREATE TABLE `stockin_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stockin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stockin_history` */

insert  into `stockin_history`(`id`,`name`,`quantity`,`status`,`date_stockin`) values 
(1,'Varnish',5,'Stock In','2022-11-09 00:00:00'),
(2,'Pallet',2,'Stock In','2022-11-09 00:00:00'),
(3,'Pallet',5,'Stock In','2022-11-09 00:00:00'),
(4,'Pallet',2,'Stock In','2022-11-09 00:00:00'),
(5,'Pallet',30,'Stock In','2022-11-09 00:00:00'),
(6,'Pallet',50,'Stock In','2022-11-10 00:00:00'),
(7,'Pallet',45,'Stock In','2022-11-12 00:00:00'),
(8,'Pallet',50,'Stock In','2022-11-12 00:00:00');

/*Table structure for table `stockout_history` */

DROP TABLE IF EXISTS `stockout_history`;

CREATE TABLE `stockout_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stockout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stockout_history` */

insert  into `stockout_history`(`id`,`name`,`quantity`,`status`,`date_stockout`) values 
(1,'Pallet',4,'Stock Out','2022-11-09'),
(2,'Pallet',60,'Stock Out','2022-11-09'),
(3,'Pallet Nails',50,'Stock Out','2022-11-09'),
(4,'Varnish',15,'Stock Out','2022-11-09'),
(5,'Pallet',95,'Stock Out','2022-11-10'),
(6,'Varnish',50,'Stock Out','2022-11-12'),
(7,'Pallet',50,'Stock Out','2022-11-12'),
(8,'Pallet Nails',400,'Stock Out','2022-12-15'),
(9,'Varnish',40,'Stock Out','2022-12-15');

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
(1,'About Us\r\n','<h1><strong>About us</strong></h1>\r\n\r\n<p>Our Story Why pallet?</p>\r\n\r\n<p>To all consumers of products out of pallet thank you to all of you. just want to share &quot;THE JOURNEY OF PALLET the palettes/palochina are imported woods overlay of various impoted goods, machines, chemicals. after the goods are being delivered. The pallet is just thrown away or in other words garbage. most of the palettes are very dirty, there is mud, grease, paint, uneven size, there is wide, there is thin, there is short, there are cracks, there are also holes, Which is nailed, rough, different colors there&#39;s white, orange, black, brown, light brown and so on. Those pallet were dirty, ugly to look at. garbage, no one pays attention, it&#39;s piled up somewhere, then the value of him as a base is over. But if it is used again, being polished. it will be used on things that the person who took and noticed palettes have even more to use of these. it&#39;s just that the holes can&#39;t be removed. the nails, and other things from the previous ones that is used pallet is my story, i could also somewhat your story. You thought you were okay after your purpose was gone, after you were used it was piled up somewhere. being ignored, because it has been used. and because you&#39;re dirty it&#39;s not like the old young boy, handsome, beautiful. lots of holes because of the nails. promises that has not been fulfilled, more cuts because of your unpleasant experiences. you thought life was over. it&#39;s okay now, you have already done what you think is your purpose. but guesss what, if the pallet went in the right hand, there are more plans to use in it. just like our lives, our lives are broken, dirty, fragmented, Lot of holes, broken cuts overload in the MIGHTY HAND OF THE LORD THERE IS AN EVEN GREATER PURPOSE IN LIFE THAN YOU THINK. GOD WILL USE OUR MESSY LIFE INTO A MESSAGE OF HOPE, OUR BROKENESS INTO A BEAUTIFUL MASTERPIECE, our un noticed story into &quot;HIS.TORY.&quot; give your life to the AUTHOR AND ARCHITECT of LIFE, i will make sure you will be amazed how God will turn your life for HIS glory.&nbsp;</p>\r\n'),
(2,'Fcts & Tips','<h1><strong>FACTS &amp; TIPS</strong></h1>\r\n\r\n<h3><strong>Facts about Pallets</strong></h3>\r\n\r\n<p>- Did you know? Over 70% of all wooden are now recycled - a much higher recycling rate than for aluminium, paper, or plastic</p>\r\n\r\n<p>- Pallets Support the 3R concept of Reduce, Reuse and Recycle.</p>\r\n\r\n<p>- Millions of pallets go into a landfill every year, rather than continuing this wasteful practice, Many in the DIY world have been converting perfectly good wood from pallets into new useful items. Pallet upcyclings started gaining popularity in the last decade and has now become a growing obsession for crafty folks everywhere.</p>\r\n\r\n<h3><strong>TIPS</strong></h3>\r\n\r\n<p>Many factors are considered when selecting kitchen cabinets; one that is most commonly considered is whether the pallet crafts are reasonable, long-lasting, and easily maintainable. Typically for house furniture or outside furniture, people prefer taking the pallets apart to cleaning them with a high-pressure cleaner. Still, for cleaning and maintaining your pallet crafts, you can use these methods and keep your pallet wood crafts preserved for a long:</p>\r\n\r\n<h3><strong>1</strong>.<strong>Use Dish Detergent</strong></h3>\r\n\r\n<p>Another good practice is to use natural and organic products. For example, you can also use lime juice or olive oil, leaving you with a refreshing smell and natural polish. It will help keep the pallet crafts clean without getting damaged by harsh products.</p>\r\n\r\n<h3><strong>2. Oil the Pallets</strong></h3>\r\n\r\n<p>If you want to maintain and preserve your furniture for a long time, you can always rely on the power of oil. Oil furniture like chairs and benches is typical to give them a new look and make them look less worn out. Oiling your pallet crafts will enhance their resistance to grease and moisture. Keep in mind to use pallet-friendly nontoxic material for cleaning. You can use nontoxic oils like the food-grade mineral oil to keep things healthy. Oiling will give your pallet crafts a fresh look and preserve them over a more extended period against the harsh environment of the kitchen.</p>\r\n\r\n<h3><strong>3. Keep the dust away</strong></h3>\r\n\r\n<p>A downside to using pallet wood for making pallet crafts is high maintenance. You will need to clean it regularly to keep the dust away because dust can also damage the look of the pallet crafts. Pallets can quickly accumulate dust, and as dull as it may sound, you must dust them off frequently. If the dust accumulates on the pallets, it will scratch the surface of the wood. For this purpose, you can use lambswool dusters or soft clothes like cotton or microfibers that won&rsquo;t mark the wood while cleaning.</p>\r\n\r\n<h3><strong>4.Cover Scratches Immediately</strong></h3>\r\n\r\n<p>Scratches are harmful to pallet wood crafts because they will accumulate dust, grease, bacteria, and moisture very quickly, which damages the pallet crafts. If you see any scratches forming on the wood surface, cover them immediately by using wood polish. Using wood polish will give you a protective layer over the wood surface to prevent any scratches or other harmful materials from accumulating on the surface. But if the scratches are too prominent to go away using polish, you can also use paint. Painting the pallet crafts will give them an entirely new look and make them look fresh while protecting them against damage. This way, you can make your pallet wood crafts last longer.</p>\r\n\r\n<h3><strong>5.Wax the Wood </strong></h3>\r\n\r\n<p>Waxing furniture is a common practice for preserving it over longer terms and making it look fresh. It is usually used to seal the paint and is famous for crafts. Make sure to clean your pallet crafts using fine wool and apply the wax with minimum pressure. One of the advantages of waxing is that it can be reapplied whenever necessary and does not require any expertise. Pallet crafts are finished with varnish for naturally glossy, as a time goes by it is normally fading so all you need to do is to retouch it again For outdoor pallet crafts avoid soaking it into the water.</p>\r\n'),
(3,'Policies/ Term & Services','<h1><strong>TERMS OF SERVICE </strong></h1>\r\n\r\n<h3><strong>INTRODUCTION</strong></h3>\r\n\r\n<ul>\r\n	<li>1.1 Welcome to the Pallet Crafts platform (the &quot;Site&quot;). The &quot;Services&quot; we provide or make available include (a) the Site, (b) the services provided by the Site and by Pallet Crafts client software made available through the Site, and (c) all information, linked pages, features, data, text, images, photographs, graphics, music, sounds, video (including live streams), messages, tags, content, programming, software, application services (including, without limitation, any mobile application services) or other materials made available through the Site or its related services (&quot;Content&quot;). Any new features added to or augmenting the Services are also subject to these Terms of Service. These Terms of Service govern your use of Services provided by Pallet Crafts.</li>\r\n	<li>1.2 Pallet Crafts reserves the right to change, modify, suspend or discontinue all or any part of this Site or the Services at any time or upon notice as required by local laws. Pallet Crafts may release certain Services or their features in a beta version, which may not work correctly or in the same way the final version may work, and we shall not be held liable in such instances. Pallet Crafts may also impose limits on certain features or restrict your access to parts of or the entire, Site or Services in its sole discretion and without notice or liability.</li>\r\n	<li>1.3 Pallet Crafts reserves the right to refuse to provide access to the Site or Services or to allow you to open an Account for any reason.</li>\r\n</ul>\r\n\r\n<h1><strong>PRIVACY</strong></h1>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>2.1 <strong>When you give it to us or permit us to obtain it</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>When you sign up for or use Pinterest, you voluntarily share certain information, including your name, email address, phone number, photos, Pins, comments, and any other information you give us. You can also share your precise location using your device settings or pictures. We will still use your IP address, which is used to approximate your Site, even if you don&#39;t choose to share your precise location. You will also have the option to share other information about yourself, such as your gender, age, and preferred language.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3>2.2<strong> </strong><strong>We also get technical information when you use Pallet Crafts</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>When you use a website, mobile application, or other Internet services, specific Internet and electronic network activity information gets created and logged automatically. It is also true when you use Pallet Crafts. Log data. When you use Pallet Crafts, our servers record information (&quot;log data&quot;), including information your browser automatically sends whenever you visit a website or your mobile app automatically sends when you&#39;re using it.</p>\r\n\r\n<h1><strong>PAYMENTS AND RETURN POLICIES </strong></h1>\r\n\r\n<h2><strong>PURCHASE AND PAYMENTS</strong></h2>\r\n\r\n<ul>\r\n	<li>3. Pallet Crafts supports one or more of the following payment methods in each country it operates: <em><strong>(i) G-cash</strong></em> Customers must pay at least 30% of the purchased items using the G-cash payment method. <em><strong>(ii) Cash on Delivery (COD)</strong></em> Pallet Crafts provides COD services. Buyers may pay the 30% down payments directly upon receipt of the purchased item and the remaining upon receiving the item.</li>\r\n</ul>\r\n\r\n<h1><strong>CANCELLATION,RETURN, AND REDUND </strong></h1>\r\n\r\n<p>Pallet Crafts does not allow the cancellation, return and refund process because the materials used are not refundable.</p>\r\n'),
(4,'Contact Info','<p><strong>ADDRESS:</strong></p>\r\n\r\n<p>San Mateo, Binmeckeg Sison Pangasinan</p>\r\n\r\n<p><strong>CONTACT NO:</strong></p>\r\n\r\n<p>09455068220</p>\r\n\r\n<p><strong>EMAIL:</strong></p>\r\n\r\n<p>palletcraft27@gmail.com</p>\r\n'),
(5,'Navigation name','<p><strong>PalletCraft</strong></p>\r\n');

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
  `daddress` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`type`,`firstname`,`lastname`,`address`,`contact_info`,`daddress`,`photo`,`status`,`activate_code`,`reset_code`,`created_on`) values 
(1,'admin@admin.com','$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS',1,'Admin','Owner','','','','g.jpg',1,'','','2018-05-01'),
(13,'jirahventura@gmail.com','$2y$10$ZkTjYBDSvFiteIC/D3rYueud0Z313TgPP1QUDnyZ3/tOBWS7yg7Dq',0,'Jirah','Ventura','Tebag West Sta. Barbara Pangasinan','0999999999','','2521.jpg',1,'','','2022-08-16'),
(16,'rhemz@gmail.com','$2y$10$RzNak8ZX/qc0hRMQy9vWEuPBTvL3v0F244BzHLz3Xi8pIkKqEqM.y',2,'Rhemz','Madrona','La Union','09452241662','Tabtabungao, rosario la union','brook.jpg',1,'','','2022-08-17'),
(19,'customer@customer.com','$2y$10$reMuV3dbBrpa9h3C5OJGmuk7VJmCb6i3d3vQJyE/LM3uzt75V2Fqi',0,'Gary','Berganio','San Quintin Pangasinan','0911111112','','241083045_122791126771631_1960350427611025501_n.jpg',1,'','','2022-08-18'),
(20,'testuser@gmail.com','$2y$10$0ZKAruJio4uwrXmC08wDeezFN3KUYGo2wFL2KlOkBSAs6X1t81k4S',0,'Leriza May','Villasista','Urdaneta City','1233234234','','',1,'','','2022-08-18'),
(21,'villasistalucy@gmail.com','$2y$10$qydGl0cFjmkSAGVUH3pQKusMTQ3bHiqZGDXfQdTCxQKN7rUYMMPcm',0,'Lucy','Villasista','Urdaneta City','09452241662','','',1,'','','2022-08-19'),
(22,'Sencho@gmail.com','$2y$10$eQR6jfBgGVT6fEEHlHcO0.jDK2svqS1No7GCkggPnOgoIEAVh3iZy',0,'Sencho','Cho','Rosario, La Union','09458171954','','',1,'','','2022-10-04'),
(23,'Snow@gmail.com','$2y$10$UKFSb9NlaOneh/p9gQZKZeLSwvDWKeL4ELVbxD8i9s3F8kPCabg3O',0,'Snow','Mira','Rosario, La Union','09452107862','Nueva ecija','',1,'','','2022-10-19'),
(25,'Garyberganio@gmail.com','$2y$10$KBx/YY9zzjnjnQa56hlE5.y/wttMF5cpiowRUf6HA5ZVol0dLbJXy',2,'Gary','Berganio','Mabini San Quintin Pangasinan','09458171123','','',1,'','','2022-10-30'),
(37,'rhemzmadrona@gmail.com','$2y$10$WcO2z2XD5MyomOe6z54T3Okaoa9C56iED0wodKWXEFoBZv82dsywO',0,'Rhemz','Madrona','Tabtabungao, rosario la union','09458171954','Tabtabungao, rosario la union','',1,'QlMsawy9e5WF','8I3polu9ZkXMKQ7','2022-11-24'),
(38,'rhonaree08@gmail.com','$2y$10$eh9NGBP/0NR3hkTDN4u8HOKyRzNAGflpcO0oONNgOvz18iKBvSlcm',0,'Rhonaree','Madrona','Tabtabungao, rosario la union','09458171954','Tabtabungao, rosario la union','',1,'nxyECqDoY53l','','2022-11-24'),
(47,'remeniomadrona.bsit.ucu@gmail.com','$2y$10$XzlIkYXYZ6sDp6mG1CRp0.hJoIUDTCXZHQt9IyMS1.CSQBgTuRAKa',0,'Rem','Madrona','Tabtabungao, R.L.U','09458171954','Tabtabungao, R.L.U','',1,'ls8zaBj9qFgy','','2022-12-15');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
