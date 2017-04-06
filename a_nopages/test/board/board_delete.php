<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>

<meta charset="utf-8">
<?
	$idx=$_GET["idx"];
	$nick=$_GET["nick"];

		if($usernick==""){
			echo("
				<script>
					alert('올바른 접근이 아닙니다.');
					location.href='http://thtjwls.dothome.co.kr/test/board/board_list.php';
				</script>
			");
		}else if($nick==""){
			echo("
				<script>
					alert('올바른 접근이 아닙니다.');
					location.href='http://thtjwls.dothome.co.kr/test/board/board_list.php';
				</script>
			");
		}else if($nick != $usernick){
			echo("
				<script>
					alert('올바른 접근이 아닙니다.');
					location.href='http://thtjwls.dothome.co.kr/test/board/board_list.php';
				</script>
			");
		}else{
			$sql="delete from board where idx='$idx'";
			$result=mysql_query($sql,$connect);
			echo("
				<script>
					alert('삭제되었습니다.');
					location.href='http://thtjwls.dothome.co.kr/test/board/board_list.php';
				</script>
			");
		}
?>