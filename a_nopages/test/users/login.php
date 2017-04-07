<?
	include "../db/dbconnect.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title></title>
<script>
	function login(){
		var id = document.login_form.id.value;
		var pass = document.login_form.pass.value;
		
		if(id == ""){
			window.alert("아이디를 입력 해주세요.");
			document.login_form.id.focus();
		} else if (pass == "")
		{
			window.alert("비밀번호를 입력 해주세요.");
			document.login_form.pass.focus();
		} else {
			document.login_form.submit();
		}
	}

	function useradd_go(){
		self.close();
		opener.location.href="http://thtjwls.dothome.co.kr/test/users/user_add.php";
	}

	function usersearch_go(){
		self.close();
		opener.location.href="http://thtjwls.dothome.co.kr/test/users/id_search.php";
	}
</script>
<style>
	#id,#pass{
		color : #9b9b9b;
		
	}

	#id {
		float : left;
		margin-bottom : 15px;
	}

	#pass {

	}

	#login_form {
		width : 340px;
		height : 100px;
		margin : 0px;
		padding : 0px;
	}

	#login_button {
		width : 90px;
		height: 84px;
		border-radius : 3px;
		float : right;
		border : 0px;
		background-color: #006ab6;
		color : #ffffff;
		font-weight : bolder;
	}

	#input {
	}

	table {

	}

	#login_wap {
		width : 500px;
		height : 400px;
		padding : 10px;
		margin : 0px;
	}

	#login_text > h1 {
		font-size : 18px;
		margin-bottom : 16px;
		font-weight : 700;
		color : #323232;
	}

	#login_text > p {
		font-size : 12px;
		color : #6e6e6e;
		margin-bottom : 16px;
	}

	body {
		margin : 0px;
		font-family : "나눔고딕";
	}

	input {
		font-size : 13px;
		font-family : 'Nanum Barun Gothic', dotum, 돋움, sans-serif;
		padding : 8px; 10px;
		width : 228px;
	}

	.login_find {
		width : 350px;
		font-size : 12px;
		color : #9b9b9b;
	}

	.login_find div {
		margin-bottom : 15px; 
	}

	

	.btn {
		text-align : center;
		border : 1px solid #9b9b9b;
		width : 100px;
		float : right;
		color : #9b9b9b;
		padding : auto;
	}

	a:link { text-decoration: none; color: #646464;}
	a:visited { text-decoration: none; color: #646464;}
	a:active { text-decoration: none; color: #646464;}
	a:hover {text-decoration:none; color: #646464;}
</style>
</head>
<body>
<div id="login_wap">
<div id="login_text">
	<h1>회원 로그인</h1>
	<p>회원님의 아이디와 비밀번호를 입력하신 후,<br>
	로그인 버튼을 클릭해 주세요.</p>
</div>
<div id="login_div">
<form name="login_form" id="login_form" method="post" action="login_check.php">
<div id="input">
	<input type="button" id="login_button" value="로그인" onclick="login()">
	<input type="text" id="id" name="id" placeholder="아이디">
	<input type="password" id="pass" name="pass" placeholder="비밀번호">
	
</div>
</form>
</div>
<div class="login_find">
	<div>
		- 아직 회원이 아니신가요?
		<span class="btn"><a href="#" onclick="useradd_go();">회원가입하기</a></span>
	</div>
	<div>
		- 아이디를 분실하셧나요?
		<span class="btn"><a href="#" onclick="usersearch_go();">아이디 찾기</a></span>
	</div>
	<div>
		- 비밀번호를 분실하셧나요?
		<span class="btn"><a href="#">비밀번호 찾기</a></span>
	</div>
</div><!-- login_find end -->
</div><!--login_wap end -->
</body>
</html>