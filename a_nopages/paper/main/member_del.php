<?

session_cache_limiter("");
session_start();

include("config.php");
include("connection.php");
include("function.php");

if($del=="all")
{
	$delete = mysql_query("delete from $table_name_1", $con);
	if(!$delete)
	{
		echo("
			<script>
			window.alert('��������');
			history.go(-1);
			</script>
				");
	}
	echo("
		<script>
		window.alert('��� ����� �����Ͱ� �����Ǿ����ϴ�!');
		</script>
			");
	move_url('member_list.php');
	exit;
}
else
{
	$delete = mysql_query("delete from $table_name_1 where seq_num=$del", $con);
	if(!$delete)
	{
		echo("
			<script>
			window.alert('��������');
			history.go(-1);
			</script>
				");
	}
		echo("
			<script>
			window.alert('�����Ǿ����ϴ�!');
			</script>
				");
		move_url('member_list.php');
		exit;
}
?>
