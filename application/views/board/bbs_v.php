<div class="board_bbs">
	<ul class="table">
		<li class="tr thead">
			<span class="td">
				번호
			</span>
			<span class="td">
				제목
			</span>
			<span class="td">
				작성자
			</span>
			<span class="td">
				작성일
			</span>
			<span class="td">
				조회수
			</span>
		</li>
		<? for ($i = 0; $i < 10; $i++) { ?>
		<li class="tr tbody">
			<span class="td">
				<?=$i+1?>
			</span>
			<span class="td">
				<a href="#">
					안녕하세요.				
				</a>
			</span>
			<span class="td">
				<a href="#">
					이지훈
				</a>
			</span>
			<span class="td">
				03-<?=$i+1?>
			</span>
			<span class="td">
				<?=$i + $i * $i?>
			</span>
		</li>
		<? } ?>
	</ul>
	<div class="row clearfix">
		<form action="" class="search_form">
				<input type="search" class=""/>
				<input type="button" value="검색"/>
		</form>
		<div class="buttons">
			<a href="">글쓰기</a>
		</div>
		<ul class="pagination">
			<li class="fast-prev">
				<a href="">
					<i class="fa fa-backward"></i>
				</a>
			</li>
			<li class="prev">
				<a href="">
					<i class="fa fa-play fa-rotate-180"></i>
				</a>
			</li>
		<? for($i = 1; $i < 5; $i++ ) { ?>
			<li>
				<a href=""><?=$i?></a>
			</li>
		<? } ?>
			<li class="next">
				<a href="">
					<i class="fa fa-play"></i>
				</a>
			</li>
			<li class="fast-next">
				<a href="">
					<i class="fa fa-forward"></i>
				</a>
			</li>
		</ul>
	</div>		
</div>