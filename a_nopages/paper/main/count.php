<?
session_start();

include "message_config.php";
include "header.php";
include "lib.php";
include "config.php";
include "connection.php";
include "function.php";

$login=$login_id;
$user=$user_name;
$log_dir = "log_usr";
$message_dir="message";
$user_count = 0;
$current_time = time();
$approve_dir="approve";

if($login)
{
	$select = mysql_query("select * from $table_name_1 where id='$login'", $con);
	if(!$select)
	{
		echo"<script>window.alert('DB select error in member');
			history.go(-1)
				</script>
				";
	}
	$row=mysql_fetch_array($select);

	if($login)
	{
		$fp = fopen("$m_log_dir/$row[id]","w");
		flock($fp,2);
		fwrite($fp,"$row[id]|$row[name]|$current_time|");
		fclose($fp);
	}
} 
else
{
	echo"
		<script>
		window.alert('로그인 하세요')
		history.go(-1);
		</script>
		";
	exit;
}

if(!($tp=opendir($log_dir))) die("$log_dir 폴더를 열 수 없습니다.");
while($t_file = readdir($tp))
$t_filenames[]= $t_file;

$handle=opendir($m_log_dir);
while ($file = readdir($handle)) 
{
	if(($file != ".") && ($file != ".."))
	{
		$f_m_t=filemtime("$m_log_dir/$file");
		if(($current_time - $f_m_t) < $refresh_time+2 )
		{
			$user_count++;
		} 
		else 
		{
			for($i=0; $i<count($t_filenames); $i++)
			{
				if(is_file("$log_dir/$t_filenames[$i]"))
				{
					$temp= "$log_dir/$t_filenames[$i]";
					if(($temp != ".") && ($temp != ".."))
					{
						$src_name = explode(".", $t_filenames[$i]); 
						if($src_name[0]==$file)
						{
							unlink("$temp");
						}
					}
				}
			}
			unlink("$m_log_dir/$file");
		}
	}
}
closedir($handle);

if($login && is_file("$message_dir/$login.cgi"))
{
	$content = file("$message_dir/$login.cgi");
	$end_line_content = count($content) - 1;
	if($content[$end_line_content]!=1)
	{
			
		$fp = fopen("./$message_dir/$login.db.cgi","a");
		flock($fp,2);
		for ($i=0;$i<count($content);$i++)
		{
			fwrite($fp,$content[$i]);
		}
		fclose($fp);
									
		$window_name = time();

					echo " 
						<script>
						window.open('message_view.php','$window_name','width=330,height=200,resizable=no,scrollbars=yes,status=0');
						</script>
					";
	}
}
if($login)
{
	$select=mysql_query("select * from $table_name_2 where to_id = '$login' and view_flag = 0", $con);
	if(!$select)
	{
		echo("
			<script>
			window.alert('DB select error in approve(count.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
	$num=mysql_num_rows($select);
	if($num != 0)
	{
		$row=mysql_fetch_array($select);
		if(($row[view_flag] != 1) && (($row[return_flag] == 0) || ($row[return_flag] == 2) || ($row[return_flag] == 3)))
		{
			$window_name_2 = time();
			$go="approve_view.php?seq_num=".$row[seq_num];
			echo " 
				<script>
					window.open('$go','$window_name_2','width=330,height=200,resizable=no,scrollbars=yes,status=0');
				</script>
				";
		}
		if(($row[view_flag] != 1) && ($row[return_flag] == 5) && ($row[ok_flag] == 1))
		{
			$window_name_2 = time();
			$go="approve_ok.php?seq_num=".$row[seq_num];
			echo " 
				<script>
					window.open('$go','$window_name_2','width=330,height=200,resizable=no,scrollbars=yes,status=0');
				</script>
				";
		}
		if(($row[view_flag] != 1) && (($row[return_flag] == 1) || ($row[return_flag] == 4)))
		{
			$window_name_2 = time();
			$go="approve_return.php?seq_num=".$row[seq_num];
			echo " 
				<script>
					window.open('$go','$window_name_2','width=330,height=200,resizable=no,scrollbars=yes,status=0');
				</script>
				";
		}
	}
}

echo"
<script language=javascript>
setTimeout ('location.reload();',$refresh_time * 1000);
</script>
<body bgcolor=$m_bgcolor>
";
?>
