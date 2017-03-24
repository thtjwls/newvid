<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">

<?
	$pass	=$_POST["pass"];
	$email1	=$_POST["email1"];
	$email2	=$_POST["email2"];
	$address=$_POST["address"];
	$hp1	=$_POST["hp1"];
	$hp2	=$_POST["hp2"];
	$hp3	=$_POST["hp3"];
	$hp		=$hp1."-".$hp2."-".$hp3;
	$email	=$email1."@".$email2;

	$sql="update users set pass='$pass', email='$email', hp='$hp', address='$address' where id='$userid'";
	$result=mysql_query($sql,$connect);
?>
<script>
	alert("수정이 완료되었습니다.");
    history.go(-1);
</script>