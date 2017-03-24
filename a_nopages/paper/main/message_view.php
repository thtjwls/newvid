<?
session_start();
$login=$login_id;
include "message_config.php";
include "header.php";
include "lib.php";
include "config.php";
include "connection.php";

if(!$login) 
{
	echo" <script>
		window.alert('로그인하세요')
		history.go(-1)
		</script>
	";
	exit;
}

?>

<style>
table,td,tr{font-size=9pt;}
.input {border:solid 1;background-color:white;}
.submit {border:solid 0 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
</style>

<BODY LEFTMARGIN='0' TOPMARGIN='0' MARGINWIDTH='0' MARGINHEIGHT='0'>
<center>

<?


if($exec=="send"){

	if(empty($content)){
		echo"
			<script>
			window.alert('내용을 입력하세요')
			history.go(-1)
			</script>
		";
		exit;
	}

	$current_time = time();
	if(file_exists("$message_dir/$to_filename.cgi")){
		$view_check=file("$message_dir/$to_filename.cgi");
		$end_line_view_check=count($view_check)-1;
	}
	if($view_check[$end_line_view_check]==1){
		$fp = fopen("$message_dir/$to_filename.cgi","w");
	} else {
		$fp = fopen("$message_dir/$to_filename.cgi","a");
	}
	flock($fp,2);	
	
	
	if($html==0) $content = htmlspecialchars($content);
	
	if(eregi("<script",$content)) $content = htmlspecialchars($content);
	
	$content = stripslashes($content);
	$content = str_replace("|",":",$content);
	$content = str_replace("<a","<a target=_new",$content);

	$data = "$from_filename|$from|$content|$current_time|\n";
	fwrite($fp,$data);
	fclose($fp);
	
	$fp = fopen("$message_dir/$from_filename.send.db.cgi","a");
	flock($fp,2);	
	$content = str_replace("|",":",$content);
	$data = "$to_filename|$to|$content|$current_time|\n";
	fwrite($fp,$data);
	fclose($fp);
	
	if($check==1){
	
		echo " <script>
			window.alert('쪽지가 발송되었습니다.')
			window.close()
			</script>
			";
	} else {
		echo " <script>
			window.alert('쪽지가 발송되었습니다.')
			history.go(-1)
			</script>
			";
	}
		
	exit;
	
}

$id="$message_dir/$login.cgi";
if(!file_exists($id)){
	echo " <script>
		window.alert('새로 도착한 쪽지가 없습니다.')
		window.close()
		</script>
		";
	exit;
}

$message_data = file($id);
$end_line_message_data = count($message_data)-1;
if($message_data[$end_line_message_data]==1){
	$end =count($message_data) - 1;
} else {
	$end =count($message_data);
}

if($message_sound==1){
	echo "<bgsound src=$sound>";
}

for($i=0 ; $i<$end ; $i++){
	
	$message_content = explode("|",$message_data[$i]);
	$current_timestamp = time();
	$current_time = date("Y-m-d h:i:s a",$current_timestamp);
		
	$sended_time = date("Y-m-d h:i:s a",$message_content[3]);
	
	echo "

<table border=0 width=300 cellspacing=1 cellpadding=3>
<tr><td align=center><b>$message_content[1]</b>님이 보내신 쪽지입니다.</td></tr>
<tr><td align=center>보낸시각 : <font color=blue>$sended_time</font>

";

if($current_timestamp - $message_content[3] > $check_time * 60 ){
	echo"<br> 받은시각 : <font color=red>$current_time</font></td></tr>";

} else {
	
	echo " </td></tr>";
}

echo"
<tr><td width=300 wrap>$message_content[2]</td></tr>
<tr><td bgcolor=silver height=1 width=80%></td></tr>
";
if($i==0){
	echo"
	<form method=post action=$PHP_SELF?exec=send name=message>
	";
} else {
	echo"
	<form method=post action=$PHP_SELF?exec=send>
	";
}

	$select = mysql_query("select * from $table_name_1 where id='$login'", $con);
	if(!$select)
	{
		echo"<script>window.alert('DB select error in $table_name_1');
			history.go(-1)
				</script>
				";
	}
	$row=mysql_fetch_array($select);

echo"
	<input type=hidden name=to_filename value='$message_content[0]'>
	<input type=hidden name=from_filename value='$row[id]'>
	<input type=hidden name=from value='$row[name]($row[id])'>
	<input type=hidden name=check value='$end'>
	<input type=hidden name=to value='$message_content[1]'>
	<tr><td align=center>답장쓰기 <input type=text name=content class=input maxLength=$input_length size=30></td></tr>
	<tr><td colspan=2 align=center><input type=image src=send.gif border=0 class=submit>보내기 <a href=\"javascript:window.close()\"><img src=cancel.gif border=0></a>창닫기</td></tr>
	
<tr><td height=9></td></tr>	
<tr><td bgcolor=black height=2></td></tr>	
	
	</form>
	</table>
";

if($i==0){
	echo"
	<script>
	document.message.content.focus()
	</script>
	";
}

}//for

$back_check = file($id);
$end_line_back_check = count($back_check) - 1;
if($back_check[$end_line_back_check]!=1){
	$fp=fopen($id,"a");
	flock($fp,2);
	fwrite($fp,"1");
	fclose($fp);
}

?>
</center>