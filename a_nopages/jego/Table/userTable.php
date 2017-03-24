
<meta charset="utf-8"/>
<?
include "../lib/dbconnect.php";
/* 코드(idx)
 * 이름(name)
 * 아이디
 * 비밀번호(pass)
 * 회사(company)
 * 이메일(email)
 * 전화번호(tel)
 * 등급(level)
 * 승인여부(ac)
 */

$sql = "create table je_member (idx int not null auto_increment primary key,";
$sql = $sql."name varchar(20) not null,";
$sql = $sql."id varchar(20) not null, ";
$sql = $sql."pass TEXT not null, ";
$sql = $sql."company varchar(50) not null, ";
$sql = $sql."email varchar(30) not null, ";
$sql = $sql."tel varchar(20) not null, ";
$sql = $sql."level int not null, ";
$sql = $sql."ac varchar(5) not null)";

$result = mysql_query($sql,$connect);
if(!$result) {
?>
<script>
    alert("테이블 생성에 실패하였습니다.\n잠시 후 다시 시도해 주세요.");
    history.go(-1);
</script>
<?
} else {
?>
<script>
    alert("테이블 생성완료.");
    history.go(-1);
</script>
<?
}
?>