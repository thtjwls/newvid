<? include "dbconnect.php"; ?>
<meta charset="utf-8" />
<?
$sql = "create table pp_member (";
$sql = $sql."idx int not null auto_increment primary key, ";
$sql = $sql."id varchar(30) not null, ";
$sql = $sql."name varchar(20) not null,";
$sql = $sql."pass TEXT not null, ";
$sql = $sql."nick varchar(50) not null, ";
$sql = $sql."post_num varchar(20) not null, ";
$sql = $sql."address varchar(50) not null, ";
$sql = $sql."inner_address varchar(100) not null,";
$sql = $sql."tel varchar(30) not null, ";
$sql = $sql."etc TEXT not null, ";
$sql = $sql."regist_day varchar(50) not null, ";
$sql = $sql."regist_ip varchar(50) not null)";
$result=mysql_query($sql,$connect);

if(!$result) {
?>
<script>
    alert("result 에러");
</script>
    <?
} else {
    ?>
<script>
    alert("DB생성완료.");
</script>
    <?
}
?>