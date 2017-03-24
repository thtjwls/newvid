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
	echo"
		<script>
		window.alert('로그인 하세요')
		history.go(-1);
		</script>
		";
	exit;
}

echo"
<script language=javascript>
setTimeout ('location.reload();',$refresh_time * 1000);
</script>
";

?>

<title>현재접속자</title>
<script language = 'JavaScript'>
function newWindow( url )
{
  window.open( url, 'message','width=300,height=180,resizable=no,scrollbars=no,status=0');
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


<BODY LEFTMARGIN='0' TOPMARGIN='0' MARGINWIDTH='0' MARGINHEIGHT='0'>
<?

echo"
<div align=left>
<table border=0 width=500 cellspacing=2 cellpadding=2><tr><td align=left>
<table border=0 cellspacing=1 cellpadding=1 width=100%>
<tr align=center>
<td><img src='image/memo.jpg' border='0'>
</td>
</tr>
</table>
<table border=0 cellspacing=1 cellpadding=3 bgcolor=gray width=600>
	<tr>
		<td bgcolor=$title_bgcolor align=center width=80>
			ID
		</td>
		<td bgcolor=$title_bgcolor align=center width=80>
			이름
		</td>
		<td bgcolor=$title_bgcolor align=center width=160>
			이메일
		</td>
		<td bgcolor=$title_bgcolor align=center width=200>
			담당부서
		</td>
		<td bgcolor=$title_bgcolor align=center width=80>
			직급
		</td>
	</tr>
";
$log_dir="log_usr";
$db_dir = "db";

if(!($tp=opendir($log_dir))) die("$log_dir 폴더를 열 수 없습니다.");
while($t_file = readdir($tp))
$t_filenames[]= $t_file;

for($i=0; $i<count($t_filenames); $i++)
{
	$t=count($t_filenames);
	$c=($t-2);
	$t_del=$t_filenames[$i];
	if($t_del != '.' && $t_del != '..')
	{
		$temp= "$log_dir/$t_filenames[$i]";
		$src_name = explode(".", $t_filenames[$i]); 
		$t_front = strtolower($src_name[0]); 
		$select = mysql_query("select * from $table_name_1 where id='$t_front'", $con);
		if(!$select)
		{
			echo"<script>window.alert('DB select error in $table_name_1');
				history.go(-1)
					</script>
					";
		}
		$row=mysql_fetch_array($select);

		$message_link = "<a href=javascript:newWindow('message.php?to_filename=$row[id]&to=$row[name]($row[id])')><img src=message.gif border=0 alt='쪽지보내기'>"; 
	
		echo "
			<tr>
				<td bgcolor=$list_bgcolor align=left>
					$message_link $row[id]</a>
				</td>			
				<td bgcolor=$list_bgcolor align=center>
					$row[name]</a>
				</td>
				<td bgcolor=$list_bgcolor align=center>
					<a href='mailto:$row[mail]'><img src=mail.gif border=0 alt='메일보내기'> $row[mail]</a>
				</td>
				<td bgcolor=$list_bgcolor align=center>
					$row[comp_part]</a>
				</td>
				<td bgcolor=$list_bgcolor align=center>
					$row[comp_rank]</a>
				</td>
			</tr>
			";	
	}
}
closedir($tp);

echo"
</table>
<table border=0 cellspacing=5 cellpadding=3 width=600>
<tr align=center>
<td>현재 접속자 : $c 명</td>
</tr>
</table>
</table></div>
";
?>