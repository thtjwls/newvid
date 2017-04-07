<title>member ID중복검색</title>

<script language="javascript">
function replace_id() {
id=document.check.id.value;
opener.document.member.id.value=id;
window.close();
}
</script>

<style>
table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
SELECT{font-size:9pt;}
A:link    {color:black;text-decoration:none;}
A:visited {color:black;text-decoration:none;}
A:active  {color:black;text-decoration:none;}
A:hover  {color:444444;text-decoration:underline}

.input {border:solid 1;background-color:white;}
.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
</style>

<?
include("./config.php");
require "lib.php3" ;
//member();

$check = 0;
$count = 0;

$connect = mysql_connect("$host", "$user", "$pass");
mysql_select_db("$dbname", $connect);

$select = "select id from $table_name_1";
$select_2 = "select id from $table_name_2";

$query = mysql_query($select, $connect);
$query_2 = mysql_query($select_2, $connect);

$no = mysql_num_rows($query);
$no_2 = mysql_num_rows($query_2);

if($no != 0)
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
      			<td bgcolor=white align=center><font color=blue>$id</font>(은)는 이미 <font color=red>일반회원</font>으로 등록되어 있습니다.<p>다른 아이디를 사용해 주세요. </td>
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
}	


$count = 0;
		
if($no_2 != 0)
{
	while($count < $no_2)
	{
		$temp = mysql_result($query_2, $count, "id");
		if($temp == $id) 
		{
			echo"
			<div align=center>
      			<table border=0 cellpadding=5 cellspacing=1 width=300 bgcolor=black>
      			<tr>
      			<td bgcolor=#a2a2a2 align=center><font color=white><B>ID 중복 확인</b></font></td>
	      		</tr>
      			<tr>
      			<td bgcolor=white align=center><font color=blue>$id</font>(은)는 이미 <font color=red>구직회원</font>으로 등록되어 있습니다.<p>다른 아이디를 사용해 주세요. </td>
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


?>
