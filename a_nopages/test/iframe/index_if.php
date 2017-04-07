<? include "../lib/session.php" ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		body {
			font-family: "나눔고딕";
			background-color:#ffffff;
			width : 800px;
			margin : auto;
		}

		#logo {
			width : 170px;
			height : 45px;
			margin-left: 450px;
			margin-bottom : 40px;
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

		#top_section a:link {
			text-decoration:none;
			color:#D1D3D4;
		}

		#top_section a:visited {
			text-decoration:none;
			color:#D1D3D4;
		}

		#top_section a:hover {
			text-decoration:none;
			color:#ffffff;
		}

		#top_section a:active {
			text-decoration:none;
		}
		
		#login p{
			display : inline;
			color : #939588;
			font-size : 14px;
		}

		#login_box {
			float:right;
		}	

		#top_layout {
			width : auto;
			height : 30px;
		}

		#contents{
			width:800px;
			height:800px;
			margin:auto;
			background-color: white;
		}

		#footer_bar{
			width : auto;
			height : 35px;
			background-color:#8C8C8C;
		}

		#footer_bar ul li{
			display : inline;
			margin : 10px;
		}

		#footer_bar ul {
			margin-top : 10px;
			padding-top : 10px;
			width : 800px;
			margin : auto;
		}
		
		#top_section td {
			text-align:center;
			padding-top:5px;
		}

		#top_section {
			width:800px;
			margin:auto;
		}

		#footer_bar a:link {
			color : white;
			text-decoration:none;
			font-size : 15px;
		}

		#footer_bar a:hover {
			color : white;
		}

		#footer_bar a:visited {
			color : white;
		}

		#footer_bar a:active {
			color : white;
			text-decoration:none;
		}

		footer {
			margin-top : 15px;
			margin-left : 15px;
			font-family : "나눔고딕";
			font-size : 14px;
		}

		footer li {
			list-style-type:none;
			margin : 5px;
		}

		a:link {
			text-decoration:none;
			color : #939588;
		}

		a:hover {
			text-decoration:none;
			color:#939588;
		}

		a:visited {
			text-decoration:none;
			color:#939588;
		}

		#notice {
			width : 200px;
			height: 140px;
			overflow : hidden;
		}

		#plan {
			width : 200px;
			height: 140px;
			margin-top : 20px;
			overflow : hidden;
		}

		#photo {
			width : 400px;
			height : 300px;
			margin-top : 20px;
			float : left;
			margin-left : 10px;
			overflow : hidden;
		}

		#notice_plan {
			float : left;
			margin-top :20px;
			overflow : hidden;
		}

		#link {
			margin-top : 20px;
			float : left;
			margin-left : 10px;
			width : 172px;
			height : 300px;
			overflow : hidden;
		}

		.text_header {
			border-left : 3px solid #58595b;
			border-bottom : 1px solid #58595b;
			padding-left : 5px;
		}

		#notice_day {
			font-size : 12px;
			color : #BDBDBD;
		}

		#notice_subject {
			font-size : 12px;
		}

		p {
			white-space:nowrap;
		}

		.more {
			color: #BDBDBD;
			font-size: 12px;
			float:right;
			padding-top:3px;
		}
	</style>
<head>
<body>
	<img src="http://thtjwls.dothome.co.kr/test/img/incheonilbo.png" style="width:800px";>
		<nav id="notice_plan">
			<div id="notice">
				<p class="text_header">공지사항<span class="more"><a href="http://thtjwls.dothome.co.kr/test/notice/notice_list.php">더보기</a></span></p>
				<?
					include "../db/dbconnect.php";

					$sql="select * from notice order by no desc limit 5";
					$result=mysql_query($sql,$connect);
					
					while($row=mysql_fetch_array($result)){

					$no=$row[no];
					$subject=$row[subject];
					$day=date("m-d");

					if(!$no){
						echo"서비스가 준비중에 있습니다.";
					}
				?>
				<span id="notice_day">[<?=$day?>]&nbsp;</span><span id="notice_subject"><a href="http://thtjwls.dothome.co.kr/test/notice/notice_view.php?idx=<?=idx?>"><?=$subject?></a></span><br>
				<? } ?>
			</div>
			<div id="plan">
				<p class="text_header">주요일정<span class="more"><a href="#">더보기</a></span></p>
			</div>
		</nav>
		<div id="photo">
			<p class="text_header">포토갤러리<span class="more"><a href="#">더보기</a></span></p>
		</div>
		<nav id="link">
			<img src="http://thtjwls.dothome.co.kr/test/img/quickhome.png" usemap="#quickhome" border="0px">
			<map name="quickhome" border='0px'>
				<area shape="rect" coords="18,39,83,116" href="http://www.incheonilbo.com" target="_blank">
				<area shape="rect" coords="92,41,147,115" href="http://media.nodong.org/" target="_blank">
				<area shape="rect" coords="22,121,80,189" href="https://www.facebook.com/incheonilbo" target="_blank">
				<area shape="rect" coords="94,123,150,190" href="https://twitter.com/incheonilbo" target="_blank">
			</map>
		</nav>
</body>