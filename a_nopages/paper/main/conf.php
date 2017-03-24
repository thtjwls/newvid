<?

session_start();

include "config.php";
include "connection.php";
include "function.php";

$login=$login_id;

if(!$login) 
{
	echo" <script>
		window.alert('로그인하세요')
		</script>
	";
	move_url($index_url);
	exit;
}
if($login!=$master) 
{
	echo" <script>
		window.alert('권한이 없습니다.')
		history.go(-1)
		</script>
	";
	exit;
}

$datafile="config/config.kim";
$fp=fopen($datafile,'r');
$data=fread($fp,filesize($datafile));
$conf=explode("|",$data);
fclose($fp);

if($action==insert_config)
{
	if(!$adminpw)
    {
        echo"
			<script>alert('변경 하실 패스워드를 입력 하셔야 합니다')
            history.go(-1)
			</script>
			";
        exit;
	}
	$select=mysql_query("select pw from $table_name_1 where id='$master'", $con);
	if(!$select)
	{
		echo"
			<script>alert('DB select error in conf.php')
            history.go(-1)
			</script>
			";
        exit;
	}
	$row=mysql_fetch_array($select);
	if($adminpw==$row[pw])
	{
		$fp=fopen($datafile,'w');
		$cont="$host|$user|$pass|$dbname|$table_name_1|$table_name_2|$limit|$index_url|$main_frame|$level_list|$level|$master|$admin_mail";
		fwrite($fp,$cont);
		fclose($fp);

		echo"<script>alert('수정 되었습니다')</script><meta http-equiv='Refresh' content='1; URL=$PHP_SELF'>";
		exit;
	}
	else
	{
	    echo"
			<script>alert('관리자 비밀번호가 일치하지 않습니다.')
            history.go(-1)
			</script>
			";
        exit;
	}
}
else
{
	$fp=fopen($datafile,'r');
	$data=fread($fp,filesize($datafile));
	$conf=explode("|",$data);

	echo("
		<form method=post action=$PHP_SELP?action=insert_config>
		<TABLE  cellpadding='5' cellspacing='1' border='0' width='580' bgcolor='white' class=bt>
		<tr><td colspan='2' bgcolor='#8295C0'><font color=white>데이터베이스 설정</font></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>호스트</td><td class=mid1><FONT SIZE='' COLOR=''></FONT><input type='text' class=bt size='20' name='host' value='$conf[0]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>사용자</td><td class=mid1><input type='text' class=bt size='20' name='user' value='$conf[1]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>패스워드</td><td class=mid1><input type='password' class=bt size='20' name='pass' value='$conf[2]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>데이터베이스명</td><td class=mid1><input type='text' class=bt size='20' name='dbname' value='$conf[3]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>테이블명1</td><td class=mid1><input type='text' class=bt size='20' name='table_name_1' value='$conf[4]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>테이블명2</td><td class=mid1><input type='text' class=bt size='20' name='table_name_2' value='$conf[5]'></td></tr>
		<tr><td colspan='2' bgcolor='#8295C0'><font color=white>기본 설정</font></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>게시물 제한 수</td><td class=mid1><input type='text' class=bt size='4' name='limit' value='$conf[6]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>로그인페이지</td><td class=mid1><input type='text' class=bt size='60' name='index_url' value='$conf[7]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>메인페이지</td><td class=mid1><input type='text' class=bt size='60' name='main_frame' value='$conf[8]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>직급리스트</td><td class=mid1><textarea
                         name='level_list' rows='2' cols='58' style='font-family:굴림; font-size:13px;' class=bt>$conf[9]</textarea></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>직급</td><td class=mid1><textarea
                         name='level' rows='2' cols='58' style='font-family:굴림; font-size:13px;' class=bt>$conf[10]</textarea></td></tr>
		<tr><td colspan='2' bgcolor='#8295C0'><font color=white>관리자 설정</font></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>마스터관리자아이디</td><td class=mid1><input type='text' class=bt size='20' name='master' value='$conf[11]'><font color=black></font></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>시스템관리자이메일</td><td class=mid1><input type='text' class=bt size='30' name='admin_mail' value='$conf[12]'></td></tr>
		<tr><td bgcolor='#B4B6F4' class=mid1>시스템관리자비밀번호</td><td class=mid1><input type='password' class=bt size='20' name='adminpw'><font color=black>  비밀번호 필수 입력</font></td></tr>
		<tr>
		<td class=mid1 style='border-top:#000000 1px solid;border-bottom:none;' colspan=2 align=center bgcolor=#ffffff>
		<input type=submit class=bt1 value=O.K style='width:90px;'>
		</td>
		
		</tr>
		</table>

		</form>
		");
}
fclose($fp);
?>
<html>
<head>

<style>
 table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt;       font-family:tahoma,verdana,굴림; color:black}
 SELECT{font-size:9pt;}
 A:link    {color:blue;text-decoration:none;}
 A:visited {color:blue;text-decoration:none;}
 A:active  {color:blue;text-decoration:none;}
 A:hover  {color:red;text-decoration:underline}
	 
.bt1 {background-color:#e3e3e3;border:#000000 1px solid;}
.bt {border:#000000 1px solid;}
.bt2 {background-color:#000000;color:#ffffff;border:#000000 1px solid;}
.bts {border:#B6B6B6 1px solid;}
.rt {border:#000000 1px solid;border-top:none;border-left:none;}
.mid {border:#B6B6B6 1px solid;border-top:none;border-left:none}
.mid1 {border:#ffffff 1px solid;border-top:none;border-left:none}
.top {border:#B6B6B6 1px solid;border-bottom:none;border-left:none;border-right:none;}
.bottom {border:#e3e3e3 1px solid;border-top:none;border-left:none;border-right:none;}
</style>

</head>
<body></body>
</html>