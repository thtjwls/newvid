<? include "../db/dbconnect.php" ?>
<meta charset="utf-8">
<?
	/*
		board 테이블 생성
		cate,sbject,contents,nick,hit,file1,file2,file3,regist_day
	*/

	$sql="create table board";
	$sql= $sql."(idx int not null auto_increment primary key,"; //idxkey
	$sql= $sql."board_idx int default '0' not null,";
	$sql= $sql."cate char(10) not null,";
	$sql= $sql."sbject char(50) not null,"; //글제목
	$sql= $sql."contents TEXT not null,"; //글내용
	$sql= $sql."nick char(10) not null,"; //작성자
	$sql= $sql."hit int not null,"; //조회수
	$sql= $sql."file1 char(30) default '0',";
	$sql= $sql."file2 char(30) default '0',";
	$sql= $sql."file3 char(30) default '0',";
	$sql= $sql."regist_day char(20))"; //작성시간
	

	$result=mysql_query($sql,$connect);

	if($result){
		echo("테이블 생성 완료");
	} else {
		echo("생성실패");
	}
?>