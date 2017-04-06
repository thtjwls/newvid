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

	setcookie("notice","$idx",time() + 3600);		//cook쿠키의 이름은 cook 3600초 유지

	if($_COOKIE[notice] != $idx){											//$cookieid 가 없으면 if 문 돌림
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
	$file1		=$row[file1]; //DB에서 파일형식의 데이터 불러오기 불러오기 ex)20160510173655^1234.jpg
	$file2		=$row[file2];
	$file3		=$row[file3];
	$path		="http://thtjwls.dothome.co.kr/test/img/"; //이미지가 있는 Web 경로
	$rename1	=substr($file1,15); //불러 온 파일 날짜부분 자르고 원본파일만 가져오기 ex)1234.jpg
	$rename2	=substr($file2,15);
	$rename3	=substr($file3,15);
	$img1		=$path.$rename1;
	$img2		=$path.$rename2; //$img 을 재 정의해서 경로형화 함. ex)http://thtjwls.dothome.co.kr/test/img/1234.jpg
	$img3		=$path.$rename3;
	$resizepath	="/host/home2/thtjwls/html/test/img/";	//홈경로
	$viewpath	="../img/";		//상대경로
	$resizeimg1	=$resizepath.$rename1;
	$resizeimg2	=$resizepath.$rename2;
	$resizeimg3	=$resizepath.$rename3;



	$imgsize1	=getimagesize($viewpath.$rename1);
	$imgsize2	=getimagesize($viewpath.$rename2);
	$imgsize3	=getimagesize($viewpath.$rename3);	//$rename 의 사이즈를 구함
	$imgwidth1	=$imgsize1[0];
	$imgwidth2	=$imgsize1[0];
	$imgwidth3	=$imgsize3[0];//가로사이즈
	$imgheight1	=$imgsize1[1];
	$imgheight2	=$imgsize2[1];
	$imgheight3	=$imgsize3[1];//세로사이즈

	/*디버깅
	echo "resizepath :" .$resizepath;
	echo "<br>";
	echo "imgsize :" .$imgsize;
	*/
	if($imgheight1 > 300)
	{
		$imgheight1 ="300";  //세로사이즈가 300보다 크면 300으로 초기화
	}

	//디버깅 print_r($imgsize);
?>

<h3>자유게시판</h3>
	<table name="view_table" id="view_table" cellpadding="0" cellspacing="0">
	
			<tr id="view_title"><td class="header" >제목</td><td id="view_subject" colspan="4" class="view_subject"><?=$subject?></td></th></tr>
			<tr><td class="header">작성자</td><td class="view_subject"><?=$nick?></td>
			<tr><td id="contents_view" colspan="4" style="vertical-align:top"><?=$contents?>
			<?
				$query="select * from board where idx='$idx'";
				$sql_query=mysql_query($query,$connect);
				$rowimage=mysql_fetch_array($sql_query);
				$img_record1=$rowimage[file1];
				$img_record2=$rowimage[file2];
				$img_record3=$rowimage[file3];
				
				if($img_record1 !=""){
				?>	
				<div id="photo_img">
					<img src="<?=$img1.$img_record1?>" height="<?=$imgheight1?>">
				</div>
				<?	}	?>	

	</td></tr>
			<tr><td class="header" id="today">작성시간</td><td id="regist_day" colspan="4" class="view_subject"><?= $regist_day ?></th></tr>
			<tr><td class="header">조회수</td><td class="view_subject"><?= $hit ?></td></tr>
	</table>
	<div id="delete_modify">
<?
	//글삭제
	if($nick == $usernick){
?>		<a href="http://thtjwls.dothome.co.kr/test/notice/notice_delete.php?idx=<?=$idx?>&nick=<?=$nick?>&usernick=<?=$usernick?>"><img src="http://thtjwls.dothome.co.kr/test/img/delete.png" border="0px;"></a>
		<a href="http://thtjwls.dothome.co.kr/test/notice/notice_modify.php?idx=<?=$idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/change.png"></a>
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
			<b><?=$nick?>&emsp;</b><?=$regist_day?><? if($new==1) {?><span id="new">new!</span><?}?>
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
<a href="http://thtjwls.dothome.co.kr/test/notice/notice_list.php"><img src="http://thtjwls.dothome.co.kr/test/img/list.png"></a>
</div>
</div><!-- re_area end -->
</div><!-- contents_div end -->
</div><!--wap end -->
<? include "../lib/footer.php" ?>