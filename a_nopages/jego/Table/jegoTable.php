<meta charset="utf-8" />
<?
include "../lib/dbconnect.php";

//재고품목 테이블
/* 품목번호 (idxno)
 * 거래처명 (je_com)
 * 품명 (je_name)
 * 시리얼번호 (je_serial)
 * 입고일 (je_ibgo)
 * 소유자 (je_sou)
 * 최종승인 (je_acmember)
 * 최종수정일 (je_regidate)
 * 수량 (je_number)
 * 금액 (je_cost)
 * 상태 (je_sta) 0: 양호 , 1: 불량 , 2: 파기
 */

$sql = "create table je_jego (";
$sql = $sql."idx int not null auto_increment primary key, ";
$sql = $sql."je_com varchar(30) not null, ";
$sql = $sql."je_name varchar(50) not null, ";
$sql = $sql."je_serial varchar(50) not null, ";
$sql = $sql."je_ibgo varchar(30) not null, ";
$sql = $sql."je_sou varchar(20) not null, ";
$sql = $sql."je_acmember varchar(20) not null, ";
$sql = $sql."je_regidate varchar(30) not null, ";
$sql = $sql."je_number int not null, ";
$sql = $sql."je_cost int not null, ";
$sql = $sql."je_sta int not null default '0')";

$result = mysql_query($sql,$connect);
if(!$result) {
?>
<script>
    alert("테이블 생성에 실패하였습니다.");
    history.go(-1);
</script>
    <?
} else {
    ?>
<script>
    alert("테이블 생성");
    history.go(-1);
</script>
    <?
}
?>