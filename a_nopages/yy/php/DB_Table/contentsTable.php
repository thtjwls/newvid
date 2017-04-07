<?
$sql = "
create table yy_contents_tbl (
idx int not null auto_increment primary key,
cate varchar(20) not null,
cate_color varchar(50),
comment_idx int null,
subject varchar(100) not null,
contents text not null,
file1 varchar(50) not null,
file2 varchar(50) not null,
file3 varchar(50) not null,
likes int not null default '0',
regist_day varchar(20) not null,
regist_ip varchar(20) not null
);
";
?>