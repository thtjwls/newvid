<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
	$no	= $_GET["no"];

	$sql="delete from users where no='$no'";
	$result=mysql_query($sql,$connect);
?>
<script>
	alert("삭제가 완료되었습니다.");
	history.go(-1);
</script>