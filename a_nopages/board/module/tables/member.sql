create table IN_MEMBER (
Idxno int not null auto_increment primary key,
Id varchar(50) not null,
Name varchar(20) not null,
Pass text not null,
Hp varchar(30) not null,
Company varchar(50) not null,
Email varchar(50) not null,
Regist_day datetime not null
)