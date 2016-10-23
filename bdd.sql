-- MySQL dump 10.13  Distrib 5.5.46, for Linux (x86_64)
--
-- Host: localhost    Database: ebidix
-- ------------------------------------------------------
-- Server version	5.5.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `eb_accounts`
--

DROP TABLE IF EXISTS `eb_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(80) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_accounts`
--

LOCK TABLES `eb_accounts` WRITE;
/*!40000 ALTER TABLE `eb_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_addresses`
--

DROP TABLE IF EXISTS `eb_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `postcode` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_addresses`
--

LOCK TABLES `eb_addresses` WRITE;
/*!40000 ALTER TABLE `eb_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_adverts`
--

DROP TABLE IF EXISTS `eb_adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_adverts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_adverts`
--

LOCK TABLES `eb_adverts` WRITE;
/*!40000 ALTER TABLE `eb_adverts` DISABLE KEYS */;
INSERT INTO `eb_adverts` VALUES (1,'Grande pub homepage','&lt;p&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/themes/default/img/top_ad.jpg&quot; /&gt;&lt;/p&gt;\r\n',0),(2,'Pub partie droite homepage','&lt;p style=&quot;width:203px;border:1px solid #e6e6e6;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/themes/default/img/right_ad.jpg&quot; /&gt;&lt;/p&gt;\r\n',0);
/*!40000 ALTER TABLE `eb_adverts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_auction_emails`
--

DROP TABLE IF EXISTS `eb_auction_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_auction_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_auction_emails`
--

LOCK TABLES `eb_auction_emails` WRITE;
/*!40000 ALTER TABLE `eb_auction_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_auction_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_auctions`
--

DROP TABLE IF EXISTS `eb_auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `peak_only` tinyint(1) NOT NULL,
  `label` int(1) NOT NULL,
  `minimum_price` decimal(30,2) NOT NULL,
  `reserve_price` decimal(30,2) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `bestof` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `top` tinyint(4) NOT NULL,
  `fixed` tinyint(4) NOT NULL,
  `fixed_price` decimal(30,2) NOT NULL,
  `pred_cost` int(11) NOT NULL,
  `pred_nb_users` int(11) NOT NULL,
  `autobids` tinyint(4) NOT NULL,
  `podium` tinyint(4) NOT NULL,
  `second_credits` int(11) NOT NULL,
  `third_credits` int(11) NOT NULL,
  `extends` tinyint(4) NOT NULL,
  `extends_limit` int(11) NOT NULL,
  `extends_bids` int(11) NOT NULL,
  `users_bids` int(11) NOT NULL,
  `buynow` tinyint(4) NOT NULL,
  `buy_id` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_auctions`
--

LOCK TABLES `eb_auctions` WRITE;
/*!40000 ALTER TABLE `eb_auctions` DISABLE KEYS */;
INSERT INTO `eb_auctions` VALUES (1,1,'2016-06-17 11:37:26','2016-06-17 11:37:26',2,0.00,1,0,0.00,0.00,0,0,1,0,0,3,0,0,0.00,0,0,1,0,50,25,0,0,0,0,1,0,0,'2016-06-17 09:25:22','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `eb_auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_auctions_statuses`
--

DROP TABLE IF EXISTS `eb_auctions_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_auctions_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_auctions_statuses`
--

LOCK TABLES `eb_auctions_statuses` WRITE;
/*!40000 ALTER TABLE `eb_auctions_statuses` DISABLE KEYS */;
INSERT INTO `eb_auctions_statuses` VALUES (1,3,'En cours','Ench&egave;re en cours'),(2,4,'Impay&eacute;e','Cette ench&egave;re n\'a pas &eacute;t&eacute; pay&eacute;e. Effectuez le r&eacute;glement pour cette ench&egrave;re afin de poursuivre la transaction.'),(3,5,'Pay&eacute;e','Nous avons re&ccedil;u votre r&eacute;glement et la livraison sera effectu&eacute;e sous peu. '),(4,6,'Recr&eacute;dit&eacute;e','L\'ench&egrave;re a &eacute;t&eacute; recr&eacute;dit&eacute;e.'),(7,7,'Livr&eacute;','');
/*!40000 ALTER TABLE `eb_auctions_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_autobids`
--

DROP TABLE IF EXISTS `eb_autobids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_autobids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `minimum_price` decimal(30,2) NOT NULL,
  `maximum_price` decimal(30,2) NOT NULL,
  `total_bids` int(11) NOT NULL,
  `bids` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_autobids`
--

LOCK TABLES `eb_autobids` WRITE;
/*!40000 ALTER TABLE `eb_autobids` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_autobids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_bids`
--

DROP TABLE IF EXISTS `eb_bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_bids`
--

LOCK TABLES `eb_bids` WRITE;
/*!40000 ALTER TABLE `eb_bids` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_categories`
--

DROP TABLE IF EXISTS `eb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_categories`
--

LOCK TABLES `eb_categories` WRITE;
/*!40000 ALTER TABLE `eb_categories` DISABLE KEYS */;
INSERT INTO `eb_categories` VALUES (20,'Consoles &amp; Jeux vidéo'),(17,'Maison &amp; Bricolage'),(18,'High-tech &amp; informatique'),(19,'Electroménager'),(21,'Bijouterie &amp; Montres'),(23,'Sports &amp; Loisirs'),(22,'Beauté, Santé, Alimentation');
/*!40000 ALTER TABLE `eb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_connexions`
--

DROP TABLE IF EXISTS `eb_connexions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_connexions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_connexions`
--

LOCK TABLES `eb_connexions` WRITE;
/*!40000 ALTER TABLE `eb_connexions` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_connexions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_countries`
--

DROP TABLE IF EXISTS `eb_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_countries`
--

LOCK TABLES `eb_countries` WRITE;
/*!40000 ALTER TABLE `eb_countries` DISABLE KEYS */;
INSERT INTO `eb_countries` VALUES (1,'DE','Allemagne'),(2,'AN','Andorre'),(3,'EN','Angleterre'),(4,'AU','Autriche'),(5,'BE','Belgique'),(6,'BU','Bulgarie'),(7,'CY','Chypre'),(8,'DA','Danemark'),(9,'EC','Ecosse'),(10,'ES','Espagne'),(11,'FR','France'),(12,'IR','Irlande'),(13,'IT','Italie'),(14,'LU','Luxembourg'),(15,'MA','Malte'),(16,'NL','Pays-bas'),(17,'PL','Pologne'),(18,'PO','Portugal'),(19,'SW','Suède'),(20,'CH','Suisse');
/*!40000 ALTER TABLE `eb_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_coupons`
--

DROP TABLE IF EXISTS `eb_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_coupons` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `saving` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `nb_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_coupons`
--

LOCK TABLES `eb_coupons` WRITE;
/*!40000 ALTER TABLE `eb_coupons` DISABLE KEYS */;
INSERT INTO `eb_coupons` VALUES (1,'CODE_TEST',10,3,'test','2011-08-18 13:43:56','2011-12-18 13:43:56',10),(2,'COUPON10',10,2,'Recevez 10 Clics à l&#039;achat d&#039;un pack','2013-07-23 01:19:46','2013-07-25 20:00:00',1),(3,'COUPON12',10,3,'pack de 10 clics','2013-07-23 11:35:05','2013-07-23 20:35:05',1);
/*!40000 ALTER TABLE `eb_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_coupons_submitted`
--

DROP TABLE IF EXISTS `eb_coupons_submitted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_coupons_submitted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_coupons_submitted`
--

LOCK TABLES `eb_coupons_submitted` WRITE;
/*!40000 ALTER TABLE `eb_coupons_submitted` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_coupons_submitted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_email_alerts`
--

DROP TABLE IF EXISTS `eb_email_alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_email_alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `desired` varchar(80) NOT NULL,
  `credits_offered` int(11) NOT NULL,
  `validated` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_email_alerts`
--

LOCK TABLES `eb_email_alerts` WRITE;
/*!40000 ALTER TABLE `eb_email_alerts` DISABLE KEYS */;
INSERT INTO `eb_email_alerts` VALUES (1,2,19,'',0,0,'2013-08-01 23:15:56');
/*!40000 ALTER TABLE `eb_email_alerts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_email_templates`
--

DROP TABLE IF EXISTS `eb_email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `object` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_email_templates`
--

LOCK TABLES `eb_email_templates` WRITE;
/*!40000 ALTER TABLE `eb_email_templates` DISABLE KEYS */;
INSERT INTO `eb_email_templates` VALUES (1,'inscription','Veuillez valider votre inscription','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Votre inscription sur %site_name% a bien &amp;eacute;t&amp;eacute; prise en compte.&lt;br /&gt;\r\n																Pour valider votre inscription et activer votre compte veuillez cliquer sur le lien ci-dessous ou le recopier dans votre navigateur :&lt;br /&gt;\r\n																%site_url%/users/activate?key=%key%&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Si un probl&amp;egrave;me se pose lors de l&amp;#39;activation &lt;a href=&quot;%site_url%/contact&quot;&gt;contactez-nous&lt;/a&gt;.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(2,'email_verification','Changement d&#039;email','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																			&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Vous avez souhait&amp;eacute; changer votre email.&lt;br /&gt;\r\n																Pour valider le changement et activer votre compte veuillez cliquer sur le lien ci-dessous ou le recopier dans votre navigateur :&lt;br /&gt;\r\n																%site_url%/users/activate?key=%key%&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Si un probl&amp;egrave;me se pose lors de l&amp;#39;activation &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;contactez-nous&lt;/a&gt;.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;text-align: center; font-family: verdana; font-size: 10px;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom-color: rgb(0, 0, 0); border-bottom-width: 1px; border-bottom-style: dotted;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(13,'email_confirm_product_win','Félicitations!','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; src=&quot;/themes/default/images/logo.png&quot; width=&quot;150&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	F&amp;eacute;licitations! Vous avez remport&amp;eacute; l&amp;#39;ench&amp;egrave;re n&amp;deg;&lt;a href=&quot;%site_url%/auctions/view/%auction_id%&quot;&gt;%auction_id%&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Nous vous invitons &amp;agrave; payer la somme d&amp;ucirc;e afin de recevoir le produit dans les plus brefs d&amp;eacute;lais. Pour cela &lt;a href=&quot;%site_url%/won-auctions&quot;&gt;cliquez ici&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous remerciant de la confiance que vous nous t&amp;eacute;moignez, nous vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(3,'email_confirm_payment_auction','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;ench&amp;egrave;re n&amp;deg;%auction_id% &amp;nbsp;et vous en remercions vivement.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Votre article devrait vous &amp;ecirc;tre livr&amp;eacute; sous un d&amp;eacute;lai de 7 &amp;agrave; 12 jours maximum.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	D&amp;eacute;s r&amp;eacute;ception, nous vous recommandons de bien vouloir laisser un commentaire accompagn&amp;eacute; d&amp;#39;une photo en cliquant sur ce lien:&lt;br /&gt;\r\n																	%site_url%/auctions/won&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Nous vous remercions par avance, et vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(4,'email_confirm_payment_package','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;achat du pack %package%.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Les cr&amp;eacute;dits sont maintenant disponibles sur votre compte.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(5,'email_confirm_payment_credits','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;ench&amp;egrave;re n&amp;deg;%auction_id% que vous avez choisi de transformer en cr&amp;eacute;dits sur votre compte.&lt;/p&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(8,'contact_response','Vous avez une réponse à  votre message','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Vous avez re&amp;ccedil;u une r&amp;eacute;ponse au message envoy&amp;eacute;.&lt;br /&gt;\r\n																	Pour en prendre connaissance, nous vous remercions de bien vouloir vous connecter sur &lt;a href=&quot;%site_url%/mon-compte&quot;&gt;votre compte&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(9,'product_shipped','Votre produit remporté a été expédié','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous vous confirmons que votre commande n&amp;deg; %auction_id% a bien &amp;eacute;t&amp;eacute; exp&amp;eacute;di&amp;eacute;e.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous remerciant de la confiance que vous nous t&amp;eacute;moignez, nous vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(12,'password_remind','Votre nouveau mot de passe','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Suite &amp;agrave; votre demande, voici votre nouveau mot de passe: %password%&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Si un probl&amp;egrave;me venait &amp;agrave; se poser lors de votre identification avec votre pseudo et mot de passe, merci de &lt;a href=&quot;%site_url%/contact&quot;&gt;nous contacter&lt;/a&gt; dans les meilleurs d&amp;eacute;lais.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(10,'email_alert_auction_start','Information du passage de votre enchere en phase active','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Suite &amp;agrave; votre demande d&amp;rsquo;alerte Email, nous vous informons du passage en phase &amp;quot;Ench&amp;egrave;res en cours&amp;quot; de l&amp;#39;ench&amp;egrave;re suivante:&lt;br /&gt;\r\n																	%auction_name% n&amp;deg;&lt;a href=&quot;%site_url%/auctions/view/%auction_id%&quot;&gt;%auction_id%&lt;/a&gt;&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous pouvez d&amp;egrave;s &amp;agrave; pr&amp;eacute;sent placer des offres.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(11,'email_verification','Confirmation de votre changement d&#039;adresse Email','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;/p&gt;\r\n																&lt;div id=&quot;cke_pastebin&quot;&gt;\r\n																	Merci de bien vouloir confirmer le changement de votre adresse email que vous venez de valider, en activant le lien suivant :&amp;nbsp;&lt;a href=&quot;%site_url%/users/activate?key=%key%&quot;&gt;activer&lt;/a&gt;&lt;/div&gt;\r\n																&lt;div&gt;\r\n																	&amp;nbsp;&lt;/div&gt;\r\n																&lt;div&gt;\r\n																	Si un probl&amp;egrave;me venait &amp;agrave; se poser lors de votre identification avec votre pseudo et mot de passe, merci de&amp;nbsp;&lt;a href=&quot;%site_url%/contact&quot;&gt;nous contacter&lt;/a&gt;&amp;nbsp;dans les meilleurs d&amp;eacute;lais.&lt;/div&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr');
/*!40000 ALTER TABLE `eb_email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_extends`
--

DROP TABLE IF EXISTS `eb_extends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_extends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `deploy` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_extends`
--

LOCK TABLES `eb_extends` WRITE;
/*!40000 ALTER TABLE `eb_extends` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_extends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_follows`
--

DROP TABLE IF EXISTS `eb_follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_follows`
--

LOCK TABLES `eb_follows` WRITE;
/*!40000 ALTER TABLE `eb_follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_images`
--

DROP TABLE IF EXISTS `eb_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `by_default` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_images`
--

LOCK TABLES `eb_images` WRITE;
/*!40000 ALTER TABLE `eb_images` DISABLE KEYS */;
INSERT INTO `eb_images` VALUES (3,1,'d262d9915abe2338defdba1e4511f2a7fe3e3f28.png',1,'2016-06-17 09:25:06');
/*!40000 ALTER TABLE `eb_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_increments`
--

DROP TABLE IF EXISTS `eb_increments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_increments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `lower_price` decimal(30,2) NOT NULL,
  `upper_price` decimal(30,2) NOT NULL,
  `bid_debit` int(11) NOT NULL,
  `price_increment` decimal(30,2) NOT NULL,
  `time_increment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_increments`
--

LOCK TABLES `eb_increments` WRITE;
/*!40000 ALTER TABLE `eb_increments` DISABLE KEYS */;
INSERT INTO `eb_increments` VALUES (1,1,0.00,0.00,1,0.01,30);
/*!40000 ALTER TABLE `eb_increments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_messages`
--

DROP TABLE IF EXISTS `eb_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `object` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `discuss_id` int(11) NOT NULL,
  `open` tinyint(4) NOT NULL,
  `archive` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_messages`
--

LOCK TABLES `eb_messages` WRITE;
/*!40000 ALTER TABLE `eb_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_newsletters`
--

DROP TABLE IF EXISTS `eb_newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `object` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `sent` tinyint(4) NOT NULL,
  `sent_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_newsletters`
--

LOCK TABLES `eb_newsletters` WRITE;
/*!40000 ALTER TABLE `eb_newsletters` DISABLE KEYS */;
INSERT INTO `eb_newsletters` VALUES (1,'new_site','Découvrez le nouveau site','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/admin/img/mails/header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; src=&quot;/themes/default/admin/img/mails/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																D&amp;eacute;couvrez le nouveau site...&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/admin/img/mails/footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2010 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n',1,'2010-10-27 13:56:11');
/*!40000 ALTER TABLE `eb_newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_packages`
--

DROP TABLE IF EXISTS `eb_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bids` int(11) NOT NULL,
  `price` decimal(30,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_packages`
--

LOCK TABLES `eb_packages` WRITE;
/*!40000 ALTER TABLE `eb_packages` DISABLE KEYS */;
INSERT INTO `eb_packages` VALUES (5,'Pack 1',50,50.00),(6,'Pack 2',100,100.00),(7,'Pack 3',250,250.00),(8,'Pack 4',500,500.00);
/*!40000 ALTER TABLE `eb_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_pages`
--

DROP TABLE IF EXISTS `eb_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_pages`
--

LOCK TABLES `eb_pages` WRITE;
/*!40000 ALTER TABLE `eb_pages` DISABLE KEYS */;
INSERT INTO `eb_pages` VALUES (1,'how-it-works','Comment ça marche','','','&lt;p&gt;\r\n	content&lt;/p&gt;\r\n','2010-06-16 00:00:00'),(2,'faq','FAQ','','','&lt;script type=&quot;text/javascript&quot;&gt;\r\n&lt;!-- Begin\r\n/* \r\nCreated by: Fang :: http://tinyurl.com/7v7l8 \r\n*/\r\n\r\nfunction toggle(obj) {\r\n// Moz. or IE\r\nvar sibling=(obj.nextSibling.nodeType==3)? obj.nextSibling.nextSibling : obj.nextSibling;\r\n// hide or show\r\nif(sibling.style.display==&#039;&#039; || sibling.style.display==&#039;block&#039;) {\r\n	sibling.style.display=&#039;none&#039;;\r\n    obj.firstChild.firstChild.data=&#039; &#039;;\r\n    }\r\nelse {\r\n	sibling.style.display=&#039;block&#039;;\r\n    obj.firstChild.firstChild.data=&#039; &#039;;\r\n    }\r\n}\r\n//\r\nfunction initCollapse() {\r\nvar oDT=document.getElementById(&#039;content&#039;).getElementsByTagName(&#039;dt&#039;);\r\nfor (var i=0; i &lt; oDT.length; i++) {\r\n	oDT[i].onclick=function() {toggle(this)};\r\n    var oSpan=document.createElement(&#039;span&#039;);\r\n    var sign=document.createTextNode(&#039;+&#039;);\r\n    oSpan.appendChild(sign);\r\n    oDT[i].insertBefore(oSpan, oDT[i].firstChild);\r\n    oSpan.style.fontFamily=&#039;monospace&#039;;\r\n    oSpan.style.paddingRight=&#039;0.5em&#039;;\r\n    oDT[i].style.cursor=&#039;pointer&#039;;\r\n    toggle(oDT[i]);\r\n	}\r\noDT=null;\r\n}\r\nwindow.onload=function() {if(document.getElementById &amp;&amp; document.createElement) {initCollapse();}}\r\n//--&gt;\r\n&lt;/script&gt;&lt;br /&gt;\r\n&lt;div align=&quot;left&quot;&gt;\r\n	&lt;dl id=&quot;content&quot;&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;1. Clicofun c&amp;rsquo;est quoi ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Clicofun est un site d&amp;#39;ench&amp;egrave;res qui vous permet d&amp;#39;acheter des produits pour un prix nettement inf&amp;eacute;rieur &amp;agrave;&lt;/dd&gt;\r\n		&lt;dd&gt;\r\n			ceux pratiqu&amp;eacute;s habituellement. Il vous suffit de vous inscrire, d&amp;#39;acheter des Clico, et d&amp;#39;ench&amp;eacute;rir sur le produit&lt;/dd&gt;\r\n		&lt;dd&gt;\r\n			de votre choix\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Les ench&amp;egrave;res sont actives de 10h &amp;agrave; minuit, 7 jours sur 7.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Elles ont une dur&amp;eacute;e ind&amp;eacute;termin&amp;eacute;e puisqu&amp;rsquo;elles d&amp;eacute;pendent de l&amp;rsquo;engouement des ench&amp;eacute;risseurs pour le produit, ainsi que du nombre de personnes connect&amp;eacute;es dans la journ&amp;eacute;e. Les comptes &amp;agrave; rebours peuvent avoir diff&amp;eacute;rentes valeurs de 15 &amp;agrave; 120 secondes. L&amp;#39;ench&amp;egrave;re se termine lorsque personne n&amp;#39;a ench&amp;eacute;ri pendant le temps du compte &amp;agrave; rebours, indiqu&amp;eacute; par une pastille sur la vente, chaque clic remettant le compte &amp;agrave; rebours &amp;agrave; la valeur indiqu&amp;eacute;e par la pastille. Ainsi, certaines ventes durent quelques minutes tandis que d&amp;rsquo;autres peuvent durer plusieurs heures.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Si vous le souhaitez, vous pouvez programmer une ench&amp;egrave;re sur le produit que vous d&amp;eacute;sirez. Pour cela, rendez-vous dans l&amp;rsquo;onglet &amp;laquo; Programmer une ench&amp;egrave;re automatique&amp;raquo;.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;2. Comment ench&amp;eacute;rir ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			C&amp;#39;est simple: cliquez sur le bouton &amp;quot;Ench&amp;eacute;rir&amp;quot;. Chaque ench&amp;egrave;re vous co&amp;ucirc;te 1 Clico, augmente le prix de &amp;euro;0.01 et ajoute des secondes selon le produit au compte &amp;agrave; rebours. Bien entendu, vous devez avoir cr&amp;eacute;&amp;eacute; un compte, et achet&amp;eacute; des Clico.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Tant que vous &amp;ecirc;tes le dernier ench&amp;eacute;risseur quand le compte &amp;agrave; rebours arrive &amp;agrave; 0, vous &amp;ecirc;tes le gagnant. Si un autre participant sur-ench&amp;eacute;rit, vous pouvez toujours ench&amp;eacute;rir &amp;agrave; nouveau.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				N&amp;#39;attendez pas la derni&amp;egrave;re seconde: comme le compte &amp;agrave; rebours est repouss&amp;eacute; de plusieurs secondes seloon le produits &amp;agrave; chaque ench&amp;egrave;re, vous n&amp;#39;avez aucun int&amp;eacute;r&amp;ecirc;t &amp;agrave; ench&amp;eacute;rir &amp;agrave; la derni&amp;egrave;re seconde, et vous courrez le risque que votre ench&amp;egrave;re ne soit pas prise en compte &amp;agrave; cause d&amp;#39;une lenteur de votre PC ou de votre connexion Internet.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Vous pouvez aussi cr&amp;eacute;er une ench&amp;egrave;re automatique qui va ench&amp;eacute;rir pour vous dans les limites que vous lui fixez, en cliquant sur le produit voulu, et en utilisant le formulaire de cr&amp;eacute;ation de l&amp;rsquo;ench&amp;egrave;re automatique.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				NB: le compte &amp;agrave; rebours officiel est maintenu de fa&amp;ccedil;on centralis&amp;eacute;e sur nos serveurs, celui affich&amp;eacute; sur votre ordinateur est maintenu localement sur celui-ci, sur la base des informations re&amp;ccedil;ues de nos serveurs. Il peut arriver qu&amp;#39;il y ait un l&amp;eacute;ger d&amp;eacute;calage. Seul le compte &amp;agrave; rebours maintenu sur nos serveurs fait foi.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;3. Comment Gagner ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			C&amp;#39;est simple: le gagnant est le dernier ench&amp;eacute;risseur quand le compte &amp;agrave; rebours arrive &amp;agrave; 0. Vous confirmez alors votre adresse de livraison, choisissez la couleur le cas &amp;eacute;ch&amp;eacute;ant, payez le montant de votre derni&amp;egrave;re ench&amp;egrave;re et les frais de port, et le produit est &amp;agrave; vous, avec une r&amp;eacute;duction tr&amp;egrave;s importante!\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				NB: le compte &amp;agrave; rebours officiel est maintenu de fa&amp;ccedil;on centralis&amp;eacute;e sur nos serveurs, celui affich&amp;eacute; sur votre ordinateur est maintenu localement sur celui-ci, sur la base des informations re&amp;ccedil;ues de nos serveurs. Il peut arriver qu&amp;#39;il y ait un l&amp;eacute;ger d&amp;eacute;calage. Seul le compte &amp;agrave; rebours maintenu sur nos serveurs fait foi.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;4. Qu&amp;rsquo;est ce qu&amp;rsquo;un Clico&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Chaque fois que vous ench&amp;eacute;rissez, cela vous coutera un Clico (que vous remportiez la vente ou pas). Les Clico ne sont pas remboursables.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;5. Puis je me faire rembourser les Clico&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Non, les Clico pour les ench&amp;egrave;res ne sont pas remboursables. Un point sera d&amp;eacute;duit de votre compte pour chaque ench&amp;egrave;re effectu&amp;eacute;e manuellement ou par l&amp;#39;interm&amp;eacute;diaire d&amp;#39;un robot, que vous gagniez ou non.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Par contre si vous &amp;ecirc;tes le gagnant vous &amp;ecirc;tes rembourser de vos clico &amp;agrave; 100% et si vous &amp;ecirc;tes dans le podium des plus gros ench&amp;eacute;risseurs vous faite rembourser :&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Le 1er r&amp;eacute;cup&amp;egrave;re 50 %, le 2e 25% et le 3e 15%&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;6. Comment se fait-il que les prix soient si bas ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Les points utilis&amp;eacute;s par l&amp;#39;ensemble des participants compensent l&amp;#39;&amp;eacute;cart entre le prix pay&amp;eacute; par la personne qui remporte l&amp;#39;objet et son co&amp;ucirc;t r&amp;eacute;el.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;7. Qu&amp;rsquo;est ce qu&amp;rsquo;une ench&amp;egrave;re automatique ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Pour vous simplifier la t&amp;acirc;che, vous pouvez utiliser l&amp;rsquo;ench&amp;egrave;re automatique qui va ench&amp;eacute;rir pour vous, en suivant les param&amp;egrave;tres que vous lui avez donn&amp;eacute;s: nombre maximal d&amp;#39;ench&amp;egrave;res. Une fois qu&amp;#39;une ench&amp;egrave;re automatique a &amp;eacute;t&amp;eacute; cr&amp;eacute;&amp;eacute;e, il va ench&amp;eacute;rir une fois &amp;agrave; chaque fois qu&amp;#39;une autre ench&amp;egrave;re est enregistr&amp;eacute;e et que ses limites n&amp;#39;ont pas &amp;eacute;t&amp;eacute; atteintes. Ceci signifie que:\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				L&amp;rsquo;ench&amp;egrave;re automatique va ench&amp;eacute;rir autant de fois que vous lui dites, augmentant le prix de &amp;euro;0.01, utilisant un point, et ajoutant des secondes selon le produit au compte &amp;agrave; rebours pour chaque ench&amp;egrave;re qu&amp;#39;il fait pour vous.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Si plusieurs ench&amp;egrave;re automatique sont actifs sur la m&amp;ecirc;me ench&amp;egrave;re, ils vont tous ench&amp;eacute;rir &amp;agrave; tour de r&amp;ocirc;le d&amp;egrave;s qu&amp;#39;une nouvelle ench&amp;egrave;re est enregistr&amp;eacute;e, jusqu&amp;#39;&amp;agrave; ce qu&amp;#39;il n&amp;#39;en reste plus qu&amp;#39;un (parce que les autres ont atteint l&amp;#39;une de leurs limites). Ceci signifie que si deux robots ou plus ont des limites de nombre d&amp;#39;ench&amp;egrave;res &amp;eacute;lev&amp;eacute;es, ils peuvent utiliser de nombreux Clico tr&amp;egrave;s rapidement, et ajouter un temps significatif au compte &amp;agrave; rebours.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;8. Comment fermer mon compte ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			En nous envoyant tout simplement un mail. (Lien)&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;9. Est que mes informations personnelles &lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;et financi&amp;egrave;re sont prot&amp;eacute;g&amp;eacute;es.&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Oui. Toute information personnelle est transmise uniquement &amp;agrave; travers des connexions s&amp;eacute;curis&amp;eacute;es et chiffr&amp;eacute;es SSL/TLS. Nos serveurs sont surveill&amp;eacute;s en permanence &amp;agrave; la recherche de vuln&amp;eacute;rabilit&amp;eacute;s.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Nous n&amp;#39;avons aucun acc&amp;egrave;s &amp;agrave; vos d&amp;eacute;tails financiers. Seuls nos op&amp;eacute;rateurs de paiement (Paypal ou Hipay) ont acc&amp;egrave;s &amp;agrave; ces informations. Ce sont des institutions de paiements r&amp;eacute;gul&amp;eacute;es et elles prot&amp;eacute;geront vos donn&amp;eacute;es.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;10. Est-ce-que Clicofun participe aux ench&amp;egrave;res ou utilise des personnes ou des robots pour ench&amp;eacute;rir?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Non. Tous les participants (et donc gagnants) sont de vraies personnes, ind&amp;eacute;pendantes de nous, qui ach&amp;egrave;tent et paient leurs clico comme tous les autres, ou les ont remport&amp;eacute;s lors de ventes pr&amp;eacute;c&amp;eacute;dentes. Ceci a &amp;eacute;t&amp;eacute; v&amp;eacute;rifi&amp;eacute; par les autorit&amp;eacute;s comp&amp;eacute;tentes. Le contraire serait compl&amp;egrave;tement ill&amp;eacute;gal.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;11. Y a-t-il un prix de r&amp;eacute;serve ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Oui. Le prix doit au minimum atteindre 2% de la valeur initiale du produit. Si ce n&amp;rsquo;est pas le cas et que le produit n&amp;rsquo;a pas &amp;eacute;t&amp;eacute; remport&amp;eacute;. Les ench&amp;eacute;risseurs seront rembourser &amp;agrave; 150% et le dernier ench&amp;eacute;risseur &amp;agrave; 200%&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;12. Puis je changer mon Pseudo ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Non. Vous pouvez cependant fermer votre compte en utilisant le compte ci-dessous, et ensuite ouvrir un nouveau compte avec un pseudo de votre choix. Veuillez noter que si vous fermez votre compte, les points inutilis&amp;eacute;s et les articles remport&amp;eacute;s mais pas encore pay&amp;eacute;s seront d&amp;eacute;finitivement perdus.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;13. Est-ce que les produits sont neuf ou d&amp;rsquo;occasion ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Oui, tous les produits sont neufs, dans leur emballage d&amp;#39;origine.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;14. Les produits sont il garantie ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Oui, tous les objets sont couverts par leur garantie constructeur habituelle. Il nous faut retourner le produit dans l&amp;rsquo;emballage d&amp;rsquo;origine. Sans cela nous n&amp;rsquo;accepterons pas le produit.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;15. Combien y a-t-il de frais de livraison ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			La livraison est gratuite pour la Belgique et la France.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;16. Combien de temps prend la livraison ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Les articles sont habituellement exp&amp;eacute;di&amp;eacute;s sous 14 jours ouvr&amp;eacute;s (maximum) apr&amp;egrave;s paiement, avec une livraison en 14 jours (maximum) ouvr&amp;eacute;s apr&amp;egrave;s exp&amp;eacute;dition. Si vous ne recevez pas le produit dans les 14 jours veuillez nous le faire s&amp;rsquo;avoir pour d&amp;eacute;bloquer le probl&amp;egrave;me.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;17. Quels modes de paiement sont accept&amp;eacute;s ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Nous acceptons les modes de paiement via Paypal et Hipay.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;18. Combien de temps pour que les Clico soient &lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;ajout&amp;eacute;s &amp;agrave; mon compte ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Les Clico sont ajout&amp;eacute;s &amp;agrave; votre compte d&amp;egrave;s que nous sommes inform&amp;eacute;s que le paiement a &amp;eacute;t&amp;eacute; compl&amp;egrave;tement re&amp;ccedil;u avec succ&amp;egrave;s.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Les paiements par carte prennent en g&amp;eacute;n&amp;eacute;ral quelques secondes. Dans de rares cas, en particulier lors de maintenances des syst&amp;egrave;mes de Paypal, cela peut prendre quelques minutes, quelquefois plus. Nous vous recommandons donc de ne pas attendre la derni&amp;egrave;re minute pour acheter des Clico suppl&amp;eacute;mentaires dont vous pourriez avoir besoin.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Les autres types de paiements (virements, pr&amp;eacute;l&amp;egrave;vements...) peuvent prendre plus longtemps, en g&amp;eacute;n&amp;eacute;ral plusieurs jours ouvr&amp;eacute;s.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Notez que suivant le type de paiement, nous pouvons soit &amp;ecirc;tre inform&amp;eacute;s automatiquement que le paiement a &amp;eacute;t&amp;eacute; trait&amp;eacute; (c&amp;#39;est le cas quand vous effectuez un paiement par &amp;quot;ch&amp;egrave;que &amp;eacute;lectronique&amp;quot; par l&amp;#39;interm&amp;eacute;diaire de Paypal par exemple), alors que dans d&amp;#39;autres, vous transf&amp;eacute;rez d&amp;#39;abord l&amp;#39;argent sur votre compte Paypal ou Hipay, et une fois que les fonds sont sur ce compte, vous pouvez les utiliser pour effectuer le paiement sur notre site.&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Par s&amp;eacute;curit&amp;eacute;, nous n&amp;#39;avons aucune visibilit&amp;eacute; sur le d&amp;eacute;tail de vos paiements (nous ne savons m&amp;ecirc;me pas comment vous payez). Si vous avez besoin d&amp;#39;aide concernant le processus de paiement, veuillez contacter Paypal ou Hipay suivant le cas.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;19. Combien de temps ai-je pour payer le montant de l&amp;rsquo;ench&amp;egrave;re finale ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Pendant que l&amp;rsquo;ench&amp;egrave;re est toujours actif vous avez tout le temps de finaliser l&amp;rsquo;achat, une fois que le produit de l&amp;rsquo;ench&amp;egrave;re est termin&amp;eacute; vous avez 24 heures pour finaliser l&amp;rsquo;achat.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;20. Pourquoi certaine ench&amp;egrave;re sont annul&amp;eacute;es ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Nous luttons quotidiennement contre la fraude et les fraudeurs. Cependant, certains d&amp;#39;entre eux arrivent &amp;agrave; passer entre les mailles des filets de s&amp;eacute;curit&amp;eacute; que nous mettons en place. Aussi, quand nous nous rendons compte qu&amp;#39;une vente a &amp;eacute;t&amp;eacute; emport&amp;eacute;e par un fraudeur, nous l&amp;#39;annulons, et nous recr&amp;eacute;ditons alors tous les Clico ayant &amp;eacute;t&amp;eacute; utilis&amp;eacute;s par les Utilisateurs sur la vente concern&amp;eacute;e. De la sorte, aucun participant n&amp;#39;est l&amp;eacute;s&amp;eacute;.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				Ces fraudes &amp;quot;r&amp;eacute;ussies&amp;quot; sont cependant extr&amp;ecirc;mement rares. Nous faisons de notre mieux pour am&amp;eacute;liorer notre service et les dispositifs qui le prot&amp;egrave;gent.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;21. Pourquoi un utilisateur n&amp;#39;est plus dans le podium des plus gros ench&amp;eacute;risseurs alors qu&amp;#39;il a utilis&amp;eacute; de nombreux Clico?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Lorsqu&amp;#39;un utilisateur qui est sur le podium des plus gros ench&amp;eacute;risseurs d&amp;eacute;cide de se retirer de la vente en proc&amp;eacute;dant &amp;agrave; l&amp;#39;achat imm&amp;eacute;diat du produit, il dispara&amp;icirc;t alors du classement.\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n				En effet, lorsqu&amp;#39;un utilisateur proc&amp;egrave;de &amp;agrave; l&amp;#39;achat imm&amp;eacute;diat du produit, il a alors le choix entre d&amp;eacute;duire le prix des Clico utilis&amp;eacute;s sur la vente du prix du produit, ou &amp;ecirc;tre recr&amp;eacute;dit&amp;eacute; des Clico utilis&amp;eacute;s sur la vente. Ainsi, son solde de Clico utilis&amp;eacute;s sur la vente est remis &amp;agrave; z&amp;eacute;ro une fois l&amp;#39;achat imm&amp;eacute;diat effectu&amp;eacute;, et l&amp;#39;utilisateur n&amp;#39;appara&amp;icirc;t donc plus dans le podium des plus gros ench&amp;eacute;risseurs. En revanche, cet utilisateur reste dans les historiques d&amp;#39;ench&amp;egrave;res qui sont r&amp;eacute;guli&amp;egrave;rement enregistr&amp;eacute;s.&lt;br /&gt;\r\n				&amp;nbsp;&lt;/p&gt;\r\n		&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;22. Rappelez-vous de l&amp;rsquo;achat imm&amp;eacute;diat ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			A tout moment, vous pouvez quitter une vente et acheter le produit &amp;agrave; son prix public conseill&amp;eacute;. Vous avez alors la possibilit&amp;eacute; de choisir entre d&amp;eacute;duire le prix d&amp;eacute;pens&amp;eacute; pour les Clico utilis&amp;eacute;s sur la vente et r&amp;eacute;gler la diff&amp;eacute;rence, ou bien payer le prix dans son int&amp;eacute;gralit&amp;eacute; et &amp;ecirc;tre r&amp;eacute;cr&amp;eacute;dit&amp;eacute; des Clico utilis&amp;eacute;s sur cette vente sp&amp;eacute;cifique.&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n		&lt;br /&gt;\r\n		&lt;dt&gt;\r\n			&lt;span style=&quot;font-size:18px;&quot;&gt;23. Nous contacter ?&lt;/span&gt;&lt;/dt&gt;\r\n		&lt;dd&gt;\r\n			Vous n&amp;#39;avez pas trouv&amp;eacute; la r&amp;eacute;ponse &amp;agrave; votre question ? N&amp;#39;h&amp;eacute;sitez pas &amp;agrave; nous contacter ! (lien)&lt;br /&gt;\r\n			&amp;nbsp;&lt;/dd&gt;\r\n	&lt;/dl&gt;\r\n&lt;/div&gt;\r\n','2010-06-16 16:03:52'),(3,'news','Actualités','','','&lt;p&gt;\r\n	&lt;font class=&quot;Apple-style-span&quot;&gt;contenu&lt;/font&gt;&lt;/p&gt;\r\n','2010-06-16 16:04:22'),(14,'about','Qui sommes-nous','','','&lt;p&gt;\r\n	content&lt;/p&gt;\r\n','2010-07-01 17:40:20'),(7,'terms','Conditions Générales d&#039;Utilisation','','','&lt;p&gt;\r\n	content&lt;/p&gt;\r\n','2010-06-27 18:20:24'),(8,'qui-sommes-nous','Qui sommes-nous?','','','&lt;p&gt;\r\n	content&lt;/p&gt;\r\n','2010-06-28 09:53:18'),(9,'partenaires','Partenaires','','','&lt;p&gt;\r\n	content&lt;/p&gt;\r\n','2010-06-28 09:53:39'),(10,'presse','Presse','','','&lt;p&gt;\r\n	Contenu&lt;/p&gt;\r\n','2010-06-28 09:53:50'),(11,'contact','Contactez-nous','','','<div>\r\n	<form action=\"/users/message\" method=\"POST\">\r\n		Objet:<br /> <input name=\"object\" style=\"width:250px;\" type=\"text\" /><br />\r\n		Message:<textarea cols=\"70\" name=\"message\" rows=\"10\"></textarea><br />\r\n		<input name=\"submit\" type=\"submit\" value=\"envoyer\" />\r\n</form>\r\n</div>\r\n','2010-06-28 09:56:43'),(12,'sitemap','Plan du site','','','&lt;p&gt;\r\n	Content&lt;/p&gt;\r\n','2010-06-28 09:59:45');
/*!40000 ALTER TABLE `eb_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_payments`
--

DROP TABLE IF EXISTS `eb_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `account` varchar(80) NOT NULL,
  `fixed_fees` float(30,2) NOT NULL,
  `variable_fees` float(30,2) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_payments`
--

LOCK TABLES `eb_payments` WRITE;
/*!40000 ALTER TABLE `eb_payments` DISABLE KEYS */;
INSERT INTO `eb_payments` VALUES (1,'paypal','paypal@mail.com',0.25,3.40,1);
/*!40000 ALTER TABLE `eb_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_polls`
--

DROP TABLE IF EXISTS `eb_polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(80) NOT NULL,
  `response_1` varchar(80) NOT NULL,
  `response_2` varchar(80) NOT NULL,
  `response_3` varchar(80) NOT NULL,
  `response_4` varchar(80) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_polls`
--

LOCK TABLES `eb_polls` WRITE;
/*!40000 ALTER TABLE `eb_polls` DISABLE KEYS */;
INSERT INTO `eb_polls` VALUES (1,'Quel produits est le mieux ?','Consoles de jeux','Électroniques ','Voyages','',1,'2013-07-28 23:11:05');
/*!40000 ALTER TABLE `eb_polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_polls_stats`
--

DROP TABLE IF EXISTS `eb_polls_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_polls_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_polls_stats`
--

LOCK TABLES `eb_polls_stats` WRITE;
/*!40000 ALTER TABLE `eb_polls_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_polls_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_products`
--

DROP TABLE IF EXISTS `eb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `delivery_cost` decimal(30,2) NOT NULL,
  `delivery_information` text NOT NULL,
  `stock_number` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_products`
--

LOCK TABLES `eb_products` WRITE;
/*!40000 ALTER TABLE `eb_products` DISABLE KEYS */;
INSERT INTO `eb_products` VALUES (1,'Apple iPhone 6',18,'L&rsquo;iPhone 6 n&rsquo;est pas seulement plus grand en taille. Il est plus grand en tout. Plus large, mais beaucoup plus fin. Plus puissant, mais remarquablement &eacute;conome en &eacute;nergie. Sa surface lisse m&eacute;tallique &eacute;pouse &agrave; merveille l&rsquo;&eacute;cran Multi-Touch le plus perfectionn&eacute; jamais cr&eacute;&eacute;. Une nouvelle g&eacute;n&eacute;ration d&rsquo;iPhone est n&eacute;e.\r\n',639.00,10.00,'',10,'2016-05-31 15:52:04','0000-00-00 00:00:00'),(2,'test pascal',20,'Description de mon produit pc gamer\r\n',5000.00,10.00,'',1,'2016-06-14 17:42:01','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `eb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_products_buys`
--

DROP TABLE IF EXISTS `eb_products_buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_products_buys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `price` float(30,2) NOT NULL,
  `payment_id` tinyint(4) NOT NULL,
  `date_sent` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_products_buys`
--

LOCK TABLES `eb_products_buys` WRITE;
/*!40000 ALTER TABLE `eb_products_buys` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_products_buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_referrals`
--

DROP TABLE IF EXISTS `eb_referrals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_referrals`
--

LOCK TABLES `eb_referrals` WRITE;
/*!40000 ALTER TABLE `eb_referrals` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_referrals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_settings`
--

DROP TABLE IF EXISTS `eb_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_settings`
--

LOCK TABLES `eb_settings` WRITE;
/*!40000 ALTER TABLE `eb_settings` DISABLE KEYS */;
INSERT INTO `eb_settings` VALUES (38,'show_server_time','yes','Afficher ou non le temps local du serveur sur le site.'),(15,'site_live','yes','Utilisez ce param&egrave;tre pour arr&ecirc;ter le site &agrave; tout moment. Mettre &agrave; non pour arr&ecirc;ter le site et &agrave; oui pour relancer le site'),(25,'bid_value','1','Ceci est la valeur en euros d\'un cr&eacute;dit qu\'un utilisateur utilise pour placer une offre'),(11,'contact_email','contact@site.com','Email auquel seront envoy&eacute;s tous les messages de contact'),(9,'theme','default','Choisissez le design souhait&eacute; pour le site parmi ceux pr&eacute;sent dans le dossier \'/themes/\'.'),(8,'default_meta_keywords','','Mots-cl&eacute;s du site (balise \'meta_keywords\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(7,'default_meta_description','','Description principale du site (balise \'meta_description\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(5,'free_register_credits','10','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour son inscription'),(6,'default_meta_title','Ventes aux enchères','Titre principal du site (balise \'title\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(4,'free_referral_register_credits','5','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour chaque filleul inscrit'),(2,'auction_peak_end','23:00','Le temps (xx:xx) &agrave; partir duquel une ench&egrave;re limit&eacute;e se met en pause'),(1,'auction_peak_start','9:00','Le temps (xx:xx) &agrave; partir duquel une ench&egrave;re limit&eacute;e commence'),(39,'auctions_display','labels','Choisissez le mode de pr&eacute;sentation des ench&egrave;res sur le site (vignettes ou liste)'),(40,'auctions_order','desc','Choisissez le type de tri des timers des ench&egrave;res sur le site'),(41,'free_referral_buy_credits','0','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour chaque filleul ayant achet&eacute; un pack'),(32,'free_first_buy_credits','0','Le pourcentage de cr&eacute;dits offerts &agrave; un utilisateur pour son premier achat de cr&eacute;dits'),(42,'percent_bids_to_buy','0','Le pourcentage du produit de l\'ench&egrave;re &agrave; atteindre avant de pouvoir l\'acheter.'),(10,'home_text','Les enchères sont ouvertes de 9h à 23h 7j/7 (site en cours de mise à jour)','Texte affich&eacute; sur la page d\'accueil');
/*!40000 ALTER TABLE `eb_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_sources`
--

DROP TABLE IF EXISTS `eb_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_sources`
--

LOCK TABLES `eb_sources` WRITE;
/*!40000 ALTER TABLE `eb_sources` DISABLE KEYS */;
INSERT INTO `eb_sources` VALUES (1,'Moteur de recherche'),(2,'Pub sur Internet'),(3,'Article dans la presse'),(4,'Recommendation d\'un proche (famille, ami)'),(5,'Autres');
/*!40000 ALTER TABLE `eb_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_suppliers`
--

DROP TABLE IF EXISTS `eb_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(80) NOT NULL,
  `contact_name` varchar(80) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `fax` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_suppliers`
--

LOCK TABLES `eb_suppliers` WRITE;
/*!40000 ALTER TABLE `eb_suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_testimonials`
--

DROP TABLE IF EXISTS `eb_testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `note` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `validate` tinyint(4) NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_testimonials`
--

LOCK TABLES `eb_testimonials` WRITE;
/*!40000 ALTER TABLE `eb_testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_users`
--

DROP TABLE IF EXISTS `eb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `ppasswd` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(80) NOT NULL,
  `active` int(11) NOT NULL,
  `validation_key` varchar(40) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `partners` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `autobidder` tinyint(1) NOT NULL,
  `source_id` int(11) NOT NULL,
  `desired_category_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `blacklist` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `last_access` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_users`
--

LOCK TABLES `eb_users` WRITE;
/*!40000 ALTER TABLE `eb_users` DISABLE KEYS */;
INSERT INTO `eb_users` VALUES (1,'admin','$2y$10$6p6j1745I4jxRiAoaDburOKLHKIPKDOKE7rrSUL9Uzk.iwXVUc/4G','Test','Test','','','0000-00-00',0,'contact@bwebmedia.com',1,'',0,0,1,0,0,0,'82.123.95.236',0,'2013-07-22 19:26:39','2014-03-15 11:39:13'),(2,'usertest','$2y$10$cTTYQYHuH589H5rH6cXg5.qlQhi0C7XAMQNHPFGXhqQAb5MjUAxy6','usertest','usertest','','','0000-00-00',1,'test@mail.com',1,'',0,0,1,0,1,16,'',0,'2013-07-22 19:33:10','2014-02-12 20:50:26');
/*!40000 ALTER TABLE `eb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-17  7:29:06
