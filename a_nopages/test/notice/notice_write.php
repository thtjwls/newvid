<? include "../lib/header.php"; ?>
<div id="top_img">
<? include "../lib/top_img.php" ?>
</div>
<div id="wap">
<div class="left_menu">
<? include "../lib/left_menu.php"; ?>
</div>
<div id="contents_div">
<h3>글쓰기</h3>
<form name="writeform" id="writeform" enctype="multipart/form-data" action="notice_write_insert.php" method="post">
<input type="text" name="write_subject" id="write_subject"><br><br><br>
<textarea name="write_contents" id="write_contents" rows="10" cols="20"></textarea>
	<br><br>
	<!-- 파입업로드를 위한 mas_file_size 지정 -->
	<input type="hidden" name="MAX_FILE_SIZE" value="20971520">
	<p>첨부파일 1 :&nbsp;<input type="file" id="file1" name="file1"><br>
	첨부파일 2 :&nbsp;<input type="file" id="file2" name="file2"><br>
	첨부파일 3 :&nbsp;<input type="file" id="file3" name="file3"></p>
	<div id="button_img">
	<input type="image" src="http://thtjwls.dothome.co.kr/test/img/ok.png" onclick="board(); return false;">
	<a href="http://thtjwls.dothome.co.kr/test/notice/notice_list.php"><img src="http://thtjwls.dothome.co.kr/test/img/no.png" border="0px"></a>
	<a href="http://thtjwls.dothome.co.kr/test" id="no"><img src="http://thtjwls.dothome.co.kr/test/img/home.png" border="0px"></a>
	</div>
</form>
</div>
</div>
<? include "../lib/footer.php"; ?>