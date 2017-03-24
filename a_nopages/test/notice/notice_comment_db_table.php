<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>

<?
	//board_comment.php table
	$sql = "create table notice_comment";
	$sql = $sql."(no int not null, nick char(20) not null, contents TEXT not null, today char(10))"; //댓글번호, 닉네임, 내용, 날짜
	$result=mysql_query($sql,$connect);
?>