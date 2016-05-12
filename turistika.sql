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
	id Int NOT NULL AUTO_INCREMENT,
	email Varchar(100) NOT NULL,
	pass Varchar(50) NOT NULL,
	first_name Varchar(50),
	last_name Varchar(50) NOT NULL,
	avatar Varchar(200),
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


