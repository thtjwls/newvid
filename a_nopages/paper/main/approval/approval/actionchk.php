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

$mdate=date("Y.m.d(h:i:s)");
$ctime = time();
if($to_id != 1)
{
	$s1=mysql_query("select approve from $table_name_2 where seq_num = $index", $con);
	if(!$s1)
	{
		echo("
			<script>
			window.alert('DB select error in approve(actionchk.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
	$r1=mysql_fetch_array($s1);
	$temp = explode("(", $r1[approve]);

	$s2=mysql_query("select level from $table_name_1 where name='$temp[0]'", $con);
	if(!$s2)
	{
		echo("
			<script>
			window.alert('DB select error in member(actionchk.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
	$r2=mysql_fetch_array($s2);

	$s3=mysql_query("select level from $table_name_1 where id='$to_id'", $con);
	if(!$s3)
	{
		echo("
			<script>
			window.alert('DB select error in member(actionchk.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
	$r3=mysql_fetch_array($s3);

	if($comp_level >= $r3[level])
	{
		echo("
			<script>
			window.alert('검토인을 다시 선택하십시오!(당신보다 직위가 같거나 낮습니다)');
			history.go(-1);
			</script>
				");
		exit;
	}
	if($r2[level] <= $r3[level])
	{
		echo("
			<script>
			window.alert('검토인의 직위가 결재인보다 높을 수 없습니다!');
			history.go(-1);
			</script>
				");
		exit;
	}
}

if($sign==1)
{
	if($to_id != 1)
	{
		$select=mysql_query("select name, comp_part, comp_rank from $table_name_1 where id = '$to_id'", $con);
		if(!$select)
		{
			echo("
				<script>
				window.alert('DB select error in member(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row=mysql_fetch_array($select);

		$select2=mysql_query("select view_list from $table_name_2 where seq_num = $index", $con);
		if(!$select2)
		{
			echo("
				<script>
				window.alert('DB select error in approve(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row2=mysql_fetch_array($select2);
		$list=$row[name]."(".$row[comp_part]."-".$row[comp_rank].")";
		if($row2[view_list]!=$list)
		{
			$view_list=$row2[view_list]."<br>".$list;
		}
		$view_cnt=$row2[view_cnt] + 1;
		//$view_cnt=1;

		if($etc_memo)
		{
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', mdate='$mdate', view_flag = 0, return_flag = 3, view_cnt = $view_cnt, view_list = '$view_list', etc_memo = '$etc_memo' WHERE seq_num = $index", $con);
		}
		else
		{
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id',  ctime='$ctime',mdate='$mdate', view_flag = 0, return_flag = 3, view_cnt = $view_cnt, view_list = '$view_list' WHERE seq_num = $index", $con);
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
		window.alert('검토를 마쳤습니다!');
		</script>
		");
		move_url('getdoc.php');
		exit;
	}
	else
	{
		$select=mysql_query("select approve from $table_name_2 where seq_num = $index", $con);
		if(!$select)
		{
			echo("
				<script>
				window.alert('DB select error in approve(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row=mysql_fetch_array($select);
		$to_name = explode("(", $row[approve]);

		$select2=mysql_query("select id from $table_name_1 where name = '$to_name[0]'", $con);
		if(!$select2)
		{
			echo("
				<script>
				window.alert('DB select error in member(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row2=mysql_fetch_array($select2);

		$to_id=$row2[id];
		//$view_cnt=2;
		if($etc_memo)
		{
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', mdate='$mdate', view_flag = 0, return_flag = 2, etc_memo = '$etc_memo' WHERE seq_num = $index", $con);
		}
		else
		{
			$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', mdate='$mdate', view_flag = 0, return_flag = 2 WHERE seq_num = $index", $con);
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
		window.alert('검토를 마쳤습니다!');
		</script>
		");
		move_url('getdoc.php');
		exit;
	}
}
else
{
	if(!$etc_memo2)
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
				window.alert('DB select error in approve(actionchk.php)!');
				history.go(-1);
				</script>
				");
			exit;
		}
		$row=mysql_fetch_array($select);
		$to_id=$row[user];
		$list=$user_name."(".$part."-".$rank.")";
		if($row[view_list]!=$list)
		{
			$view_list=$row[view_list]."<br>".$list;
			$view_cnt=$row[view_cnt] + 1;
		}
		else
		{
			$view_list=$row[view_list];
			$view_cnt=$row[view_cnt];
		}

		//$view_cnt=1;
		$update = mysql_query("UPDATE $table_name_2 SET to_id = '$to_id', ctime='$ctime', mdate='$mdate', view_flag = 0, return_flag = 1, view_cnt = $view_cnt, view_list = '$view_list', etc_memo = '$etc_memo2' WHERE seq_num = $index", $con);
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
		window.alert('반려되었습니다!');
		</script>
		");
		move_url('getdoc.php');
		exit;
}

