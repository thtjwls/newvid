<?
include "connection.php";
include "config.php";
include "function.php";
include "lib.php";

session_start();

if(session_is_registered(login_id))
{
	if($login_id==$master)
	{
		move_url('frameset_admin.php');
	}
	else
	{
		move_url('frameset.php');
	}
}

$log_file="log.cgi";
$flag=0;

	if(!$id)
	{
		echo"<script>window.alert('아이디를 입력 하세요');
				history.go(-1)
					</script>
					";
	}
  	if(!$pw)
	{
		echo"<script>window.alert('비밀번호를 입력 하세요');
				history.go(-1)
					</script>
					";
	}
	$select = mysql_query("select id, pw from $table_name_1", $con);
	if(!$select)
	{
		echo"<script>
			window.alert('DB select error in member');
				history.go(-1)
					</script>
					";
	}
	$num=mysql_num_rows($select);
	if($num==0)
	{
		echo"
			<script>
			window.alert('등록된 사용자 정보가 없습니다.');
			history.go(-1)
			</script>
			";
	}
	while($row=mysql_fetch_array($select))
	{
		if($row[id]==$id && $row[pw]==$pw)
	    {
			$sel = mysql_query("select * from $table_name_1 where id='$id'", $con);
			if(!$sel)
			{
				echo"<script>
					window.alert('DB select error in $table_name_1');
					history.go(-1)
					</script>
					";
			}
			$rows = mysql_num_rows($sel);
			if(!$rows)
			{
					echo(" 
					<script language='javascript'>
					window.alert(' Error')
					history.go(-1)
					</script>
					");
			}
			$row = mysql_fetch_object($sel);
			$db_name		= $row -> name;
			$db_comp_part	= $row -> comp_part;
			$db_comp_rank	= $row -> comp_rank;
			$db_board		= $row -> board;
			$db_level		= $row -> level;
			session_register("login_id", "user_name", "comp_part", "comp_rank", "board_name", "comp_level");
			$login_id  = $id;
			$user_name = $db_name;
			$comp_part = $db_comp_part;
			$comp_rank = $db_comp_rank;
			$board_name= $db_board;
			$comp_level= $db_level;

			$data = $id ."|". $pw ."|". $REMOTE_ADDR ."|";
			if(data_write("log_usr/$id.$log_file","a",$data)) Error ("파일입력 또는 퍼미션 에러!");
			if($login_id==$master)
			{
				move_url('frameset_admin.php');
			}
			else
			{
				move_url('frameset.php');
			}
		}
		if(($row[id]==$id) && ($row[pw]!=$pw))
		{
			echo("
				<script>window.alert('비밀번호가 일치하지 않습니다.');
			history.go(-1);
				</script>
				");
			exit;
		}
		$flag=1;
    }
	if($flag==1)
	{
		echo("
			<script>window.alert('해당하는 회원정보가 없습니다.');
		history.go(-1);
			</script>
			");
    	exit;
	}

echo("
</body>
</html>
");
?>