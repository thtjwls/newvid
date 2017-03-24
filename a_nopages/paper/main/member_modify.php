<?

session_cache_limiter("");
session_start();

include("config.php");
include("connection.php");
include("function.php");

$select = mysql_query("select * from $table_name_1 where seq_num=$num", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in member_modify.php');
		history.go(-1);
		</script>
		");
}
$row=mysql_fetch_array($select);


?>
<html>
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
<body>
<br>
<table border='0' cellpadding='0' cellspacing='0' bgcolor='#88c4ff'>
    <tr>
        <td width='162' height='33' align=center><p><font color='white'><b>&nbsp;그룹게시판 수정/추가</b></font></td>
    </tr>
</table>
<br>
<table border='0' cellpadding='0' cellspacing='0'>
    <tr>
        <td width='300' height='33' align=center><p>&nbsp;담당부서별로 그룹게시판을 지정할수 있습니다.<br>
		(예 : group1)</td>
    </tr>
</table>
<table border='0' cellpadding='0' cellspacing='0'>
    <tr>
        <td width='300' height='33' align=center><p>&nbsp;
		<?if($row[board]=="")
		{
			echo("
				<font color=blue>현재 등록된 게시판이 없습니다. 추가하시기 바랍니다.</font>
				");
		}
		else
		{
			echo("
				<font color=blue>현재등록된 게시판은 $row[board] 입니다.</font>
				");
		}
		?>
		</td>
    </tr>
</table>
<?
echo("
<form action='modify_ok.php' name='member'  method='post'>
<table width=300>
<tr>
<td>
&nbsp;&nbsp;&nbsp;<b>그룹게시판 설정</b>
</td>
<td>
<input type=text name='sss' size=30 maxlength=30 class=input value='$row[board]'></td>
</tr>
<tr>
<td>
</td>
<td>
<input type=submit value=수정>
<input type=hidden name=num value='$num'>
</td>
</tr>
</table>
</form>
");
?>

<script>
document.member.sss.focus();
</script>
</body>
</html>

