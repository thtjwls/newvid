<? include "dbconnect.php"; ?>
<meta charset="utf-8" ; />
<?
$sql = "create table documents (idx int not null primary key auto_increment,"; //idx 넘버
$sql = $sql."writer_id varchar(20),";
$sql = $sql."writer_name varchar(20),";
$sql = $sql."writer_buse varchar(20),";
$sql = $sql."writer_tel varchar(20),";
$sql = $sql."buse_own varchar(20),";
$sql = $sql."regi_day varchar(30),";
$sql = $sql."cate varchar(30),";
$sql = $sql."refer1 varchar(20),";
$sql = $sql."refer2 varchar(20),";
$sql = $sql."refer3 varchar(20),";
$sql = $sql."refer4 varchar(20),";
$sql = $sql."refer5 varchar(20),";

for($i=1;$i<=40;$i++){ //각 항목

    if($i==1){
        $sql=$sql."docu_0".$i." varchar(50)";
    } else if($i < 10){
        $sql=$sql.", docu_0".$i." varchar(50)";
    } else if ($i >= 10) {
        $sql=$sql.", docu_".$i." varchar(50)";
    }
}
$sql=$sql.")";

$result=mysql_query($sql,$connect);
echo "".$sql;

if(!$result){
    echo "테이블 생성에 실패했습니다. \n 관리자에게 문의하세요.";
} else {
    echo "테이블이 성공적으로 생성되었습니다.";
}
?>