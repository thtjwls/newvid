<?

session_cache_limiter("");
session_start();

include("config.php");
include("connection.php");
include("function.php");

	$update = mysql_query("update $table_name_1 set board='$sss' where seq_num=$num", $con);
	if(!$update)
	{
		echo("
			<script>
			window.alert('갱신에러');
			history.go(-1);
			</script>
				");
	}
	echo("
		<script>
		window.alert('수정되었습니다!');
		</script>
			");
	move_url('member_list.php');
	exit;
?>