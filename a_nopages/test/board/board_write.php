<? include "../lib/header.php"; ?>
<div id="top_img">
<h1>< 이미지 슬라이드 ></h1>
</div>
<div id="wap">
<div class="left_menu">
<? include "../lib/left_menu.php"; ?>
</div>
<div id="contents_div">
<h3>글쓰기</h3>
<form name="writeform" id="writeform" enctype="multipart/form-data" action="board_write_insert.php" method="post">
<input type="text" name="write_subject" id="write_subject"><br><br><br>
<textarea name="write_contents" id="write_contents" rows="10" cols="20"></textarea>
	<br><br>
	<!-- 파입업로드를 위한 mas_file_size 지정 -->
	<input type="hidden" name="MAX_FILE_SIZE" value="20971520">
	<p>첨부파일&nbsp;<input type="file" id="file1" name="file1"></p>
	<div id="button_img">
	<input type="image" src="http://thtjwls.dothome.co.kr/test/img/ok.png" onclick="board(); return false;">
	<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php"><img src="http://thtjwls.dothome.co.kr/test/img/no.png" border="0px"></a>
	<a href="http://thtjwls.dothome.co.kr/test" id="no"><img src="http://thtjwls.dothome.co.kr/test/img/home.png" border="0px"></a>
	</div>
</form>
</div>
</div>
<? include "../lib/footer.php"; ?>