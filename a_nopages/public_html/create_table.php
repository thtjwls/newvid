<!DOCTYPE HTML>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Delta link DB Table</title>
</head>
<body>
	<a href="module/tables/UserTable.php">Create User Table</a>
	<a href="module/tables/CreateTestUserInsert.php">Create Test User Insert</a>
	
	<h3>암호화 문자열 확인</h3>
	<form action="" method="post">
		<input type="text" name="pass" placeholder="기본문자열"/>
		<input type="text" name="passc" placeholder="확인"/>
		<input type="submit" value="Check"/>
	</form>
	<?
	if ( isset($_POST['pass']) and isset($_POST['passc']) )
	{
		$pass = $_POST['pass'];
		$passc = $_POST['passc'];

		$hashed = hash('sha512', $_POST['pass']);

		$end = hash('sha512',$hashed);
		
		if ( hash('sha512',$pass) === hash('sha512',$passc)) {
			echo 'result : true';
		} else {
			echo 'result : false';
		}
	}
	?>
</body>
</html>