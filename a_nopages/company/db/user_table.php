<? include "dbconnect.php"; ?>
<meta charset="utf-8" />
<?
$sql="create table it_user (";
$sql=$sql."idx int not null auto_increment primary key, ";
$sql=$sql."name varchar(20) not null, ";
$sql=$sql."id varchar(50) not null, ";
$sql=$sql."pass varchar(50) not null, ";
$sql=$sql."email varchar(50) not null, ";
$sql=$sql."nick varchar(50) not null, ";
$sql=$sql."tel varchar(20) not null,";
$sql=$sql."post_num varchar(100) not null,";
$sql=$sql."address varchar(100) not null,";
$sql=$sql."inner_address varchar(100) not null,";
$sql=$sql."level int not null,";
$sql=$sql."regist_day varchar(30) not null,";
$sql=$sql."regist_ip varchar(30) not null)";
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