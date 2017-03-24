<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>

<meta charset="utf-8">
<?
	$board_idx	=$_GET[board_idx];
	$nick		=$_GET[nick];
	$idx		=$_GET[idx];

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
		$sql="delete from board where board_idx='$board_idx'";
		$result=mysql_query($sql,$connect);

		$query="select * from board";
		$result1=mysql_query($query,$connect);
		?>
		<input type="hidden" id="idx" name="idx" value="<?=$idx?>">
		<script>
			var idx = document.getElementById("idx").value;	

			alert('삭제되었습니다.');
			location.href="http://thtjwls.dothome.co.kr/test/notice/notice_view.php?idx="+idx;
			//location.href="http://thtjwls.dothome.co.kr/test";

		</script>
<?	} ?>
