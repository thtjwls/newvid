<?
$connect = mysql_connect("localhost","thtjwls","ekdP0919!") or die ("connect Err...!");
mysql_select_db("thtjwls");
mysql_query("set names utf-8");

$sql = "create table sam_bbs_tbl ";
$sql .="(idx int not null auto_increment primary key, ";
$sql .="cate varchar(30) not null, ";
$sql .="title text not null, ";
$sql .="contents text not null , ";
$sql .="writer varchar(50) not null, ";
$sql .="file1 varchar(50) not null, ";
$sql .="file2 varchar(50) not null, ";
$sql .="file3 varchar(50) not null, ";
$sql .="hitLike int default '0' not null, ";
$sql .="hitHate int default '0' not null, ";
$sql .="hit int default '0' not null, ";
$sql .="regist_day varchar(30) not null, ";
$sql .="regist_ip varchar(20) not null)";

$result = mysql_query($sql,$connect);
if(!$result)
    echo "failed create table sam_bbs_tbl<br>".$sql;
else
    echo "success create table sam_bbs_tbl";
?>