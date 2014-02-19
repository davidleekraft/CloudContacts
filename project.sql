CREATE TABLE credentials(
	id int(10) unsigned auto_increment primary key,
	username varchar(25) not null,
	passwd varchar(25) not null,
	fname varchar(25) not null,
	lname varchar(25) not null,
	email varchar(50) not null,
	UNIQUE (username),
	UNIQUE (email)) engine=innodb;
	
CREATE TABLE content(
	id int(10) unsigned auto_increment primary key,
	ref int(10) not null,
	fname varchar(25) not null,
	minitial char(1),
	lname varchar(25) not null,
	email varchar(50),
	street varchar(50),
	street2	varchar(50),
	apt varchar(15),
	city varchar(50),
	state varchar(2),
	zip char(10),
	hphonepre char(3),
	hphone char(7),
	hphoneext varchar(5),
	mphonepre char(3),
	mphone char(7),
	image mediumblob) engine=innodb;