<meta charset="utf-8" />
<?
include "dbconnect.php";    
$sql = "create table lots (idx int not null auto_increment primary key, ";
$sql = $sql."name varchar(20) not null, ";
$sql = $sql."tel varchar(30) not null, ";
$sql = $sql."eventCode varchar(50) not null)";
$result = mysql_query($sql,$connect);
if($result) {
    echo("테이블 생성");
} else {
    echo("테이블 생성실패");
    echo("<br>".$sql);
}
?>