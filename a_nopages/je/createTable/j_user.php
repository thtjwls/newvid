<?
//유저추가 테이블
require("../lib/dbconnect.php");

$sql = "create table j_user ";
$sql .="(idx int not null auto_increment primary key, "; //히든고유값
$sql .="id varchar(50) not null, "; //아이디
$sql .="pass TEXT not null, "; //비밀번호
$sql .="name varchar(20) not null, "; //이름
$sql .="company varchar(50) not null, "; //회사명
$sql .="buse varchar(20) not null, "; //부서명
$sql .="tel varchar(30) not null, "; //연락처 
$sql .="postNum varchar(20) not null, "; //우편번호
$sql .="address varchar(100) not null, ";  //주소
$sql .="in_address varchar(200) not null, "; // 상세주소
$sql .="level int not null, "; //히든레벨
$sql .="access varchar(10) not null, "; //히든승인
$sql .="registDay varchar(30) not null)"; //히든가입일

$result = mysql_query($sql,$connect);
if(!$result) {
    echo("don't create Table... name is 'j_user'");
} else {
    echo("create Table... name is 'j_user");
}
?>