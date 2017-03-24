<? include "../lib/header.php" ?>
<div id="top_img">
<? include "../lib/top_img.php" ?>
</div> <!--top_img end -->
<div id="wap">
<div class="left_menu">
	<? include "../lib/left_menu.php" ?>
</div><!-- left_menu -->
<div id="contents_div">
<?
	$idx=$_GET["idx"];

	setcookie("cook","$idx",time() + 3600);		//cook쿠키의 이름은 cook 3600초 유지

	if($_COOKIE[cook] != $idx){											//$cookieid 가 없으면 if 문 돌림
		$sqlhit="update board set hit=hit+1 where idx='$idx'";
		$hit=mysql_query($sqlhit,$connect);	//hit 레코드 +1 증가
	} 

	$sql="select * from board where idx='$idx'";		//$idx 의 레코드 보기
	$result=mysql_query($sql,$connect);
	


	$row=mysql_fetch_array($result);
			
	$idx		=$row[idx];			//no칼럼
	$subject	=$row[subject];		//subject칼럼
	$contents	=$row[contents];	//contents칼럼
	$nick		=$row[nick];		//nick 칼럼
	$hit		=$row[hit];			//hit칼럼
	$regist_day	=$row[regist_day];	//regist_day 칼럼
	$file1		=$row[file1];
	$file1		=substr($file1,15);
	$fileonename=$row[file1];
	$filetype	=mime_content_type("../file/".$fileonename);
	$filepath	="../file/";
	$view_file	=$filepath.$fileonename;
	$filesize	=getimagesize($view_file)[3];

	if($filesize > width=="600"){
		$width = "600";
	}
?>
<div id="border">

</div>
<h3>자유게시판</h3>

	<table name="view_table" id="view_table" cellpadding="0" cellspacing="0">
	
			<tr id="view_title"><td class="header" >제목</td><td id="view_subject" colspan="4" class="view_subject"><?=$subject?></td></th></tr>
			<tr><td class="header">작성자</td><td class="view_subject"><?=$nick?></td>
			<tr><td id="contents_view" colspan="4" style="vertical-align:top"><?=$contents?>
			<? 
				if($filetype == "image/jpeg" || $filetype == "image/jpg" || $filetype == "image/png"){
			?>
			<div id="view_img"><img src="<?=$filepath.$fileonename?>" width="<?=$width?>"></div>
			</td>
			<? } ?>
			</tr>
			<tr><td class="header" id="today">작성시간</td><td id="regist_day" colspan="4" class="view_subject"><?= $regist_day ?></th></tr>
			<tr><td class="header">조회수</td><td class="view_subject"><?= $hit ?></td></tr>
			<tr><td>첨부파일</td><td id="file1"><a href="#" onclick="javascript:test();"><?=$file1?></a></td></tr>
			<input type="hidden" id="fileonename" value="<?=$fileonename?>">

			<!--
			<tr><td><a href="javascript:down('999.png')">
			<script>
			function down(filename){
			url="http://thtjwls.dothome.co.kr/test/lib/down_load.php?filename="+filename;
			location.href=url;
		}
		</script>
		파일다운</a></td></tr>
		파일다운로드 코드
		-->
	</table>
	<div id="delete_modify">
<?
	//글삭제
	if($nick == $usernick){
?>		<a href="http://thtjwls.dothome.co.kr/test/board/board_delete.php?idx=<?=$idx?>&nick=<?=$nick?>&usernick=<?=$usernick?>"><img src="http://thtjwls.dothome.co.kr/test/img/delete.png" border="0px;"></a>
		<a href="http://thtjwls.dothome.co.kr/test/board/board_modify.php?idx=<?=$idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/change.png"></a>
<?	
} //글삭제 끝
?>
</div>
<!-- 댓글 시작 -->

<div id="re_area">
<h5>댓글</h5>
<?
	$sql="select * from board where board_idx='$idx' and cate='comment' order by idx desc";
	$result=mysql_query($sql,$connect);

	while($row=mysql_fetch_array($result))
	{
		$nick=$row[nick];
		$board_idx=$row[board_idx];
		$contents=$row[contents];
		$regist_day=$row[regist_day];

		$today   = date("Y-m-d");
			if(substr($row["regist_day"],0,10) == $today) {
				$regist_day=substr($row["regist_day"],11,5);
				$new=1;
			} else {
				$regist_day=substr($row["regist_day"],0,10);
				$new !=1;
			}
?>
<table class="comment_table" cellpadding="2" cellspacing="0">
	<tr>
		<td>
			<b><?=$nick?>&emsp;</b><?=$regist_day?><? if($new==1) {?><span class="new">new!</span><?}?>
		</td>
		<td class="re_info">
			
		<?
			if($nick==$usernick){
		?>
			<a href="#" onclick="reple_modify()">수정</a>
			<a href="#" onclick="reple_delete()">삭제</a>
		<? } ?>
		</td>
	</tr>
	<tr>
		<td colspan="3" id="re_contents" colspan="2">
			&emsp;&emsp;&nbsp;<?=$contents?>
		</td>
	</tr>
</table>

<?	} ?>

<form name="re_comment_insert_form" id="re_comment_insert_form" action="commnet_insert.php" method="post">
	<input type="hidden" value="<?=$usernick?>" id="re_nick" name="re_nick">
	<input type="hidden" name="re_idx" id="re_idx" value="<?=$idx?>">
	<input type="hidden" name="board_idx" id="board_idx" value="<?=$board_idx?>">
	<textarea name="re_text" id="re_text" rows="8" cols="50"></textarea>
	<input type="button" class="button" value="완료" onclick="re_insert()">
</form>
<div class="list_delete">
<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php"><img src="http://thtjwls.dothome.co.kr/test/img/list.png"></a>
</div>
</div><!-- re_area end -->
</div><!-- contents_div end -->
</div><!--wap end -->
<? include "../lib/footer.php" ?>