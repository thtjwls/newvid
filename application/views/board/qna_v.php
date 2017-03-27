<div class="qna_wrap">
	<ul class="qna_table">
		<li class="thead tr">
			<span class="td">번호</span>
			<span class="td">제목</span>
			<span class="td">작성자</span>
			<span class="td">작성일</span>
			<span class="td">진행</span>
		</li>
		<li class="tbody tr">
			<span class="td">1</span>
			<span class="td">
				<a href="">
					현수막 제작 문의합니다.
				</a>				
			</span>
			<span class="td">이**</span>
			<span class="td">2017-03-26</span>
			<span class="td standby">처리중</span>
		</li>
	</ul>
	<a href="#" class="qnaWrite"/>
		문의
	</a>
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
	<? for($i = 1; $i < 2; $i++ ) { ?>
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