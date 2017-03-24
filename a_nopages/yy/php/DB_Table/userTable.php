<?
# 수집 사용자 항목 들 
$sql = "create table yy_users_tbl (
idx int not null auto_increment primary key,
name varchar(20) not null,
id varchar(50) not null,
password text not null,
hp varchar(20) not null,
regist_day varchar(30) not null,
regist_ip varchar(30) not null,
);";

?>