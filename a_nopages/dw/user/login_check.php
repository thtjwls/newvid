<? session_start(); ?>
<meta charset="utf-8">
<?
    include "../DB/dbcon.php";
?>

<?
    $id=$_POST["id"];
    $pass=$_POST["pass"];
    
    $sql="select * from dw_users where id='$id'";
    $result=mysql_query($sql,$connect);
    $num_match = mysql_num_rows($result); //입력한 $id의 갯수 확인하고 $num_match로 대입
    
	if(!$num_match) //$num_match 의 값이 없을때
    {
        echo("
        <script>
            window.alert('등록 된 아이디 없음')
            history.go(-1)
        </script>
        ");
    }
    else //$num_match의 값이 있다면
    {
        $row = mysql_fetch_array($result); //$result 의 값을 배열 형태로 $row에 출력
        
        $db_pass = $row[pass]; //$db_pass 에 출력된 값중 pass칼럼의 값 대입
        
        if($pass != $db_pass) //사용자가 입력 한 $pw 와 DB의 $db_pass 의 값이 다름
        {
            echo("
                <script>
                    window.alert('비밀번호 다름')
                    history.go(-1)
                </script>
            ");
            exit; //if 를 빠져나감
        }
        else
        {
                        
            $userid		= $row[id];
            $usernick	= $row[nick];
            $useraddress= $row[address];
            $userhp		= $row[hp];
            $useremail	= $row[email];
            $username	= $row[name];
			$useridx	= $row[idx];
            
            
            
            $_SESSION['userid']=$userid;
            $_SESSION['usernick']=$usernick;
            $_SESSION['userhp']=$userhp;
            $_SESSION['useremail']=$useremail;
            $_SESSION['username']=$username;
            $_SESSION['useraddress']=$useraddress;
			$_SESSION['useridx']=$useridx;
            
            
        echo ("
            <script type='text/javascript'>
				location.href='../index.php';
            </script>
             ");
        }
    }
?>