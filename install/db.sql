SET NAMES utf8;
SET TIME_ZONE='+02:00';

CREATE TABLE `PREFIX_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(80) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `postcode` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `country` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_adverts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_adverts` VALUES (1,'Grande pub homepage','&lt;p&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/themes/default/img/top_ad.jpg&quot; /&gt;&lt;/p&gt;\r\n',0),(2,'Pub partie droite homepage','&lt;p style=&quot;width:203px;border:1px solid #e6e6e6;&quot;&gt;\r\n	&lt;img alt=&quot;&quot; src=&quot;/themes/default/img/right_ad.jpg&quot; /&gt;&lt;/p&gt;\r\n',0);

CREATE TABLE `PREFIX_auction_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_auctions` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_auctions_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

INSERT INTO `PREFIX_auctions_statuses` VALUES (1,3,'En cours','Ench&egave;re en cours'),(2,4,'Impay&eacute;e','Cette ench&egave;re n\'a pas &eacute;t&eacute; pay&eacute;e. Effectuez le r&eacute;glement pour cette ench&egrave;re afin de poursuivre la transaction.'),(3,5,'Pay&eacute;e','Nous avons re&ccedil;u votre r&eacute;glement et la livraison sera effectu&eacute;e sous peu. '),(4,6,'Recr&eacute;dit&eacute;e','L\'ench&egrave;re a &eacute;t&eacute; recr&eacute;dit&eacute;e.'),(7,7,'Livr&eacute;','');

CREATE TABLE `PREFIX_autobids` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_categories` VALUES (20,'Consoles &amp; Jeux vidéo'),(17,'Maison &amp; Bricolage'),(18,'High-tech &amp; informatique'),(19,'Electroménager'),(21,'Bijouterie &amp; Montres'),(23,'Sports &amp; Loisirs'),(22,'Beauté, Santé, Alimentation');

CREATE TABLE `PREFIX_connexions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_countries` VALUES (1,'DE','Allemagne'),(2,'AN','Andorre'),(3,'EN','Angleterre'),(4,'AU','Autriche'),(5,'BE','Belgique'),(6,'BU','Bulgarie'),(7,'CY','Chypre'),(8,'DA','Danemark'),(9,'EC','Ecosse'),(10,'ES','Espagne'),(11,'FR','France'),(12,'IR','Irlande'),(13,'IT','Italie'),(14,'LU','Luxembourg'),(15,'MA','Malte'),(16,'NL','Pays-bas'),(17,'PL','Pologne'),(18,'PO','Portugal'),(19,'SW','Suède'),(20,'CH','Suisse');

CREATE TABLE `PREFIX_coupons` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `saving` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `nb_limit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

INSERT INTO `PREFIX_coupons` VALUES (1,'CODE_TEST',10,3,'test','2011-08-18 13:43:56','2011-12-18 13:43:56',10),(2,'COUPON10',10,2,'Recevez 10 Clics à l&#039;achat d&#039;un pack','2013-07-23 01:19:46','2013-07-25 20:00:00',1),(3,'COUPON12',10,3,'pack de 10 clics','2013-07-23 11:35:05','2013-07-23 20:35:05',1);

CREATE TABLE `PREFIX_coupons_submitted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_email_alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `desired` varchar(80) NOT NULL,
  `credits_offered` int(11) NOT NULL,
  `validated` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `object` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_email_templates` VALUES (1,'inscription','Veuillez valider votre inscription','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Votre inscription sur %site_name% a bien &amp;eacute;t&amp;eacute; prise en compte.&lt;br /&gt;\r\n																Pour valider votre inscription et activer votre compte veuillez cliquer sur le lien ci-dessous ou le recopier dans votre navigateur :&lt;br /&gt;\r\n																%site_url%/users/activate?key=%key%&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Si un probl&amp;egrave;me se pose lors de l&amp;#39;activation &lt;a href=&quot;%site_url%/contact&quot;&gt;contactez-nous&lt;/a&gt;.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(2,'email_verification','Changement d&#039;email','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																			&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Vous avez souhait&amp;eacute; changer votre email.&lt;br /&gt;\r\n																Pour valider le changement et activer votre compte veuillez cliquer sur le lien ci-dessous ou le recopier dans votre navigateur :&lt;br /&gt;\r\n																%site_url%/users/activate?key=%key%&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Si un probl&amp;egrave;me se pose lors de l&amp;#39;activation &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;contactez-nous&lt;/a&gt;.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;text-align: center; font-family: verdana; font-size: 10px;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom-color: rgb(0, 0, 0); border-bottom-width: 1px; border-bottom-style: dotted;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(13,'email_confirm_product_win','Félicitations!','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; src=&quot;/themes/default/images/logo.png&quot; width=&quot;150&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	F&amp;eacute;licitations! Vous avez remport&amp;eacute; l&amp;#39;ench&amp;egrave;re n&amp;deg;&lt;a href=&quot;%site_url%/auctions/view/%auction_id%&quot;&gt;%auction_id%&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Nous vous invitons &amp;agrave; payer la somme d&amp;ucirc;e afin de recevoir le produit dans les plus brefs d&amp;eacute;lais. Pour cela &lt;a href=&quot;%site_url%/won-auctions&quot;&gt;cliquez ici&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous remerciant de la confiance que vous nous t&amp;eacute;moignez, nous vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(3,'email_confirm_payment_auction','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;ench&amp;egrave;re n&amp;deg;%auction_id% &amp;nbsp;et vous en remercions vivement.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Votre article devrait vous &amp;ecirc;tre livr&amp;eacute; sous un d&amp;eacute;lai de 7 &amp;agrave; 12 jours maximum.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	D&amp;eacute;s r&amp;eacute;ception, nous vous recommandons de bien vouloir laisser un commentaire accompagn&amp;eacute; d&amp;#39;une photo en cliquant sur ce lien:&lt;br /&gt;\r\n																	%site_url%/auctions/won&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Nous vous remercions par avance, et vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(4,'email_confirm_payment_package','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;achat du pack %package%.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Les cr&amp;eacute;dits sont maintenant disponibles sur votre compte.&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(5,'email_confirm_payment_credits','Paiement valide','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous avons bien re&amp;ccedil;u votre paiement pour l&amp;#39;ench&amp;egrave;re n&amp;deg;%auction_id% que vous avez choisi de transformer en cr&amp;eacute;dits sur votre compte.&lt;/p&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(8,'contact_response','Vous avez une réponse à  votre message','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Vous avez re&amp;ccedil;u une r&amp;eacute;ponse au message envoy&amp;eacute;.&lt;br /&gt;\r\n																	Pour en prendre connaissance, nous vous remercions de bien vouloir vous connecter sur &lt;a href=&quot;%site_url%/mon-compte&quot;&gt;votre compte&lt;/a&gt;.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(9,'product_shipped','Votre produit remporté a été expédié','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Nous vous confirmons que votre commande n&amp;deg; %auction_id% a bien &amp;eacute;t&amp;eacute; exp&amp;eacute;di&amp;eacute;e.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous remerciant de la confiance que vous nous t&amp;eacute;moignez, nous vous souhaitons bonne chance pour vos futures ench&amp;egrave;res.&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(12,'password_remind','Votre nouveau mot de passe','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Suite &amp;agrave; votre demande, voici votre nouveau mot de passe: %password%&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Si un probl&amp;egrave;me venait &amp;agrave; se poser lors de votre identification avec votre pseudo et mot de passe, merci de &lt;a href=&quot;%site_url%/contact&quot;&gt;nous contacter&lt;/a&gt; dans les meilleurs d&amp;eacute;lais.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(10,'email_alert_auction_start','Information du passage de votre enchere en phase active','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;br /&gt;\r\n																	&lt;br /&gt;\r\n																	Suite &amp;agrave; votre demande d&amp;rsquo;alerte Email, nous vous informons du passage en phase &amp;quot;Ench&amp;egrave;res en cours&amp;quot; de l&amp;#39;ench&amp;egrave;re suivante:&lt;br /&gt;\r\n																	%auction_name% n&amp;deg;&lt;a href=&quot;%site_url%/auctions/view/%auction_id%&quot;&gt;%auction_id%&lt;/a&gt;&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	Vous pouvez d&amp;egrave;s &amp;agrave; pr&amp;eacute;sent placer des offres.&lt;/p&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr'),(11,'email_verification','Confirmation de votre changement d&#039;adresse Email','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; width=&quot;150&quot; src=&quot;/themes/default/images/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;p&gt;\r\n																	&lt;br /&gt;\r\n																	Bonjour %username%,&lt;/p&gt;\r\n																&lt;div id=&quot;cke_pastebin&quot;&gt;\r\n																	Merci de bien vouloir confirmer le changement de votre adresse email que vous venez de valider, en activant le lien suivant :&amp;nbsp;&lt;a href=&quot;%site_url%/users/activate?key=%key%&quot;&gt;activer&lt;/a&gt;&lt;/div&gt;\r\n																&lt;div&gt;\r\n																	&amp;nbsp;&lt;/div&gt;\r\n																&lt;div&gt;\r\n																	Si un probl&amp;egrave;me venait &amp;agrave; se poser lors de votre identification avec votre pseudo et mot de passe, merci de&amp;nbsp;&lt;a href=&quot;%site_url%/contact&quot;&gt;nous contacter&lt;/a&gt;&amp;nbsp;dans les meilleurs d&amp;eacute;lais.&lt;/div&gt;\r\n																&lt;p&gt;\r\n																	L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																	%site_url%&lt;/p&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/images/mail_footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2011 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n','fr');

CREATE TABLE `PREFIX_extends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `deploy` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `by_default` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_increments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `lower_price` decimal(30,2) NOT NULL,
  `upper_price` decimal(30,2) NOT NULL,
  `bid_debit` int(11) NOT NULL,
  `price_increment` decimal(30,2) NOT NULL,
  `time_increment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_messages` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `object` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `sent` tinyint(4) NOT NULL,
  `sent_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

INSERT INTO `PREFIX_newsletters` VALUES (1,'new_site','Découvrez le nouveau site','&lt;table bgcolor=&quot;#ccd1d8&quot; height=&quot;100%&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr valign=&quot;top&quot;&gt;\r\n			&lt;td&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot;&gt;\r\n								&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n									&lt;tbody&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/admin/img/mails/header.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td width=&quot;275&quot;&gt;\r\n																&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; height=&quot;78&quot; width=&quot;275&quot;&gt;\r\n																	&lt;tbody&gt;\r\n																		&lt;tr&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot; width=&quot;15&quot;&gt;\r\n																				&lt;a href=&quot;%site_url%&quot;&gt;&lt;img alt=&quot;&quot; border=&quot;0&quot; src=&quot;/themes/default/admin/img/mails/logo.png&quot; /&gt;&lt;/a&gt;&lt;/td&gt;\r\n																			&lt;td height=&quot;30&quot; valign=&quot;bottom&quot;&gt;\r\n																				&amp;nbsp;&lt;/td&gt;\r\n																		&lt;/tr&gt;\r\n																	&lt;/tbody&gt;\r\n																&lt;/table&gt;\r\n															&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table bgcolor=&quot;#ffffff&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;520&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;left&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																Bonjour %username%,&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																D&amp;eacute;couvrez le nouveau site...&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																L&amp;#39;&amp;eacute;quipe %site_name%&lt;br /&gt;\r\n																%site_url%&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n										&lt;tr&gt;\r\n											&lt;td align=&quot;center&quot; background=&quot;/themes/default/admin/img/mails/footer.gif&quot; valign=&quot;top&quot;&gt;\r\n												&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;550&quot;&gt;\r\n													&lt;tbody&gt;\r\n														&lt;tr&gt;\r\n															&lt;td align=&quot;right&quot; height=&quot;70&quot; valign=&quot;top&quot;&gt;\r\n																&lt;br /&gt;\r\n																&lt;br /&gt;\r\n																&amp;nbsp;&lt;/td&gt;\r\n														&lt;/tr&gt;\r\n													&lt;/tbody&gt;\r\n												&lt;/table&gt;\r\n											&lt;/td&gt;\r\n										&lt;/tr&gt;\r\n									&lt;/tbody&gt;\r\n								&lt;/table&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n				&lt;table align=&quot;center&quot; width=&quot;540&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td style=&quot;font-size:10px; font-family:Verdana; text-align:center;&quot;&gt;\r\n								Merci de ne pas r&amp;eacute;pondre &amp;agrave; cet email car celui-ci ne sera pas pris en consid&amp;eacute;ration.&lt;br /&gt;\r\n								Vous avez re&amp;ccedil;u cet e-mail car vous &amp;ecirc;tes un utilisateur inscrit sur notre site.&lt;br /&gt;\r\n								Pour toute information compl&amp;eacute;mentaire, vous pouvez nous contacter &lt;a href=&quot;%site_url%/pages/view/contact&quot;&gt;ici&lt;/a&gt;.&lt;br /&gt;\r\n								&lt;br /&gt;\r\n								&lt;div style=&quot;border-bottom:1px dotted #000000;&quot;&gt;\r\n									&amp;nbsp;&lt;/div&gt;\r\n								&lt;br /&gt;\r\n								Copyright &amp;copy; 2010 %site_name% - Tous droits reserv&amp;eacute;s / All rights reserved.&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n',1,'2010-10-27 13:56:11');


DROP TABLE IF EXISTS `PREFIX_packages`;
CREATE TABLE `PREFIX_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bids` int(11) NOT NULL,
  `price` decimal(30,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `PREFIX_packages` VALUES (5,'Pack 1',50,50.00),(6,'Pack 2',100,100.00),(7,'Pack 3',250,250.00),(8,'Pack 4',500,500.00);


DROP TABLE IF EXISTS `PREFIX_pages`;
CREATE TABLE `PREFIX_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_pages` VALUES (1, 'comment-ca-marche', 'Comment ça marche', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-06-16 00:00:00');
INSERT INTO `PREFIX_pages` VALUES (2, 'faq', 'FAQ', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-06-16 16:03:52');
INSERT INTO `PREFIX_pages` VALUES (3, 'news', 'Actualités', '', '', '&lt;p&gt;\r\n	&lt;font class=&quot;Apple-style-span&quot;&gt;contenu&lt;/font&gt;&lt;/p&gt;\r\n', '2010-06-16 16:04:22');
INSERT INTO `PREFIX_pages` VALUES (14, 'mentions-legales', 'Mentions légales', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-07-01 17:40:20');
INSERT INTO `PREFIX_pages` VALUES (7, 'cgu', 'Conditions Générales d&#039;Utilisation', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-06-27 18:20:24');
INSERT INTO `PREFIX_pages` VALUES (8, 'qui-sommes-nous', 'Qui sommes-nous?', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-06-28 09:53:18');
INSERT INTO `PREFIX_pages` VALUES (9, 'partenaires', 'Partenaires', '', '', '&lt;p&gt;\r\n	content&lt;/p&gt;\r\n', '2010-06-28 09:53:39');
INSERT INTO `PREFIX_pages` VALUES (10, 'presse', 'Presse', '', '', '&lt;p&gt;\r\n	Contenu&lt;/p&gt;\r\n', '2010-06-28 09:53:50');
INSERT INTO `PREFIX_pages` VALUES (11, 'contact', 'Contactez-nous', '', '', '<div>\r\n	<form action="/users/message" method="POST">\r\n		Objet:<br /> <input name="object" style="width:250px;" type="text" /><br />\r\n		Message:<textarea cols="70" name="message" rows="10"></textarea><br />\r\n		<input name="submit" type="submit" value="envoyer" />\r\n</form>\r\n</div>\r\n', '2010-06-28 09:56:43');
INSERT INTO `PREFIX_pages` VALUES (12, 'sitemap', 'Plan du site', '', '', '&lt;p&gt;\r\n	Content&lt;/p&gt;\r\n', '2010-06-28 09:59:45');

CREATE TABLE `PREFIX_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `account` varchar(80) NOT NULL,
  `fixed_fees` float(30,2) NOT NULL,
  `variable_fees` float(30,2) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_payments` VALUES (1,'paypal','paypal@mail.com',0.25,3.40,1);

CREATE TABLE `PREFIX_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(80) NOT NULL,
  `response_1` varchar(80) NOT NULL,
  `response_2` varchar(80) NOT NULL,
  `response_3` varchar(80) NOT NULL,
  `response_4` varchar(80) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_polls_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_products` (
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
) ENGINE=ENGINE_TYPE  DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_products` VALUES (1,'Apple iPhone 6',18,'L&rsquo;iPhone 6 n&rsquo;est pas seulement plus grand en taille. Il est plus grand en tout. Plus large, mais beaucoup plus fin. Plus puissant, mais remarquablement &eacute;conome en &eacute;nergie. Sa surface lisse m&eacute;tallique &eacute;pouse &agrave; merveille l&rsquo;&eacute;cran Multi-Touch le plus perfectionn&eacute; jamais cr&eacute;&eacute;. Une nouvelle g&eacute;n&eacute;ration d&rsquo;iPhone est n&eacute;e.\r\n',639.00,10.00,'',10,'2016-05-31 15:52:04','0000-00-00 00:00:00'),(2,'test pascal',20,'Description de mon produit pc gamer\r\n',5000.00,10.00,'',1,'2016-06-14 17:42:01','0000-00-00 00:00:00');

CREATE TABLE `PREFIX_products_buys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `price` float(30,2) NOT NULL,
  `payment_id` tinyint(4) NOT NULL,
  `date_sent` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `referrer_id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_settings` VALUES (38,'show_server_time','yes','Afficher ou non le temps local du serveur sur le site.'),(15,'site_live','yes','Utilisez ce param&egrave;tre pour arr&ecirc;ter le site &agrave; tout moment. Mettre &agrave; non pour arr&ecirc;ter le site et &agrave; oui pour relancer le site'),(25,'bid_value','1','Ceci est la valeur en euros d\'un cr&eacute;dit qu\'un utilisateur utilise pour placer une offre'),(11,'contact_email','contact@site.com','Email auquel seront envoy&eacute;s tous les messages de contact'),(9,'theme','default','Choisissez le design souhait&eacute; pour le site parmi ceux pr&eacute;sent dans le dossier \'/themes/\'.'),(8,'default_meta_keywords','','Mots-cl&eacute;s du site (balise \'meta_keywords\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(7,'default_meta_description','','Description principale du site (balise \'meta_description\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(5,'free_register_credits','10','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour son inscription'),(6,'default_meta_title','Ventes aux enchères','Titre principal du site (balise \'title\' du code html), utilis&eacute; pour l\'am&eacute;lioration du r&eacute;f&eacute;rencement du site'),(4,'free_referral_register_credits','5','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour chaque filleul inscrit'),(2,'auction_peak_end','23:00','Le temps (xx:xx) &agrave; partir duquel une ench&egrave;re limit&eacute;e se met en pause'),(1,'auction_peak_start','9:00','Le temps (xx:xx) &agrave; partir duquel une ench&egrave;re limit&eacute;e commence'),(39,'auctions_display','labels','Choisissez le mode de pr&eacute;sentation des ench&egrave;res sur le site (vignettes ou liste)'),(40,'auctions_order','desc','Choisissez le type de tri des timers des ench&egrave;res sur le site'),(41,'free_referral_buy_credits','0','Le nombre de cr&eacute;dits offerts &agrave; un utilisateur pour chaque filleul ayant achet&eacute; un pack'),(32,'free_first_buy_credits','0','Le pourcentage de cr&eacute;dits offerts &agrave; un utilisateur pour son premier achat de cr&eacute;dits'),(42,'percent_bids_to_buy','0','Le pourcentage du produit de l\'ench&egrave;re &agrave; atteindre avant de pouvoir l\'acheter.'),(10,'home_text','Les enchères sont ouvertes de 9h à 23h 7j/7 (site en cours de mise à jour)','Texte affich&eacute; sur la page d\'accueil');

CREATE TABLE `PREFIX_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;
INSERT INTO `PREFIX_sources` VALUES (1,'Moteur de recherche'),(2,'Pub sur Internet'),(3,'Article dans la presse'),(4,'Recommendation d\'un proche (famille, ami)'),(5,'Autres');

CREATE TABLE `PREFIX_suppliers` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_testimonials` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE `PREFIX_users` (
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
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;