<meta charset="utf-8">
<?
	include "../DB/dbcon.php";
?>
<script>
	function ok_nick(){
		var id = opener.document.getElementById("nick").value;
		
		opener.document.getElementById("hidden_ok").innerHTML += "<input type='hidden' id='hiddennick' name='hiddennick' value='ok'>";
		self.close();
	}
</script>
<?
	$nick=$_GET["nick"];

	$sql="select count(*) from dw_users where nick='$nick'";
	$result=mysql_query($sql,$connect);
	$search=mysql_result($result,0,0);

	if($search == 0){
		echo ("사용 가능 한 닉네임 입니다.");
		echo ("<a href='#nick' onclick='ok_nick();'>사용하기</a>");
	} else {
		echo ("<script>
				alert('중복된 닉네임이 존재합니다.');
				opener.document.getElementById('nick').value='';
				self.close();
				</script>
		");
	}
?>