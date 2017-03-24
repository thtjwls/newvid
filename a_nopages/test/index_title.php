<? include "./lib/session.php" ?>
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
	</script>

	<style>
		body {
			font-family: "나눔고딕";
			background-color:#ffffff;
		}
		#top_menu{
			height:35px;
			background-color:#4d4d4f;
			font-size:17px;
			margin:auto;
			width:auto;
			text-align:center;
		}

		#menu_list {
			width : 900px;
			margin : auto;
		}

		#menu_list img {
			border:0px;
		}

		a:link {
			text-decoration:none;
			color:#D1D3D4;
		}

		a:visited {
			text-decoration:none;
			color:#D1D3D4;
		}

		a:hover {
			text-decoration:none;
			color:#ffffff;
		}

		a:active {
			text-decoration:none;
		}

		#login p{
			display : inline;
		}

		#login_box {
			float:right;
		}	

		#top_layout {
			width : auto;
			height : 150px;
			
		}

		#login p{
			color : #939588;
			font-size : 14px;
		}

		#contents{
			width:800px;
			height:800px;
			margin:auto;
			background-color: white;
		}

		#footer_bar{
			
		}
		
		#top_section td {
			text-align:center;
			padding-top:5px;
		}

		#top_section {
			width:800px;
			margin:auto;
		}
	</style>
</head>
<body>
<div id="top_layout">
	
	<div id="login_box">
	<div id="login">
	<?
		if($userid == ""){
	?>		<a href="#login" onclick="login()"><p id="login_text">로그인</p></a>&nbsp;&nbsp;
			<a href="http://thtjwls.dothome.co.kr/test/users/user_add.php"><p>회원가입&nbsp;</p></a>
	<? } else { ?>
			<p><?= $usernick ?>님&nbsp;&nbsp;</p>
			<a href="http://thtjwls.dothome.co.kr/test/users/logout.php"><p id="logout_text">Logout</a>
	<? 
	} 
	?>
	<?
	if($userid == admin){
	?>
	
	<a href="http://thtjwls.dothome.co.kr/test/users/user_list.php"><p>User_List</p></a><br>
	<?	} else { ?>
	<a href="#deny" onclick="visor()"><p>관리자</p></a><br>
	<? } ?>
	</div>
	</div>
</div>
	<div id="logo">
		<!-- 로고 이미지는 이자리에 넣어주세요. -->
	</div>

	<div id="top_menu">
		<table id="top_section">
			<tr>
				<td>
					<a href="#">인천일보는</a>
				</td>
				<td>
					<a href="#">CEO인사말</a>
				</td>
				<td>
					<a href="#">회사연혁</a>
				</td>
				<td>
					<a href="#">조직도</a>
				</td>
				<td>
					<a href="#">편집방향</a>
				</td>
				<td>
					<a href="#">찾아오시는길</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/board_board_list.php" onclick="free_board()">자유게시판</a>
				</td>
			</tr>
		</table>
	</div>
	<div id="contents">
		<img src="http://thtjwls.dothome.co.kr/test/img/incheonilbo_old.jpg" style="width:800px";>
	</div><!--div contents -->
	<div id="footer_bar">
		
	</div>
</body>
</html>