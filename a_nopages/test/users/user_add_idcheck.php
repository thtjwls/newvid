<!DOCTYPE html>
<meta charset="utf-8">
<?
	include "../db/dbconnect.php";
?>
<script>
	function ok(){
		var id = opener.document.getElementById("id").value;
		
		opener.document.getElementById("hidden_ok").innerHTML = "";
		opener.document.getElementById("hidden_ok").innerHTML += "<input type='hidden' id='hiddenid' name='hiddenid' value='ok'>";
		self.close();
	}
</script>
<?
	$id=$_GET["id"];

	$sql="select count(*) from users where id='$id'";
	$result=mysql_query($sql,$connect);
	$search=mysql_result($result,0,0);

	if($search == 0){
		echo ("사용 가능 한 아이디 입니다.");
		echo ("<a href='#id' onclick='ok();'>사용하기</a>");
	} else {
		echo ("중복 된 아이디가 존재합니다.");
	}
?>