<? include "./lib/session.php" ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<script>
		function login() {
			window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150"); //�α��� �˾�
		}

		function visor() {
			alert("���� ������ �����ϴ�. \n �����ڿ��� �����ϼ���.");
		}
	</script>

	<style>
		body {
			font-family: "�������";
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
	?>		<a href="#login" onclick="login()"><p id="login_text">�α���</p></a>&nbsp;&nbsp;
			<a href="http://thtjwls.dothome.co.kr/test/users/user_add.php"><p>ȸ������&nbsp;</p></a>
	<? } else { ?>
			<p><?= $usernick ?>��&nbsp;&nbsp;</p>
			<a href="http://thtjwls.dothome.co.kr/test/users/logout.php"><p id="logout_text">Logout</a>
	<? 
	} 
	?>
	<?
	if($userid == admin){
	?>
	
	<a href="http://thtjwls.dothome.co.kr/test/users/user_list.php"><p>User_List</p></a><br>
	<?	} else { ?>
	<a href="#deny" onclick="visor()"><p>������</p></a><br>
	<? } ?>
	</div>
	</div>
</div>
	<div id="logo">
		<!-- �ΰ� �̹����� ���ڸ��� �־��ּ���. -->
	</div>

	<div id="top_menu">
		<table id="top_section">
			<tr>
				<td>
					<a href="#">��õ�Ϻ���</a>
				</td>
				<td>
					<a href="#">CEO�λ縻</a>
				</td>
				<td>
					<a href="#">ȸ�翬��</a>
				</td>
				<td>
					<a href="#">������</a>
				</td>
				<td>
					<a href="#">��������</a>
				</td>
				<td>
					<a href="#">ã�ƿ��ô±�</a>
				</td>
				<td>
					<a href="http://thtjwls.dothome.co.kr/test/board_board_list.php" onclick="free_board()">�����Խ���</a>
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