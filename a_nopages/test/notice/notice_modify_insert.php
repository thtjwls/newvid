<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>
<meta charset="utf-8">
<?
	$idx		=$_POST["idx"];
	$subject	=$_POST["subject"];
	$contents	=$_POST["contents"];
	$file1		=$_FILES["file1"]["name"];
	$file2		=$_FILES["file2"]["name"];
	$file3		=$_FILES["file3"]["name"];


	$sql="UPDATE board set subject='$subject', contents='$contents' WHERE idx='$idx'";
	$result=mysql_query($sql,$connect);
?>
		<script>
			alert('수정완료');
			location.href='http://thtjwls.dothome.co.kr/test/notice/notice_list.php';
		</script>