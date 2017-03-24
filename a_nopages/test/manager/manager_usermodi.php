<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
	$no		=$_POST["no"];
	$name	=$_POST["name"];
	$id		=$_POST["id"];
	$email	=$_POST["email"];
	$hp		=$_POST["hp"];
	$visor=$_POST["visor"];	

	$sql="update users set name='$name', id='$id', email='$email', hp='$hp' where no='$no'";
	$result=mysql_query($sql,$connect);
?>
<script>
	alert("수정 완료되었습니다.");
	history.go(-1);
</script>