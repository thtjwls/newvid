<?
include_once("../php/include.php");

$db = new Database;
$connect = $db->connect;

/*
 * idx
 * name
 * id
 * pass
 * buse
 * registDay
 * access
 * tel
 */

$sql = "create table co_user (idx int not null primary key auto_increment,
        name varchar(15) not null,
        id varchar(30) not null,
        pass text not null,
        buse varchar(30) not null,
        registDay varchar(30) not null,
        tel varchar(30) not null,
        access int not null)";
$result = mysql_query($sql,$connect);
if(!$result) {
    print ("Create err... ! ");
} else {
    print ("Create Success... ! ");
}
?>