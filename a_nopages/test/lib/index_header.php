<? include "./lib/session.php"; ?>
<? include "./db/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title>123</title>
	<link rel="shortcut icon" href="http://thtjwls.dothome.co.kr/favicon.ico" type="image/x-icon" />
	<link rel="icon" href="http://thtjwls.dothome.co.kr/favicon.ico" type="image/x-icon" />
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

		function idcheck(){
			var check = document.getElementById("sessionnick").value;

			if (check ==""){
				alert("로그인 후 이용 해주세요");
				window.open("http://thtjwls.dothome.co.kr/test/users/login.php","LOGIN","width=500,height=300,up=150,left=150");
			}
			else {
				location.href("http://thtjwls.dothome.co.kr/test/board/board_write.php");
			}
		}

		function searchsend(){
			opener.getElementById("searchclick").src="http://thtjwls.dothome.co.kr/test/";
		}

		//window.open("http://thtjwls.dothome.co.kr/test/popup/update.php","popup","width=500,height=300,up=150,left=150"); //팝업
	</script>
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/main.css">
</head>
<body>
<? include "lib/top_menu.php"; ?>