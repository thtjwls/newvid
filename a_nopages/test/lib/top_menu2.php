<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<script>
		function login() {
			window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=400,up=150,left=150"); //로그인 팝업
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

		function hide_sub1(){
			//서브 마우스아웃 메뉴1
			var sub_menu1 = document.getElementById("sub_menu1");
			sub_menu1.style.display ="none";
		}


		function show_sub1(){

			var sub_menu1 = document.getElementById("sub_menu1");

			sub_menu1.style.display="table";
		}

		function hide_sub2(){
			//서브 마우스아웃 메뉴2
			var sub_menu2 = document.getElementById("sub_menu2");
			sub_menu2.style.display ="none";
		}


		function show_sub2(){

			var sub_menu2 = document.getElementById("sub_menu2");

			sub_menu2.style.display="table";
		}


		//window.open("http://thtjwls.dothome.co.kr/test/popup/update.php","popup","width=500,height=300,up=150,left=150"); //팝업
	</script>
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/main.css">
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
		<a href="#home"><h3>DB테이블 공사중..<br>To be continu..</h3></a>
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
					<a href="#free_board" onclick="free_board()">자유게시판</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="second_top">
				
	</div>
</body>
</html>