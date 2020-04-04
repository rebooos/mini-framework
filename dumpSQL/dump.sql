/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.4.11-MariaDB : Database - phonebooks
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phonebooks` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `phonebooks`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `organization` varchar(200) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_user_id_IDX` (`userId`) USING BTREE,
  CONSTRAINT `books_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `books` */

insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (3,4,'2','3',3,'4','2','3',NULL);
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (4,6,'Koly','Work',79995858869,NULL,NULL,NULL,'Просто так');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (20,6,'Дмитрий','Морозов',89226065428,'','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (21,6,'Pety','Xdfs',89955959595,'','pepe@gmial.com','3333','234234234234');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (22,6,'Pety','Xdfs',89955959595,'','pepe@gmial.com','3333','234234234234');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (23,6,'test','test',89991122333,'','test@testov.ru','1123123','123123123');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (24,6,'11','11',32221144234,'','test@gm.ru','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (25,6,'11','11',32221144234,'','test@gm.ru','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (26,6,'11','11',32221144234,'','test@gm.ru','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (27,6,'11','11',32221144234,'','test@gm.ru','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (28,6,'11','11',32221144234,'','test@gm.ru','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (29,6,'','',0,'','','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (30,6,'123','3123',12223331123,'','','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (31,6,'123','3123',12223331123,'','','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (32,6,'3333333333','3333333333333333',33333333333,'','','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (33,6,'3333333333','3333333333333333',33333333333,'','','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (34,6,'Дмитрий','Морозов',89226065428,'','dvmorozov72@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (35,6,'Дмитрий','Морозов',89226065428,'','dvmorozov71@gmail.com','11111111111111','22222222222222222222');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (36,6,'Дмитрий','Морозов',89226065428,'','dvmorozov71@gmail.com','11111111111111','22222222222222222222');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (37,6,'Дмитрий','Морозов',89226065428,'','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (38,6,'Дмитрий','Морозов',89226065428,'','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (39,6,'Дмитрий','Морозов',89226065428,'/public/pic/ava.jpg','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (40,7,'Дмитрий','Морозов',89226065428,'/public/pic/927zvezdy_mlechnyj_put_prostranstvo_kosmos_116893_1920x1080.jpg','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (41,7,'Дмитрий','Морозов',89226065428,'/public/pic/536WIN_20200403_13_15_22_Pro.jpg','dvmorozov74@gmail.com','','');
insert  into `books`(`id`,`userId`,`firstName`,`lastName`,`phone`,`photo`,`email`,`organization`,`comment`) values (42,7,'у32у23у32','32у23у23у',0,'/public/pic/880WIN_20200403_13_15_59_Pro.jpg','','','');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`userId`,`email`,`login`,`password`,`firstName`,`lastName`) values (1,'dvmorozov74@gmail.com','','123','Dima','Morozov');
insert  into `users`(`userId`,`email`,`login`,`password`,`firstName`,`lastName`) values (4,'kolya@mail.com','','123',NULL,NULL);
insert  into `users`(`userId`,`email`,`login`,`password`,`firstName`,`lastName`) values (5,'dvmorozov75@gmail.com','','70873e8580c9900986939611618d7b1e','Дмитрий','Морозов');
insert  into `users`(`userId`,`email`,`login`,`password`,`firstName`,`lastName`) values (6,'rebus@gmail.com','rebus','$2y$10$lL9am1jA4B/tik5xi5qDcufbysiz99GeTHZh2MBaNfXxDiUTLcN7y','Dima','Mor');
insert  into `users`(`userId`,`email`,`login`,`password`,`firstName`,`lastName`) values (7,'koly@mail.ru','koly','$2y$10$krCSFx8r7Ov8iaUu8IuX0uAdsV5t71esD568HwFDMnauIcfRnVnOy','12345','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
