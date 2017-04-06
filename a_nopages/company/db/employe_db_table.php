<? include "dbconnect.php"; ?>
<meta charset="utf-8"/>
<?
$sql="create table it_notice (";
$sql=$sql."idx int not null auto_increment primary key, ";
$sql=$sql."title varchar(50) not null, ";
$sql=$sql."contents TEXT not null, ";
$sql=$sql."writer varchar(20) not null, ";
$sql=$sql."status int not null, ";
$sql=$sql."view int not null)";
$result=mysql_query($sql,$connect);
if(!$result) {
?>
    <script>
        alert("result 값 오류 ");
        history.go(-1);
    </script>  
<?
} else {
?>
<script>
    alert("테이블 생성완료");
    history.go(-1);
</script>
<?
}
?>