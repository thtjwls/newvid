<? include "../lib/session.php";
	include "../db/dbconnect.php" ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		#subject {
			width : 800px;
			border : 1px solid gray;
		}

		h3 {
			border-bottom : 3px solid #5CD1E5;
			color :#5CD1E5;
			font-size : 17px;
			padding-bottom : 3px;
		}

		#subject {
			margin-top : 40px;
			height : 30px;
			width : 780px;
		}

		#no {
			float: right;
		}

		#write {
			width : 720px;
		}
	</style>

	<script>
		function board() {
			var subject = document.writeform.subject;
			var contents = document.writeform.contents;
			
			if (subject.value == "")
			{
				alert("제목을 입력 해주세요.");
				subject.focus();
			} 
			else if (contents.value == "")
			{
				alert("내용을 입력 해주세요.");
				contests.focus();
			} 
			else 
			{
				var input = confirm("저장하시겠습니까?");

				if(input == 1){
					document.writeform.submit();
				}
			}
		}

		window.onload = function(){
			var sub = document.getElementById("subject");

		}

		function subject_click(){
			document.getElementId("subject").value="";
		}
	</script>
</head>
<body>
<h3>글수정</h3>
<?
	$idx=$_GET["idx"];

	
	$sql="select * from board where idx='$idx'";
	$result=mysql_query($sql,$connect);

	$row=mysql_fetch_array($result);
	$subject=$row[subject];
	$contents=$row[contents];
	$file1=$row[file1];
	$file2=$row[file2];
	$file3=$row[file3];
	
?>
<form name="writeform" id="write" enctype="multipart/form-data" action="board_modify_insert.php" method="post">
<input type="text" name="subject" id="subject" value="<?=$subject?>" onclick="subject_click()"><br><br><br>
<textarea name="contents" id="contents" rows="20" cols="95"><?=$contents?></textarea>
	<br><br>
	<input type="hidden" name="idx" value="<?=$idx?>">
	<!-- 파입업로드를 위한 mas_file_size 지정 -->
	<input type="hidden" name="MAX_FILE_SIZE" value="20971520">
	<input type="file" id="file1" name="file1"><br>
	<input type="file" id="file2" name="file2"><br>
	<input type="file" id="file3" name="file3"><br>
	<input type="image" src="http://thtjwls.dothome.co.kr/test/img/ok.png" onclick="board()" value="완료">
	<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php"><img src="http://thtjwls.dothome.co.kr/test/img/no.png" border="0px"></a>
	<a href="http://thtjwls.dothome.co.kr/test" id="no"><img src="http://thtjwls.dothome.co.kr/test/img/home.png" border="0px"></a>
</form>
</body>
</html>