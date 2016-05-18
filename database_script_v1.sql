/*
Created		7. 05. 2016
Modified		11. 05. 2016
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table users (
	ID Serial NOT NULL,
	username Varchar(50) NOT NULL,
	first_name Varchar(100) NOT NULL,
	last_name Varchar(100) NOT NULL,
	passwrd Varchar(100) NOT NULL,
	reg_date Date NOT NULL,
	telephone Varchar(20),
	email Varchar(100) NOT NULL,
 Primary Key (ID)) ENGINE = MyISAM;

Create table appartments (
	ID Serial NOT NULL,
	user_ID Bigint UNSIGNED NOT NULL,
	city_ID Bigint UNSIGNED NOT NULL,
	location_ID Bigint UNSIGNED NOT NULL,
	category_ID Bigint UNSIGNED NOT NULL,
	title Varchar(100) NOT NULL,
	description Text,
	bedrooms Int,
	bathrooms Int,
	persons Int NOT NULL,
	ppd Int NOT NULL,
	year_made Int,
	address Varchar(100) NOT NULL,
	wifi_available Bool,
 Primary Key (ID)) ENGINE = MyISAM;

Create table categories (
	ID Serial NOT NULL,
	title Varchar(100) NOT NULL,
	description Text,
 Primary Key (ID)) ENGINE = MyISAM;

Create table locations (
	ID Serial NOT NULL,
	title Varchar(100) NOT NULL,
	description Text,
 Primary Key (ID)) ENGINE = MyISAM;

Create table images (
	ID Serial NOT NULL,
	appartment_ID Bigint UNSIGNED NOT NULL,
	url Varchar(100) NOT NULL,
 Primary Key (ID)) ENGINE = MyISAM;

Create table cities (
	ID Serial NOT NULL,
	title Varchar(100) NOT NULL,
	code Int NOT NULL,
 Primary Key (ID)) ENGINE = MyISAM;

Create table comments (
	ID Serial NOT NULL,
	appartment_ID Bigint UNSIGNED NOT NULL,
	user_ID Bigint UNSIGNED NOT NULL,
	title Varchar(100) NOT NULL,
	description Text NOT NULL,
 Primary Key (ID)) ENGINE = MyISAM;

Create table rentals (
	ID Serial NOT NULL,
	appartment_ID Bigint UNSIGNED NOT NULL,
	user_ID Bigint UNSIGNED NOT NULL,
	start_date Date NOT NULL,
	end_date Date NOT NULL,
	passwrd Varchar(100) NOT NULL,
	res_date Date NOT NULL,
 Primary Key (ID)) ENGINE = MyISAM;


Alter table rentals add Foreign Key (user_ID) references users (ID) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (user_ID) references users (ID) on delete  restrict on update  restrict;
Alter table appartments add Foreign Key (user_ID) references users (ID) on delete  restrict on update  restrict;
Alter table rentals add Foreign Key (appartment_ID) references appartments (ID) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (appartment_ID) references appartments (ID) on delete  restrict on update  restrict;
Alter table images add Foreign Key (appartment_ID) references appartments (ID) on delete  restrict on update  restrict;
Alter table appartments add Foreign Key (category_ID) references categories (ID) on delete  restrict on update  restrict;
Alter table appartments add Foreign Key (location_ID) references locations (ID) on delete  restrict on update  restrict;
Alter table appartments add Foreign Key (city_ID) references cities (ID) on delete  restrict on update  restrict;


