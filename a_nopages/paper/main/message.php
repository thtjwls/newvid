<?
session_start();
$login=$login_id;
include "message_config.php";
include "lib.php";
include "config.php";
include "connection.php";

?>


<title>실시간 쪽지</title>
<style>
	BODY,TD,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
	SELECT{font-size:9pt;}
	A:link    {color:black;text-decoration:none;}
	A:visited {color:black;text-decoration:none;}
	A:active  {color:black;text-decoration:none;}
	A:hover  {color:444444;text-decoration:underline}

	.input {border:solid 1;background-color:white;}
	.head {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:white; width:100px;height=18px}
	.input_comment {border:solid 1 f3f7f3;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:f3f7f3; width:50px;height=18px}
	.submit {border:solid 0 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
</style>


<?

if(!$login) 
{
	echo" <script>
		window.alert('로그인하세요')
		window.close()
		</script>
	";
	exit;
}

if($exec=="send")
{
	if(empty($content))
	{
		echo"
			<script>
			window.alert('내용을 입력하세요')
			history.go(-1)
			</script>
		";
		exit;
	}
	
	$message_dir = "./message";
	
	//$current_time = date("Y-m-d h:i:s a");
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
	$data = "$to_filename|$to|$content|$current_time|\n";
	fwrite($fp,$data);
	fclose($fp);
	
	echo " <script>
		window.alert('쪽지가 발송되었습니다.')
		window.close()
		</script>
		";
	exit;	
}


if(empty($exec))
{
	$select = mysql_query("select * from $table_name_1 where id='$login'", $con);
	if(!$select)
	{
		echo"<script>window.alert('DB select error in $table_name_1');
			history.go(-1)
				</script>
				";
	}
	$row=mysql_fetch_array($select);

	echo "
	
	<BODY leftMargin=0 topMargin=0 marginheight=0 marginwidth=0>

	<table width=300 height=180 border=0>
	<form method=post action=$PHP_SELF?exec=send name=message>
	<input type=hidden name=to_filename value='$to_filename'>
	<input type=hidden name=from_filename value='$row[id]'>
	<input type=hidden name=from value='$row[name]($row[id])'>
	<input type=hidden name=to value='$to'>
	<tr><td align=center>

		<b>$to 님께 쪽지 보내기</b>
	</td></tr>
	<tr><td align=center>
	한글,영문 $input_length 자까지 쓸 수 있습니다.
	</td></tr>
	<tr><td align=center>
		<input type=text name=content class=input maxLength=$input_length size=50>
	</td></tr>
	<tr>
		<td colspan=2 align=center><input type=image src=send.gif border=0 class=submit>보내기 <a href=\"javascript:window.close()\"><img src=cancel.gif border=0></a>취소하기</td>
	</tr>
	</form>
	</table>
	<script>
	document.message.content.focus()
	</script>
	
	
	";
}


?>
