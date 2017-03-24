<?

session_cache_limiter("");
session_start();

include("config.php");
include("connection.php");
include("function.php");

$flag=0;
$approve_dir = "./approve";
if(!($tp=opendir($approve_dir))) die("approve 폴더를 열 수 없습니다.");
while($t_file = readdir($tp))
$t_filenames[]= $t_file;

sort($t_filenames);

$upload_dir = "./upload";
if(!($up=opendir($upload_dir))) die("upload 폴더를 열 수 없습니다.");
while($u_file = readdir($up))
$u_filenames[]= $u_file;

sort($u_filenames);

if($del=="all")
{
	for($i=0; $i<count($t_filenames); $i++)
	{
		$t_del=$t_filenames[$i];
		if($t_del != '.' && $t_del != '..')
		{
			if(!unlink("$approve_dir/$t_del")) 
			{
				die("$t_del을(를) 삭제할 수 없습니다!");
				exit;
			}
		}
	}
	for($i=0; $i<count($u_filenames); $i++)
	{
		$u_del=$u_filenames[$i];
		if($u_del != '.' && $u_del != '..')
		{
			if(!unlink("$upload_dir/$u_del")) 
			{
				die("$u_del을(를) 삭제할 수 없습니다!");
				exit;
			}
		}
	}
	$delete = mysql_query("delete from $table_name_2", $con);
	if(!$delete)
	{
		echo("
			<script>
			window.alert('삭제에러');
			history.go(-1);
			</script>
			");
		exit;
	}
	echo("
		<script>
		window.alert('모든 데이터가 삭제되었습니다!');
		</script>
			");
	move_url('approve_list.php');
	exit;
}
else
{
	for($i=0; $i<count($t_filenames); $i++)
	{
		$t_del=$t_filenames[$i];
		if($t_del != '.' && $t_del != '..')
		{
			if($filename==$t_del)
			{
				if(!unlink("$approve_dir/$t_del")) 
				{
					die("$t_del을(를) 삭제할 수 없습니다!");
					exit;
				}
			}
		}
	}
	if($filename2 != "")
	{
		for($i=0; $i<count($u_filenames); $i++)
		{
			$u_del=$u_filenames[$i];
			if($u_del != '.' && $u_del != '..')
			{
				if($filename2==$u_del)
				{
					if(!unlink("$upload_dir/$u_del")) 
					{
						die("$u_del을(를) 삭제할 수 없습니다!");
						exit;
					}
				}
			}
		}
	}
	$delete = mysql_query("delete from $table_name_2 where seq_num=$del", $con);
	if(!$delete)
	{
		echo("
			<script>
			window.alert('삭제에러');
			history.go(-1);
			</script>
			");
		exit;
	}
	echo("
		<script>
		window.alert('삭제되었습니다!');
		</script>
			");
	move_url('approve_list.php');
	exit;
}
?>
