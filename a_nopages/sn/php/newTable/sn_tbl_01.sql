CREATE TABLE SN_TBL_01 (
idx int not null auto_increment primary key, 
co_idx int not null,
cate varchar(30) not null,
title varchar(50) not null,
contents text not null,
writer varchar(50) not null,
view int not null default 0,
clike int not null default 0,
chate int not null default 0,
file1 varchar(30) not null default 0,
file2 varchar(30) not null default 0,
file3 varchar(30) not null default 0,
regist_day datetime not null
);