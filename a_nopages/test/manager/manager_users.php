<? include "../lib/session.php"; ?>
<? include "../db/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="http://thtjwls.dothome.co.kr/test/css/manager.css">
	<script rel="javascript" type="text/javascript" src="http://thtjwls.dothome.co.kr/test/js/manager.js"></script>
</head>
<body>
<div class="manager_wrap">
	<div class="manager_list">
		<ul>
			<a href="#users" onclick="manager_users()"><li>회원관리</li></a>
			<a href="#board"><li>게시판관리</li></a>
			<a href="#visit"><li>방문자 관리</li></a>
		</ul>
	</div> <!-- manager_list -->
	<div class="manager_view" id="manager_view">
		<table cellspacing="0" cellpadding="0">
<?
	//회원 출력
	$users="select * from users order by no desc";
	$users_query=mysql_query($users,$connect);
?>	
	<!-- HTML -->
	<tr>
		<th>
			idx	
		</th>
		<th>
			이름
		</th>
		<th>
			아이디
		</th>
		<th>
			비밀번호
		</th>
		<th>
			닉네임
		</th>
		<th>
			이메일
		</th>
		<th>
			주소
		</th>
		<th>
			휴대폰번호
		</th>
	</tr>
<?	
	while($users_row=mysql_fetch_array($users_query)){
		$no			=$users_row[no];
		$name		=$users_row[name];
		$id			=$users_row[id];
		$pass		=$users_row[pass];
		$nick		=$users_row[nick];
		$email		=$users_row[email];
		$address	=$users_row[address];
		$hp			=$users_row[hp];
?>	
	<tr>
		<td class="idx">
			<?=$no?>
		</td>
		<td>
			<?=$name?>
		</td>
		<td>
			<?=$id?>
		</td>
		<td>
			<?=$pass?>
		</td>
		<td>
			<?=$nick?>
		</td>
		<td>
			<?=$email?>
		</td>
		<td>
			<?=$address?>
		</td>
		<td>
			<?=$hp?>
		</td>
		<td>
			<a href="http://thtjwls.dothome.co.kr/test/manager/manager_userdel.php?no=<?=$no?>">삭제</a>
		</td>
		<td>
			<a href="manager_usermodi.php?no=<?=$no?>">수정</a>
		</td>
	</tr>
<?
	}
?>
		</table> <!-- table end-->
		<input type="button" onclick="manager_useradd();" value="추가" class="manager_useradd">
	</div><!-- manager_view end -->
</div><!-- manager_wrap end -->
</body>
</html>