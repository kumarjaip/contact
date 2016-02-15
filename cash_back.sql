/*
SQLyog Community v11.31 (64 bit)
MySQL - 10.1.9-MariaDB : Database - icontacts
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`icontacts` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `icontacts`;

/*Table structure for table `contactus_admin` */

DROP TABLE IF EXISTS `contactus_admin`;

CREATE TABLE `contactus_admin` (
  `adminid` int(2) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `phone` varchar(500) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `pwd_reset_token` varchar(255) NOT NULL,
  `updated` date DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `isActive` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`admin_username`),
  UNIQUE KEY `id` (`adminid`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_countries` */

DROP TABLE IF EXISTS `contactus_countries`;

CREATE TABLE `contactus_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_email_template` */

DROP TABLE IF EXISTS `contactus_email_template`;

CREATE TABLE `contactus_email_template` (
  `tempId` int(11) NOT NULL AUTO_INCREMENT,
  `templName` varchar(150) DEFAULT NULL,
  `tempKey` varchar(50) DEFAULT NULL,
  `tempContent` text,
  `isActive` enum('0','1') DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  PRIMARY KEY (`tempId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_groups` */

DROP TABLE IF EXISTS `contactus_groups`;

CREATE TABLE `contactus_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_list` */

DROP TABLE IF EXISTS `contactus_list`;

CREATE TABLE `contactus_list` (
  `conid` int(10) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `company` varchar(200) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `comDesc` text NOT NULL,
  `searchKey` varchar(250) NOT NULL,
  `primaryemail` varchar(100) NOT NULL,
  `secondaryemail` varchar(100) NOT NULL,
  `webdomain` varchar(50) NOT NULL,
  `bphone` varchar(20) NOT NULL,
  `hphone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `cfax` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(15) NOT NULL,
  `notes` text NOT NULL,
  `datecreated` date NOT NULL,
  `dateupdate` date NOT NULL,
  `userId` int(10) NOT NULL,
  `is_valid` enum('1','0') NOT NULL,
  PRIMARY KEY (`conid`),
  FULLTEXT KEY `qlist` (`company`,`comDesc`),
  FULLTEXT KEY `fullName` (`fullName`,`company`,`jobtitle`,`primaryemail`,`secondaryemail`,`webdomain`,`bphone`,`hphone`,`mobile`,`address`,`city`,`state`,`zipcode`,`searchKey`,`comDesc`)
) ENGINE=InnoDB AUTO_INCREMENT=310 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_pages` */

DROP TABLE IF EXISTS `contactus_pages`;

CREATE TABLE `contactus_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` int(11) unsigned NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL,
  `dateCreated` date DEFAULT NULL,
  `isActive` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `contactus_qmail` */

DROP TABLE IF EXISTS `contactus_qmail`;

CREATE TABLE `contactus_qmail` (
  `qmailid` bigint(15) NOT NULL AUTO_INCREMENT,
  `cnid` bigint(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ccmail` varchar(200) NOT NULL,
  `bccmail` varchar(200) NOT NULL,
  `mailsbj` varchar(250) NOT NULL,
  `mailbox` text NOT NULL,
  `userName` varchar(200) NOT NULL,
  `mailingdate` datetime NOT NULL,
  PRIMARY KEY (`qmailid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_qnote` */

DROP TABLE IF EXISTS `contactus_qnote`;

CREATE TABLE `contactus_qnote` (
  `qnid` bigint(20) NOT NULL AUTO_INCREMENT,
  `conid` bigint(20) NOT NULL,
  `notes` text NOT NULL,
  `activity` varchar(35) NOT NULL,
  `phase` varchar(35) NOT NULL,
  `nextsteps` varchar(35) NOT NULL,
  `priority` char(3) NOT NULL,
  `sync` enum('1','0') NOT NULL,
  `appointDate` date NOT NULL,
  `appointTime` varchar(10) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `adddate` date NOT NULL,
  `mailsubject` varchar(250) NOT NULL,
  PRIMARY KEY (`qnid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_sessions` */

DROP TABLE IF EXISTS `contactus_sessions`;

CREATE TABLE `contactus_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_users` */

DROP TABLE IF EXISTS `contactus_users`;

CREATE TABLE `contactus_users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `contactus_users_groups` */

DROP TABLE IF EXISTS `contactus_users_groups`;

CREATE TABLE `contactus_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `datedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `cmspage` */

DROP TABLE IF EXISTS `cmspage`;

/*!50001 DROP VIEW IF EXISTS `cmspage` */;
/*!50001 DROP TABLE IF EXISTS `cmspage` */;

/*!50001 CREATE TABLE  `cmspage`(
 `id` int(11) unsigned ,
 `title` varchar(100) ,
 `body` text ,
 `template` varchar(25) 
)*/;

/*View structure for view cmspage */

/*!50001 DROP TABLE IF EXISTS `cmspage` */;
/*!50001 DROP VIEW IF EXISTS `cmspage` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cmspage` AS select `contactus_pages`.`id` AS `id`,`contactus_pages`.`title` AS `title`,`contactus_pages`.`body` AS `body`,`contactus_pages`.`template` AS `template` from `contactus_pages` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
