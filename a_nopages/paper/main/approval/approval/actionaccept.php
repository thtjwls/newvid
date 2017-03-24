<?

session_cache_limiter("");
session_start();

$login=$login_id;
$user=$user_name;
$part=$comp_part;
$rank=$comp_rank;


include "config.php";
include "connection.php";
include "function.php";

$edate=date("Y.m.d(h:i:s)");
$ctime = time();

if($sign==1)
{
	$select=mysql_query("select * from $table_name_2 where seq_num = $index", $con);
	if(!$select)
	{
		echo("
			<script>
			window.alert('DB select error in approve(actionaccept.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
	$row=mysql_fetch_array($select);
	$to_id=$row[user];

    	if($approvememo)
		{
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$row[user]', ctime='$ctime', edate='$edate', ok_flag = 1, return_flag = 5, view_flag = 0, etc_memo = '$approvememo' WHERE seq_num = $index", $con);
		}
		else
		{
			$update =mysql_query("UPDATE $table_name_2 SET to_id = '$row[user]', ctime='$ctime', edate='$edate', ok_flag = 1, view_flag = 0, return_flag = 5 WHERE seq_num = $index", $con);
		}
		if(!$update)
		{
			echo("
				<script>
				window.alert('DB update error in approve(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		echo("
		<script>
		window.alert('결재를 마쳤습니다!');
		</script>
		");
		move_url('getdoc.php');
		exit;
}
else
{
	if(!$approvememo2)
	{
		echo("
			<script>
			window.alert('반려사유를 반드시 기입하시기 바랍니다!');
			history.go(-1);
			</script>
			");
		exit;
	}

		$select=mysql_query("select * from $table_name_2 where seq_num = $index", $con);
		if(!$select)
		{
			echo("
				<script>
				window.alert('DB select error in approve(actionaccept.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row=mysql_fetch_array($select);
		/*
		if($chk==1)
		{
			if($row[viewer]!=$row[view_list])
			{
				$list = explode("<br>", $row[view_list]);
				$viewer=$list[$row[view_cnt]];
				$to_name = explode("(", $viewer);
			}
			else
			{
				$to_name = explode("(", $row[viewer]);
			}

			$view_cnt=$row[view_cnt];

			$select2=mysql_query("select * from $table_name_1 where name = '$to_name[0]'", $con);
			if(!$select2)
			{
				echo("
					<script>
					window.alert('DB select error in approve(actionaccept.php)!');
					history.go(-1);
					</script>
					");
				exit;
			}
			$row2=mysql_fetch_array($select2);

			$to_id=$row2[id];
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', edate='$edate', ok_flag = 1, view_flag = 0, return_flag = 4, view_cnt = $view_cnt, etc_memo = '$approvememo2' WHERE seq_num = $index", $con);
			if(!$update)
			{
				echo("
					<script>
					window.alert('DB update error in approve(actionaccept.php)!');
					history.go(-1);
					</script>
					");
				exit;
			}
			echo("
			<script>
			window.alert('반려되었습니다!');
			</script>
			");
			move_url('getdoc.php');
			exit;
		}
		else
		{
			*/
			//$view_list=$row[view_list]."<br>".$row[approve];
			$view_cnt=$row[view_cnt];

			$to_id=$row[user];
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', edate='$edate', ok_flag = 1, view_flag = 0, return_flag = 4, view_cnt = $view_cnt, etc_memo = '$approvememo2' WHERE seq_num = $index", $con);
			if(!$update)
			{
				echo("
					<script>
					window.alert('DB update error in approve(actionaccept.php)!');
					history.go(-1);
					</script>
					");
				exit;
			}
			echo("
			<script>
			window.alert('반려되었습니다!');
			</script>
			");
			move_url('getdoc.php');
			exit;
		//}
}
?>