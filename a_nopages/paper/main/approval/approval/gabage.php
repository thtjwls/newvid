<?
include "config.php";
include "connection.php";
include "function.php";

if($flag==1)
{
	$update=mysql_query("update $table_name_2 set ok_flag=3 where seq_num=$seq_num", $con);
	if(!$update)
	{
		echo("
			<script>
			window.alert('DB update error in approve(gabage.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
		echo("
			<script>
			window.alert('휴지통에 넣었습니다.');
			</script>
			");
		move_url("mygetdoc.php");
}
else if($flag==2)
{
	$update=mysql_query("update $table_name_2 set ok_flag=4 where seq_num=$seq_num", $con);
	if(!$update)
	{
		echo("
			<script>
			window.alert('DB update error in approve(gabage.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
		echo("
			<script>
			window.alert('휴지통에 넣었습니다.');
			</script>
			");
		move_url("getdoc.php");
}
else
{
	$update=mysql_query("update $table_name_2 set ok_flag=5 where seq_num=$seq_num", $con);
	if(!$update)
	{
		echo("
			<script>
			window.alert('DB update error in approve(gabage.php)!');
			history.go(-1);
			</script>
			");
		exit;
	}
		echo("
			<script>
			window.alert('휴지통에 넣었습니다.');
			</script>
			");
		move_url("getdoc.php");
}

?>