CREATE TABLE SN_NOTICE (
	idx int not null auto_increment primary key,
	cate varchar(30) not null,
	title varchar(100) not null,
	contents text not null,
	writer varchar(50) not null,
	file1 varchar(50) not null default "0",
	file2 varchar(50) not null default "0",
	file3 varchar(50) not null default "0",
	regist_day datetime not null
);