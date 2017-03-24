
<meta charset="utf-8" />
<?
include "../lib/dbconnect.php";

/* 기안테이블 필드
 * idx(고유iD)
 * title(제목)
 * contents(내용)
 * regidate(작성일)
 * regimember(기안책임자)
 * reqBuse(요청부서)
 * reqCoat (요청금액)
 * sta(상태) 0 = 제출(대기) , 1 = 완료, 2 = 반려
 * fanalDate (최종수정일)
 * fanalMember (최종수정자)
 */

$sql ="create table je_gian (";
$sql .="idx int not null auto_increment primary key, ";
$sql .="title varchar(50) not null, ";
$sql .="content TEXT not null, ";
$sql .="regidate varchar(30) not null, ";
$sql .="regimember varchar(30) not null, ";
$sql .="reqBuse varchar(30) not null, ";
$sql .="reqCoat int not null, ";
$sql .="sta int not null, ";
$sql .="fanalDate varchar(30) not null, ";
$sql .="fanalMemeber varchar(50) not null)";
$result = mysql_query($sql,$connect);
if(!$result){
    echo ("create Table Err!!!".Error);
} else {
    echo ("create Table Success");
}
?>