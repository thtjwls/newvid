<? include "dbconnect.php"; ?>
<meta charset="utf-8"; />
<?
/* 회원 테이블 members
 * idx - 고유값 회원버호
 * company - 회사명
 * name - 이름
 * id - 아이디
 * pass - 패스워드
 * level - 직급
 * join_date - 입사날짜
 * com_tel - 내선번호
 * buse - 부서 코드
 */

$sql = "create table members (";
$sql = $sql."idx int not null primary key auto_increment,";
$sql = $sql."company char(20) not null,";
$sql = $sql."name char(20) not null,";
$sql = $sql."id char(20) not null,";
$sql = $sql."pass char(50) not null,";
$sql = $sql."level int not null,";
$sql = $sql."join_date char(30) not null,";
$sql = $sql."com_tel int not null,";
$sql = $sql."buse int not null)";

$result=mysql_query($sql,$connect);
echo "sql :" .$sql;
echo "<br>";
echo "result : " .$result;
echo "<br>";
if(!$result){
    echo "테이블 생성에 실패했습니다. \n 관리자에게 문의하세요.";
} else {
    echo "테이블이 성공적으로 생성되었습니다.";
}
?>