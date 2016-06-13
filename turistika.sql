/*
Created		27. 03. 2015
Modified		27. 03. 2015
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table destinations (
	id Int NOT NULL AUTO_INCREMENT,
	country_id Int NOT NULL,
	title Varchar(200) NOT NULL,
	description Text,
	www Varchar(200),
	lat Varchar(100),
	alt Varchar(100),
 Primary Key (id)) ENGINE = MyISAM;

Create table users (
	`id` int(11) NOT NULL,
	`email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
	`pass` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
	`first_name` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
	`last_name` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
	`avatar` varchar(200) COLLATE utf8_slovenian_ci DEFAULT NULL,
	`admin` int(11) NOT NULL DEFAULT '0',
	UNIQUE (email),
 Primary Key (id)) ENGINE = MyISAM;

Create table pictures (
	id Int NOT NULL AUTO_INCREMENT,
	destionation_id Int NOT NULL,
	url Varchar(200) NOT NULL,
	title Varchar(200) NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table comments (
	id Int NOT NULL AUTO_INCREMENT,
	user_id Int NOT NULL,
	destination_id Int NOT NULL,
	content Text NOT NULL,
	date_add Timestamp NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table countries (
	id Int NOT NULL AUTO_INCREMENT,
	title Varchar(200) NOT NULL,
	short Varchar(5) NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table rates (
	id Int NOT NULL AUTO_INCREMENT,
	user_id Int NOT NULL,
	destination_id Int NOT NULL,
	date_add Timestamp NOT NULL,
	rate Int NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table travels (
	id Serial NOT NULL,
	user_id Int NOT NULL,
	destination_id Int NOT NULL,
	travel_date Date NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;


Alter table pictures add Foreign Key (destionation_id) references destinations (id) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (destination_id) references destinations (id) on delete  restrict on update  restrict;
Alter table rates add Foreign Key (destination_id) references destinations (id) on delete  restrict on update  restrict;
Alter table travels add Foreign Key (destination_id) references destinations (id) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table rates add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table travels add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table destinations add Foreign Key (country_id) references countries (id) on delete  restrict on update  restrict;

INSERT INTO `comments` (`id`, `user_id`, `destination_id`, `content`, `date_add`) VALUES
(1, 1, 1, 'To je TOP destinacija!', '2015-06-01 07:12:25'),
(2, 2, 1, 'Malo moram popraviti zamike!', '2015-06-01 07:59:45'),
(3, 2, 1, 'asdasdasd', '2015-06-01 07:59:48'),
(5, 2, 1, 'sdfsdfsdf', '2015-06-05 08:50:01');

INSERT INTO `countries` (`id`, `title`, `short`) VALUES
(9, 'Avstrija', 'AUT'),
(8, 'Bosna in hercegovina', 'BiH'),
(6, 'SLOVENIJA', 'SLO'),
(7, 'Italija', 'ITA');

INSERT INTO `destinations` (`id`, `country_id`, `title`, `description`, `www`, `lat`, `alt`) VALUES
(1, 6, 'Trg mladost 3', 'Najboljša šola na svetu', 'vss.scv.si', '46.8437568', '15.98234765'),
(5, 8, 'VELENJE', 'saf,msdbnlfsndlkjfnsdlkjf', 'sdfbsdkfjnkl.net', '32', '34'),
(3, 7, 'Bled', 'Lep otok s cerkvijo.', 'www.bled.si', '32', '12'),
(4, 7, 'Hradčani222', 'asfdasdfsdf', 'www.nevem.com', '123', '123');

INSERT INTO `pictures` (`id`, `destionation_id`, `url`, `title`) VALUES
(1, 1, 'slike/20150522090447000000Lighthouse.jpg', 'asdasdasd'),
(2, 3, 'slike/20150522090518000000Penguins.jpg', 'asdasdasdasdasd'),
(3, 3, 'slike/20150522094140000000Chrysanthemum.jpg', 'sdfsdf'),
(4, 3, 'slike/20150522094211000000VSO-LAB7.doc', 'tzhtrzr'),
(5, 3, 'slike/20150522100118000000Chrysanthemum.jpg', 'asdasdasd'),
(6, 3, 'slike/20150522100126000000Lighthouse.jpg', 'asdasdasdasdasd'),
(7, 3, 'slike/20150522100146000000Penguins.jpg', 'asdasdasdasdasd'),
(8, 4, 'slike/20150522101340000000Lighthouse.jpg', 'asdasd'),
(9, 1, 'slike/20150522101353000000Chrysanthemum.jpg', 'asdasd');

INSERT INTO `users` (`id`, `email`, `pass`, `first_name`, `last_name`, `avatar`, `admin`) VALUES
(1, 'islam.music@gmail.com', '3f36904e6a37768f747cbdf0c63831a84529d738', 'Islam', 'Mušić', NULL, 1),
(2, 'qqq@qq.qq', '3149b3a425530c3adf8b8b2daac40d0bf35882bf', 'qqq', 'qqq', NULL, 0);



