<?

include "config.php";
include "lib.php";
include "connection.php";

//새로 가입할때...
if($exec == "register")
{
	if(strlen($password) < 4 || strlen($password) > 10) Error("비밀번호는 4자 이상 10자 이하여야 합니다");

	if($id == $password) Error("비밀번호와 아이디가 같으면 안됩니다.");

	if(isMail($mail)) Error("E-mail 형식이 틀립니다");
	$mail_check=mysql_query("select mail from $table_name_1", $con);
	if(!$mail_check)
	{
		echo("
			<script>
			window.alert('DB select error in member(main.php)');
			history.go(-1);
			</script>
				");
			exit;
	}
	while($row=mysql_fetch_array($mail_check))
	{
		if($mail == $row[mail])
		{
			echo("
				<script>
				window.alert('등록된 메일이 있습니다. 다른 이메일을 사용하시기 바랍니다!');
				history.go(-1);
				</script>
					");
				exit;
		}
	}
	$level_list = explode(",", $level_list);
	$level = explode(",", $level);
	for($i=0;$i<19;$i++)
	{
		echo("comp_rank : $comp_rank | level_list : $level_list[$i] | level_num : $level[$i] <br>");
		if($comp_rank==$level_list[$i])
		{
			$level_num=$level[$i];
		}
	}
	$insert = "insert into $table_name_1 values ('', '$id', '$password', '$name', '$mail', '$comp_part', '$comp_rank', '$REMOTE_ADDR', '', $level_num)";

	$q=mysql_query($insert, $con);
	if(!$q)
	{
		echo("DB insert error in $table_name_1");
	}
	//$data = $id ."|". $password ."|". $name ."|". $mail ."|". $comp_part ."|". $comp_rank ."|". $REMOTE_ADDR ."|";
	//if(data_write("$db_dir/$id.$db_file","a",$data)) Error ("파일입력 또는 퍼미션 에러!");
	echo " <script>
			window.alert('등록되었습니다.');
			window.close();
                </script> 
					";
}
//수정시
if($exec == "modify")
{
	if($new_password)
	{
		if(strlen($new_password) < 4 || strlen($new_password) > 10) Error("비밀번호는 4자 이상 10자 이하여야 합니다");

		if($login_id == $new_password) Error("비밀번호와 아이디가 같으면 안됩니다.");
	}

	if(isMail($mail)) Error("E-mail 형식이 틀립니다");

	if($new_password)
	{
		$insert = "update $table_name_1 set pw='$new_password', name='$name', mail='$mail', comp_part='$comp_part', comp_rank='$comp_rank', ip='$REMOTE_ADDR' where id='$login_id'";
	}
	else
	{
		$insert = "update $table_name_1 set name='$name', mail='$mail', comp_part='$comp_part', comp_rank='$comp_rank', ip='$REMOTE_ADDR' where id='$login_id'";
	}

	$q=mysql_query($insert, $con);
	if(!$q)
	{
		echo("DB insert error in $table_name_1");
	}
	$select = mysql_query("select * from $table_name_1 where id='$login_id'", $con);
	if(!$select)
	{
		echo"<script>window.alert('DB select error in $table_name_1');
			history.go(-1)
				</script>
				";
	}
	$row=mysql_fetch_array($select);

	//$data = $row[id] ."|". $row[pw] ."|". $row[name] ."|". $row[mail] ."|". $row[comp_part] ."|". $row[comp_rank] ."|". //$REMOTE_ADDR ."|";
	//if(data_write("$db_dir/$row[id].$db_file","w",$data)) Error ("파일입력 또는 퍼미션 에러!");
	echo " <script>
			window.alert('수정되었습니다.');
			window.close();
                </script> 
					";
}
if($exec == "modi")
{
	if($new_password)
	{
		if(strlen($new_password) < 4 || strlen($new_password) > 10) Error("비밀번호는 4자 이상 10자 이하여야 합니다");

		if($login_id == $new_password) Error("비밀번호와 아이디가 같으면 안됩니다.");
	}

	if(isMail($mail)) Error("E-mail 형식이 틀립니다");

	if($new_password)
	{
		$update = "update $table_name_1 set pw='$new_password', name='$name', mail='$mail', comp_part='$comp_part', comp_rank='$comp_rank', ip='$REMOTE_ADDR', level = $level_num where seq_num=$seq_num";
	}
	else
	{
		$update = "update $table_name_1 set name='$name', mail='$mail', comp_part='$comp_part', comp_rank='$comp_rank', ip='$REMOTE_ADDR', level = $level_num where seq_num=$seq_num";
	}

	$q=mysql_query($update, $con);
	if(!$q)
	{
		echo("
			<script>
			window.alert('DB update error in member(main.php);
			history.go(-1);
			</script>
				");
	}
	$select = mysql_query("select * from $table_name_1 where seq_num=$seq_num", $con);
	if(!$select)
	{
		echo"<script>window.alert('DB select error in $table_name_1');
			history.go(-1)
				</script>
				";
	}
	$row=mysql_fetch_array($select);

	//$data = $row[id] ."|". $row[pw] ."|". $row[name] ."|". $row[mail] ."|". $row[comp_part] ."|". $row[comp_rank] ."|". $REMOTE_ADDR ."|";
	//if(data_write("$db_dir/$row[id].$db_file","w",$data)) Error ("파일입력 또는 퍼미션 에러!");
	echo " <script>
			window.alert('수정되었습니다.');
			window.close();
                </script> 
					";
}

?>