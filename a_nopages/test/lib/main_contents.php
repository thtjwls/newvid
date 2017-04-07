<div id="contents">
	<img src="http://thtjwls.dothome.co.kr/test/img/incheonilbo.png" style="width:800px";>
		<nav id="notice_plan">
			<div id="notice">
				<p class="text_header">공지사항<span class="more"><a href="http://thtjwls.dothome.co.kr/test/notice/notice_list.php">+ more</a></span></p>
				<?
					$sql="select * from board where cate='notice' order by idx desc limit 5";
					$result=mysql_query($sql,$connect);
					
					while($row=mysql_fetch_array($result)){

					$idx=$row[idx];
					$subject=$row[subject];
					$regist_day=$row[regist_day];
					$day=substr($row["regist_day"],5,5);
					

					if(!$idx){
						echo "서비스가 준비중에 있습니다.";
					}
				?>
				<div class="notice_list">
				<span id="notice_day">[<?=$day?>]&nbsp;</span><span id="notice_subject"><a href="http://thtjwls.dothome.co.kr/test/notice/notice_view.php?idx=<?=$idx?>"><?=$subject?></a></span>
				</div>
				<? } ?>
			</div>
			<div id="plan">
				<p class="text_header">주요일정<span class="more"><a href="#">+ more</a></span></p>
			</div><!-- notice_plan end -->
		</nav>
				<div class="right_banner">
		<div id="link">
			<img src="http://thtjwls.dothome.co.kr/test/img/quickhome.png" usemap="#quickhome" border="0px">
			<map name="quickhome" border='0px'>
				<area shape="rect" coords="18,39,83,116" href="http://www.incheonilbo.com" target="_blank">
				<area shape="rect" coords="92,41,147,115" href="http://media.nodong.org/" target="_blank">
				<area shape="rect" coords="22,121,80,189" href="https://www.facebook.com/incheonilbo" target="_blank">
				<area shape="rect" coords="94,123,150,190" href="https://twitter.com/incheonilbo" target="_blank">
			</map>
		</div>
		</div><!-- right_banner end -->
		<div id="photo">
			<p class="text_header">포토갤러리<span class="more"><a href="#">+ more</a></span></p>
			<? 
				$photo_sql="select * from board where file1 !='0' and file1 !='' and ";
				$photo_sql= $photo_sql."file1 like '%.png' or ";
				$photo_sql= $photo_sql."file1 like '%.jpg' or ";
				$photo_sql= $photo_sql."file1 like '%.jpeg' or ";
				$photo_sql= $photo_sql."file1 like '%.gif' ";
				$photo_sql= $photo_sql."order by idx desc";
				$photo_result=mysql_query($photo_sql,$connect);

				while($photo_row=mysql_fetch_array($photo_result)){
					$img=$photo_row[file1];
					$idx=$photo_row[idx];
					$contents=$photo_row[contents];
					$subject=$photo_row[subject];
					$regist_day=substr($photo_row[regist_day],5,5);
					$dir="./file/";
				?>
			<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$idx?>">
			<div class="index_photo">
				<div class="img_div">
					<img src="<?=$dir.$img?>" width="200px;" height="150px;">
				</div><!-- img_div end -->
				<div class="img_text_div">
					<p class="img_text_regist_day">[<?=$regist_day?>]</p>
						<p class="img_text_subject"><?=$subject?></p>
				</div>
			</div><!-- index_photo end -->
			</a>
			<? } ?>
		</div><!-- #photo end -->
</div>
