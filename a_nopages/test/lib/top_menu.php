<div id="top_layout">
	
	<div id="login_box">
	<div id="login">
	<?
		if($userid == ""){
	?>		<a href="#login" onclick="login()"><p id="login_text">로그인&nbsp;&nbsp;</p></a>
			<a href="http://thtjwls.dothome.co.kr/test/users/user_add.php"><p>회원가입&nbsp;&nbsp;</p></a>
	<? } else { ?>
			<p><?= $usernick ?>님&nbsp;&nbsp;<a href="http://thtjwls.dothome.co.kr/test/users/user_modify.php">정보수정</a>&nbsp;&nbsp;</p>
			<a href="http://thtjwls.dothome.co.kr/test/users/logout.php"><p id="logout_text">로그아웃&nbsp;&nbsp;</a>
	<? 
	} 
	?>
	<?
	if($userid == admin){
	?>
	
	<a href="http://thtjwls.dothome.co.kr/test/users/user_list.php"><p>회원목록</p></a>
	<?	} ?>
	</div>
	</div>
</div>
	<div id="logo">
		<a href="#home" onclick="home_go();"><h1>DY</h1></a>
	</div>

	<div id="top_menu">
		<table id="top_section" cellpadding="0" cellspacing="0">
			<tr id="index_menu">
				<td colspan="1" onmouseover="show_sub1('sub_menu1');" onmouseout="hide_sub1('sub_menu1');">
					<a href="http://thtjwls.dothome.co.kr/test/company/company.php">우리회사는</a>
				</td>
				<td colspan="1">
					<a href="http://thtjwls.dothome.co.kr/test/company/ceo_talk.php">CEO인사말</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/company/company_history.php">회사연혁</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/company/company_chart.php">조직도</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/company/company_operation.php">운영방향</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/company/company_way.php">찾아오시는길</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php">자유게시판</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="second_top">
				
	</div>