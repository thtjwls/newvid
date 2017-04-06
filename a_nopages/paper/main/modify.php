<?

session_start();

include "config.php" ;
include "lib.php";
include "connection.php";

$login=$login_id;
if(!$login)
{
	Error('로그인 하시기바랍니다.');
	exit;
}
$select =mysql_query("select * from $table_name_1 where id='$login'", $con);
if(!$select)
{
	echo("
		<script>
		window.alert('DB select error in $table_name_1');
		window.close();
		</script>;
		");
}
$row=mysql_fetch_array($select);


if(empty($mode))
{
	echo"
<html>
<title>회원정보수정</title>
<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
</style>
<body bgcolor=$bgcolor>
<div align=center>
<table border=0 width=100% height=70%><tr><td align=center valign=middle>
	<table border=0>
		<form action=$PHP_SELF?mode=login method=post name=modify_login>
		<tr>
		<td align=center colspan=2><b>회원님의 정보를 안전하게 보호하기 위해 <br> 로그인을 한번 더 하셔야합니다. </b></td>
		</tr>
		<tr>
		<td align=right><font color=$font_color>$id_name</font></td>
		<td align=center><input type=text name=id class=input size=20 maxlength=20></td>
		</tr>
		<tr>
		<td align=right><font color=$font_color>$pass_name</font></td>
		<td align=center><input type=password name=password class=input size=20 maxlength=20></td>
		</tr>
		<tr>
		<td colspan=2 align=center><input type=submit class=submit value='     로그인     '></td>
		</tr>
		</form>
	</table>
</td></tr></table>
</div>
<script>
document.modify_login.id.focus()
</script>
</body>
</html>
		";
		exit;
}

if($mode=="login")
{
	if($row[id] != $id || $row[pw] != $password) Error ("인증에 실패했습니다.");

	echo("
	<HTML>
	$style

<title>회원가입</title>
<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
</style>

<script>

var is_submit=0;
function check_form(form) 
{
	if(is_submit) 
	{
		return false;
	} 
	else 
	{
		if(form.new_password.value)
		{
			if(!form.new_password2.value)
			{				
				alert('비밀번호 확인을 입력하세요');
				form.new_password2.focus();
				return false;
			}
			if(form.new_password.value!=form.new_password2.value)
			{
				alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
				form.new_password.focus();
				return false;
			}
		}
		
		if(!form.name.value){
			alert('이름을 입력하세요');
			form.name.focus();
			return false;
		}
		
		if(!form.mail.value){
			alert('E-mail을 입력하세요');
			form.mail.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('담당부서를 입력하세요');
			form.comp_rank.focus();
			return false;
		}

		if(!form.comp_rank.value){
			alert('직급을 입력하세요');
			form.comp_rank.focus();
			return false;
		}
	}
}
</script>

<body bgcolor=$bgcolor>
<div align=center>

<table border=0 width=$out_table_width cellpadding=3 cellspacing=0 bgcolor=$bgcolor><tr><td>

<table width=$table_width bgcolor=$table_bgcolor cellpadding=$cellpadding cellspacing=$cellspacing>

<form name=modify action='main.php' method=post enctype=multipart/form-data>
<input type=hidden name=exec value=modify>
<input type=hidden name=login_id value='$login'>

<tr>
<td width=$menu_width align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h ID $deco_f<font></td>
<td width=$content_width bgcolor=$content_bgcolor><font color=blue><b>$row[id]</b></font></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 비밀번호변경 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=new_password maxlength=20 class=input> <font color=$font_color>비밀번호를 바꿀때만 입력하세요</font></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 비밀번호확인 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=password name=new_password2 maxlength=20 class=input></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 이름 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=name size=20 maxlength='$name_chr_max' class=input value='$row[name]'></td>
</tr>


<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h E-mail $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=mail size=40 maxlength=50 class=input value='$row[mail]'></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 담당부서 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_part size=30 maxlength=50 class=input value='$row[comp_part]'></td>
</tr>

<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 직위 $deco_f</font></td>
<td bgcolor=$content_bgcolor><input type=text name=comp_rank size=30 maxlength=30 class=input value='$row[comp_rank]'></td>
</tr>
<tr>
<td align=$menu_align bgcolor=$menu_bgcolor><font color=$font_color>$deco_h 그룹게시판 $deco_f</font></td>
<td bgcolor=$content_bgcolor>&nbsp;$row[board]</td>
</tr>
<tr>
<td colspan=2 bgcolor=$content_bgcolor align=center><br>
<input class=submit type=submit value=정보수정 onclick=\"return check_form(this.form)\">  <input class=submit type=button value=창닫기 onclick='javascript:window.close();'></td>
</tr>


</form>
</table>

<tr>
<td align=center>

</td>
</tr>
</table>
<script>
document.modify.new_password.focus();
</script>
</div>

</body>
</html>
	");
}

?>