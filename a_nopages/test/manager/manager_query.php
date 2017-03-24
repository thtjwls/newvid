<meta charset="utf-8">
<?
	//회원 출력
	$users="select * from users";
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
		<td>
			<p name="userno"><?=$no?></p>
		</td>
		<td>
			<p name="username"><?=$name?></p>
		</td>
		<td>
			<p name="userid"><?=$id?></p>
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
			<a href="http://thtjwls.dothome.co.kr/test/manager/manager.php?list=users&mode=userdel&no=<?=$no?>" onclick="user_del();">삭제</a>
		</td>
		<td>
			<input type="button" value="수정" onclick="user_modify();">
		</td>
	</tr>
<?
	}
?>