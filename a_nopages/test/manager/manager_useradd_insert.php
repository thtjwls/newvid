<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<meta charset="utf-8">
<?
	$name	=$_POST["name"];
	$id		=$_POST["id"];
	$pass	=$_POST["pass"];
	$nick	=$_POST["nick"];
	$email	=$_POST["email"];
	$address=$_POST["address"];
	$hp		=$_POST["hp"];

	$id_query="SELECT count( id ) FROM users WHERE id = '$id'";
	$q_idresult=mysql_query($id_query,$connect);
	$q_idcount=mysql_result($q_idresult,0,0);

	$nick_query="SELECT count( nick ) FROM users WHERE nick = '$nick'";
	$q_nickresult=mysql_query($nick_query,$connect);
	$q_nickcount=mysql_result($q_nickresult,0,0);

	if($q_idcount != 0 || $q_nickcount != 0){
?>
	<script>
		alert("아이디 또는 닉네임이 이미 사용중입니다.")
	</script>
<?
	} else {
	$sql="insert into users (name,id,pass,nick,email,address,hp) value (";
	$sql=$sql."'$name','$id','$pass','$nick','$email','$address','$hp')";
	$result=mysql_query($sql,$connect);
?>
	<script>
		alert("저장되었습니다.");
		history.go(-1);
	</script>
<?
}
?>