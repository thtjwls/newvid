<? include "../lib/session.php";
	include "../db/dbconnect.php"; 
?>
<meta charset="utf-8">
<?
	$re_idx=$_POST["re_idx"];
	$re_text=$_POST["re_text"];
	$regist_day=date("Y-m-d H:i:s");


	$sql="insert into board (board_idx, cate, contents, nick, regist_day) value";
	$sql= $sql."('$re_idx','comment','$re_text','$usernick','$regist_day')";
	$result=mysql_query($sql,$connect);
?>
		
<script>
	alert('저장되었습니다.');
	history.go(-1);
</script>
		
