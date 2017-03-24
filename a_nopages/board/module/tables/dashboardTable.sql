create table IN_DASHBOARD (
IdxNo int not null primary key auto_increment,
Buse varchar(50) not null,
Name varchar(20) not null,
Desktop varchar(50) not null,
Notebook varchar(100) not null,
Moniter varchar(50) not null,
Keyboard int not null default 0,
Mouse int not null default 0,
Comment TEXT null,
CreateDate DATETIME not null,
ModifyDate DATETIME not null,
LastModify varchar(30) not null
);