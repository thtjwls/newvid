<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
	$no		=$_POST["no"];
	$name	=$_POST["name"];
	$id		=$_POST["id"];
	$pass	=$_POST["pass"];
	$nick	=$_POST["nick"];
	$email	=$_POST["address"];
	$hp		=$_POST["hp"];

	$sql="update users set name='$name', id='$id', pass='$pass', nick='$nick', email='$email', hp='$hp' where no='$no'";
	$result=mysql_query($sql,$connect);
?>
<script>
	alert("변경되었습니다.");
	history.go(-1);
</script>
