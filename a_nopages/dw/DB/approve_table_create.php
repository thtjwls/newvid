<? include "dbconnect.php"; ?>
<meta varcharset="utf-8" ; />
<?
$sql = "create table approve (";
$sql = $sql."idx int not null primary key auto_increment,";
$sql = $sql."company varchar(20) not null,";
$sql = $sql."docu_buse_code varchar(10),";
$sql = $sql."docu_name varchar(15),";
$sql = $sql."docu_date varchar(20),";
$sql = $sql."docu_self_tel int,";
$sql = $sql."docu_cate varchar(20),";
$sql = $sql."app_1 varchar(20),";
$sql = $sql."app_1_date varchar(20),";
$sql = $sql."app_2 varchar(20),";
$sql = $sql."app_2_date varchar(20),";
$sql = $sql."app_3 varchar(20),";
$sql = $sql."app_3_date varchar(20),";
$sql = $sql."app_4 varchar(20),";
$sql = $sql."app_4_date varchar(20),";
$sql = $sql."app_5 varchar(20),";
$sql = $sql."app_5_date varchar(20),";
$sql = $sql."app_6 varchar(20),";
$sql = $sql."app_6_date varchar(20),";
$sql = $sql."app_7 varchar(20),";
$sql = $sql."app_7_date varchar(20),";
$sql = $sql."app_8 varchar(20),";
$sql = $sql."app_8_date varchar(20),";
$sql = $sql."app_9 varchar(20),";
$sql = $sql."app_9_date varchar(20),";
$sql = $sql."app_10 varchar(20),";
$sql = $sql."app_10_date varchar(20),";
$sql = $sql."app_11 varchar(20),";
$sql = $sql."app_11_date varchar(20),";
$sql = $sql."app_12 varchar(20))";

$result = mysql_query($sql,$connect);

if(!$result){
?>
    <script>
        alert("테이블 생성에 실패하였습니다. \n문제가 지속 될 경우 개발자에게 문의하십시오.")
    </script>
<?
} else {
?>
    <script>
        alert("테이블이 생성되었습니다.")
    </script>
<?
}
?>