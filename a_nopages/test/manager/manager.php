<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://thtjwls.dothome.co.kr/test/js/manager.js"></script>
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/manager.css">
		<script>
			$(document).ready(function () {
				$('tr:first').css('color','#808285');
				$('tr:even').css('background','#E8EFF5');
			});
		</script>
		<?
			if($userid != 'admin'){
		?>
			<script>
				alert("접근권한이 없습니다. 관리자에게 문의하세요.");
					window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=400,up=150,left=150"); //로그인 팝업
					location.href="http://thtjwls.dothome.co.kr/test/";
			</script>
		<?
			}
		?>
</head>
<body>
	DY시스템
<div class="wrap_border">

</div>
<div class="manager_wrap">
	<div class="manager_list">
		<ul>
			<a href="manager.php?sboard=users"><li><img src="http://thtjwls.dothome.co.kr/test/img/member.png" width="150px"></li></a>
			<a href="manager.php?sboard=board"><li><img src="http://thtjwls.dothome.co.kr/test/img/board.png" width="150px"></li></a>
			<a href="#visit"><li><img src="http://thtjwls.dothome.co.kr/test/img/visit.png" width="150px"></li></a>
		</ul>
	</div> <!-- manager_list -->
	<div class="manager_title">
<?
	$sboard=$_GET["sboard"];
	$userlist =$_GET["userlist"];
	$useridx	=$_GET["useridx"];

	if($sboard =="users"){
		//페이징 설정 시작
		$page=$_GET["page"]; //$page 변수로 받음
		$search	=$_GET["search"]; //검색 키워드
		$find		=$_GET["find"];

?>
		<img src="http://thtjwls.dothome.co.kr/test/img/writemember.png" width="100px">
		<div class="usersearch_box">
		<form action="manager.php" method="post">
			<select name="find" class="manager_usersearch" id="userfind">
				<option value="name">이름</option>
				<option value="id">아이디</option>
				<option value="hp">전화번호</option>
			</select>
			<input type="search" placeholder="검색어를 입력하세요" name="search" id="user_search" class="usersearch_input">
			<input type="image" src="http://thtjwls.dothome.co.kr/test/img/docbogi.png" onclick="search_user(); return false;">
		</form>
		</div>
	</div>
	<div class="manager_view" id="manager_view">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th width="10%;" height="35px;">
					번호
				</th>
				<th width="10%;">
					아이디
				</th>
				<th width="10%;">
					이름
				</th>
				<th>
					이메일 주소
				</th>
				<th>
					휴대폰 번호
				</th>
				<th>
					<!-- table css 위한 빈 헤더-->
				</th>
			</tr>
<?
	//회원 출력
	if($search==""){
		$users="select * from users order by no desc";
		$query="select count(*) from users";
	} else {
		$users="select * from users where $find like '%$search%' order by no desc";
		$query="select count(*) from users where $find like '%$search%'";
	}

	if(!$page){
		$page=1;
	}

	//페이징 시작
		$result_query=mysql_query($query,$connect);
		$total_record=mysql_result($result_query,0,0);

		$scale=10;
		$page_num=5;

		$total_page	=ceil($total_record/$scale); //전체 페이지 갯수
		$start_page	=((ceil($page/$page_num)-1)*$page_num)+1; //시작페이지 계산
		$end_page	=$start_page+$page_num-1; //끝페이지 계산
		if($end_page >= $total_page){$end_page=$total_page;}; //$end_page가 $total_page 보다 크거나 같을 때 $end_page 와 $total_page 는 같음
		$next_page	= $end_page+1;
		$before_page = $start_page-1;
		$start=($page - 1) * $scale;
		$board_num=$total_record-$scale*($page-1); //페이지 인덱스 번호
	//페이징 끝
	$users_query=mysql_query($users,$connect);

	for($i=$start; $i<$start+$scale && $i<$total_record; $i++){
		mysql_data_seek($users_query,$i);

	$users_row=mysql_fetch_array($users_query);
		$no			=$users_row[no];
		$name		=$users_row[name];
		$id			=$users_row[id];
		$email		=$users_row[email];
		$hp			=$users_row[hp];
?>
			<tr>
				<td>
					<?=$board_num?>
				</td>
				<td>
					<?=$id?>
				</td>
				<td>
					<?=$name?>
				</td>
				<td>
					<?=$email?>
				</td>
				<td>
					<?=$hp?>
				</td>
				<td>
					<a href="manager.php?sboard=userinfo&useridx=<?=$no?>"><img src="http://thtjwls.dothome.co.kr/test/img/soojung.png" width="25px" border="0px"></a>
					<a href="manager_userdel.php?no=<?=$no?>"><img src="http://thtjwls.dothome.co.kr/test/img/sackje.png" width="25px" border="0px">
				</td>
			</tr>
<?
		$board_num--;
	}
	?>
	<div class="paging">
		<?
		//페이징 출력
			if($page==1){
				echo ("<tr id='paging'><td colspan=6><span class='paging_num'>◀ 이전</span>");
			}else{
			echo ("<tr id='paging'><td colspan=6><a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$before_page'><span class='paging_num'>◀ 이전</span></a>");
			}

			for($i=$start_page; $i<=$end_page; $i++){
				if($page == $i){
					echo("<span class='now_page'>$i</span>");
				}else{
					echo("<a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$i'><span class='paging_num'>$i</span></a>");
				}
			}
			if($page < $total_page){
					echo("<a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$end_page'><span class='paging_num'>다음 ▶</span></a></tr>");
			}else{
				echo("<span class='paging_num'>다음 ▶</span></tr>");
			}
		//페이징 출력 끝
		?>
	</div>
	<?
}
?>
<?
	if($sboard=="userinfo"){
	$sql="select * from users where no='$useridx'";
	$result=mysql_query($sql,$connect);
	$row=mysql_fetch_array($result);
		$name	= $row[name];
		$id		= $row[id];
		$email	= $row[email];
		$hp		= $row[hp];
		$no		= $row[no];
		$address= $row[address];
?>
<div class="meber_info_title">
	<img src="http://thtjwls.dothome.co.kr/test/img/member_info.png" width="100px">
</div>
<script>
		$(document).ready(function () {
			$('td').css('background','#EDEDEE');
		});
</script>
</div>
<div class="manager_userlist" id="manager_userlist">
		<form action="manager_usermodi.php" method="post">
		<table cellspacing="0" cellpadding="0">
		<input type="hidden" name="no" value="<?=$no?>">
			<tr>
				<th width="10%">
					이름
				</th>
				<td>
					<input type="text" name="name" value="<?=$name?>">
				</td>
			</tr>
			<tr>
				<th>
					아이디
				</th>
				<td>
					<input type="text" name="id" value="<?=$id?>">
				</td>
			</tr>
			<tr>
				<th>
					이메일
				</th>
				<td>
					<input type="text" name="email" value="<?=$email?>">
				</td>
			</tr>
			<tr>
				<th>
					주소
				</th>
				<td>
					<input type="text" name="address" value="<?=$address?>">
				</td>
			<tr>
				<th>
					휴대폰 번호
				</th>
				<td>
					<input type="tel" name="hp" value="<?=$hp?>">
				</td>
			</tr>
			<tr>
				<th>
					관리자
				</th>
				<td>
					<input type="checkbox" value="1" name="visor"> <span>준비중인 서비스 입니다.</span>
				<td>
			</tr>
		</table>
		<div class="manager_userlist_btn">
			<input type="submit" value="수정">
			<input type="button" value="목록" onclick="userlist();">
		</div>
		</form>
		</table>
<?
}
?>
<?
	if($sboard=="board") //$sboard == board (게시판);
	{
		$page=$_GET["page"];

		$search	=$_GET["search"]; //$search 변수접근 은 파라미터를 통해 받음.
		$find		=$_GET["find"]; //$fine 변수접근 도 역시 파라미터를 통해 받음.

		$sql="select * from board where cate='board' order by idx desc";
		$result=mysql_query($sql,$connect);

?>
<div class="manager_board_visor">
	<img src="http://thtjwls.dothome.co.kr/test/img/writeboard.png" width="110px" value="게시판관리">
</div>
</div>
<div class="manager_view" id="manager_view">
		<table cellspacing="0" cellpadding="0">
		<tr class="board_set_css">
			<th>
				글번호
			</th>
			<th>
				카테고리
			</th>
			<th>
				제목
			</th>
			<th>
				작성자
			</th>
			<th>
				조회수
			</th>
			<th>
				파일
			</th>
			<th>
				날짜
			</th>
			<th>
				<!--레이아웃 설정 위한 빈 셀 -->
				<!-- colspan 금지 -->
			</th>
		</tr>
<?
//페이징 설정 시작


//페이징 설정 끝

		while($row=mysql_fetch_array($result)){
			$idx		=$row[idx];
			$board_idx	=$row[board_idx];
			$cate		=$row[cate];
			$subject	=$row[subject];
			$contents	=$row[contents];
			$nick		=$row[nick];
			$hit		=$row[hit];
			$file1		=$row[file1];
			$regist_day	=$row[regist_day];
?>

		<tr>
			<td>
				<?=$idx?>
			</td>
			<td>
				<?=$cate?>
			</td>
			<td style="text-align:left">
				<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$idx?>"><?=$subject?></a>
			</td>
			<td>
				<?=$nick?>
			</td>
			<td>
				<?=$hit?>
			</td>
			<td style="text-align:left">
				<?=$file1?>
			</td>
			<td>
				<?=$regist_day?>
			</td>
			<td>
				<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/soojung.png" width="25px" border="0px"></a>
				<a href="http://thtjwls.dothome.co.kr/test/manager/manager_boarddel.php?idx=<?=$idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/sackje.png" width="25px" border="0px"></a>
			</td>
		</tr>
<?
		} //while 종료
?>

		</table>
	<div class="manager_comment_visor">
		<img src="http://thtjwls.dothome.co.kr/test/img/writecomment.png" width="90px;" style="text-align:left;">
	</div>
	<div class="manager_comment_view">
	<table cellspacing="0" cellpadding="0">
	<tr>
		<th width="7%">
			댓글번호
		</th>
		<th width="8%">
			카테고리
		</th>
		<th>
			댓글내용
		</th>
		<th>
			작성자
		</th>
		<th>
			날짜
		</th>
		<th>
		</th>
	</tr>
<?
	$query="select * from board where cate='comment' order by idx desc";
	$q_result=mysql_query($query,$connect);
	while($q_row=mysql_fetch_array($q_result)){
		$q_cate		=$q_row[cate];
		$q_idx		=$q_row[board_idx];
		$q_contents	=$q_row[contents];
		$q_nick		=$q_row[nick];
		$q_regist_day	=$q_row[regist_day];
		$b_idx =$q_row[idx];

?>
	<tr>
		<td>
			<?=$b_idx?>
		</td>
		<td>
			<?=$q_cate?>
		</td>
		<td style="text-align:left; padding-left:45px;">
			<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$q_idx?>"><?=$q_contents?></a>
		</td>
		<td>
			<?=$q_nick?>
		</td>
		<td>
			<?=$q_regist_day?>
		</td>
		<td width="79px">
			<a href="http://thtjwls.dothome.co.kr/test/board/board_view.php?idx=<?=$q_idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/soojung.png" width="25px" border="0px"></a>
			<a href="http://thtjwls.dothome.co.kr/test/manager/manager_comdel.php?idx=<?=$b_idx?>"><img src="http://thtjwls.dothome.co.kr/test/img/sackje.png" width="25px" border="0px"></a>
		</td>
	</tr>
<?
	}
	}
?>

	</div><!-- comment view -->
	<script>
	$(document).ready(function () {
		$('.manager_comment_view tr:odd').css('background','#FFFFFF');
		$('.manager_comment_view tr:even').css('background','#E8EFF5');
		$('.manager_comment_view tr:first').css('background','#EdEdEE').css('color','#808285');
	});


	</script>
	</div><!-- manager_view end -->
</div><!-- manager_wrap end -->
</body>
</html>


<!-- 		<?
	//페이징 출력
		if($page==1){
			echo ("<div class='paging'><span class='paging_num'>◀ 이전</span>");
		}else{
		echo ("<div class='paging'><a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$before_page'><span class='paging_num'>◀ 이전</span></a>");
		}

		for($i=$start_page; $i<=$end_page; $i++){
			if($page == $i){
				echo("<span class='now_page'>$i</span>");
			}else{
				echo("<a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$i'><span class='paging_num'>$i</span></a>");
			}
		}
		if($page < $total_page){
				echo("<a href='http://thtjwls.dothome.co.kr/test/manager/manager.php?sboard=users&page=$end_page'><span class='paging_num'>다음 ▶</span></a></div>");
		}else{
			echo("<span class='paging_num'>다음 ▶</span></div>");
		}
	//페이징 출력 끝
	?>
	<!--<div class="manager_users_paging">
	</div><!--manager_users_paging end-->
