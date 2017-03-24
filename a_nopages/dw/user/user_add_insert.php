<meta charset="utf-8">
<?
	include "../DB/dbcon.php";

	$name	=$_POST["name"];
	$id		=$_POST["id"];
	$pass	=$_POST["pass"];
	$nick	=$_POST["nick"];
	$email1	=$_POST["email1"];
	$email2	=$_POST["email2"];
	$email	=$email1."@".$email2;
	$address=$_POST[""];
	$hp1	=$_POST["hp1"];
	$hp2	=$_POST["hp2"];
	$hp3	=$_POST["hp3"];
	$hp		=$hp1."-".$hp2."-".$hp3;

	$sql="insert into dw_users (name,id,pass,nick,email,address,hp) values ('$name','$id','$pass','$nick','$email','$address','$hp')";
	$result=mysql_query($sql,$connect);

?>

<script type="text/javascript">
	alert("가입이 성공적으로 완료되었습니다.");
	location.href="../";
</script>