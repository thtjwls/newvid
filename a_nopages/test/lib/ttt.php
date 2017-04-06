<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<script>
		function login() {
			window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150"); //로그인 팝업
		}

		function visor() {
			alert("접근 권한이 없습니다. \n 관리자에게 문의하세요.");
		}

		function free_board() {
			//document.getElementById("contents_if").src="http://thtjwls.dothome.co.kr/test/board/board_list.php";
			location.href="http://thtjwls.dothome.co.kr/test/board/board_list.php";
		}

		function home_go(){
			document.getElementById("contents_if").src="http://thtjwls.dothome.co.kr/test/iframe/index_if.php";
		}

		function idcheck(){
			var check = document.getElementById("sessionnick").value;

			if (check ==""){
				alert("로그인 후 이용 해주세요");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			}
			else {
				location.href="http://thtjwls.dothome.co.kr/test/board/board_write.php";
			}
		}

		function searchsend(){
			opener.getElementById("searchclick").src="http://thtjwls.dothome.co.kr/test/";
		}

		function board() {
			var write_subject = document.writeform.write_subject;
			var write_contents = document.writeform.write_contents;
			
			if(write_subject.value==""){
				alert("제목을 입력 하세요.");
			}else if(write_contents.value==""){
				alert("내용을 입력 하세요.");
			}else{
				var input = confirm("저장하시겠습니까?");
				if(input==true){
					document.getElementById("writeform").submit();
				}else{
					return false;
				}	//컨펌 종료
			}	//if 종료
		} //function 종료

		window.onload = function(){
			var sub = document.getElementById("subject");

		}

		function subject_click(){
			document.getElementId("subject").value="";
		}

		function re_insert(){
			var re_text = document.getElementById("re_text").value;
			var re_nick = document.getElementById("re_nick").value;

			if(re_text == ""){
				alert("댓글 내용을 입력 해 주세요.");
			} else if(re_nick == ""){
				alert("로그인 후 이용해주세요 ^^");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			} else {
				document.getElementById("re_comment_insert_form").submit();
			}
		}

		function reple_delete(){
			var board_idx = document.getElementById("board_idx").value;
			var re_nick = document.getElementById("re_nick").value;
			var idx	= document.getElementById("re_idx").value;
			var input = confirm("정말 삭제하시겠습니까?");

			if(input == true){
				location.href="http://thtjwls.dothome.co.kr/test/board/reple_delete.php?board_idx="+board_idx+"&nick="+re_nick+"&idx="+idx;
			}
		}

		//window.open("http://thtjwls.dothome.co.kr/test/popup/update.php","popup","width=500,height=300,up=150,left=150"); //팝업
	</script>
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/main.css">
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/board_list.css">
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/left_menu.css">
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/board_write.css">
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/board_view.css">
</head>
<body>

<div id="top_layout">
	
	<div id="login_box">
	<div id="login">
	<?
		if($userid == ""){
	?>		<a href="#login" onclick="login()"><p id="login_text">로그인&nbsp;&nbsp;</p></a>
			<a href="http://thtjwls.dothome.co.kr/test/users/user_add.php"><p>회원가입&nbsp;&nbsp;</p></a>
	<? } else { ?>
			<p><?= $usernick ?>님&nbsp;&nbsp;</p>
			<a href="http://thtjwls.dothome.co.kr/test/users/logout.php"><p id="logout_text">로그아웃&nbsp;&nbsp;</a>
	<? 
	} 
	?>
	<?
	if($userid == admin){
	?>
	
	<a href="http://thtjwls.dothome.co.kr/test/users/user_list.php"><p>회원목록</p></a>
	<?	} else { ?>
	<a href="#deny" onclick="visor()"><p>관리자</p></a>
	<? } ?>
	</div>
	</div>
</div>
	<div id="logo">
		<a href="#home" onclick="home_go();"><h3>DB테이블 공사중..<br>To be continue..</h3></a>
	</div>

	<div id="top_menu">
		<table id="top_section" cellpadding="0" cellspacing="0">
			<tr id="index_menu">
				<td colspan="1" onmouseover="show_sub1('sub_menu1');" onmouseout="hide_sub1('sub_menu1');">
					<a href="#">우리회사는</a>
				</td>
				<td colspan="1">
					<a href="#" onmouseover="show_sub2();" onmouseout="hide_sub2();">CEO인사말</a>
				</td>
				<td>
					<a href="#">회사연혁</a>
				</td>
				<td>
					<a href="#">조직도</a>
				</td>
				<td>
					<a href="#">운영방향</a>
				</td>
				<td>
					<a href="#">찾아오시는길</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php">자유게시판</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="second_top">
				
	</div>
<div id="top_img">
<h1><&nbsp;&nbsp;&nbsp;이미지슬라이드&nbsp;&nbsp;&nbsp;></h1>
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


	<table name="board_view" id="board_view">
			<tr><td class="header">번호</td><td id="no"><?= $idx ?></td><td>작성자</td><td><?= $nick ?></td></tr>
			<tr><td class="header">제목</td><td id="subject" colspan="4"><?=$subject?></td></th></tr>
			<tr><td id="contents" colspan="4" style="vertical-align:top"><?=$contents?>
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
			<tr><td class="header">작성시간</td><td id="regist_day" colspan="4"><?= $regist_day ?></th></tr>
			<tr><td class="header">조회수</td><td><?= $hit ?></td></tr>
	</table>
<?
	//글삭제
	if($nick == $usernick){
?>		<a href="http://thtjwls.dothome.co.kr/test/board/board_delete.php?idx=<?=$idx?>&nick=<?=$nick?>&usernick=<?=$usernick?>"><img src="http://thtjwls.dothome.co.kr/test/img/delete.png" border="0px;"></a>
		<a href="http://thtjwls.dothome.co.kr/test/board/board_modify.php?idx=<?=$idx?>">수정</a>
<?	
} //글삭제 끝
?>
<!-- 댓글 시작 -->
<br>
<caption>────댓글────</caption>
<br>
<?
	$sql="select * from board where board_idx='$idx' and cate='comment' order by idx desc";
	$result=mysql_query($sql,$connect);

	while($row=mysql_fetch_array($result))
	{
		$nick=$row[nick];
		$board_idx=$row[board_idx];
		$contents=$row[contents];
		$regist_day=$row[regist_day];
?>
<table id="comment_table">
	<tr>
		<td>
			<?=$nick?>
		</td>
		<td>
			<?=$regist_day?>
		<?
			if($nick==$usernick){
		?>
			<a href="#" onclick="reple_modify()">수정</a>
			<a href="#" onclick="reple_delete()">삭제</a>
		<? } ?>
		</td>
	</tr>
	<tr>
		<td id="re_contents" colspan="2">
			<?=$contents?>
		</td>
	</tr>
</table>
<?	} ?>
<caption>댓글 쓰기</caption>
<form name="re_comment_insert_form" id="re_comment_insert_form" action="commnet_insert.php" method="post">
	<input type="hidden" value="<?=$usernick?>" id="re_nick" name="re_nick">
	<input type="hidden" name="re_idx" id="re_idx" value="<?=$idx?>">
	<input type="hidden" name="board_idx" id="board_idx" value="<?=$board_idx?>">
	<textarea name="re_text" id="re_text" rows="8" cols="50"></textarea>
	<input type="button" value="완료" onclick="re_insert()">
</form>
<div class="list_delete">
<a href="http://thtjwls.dothome.co.kr/test/board/board_list.php">글목록</a>

</div>
</div><!-- contents_div end -->
</div><!--wap end -->
	<div id="footer_bar">
		<ul>
			<li><a href="#">개인정보취급방침</a></li>
			<li><a href="#">청소년보호정책</a></li>
			<li><a href="#">이메일무단수집거부</a></li>
			<li><a href="#">보도준칙</a></li>
			<li><a href="#">사업안내</a></li>
			<li><a href="#">저작권문의</a></li>
			<li><a href="#">채용안내</a></li>
		</ul>

	<footer>
		<li>Produced By. Lee Ji Hoon</li>
		<li>Designed By. Kim Da Ye</li>
		<li>Progrem guide By. Sachuny</li>
	</footer>
	</div>
</body>
</html>