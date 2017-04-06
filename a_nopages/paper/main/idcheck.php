<?
echo("
<title>member ID중복검색</title>

<script language='javascript'>
function replace_id() {
id=document.check.id.value;
opener.document.member.id.value=id;
window.close();
}
</script>

<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
</style>
");

include("config.php");
include("connection.php");

$check = 0;
$count = 0;

$select = "select id from $table_name_1";

$query = mysql_query($select, $con);
if(!$query)
{
	echo("query error in select");
	exit;
}
$no = mysql_num_rows($query);
if($no==0)
{
	echo"
			<div align=center>
      			<table border=0 cellpadding=5 cellspacing=1 width=300 bgcolor=black>
      			<tr>
      			<td bgcolor=#a2a2a2 align=center><font color=white><B>ID 중복 확인</b></font></td>
	      		</tr>
      			<tr>
      			<td bgcolor=white align=center><font color=blue>데이터베이스</font>에 등록된 데이터가 없습니다.<p>사용하셔도 좋습니다.</td>
	      		</tr>
      			</table>
      			</div>
					";
}
else
{
	while($count < $no)
	{
		$temp = mysql_result($query, $count, "id");
		if($temp == $id) 
		{
			echo"
			<div align=center>
      			<table border=0 cellpadding=5 cellspacing=1 width=300 bgcolor=black>
      			<tr>
      			<td bgcolor=#a2a2a2 align=center><font color=white><B>ID 중복 확인</b></font></td>
	      		</tr>
      			<tr>
      			<td bgcolor=white align=center><font color=blue>$id</font>(은)는 이미 등록되어 있습니다.<p>다른 아이디를 사용해 주세요. </td>
	      		</tr>
      			</table>
      			<form action=$PHP_SELF name=id_check method=post><input type=text name=id size=20 class=input><input type=submit value=검색 class=submit></form>
	      		</div>
   			";
   		
   			$check = 1;
   			break;	
		}
		$count = $count + 1;
	}
	if($check==0)
	{
		echo"
		<div align=center>
		<table border=0 cellpadding=5 cellspacing=1 width=300 bgcolor=black>
      	<tr>
      	<td bgcolor=#a2a2a2 align=center><font color=white><B>ID 중복 확인</b></font></td>
      	</tr>
      	<tr>
      	<td bgcolor=white align=center><font color=blue>$id</font>(은)는 아직 등록되지 않은 ID 입니다.<p> 사용하셔도 좋습니다.</td>
      	</tr>
      	</table>
      	
      	<form onsubmit=replace_id() name=check>
      	<input type=hidden name=id value=$id>
      	<input type=button value=적용 class=submit onclick='replace_id()'>
      	</form>
      	
      	</div>
      	";
	}
}

?>
