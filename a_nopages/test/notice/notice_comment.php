<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		th {
			border : 1px solid gray;
		}
		
		td {
			border : 1px solid gray;
		}
	</style>
</head>
<body>
<?
	$sql="select * from board_comment order by no desc";
	$result=mysql_query($sql,$connect);
	$row=mysql_fetch_array($result);

	$no=$row[no];
	$nick=$row[nick];
	$today=$row[today];
	$contents=$row[contents];

	$sql2="select count(*) from board_comment";
	$result2=mysql_query($sql2,$connect);
	$total_comment=mysql_result($result2,0,0);
?>

<caption>댓글</caption>
<p>총 <?= $total_comment ?> 개의 댓글
<table>
<tr>
	<th>댓글코드</th><th><?= $no ?></th><th><?= $nick ?></th>
</tr>
<tr>	
	<td><?= $contents ?></td>
</tr>
</table>
</body>
</html>