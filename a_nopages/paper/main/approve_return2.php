<?
session_start();
include "message_config.php";
include "header.php";
include "lib.php";
include "config.php";
include "connection.php";

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

$approve_sound=1;
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
<BODY LEFTMARGIN='0' TOPMARGIN='0' MARGINWIDTH='0' MARGINHEIGHT='0'>
<center>

<?
if($approve_sound==1){
	echo "<bgsound src=$sound>";
}
if($approve_sound==2){
	echo "<bgsound src=$approve_sound>";
}

$select=mysql_query("select * from $table_name_2 where seq_num = $seq_num", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in approve(approve_return.php)!');
		history.go(-1);
		</script>
		");
	exit;
}
$row=mysql_fetch_array($select);

$viewer_list = explode("<br>", $row[view_list]);
$viewer=$viewer_list[$row[view_cnt]];

$current_timestamp = time();
$current_time = date("Y-m-d h:i:s a",$current_timestamp);
$sended_time = date("Y-m-d h:i:s a",$row[ctime]);

?>
<table border=0 width=300 cellspacing=1 cellpadding=1>
<tr><td align=center>
<?if($row[ok_flag]==2)
{
	echo("결재인인 <br><b>$row[approve]");
}
else
{
	echo("검토인인<br><b>$row[viewer]");
}
?>
</b>님이 <br>보내신<a href="" onclick="open_file('<?echo$row[filename]?>');">(<?echo$row[docname]?>)</a>에 대한 
<?if($row[ok_flag]==2)
{
	echo("결재승인");
}
else
{
	echo("검토승인");
}
?>
<font color=red>반려</font>내용입니다.</td></tr>
<tr><td align=center>보낸시각 : <font color=blue><?echo$sended_time?></font>

<?

if($current_timestamp - $message_content[4] > $check_time * 60 ){
	echo"<br> 받은시각 : <font color=red>$current_time</font></td></tr>";

} else {
	
	echo " </td></tr>";
}

echo"
	<br>
<tr><td bgcolor=silver height=1 width=80%></td></tr>
<tr><td align=center width=300 wrap>$row[etc_memo]</td></tr>
<tr><td bgcolor=silver height=1 width=80%></td></tr>
	<tr><td colspan=2 align=center><a href='javascript:window.close();'><img src=cancel.gif border=0></a>창닫기</td></tr>
	
<tr><td height=9></td></tr>	
<tr><td bgcolor=black height=2></td></tr>	
	
	</form>
	</table>
";

$update=mysql_query("update $table_name_2 set view_flag = 1 where seq_num = $seq_num", $con);
if(!$update)
{
	echo("
		<script>
		window.alert('DB update error in approve(approve_return.php)!');
		history.go(-1);
		</script>
		");
	exit;
}
?>
</center>