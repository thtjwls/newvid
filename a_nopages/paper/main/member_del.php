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
			window.alert('삭제에러');
			history.go(-1);
			</script>
				");
	}
	echo("
		<script>
		window.alert('모든 사용자 데이터가 삭제되었습니다!');
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
			window.alert('삭제에러');
			history.go(-1);
			</script>
				");
	}
		echo("
			<script>
			window.alert('삭제되었습니다!');
			</script>
				");
		move_url('member_list.php');
		exit;
}
?>
