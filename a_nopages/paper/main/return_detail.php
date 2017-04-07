<?
session_start();

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;

if(!$login) 
{
	echo" <script>
		window.alert('로그인하세요')
		history.go(-1)
		</script>
	";
	exit;
}

include "config.php";
include "connection.php";

$select=mysql_query("select filename, etc_memo from $table_name_2 where filename = '$content'", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in member(return_detail.php)!');
		history.go(-1);
		</script>
		");
	exit;
}
$row=mysql_fetch_array($select);
?>
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

<script>
function open_file(filename)
{
	window.close();
	var go ='approve/'+filename;	
	window.open(go,'approve_return');
}
</script>

<br>
<table border=0 cellpadding="0" cellspacing="0">
    <tr><td bgcolor=white>
        <?echo$row[etc_memo]?>
		</td>
	</tr>
</table>
<br>
<table>
<tr><td align=center width=300 wrap><a href="" onclick="open_file('<?echo$row[filename]?>');"><<원본결재문서보기>></a></td></tr>
<tr><td colspan=2 align=center><a href="javascript:window.close();"><img src=cancel.gif border=0></a>창닫기</td></tr>
</table>
