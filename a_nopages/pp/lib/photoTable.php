<?
include "dbconnect.php";
?>
<meta charset="utf-8" />
<?
$sql = "create table pp_photo (";
$sql = $sql."idx int not null primary key auto_increment, ";
$sql = $sql."reple_idx int default '0', ";
$sql = $sql."title varchar(50) not null, ";
$sql = $sql."cate varchar(10) not null, ";
$sql = $sql."writer varchar(50) not null, ";
$sql = $sql."image TEXT not null, ";
$sql = $sql."writer_comment TEXT not null, ";
$sql = $sql."regist_day varchar(50) not null";
$sql = $sql.")";
$result = mysql_query($sql,$connect);

if(!$result) {
    echo "sql :" .$sql;
?>
<script>
    alert("DB 테이블 생성 오류");
</script>
    <?
} else {
    ?>
<script>
    alert("DB 테이블 생성 완료.");
</script>
    <?
}
?>