<?
include "dbconnect.php";
?>
<meta charset="utf-8" />
<?
$sql = "create table pp_bbs (";
$sql = $sql."idx int not null auto_increment primary key, ";
$sql = $sql."comment_idx int not null, ";
$sql = $sql."cate varchar(20) not null, ";
$sql = $sql."title varchar(80) not null, ";
$sql = $sql."contents TEXT not null, ";
$sql = $sql."writer varchar(50) not null, ";
$sql = $sql."view int not null default 0, ";
$sql = $sql."regist_day varchar(50) not null, ";
$sql = $sql."regist_ip varchar(50) not null)";

echo "sql : ".$sql;

$result = mysql_query($sql,$connect);
if(!$result) {
    ?>
<script>
    alert("DB생성실패.");
</script>
<?
} else {
?>
<script>
    alert("DB생성 성공.");
</script>
<?
}
?>